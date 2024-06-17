<!-- 게시판 시작 -->
<table width="640" border="0" cellspacing="0" cellpadding="0" align="center">
                                                  <tr> 
<?
	if (!$offset) $offset=0;
	$limit=12;
	$page=10;
	if ($content) $condition="where $select like '%$content%'"; else $condition="";
		
	$row=DBarray("select count(*) from brd_".$board." $condition");
	
	$numrows=$row[0];
	$no=$numrows-$offset;
	$result=DBquery("select * from brd_".$board." $condition order by replyno desc,reply limit $offset, $limit");
$cnt=0;
	while ($row=mysql_fetch_array($result)) {
		$cnt++;
?>
						<td align=center><table width="125" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td align=center><table width="120" height="120" border="0" cellpadding="0" cellspacing="1" bgcolor="C4C4C4">
                                <tr> 
                                  <td width="120" height="120" align="center" valign="middle" bgcolor="#FFFFFF"><a href="<?=$PHP_SELF?>?category=<?=$category?>&show=view&doc=board/board.php&board=<?=$board?>&id=<?=$row[id]?>&offset=<?=$offset?>&search=<?=$search?>&content=<?=$content?>"><img src="../board/data/<?=$row[file1]?>" width="115" height="115" border="0"></a></td>
                                </tr>
                              </table></td>
                            
                          </tr>
                          
						  <tr><td align=center colspan="2"><font color="#333333"><?=cut_string($row[subject],12)?></a></td></tr>
                        </table></td>
<? 
	if(!($cnt%4))echo"</tr><tr> <td colspan=7>&nbsp;</td> </tr><tr>";
	
	} 
	if($numrows<4){
		$tds=4-$numrows;
	}
	for($cn=0;$cn<=$tds;$cn++){
		echo "<td width=120>&nbsp;</td>";
	}
?>                

                        </table>

                        <table width="640" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr> 
                            <td height="2" colspan="2" background="../img/board/board/line01.gif"></td>
                          </tr>
                          <tr> 
                            <td height="31">
<?
$listsort="select=$select&content=$content&category=$category&board=$board";
	include "../include/page.php";
	echo ("${prev10} $_page ${next10}");
?>
							  </td>
                            <td width="270" align="right"> 
                              
                            </td>
                          </tr>
                          
                        </table>
						

                      
                        <!-- 게시판 끝 -->