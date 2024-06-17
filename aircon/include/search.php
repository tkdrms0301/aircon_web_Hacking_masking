<script>
<!--
function getValue(targ,selObj,restore,cat,targi,targv){ //v3.0
if(targv) {
var preval = targv.options[targv.selectedIndex].value;
}
else var preval = "";
  eval(targ+".location='../admin/subcategory.php?keyword='+selObj.options[selObj.selectedIndex].value+'&targi='+targi+'&preval='+preval+'&cat="+cat+"'");
  if (restore) selObj.selectedIndex=0;
}

-->
</script>
<iframe src="../admin/subcategory.php" name="catfrm" width=0 height=0 frameborder=0 scrolling=no></iframe>
<form name="reg_form" method="get"action="../product/product.php">
<table width="587" border="0" cellspacing="0" cellpadding="0">
  <tr>
      <td width="194"><img src="../img/main/new/title.gif" width="194" height="74"></td>
	  <td background="../img/main/new/bg.gif"><table border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td height="32"> &nbsp; 
              <!------------------대분류------------->
              <select name="Category1" onChange="getValue('catfrm',this,0,1,'document.reg_form.Category2',0)">
                <option value="" selected>::::1차분류:::: </option>
                <?
$sqlstr = "SELECT * FROM category WHERE category < 100  ORDER BY UID ASC";
$sqlqry = mysql_query($sqlstr);
while($list=@mysql_fetch_array($sqlqry)):
echo"<option value='$list[category]' ${selected}>$list[name]</option> \n";
endwhile;
?>
              </select> 
              <!-------------------2분류------------------->
              <select name="Category2" onChange="getValue('catfrm',this,0,2,'document.reg_form.Category3',document.reg_form.Category1)">
                <option value="" >::::2차분류::::</option>
              </select> 
              <!-------------------3분류---------------->
              <select name="Category3" >
                <option value="" selected>::::3차분류::::</option>
              </select> </td>
          </tr>
          <tr> 
            <td height="32">&nbsp;<input name="select" type="hidden" value="p_name"> 
              <input name="content" type="text" size="20" value="<?=$content?>" />
              &nbsp;
              <input name="image" type="image" src="../img/main/s-btn.jpg" align="absmiddle" width="68" height="19"> 
            </td>
          </tr>
        </table></td>
	  <td width="10"><img src="../img/main/new/r_img.gif" width="10" height="74"></td>
  </tr>
  <tr>
    <td height="10" colspan="3"></td>
  </tr>
</table>
</form>