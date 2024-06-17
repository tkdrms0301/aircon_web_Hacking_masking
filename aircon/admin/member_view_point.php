<?php
include "../include/session_config.php";
include("./check.php");
include("../include/config.php");
include("../include/function.php");
$TOTALPOINT=TotalPoint($userid);
?>
<link rel="stylesheet" href="../css/vsun.css" type="text/css">
<? include "member_view_menu.php"?>
<script>
function opener_list(orderno){
	window.opener.location.href="order_view.php?orderno="+orderno;
}
</script>
<table width="650" border="0" cellspacing="0" cellpadding="0">

					<tr>
                      <td height="10"></td>
                    </tr>
					<tr>
                      <td height="10"><B><?=$userid?></B>님의 총 적립금은 <B><?=$TOTALPOINT?></B>점 입니다.</td>
                    </tr>
					<tr>
                      <td height="10"></td>
                    </tr>
				  </table>

<table width="628" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="59" height="31" background="../img/mylearning/title_bg.gif"><img src="../img/mylearning/no.gif" width="59" height="31"></td>
                                  <td width="370" height="31" background="../img/mylearning/title_bg.gif"><img src="../img/mylearning/point.gif" width="370" height="31"></td>
                                  <td width="111" height="31" background="../img/mylearning/title_bg.gif"><img src="../img/mylearning/addpoint.gif" width="111" height="31"></td>
                                  <td width="88" height="31" background="../img/mylearning/title_bg.gif"><img src="../img/mylearning/date01.gif" width="88" height="31"></td>
                                </tr>
<?
$cn=1;
$query = DBquery("select * from point where userid='$userid'  order by po_no  desc");
while($row=mysql_fetch_array($query)){
?>
                                <tr> 
                                  <td height="28" align="center"><?=$cn++?></td>
                                  <td style="padding-left:4px;">
								  <? if($row[order_no]){?>
								  <a href="#" onClick="window.opener.location.href='../admin/order_view.php?orderno=<?=$row[order_no]?>'">
								  <? }?>
								  <?=$row[reason]?>
								  </a>
								  </td>
                                  <td align="center"><?=$row[point]?><br></td>
                                  <td align="center"><?=$row[wdate]?></td>
                                </tr>
                                <tr> 
                                  <td height="3" colspan="4" align="center" background="../img/mylearning/dot.gif"></td>
                                </tr>
<? } ?>
                                
                                <tr> 
                                  <td bgcolor="e7e7e7" height="1" colspan="4"></td>
                                </tr>
                              </table>

<table width="650" border=0 cellspacing="0" cellpadding="3" align=center>
<tr>
	<td align=center>[<a href="#" onClick="window.close(self)" title="Close this window">Close Window</a>]</td>
</tr>
</table>
</body>
</html>