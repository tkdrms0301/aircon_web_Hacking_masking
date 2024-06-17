<?
	include("../include/config.php");
	include("../include/function.php");
	if($c_id){
		DBquery("delete from cart where c_id='$c_id'");
	}else{
		for($i=0;$i<count($chk);$i++){
				DBquery("update cart set p_count = '$count[$i]'  where c_id = '$chk[$i]'");
		}
	}
	redirect($_SERVER[ "HTTP_REFERER" ]);
?>