                        <table width="228" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><A HREF="../customer/customer01.php"><img src="../img/main/sang1.jpg" width="228" height="27"></A></td>
                          </tr>
                          <tr> 
                            <td> 
                              <table width="228" border="0" cellspacing="0" cellpadding="0">
                               
<?
$query=DBquery("select * from brd_customer01  order by replyno desc,reply  limit 0,4");
while($row = mysql_fetch_array($query)){ 
?>
                                <tr> 
                                  <td width="10" height="21"><img src="../img/main/sang2.jpg" width="4" height="2"></td>
                                  <td width="218"><a href="../customer/customer01.php?show=view&id=<?=$row[id]?>&board=customer01"><?=cut_string($row[subject],32)?></a></a></td>
                                </tr>
<? }?>
                              </table>
