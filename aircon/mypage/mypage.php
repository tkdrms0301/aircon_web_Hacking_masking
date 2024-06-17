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
				<!-- 주문배송조회 -->
				   <table width="650" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                  <td><br>
                        <img src="../img/orderinfo/st.jpg" height="30" border="0"></td>
                                  </tr>
                                </table>
                              <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td> <table width=650 border=0 align="center" cellPadding=0 cellSpacing=0>
                                      <tr> 
                                        <td width="33" height="33" align="center" background="../img/orderinfo/list_bg.gif"><strong>번호</strong></td>
                                        <td width="1" align="center" background="../img/orderinfo/list_bg.gif"><img src="../img/orderinfo/list_line.jpg" width="1" height="33"></td>
                                        <td width="95" align="center" background="../img/orderinfo/list_bg.gif"><strong>주문번호</strong></td>
                                        <td width="1" align="center" background="../img/orderinfo/list_bg.gif"><img src="../img/orderinfo/list_line.jpg" width="1" height="33"></td>
                                        <td width="210" align="center" background="../img/orderinfo/list_bg.gif"><strong>상품명</strong></td>
                                        <td align="center" background="../img/orderinfo/list_bg.gif"width="1"><img src="../img/orderinfo/list_line.jpg" width="1" height="33"></td>
                                        <td align="center" background="../img/orderinfo/list_bg.gif"><strong>주문자</strong></td>
                                        <td align="center" background="../img/orderinfo/list_bg.gif"width="1"><img src="../img/orderinfo/list_line.jpg" width="1" height="33"></td>
                                        <td width="80" align="center" background="../img/orderinfo/list_bg.gif"><strong>주문일</strong></td>
                                        <td align="center" background="../img/orderinfo/list_bg.gif"width="1"><img src="../img/orderinfo/list_line.jpg" width="1" height="33"></td>
                                        <td width="76" height="33" align="center" background="../img/orderinfo/list_bg.gif"><strong>가격</strong></td>
                                        <td align="center" background="../img/orderinfo/list_bg.gif"width="1"><img src="../img/orderinfo/list_line.jpg" width="1" height="33"></td>
                                        <td width="70" align="center" background="../img/orderinfo/list_bg.gif"><strong>상태</strong></td>
                                      </tr>
                                    </table></td>
                                </tr>

                                <tr> 
                                  <td> <table width=650 border=0 align="center" cellPadding=0 cellSpacing=0>
<?php
include '../include/session_config.php';

if (!$offset) $offset = 0;
$limit = 25;
$page = 10;
if ($content) $condition = "where $select like '%$content%'"; else $condition = "";
if (!$condition) $condition = "where userid='" . $_SESSION['user_id'] . "'";
else $condition .= "and  userid='" . $_SESSION['user_id'] . "'";
$row = DBarray("select count(*) from orders $condition");
$numrows = $row[0];
$no = $numrows - $offset;

$query = DBquery("select * from orders  $condition  order by no desc limit $offset, $limit");

while ($row = mysql_fetch_array($query)) {
    products($row['product']);
    Baesong($pp_total);
?>
                                      <tr> 
                                        <td width="33" height="35" align="center"><?=$no--?></td>
                                        <td width="1">&nbsp;</td>
                                        <td width="95" align="center"><b><a href="mypage_view.php?orderno=<?=$row['orderno']?>"><?=$row['orderno']?></a></b></td>
                                        <td width="1">&nbsp;</td>
                                        
                            <td width="210">&nbsp;&nbsp;<b><a href="mypage_view.php?orderno=<?=$row['orderno']?>"><?=$cart_product_name?></a></b></td>
                                        <td align="center" width="1">&nbsp;</td>
                                        <td align=center><?=$row['name']?></td>
                                        <td align="center" width="1">&nbsp;</td>
                                        <td width="80" align=center><font color=#7B4078>&nbsp;<?=str_replace("-", ".", substr($row['wdate'], 0, 10))?></font></td>
                                        <td align="center" width="1">&nbsp;</td>
                                        <td width="76" align=center><font color="#FF9900"><?=number_format($TOTALPRICE)?><font color="#999999">원</font></font><font color=#ff0000>&nbsp;</font></td>
                                        <td align="center" width="1">&nbsp;</td>
                                        <td width="70" align=center><?=state($row['baesong'], 5)?></td>
                                      </tr>
                                      <tr> 
                                        <td bgColor=#dfdfdf colSpan=13 height=1></td>
                                      </tr>
<?php
    $pp_total = '';
    $TOTALPRICE = '';
} 
?>                                     
                                    </table></td>
                                </tr>
                              </table>
				  <br>
<CENTER><?php 
                      $listsort = "code=$code&content=$content&select=$select";
                      include "../include/page.php";
                      echo ("${prev10} $_page ${next10}");
                      ?></CENTER>
                  <!-- 주문_배송 list -->

				<!-- 주문배송조회 -->
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
