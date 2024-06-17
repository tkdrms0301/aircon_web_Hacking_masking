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
<<<pgurl>>>http://www.topaircon.net/product/product_detail.php?category=<?=$row[category]?>&p_code=<?=$row[p_code]."\n"?>
<<<igurl>>>http://www.topaircon.net/product_img/<?=$row[p_code]?>a.jpg
<<<cate1>>><?=categoryname($row[category],1)."\n"?>
<<<cate2>>><?=categoryname($row[category],2)."\n"?>
<<<cate3>>>
<<<cate4>>>
<<<model>>>
<<<brand>>><?=$BRAND_ARRAY["$row[p_brand]"]."\n"?>
<<<maker>>>
<<<origi>>>
<<<pdate>>><?=substr($row[p_wdate],0,7)."\n"?>
<<<deliv>>>
<<<event>>>
<<<coupo>>>
<<<pcard>>>
<<<point>>>
<<<modig>>>
<<<ftend>>>
<? }?>