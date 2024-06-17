<?
	$condition="where saletype= 'n'";
	$hmax=110; $wmax=110;	
	$result=DBquery("select * from products  $condition order by p_indexs desc,p_code desc limit 0, 8");
	
	
?>
<table width="520" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td valign="top" width="260" height="206">
				  
                        <table width="260" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td height="18" valign="top" background="../img/main/4_2.jpg"><img src="../img/main/4_1.jpg" width="260" height="13"></td>
                          </tr>
                          <tr> 
                            <td align="center" background="../img/main/4_2.jpg" height="199"> 

                              <table width="235" border="0" cellspacing="0" cellpadding="0" height="199">
<? $row=mysql_fetch_array($result);
if($row[0]){
?>	
                                <tr> 
                                  <td width="110" height="115"><a href="../product/product_detail.php?category=<?=$row[category]?>&p_code=<?=$row[p_code]?>" onFocus="blur()" title="<?=$row[p_name]?>"><?=shopimg("../product_img/".$row[p_code]."a.jpg",$hmax,$wmax,$size="s")?></a></td>
                                  <td width="125"><?=cut_string($row[p_name],50)?><br>
                                    <b><font color="#FF3600"><?=number_format($row[p_price])?> </font></b> 
                                  </td>
                                </tr>
<? }?>
                                <tr align="center"> 
                                  <td colspan="2" height="22"><img src="../img/main/4_line.jpg" width="235" height="7"></td>
                                </tr>
<? $row=mysql_fetch_array($result);
if($row[0]){
?>
                                <tr> 
                                  <td width="110" height="115"><a href="../product/product_detail.php?category=<?=$row[category]?>&p_code=<?=$row[p_code]?>" onFocus="blur()" title="<?=$row[p_name]?>"><?=shopimg("../product_img/".$row[p_code]."a.jpg",$hmax,$wmax,$size="s")?></a></td>
                                  <td width="125"><?=cut_string($row[p_name],50)?><br>
                                    <b><font color="#FF3600"><?=number_format($row[p_price])?> </font></b> 
                                  </td>
                                </tr>
<? }?>
                              </table>

                            </td>
                          </tr>
                          <tr> 
                            <td><img src="../img/main/4_3.jpg" width="260" height="13"></td>
                          </tr>
                        </table>
                      </td>
                      <td valign="top" width="260"> 
                        <table width="260" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td height="18" valign="top" background="../img/main/4_5.jpg"><img src="../img/main/4_4.jpg" width="260" height="13"></td>
                          </tr>
                          <tr> 
                            <td align="center" background="../img/main/4_5.jpg" height="199"> 
                              <table width="235" border="0" cellspacing="0" cellpadding="0" height="199">
<? $row=mysql_fetch_array($result);
if($row[0]){
?>	
                                <tr> 
                                  <td width="110" height="115"><a href="../product/product_detail.php?category=<?=$row[category]?>&p_code=<?=$row[p_code]?>" onFocus="blur()" title="<?=$row[p_name]?>"><?=shopimg("../product_img/".$row[p_code]."a.jpg",$hmax,$wmax,$size="s")?></a></td>
                                  <td width="125"><?=cut_string($row[p_name],50)?><br>
                                    <b><font color="#FF3600"><?=number_format($row[p_price])?> </font></b> 
                                  </td>
                                </tr>
<? }?>
                                <tr align="center"> 
                                  <td colspan="2" height="22"><img src="../img/main/4_line.jpg" width="235" height="7"></td>
                                </tr>
<? $row=mysql_fetch_array($result);
if($row[0]){
?>
                                <tr> 
                                  <td width="110" height="115"><a href="../product/product_detail.php?category=<?=$row[category]?>&p_code=<?=$row[p_code]?>" onFocus="blur()" title="<?=$row[p_name]?>"><?=shopimg("../product_img/".$row[p_code]."a.jpg",$hmax,$wmax,$size="s")?></a></td>
                                  <td width="125"><?=cut_string($row[p_name],50)?><br>
                                    <b><font color="#FF3600"><?=number_format($row[p_price])?> </font></b> 
                                  </td>
                                </tr>
<? }?>
                              </table>
                            </td>
                          </tr>
                          <tr> 
                            <td><img src="../img/main/4_6.jpg" width="260" height="13"></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr valign="top"> 
                      <td height="210"> 
                        <table width="260" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../img/main/4_7.jpg" width="260" height="13"></td>
                          </tr>
                          <tr> 
                            <td align="center" background="../img/main/4_2.jpg" height="199"> 
                              <table width="235" border="0" cellspacing="0" cellpadding="0" height="199">
