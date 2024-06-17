<?	
	include("../include/config.php");
	session_start();

  if (preg_match('/[^0-9]/', $jumin1) || preg_match('/[^0-9]/', $jumin2)) {
    echo "<script>
      alert('잘못된 주민등록번호입니다.');
      window.history.back();
    </script>";
  }

  if (preg_match('/[\s\-()\/\\.\\,;=%#&|!]/', $username)) {
    echo "<script>
      alert('잘못된 이름입니다.');
      window.history.back();
    </script>";
  }

  $jumin1 = mysql_real_escape_string($jumin1);
  $jumin2 = mysql_real_escape_string($jumin2);
  $username = mysql_real_escape_string($username);

	$f_query = "select * from users where jumin = '${jumin1}-${jumin2}' and name = '$username'";
	$f_result = mysql_query($f_query);
	$f_num = mysql_num_rows($f_result);
	if($f_num){
		$f_rs = mysql_fetch_array($f_result);
	}
?>
<html>
<head>
<title>아이디/비밀번호찾기</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../css/vsun.css" rel="stylesheet" type="text/css">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?
	if($f_num){
?>
<table width="295" height="231" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td colspan="2"><img src="../img/member/search/result.jpg" width="295" height="75"></td>
  </tr>
  <tr> 
    <td width="11"><img src="../img/member/search/id.jpg" width="100" height="29"></td>
    <td width="284"><font color="#000000"><?=$f_rs[userid]?></font></td>
  </tr>
  <tr> 
    <td><img src="../img/member/search/pw.jpg" width="100" height="29"></td>
    <td><font color="#000000"><?=$f_rs[pass]?></font></td>
  </tr>
  <tr align="center"> 
    <td colspan="2" style="padding-top:20px;padding-bottom:20px"> <a href="javascript:window.close();"><img src="../img/member/search/bt_ok.jpg" width="70" height="26" border="0"></a></td>
  </tr>
</table>
<?
	}else{
?>
<table width="295" height="231" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td colspan="2"><img src="../img/member/search/result.jpg" width="295" height="75"></td>
  </tr>
  <tr> 
    <td width="295" colspan="2" align="center"><font color="#000000">검색결과 찾으시는 회원이 없습니다.</font></td>
  </tr>
  <tr align="center"> 
    <td colspan="2" style="padding-top:20px;padding-bottom:20px"> <a href="javascript:window.close()"><img src="../img/member/search/bt_ok.jpg" width="70" height="26" border="0"></a></td>
  </tr>
</table>
<?
	}
?>
</body>
</html>
