<table width="173" border="0" cellspacing="0" height="564" cellpadding="0">
                    <tr> 
                      <td height="45"><img src="../img/main/rec_1.jpg" width="173" height="45"></td>
                    </tr>
					
                    <tr valign=top> 


                      <td background="../img/main/rec_2.jpg" align="center">
<?
	$condition="where saletype= 'b'";
	$hmax=85; $wmax=85;	
	$cnt=0;
	$result=DBquery("select * from products  $condition order by p_indexs desc,p_code desc limit 0, 3");
	while($row=mysql_fetch_array($result)){
	$cnt++;
?>
					  <a href="../product/product_detail.php?category=<?=$row[category]?>&p_code=<?=$row[p_code]?>" onFocus="blur()" title="<?=$row[p_name]?>"><?=shopimg("../product_img/".$row[p_code]."a.jpg",$hmax,$wmax,$size="s")?></a><br>
                        <?=$row[p_name]?><br>
                        <b><font color="#FF3600"><?=number_format($row[p_price])?> </font></b> <br>

<? if($cnt!=3){?>
                        <img src="../img/main/rec_dot.jpg" width="142" height="5" vspace="3"><br>
<? }?>
<? 
	
}
?>
						
						</td>
                    </tr>
                    <tr> 
                      <td height="17"><img src="../img/main/rec_3.jpg" width="173" height="17"></td>
                    </tr>
                  </table>