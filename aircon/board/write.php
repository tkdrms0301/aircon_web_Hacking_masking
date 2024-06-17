<?php
include_once('../gmEditor/func_editor.php');
include "../include/session_config.php";
include 'xss_filter.php';

$user_input = isset($_GET['xss_content']) ? $_GET['xss_content'] : '';

$sanitized_input = sanitize_input($user_input);


if ($id) {
    $row = DBarray("select * from brd_" . $board . " where id='$id'");
    if ($_SESSION['user_id'] != $row['userid']) {
        error_check("���� ������ �����ϴ�.");
    }
    $showorhidden = sanitize_input($row['showorhidden']);
    $category = sanitize_input($row['category']);
    $subject = sanitize_input($row['subject']);
    $name = sanitize_input($row['name']);
    $email = sanitize_input($row['email']);
    $comment = htmlspecialchars($row['comment'], ENT_QUOTES, 'EUC-KR');
    $file1 = $row['file1'];
    $file1_name = $row['file1_name'];
    $pass = sanitize_input($row['pass']);
    $p_code = $row['p_code'];
} else if ($parent) {
    $row = DBarray("select * from brd_" . $board . " where id='$parent'");
    $subject = $row['subject'];
    $name = $_SESSION['user_name'];
    $email = $_SESSION['user_email'];
    $comment = sanitize_input("$row[name]���� ���Դϴ�\n-------------------------------------------------------\n" . $row['comment'] . "\n-------------------------------------------------------\n");
} else {
    $name = $_SESSION['user_name'];
    $email = $_SESSION['user_email'];
}
$content = stripslashes(trim($comment)); // �� ������ �������� �������� ���� �ʿ���
$upload_image = ''; // �̹��� ���ε� ��� (1�� ������)
$upload_media = '1'; // �̵�� ���ε� ��� (1�� ������)
?>

<script>
function check_write() {
    if (!form1.name.value) {
        alert('�ۼ��ڸ� �Է��ϼ���.');
        form1.name.focus();
        return false;
    }
    if (!form1.subject.value) {
        alert('������ �Է��ϼ���.');
        form1.subject.focus();
        return false;
    }
    if (!form1.pass.value) {
        alert('��й�ȣ�� �Է��ϼ���.');
        form1.pass.focus();
        return false;
    }
    editor_wr_ok();
}
</script>

