<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<? include ("../include/title.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" href="../css/vsun.css" type="text/css">
<script TYPE='text/JavaScript' LANGUAGE='JavaScript1.2' SRC='../js/style.js'></script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><? include ("../include/top.php"); ?></td>
  </tr>
  <tr>
    <td align="center" valign="top">
	  <table width="890" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="175" valign="top"></td>
          <td height="10"></td>
        </tr>
		<tr>
          <td width="175" align="center" valign="top">
		    <table width="175" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td><? include ("../include/login.php"); ?></td>
              </tr>
              <tr> 
                <td height="7"></td>
              </tr>
              <tr> 
                <td><? include ("../include/category.php"); ?></td>
              </tr>
              <tr> 
                <td height="7"></td>
              </tr>
              <tr> 
                <td><? include ("../include/left_banner.php"); ?></td>
              </tr>
            </table>
		  </td>
          <td align="center" valign="top">
		    <table width="700" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="700"><img src="../img/product/stitle01.gif" width="700"></td>
              </tr>
              <tr> 
                <td align="center" valign="top">
				<!-- 상세정보 -->
<?
$hmax=250; $wmax=250;
$row=DBarrayTest("select * from products where p_code='%s'", array($p_code));
if ($row) {
  $options = explode("\n", trim($row['p_option']));
  $options2 = explode("\n", $row['p_option2']);
} else {
  echo "<script>alert('잘못된 상품 코드 입니다.'); window.history.back();</script>";
}
?>
<script>
function onlyNumber() {
	if(((event.keyCode > 64)&&(event.keyCode < 91))||((event.keyCode > 106)&&(event.keyCode < 123)))
		event.returnValue=false;
}
		function shopping_bag(){
			
				if(!form1.order_count.value){
					alert("수량을 입력하세요.");
					form1.order_count.focus();
					return ;
				}
			document.form1.action = "../cart/cartadd.php?pcode=<?=$p_code?>&dirct=basket";
			document.form1.submit();
		}
		function shopping_bag1(){
			
				if(!form1.order_count.value){
					alert("수량을 입력하세요.");
					form1.order_count.focus();
					return ;
				}
			document.form1.action = "../cart/cartadd.php?pcode=<?=$p_code?>&dirct=yes";
			document.form1.submit();
		}
function sum(){

		var t=form1.price.value * form1.order_count.value;
		var t_cost = document.getElementById('pay');
		t_cost.innerText = currFormat(t);
}
function currFormat(amount) {

		if (amount == 0) {
			return amount;
		}

		var len;
		var samount = String(amount);
		var new_amount = '';
		var cp = 0;

		len = samount.length;

		for (var i = len-1; i >= 0; i--) {
			if (cp != 0 && !(cp % 3)) {
				new_amount = ',' + new_amount;
			}

			new_amount = samount.substring(i,i+1) + new_amount;
			cp++;
		}

            return new_amount;
	}
	
</script>
<form name="form1" method="post">
<INPUT TYPE="hidden" name="price" value="<?=$row[p_price]?>">
				    <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <table width="650" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="260" valign="top">
                              <table width="260" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td align="center"><a href="../product/product.php"></a>
                                      <table width="260" height="260" border="0" cellpadding="1" cellspacing="1" bgcolor="#E6E6E6">
                                        <tr>
                                          <td align="center" bgcolor="#FFFFFF"><?=shopimg("../product_img/".$row[p_code]."b.jpg",$hmax,$wmax,"b")?></td>
                                        </tr>
                                      </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="38" align="center" valign="bottom"><a href="#"  onClick="MM_openBrWindow('detail_popup.php?p_code=<?=$row[p_code]?>','','width=450,height=500,top=10,right=740,left=10')" style="cursor:hand"><img src="../img/product/view_btn.gif"></a></td>
                                </tr>
                              </table>
                            </td>
                            <td width="30">&nbsp;</td>
                            <td width="360" valign="top">
                              <table width=360 border=0 cellpadding=0 cellspacing=0>
                                <tr> 
                                  <td colspan=3 style="padding:5" nowrap><b>&nbsp;<img src="../img/order/icon2.jpg" width="3" height="6" align="absmiddle"><?=$row[p_name]?></b> </td>
                                </tr>
                                <tr> 
                                  <td colspan=3 height=1 bgcolor=#CCCCCC></td>
                                </tr>
                                <tr> 
                                  <td colspan=3 height=2 bgcolor=#FAFAFA></td>
                                </tr>
								<tr style="padding:6 0 6 0"> 
                                  <td width=86 height="26" bgcolor="#F9F9F9" style="padding-left:15">분류</td>
                                  <td width=4 align="center" bgcolor="#F9F9F9">:</td>
                                  <td width=270 bgcolor="#F9F9F9"><font color="#333333">&nbsp;<?=categoryname($row[category],"","/product/product.php","","")?></font> </td>
                                </tr>
                                <tr> 
                                  <td height=1 colspan=3 bgcolor=#CCCCCC></td>
                                </tr>
                                <tr style="padding:6 0 6 0"> 
                                  <td width=86 height="26" bgcolor="#F9F9F9" style="padding-left:15">제품가격</td>
                                  <td width=4 align="center" bgcolor="#F9F9F9">:</td>
                                  <td width=270 bgcolor="#F9F9F9"><font color=#6FA637><b>&nbsp;<font color="#000099"><?=number_format($row[p_price])?>원</font></b></font> 
                                  </td>
                                </tr>
                                <tr> 
                                  <td height=1 colspan=3 bgcolor=#CCCCCC></td>
                                </tr>
<? if($row[p_option]):
for($cnt=0;$cnt<sizeof($options);$cnt++){
	$options_valu=explode("=",$options[$cnt]);
?>
								<tr style="padding:6 0 6 0"> 
                                  <td width=86 height="26" bgcolor="#F9F9F9" style="padding-left:15"><?=$options_valu[0]?></td>
                                  <td width=4 align="center" bgcolor="#F9F9F9">:</td>
                                  <td width=270 bgcolor="#F9F9F9">&nbsp;<?=$options_valu[1]?>
                                  </td>
                                </tr>
                                <tr> 
                                  <td height=1 colspan=3 bgcolor=#CCCCCC></td>
                                </tr>
<? } ?>
<?endif;?>
                                <tr bgcolor=FFFFFF style="padding:6 0 6 0"> 
                                  <td height="26" style="padding-left:15">구매수량</td>
                                  <td align="center">:</td>
                                  <td> &nbsp; 
                                    <input  name="order_count" value=1 dir=rtl id=ea type="text" class="textbox1" size="5" onKeyDown="onlyNumber();" onKeyUp="sum();">
                                    개</td>
                                </tr>
                                <tr> 
                                  <td height=1 colspan=3 bgcolor=#CCCCCC></td>
                                </tr>
                                <tr> 
                                  <td colspan=3 height=2></td>
                                </tr>
                                <tr bgcolor="#EEF2FF" style="padding:6 0 6 0" > 
                                  <td height="26" style="padding-left:15"><b>합계 
                                    금액</b></td>
                                  <td align="center">:</td>
                                  <td height="27"><font color=#6FA637><b>&nbsp;<font color="#000099"><span id="pay"></span>원</font></b></font></td>
                                </tr>
                                <tr> 
                                  <td colspan=3 height=2></td>
                                </tr>
                                <tr> 
                                  <td height=1 colspan=3 bgcolor=#CCCCCC></td>
                                </tr>
                                <tr> 
                                  <td colspan=3 align="center"><br>  <a href="javascript:shopping_bag1()"><img src="../img/product/buy_btn.gif" border="0"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:shopping_bag()"><img src="../img/product/basket_btn.gif" border="0"></a></td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td><br>
                          <br>
                      </td>
                    </tr>
                    <tr>
                      <td><img src="../img/product/detail_title.gif" width="650" border="0"></td>
                    </tr>
                    <tr>
                      <td><br>
                          <table width="650" border="8" cellspacing="0" cellpadding="8" bordercolor="#F9F9F9" style='table-layout:fixed'>
                            <tr bordercolor="#EEEEEE">
                              <td><?=stripslashes($row[p_comment])?></td>
                            </tr>
                          </table>
                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><img src="../img/product/send_title.gif" width="650" border="0"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>
                        <table width="650" border="8" cellspacing="0" cellpadding="8" bordercolor="#F9F9F9">
                          <tr bordercolor="#EEEEEE">
                            <td><b><img src="../img/product/icon.gif" width="10" height="11" align="absmiddle"> 배송기간 및 배송방법</b><br>
                              <br>
                              <?=stripslashes(nl2br($admin_row[A_baesong01]))?>
							  <br>
							<br>
							<table width="100%" border="0" cellpadding="0" cellspacing="0">
  								<tr>
    								<td height="3" background="../img/member/dot.gif"></td>
  								</tr>
							</table>
							<br>
							<b><img src="../img/product/icon.gif" width="10" height="11" align="absmiddle"> 교환/반품/환불</b><br>
							<br>
							<?=stripslashes(nl2br($admin_row[A_baesong02]))?>
							<br>
								<table width="100%" border="0" cellpadding="0" cellspacing="0">
  									<tr>
    								  <td height="3" background="../img/member/dot.gif"></td>
  									</tr>
								</table>
							<br>
							<b><img src="../img/product/icon.gif" width="10" height="11" align="absmiddle"> 주문취소</b><br>
							<br>
							<?=stripslashes(nl2br($admin_row[A_baesong03]))?>
							</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
				  <br>
				  <a href="../product/product.php"><img src="../img/order/con_btn.gif" border="0"></a>
                  <br>
                  <br>
                  <!-- 상세정보 -->

                </td>
              </tr>
              <tr> 
                <td>&nbsp; </td>
              </tr>
            </table>
		   </td>
        </tr>
      </table>
	  </td>
  </tr>
  <tr>
    <td align="center" valign="top"><? include ("../include/copyright.php"); ?></td>
  </tr>
</table>
</body>
</html>
<script>sum();</script>