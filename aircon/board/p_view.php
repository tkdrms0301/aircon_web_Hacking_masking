<?
$hmax=240; $wmax=240;
$p_row=DBarray("select * from products where p_code='$row[p_code]'");
$options = explode("\n",trim($p_row[p_option]));
$options2 = explode("\n",$p_row[p_option2]);
?>
<table width="640" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="250">
                              <table width="200" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td align="center"><a href="../product/product.php"></a>
                                    <table width="250" height="250" border="0" cellpadding="1" cellspacing="1" bgcolor="#E6E6E6">
                                      <tr>
                                        <td align="center" bgcolor="#FFFFFF"><?=shopimg("../product_img/".$p_row[p_code]."b.jpg",$hmax,$wmax,"b")?></td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                                
                              </table>
                            </td>
                            <td width="30">&nbsp;</td>
                            <td width="360" valign="top">

                              <TABLE width=360 border=0 cellpadding=0 cellspacing=0>
                                  <TR>
                                    <TD colspan=3 style="padding:5"><b>&nbsp;<img src="../img/shopping/icon2.jpg" width="3" height="6" align="absmiddle"> <?=$p_row[p_name]?></b> </TD>
                                  </TR>
                                  <TR>
                                    <TD colspan=3 height=1 bgcolor=#CCCCCC></TD>
                                  </TR>
                                  <TR>
                                    <TD colspan=3 height=2 bgcolor=#FAFAFA></TD>
                                  </TR>
                                  <TR style="padding:6 0 6 0">
                                    <TD width=130 height="26" bgcolor="#F2F2F2" style="padding-left:15">제품가격</TD>
                                    <TD width=20 align="center" bgcolor="#F2F2F2">:</TD>
                                    <TD width=210 bgcolor="#F2F2F2"><font color=B15E58><b><?=number_format($p_row[p_price])?>원</b></font> </TD>
                                </TR>
                                  <TR>
                                    <TD height="26" bgcolor="#F2F2F2" style="padding-left:15">적립금</TD>
                                    <TD align="center" bgcolor="#F2F2F2">:</TD>
                                    <TD bgcolor="#F2F2F2"><?=number_format($p_row[p_price]*$PERCENT_POINT)?>원(<?=($PERCENT_POINT*100)?>%) </TD>
                                  </TR>
                                  <TR>
                                    <TD colspan=3 height=2 bgcolor=FFFFFF></TD>
                                  </TR>
                                  <TR>
                                    <TD height=1 colspan=3 bgcolor=#CCCCCC></TD>
                                  </TR>
                                  <TR style="padding:6 0 6 0">
                                    <TD height="26" style="padding-left:15">제조원</TD>
                                    <TD align="center">:</TD>
                                    <TD><?=$p_row[make_com]?></TD>
                                </TR>
                                   <TR>
                                    <TD height=1 colspan=3 bgcolor=#E7E7E7></TD>
                                  </TR>
<!---option----------->
<? if($p_row[p_option]):
for($cnt=0;$cnt<sizeof($options);$cnt++){
	$options_valu=explode("=",$options[$cnt]);
?>
                                  <TR bgcolor=FFFFFF style="padding:6 0 6 0">
                                    <TD height="26" style="padding-left:15"><?=$options_valu[0]?> </TD>
                                    <TD align="center">:</TD>
                                    <TD><?=$options_valu[1]?> </TD>
                                  </TR>
								  <TR>
                                    <TD height=1 colspan=3 bgcolor=#E7E7E7></TD>
                                  </TR>
<? } ?>
<?endif;?>
                                  
                                  <TR>
                                    <TD colspan=3 height=2></TD>
                                  </TR>
                                  <TR>
                                    <TD height=1 colspan=3 bgcolor=#CCCCCC></TD>
                                  </TR>
                                  
                              </TABLE>
                            </td>
                          </tr>
                        </table>