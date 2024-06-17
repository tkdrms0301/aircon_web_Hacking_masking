<html>
<head>
<? include ("./include/title.php") ;?>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" href="./css/vsun.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin=0 topmargin=0>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td><? include ("./include/top.php") ; ?></td>
  </tr>
  <tr> 
    <td>
      <table width="1000" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="160" bgcolor="#F6F6F6" valign="top"> 
            <? include ("./include/board_left.php") ; ?>
          </td>
          <td align="right" valign="top"> 
            <table width="820" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="30" background="./img/common/title.jpg"> 
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td width="50%" style=padding-left:10px><img src="./img/common/t_dot.jpg" align="absmiddle"><b><font color="#000000"> 
                        수험정보관리</font></b></td>
                      <td align="right" style=padding-right:10px>※ Location : 
                        수험정보관리 </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr> 
                <td align="right">&nbsp;</td>
              </tr>
			   
              <tr> 
                <td align="center" valign="top" height="400">
<!------------------------>
<?
	 if($board=='ne_schedule'){
		 include "./calendar/calendar.php";
	 }else{
	  if(substr($board,0,3)!="cho")include "../include/tab.php";
	  if(!$board)$board='info1';
	  if (!$show) $show="list";
	  include ("./board/".$show.".php"); 
	 }
?>
<!------------------------>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td width="160" bgcolor="#F6F6F6" valign="top">&nbsp;</td>
          <td align="right">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td><? include ("./include/copyright.php") ; ?></td>
  </tr>
</table>
</body>
</html>
