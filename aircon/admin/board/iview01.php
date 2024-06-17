<?php
$id = mysql_real_escape_string($id);

if (!ctype_digit($id)) {
  echo "<script>
  window.alert('잘못된 접근입니다.');
  window.close();
  </script>";
}
$board = mysql_real_escape_string($board);
$board = preg_replace('/[\s\-\(\)\/\\\.,;=%#&|!\'\"\[\]\{\}\*\+\?]/', '', $board);
if (!$hits) DBquery("update brd_".$board." set hits=hits+1 where id='$id'");
$row=DBarray("select * from brd_".$board." where id='$id'");
$temp_=explode("/",$row['file1']);
$wdate=explode(" ",$row['wdate']);

function str2html($str) {
    $str=htmlspecialchars($str);
    $str=str_replace("  ","&nbsp; ",$str);
    $str=str_replace("\n","<br>",$str);
    return $str;
}
?>
<script>
function doNothing(){} 
function delok(){
  if(confirm("삭제하시겠습니까?") == true){
    return true;
  } else {
      doNothing();
    return false;
  }
}
</script>
<script>
function detail_open(img) {
    window.open("../../board/detail_popup.php?img="+img,"_blank","width=450,height=500");
}
</script>

<?php
include '../include/xss_filter.php';

$user_input = isset($_GET['content']) ? $_GET['content'] : '';
$sanitized_input = sanitize_input($user_input);
?>
<!-- QNA 게시판 -->
<!-- 게시판-->
<table width="700" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td valign="top" height="350">
            <table width="700" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center" valign="top">
                        <table width="700" border="0" cellspacing="1" cellpadding="2">
                            <tr>
                                <td height="34" colspan="4" align="center" background="../img/board/board/bg.gif">&nbsp;<?=str2html($row['subject'])?></td>
                            </tr>
                            <tr>
                                <td width="83" height="33"><img src="../img/board/board/v_name.gif" width="83" height="12"></td>
                                <td width="235" bgcolor="#FFFFFF">&nbsp;&nbsp;<?=str2html($row['name'])?></td>
                                <td width="75"><img src="../img/board/board/v_date.gif" width="83" height="12"></td>
                                <td width="226" bgcolor="#FFFFFF">&nbsp;&nbsp;<?=str2html($row['wdate'])?></td>
                            </tr>
                            <tr>
                                <td height="1" colspan="4" bgcolor="EFEFEF"></td>
                            </tr>
                            <tr>
                                <td height="33"><img src="../img/board/board/v_count.gif" width="83" height="12"></td>
                                <td height="13" bgcolor="#FFFFFF">&nbsp;&nbsp;<?=str2html($row['hits'])?></td>
                                <td height="13"><img src="../img/board/board/v_file.gif" width="83" height="12"></td>
                                <td height="13" bgcolor="#FFFFFF">&nbsp;&nbsp;<a href="../../board/down.php?id=<?=str2html($row['id'])?>&board=<?=str2html($board)?>"><?=str2html($row['file1_name'])?></a></td>
                            </tr>
                            <tr>
                                <td height="1" colspan="4" bgcolor="EFEFEF"></td>
                            </tr>
                            <tr>
                                <td height="4" colspan="4"></td>
                            </tr>
                            <tr>
                                <td height="9" colspan="4"></td>
                            </tr>
                        </table>
                        
                        <?php
                        $exe = array_pop(explode(".",$row['file1']));
                        if($exe=="jpg" || $exe=="gif"|| $exe=="GIF"|| $exe=="JPG"|| $exe=="JPEG"|| $exe=="jpeg"){
                        ?>
                        <table width="700" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td bgcolor="#FFFFFF" align="center">
                                    <?php 
                                    $hmax=700; $wmax=700;
                                    if($row['file1'] && file_exists("../../board/data/".$row['file1'])){?>
                                        <A HREF="javascript:;" onClick="detail_open('../../board/data/<?=str2html($row['file1'])?>')"><?=makeImg("../board/data/".$row['file1']);?></A><br><br>        
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                        <?php } ?>
                        <?php if($row['HTMLYN']=='b'){ ?>
                        <table width='700' border='0' cellpadding='2' cellspacing='1' bgcolor='E4E4E4' style='table-layout:fixed'>
                            <tr>
                                <td bgcolor='#FFFFFF'><?=stripslashes(nl2br($row['comment']))?></td>
                            </tr>
                        </table>
                        <?php } else { ?>
                        <table width='700' border='0' cellpadding='2' cellspacing='1' bgcolor='E4E4E4' style='table-layout:fixed'>
                            <tr>
                                <td bgcolor='#FFFFFF'><?=stripslashes($row['comment'])?></td>
                            </tr>
                        </table>
                        <?php } ?>
                        <table width="700" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td height="8" colspan="2"></td>
                            </tr>
                            <tr>
                                <td height="4" colspan="2" align="center"><img src="../img/board/board/space.gif" height="4"></td>
                            </tr>
                            <?php
                            $listt="board=".str2html($board)."&offset=".str2html($offset)."&select=".str2html($select)."&contents=".str2html($contents)."&category=".str2html($category)."&menu=".str2html($menu);
                            ?>
                            <tr>
                                <td width="542" align="left">
                                    <a href="<?=$PHP_SELF?>?<?=$listt?>&show=write&parent=<?=str2html($id)?>"><img src="../img/board/board/reply_btn.gif" width="68" height="23" border="0"></a>
                                    &nbsp;&nbsp;<a href="<?=$PHP_SELF?>?<?=$listt?>&show=write&id=<?=str2html($id)?>"><img src="../img/board/board/mody_btn.gif" width="68" height="23" border="0"></a>&nbsp;&nbsp;
                                    <a href="<?=$PHP_SELF?>?<?=$listt?>&show=delete_ok&id=<?=str2html($id)?>" onClick="return confirm('삭제하시겠습니까?')"><img src="../img/board/board/del_btn.gif" width="68" height="23" border="0"></a>
                                </td>
                                <td width="542" align="right"><a href="<?=$PHP_SELF?>?<?=$listt?>&show=list"><img src="../img/board/board/list_btn.gif" width="68" height="23" border="0"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<?php
if (!function_exists('sanitize_input')) {
    function sanitize_input($input) {
        $xss_filtered = preg_replace(array('/[&]/', '/[<]/', '/[>]/', '/["]/', "/[']/"), array('&amp;', '&lt;', '&gt;', '&quot;', '&#39;'), $input);
        $filtered_input = htmlspecialchars(strip_tags($xss_filtered), ENT_QUOTES, 'EUC-KR');
        return $filtered_input;
    }
}

if (!function_exists('strip_tags_input')) {
    function strip_tags_input($input) {
        return strip_tags($input);
    }
}
?>