<? $row=mysql_fetch_array($result);
if($row[0]){
?>	
                                <tr> 
                                  <td width="110" height="115"><a href="../product/product_detail.php?category=<?=$row[category]?>&p_code=<?=$row[p_code]?>" onFocus="blur()" title="<?=$row[p_name]?>"><?=shopimg("../product_img/".$row[p_code]."a.jpg",$hmax,$wmax,$size="s")?></a></td>
                                  <td width="125"><?=cut_string($row[p_name],50)?><br>
                                    <b><font color="#FF3600"><?=number_format($row[p_price])?> </font></b> 
                                  </td>
                                </tr>
<? }?>
                                <tr align="center"> 
                                  <td colspan="2" height="22"><img src="../img/main/4_line.jpg" width="235" height="7"></td>
                                </tr>
<? $row=mysql_fetch_array($result);
if($row[0]){
?>
                                <tr> 
                                  <td width="110" height="115"><a href="../product/product_detail.php?category=<?=$row[category]?>&p_code=<?=$row[p_code]?>" onFocus="blur()" title="<?=$row[p_name]?>"><?=shopimg("../product_img/".$row[p_code]."a.jpg",$hmax,$wmax,$size="s")?></a></td>
                                  <td width="125"><?=cut_string($row[p_name],50)?><br>
                                    <b><font color="#FF3600"><?=number_format($row[p_price])?> </font></b> 
                                  </td>
                                </tr>
<? }?>
                              </table>
                            </td>
                          </tr>
                          <tr> 
                            <td height="18" valign="bottom" background="../img/main/4_2.jpg"><img src="../img/main/4_8.jpg" width="260" height="13"></td>
                          </tr>
                        </table>
                      </td>
                      <td> 
                        <table width="260" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../img/main/4_9.jpg" width="260" height="13"></td>
                          </tr>
                          <tr> 
                            <td align="center" background="../img/main/4_5.jpg" height="199"> 
                              <table width="235" border="0" cellspacing="0" cellpadding="0" height="199">
<? $row=mysql_fetch_array($result);
if($row[0]){
?>	
                                <tr> 
                                  <td width="110" height="115"><a href="../product/product_detail.php?category=<?=$row[category]?>&p_code=<?=$row[p_code]?>" onFocus="blur()" title="<?=$row[p_name]?>"><?=shopimg("../product_img/".$row[p_code]."a.jpg",$hmax,$wmax,$size="s")?></a></td>
                                  <td width="125"><?=cut_string($row[p_name],50)?><br>
                                    <b><font color="#FF3600"><?=number_format($row[p_price])?> </font></b> 
                                  </td>
                                </tr>
<? }?>
                                <tr align="center"> 
                                  <td colspan="2" height="22"><img src="../img/main/4_line.jpg" width="235" height="7"></td>
                                </tr>
<? $row=mysql_fetch_array($result);
if($row[0]){
?>
                                <tr> 
                                  <td width="110" height="115"><a href="../product/product_detail.php?category=<?=$row[category]?>&p_code=<?=$row[p_code]?>" onFocus="blur()" title="<?=$row[p_name]?>"><?=shopimg("../product_img/".$row[p_code]."a.jpg",$hmax,$wmax,$size="s")?></a></td>
                                  <td width="125"><?=cut_string($row[p_name],50)?><br>
                                    <b><font color="#FF3600"><?=number_format($row[p_price])?> </font></b> 
                                  </td>
                                </tr>
<? }?>
                              </table>
                            </td>
                          </tr>
                          <tr> 
                            <td height="18" valign="bottom" background="../img/main/4_5.jpg"><img src="../img/main/4_10.jpg" width="260" height="13"></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>