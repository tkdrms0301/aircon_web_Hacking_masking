<?
	$board_main=$board;
	$board="brd_".$board;
	$dir="../board";
		$row=DBarray("select * from $board where id='$id'");

		
		$dbup = "delete from $board where id='$id'";	
		@unlink($dir."/data/".$row[file1]);
		$result=mysql_query($dbup);

		mysql_close();
	echo ("<meta http-equiv='Refresh' content='0.0; URL=$PHP_SELF?show=list&board=$board_main&offset=$offset&search_select=$search_select&contents=$contents&menu=$menu'>");
?>