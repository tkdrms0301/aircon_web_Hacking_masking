<html>
<?php
include '../include/xss_filter.php';

$user_input = isset($_GET['content']) ? $_GET['content'] : '';
$sanitized_input = sanitize_input($user_input);
?>
<head>
<? include "../include/title.php"; ?>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" href="../css/vsun.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" leftmargin=0 topmargin=0>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td height="2" background="../img/common/top_line_bg.jpg"></td>
  </tr>
  <tr> 
    <td><? include "../include/top.php";?></td>
  </tr>
  <tr> 
    <td> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0" background="../img/common/menu_bg.jpg">
        <tr> 
          <td height="27">&nbsp;</td>
        </tr>
        <tr> 
          <td align="center" height="39"><? include "../include/menu.php";?></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td> 
      <table width="900" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr> 
          <td width="203" valign="top"> 
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
                  <? include "../include/board_menu.php"; ?>
                </td>
              </tr>
              <tr>
                <td height="10"></td>
              </tr>
              <tr>
                <td>
                  <? include "../include/left_pro.php"; ?>
                </td>
              </tr>
              <tr>
                <td height="10"></td>
              </tr>
              <tr>
                <td>
                  <? include "../include/left_banner.php"; ?>
                </td>
              </tr>
            </table>
           
          </td>
          <td width="13">&nbsp;</td>
          <td width="640" valign="top">
            <table width="640" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="../img/board/title2.jpg" width="640" height="32"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align=center>
<?
	if(!$board) $board ="notice";
	if (!$show) $show="list";
	include "../board/${show}.php";
?>
				</td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td align="center" background="../img/common/copy_bg.jpg"><? include "../include/copy.php"; ?></td>
  </tr>
</table>
</body>
</html>
