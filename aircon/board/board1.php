<html>
<head>
<? include ("../include/title.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" href="../css/vsun.css" type="text/css">
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

<body bgcolor="#FFFFFF" text="#000000" leftmargin=0 topmargin=0>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td align="center"><? include ("../include/menu.php"); ?></td>
  </tr>
  <tr> 
    <td bgcolor="#0D6A5C" height="30" align="center"><? include ("../include/login.php"); ?></td>
  </tr>
  <tr> 
    <td height="10" bgcolor="#ECE9D8"></td>
  </tr>
  <tr> 
    <td align="center"><? include ("../include/board_img.php"); ?></td>
  </tr>
  <tr> 
    <td align="center" valign="top" background="../img/main/bg.gif" style="background-repeat:repeat-x"> 
      <table width="879" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="201" valign="top" bgcolor="#FFFFFF"><img src="../img/board/menu.gif" width="201" height="52"><br>
		  <? include ("../include/board_menu.php"); ?><br><? include ("../include/left_banner.php"); ?></td>
          <td width="4" valign="top"><img src="../img/common/green_verti.gif" width="4" height="158"></td>
          <td width="674" valign="top"> 
            <table width="674" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td><img src="../img/board/title2.gif" width="674" height="52"></td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF" align=center>
<?
	if(!$board) $board ="board1";
	if (!$show) $show="list";
	include "../board/${show}.php";
?>
                  
                </td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td align="center" background="../img/common/copy_bg.gif"><? include ("../include/copy.php"); ?></td>
  </tr>
</table>
</body>
</html>