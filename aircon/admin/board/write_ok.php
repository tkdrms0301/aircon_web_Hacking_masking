<?php
include "../include/session_config.php";

$boardtable = "brd_" . htmlspecialchars($board);
$dir = "../board";
$title = str_replace(" ", "", htmlspecialchars($subject));
if ($title == "") {
    error_check("허용되지 않는 제목입니다. 제목을 입력하세요.");
}

$input['userid'] = $_SESSION['user_id'];
$input['name'] = htmlspecialchars($name);
$input['email'] = htmlspecialchars($email);
$input['subject'] = htmlspecialchars($subject);
$input['votes'] = htmlspecialchars($votes);

if ($category) {
    $input['category'] = htmlspecialchars($category);
}

$input[comment]=addslashes($comment);
$input[pass]=$pass;

		
				
		
		if($file_delete[0]=="yes"){
			@unlink($dir."/data/".$row[file1]);
			$input[file1]="";
			$input[file1_name]="";
}

if ($file_name[0]) {
						$exe = array_pop(explode(".",$file_name[0]));
						$temp=date("U");
						$file_url=$temp.".".$exe;
						copy($file[0],$dir."/data/".$file_url);
						@chmod($dir."/data/".$file_name[0],0707);
						$input[file1]=$file_url;
						$input[file1_name]=$file_name[0];
						
				}



	if($parent){ 
		$dep_row = mysql_fetch_array(mysql_query("select replyno, reply from $boardtable where id = '$parent'"));
		$depth = strpos($dep_row[reply],"A");

		if(!is_int($depth)){
        error_check('더이상 답글을 달 수 없습니다.');
        exit;
    }

		$temp = $dep_row[reply];
    $temp[$depth] = "_";
    $temp = "$temp";


		$temp_result = mysql_query("select reply from $boardtable where replyno='$dep_row[replyno]' and reply like '$temp' order by reply desc limit 1");
    $temp_row = mysql_fetch_array($temp_result);
		$chang_reply = $temp_row[reply];
    $chang_reply_str = $chang_reply[$depth];
		$chang_reply_str = ++$chang_reply_str;
		if (ord($chang_reply_str)==254) { 
        exit;
    }
    $chang_reply[$depth] = $chang_reply_str;

		$input[replyno]=$dep_row[replyno];
		$input[reply]=$chang_reply;
    setInsert($boardtable, $input);

	} else	{
	if(!$id){ 
		$input[wdate]=date('Y-m-d');
		$input[uip]=$REMOTE_ADDR;
		$input[hits]=0;
		$input[replyno]=1;
		$input[reply]="AAAAA";
        setInsert($boardtable, $input);
		$reply_row = DBarray("select id from $boardtable where uip = '$REMOTE_ADDR' and wdate = now() order by id desc");
		;
		mysql_query("update $boardtable set replyno = '$reply_row[0]' where id = '$reply_row[0]' ");


	} else { 
		$row=DBarray("select * from $boardtable where id='$id'");


		
			setUpdate($boardtable, $input, $query_option="  where id=$id ", $type=0);
		
    }
}

mysql_close();
if(!$id){
    OnlyMsgView("올바로 등록되었습니다.");
	echo ("<meta http-equiv='Refresh' content='0.0; URL=$url?show=list&board=$board&bd=$bd&offset=$offset&menu=$menu&category=$category'>");
}else{
    OnlyMsgView("올바로 수정되었습니다.");
	echo ("<meta http-equiv='Refresh' content='0.0; URL=$url?show=view&board=$board&id=$id&offset=$offset&select=$select&contents=$contents&menu=$menu&category=$category'>");
}
?>