<form name="form1" method="post" action="<?= $PHP_SELF ?>?sub_page=<?= $sub_page ?>&show=write_ok&parent=<?= $parent ?>&id=<?= $id ?>&pg=<?= $pg ?>" ENCTYPE="multipart/form-data">
    <input name="id" type="hidden" id="id" value="<?= $id ?>">
    <input name="parent" type="hidden" id="parent" value="<?= sanitize_input($parent) ?>">
    <input name="offset" type="hidden" id="offset" value="<?= sanitize_input($offset) ?>">
    <input name="select" type="hidden" id="select" value="<?= sanitize_input($select) ?>">
    <input name="contents" type="hidden" id="contents" value="<?= htmlspecialchars($contents, ENT_QUOTES) ?>">
    <input name="url" type="hidden" id="url" value="<?= sanitize_input($PHP_SELF) ?>">
    <input name="board" type="hidden" id="board" value="<?= sanitize_input($board) ?>">
    <!--- �Խ��� ���� ---->
    <!-- �Խ���-->
    <table width="624" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td background="../img/board/board/bg.gif" height="34">&nbsp;</td>
        </tr>
    </table>
    <table width="624" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="81" height="30"><img src="../img/board/board/v_name01.gif" width="75" height="12"></td>
            <td colspan="3" bgcolor="#FFFFFF">&nbsp;&nbsp;
                <input name="name" type="text" size="8" class="textbox1" value="<?= sanitize_input($name) ?>">
            </td>
        </tr>
        <tr>
            <td background="../img/board/board/dot.gif" height="3" colspan="4"></td>
        </tr>
        <?php if ($categoryshow == 1) { ?>
        <tr>
            <td height="30" bgcolor="#FFFFFF"><img src="../img/board/board/v_pname.gif" width="75" height="12"></td>
            <td colspan="3" bgcolor="#FFFFFF">&nbsp;&nbsp;
                <select name="category">
                    <option value="" selected>�з�</option>
                    <?php
                    $sqlstr = "SELECT * FROM category WHERE category < 100 ORDER BY UID ASC";
                    $sqlqry = mysql_query($sqlstr);
                    while ($list = @mysql_fetch_array($sqlqry)) {
                        $selected = ($category == $list['category']) ? 'selected' : '';
                        echo "<option value='{$list['category']}' {$selected}>{$list['name']}</option>\n";
                    }
                    ?>
                </select>
            </td>
        </tr>
        
        <tr>
            <td background="../img/board/board/dot.gif" height="3" colspan="4"></td>
        </tr>
        <?php } else { ?>
        <input name="category" type="hidden" id="board" value="<?= $category ?>">
        <?php } ?>
        <tr>
            <td height="30" bgcolor="#FFFFFF"><img src="../img/board/board/v_subj.gif" width="75" height="12"></td>
            <td colspan="3" bgcolor="#FFFFFF">&nbsp;&nbsp;
                <input name="subject" type="text" size="50" maxlength="80" class="textbox1" value="<?= sanitize_input($subject) ?>">
                <?php if ($hidden == '1') { ?>
                <input type="radio" name="showorhidden" value="2" checked>�����
                <input type="radio" name="showorhidden" value="1" <?php if ($showorhidden == "1") echo "checked"; ?>>����
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td background="../img/board/board/dot.gif" height="3" colspan="4"></td>
        </tr>
        <tr>
            <td height="30" bgcolor="#FFFFFF"><img src="../img/board/board/v_email.gif" width="75" height="12"></td>
            <td width="252" bgcolor="#FFFFFF">&nbsp;&nbsp;
                <input name="email" type="text" size="20" maxlength="40" class="textbox1" value="<?= $email ?>">
            </td>
            <td width="77"><img src="../img/board/board/v_pw.gif" width="75" height="12"></td>
            <td width="210" bgcolor="#FFFFFF">&nbsp;&nbsp;
                <input name="pass" type="text" id="pass" size="10" maxlength="10" class="textbox1" value="<?= sanitize_input($pass) ?>">
            </td>
        </tr>
        <tr>
            <td background="../img/board/board/dot.gif" height="3" colspan="4"></td>
        </tr>
        <tr>
            <td valign="top" bgcolor="#FFFFFF" colspan="4"><?= myEditor(1, '../gmEditor', 'form1', 'comment', '600', '300', 'euc-kr'); ?></td>
        </tr>
        <tr>
            <td background="../img/board/board/dot.gif" height="3" colspan="4"></td>
        </tr>
        <tr>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <?php if ($board == "trade") { ?>
                <img src="../img/board/board/v_file03.gif" width="75" height="12">
                <?php } else { ?>
                <img src="../img/board/board/v_file01.gif" width="75" height="12">
                <?php } ?>
            </td>
            <td colspan="3" bgcolor="#FFFFFF">&nbsp;&nbsp;
                <input name="file[0]" type="file" id="file[0]" size="55" maxlength="80" class="textbox1">
                <br>
                <?php if ($file1) {
                    $temp_ = explode("/", $file1);
                    ?>
                    <br>
                    <input name="file_delete[0]" type="checkbox" id="file_delete[0]" value="yes">
                    �� �ۿ���
                    <?= $temp_[sizeof($temp_) - 1] ?>
                    ������ �ֽ��ϴ�. �����Ͻðڽ��ϱ�?
                <?php } ?>
            </td>
        </tr>
    </table>
    <table width="624" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td height="8"></td>
        </tr>
        <tr>
            <td align="right">
                <img src="../img/board/board/write.gif" alt="qna.php" width="68" height="23" border="0" onClick="check_write();" style="cursor:hand">
                &nbsp;&nbsp;&nbsp;<a href="javascript:window.history.go(-1);"><img src="../img/board/board/list_btn.gif" border="0"></a>
            </td>
        </tr>
    </table>
</form>

<!-- �Խ���-->
<!-- �Խ��� ��--->
