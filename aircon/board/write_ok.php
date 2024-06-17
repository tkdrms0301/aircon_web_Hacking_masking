<?php
include "../include/session_config.php";
include '../include/xss_filter.php'; 

$user_input = isset($_GET['contents']) ? $_GET['contents'] : '';
$sanitized_input = sanitize_input($user_input);

$boardtable = "brd_" . $board;
$dir = "../board";
$title = str_replace(" ", "", $subject);

if ($title == "") {
    error_check("허용되지 않는 제목입니다. 제목을 입력하세요.");
}

$input['userid'] = $_SESSION['user_id'];
$input['name'] = sanitize_input($name);
$input['email'] = sanitize_input($email);
$input['subject'] = sanitize_input($subject);
$input['comment'] = addslashes(($comment));
$input['pass'] = sanitize_input($pass);

if ($category) $input['category'] = sanitize_input($category);

// Define maximum allowed file size (e.g., 5MB)
$max_file_size = 5 * 1024 * 1024; // 5 MB in bytes

	if($file_delete[0]=="yes"){
		@unlink("../board/data/".$row[file1]);
		$input[file1]="";
		$input[file1_name]="";	
	}
	if ($file_name[0]) {

		// Check file size
		if ($file[0]['size'] > $max_file_size) {
			error_check("파일 크기가 너무 큽니다. 최대 허용 크기는 5MB입니다.");
			exit;
		}

		$exe = strtolower(array_pop(explode(".",$file_name[0])));
		$allowed_extensions = array("jpg", "jpeg", "png", "gif", "pdf", "doc", "docx");

		if (in_array($exe, $allowed_extensions)) {
				
			$temp=date("U");
			$file_url=$temp.".".$exe;
			copy($file[0],"../board/data/".$file_url);
			@chmod($dir."../board/data/".$file_name[0],0777);
			$input[file1]=$file_url;
			$input[file1_name]=$file_name[0];
		} else {
			error_check("허용되지 않는 파일 형식입니다.");
			exit;
		}
	}	

if ($parent) { // 답글일 경우
    $dep_row = mysql_fetch_array(mysql_query("select replyno, reply from $boardtable where id = '$parent'"));
    $depth = strpos($dep_row['reply'], "A");

    if ($depth === false) {
        error_check('더이상 답글을 달 수 없습니다.');
        exit;
    }

    $temp = $dep_row['reply'];
    $temp[$depth] = "_";
    $temp = "$temp";

    $temp_result = mysql_query("select reply from $boardtable where replyno='$dep_row[replyno]' and reply like '$temp' order by reply desc limit 1");
    $temp_row = mysql_fetch_array($temp_result);
    $chang_reply = $temp_row['reply'];
    $chang_reply_str = $chang_reply[$depth];
    $chang_reply_str = ++$chang_reply_str;
    if (ord($chang_reply_str) == 254) { // 더 이상의 리플은 금지
        exit;
    }
    $chang_reply[$depth] = $chang_reply_str;
    $input['wdate'] = date('Y-m-d');
    $input['replyno'] = $dep_row['replyno'];
    $input['reply'] = $chang_reply;
    setInsert($boardtable, $input);

} else {
    if (!$id) {  // 처음 글쓰기일 때
        $input['wdate'] = date('Y-m-d');
        $input['uip'] = $_SERVER['REMOTE_ADDR'];
        $input['hits'] = 0;
        $input['replyno'] = 1;
        $input['reply'] = "AAAAA";
        setInsert($boardtable, $input);

        $reply_row = DBarray("select id from $boardtable where uip = '{$_SERVER['REMOTE_ADDR']}' and wdate = now() order by id desc");
        mysql_query("update $boardtable set replyno = '{$reply_row['id']}' where id = '{$reply_row['id']}'");
    } else { // 글 수정일 때
        $row = DBarray("select * from $boardtable where id='$id'");
        if ($row['pass'] != $pass) {
            error_check("작성자가 아닙니다.");
        }
        setUpdate($boardtable, $input, " where id=$id", 0);
    }
}

mysql_close();

if (!$id) {
    OnlyMsgView("올바로 등록되었습니다.");
    echo ("<meta http-equiv='Refresh' content='0.0; URL=?sub_page=$sub_page&show=list&board=$board&category=$category&offset=$offset'>");
} else {
    OnlyMsgView("올바로 수정되었습니다.");
    echo ("<meta http-equiv='Refresh' content='0.0; URL=?sub_page=$sub_page&show=view&board=$board&bd=$bd&id=$id&offset=$offset&search_select=$search_select&contents=$contents&category=$category'>");
}
?>
