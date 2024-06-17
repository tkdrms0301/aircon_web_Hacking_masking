<?
include "../include/xss_filter.php";
$max=substr($category,-2);
$max=mysql_real_escape_string($max);

// 특수 문자가 포함되어 있는지 확인하는 정규식
if (preg_match('/[^0-9]/', $max)) {
	echo "<script>
	alert('잘못된 카테고리입니다.');
	window.history.back();
	</script>";
}

$ca_row3=DBarray("select * from category where category like '%$max' and  category >=10000 and category < 1000000 limit 0,1");
if(!$ca_row3[0]){
		$max=substr($category,-2);
		$LIKE02="where category like '%$max' and  category >=100 and category < 10000";
}else{
	if(!$category){
		$LIKE02="where   category <=100 ";
	}else if($category<100){
		$substr=-2;
		$max=substr($category,$substr);
		$LIKE02="where category like '%$max' and  category >=100 and category < 10000";
	}else{
		$substr=-4;
		$max=substr($category,$substr);
		$max2=substr($category,-2);
		$LIKE02="where category like '%$max' and  category >=10000 and category < 1000000";
		$sub_check_row=DBarray("select count(*) from category $LIKE02 limit 0,1");
		if(!$sub_check_row[0])$LIKE02="where category like '%$max2' and  category >=100 and category < 10000";
	}
}


?>



<table width="632" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="31" ><table border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td > 
							<!--history영역 -->
                              <img src="../img/product/icon3.gif" width="15" height="17" align="absmiddle">&nbsp; 
                              현재위치 : <?=categoryname($category,"",$link_page,$brand,safe_output($content))?>&nbsp;&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                   
</table>
<?if(!$content){?>
<table width="632" border="0" cellpadding="0" cellspacing="1" bgcolor="c7c7c7">
                    <tr>
                      <td align="center" bgcolor="#F2F2F2">
					   <table width="624" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td height="4" colspan="4"></td>
                          </tr>
                          <tr align=center> 
 

<?

	if($plus01){
		$condition.=" and plus01 = '$plus01'";
	}
	if($plus02){
		$condition.=" and plus02 = '$plus02'";
	}else{
		$condition.=" and plus02 = 'n'";
	}

$query=DBquery("select * from category $LIKE02 order by indexs asc");
while($row=mysql_fetch_array($query)){
	if(substr($row[category],-6)==substr($category,-6))$fonts="<FONT  COLOR=\"#003399\"><strong>";
	else $fonts="<font color='#000000'>";

	
		if($row[category]>=10000){
			$SUBLIKE = $row[category];
		}else if($row[category]>=100){
			$SUBLIKE = substr($row[category],-4);
		}else {
			$SUBLIKE = substr($row[category],-2);
		}

	
	$sub_cnt_row=DBarray("select count(*) from  products where category like '%$SUBLIKE' $condition");


?>
		<td height="26" bgcolor="#FFFFFF">&nbsp;&nbsp;&nbsp;<img src="../img/product/icon02.gif" width="9" height="9" align="absmiddle">&nbsp;<A HREF="<?=$PHP_SELF?>?category=<?=$row[category]?>"><?=$fonts?><?=$row[name]?></font></A></strong>(<?=$sub_cnt_row[0]?>)
<? } ?>

                          </tr>
                          <tr> 
                            <td height="4" colspan="4"></td>
                          </tr>
                        </table>
						</td>
                    </tr>
                  </table>
<? unset($condition)?>
<? }?>