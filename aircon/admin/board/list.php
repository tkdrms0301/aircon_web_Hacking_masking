<!-- 게시판 시작 -->
<?php
include '../include/xss_filter.php';

$user_input = isset($_GET['content']) ? $_GET['content'] : '';
$sanitized_input = sanitize_input($user_input);
?>

<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="34" colspan="5" background="../img/board/bg.jpg">
                        <table width="700" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="50" height="36" align="center"><img src="../img/board/num.jpg" width="19" height="12"></td>
                            <td width="3" height="36"><img src="../img/board/bar.jpg" width="3" height="36"></td>
                            <td width="378"height="36" align="center"><img src="../img/board/title.jpg" width="20" height="12"></td>
                            <td width="3"height="36" background="../img/board/bg.gif"><img src="../img/board/bar.jpg" width="3" height="36"></td>
                            <td width="70"height="36" align="center"><img src="../img/board/name.jpg" width="30" height="12"></td>
                            <td width="3" background="../img/board/bg.gif"><img src="../img/board/bar.jpg" width="3" height="36"></td>
                            <td width="80" align="center"><img src="../img/board/date.jpg" width="39" height="12"></td>
                            <td width="3" background="../img/board/bg.gif"><img src="../img/board/bar.jpg" width="3" height="36"></td>
                            <td width="50" align="center"><img src="../img/board/count.jpg" width="30" height="12"></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                 
<?php
    if (!$offset) $offset=0;
    $limit=10;
    $page=10;

    $contents = mysql_real_escape_string($contents);
    $select = mysql_real_escape_string($select);  
    if ($contents) {
      if (strpos($select, "subject")) $select="subject";
      else if (strpos($select, "comment")) $select="comment";
      else if (strpos($select, "name")) $select="name";
      else $select="subject";
      $condition="where $select like '%$contents%'";
    } else $condition="";
    
    if ($contents) $condition="where $select like '%$contents%'"; else $condition="";
    if ($category) {
        if (!$condition) $condition="where category = '$category'";
        else $condition .="and  category = '$category'";
    }
    $row=DBarray("select count(*) from brd_".$board." $condition");

    $numrows=$row[0];
    $no=$numrows-$offset;
    $orderby = "order by votes desc,replyno desc,reply";
    $result=DBquery("select * from brd_".$board." $condition $orderby limit $offset, $limit");

    while ($row=mysql_fetch_array($result)) {
        $subject=$row['subject'];
        $wdate=explode(" ",$row['wdate']);
?>
                    <tr> 
                      <td width="53" height="29" align="center"><?=htmlspecialchars($no--)?></td>
                      <td width="395">&nbsp;&nbsp;
<?php if ($row['votes'] == "1") { ?>
<IMG SRC="../img/board/ic_notice.gif" WIDTH="25" HEIGHT="13" BORDER="0" ALT="" align="absmiddle"><b>
<?php } ?>
            <?php if ($row['reply'] == "AAAAA") { ?>
            <?php } else { ?>
            &nbsp;&nbsp;&nbsp;<img src="../img/board/re_icon.gif" width="20" height="10">
            <?php } ?>
            <a href="<?=htmlspecialchars($PHP_SELF)?>?main=view&show=view&board=<?=htmlspecialchars($board)?>&id=<?=htmlspecialchars($row['id'])?>&offset=<?=htmlspecialchars($offset)?>&select=<?=htmlspecialchars($select)?>&contents=<?=htmlspecialchars($contents)?>&category=<?=htmlspecialchars($row['category'])?>&menu=<?=htmlspecialchars($menu)?>">
            <?=htmlspecialchars(cut_string($subject,46))?>
            </a><?php if (isnew($row['wdate']." 00:00:00",1)) { ?>
            <img src="../img/board/new_icon.gif" align="absmiddle">
            <?php } ?><?php if ($row['showorhidden']=="2") { ?>
            <img src="../img/board/icon_secret.gif" align="absmiddle">
            <?php } ?>
                      </td>
                      <td width="75" align="center"><a href="mailto:<?=htmlspecialchars($row['email'])?>"><?=htmlspecialchars(cut_string($row['name'],6))?></a></td>
                      <td width="77" align="center"><?=htmlspecialchars($row['wdate'])?></td>
                      <td width="50" align="center"><?=htmlspecialchars($row['hits'])?></td>
                    </tr>
                    <tr> 
                      <td background="../img/board/board/dot.gif"height="3" colspan="5"></td>
                    </tr> 
<?php } ?>
                    <tr> 
                      <td bgcolor="e7e7e7" height="1" colspan="5"></td>
                    </tr>
</table>  
<table width="700" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td height="31" align=center>
<?php
$listsort="category=".htmlspecialchars($category)."&contents=".htmlspecialchars($contents)."&select=".htmlspecialchars($select)."&board=".htmlspecialchars($board)."&menu=".htmlspecialchars($menu);
include "../include/page.php";
?>
                      </td>
                    </tr>
                    <tr> 
                      <td bgcolor="e7e7e7" height="1"></td>
                    </tr>

                    <tr>
                      <td height="35" align=right><a href="<?=htmlspecialchars($PHP_SELF)?>?menu=<?=htmlspecialchars($menu)?>&show=write&<?=htmlspecialchars($listsort)?>"><img src="../img/board/board/write.gif" width="68" height="23" border="0"></a></td>
                    </tr>

                    <tr> 
                      <td height="31" align=right> <table width="290" border="0" cellspacing="0" cellpadding="0">
                          <form name="search" action="<?=htmlspecialchars($PHP_SELF)?>?board=<?=htmlspecialchars($board)?>&menu=<?=htmlspecialchars($menu)?>&category=<?=htmlspecialchars($category)?>" method="post">
                            <tr> 
                              <td height="1"></td>
                              <td rowspan="2" align="left" > &nbsp; <input  name="contents" type="text" class="textbox1" <?=__ONFOCUS?> size="20" value="<?=htmlspecialchars($contents)?>"> 
                                <input name="image" type='image' src="../img/board/board/search_btn.gif" align="absmiddle" width="55" height="23"> 
                              </td>
                            </tr>
                            <tr> 
                              <td width="12" align=right><select name="select">
                              <option value='subject' <?php if ($select=="subject") echo "selected";?>>제목</option>
                              <option value='comment' <?php if ($select=="comment") echo "selected";?>>내용</option>
                              <option value='name' <?php if ($select=="name") echo "selected";?>>등록자</option>    
                                </select> </td>
                            </tr>
                          </form>
                        </table></td>
                    </tr>
                  </table>
                        <!-- 게시판 끝 -->
