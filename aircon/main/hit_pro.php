<table width="520" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td><img src="../img/main/hit.jpg" width="520" height="52"></td>
                    </tr>
                    <tr> 
                      <td background="../img/main/hit_1.jpg"> 
                        <table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
                          <tr align="center">
						  
<?
	$condition="where saletype= 's'";
	$hmax=110; $wmax=110;	
	$cnt=0;
	$result=DBquery("select * from products  $condition order by p_indexs desc,p_code desc limit 0, 4");
	while($row=mysql_fetch_array($result)){
	$cnt++;
?>
                            <td width="25%" height="115">
							<a href="../product/product_detail.php?category=<?=$row[category]?>&p_code=<?=$row[p_code]?>" onFocus="blur()" title="<?=$row[p_name]?>"><?=shopimg("../product_img/".$row[p_code]."a.jpg",$hmax,$wmax,$size="s")?></a>
<Br><?=cut_string($row[p_name],20)?><br>
                              <b><font color="#FF3600"><?=number_format($row[p_price])?> </font></b>
							</td>
<? 
	
}
?>                           

                          </tr>
                         
                        </table>
                      </td>
                    </tr>
                    <tr> 
                      <td><img src="../img/main/hit_2.jpg" width="520" height="13"></td>
                    </tr>
                  </table>