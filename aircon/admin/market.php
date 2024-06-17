<? include "../admin/head.php";?>
<TABLE>
<TR>
	<TD align=center>
<script>
function sort_list(category,s_category){
	window.location.href="market.php?s_category="+s_category+"&category="+category;
}
</script>


                  <table width="650" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="10"><br>
                        <img src="../img/market/t<?=$s_category?>.jpg" width="178" height="28"></td>
                    </tr>
                    <tr> 
                      <td height="10" align="right"></td>
                    </tr>
                    <tr> 
                      <td height="32" align="right"><img src="../img/market/pro_st.gif" width="31" height="14" align="absmiddle"> 

                        <select name="category" onChange="sort_list(this.value,'<?=$s_category?>')">
						<option value="" >전체보기</option>
<?	  
$query = DBquery("SELECT * FROM category WHERE category < 100 order by indexs asc"); 
while($row=mysql_fetch_array($query)):
?>
                          <option value="<?=$row[category]?>" <? if($row[category]==$category)echo"selected"?>><?=$row[name]?></option>
<? endwhile;?>
                        </select>

                      </td>
                    </tr>
                  </table>
                  <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td background="../img/order/bg.jpg"> <table width=650 border=0 align="center" cellPadding=0 cellSpacing=0>
                          <tbody>
                            <tr> 
                              <td width=155 height=33 align="center"><img src="../img/market/fo01.gif" width="22" height="14"></td>
                              <td width=5><img src="../img/order/bar.jpg" width="5" height="33"></td>
                              <td width=399 align="center"><img src="../img/market/fo02.gif" width="24" height="14"></td>
                              <td width=5><img src="../img/order/bar.jpg" width="5" height="33"></td>
                              <td width=86 align="center"><img src="../img/order/money.jpg"></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                    <tr> 
                      <td> <table width=650 border=0 align="center" cellPadding=0 cellSpacing=0>
                          

<?
	if (!$offset) $offset=0;
	$limit=10;
	$page=10;
	if ($content) $condition="where $select like '%$content%'"; else $condition="";
	if($category){
		if($category>=10000){ //소분류
			if(!$condition)$condition="where category = '$category'";
			else $condition .=" and category = '$category'";
		}else if($category>=100){
			$cat=substr($category,-4);
			if(!$condition)$condition="where category like '%$cat'";
			else $condition .=" and category like '%$cat'";
		}else{
			$cat=substr($category,-2);
			if(!$condition)$condition="where category like '%$cat'";
			else $condition .=" and category like '%$cat'";
		}
	}


	if($s_category){
			
					if(!$condition)$condition="where s_category = '$s_category'";
					else $condition .=" and s_category = '$s_category'";
			
	}

	$row=DBarray("select count(*) from market $condition");
	
	$numrows=$row[0];
	$no=$numrows-$offset;
	$result=DBquery("select * from market $condition order by no desc limit $offset, $limit");
	
	
	while ($row=mysql_fetch_array($result)) {
?>
                          <tr> 
                            <td width=157 align="center"> <font color="#339900"><?=categoryname($row[category])?></font></td>
                            <td width="75" height="65" align="center"><table width="48" border="0" cellpadding="0" cellspacing="1" bgcolor="CCCCCC">
  <tr>
                                  <td align="center" bgcolor="#FFFFFF"><a href="market_detail.php?no=<?=$row[no]?>&category=<?=$category?>&s_category=<?=$s_category?>"><img src='../market_img/<?=$row[no]?>a.jpg' width=46 height=44 border=0 onError="this.src='../img/market/noimg.gif'"></a></td>
  </tr>
</table>
</td>
                            <td width="328"><strong>제품명</strong> : <font color="#FF6600"><a href="market_detail.php?no=<?=$row[no]?>&category=<?=$category?>&s_category=<?=$s_category?>" class="pro"><?=$row[p_name]?></a><br>
                              </font><a href="market_detail.php?no=<?=$row[no]?>&category=<?=$category?>&s_category=<?=$s_category?>"><?=cut_string(stripslashes($row[p_comment]),100)?></a></td>
                            <td align=center width=90><font color=F36E21><strong><?=number_format($row[p_price])?>원</strong></font></td>
                          </tr>
                          <tr> 
                            <td background="../img/order/dot.gif" colSpan=4 height=3></td>
                          </tr>
<?
}
?>
                        </table>
						</td>
                    </tr>
                  </table>
                  <br>
	<table cellpadding="2" width="100%">
	<tr>
	<td align=center>

<?
$listsort="category=$category&s_category=$s_category&content=$content&select=$select";
	include "../include/page.php";
	echo ("${prev10} $_page ${next10}");
?>
	</td>
	</tr>
	</table>
                  <br>

                  <table width="632" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="26" align="right"><a href="market_regi.php?mode=form&category=<?=$category?>&s_category=<?=$s_category?>"><img src="../img/market/market_btn.gif" width="81" height="30" border="0"></a></td>
                    </tr>
                  </table>
	</TD>
</TR>
</TABLE>

<? include "../admin/tail.php";?>