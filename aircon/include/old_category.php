<table width="175" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td><img src="../img/main/shop_list_11.jpg" width="175" height="47"></td>
                    </tr>
                    <tr> 
                      <td background="../img/main/shop_list_2.jpg">
					  
                        <table width="161" border="0" cellspacing="0" cellpadding="0" align="center">
<?
$query = DBquery("SELECT * FROM category WHERE category < 100 order by indexs asc"); 
while($row=mysql_fetch_array($query)):
	if(substr($row[category],-2)==substr($category,-2))$fontcolor="<font color='#0D6A5C'>";
	else $fontcolor="<font color='#000000'>";
	$bigcode = substr($row[category], -2);
?>
                          <tr> 
                            <td><img src="../img/main/shop_list_icon.jpg" width="13" height="15" align="absmiddle"> <a href="../product/old_product.php?category=<?=$row[category]?>"><?=$fontcolor?><?=$row[name]?></font></a> </td>
                          </tr>
                          <tr> 
                            <td height="10"><img src="../img/main/shop_list_3.jpg" width="161" height="5"></td>
                          </tr>
                          <tr> 
                            <td style=padding-left:20px>
<?
$sqlsubstr = "select category, name from category where category >= 100 AND category < 10000 AND category LIKE  '%$bigcode' order by category asc";
				$sqlsubqry = mysql_query($sqlsubstr) or die(mysql_error());
				while($sublist = mysql_fetch_array($sqlsubqry)):
				if(substr($category,-4)==substr($sublist[category],-4))$mfont="<font color=#0033CC>";
				else $mfont="";
?>
							<img src="../img/main/shop_list_icon1.jpg" width="3" height="3" align="absmiddle">
							<A HREF="../product/old_product.php?category=<?=$sublist[category]?>"><?=$mfont?><?=$sublist[name]?></A><br>
			<? endwhile; ?>
							  
							  </td>
                          </tr>
                          <tr> 
                            <td height="10"><img src="../img/main/shop_list_3.jpg" width="161" height="5"></td>
                          </tr>
<?
endwhile;
?>                            
                        </table>
                      </td>
                    </tr>
                    <tr> 
                      <td><img src="../img/main/shop_list_4.jpg" width="175" height="10"></td>
                    </tr>
                  </table>
                