<?php
include "../include/session_config.php";

$input['userid'] = $_SESSION['user_id'];

if($hidden=="1"){
		$checkrow=DBarray("select * from brd_".$board." where id='$id'");
		$checkrow1=DBarray("select * from brd_".$board." where replyno='$checkrow[replyno]' and reply='AAAAA' ");
		if($checkrow[showorhidden]==="2"){
		if(!$_SESSION['user_id']){
				if((!$pass || $checkrow1[pass]!=$pass)){
					include "iview.php";
				}else{
					include "iview01.php";
				}
		}else{
				if($checkrow1[userid]!=$_SESSION['user_id']){
					error_check("자신의 글만 확인가능합니다.");
				}else{
					include "iview01.php";
				}
		}

		}else{
			include "iview01.php";
		}
}else{
	include "iview01.php";
	
}
?>