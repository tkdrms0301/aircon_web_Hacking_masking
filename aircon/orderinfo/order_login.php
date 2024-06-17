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
    <td align="center" valign="top">
      <? include ("../include/top.php"); ?>
    </td>
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
                <td><? include ("../include/left_banner.php"); ?></td>
              </tr>
            </table>
		  </td>
          <td align="right" valign="top">
		    <table width="700" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="700"><img src="../img/orderinfo/stitle.gif" width="700"></td>
              </tr>
              <tr> 
                <td align="center" valign="top"> 
                  <!-- 주문_배송 list -->
                              <table width="640" border="0" align="center" cellpadding="0" cellspacing="0">
                    			 <tr>
                      			  <td><img src="../img/orderinfo/log_01.gif" width="640" height="185"><br>
                          			<br>
                          			<br>
                      			  </td>
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
	function Login_check(){
		if(!Login.Uid.value){
		alert("아이디를 입력하세요.");
		Login.Uid.focus();
		return false;
		}if(!Login.Pw.value){
		alert("패스워드를 입력하세요.");
		Login.Pw.focus();
		return false;
		}
	}
</script>
<?
if(!$url)$url="../mypage/mypage.php";

									?>
									<form method="post" name="Login" action="../member/login_ok.php" onsubmit="return Login_check()" >
								  <input TYPE="hidden" name="gotourl" value="<?=$url?>">
                                    <table width="445" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="385" height="24"><img src="../img/orderinfo/id.gif" width="77" height="15"><input name="Uid" type="text" class="textbox2" size="40" tabindex=10></td>
                                         <td width="60" rowspan="3">
										<input type="image" src="../img/orderinfo/log_btn.gif" width="60" height="57" border="0" tabindex=12></a></td>
                                      </tr>
                                      <tr>
                                        <td height="7"></td>
                                      </tr>
                                      <tr>
                                        <td height="24" nowrap><img src="../img/orderinfo/pw.gif" width="77" height="15"><input name="Pw" type="password" class="textbox2" size="40" tabindex=11>
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
                    <tr>
                      <td align="center"><img src="../img/orderinfo/l_title.gif" width="455" height="36"></td>
                    </tr>
                    <tr>
                      <td>
                    	<script>
						function delivery_check(){
								if(!delivery.orderno.value){
								alert("주문번호를 입력하세요.");
								delivery.orderno.focus();
							  return false;
							 }
							}
                        </script>
                             <form METHOD=POST name="delivery" ACTION="../mypage/mypage_view.php" onsubmit="return delivery_check()">
                        <table width="455" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="389"><img src="../img/orderinfo/l_top.gif" width="389" height="5"></td>
                            <td width="6" rowspan="3">&nbsp;</td>
                            <td width="60" rowspan="3"><input type="image" src="../img/orderinfo/l_ok_btn.gif" width="60" height="57"></td>
                          </tr>
                          <tr>
                            <td height="48" align="center" background="../img/orderinfo/l_bg.gif"><img src="../img/orderinfo/ju.gif" width="74" height="13" align="absmiddle">&nbsp;<input name="orderno" type="text" class="textbox2" size="40">
                            </td>
                          </tr>
                          <tr>
                            <td><img src="../img/orderinfo/l_bot.gif" width="389" height="5"></td>
                          </tr>
                        </table>
                     </form>
                      </td>
                    </tr>
                  </table>
                  <!-- 주문_배송 list -->
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
<map name="login">
  <area shape="rect" coords="389,12,542,38" href="../member/agree.php">
  <area shape="rect" coords="389,43,546,70" href="#" onclick="MM_openBrWindow('../member/search.php','','width=295,height=233,left=200, top=200')" style="CURSOR: hand">
</map>
</body>
</html>