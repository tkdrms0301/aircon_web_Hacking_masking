<table width="700" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="31" ><table border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td > 
							<!--history영역 -->
                              <img src="../img/product/icon3.gif" width="15" height="17" align="absmiddle">&nbsp; 
                              현재위치 : <?=categoryname($category,"",$link_page,$brand)?>&nbsp;&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                   
</table>
<table width="632" border="0" cellpadding="0" cellspacing="1" bgcolor="c7c7c7">
                    <tr>
                      <td align="center" bgcolor="#F2F2F2">
					   <table width="624" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td height="4" colspan="4"></td>
                          </tr>
                          <tr align=center> 
<?                      foreach ($BRAND_ARRAY as $key => $value) {
			if($brand==$key)$font_color="<FONT  COLOR=\"#003399\"><strong>";
			else $font_color="<FONT  COLOR=\"#000000\">";

			$sub_cnt_row=DBarray("select count(*) from  products where p_brand = '$key' and  plus02 = 'n'");
?>
                             
          <td height="26" bgcolor="#FFFFFF">&nbsp;&nbsp;&nbsp;<img src="../img/product/icon02.gif" width="9" height="9" align="absmiddle">&nbsp;<a href="?category=<?=$category?>&brand=<?=$key?>" ><?=$font_color?><?=$value?></FONT></a></strong>(<?=$sub_cnt_row[0]?>)</td>
<? }?>    

                          </tr>
                          <tr> 
                            <td height="4" colspan="4"></td>
                          </tr>
                        </table>
						</td>
                    </tr>
                  </table>