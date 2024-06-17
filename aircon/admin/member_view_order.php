<?php
include "../include/session_config.php";
include("./check.php");
include("../include/config.php");
include("../include/function.php");
?>
<link rel="stylesheet" href="../css/vsun.css" type="text/css">
<? include "member_view_menu.php"?>
<script>
function opener_list(orderno){
	window.opener.location.href="order_view.php?orderno="+orderno;
}
</script>
<table width="628" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="401" height="31" background="../img/mylearning/title_bg.gif"><img src="../img/mylearning/no.gif" width="59" height="31"></td>
                                  <td width="86" height="31" background="../img/mylearning/title_bg.gif"><img src="../img/mylearning/orderno.gif" width="120" height="31"></td>
                                  <td width="86" height="31" background="../img/mylearning/title_bg.gif"><img src="../img/mylearning/name.gif" width="220" height="31"></td>
                                  <td width="55" height="31" background="../img/mylearning/title_bg.gif"><img src="../img/mylearning/price.gif" width="82" height="31"></td>
                                  <td width="55" background="../img/mylearning/title_bg.gif"><img src="../img/mylearning/date.gif" width="85" height="31"></td>
                                  <td width="55" background="../img/mylearning/title_bg.gif"><img src="../img/mylearning/use.gif" width="62" height="31"></td>
                                </tr>
<?
$cn=1;
$publicquery="select * from orders where userid='$userid'";
$query = DBquery($publicquery." order by no desc");
while($row=mysql_fetch_array($query)){
	$userproduct_lists=explode("\n",$row[product]);
	products($row[product]);
	
	
				
?>
                                <tr> 
                                  <td height="28" align="center"><?=$cn++?></td>
                                  <td align="center">
<!---
								  <a href="#" onClick="window.opener.location.href='../admin/order_view.php?orderno=<?=$row[orderno]?>'">
								  -->
								  <a href="?orderno=<?=$row[orderno]?>&userid=<?=$userid?>">
								  <?=$row[orderno]?></a></td>
                                  <td style="padding-left:4px;"><a href="?orderno=<?=$row[orderno]?>&userid=<?=$userid?>"><?=$cart_product_name?></a><br></td>
                                  <td align="center"><strong><font color="#FF9900"><?=number_format($pp_total)?>¿ø</font></strong></td>
                                  <td align="center"><?=substr($row[wdate],0,10)?></td>
                                  <td align="center"><?=state($row[state],$row[paymethod])?><Br><?=state($row[baesong],5)?></td>
                                </tr>
                                <tr> 
                                  <td height="3" colspan="6" align="center" background="../img/mylearning/dot.gif"></td>
                                </tr>
<?	
			
	
	$pp_name='';$pp_code='';$pp_option='';$pp_count='';$pp_price='';$pp_point='';$pp_total='';$pp_points='';
$TOTALPRICE='';
?>
<? }
?>
                                
                              </table>

<? if($orderno):?>
<table width="672" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
<TR>
	<TD bgcolor=#ffffff align=center>
<? include "../include/iorder_view.php";?>
</TD>
</TR>
</TABLE>
<?endif;?>
<table width="650" border=0 cellspacing="0" cellpadding="3" align=center>
<tr>
	<td align=center>[<a href="#" onClick="window.close(self)" title="Close this window">Close Window</a>]</td>
</tr>
</table>
</body>
</html>