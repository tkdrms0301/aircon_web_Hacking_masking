
<form name=form1 action=../cart/cartupdate.php method=post>
<table cellspacing=0 cellpadding=0 width=650 align="center" border=0 background="../img/order/bg.jpg">
 <TBODY>
                            <TR>
                              <TD width=290 height=33 align="center"><img src="../img/order/pro1.jpg"  ></TD>
                              <TD width=5><img src="../img/order/bar.jpg" width="5" ></TD>
                              <TD width=110 align="center"><img src="../img/order/su.jpg" ></TD>
                              <TD width=5><img src="../img/order/bar.jpg" width="5" ></TD>
                              <TD width=80 align="center"><img src="../img/order/money.jpg"></TD>
                              <TD width=5><img src="../img/order/bar.jpg" width="5" ></TD>
                              <TD width=80 align="center"><img src="../img/order/total.jpg" ></TD>
                              <TD width=5><img src="../img/order/bar.jpg" width="5" ></TD>
                              <TD width=60 align="center"><img src="../img/order/del.jpg"  ></TD>
                            </TR>
                          </TBODY>
</table>
                  <table cellspacing=0 cellpadding=0 width=650 border=0 align="center">
<?php

include "../include/session_config.php";
$query = DBquery("select * from cart where cartid ='".$_SESSION['cartid']."'");
$cn=0;
while($row=mysql_fetch_array($query)){
	$category=substr($row[p_code],0,6);
	$cn++;
	$totprice +=($row[p_price]*$row[p_count]);

	$p_point=($row[p_price]*$row[p_count])*$PERCENT_POINT;
	$TOT_POINT +=$p_point;
	$PRODUCT .="$row[p_code]|$row[p_option]|$row[p_count]|$row[p_name]|$row[p_price]|$p_point@@";

	if($row[p_option]) $p_option = "<FONT  COLOR='#FF0099'>-".$row[p_option]."</FONT>";
?>
<input type="hidden" name="chk[]" value="<?=$row[c_id]?>">
<tbody>
<TR>
                            <TD width=90 height=70 align="center">
							<img src="../product_img/<?=$row[p_code]?>a.jpg" width="60" height="60"></TD>
                            <TD width=202><b><font color="#000000"><?=$row[p_name]?> </font></b></TD>
                            <TD align=center width=115>
                              <input name="count[]" type="text" class="textbox1" size="5" value="<?=$row[p_count]?>">
                            개&nbsp; <A HREF="javascript:document.form1.submit();"><IMG height=13 src="../img/order/edit.jpg" width=14 align=absMiddle> 수정</a></TD>
                            <TD align=center width=85><FONT color=#6FA637><STRONG><?=number_format($row[p_price])?>원</STRONG></FONT></TD>
                            <TD align=center width=86><FONT color=#ff0000><STRONG><?=number_format($row[p_price]*$row[p_count])?>원</STRONG></FONT></TD>
                            <TD align=center width=62><IMG height=13 src="../img/order/delete.jpg" width=14 
                        align=absMiddle> <a href="../cart/cartupdate.php?c_id=<?=$row[c_id]?>">삭제</a></TD>
                          </TR>
                          <TR>
                            <TD background="../img/order/dot.gif" colSpan=6 height=3></TD>
                          </TR>

                     
                    
<? } 
################배송관련##################
	Baesong($totprice);

################배송관련##################
?>
                    <tr> 
                      <td colspan=6 height=28 align="right"><b>[기본 배송료]</b> <strong><?=number_format($BAESONG)?>원 
                        이상 구매시 배송료 <?=number_format($BAESONGBI)?>원 무료</strong></td>
                    </tr>
                    </tbody>
                  </table>
                  <table cellspacing=0 cellpadding=0 width=650 border=0 align="center">
                    <tbody> 
                    <tr> 
                      <td bgcolor=#dfdfdf colspan=6 height=1></td>
                    </tr>
                    <tr> 
                      <td colspan=6 height=1></td>
                    </tr>
                    <tr align=right bgcolor=#f6f6f6> 
                      <td width=312 height=28>주문금액</td>
                      <td align=middle width=94 height=28><font 
                        color=#6FA637><strong><?=number_format($totprice)?>원</strong></font></td>
                      <td width=42 height=28>배송료</td>
                      <td align=middle width=94 height=28><font 
                        color=#ff0000><strong><?=$string_baesong?></strong></font></td>
                      <td width=72 height=28>총 결제금액</td>
                      <td align=middle width=94><font 
                        color=#ff0000><strong><?=number_format($TOTALPRICE)?>원</strong></font></td>
                    </tr>
                    <tr> 
                      <td colspan=6 height=1></td>
                    </tr>
 
                    <tr> 
                      <td bgcolor=#dfdfdf colspan=6 
                    height=1></td>
                    </tr>
                    </tbody>
                  </table>
				  </form>