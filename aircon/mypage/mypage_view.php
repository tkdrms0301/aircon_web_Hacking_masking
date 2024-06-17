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
				<!-- 배송확인 -->
<? include ("../include/iorder_view.php"); ?>    

				<!-- 배송확인 -->
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