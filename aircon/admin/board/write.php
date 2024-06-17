<?php
include_once('../gmEditor/func_editor.php');

if ($id) {
    $row = DBarray("select * from brd_".$board." where id='$id'");
    $showorhidden = htmlspecialchars($row['showorhidden'], ENT_QUOTES, 'EUC-KR');
    $category = htmlspecialchars($row['category'], ENT_QUOTES, 'EUC-KR');
    $subject = htmlspecialchars($row['subject'], ENT_QUOTES, 'EUC-KR');
    $name = htmlspecialchars($row['name'], ENT_QUOTES, 'EUC-KR');
    $email = htmlspecialchars($row['email'], ENT_QUOTES, 'EUC-KR');
    $comment = htmlspecialchars($row['comment'], ENT_QUOTES, 'EUC-KR');
    $file1 = $row['file1'];
    $file1_name = $row['file1_name'];
    $pass = htmlspecialchars($row['pass'], ENT_QUOTES, 'EUC-KR');
    $p_code = htmlspecialchars($row['p_code'], ENT_QUOTES, 'EUC-KR');
    $wdate = $row['wdate'];
} else if ($parent) {
    $row = DBarray("select * from brd_".$board." where id='$parent'");
    $subject = htmlspecialchars($row['subject'], ENT_QUOTES, 'EUC-KR');
    $name = "관리자";
    $pass = "6관리자^";
    $p_code = $row['p_code'];
    $wdate = $row['wdate'];
    $comment = htmlspecialchars("$row[name]님의 글입니다\n-------------------------------------------------------\n" . $row['comment'] . "\n-------------------------------------------------------\n", ENT_QUOTES, 'EUC-KR');
    $uname = $user_name;
    $uemail = $user_email;
} else {
    $name = "관리자";
    $pass = "6관리자^";
    $wdate = date('Y-m-d');
}
$content = stripslashes(trim($comment));
$upload_image = '';
$upload_media = '1';
?>		
<script>
function check_write() {
    if (!form1.name.value) {
        alert('작성자를 입력하세요.');
        form1.name.focus();
        return false;
    }
    if (!form1.subject.value) {
        alert('제목을 입력하세요.');
        form1.subject.focus();
        return false;
    }
    editor_wr_ok();
}
</script>
<form name="form1" method="post" action="<?=$PHP_SELF?>?menu=<?=$menu?>&show=write_ok&parent=<?=htmlspecialchars($parent, ENT_QUOTES, 'EUC-KR')?>&id=<?=htmlspecialchars($id, ENT_QUOTES, 'EUC-KR')?>&pg=<?=htmlspecialchars($pg, ENT_QUOTES, 'EUC-KR')?>" enctype="multipart/form-data">
  <input name="id" type="hidden" id="id" value="<?=htmlspecialchars($id, ENT_QUOTES, 'EUC-KR')?>"> 
  <input name="parent" type="hidden" id="parent" value="<?=htmlspecialchars($parent, ENT_QUOTES, 'EUC-KR')?>"> 
  <input name="offset" type="hidden" id="offset" value="<?=htmlspecialchars($offset, ENT_QUOTES, 'EUC-KR')?>"> 
  <input name="select" type="hidden" id="select" value="<?=htmlspecialchars($select, ENT_QUOTES, 'EUC-KR')?>"> 
  <input name="contents" type="hidden" id="contents" value="<?=htmlspecialchars($contents, ENT_QUOTES, 'EUC-KR')?>"> 
  <input name="url" type="hidden" id="url" value="<?=htmlspecialchars($PHP_SELF, ENT_QUOTES, 'EUC-KR')?>">		  
  <input name="board" type="hidden" id="board" value="<?=htmlspecialchars($board, ENT_QUOTES, 'EUC-KR')?>">
  <input name="category" type="hidden" id="category" value="<?=htmlspecialchars($category, ENT_QUOTES, 'EUC-KR')?>">

  <table width="700" border="0" cellspacing="0" cellpadding="0">
      <tr>
          <td background="../img/board/board/bg.gif" height="34">&nbsp;</td>
      </tr>
  </table>
  <table width="700" border="0" cellspacing="0" cellpadding="0">
      <tr>
          <td width="81" height="30"><img src="../img/board/board/v_name01.gif" width="75" height="12"></td>
          <td colspan="3" bgcolor="#FFFFFF">&nbsp;&nbsp;
              <input name="name" type="text" size="8" class="textbox1" value="<?=htmlspecialchars($name, ENT_QUOTES, 'EUC-KR')?>"> 
          </td>
      </tr>
      <tr>
          <td background="../img/board/board/dot.gif" height="3" colspan="4"></td>
      </tr>
      <tr>
          <td height="30" bgcolor="#FFFFFF"><img src="../img/board/board/v_subj.gif" width="75" height="12"></td>
          <td colspan="3" bgcolor="#FFFFFF">&nbsp;&nbsp;
              <input name="subject" type="text" size="50" maxlength="80" class="textbox1" value="<?=htmlspecialchars($subject, ENT_QUOTES, 'EUC-KR')?>">
              <input type="checkbox" name="votes" value="1" <?php if ($row['votes'] == '1') echo "checked"; ?>>공지사항
              <?php if ($hidden == '1') { ?>
                  <input type="radio" name="showorhidden" value="2" checked>비공개
                  <input type="radio" name="showorhidden" value="1" <?php if ($showorhidden == "1") echo "checked"; ?>>공개
              <?php } ?>
          </td>
      </tr>
      <tr>
          <td background="../img/board/board/dot.gif" height="3" colspan="4"></td>
      </tr>
      <tr>
          <td height="30" bgcolor="#FFFFFF"><img src="../img/board/board/v_email.gif" width="75" height="12"></td>
          <td width="252" bgcolor="#FFFFFF"> &nbsp;&nbsp;
              <input name="email" type="text" size="20" maxlength="40" class="textbox1" value="<?=htmlspecialchars($email, ENT_QUOTES, 'EUC-KR')?>"> 
          </td>
          <td width="77"></td>
          <td width="210" bgcolor="#FFFFFF"> &nbsp;&nbsp;
              <input name="pass" type="hidden" id="pass" size="10" maxlength="10" class="textbox1" value="<?=htmlspecialchars($pass, ENT_QUOTES, 'EUC-KR')?>"> 
          </td>
      </tr>
      <tr>
          <td background="../img/board/board/dot.gif" height="3" colspan="4"></td>
      </tr>
      <tr>
          <td valign="top" bgcolor="#FFFFFF" colspan="4"><?=myEditor(1,'../gmEditor','form1','comment','600','300','euc-kr');?></td>
      </tr>
      <tr>
          <td background="../img/board/board/dot.gif" height="3" colspan="4"></td>
      </tr>
      <tr>
          <td height="30" align="center" bgcolor="#FFFFFF">
              <?php if ($board == "movie" || $board == "about") { ?>
                  <img src="../img/board/board/v_file03.gif" width="75" height="12">
              <?php } else { ?>
                  <img src="../img/board/board/v_file01.gif" width="75" height="12">
              <?php } ?>
          </td>
          <td colspan="3" bgcolor="#FFFFFF">&nbsp;&nbsp;
              <input name="file[0]" type="file" id="file[0]" size="55" maxlength="80" class="textbox1">
              <br>
              <?php if ($file1) {
                  $temp_ = explode("/", $file1); ?>	
                  <br>
                  <input name="file_delete[0]" type="checkbox" id="file_delete[0]" value="yes">
                  이 글에는 
                  <?=$temp_[sizeof($temp_)-1]?>
                  파일이 있습니다. 삭제하시겠습니까? 
              <?php } ?>
          </td>
      </tr>
  </table>
  <table width="700" border="0" cellspacing="0" cellpadding="0">
      <tr>
          <td height="8"></td>
      </tr>
      <tr>
          <td align="right">
              <img src="../img/board/board/write.gif" width="68" height="23" border="0" onClick="check_write();" style="cursor:hand"> 
              <a href="javascript:window.history.go(-1);"><img src="../img/board/board/list_btn.gif" border="0"></a>
          </td>
      </tr>
  </table>
</form>
<Div id='popCal' style='POSITION:absolute;display:none;border:1px ridge;width:10'>
    <iframe name="popFrame" src="../js/calendar/calendar.html" frameborder="0" scrolling="no" width=174 height=180></iframe>
</DIV>
<SCRIPT event=onclick() for=document>popCal.style.display = "none";</SCRIPT>
