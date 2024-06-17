
<form name=form1 action=../cart/cartupdate.php method=post>
<table cellspacing=0 cellpadding=0 width=570 border=0>
                          <tbody>
                            <tr>
                              <td width=227 height=33><img height=33 src="../img/basket/name.gif" width=227></td>
                              <td width=103 ><img height=33 src="../img/basket/ea.gif" width=103></td>
                              <td width=90 ><img height=33 src="../img/basket/price.gif"></td>
                              <td width=77 ><img height=33 src="../img/basket/add.gif" width=77></td>
                              <td width=71 ><img height=33 src="../img/basket/delete.gif" width=71></td>
                            </tr>
                          </tbody>
                        </table>
                  <table cellspacing=0 cellpadding=0 width=570 border=0>
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
                    <tr> 
                      <td width=227 height=28>&nbsp;&nbsp; <a href="../shopping/detail.php?p_code=<?=$row[p_code]?>"><?=$row[p_name]?></a></td>
                      <td align=middle width=103> 
                       <input name="count[]" type="text" size="4" style="border: 1px solid #DADADA; background-color:#FFFFFF; font-size:8pt; font-family:돋움" value="<?=$row[p_count]?>" dir='rtl'>&nbsp;개&nbsp; 
						<A HREF="javascript:document.form1.submit();"><img src="../img/shopping/edit.jpg" width="14" height="13" align="absmiddle">수정</a></td>

                      <td align=middle width=90><font 
                        color=#ff9900><strong><?=number_format($row[p_price])?>원</strong></font></td>
                      <td align=middle  nowrap><font 
                        color=#ff0000><strong><?=number_format($row[p_price]*$row[p_count])?>원</strong></font></td>
                      <td align=middle width=71><img src="../img/shopping/delete.jpg" width="14" height="13" align="absmiddle"> 
                        <a href="../cart/cartupdate.php?c_id=<?=$row[c_id]?>">삭제</a></td>
                    </tr>
                    <tr> 
                      <td background="../img/board/board/dot.gif"height="3" colspan="5"></td>
                    </tr>
<? } 
################배송관련##################
	Baesong($totprice);

################배송관련##################
?>
                    <tr> 
                      <td colspan=5 height=28>&nbsp;&nbsp;[배송료] <strong><?=number_format($BAESONG)?>원 
                        이상 구매시 배송료 <?=number_format($BAESONGBI)?>원 무료</strong></td>
                    </tr>
                    </tbody>
                  </table>
                  <table cellspacing=0 cellpadding=0 width=570 border=0>
                    <tbody> 
                    <tr> 
                      <td bgcolor=#dfdfdf colspan=6 height=1></td>
                    </tr>
                    <tr> 
                      <td colspan=6 height=1></td>
                    </tr>
                    <tr align=right bgcolor=#f6f6f6> 
                      <td width=200 height=28>주문금액</td>
                      <td align=middle width=94 height=28 nowrap><font 
                        color=#ff9900><strong><?=number_format($totprice)?>원</strong></font></td>
                      <td width=50 height=28>배송료</td>
                      <td align=middle width=94 height=28 nowrap><font 
                        color=#ff0000><strong><?=$string_baesong?></strong></font></td>
                      <td width=72 height=28 nowrap>총 결제금액</td>
                      <td align=middle width=94 nowrap><font 
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