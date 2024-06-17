<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<?php include ("../include/title.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" href="../css/vsun.css" type="text/css">
<script type="text/JavaScript" language="JavaScript1.2" src="../js/style.js"></script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><?php include ("../include/top.php"); ?></td>
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
                <td><?php include ("../include/login.php"); ?></td>
              </tr>
              <tr> 
                <td height="7"></td>
              </tr>
              <tr> 
                <td><?php include ("../include/left_banner.php"); ?></td>
              </tr>
            </table>
          </td>
          <td align="right" valign="top">
            <table width="700" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="700"><img src="../img/member/stitle02.gif" width="700" height="52"></td>
              </tr>
              <tr> 
                <td align="center" valign="top"> 
                  <!-- 회원가입 -->
                  <table width="626" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                      <td align="center"><img src="../img/member/welcom.gif" width="626" height="167"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">
                        <table width="640" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr> 
                            <td><img src="../img/orderinfo/log_02.gif" width="639" height="83"><br> <br> <br></td>
                          </tr>
                          <tr> 
                            <td>
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" valign="top">
                                    <table width="445" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td align="center">
                                          <script>
                                            function Login_check() {
                                              if (!Login.id.value) {
                                                alert("아이디를 입력하세요.");
                                                Login.id.focus();
                                                return false;
                                              }
                                              if (!Login.pass.value) {
                                                alert("패스워드를 입력하세요.");
                                                Login.pass.focus();
                                                return false;
                                              }
                                            }
                                          </script> 
                                          <?php if (!$url) $url = "../mypage/mypage.php"; ?>
                                          <form method="post" name="Login" action="../member/login_ok.php" onsubmit="return Login_check()">
                                            <input type="hidden" name="gotourl" value="<?=$url?>">
                                            <table width="445" border="0" cellspacing="0" cellpadding="0">
                                              <tr> 
                                                <td width="385" height="24">
                                                  <img src="../img/orderinfo/id.gif" width="77" height="15"> 
                                                  <input name="id" type="text" class="textbox2" size="40" tabindex=10>
                                                </td>
                                                <td width="60" rowspan="3">
                                                  <input name="image" type="image" tabindex=12 src="../img/orderinfo/log_btn.gif" width="60" height="57" border="0">
                                                </td>
                                              </tr>
                                              <tr> 
                                                <td height="7"></td>
                                              </tr>
                                              <tr> 
                                                <td height="24" nowrap>
                                                  <img src="../img/orderinfo/pw.gif" width="77" height="15"> 
                                                  <input name="pass" type="password" class="textbox2" size="40" tabindex=11> 
                                                </td>
                                              </tr>
                                            </table>
                                          </form>
                                        </td>
                                      </tr>
                                    </table>
                                    <br>
                                  </td>
                                </tr>
                                <tr align="center"> 
                                  <td><img src="../img/orderinfo/log_04.gif" width="640" height="121" border="0" usemap="#login"></td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                <!-- 회원가입 -->
                </td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td align="center" valign="top"><?php include ("../include/copyright.php"); ?></td>
  </tr>
</table>
<map name="login">
  <area shape="rect" coords="392,13,538,36" href="../member/agree.php">
  <area shape="rect" coords="389,42,538,66" href="#" onclick="MM_openBrWindow('../member/search.php','','width=500,height=233,left=200, top=200')" style="CURSOR: hand">
</map>
</body>
</html>
