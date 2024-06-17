<?
include "../include/title.php";
?>
<html>
<head>
<title>아이디/비밀번호찾기</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../css/vsun.css" rel="stylesheet" type="text/css">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="p_focus();">
<script language="javascript">
function p_focus(){
	find_form.jumin1.focus();
	return;
}
function check(){
	if(!find_form.jumin1.value){
		alert("주민등록번호를 입력하세요.");
		find_form.jumin1.focus();
		return false;
	}
	if(!find_form.jumin2.value){
		alert("주민등록번호를 입력하세요.");
		find_form.jumin2.focus();
		return false;
	}
	if(!find_form.username.value){
		alert("이름을 입력하세요.");
		find_form.username.focus();
		return false;
	}
}
</script>
<table width="295" height="231" border="0" cellpadding="0" cellspacing="0">
  <form name="find_form" method="post" action="../member/search_result.php" onSubmit="return check()">
    <input type="hidden" name="type" value="p">
    <tr> 
      <td colspan="2"><img src="../img/member/search/titlebar.jpg" width="295" height="96"></td>
    </tr>
    <tr> 
      <td width="11"><img src="../img/member/search/left01.jpg" width="100" height="29"></td>
      <td width="284" bgcolor="F7F7F7"><input name="jumin1" type="text" size="10" maxlength="6" class="textbox1" >
        - 
        <input name="jumin2" type="password" size="11" maxlength="7" class="textbox1" ></td>
    </tr>
    <tr> 
      <td><img src="../img/member/search/left02.jpg" width="100" height="29"></td>
      <td bgcolor="F7F7F7"><input name="username" type="text" size="10" class="textbox1" ></td>
    </tr>
	<tr align="center">
      <td colspan="2"><img src="../img/member/search/titlebar_line.jpg" width="295" height="6"></td>
    </tr>
    <tr align="center"> 
      <td colspan="2" style="padding-top:20px;padding-bottom:20px"><input type="image" src="../img/member/search/submit.jpg" width="70" height="26" border="0" class="Input2"> 
       &nbsp;<a href="javascript:window.close()"><img src="../img/member/search/cancel.jpg" width="71" height="26" border="0"></a>      </td>
    </tr>
    <tr align="center">
      <td colspan="2" height="3" bgcolor="#86A12C"></td>
    </tr>
  </form>
</table>
</body>
</html>