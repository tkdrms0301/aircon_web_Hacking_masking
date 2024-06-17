 <table width="173" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><A HREF="../news/news.php"><img src="../img/main/event1.jpg" width="173" height="28"></A></td>
                          </tr>
                          <tr> 
                            <td background="../img/main/event2.jpg"> <table width="150" border="0" cellspacing="0" cellpadding="0" align="center">
<?
$query=DBquery("select * from brd_news  order by replyno desc,reply  limit 0,2");
while($row = mysql_fetch_array($query)){ 
?>
                                <tr> 
                                  <td width="7" height="20"><img src="../img/main/shop_list_icon1.jpg" width="3" height="3"></td>
                                  <td width="140"><a href="../news/news.php?show=view&id=<?=$row[id]?>&board=news"><?=cut_string($row[subject],20)?></a></td>
                                </tr>
<? } ?>
                              </table></td>
                          </tr>
                          <tr> 
                            <td><img src="../img/main/event3.jpg" width="173" height="12"></td>
                          </tr>
                        </table>