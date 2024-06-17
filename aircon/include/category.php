<?
if($plus01){
	$title_img="shop_list_12.jpg";
	$link_page="../product/e_product.php";
}elseif($plus02){
	$title_img="shop_list_11.jpg";
	$link_page="../product/old_product.php";
}else{
	$title_img="shop_list_1.jpg";
	$link_page="../product/product.php";
}
$displayID=0;
?>
<table width="175" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td><img src="../img/main/<?=$title_img?>" width="175" height="47"></td>
                    </tr>
                    <tr> 
                      <td background="../img/main/shop_list_2.jpg">
					  
                        <table width="161" border="0" cellspacing="0" cellpadding="0" align="center">
<?
$query = DBquery("SELECT * FROM category WHERE category < 100 order by indexs asc"); 
while($row=mysql_fetch_array($query)):
  $category = mysql_real_escape_string($category);
	if(substr($row[category],-2)==substr($category,-2)) $fontcolor="<font color='#0D6A5C'>";
	else $fontcolor="<font color='#000000'>";
	$bigcode = substr($row[category], -2);
	$big_code = substr($category, -2);
  $bigcode = mysql_real_escape_string($bigcode);
  $sqlsubcountstr = "select count(UID) from category where category LIKE '%$bigcode'";
  $sqlsubcountqry = mysql_query($sqlsubcountstr);
  $sqlsubcount = mysql_result($sqlsubcountqry, 0, 0);

				/* 카테고리별 등록 상품수를 구한다. */
               
                $sqlcountstr = mysql_query( "select count(*) from category where category LIKE '%$bigcode'");
                $TotalGoodsNo = "(".mysql_result($sqlcountstr, 0, 0).")";


				if (ereg($bigcode,$big_code)) {$show_hidden = "show";}else{$show_hidden = "none";}/* wizmart에서 넘어온 대분류 코드값과 현대 

				/* 하위 카테고리 유무 책크 및 토글을 입력한다 */
               // if($sqlsubcount > 1) $ahref = "<A HREF='#' onClick=\"return DisplayToggle('menu$displayID')\">";
               // else 
				$ahref = "<A HREF='$link_page?category=$row[category]&lv=1'>";
?>
                          <tr> 
                            <td><img src="../img/main/shop_list_icon.jpg" width="13" height="15" align="absmiddle"><?=$ahref?><?=$fontcolor?><?=$row[name]?></font></a> </td>
                          </tr>
                          <tr> 
                            <td height="10"><img src="../img/main/shop_list_3.jpg" width="161" height="5"></td>
                          </tr>


                          <tr > 
                            <td style=padding-left:20px>

<?
$sqlsubstr = "select category, name from category where category >= 100 AND category < 10000 AND category LIKE  '%$bigcode' order by category asc";
				$sqlsubqry = mysql_query($sqlsubstr) or die(mysql_error());
				while($sublist = mysql_fetch_array($sqlsubqry)):
				if(substr($category,-4)==substr($sublist[category],-4))$mfont="<font color=#0033CC>";
				else $mfont="";
?>
							<img src="../img/main/shop_list_icon1.jpg" width="3" height="3" align="absmiddle">
							<A HREF="<?=$link_page?>?category=<?=$sublist[category]?>"><?=$mfont?><?=$sublist[name]?></A><br>
			<? endwhile; ?>
							  
							  </td>
                          </tr>


                          <tr > 
                            <td height="10"><img src="../img/main/shop_list_3.jpg" width="161" height="5"></td>
                          </tr>
<?
$displayID++;
endwhile;
?>                            
                        </table>
                      </td>
                    </tr>
                    <tr> 
                      <td><img src="../img/main/shop_list_4.jpg" width="175" height="10"></td>
                    </tr>
                  </table>
<DIV ID=menu<?=$displayID?> style='display:none;margin-left:5px'></DIV>
              <SCRIPT LANGUAGE=JAVASCRIPT>
                function DisplayToggle(currMenu) {
                        if (document.all) {
                                thisMenu = eval("document.all." + currMenu + ".style")
                                if (thisMenu.display != "none") {
                                        thisMenu.display = "none"
                                }
                                else {
                                        for (i = 1; i < <?=$displayID+1?>; i++ ){
                                                if (eval("document.all.menu" + i + ".style").display != "none") {
                                                        eval("document.all.menu" + i + ".style").display = "none"
                                                }
                                                else {
                                                        thisMenu.display = "block"
                                                }
                                        }
                                }
                                return false
                        }
                        else {
                                return false
                        }
                }
</SCRIPT>                