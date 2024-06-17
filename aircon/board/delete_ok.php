<?
	$board_main=$board;
	$board="brd_".$board;
	$dir="../board";
		$row=DBarray("select * from $board where id='$id'");
///////////////////////////checke/////////////
	if ($_SESSION['user_id'] != $row['userid']) {
    	error_check("삭제 권한이 없습니다.");
	}
///////////////////////////checke/////////////
		
		$dbup = "delete from $board where id='$id'";	
		if($row[file1])@unlink($dir."/data/".$row[file1]);
		$result=mysql_query($dbup);

		mysql_close();
	echo ("<meta http-equiv='Refresh' content='0.0; URL=?show=list&board=$board_main&offset=$offset&search_select=$search_select&contents=$contents&sub_page=$sub_page'>");
?>