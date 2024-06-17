<script>
function detail_open(img) {
	window.open("../board/detail_popup.php?img="+img,"_blank","width=450,height=500");
}
</script>
<!-- 게시판 시작 -->
<table width="640" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="34" colspan="6" background="../img/board/bg.jpg">
                        <table width="640" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="49" height="36" align="center"><img src="../img/board/num.jpg" width="19" height="12"></td>
                            <td width="3" height="36"><img src="../img/board/bar.jpg" width="3" height="36"></td>
                            <td width="95" align="center"><img src="../img/board/v_image.jpg" width="26" height="12"></td>
                            <td width="3"><img src="../img/board/bar.jpg" width="3" height="36"></td>
                            <td width="301"height="36" align="center"><img src="../img/board/title.jpg" width="20" height="12"></td>
                            <td width="3"height="36" background="../img/board/bg.gif"><img src="../img/board/bar.jpg" width="3" height="36"></td>
                            <td width="61"height="36" align="center"><img src="../img/board/name.jpg" width="30" height="12"></td>
                            <td width="3" background="../img/board/bg.gif"><img src="../img/board/bar.jpg" width="3" height="36"></td>
                            <td width="70" align="center"><img src="../img/board/date.jpg" width="39" height="12"></td>
                            <td width="3" background="../img/board/bg.gif"><img src="../img/board/bar.jpg" width="3" height="36"></td>
                            <td width="49" align="center"><img src="../img/board/count.jpg" width="30" height="12"></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                 
<?

	$result=DBquery("select * from brd_".$board." where reply='AAAAA'  order by  hits desc limit 0, 5");
	$no=1;
	while ($row=mysql_fetch_array($result)) {
		$subject=$row[subject];
		$wdate=explode(" ",$row[wdate]);
?>
					<tr>
                      <td width="50" height="66" align="center"><?=$no++?></td>
                      <td width="98" align="center">
					<? if($row[p_code]>0){?>
					  <img src="../product_img/<?=$row[p_code]?>a.jpg" width="80" height="60" border="0" onerror="this.src='../img/board/error.jpg';">
					<? }else{?>
					  <img src="../board/data/<?=$row[file1]?>" width="80" height="60" border="0" onerror="this.src='../img/board/error.jpg';">
					<? } ?>					  
					  </td>
                      <td width="305">
			<? if ($row[reply] == "AAAAA") {?>
            <? } else { ?>
            &nbsp;&nbsp;&nbsp;<img src="../img/board/re_icon.gif" width="20" height="10">
            <? } ?>
			<a href="<?=$PHP_SELF?>?main=view&show=view&board=<?=$board?>&id=<?=$row[id]?>&offset=<?=$offset?>&select=<?=$select?>&content=<?=$content?>&faq_category=<?=$faq_category?>">
            <?=cut_string($subject,50)?>
            </a><? if (isnew($row[wdate],1)) {?>
            <img src="../img/board/new_icon.gif" align="absmiddle">
            <? } ?>
					  </td>
                      <td width="64" align="center"><a href="mailto:<?=$row[email]?>"><?=cut_string($row[name],6)?></a></td>
                      <td width="73" align="center"><?=$row[wdate]?></td>
                      <td width="50" align="center"><?=$row[hits]?></td>
                    </tr>
                    <tr> 
                      <td background="../img/board/board/dot.gif"height="3" colspan="6"></td>
                    </tr> 
<? } ?>
					<tr> 
                      <td bgcolor="e7e7e7" height="1" colspan="6"></td>
                    </tr>
</table>  
</td>
                    </tr>
                  </table>
				  <br>
                        <!-- 게시판 끝 -->