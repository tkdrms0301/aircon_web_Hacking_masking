<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<? include ("../include/title.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" href="../css/vsun.css" type="text/css">
<script TYPE='text/JavaScript' LANGUAGE='JavaScript1.2' SRC='../js/style.js'></script>
<script language="JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
// -->
</script>
<script>
function check_same() {
	if (order.same.checked==true) {
		order.rname.value=order.name.value;
		order.rzip1.value=order.zip1.value;
		order.rzip2.value=order.zip2.value;
		order.rjuso1.value=order.juso1.value;
		order.rjuso2.value=order.juso2.value;
		order.rtel1.value=order.tel1.value;
		order.rtel2.value=order.tel2.value;
		order.rtel3.value=order.tel3.value;
		order.rcell1.value=order.cell1.value;
		order.rcell2.value=order.cell2.value;
		order.rcell3.value=order.cell3.value;
		order.remail.value=order.email.value;
	}
	else {
		order.rname.value='';
		order.rzip1.value='';
		order.rzip2.value='';
		order.rjuso1.value='';
		order.rjuso2.value='';
		order.rtel1.value='';
		order.rtel2.value='';
		order.rtel3.value='';
		order.rcell1.value='';
		order.rcell2.value='';
		order.rcell3.value='';
		order.remail.value='';	
	}
}
function pop_up1(url) {
  window.open(url,'search','width=500, height=250, scrollbars=no status=yes');
}
function check_email () {
	var form=document.order;
	var t = form.email.value;
	if (t != '') {
		var Alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		var Digit = '1234567890';
		var Symbol='_-';
		var check = '@.' + Alpha + Digit + Symbol;
		for (i=0; i < t.length; i++) {
			if(check.indexOf(t.substring(i,i+1)) < 0) {
				alert('Email이 정확하지 않습니다.');
				order.email.value = "";
				return true;
			}
		}
		var check = '@';
		var a = 0;
		for (i=0; i < t.length; i++) {
			if(check.indexOf(t.substring(i,i+1)) >= 0) {
				a = 1;
			}
		}
		var check = '.';
		var b = 0;
		for (i=0; i < t.length; i++) {
			if(check.indexOf(t.substring(i,i+1)) >= 0) b = 1;
		}

		if (a == 1) {
			if (b == 1);
			else {
				alert("E-mail이 정확하지 않습니다.");
				form.email.value = "";
				return true;
			}
		}
		else {
			alert("E-mail이 정확하지 않습니다.");
			form.email.value = "";
			return true;
		}

	}
	else {
		alert("E-mail을 입력해 주십시요.");
		form.email.focus();
		return true;
	}
}

function check_remail () {
	var form=document.order;
	var t = form.remail.value;
	if (t != '') {
		var Alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		var Digit = '1234567890';
		var Symbol='_-';
		var check = '@.' + Alpha + Digit + Symbol;
		for (i=0; i < t.length; i++) {
			if(check.indexOf(t.substring(i,i+1)) < 0) {
				alert('(수령자)Email이 정확하지 않습니다.');
				order.remail.value = "";
				return true;
			}
		}
		var check = '@';
		var a = 0;
		for (i=0; i < t.length; i++) {
			if(check.indexOf(t.substring(i,i+1)) >= 0) {
				a = 1;
			}
		}
		var check = '.';
		var b = 0;
		for (i=0; i < t.length; i++) {
			if(check.indexOf(t.substring(i,i+1)) >= 0) b = 1;
		}

		if (a == 1) {
			if (b == 1);
			else {
				alert("(수령자)E-mail이 정확하지 않습니다.");
				form.remail.value = "";
				return true;
			}
		}
		else {
			alert("(수령자)E-mail이 정확하지 않습니다.");
			form.remail.value = "";
			return true;
		}

	}
	else {
		alert("(수령자)E-mail을 입력해 주십시요.");
		form.remail.focus();
		return true;
	}
}

function check_submit() {
	if (!order.PRODUCT.value) {
		alert('주문하실 상품정보가 없습니다.');
		return false;
	}
	if (!order.name.value) {
		alert('이름을 입력하세요.');
		order.name.focus();
		return false;
	}
	if (!order.zip1.value) {
		alert('우편번호검색을 이용해서 주소를 입력하세요.');
		return false;
	}
	if (!order.juso2.value) {
		alert('상세주소를 입력하세요.');
		order.juso2.focus();
		return false;
	}
	if (!order.tel1.value || !order.tel2.value || !order.tel3.value ) {
		alert('전화번호를 입력하세요.');
		order.tel1.focus();
		return false;
	}
	if (!order.cell1.value || !order.cell2.value || !order.cell3.value ) {
		alert('휴대폰번호를 입력하세요.');
		order.cell1.focus();
		return false;
	}
	if (check_email()) {
		return false;
	}
	if (!order.rname.value) {
		alert('(수령자)이름을 입력하세요.');
		order.rname.focus();
		return false;
	}
	if (!order.rzip1.value) {
		alert('(수령자)우편번호검색을 이용해서 주소를 입력하세요.');
		return false;
	}
	if (!order.rjuso2.value) {
		alert('(수령자)상세주소를 입력하세요.');
		order.rjuso2.focus();
		return false;
	}
	if (!order.rtel1.value || !order.rtel2.value || !order.rtel3.value ) {
		alert('(수령자)전화번호를 입력하세요.');
		order.rtel1.focus();
		return false;
	}
	if (!order.rcell1.value || !order.rcell2.value || !order.rcell3.value ) {
		alert('(수령자)휴대폰번호를 입력하세요.');
		order.rcell1.focus();
		return false;
	}
	if (check_remail()) {
		return false;
	}

	order.action="orderForm_ok.php";
	return true;
}

function cardpay() {
	order.bank.disabled=true;
}

function bankpay() {
	order.bank.disabled=false;
}

function tax_check(){
	var sub1 = document.getElementById("tax_table");
	if(order.tax[0].checked==true){
			sub1.style.display="inline";
	}else{
			sub1.style.display="none";
	}
}
</script>
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
          <td align="right" valign="top">
		    <table width="700" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="700"><img src="../img/order/stitle.gif" width="700" > 
                </td>
              </tr>
              <tr> 
                <td align="center" valign="top">
				<!-- 주문서 -->
<? include "../include/cart.php"?>
<?php
include '../include/xss_filter.php';
$user_input = isset($_GET['contents']) ? $_GET['contents'] : '';
$sanitized_input = sanitize_input($user_input);

include '../include/session_config.php';
if(!$ORDERNO)$ORDERNO=$_SESSION['cartid'];

$user_row['name'] = sanitize_input($user_row['name']);
$user_row['address1'] = sanitize_input($user_row['address1']);
$user_row['address2'] = sanitize_input($user_row['address2']);
$zip[0] = sanitize_input($zip[0]);
$zip[1] = sanitize_input($zip[1]);
$tel[0] = sanitize_input($tel[0]);
$tel[1] = sanitize_input($tel[1]);
$tel[2] = sanitize_input($tel[2]);
$cell[0] = sanitize_input($cell[0]);
$cell[1] = sanitize_input($cell[1]);
$cell[2] = sanitize_input($cell[2]);
$user_row['email'] = sanitize_input($user_row['email']);
?>
<br>
<form name="order" method="post"  onSubmit="return check_submit()">
				  <input type="hidden" name="TOTALPRICE" value="<?= sanitize_input($TOTALPRICE) ?>">
				  <input type="hidden" name="PRODUCT" value="<?=$PRODUCT?>">
				  <input type="hidden" name="TOT_POINT" value="<?= sanitize_input($TOT_POINT) ?>">
				  <input type="hidden" name="orderno" value="<?= sanitize_input($ORDERNO) ?>">
				   <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                   
                    <tr>
                      <td><img src="../img/order/ju_title.gif" width="650" height="30" border="0"></td>
                    </tr>
                    <tr>
                      <td height="10"></td>
                    </tr>
                    <tr>
                      <td>
                        <TABLE cellSpacing=1 cellPadding=0 width=650 bgColor=#EBEBEB border=0>
                          <TR bgColor=#ffffff>
                            <TD width=125 bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>성명</STRONG> </TD>
                            <TD width="512" height=32>&nbsp;&nbsp;
                                <INPUT class=textbox1 id=name size=10 name=name value="<?= sanitize_input($user_row['name']) ?>">
                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=64>&nbsp;&nbsp; <STRONG>주소</STRONG></TD>
                            <TD height=32>&nbsp;&nbsp;
                                <INPUT class=textbox1 readOnly size=4 name=zip1 value="<?= sanitize_input($zip[0]) ?>" >
                              -
                              <INPUT class=textbox1 readOnly size=4 name=zip2 value="<?= sanitize_input($zip[1]) ?>">
                              &nbsp;<A 
                        href="javascript:pop_up1('zipcode.php')"><img src="../img/member/zipcode.jpg" width="67" height="19" align="absmiddle"></a><BR>
                              &nbsp;&nbsp;
                              <INPUT class=textbox1 id=juso1 size=70 name=juso1 value="<?= sanitize_input($user_row['address1']) ?>">
                              <BR>
                              &nbsp;&nbsp;
                              <INPUT class=textbox1 id=juso2 size=70 name=juso2 value="<?= sanitize_input($user_row['address2']) ?>">
                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>전화번호</STRONG> </TD>
                            <TD height=32>&nbsp;&nbsp;
                                <select name="tel1" id="tel1">
                          <option value="02" <? if ($tel[0]=="02") echo "selected";?>>02</option>
                          <option value="031" <? if ($tel[0]=="031") echo "selected";?>>031</option>
                          <option value="032" <? if ($tel[0]=="032") echo "selected";?>>032</option>
                          <option value="033" <? if ($tel[0]=="033") echo "selected";?>>033</option>
                          <option value="041" <? if ($tel[0]=="041") echo "selected";?>>041</option>
                          <option value="042" <? if ($tel[0]=="042") echo "selected";?>>042</option>
                          <option value="043" <? if ($tel[0]=="043") echo "selected";?>>043</option>
                          <option value="051" <? if ($tel[0]=="051") echo "selected";?>>051</option>
                          <option value="052" <? if ($tel[0]=="052") echo "selected";?>>052</option>
                          <option value="053" <? if ($tel[0]=="053") echo "selected";?>>053</option>
                          <option value="054" <? if ($tel[0]=="054") echo "selected";?>>054</option>
                          <option value="055" <? if ($tel[0]=="055") echo "selected";?>>055</option>
                          <option value="061" <? if ($tel[0]=="061") echo "selected";?>>061</option>
                          <option value="062" <? if ($tel[0]=="062") echo "selected";?>>062</option>
                          <option value="063" <? if ($tel[0]=="063") echo "selected";?>>063</option>
                          <option value="064" <? if ($tel[0]=="064") echo "selected";?>>064</option>
                        </select>
                        - 
                        <input name="tel2" type="text" id="tel2"  size="4" maxlength = "4" class="textbox1" value="<?= sanitize_input($tel[1]) ?>">
                        - 
                      <input name="tel3" type="text" id="tel3"  size="4" maxlength = "4" class="textbox1" value="<?= sanitize_input($tel[2]) ?>">
                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>핸드폰번호</STRONG> </TD>
                            <TD height=32>&nbsp;&nbsp;
                                <select name="cell1" id="cell1">
                        <option value="010" <? if ($cell[0]=="010") echo "selected";?>>010</option>
                        <option value="011" <? if ($cell[0]=="011") echo "selected";?>>011</option>
                        <option value="016" <? if ($cell[0]=="016") echo "selected";?>>016</option>
                        <option value="017" <? if ($cell[0]=="017") echo "selected";?>>017</option>
                        <option value="018" <? if ($cell[0]=="018") echo "selected";?>>018</option>
                        <option value="019" <? if ($cell[0]=="019") echo "selected";?>>019</option>
                      </select>
                        - 
                        <input name="cell2"  size=4 maxLength=4 class="textbox1" value="<?= sanitize_input($cell[1]) ?>" >
                        - 
                      <input name="cell3"  size=4 maxLength=4 class="textbox1" value="<?= sanitize_input($cell[2]) ?>" >
                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>이메일</STRONG> </TD>
                            <TD height=32>&nbsp;&nbsp;
                                <INPUT class=textbox1 size=50 name=email value="<?= sanitize_input($user_row['email']) ?>">
                            </TD>
                          </TR>
                        </TABLE>
                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center"><STRONG><img src="../img/order/icon.jpg" width="4" height="4" align="absmiddle">&nbsp;주문하신 분과 받으실 분의 정보가 동일합니까?</STRONG>&nbsp;
                        <input name="same" type="checkbox" id="same" value="checkbox" onClick="check_same();">
예 </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><img src="../img/order/su_title.gif" width="650" height="30" border="0"></td>
                    </tr>
                    <tr>
                      <td height="10"></td>
                    </tr>
                    <tr>
                      <td>
                        <TABLE cellSpacing=1 cellPadding=0 width=650 bgColor=#EBEBEB border=0>
                          <TR bgColor=#ffffff>
                            <TD width=125 bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>성명</STRONG> </TD>
                            <TD width="512" height=32>&nbsp;&nbsp;
                                <INPUT class=textbox1 id=rname size=10 name=rname>
                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=64>&nbsp;&nbsp; <STRONG>주소</STRONG></TD>
                            <TD height=32>&nbsp;&nbsp;
                                <INPUT class=textbox1 readOnly size=4 name=rzip1>
                              -
                              <INPUT class=textbox1 readOnly size=4 name=rzip2>
                              &nbsp;<A 
                        href="javascript:pop_up1('zipcode1.php')"><img src="../img/member/zipcode.jpg" width="67" height="19" align="absmiddle"></a><BR>
                              &nbsp;&nbsp;
                              <INPUT class=textbox1 id=rjuso1 size=70 name=rjuso1>
                              <BR>
                              &nbsp;&nbsp;
                              <INPUT class=textbox1 id=rjuso2 size=70 name=rjuso2>
                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>전화번호</STRONG> </TD>
                            <TD height=32>&nbsp;&nbsp;
                                <select name="rtel1" id="rtel1">
                          <option value="02">02</option>
                          <option value="031">031</option>
                          <option value="032">032</option>
                          <option value="033">033</option>
                          <option value="041">041</option>
                          <option value="042">042</option>
                          <option value="043">043</option>
                          <option value="051">051</option>
                          <option value="052">052</option>
                          <option value="053">053</option>
                          <option value="054">054</option>
                          <option value="055">055</option>
                          <option value="061">061</option>
                          <option value="062">062</option>
                          <option value="063">063</option>
                          <option value="064">064</option>
                        </select>
                        - 
                        <input name="rtel2" type="text" id="tel22" size="4" maxlength = "4" class="textbox1">
                        - 
                        <input name="rtel3" type="text" id="tel32" size="4" maxlength = "4" class="textbox1">
                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>핸드폰번호</STRONG> </TD>
                            <TD height=32>&nbsp;&nbsp;
                                <select name="rcell1" id="rcell1">
                          <option value="011">011</option>
                          <option value="010">010</option>
                          <option value="016">016</option>
                          <option value="017">017</option>
                          <option value="018">018</option>
                          <option value="019">019</option>
                        </select>
                        - 
                        <input name="rcell2" id="rcell2"  size=4 maxLength=4 class="textbox1">
                        - 
                        <input name="rcell3" id="rcell3"  size=4 maxLength=4 class="textbox1">
                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>이메일</STRONG> </TD>
                            <TD height=32>&nbsp;&nbsp;
                                <INPUT class=textbox1 size=50 name=remail>
                            </TD>
                          </TR>
                        </TABLE>
                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><img src="../img/order/kyul_title.gif" width="650" height="30" border="0"></td>
                    </tr>
                    <tr>
                      <td height="10"></td>
                    </tr>
                    <tr>
                      <td>
                        <TABLE cellSpacing=1 cellPadding=0 width=650 bgColor=#EBEBEB border=0>
                          <TR bgColor=#ffffff>
                            <TD width=125 bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>결제방법</STRONG> </TD>
                            <TD width="512" height=32>&nbsp;&nbsp;
                                <!--<input  name=paymethod type=radio onClick=javascript:cardpay(); value=2 >
                              카드결제&nbsp;
							  --->
                              <input onClick=javascript:bankpay(); type=radio value=1 name=paymethod checked>
                            온라인입금</TD>
                          </TR>

                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>입금은행</STRONG> </TD>
                            <TD height=32>&nbsp;&nbsp;
						<select name="bank" id="bank">
<? 
$bank = explode("\n",$admin_row[A_bank]);
for($cnt=0;$cnt<sizeof($bank)-1;$cnt++){
	$A_bank=explode("|",$bank[$cnt]);
?>
<option  value="<?= sanitize_input($A_bank[0] . $A_bank[1] . $A_bank[2]) ?>"><?= sanitize_input($A_bank[0] . $A_bank[1] . " 예금주:" . $A_bank[2]) ?></option>
<? }?>	
                        </select>
                            </TD>
                          </TR>
						 
                        </TABLE>
                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
					 <tr>
                      <td align="center"><input type="image" src="../img/order/order_btn.gif" width="81" height="30" border="0"></a>&nbsp;&nbsp;<a href="order_ok.php"><img src="../img/order/can_btn.gif" width="81" height="30" border="0"></a></td>
                    </tr>
                   
                  </table>
				  <!------------->
				     
                   
                  </table>
				<!-- 주문서 -->
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