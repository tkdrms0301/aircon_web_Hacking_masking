<? include "../admin/head.php";?>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<TABLE>
<TR>
	<TD align=center>
<!--------------->
<table width="659" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="659"><img src="../img/market/stitle.gif" width="659" height="49"> 
                </td>
              </tr>
              <tr> 
                <td align="center" valign="top"> 
                  <!-- 팡팡 상세보기 -->
<?
$hmax=250; $wmax=250;
$row=DBarray("select * from market where no='$no'");

?>
                  <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td> <table width="650" border="0" cellpadding="0" cellspacing="0">
                          <tr> 
                            <td width="260"> <table width="260" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center"><a href="../product/product.php"></a> 
                                    <table width="260" height="260" border="0" cellpadding="1" cellspacing="1" bgcolor="#E6E6E6">
                                      <tr> 
                                        <td align="center" bgcolor="#FFFFFF"><?=shopimg("../market_img/".$row[no]."b.jpg",$hmax,$wmax,"b")?></td>
                                      </tr>
                                    </table></td>
                                </tr>
                                <tr> 
                                  <td height="38" align="center" valign="bottom"><a href="#"  onClick="MM_openBrWindow('../market/detail_popup.php?no=<?=$row[no]?>','','width=450,height=500,top=10,right=740,left=10')"><img src="../img/product/view_btn.gif"></a></td>
                                </tr>
                              </table></td>
                            <td width="30">&nbsp;</td>
                            <td width="360" valign="top"> 
                              <table width=360 border=0 cellpadding=0 cellspacing=0>
                                <tr> 
                                  <td colspan=3 style="padding:5"><b>&nbsp;<img src="../img/order/icon2.jpg" width="3" height="6" align="absmiddle"> 
                                    <?=$row[p_name]?>  </b> </td>
                                </tr>
                                <tr> 
                                  <td colspan=3 height=1 bgcolor=#CCCCCC></td>
                                </tr>
                                <tr> 
                                  <td colspan=3 height=2 bgcolor=#FAFAFA></td>
                                </tr>
                                <tr style="padding:6 0 6 0"> 
                                  <td width=135 height="26" bgcolor="#F9F9F9" style="padding-left:15">제품가격</td>
                                  <td width=20 align="center" bgcolor="#F9F9F9">:</td>
                                  <td width=195 bgcolor="#F9F9F9"><font color=#6FA637><b><?=number_format($row[p_price])?>원</b></font> 
                                  </td>
                                </tr>
                                <tr> 
                                  <td height=1 colspan=3 bgcolor=#CCCCCC></td>
                                </tr>
                                <tr> 
                                  <td colspan=3 align="center"><br>
                                    &nbsp;&nbsp;&nbsp;</td>
                                </tr>
                                <tr>
                                  <td colspan=3 align="center">
                                    <table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#CCCCCC">
                                      <tr>
                                        <td bgcolor="#FFFFFF" align="center">팡팡장터의 
                                          모든 상품 및 상품 정보는<br>
                                          뷰티몰에서 제공하는 것이 아닙니다.<br>
                                          상품 및 상품 정보에 대한 모든 책임은<br>
                                          등록자/판매자에게 있습니다.</td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr> 
                      <td><br> <br> </td>
                    </tr>
                    <tr> 
                      <td><img src="../img/product/detail_title.gif" width="650" height="30" border="0"></td>
                    </tr>
                    <tr> 
                      <td><br> <table width="650" border="8" cellspacing="0" cellpadding="8" bordercolor="#F9F9F9">
                          <tr bordercolor="#EEEEEE"> 
                            <td>
<? if($row[htmlYN]=="y"){?>
<?=stripslashes($row[p_comment])?>
<? }else{?>
<?=stripslashes(nl2br($row[p_comment]))?>
<? } ?> 
							</td>
                          </tr>
                        </table></td>
                    </tr>
                  </table>
                  <br>
                  <!-- 팡팡 상세보기 -->

                </td>
              </tr>
              <tr> 
                <td align=right>&nbsp; 
<A HREF="market_regi.php?mode=form&no=<?=$row[no]?>&offset=<?=$offset?>&category=<?=$row[category]?>&s_category=<?=$s_category?>"><IMG SRC="../img/market/pang_edit_btn.gif" WIDTH="81" HEIGHT="30" BORDER="0" ALT=""></A>&nbsp;
<A HREF="market_del.php?no=<?=$row[no]?>&offset=<?=$offset?>&category=<?=$row[category]?>&s_category=<?=$s_category?>"><IMG SRC="../img/market/pang_del_btn.gif" WIDTH="81" HEIGHT="30" BORDER="0" ALT="" onClick="return confirm('삭제하시겠습니까?')"></A>&nbsp;
<A HREF="market.php?offset=<?=$offset?>&category=<?=$row[category]?>&s_category=<?=$s_category?>"><IMG SRC="../img/market/pang_list_btn.gif" WIDTH="81" HEIGHT="30" BORDER="0" ALT=""> </A>
				
				</td>
              </tr>
            </table>
<!--------------->
	</TD>
</TR>
</TABLE>

<? include "../admin/tail.php";?>