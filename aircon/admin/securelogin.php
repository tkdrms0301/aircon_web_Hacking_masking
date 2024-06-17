<html>
<head>
<title>:: :: 관리자모드</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" href="../css/vsun.css" type="text/css">
<script>
function check_sub(){
	if(!form1.admin_id.value){
		alert("아이디를 입력하세요.");
		form1.admin_id.focus();
		return false;
	}if(!form1.admin_passwd.value){
		alert("아이디를 입력하세요.");
		form1.admin_passwd.focus();
		return false;
	}
	return true;
}
</script>
</head>
<body bgcolor="#FFFFFF" text="#000000" >
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%">
  <tr>
    <td align="center"> 
      <table width="500" border="0" cellspacing="0" cellpadding="0" height="260">
	  <form method="post" name="form1" action="admin_process.php" onsubmit="return check_sub();">
        <tr> 
          <td background="../img/admin/back.jpg"> <br>
            <br>
            <br>
            <table width="300" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr> 
                <td width="99">I D</td>
                <td width="201">
                  <input type="text" name="admin_id" size="20" class="textbox1">
                </td>
              </tr>
              <tr> 
                <td width="99">PASSWORD</td>
                <td width="201">
                  <input type="password" name="admin_passwd" size="20" class="textbox1">
                </td>
              </tr>
              <tr> 
                <td width="99">&nbsp;</td>
                <td width="201">&nbsp;</td>
              </tr>
              <tr align="center"> 
                <td colspan="2"><input type="submit" value="로그인" /></td>
              </tr>
	  </form>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
