<?
	include "../include/config.php";
	include "../include/function.php";
	$condition="where naver_yn= 'y'";

	$result=DBquery("select * from products  $condition order by p_indexs desc,p_code desc");
	while($row=mysql_fetch_array($result)){
	$cnt++;
?>
<<<begin>>>
<<<mapid>>><?=$row[p_code]."\n"?>
<<<pname>>><?=$row[p_name]."\n"?>
<<<price>>><?=$row[p_price]."\n"?>
<<<ftend>>>
<? }?>