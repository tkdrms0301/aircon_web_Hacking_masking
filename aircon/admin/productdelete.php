<?php
include "../include/session_config.php";
include "../admin/head.php";
$savedir = "../product_img";

########## 데이터베이스에서 삭제한다. ##########      
$result = mysql_query("delete from products where p_code = '$p_code'");

if(!$result){
	error_write(mysql_error());
}
   
######### 해당 상품 이미지를 삭제한다. ###########

@unlink("../product_img/${p_code}a.jpg");
@unlink("../product_img/${p_code}b.jpg");
@unlink("../product_img/${p_code}c.jpg");
@unlink("../product_img/${p_code}d.jpg");
@unlink("../product_img/${p_code}e.jpg");


########## 회원목록 출력화면으로 이동한다. ##########
$encoded_key = urlencode($key);
echo("<meta http-equiv='Refresh' content='0; URL=product_list.php?offset=$offset&keyfield=$keyfield&key=$encoded_key&category=$category'>");
?>
