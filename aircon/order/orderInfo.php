<? setCookie("cartid","",0,"/");?>
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
<? include "../include/iorder_view.php";?>
				 <!-- 장바구니 테이블 시작 -->
                  <br>
<?
if($row[paymethod]=="2" && $row[state]=="1"){
	include "kspayform.php";
							echo"<script>goOpen();</script>
							<CENTER><img src=\"../img/order/re_btn1.gif\" border=\"0\" onClick='goOpen()' style=cursor:hand></CENTER>";
}
?>

				
				  <? if($row[paymethod]=="1" || $row[state]=="2"){?>
                  <CENTER><A HREF="order_ok.php"><img src="../img/order/re_btn2.gif" border="0"></A></CENTER> 
				  <? }?>
                  &nbsp;&nbsp;&nbsp;
				 
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