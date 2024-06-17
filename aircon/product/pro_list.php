<!------------------------------->

<?
	if (!$offset) $offset=0;
	$limit=24;
	$page=10;
	$content=mysql_real_escape_string($content);
	if ($content){
		$condition="where p_name like '%$content%'"; 
	}else{
		if($category){
			if($category>=10000){
				$LIKE = $category;
			}else if($category>=100){
				$LIKE = substr($category,-4);
			}else {
				$LIKE = substr($category,-2);
			}
			$LIKE=mysql_real_escape_string($LIKE);
			if(!$condition)$condition.="where category like '%$LIKE'";
			else $condition.=" and category like '%$LIKE'";
		}
		if($brand){
			$brand=mysql_real_escape_string($brand);
			if(!$condition)$condition.="where p_brand = '$brand'";
			else $condition.=" and p_brand = '$brand'";
		}
		if($plus01){
			$plus01=mysql_real_escape_string($plus01);
			if(!$condition)$condition.="where plus01 = '$plus01'";
			else $condition.=" and plus01 = '$plus01'";
		}
		if($plus02){
			$plus01=mysql_real_escape_string($plus02);
			if(!$condition)$condition.="where plus02 = '$plus02'";
			else $condition.=" and plus02 = '$plus02'";
		}else{
			if(!$condition)$condition.="where plus02 = 'n'";
			else $condition.=" and plus02 = 'n'";
		}
	}
	//////////order by////
	if($sort){
		switch ($sort) {
		 case 'PL': $rsort="p_price asc";break;
		 case 'PH': $rsort="p_price desc";break;
		 case 'SD': $rsort="wdate desc";break;
		}
		$qsort = "order by $rsort ";
	}else{
		$qsort = "order by p_indexs desc,p_code desc";
	}
	//////////////////////
	$hmax=115; $wmax=115;	
	//echo  $condition;
	$row=DBarray("select count(*) from products  $condition");
	$numrows=$row[0];
	$no=$numrows-$offset;
	$result=DBquery("select * from products  $condition $qsort limit $offset, $limit");
	
	
$cn=0;
if($numrows<1){
	echo"<CENTER><IMG SRC=\"../img/product/nimg.gif\" ></CENTER>";
}else{
?>
                  <table width="632" border="0" cellspacing="0" cellpadding="0">
                    <tr> 

<?
while ($row=mysql_fetch_array($result)) {
$cn++;
if($row[saletype]=='n'){
	$new_icon="<img src=../img/main/icon_new.gif  align=absmiddle>";
	$str="16";
}else if($row[saletype]=='b'){
	$new_icon="<img src=../img/main/icon_new.gif  align=absmiddle>";
	$str="16";
}else {
	$new_icon="";
	$str="20";
}
?>
                      <td width="138" align="center" valign="top"><table width="138" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td width="157" height="138" align="center" valign="top">
							 <table width="138" border="0" cellpadding="0" cellspacing="1" bgcolor="e8e8e8">
                                <tr>
                                  <td height="138" align="center" bgcolor="#FFFFFF"><a href="../product/product_detail.php?category=<?=$category?>&brand=<?=$brand?>&plus01=<?=$plus01?>&plus02=<?=$plus02?>&p_code=<?=$row[p_code]?>&offset=<?=$offset?>&<?=$listsort?>" onFocus="blur()" title="<?=$row[p_name]?>"><?=shopimg("../product_img/".$row[p_code]."a.jpg",$hmax,$wmax,$size="s")?></a></td>
                                </tr>
                              </table>
							 </td>
                          </tr>
                          <tr> 
                            <td height="45" align="center"><a href="../product/product_detail.php?category=<?=$category?>&brand=<?=$brand?>&p_code=<?=$row[p_code]?>&offset=<?=$offset?>&<?=$listsort?>" onFocus="blur()" title="<?=$row[p_name]?>"><?=$row[p_name]?></a><br> <font color="#FF6600"><strong><?=number_format($row[p_price])?>¿ø</strong></font> 
                            </td>
                          </tr>
                        </table></td>
<? if(!($cn%4)){echo "</tr><tr><td colspan='7'>&nbsp;</td></tr><tr>";
}else { echo "<td >&nbsp;</td>";}
	
?>	
<? } 
if($numrows<4){
	$tds=4-$numrows;
		for($cn=0;$cn<$tds;$cn++){
				echo "<td >&nbsp;</td>";
		}
}
	
?>
                     

                    </tr>
                  </table>
<table border="0" align=center>
                    <tr> 
                      <td align=center>
					  <? 
					  $listsort="category=$category&content=$content&select=$select&sort=$sort&brand=$brand&plus01=$plus01&plus02=$plus02";
					  include "../include/page.php";
					  echo ("${prev10} $_page ${next10}");
					  ?>
					  </td>
                    </tr>
                  </table>
<? }?>