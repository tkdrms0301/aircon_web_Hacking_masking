<table width="170" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td bgcolor="#565656" height="35" style=padding-left:10px><b><img src="img/icon2.jpg" width="9" height="9" align="absmiddle"> 
                  <font color="#FFFFFF">�̺�ƮNEWS</b></font></td>
              </tr>
			  <tr> 
                <td><img src="img/dot.jpg" width="170" height="5"></td>
              </tr>
<?
$MENU_ARR=array(
"news"=>"�̺�ƮNEWS"
);
foreach ($MENU_ARR as $key => $value) {
	if($board==$key)$font_coloe="<font color='#ff0000'>";
	else  $font_coloe="<font color='#000000'>";
?>
              <tr> 
                <td height="25"style=padding-left:10px><img src="img/icon.jpg" width="4" height="4" align="absmiddle"> 
                  <A HREF="../admin/community.php?board=<?=$key?>"><?=$font_coloe?><?=$value?></font></A></td>
              </tr>
              <tr> 
                <td><img src="img/dot.jpg" width="170" height="5"></td>
              </tr>
<? } ?>              
            </table>
          </td>
          <td valign="top" align=center> <br>
            <br>