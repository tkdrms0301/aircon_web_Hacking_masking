<?php
include "../include/session_config.php";
include "../admin/head.php";
$savedir = "../product_img";

########## �����ͺ��̽����� �����Ѵ�. ##########      
$result = mysql_query("delete from products where p_code = '$p_code'");

if(!$result){
	error_write(mysql_error());
}
   
######### �ش� ��ǰ �̹����� �����Ѵ�. ###########

@unlink("../product_img/${p_code}a.jpg");
@unlink("../product_img/${p_code}b.jpg");
@unlink("../product_img/${p_code}c.jpg");
@unlink("../product_img/${p_code}d.jpg");
@unlink("../product_img/${p_code}e.jpg");


########## ȸ����� ���ȭ������ �̵��Ѵ�. ##########
$encoded_key = urlencode($key);
echo("<meta http-equiv='Refresh' content='0; URL=product_list.php?offset=$offset&keyfield=$keyfield&key=$encoded_key&category=$category'>");
?>
