<? include "../admin/head.php";
	

	$row=DBarray("select * from market  where no='$no' ");
	if(!$row[0]){
		
		error_check("삭제권한이 없습니다.");
	}else{
		DBquery("delete from market  where no='$no'");
		@unlink("../market_img/${no}a.jpg");
		@unlink("../market_img/${no}b.jpg");
		@unlink("../market_img/${no}c.jpg");
		@unlink("../market_img/${no}d.jpg");
		@unlink("../market_img/${no}e.jpg");
		echo("<meta http-equiv='Refresh' content='0; URL=market.php?offset=$offset&s_category=$s_category&category=$category'>");
	}
	
?>