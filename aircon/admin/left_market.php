<table width="170" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td bgcolor="#565656" height="35" style=padding-left:10px><b><img src="img/icon2.jpg" width="9" height="9" align="absmiddle"> 
                  <font color="#FFFFFF">∆Œ∆Œ¿Â≈Õ</b></font></td>
              </tr>
			  
              
<?
if(!$s_category)$s_category=1;
foreach ($S_CATEGORY_ARRAY as $key => $value) {
	if($s_category==$key)$font_coloe="<font color='#ff0000'>";
	else  $font_coloe="<font color='#000000'>";
?>
              <tr> 
                <td height="25"style=padding-left:10px><img src="img/icon.jpg" width="4" height="4" align="absmiddle"> 
                  <A HREF="../admin/market.php?s_category=<?=$key?>"><?=$font_coloe?><?=$value?></font></A></td>
              </tr>
              <tr> 
                <td><img src="img/dot.jpg" width="170" height="5"></td>
              </tr>
<? } ?> 
              
            </table>
          </td>
          <td valign="top"  style="padding-left:25"> <br>
            <br>