<?php
include '../include/xss_filter.php';

$user_input = isset($_GET['contents']) ? $_GET['contents'] : '';
$sanitized_input = sanitize_input($user_input);
?>

<!--- 게시판 시작 ---->
<table width="339" border="0" cellspacing="0" cellpadding="0" align="center">
<form name="form1" method="post" action="<?= sanitize_input($_SERVER['PHP_SELF']) ?>?show=view&board=<?= sanitize_input($board) ?>&id=<?= sanitize_input($id) ?>&offset=<?= sanitize_input($offset) ?>&search=<?= sanitize_input($search) ?>&contents=<?= $sanitized_input ?>&pg=<?= sanitize_input($pg) ?>&category=<?= sanitize_input($category) ?>">
<input name="url" type="hidden" id="url" value="<?= sanitize_input($_SERVER['PHP_SELF']) ?>"> 
<input name="board" type="hidden" id="board" value="<?= sanitize_input($board) ?>"> 
    <tr> 
        <td align="center" valign="top"><img src="../img/board/board/delimg.gif" width="339" height="66"></td>
    </tr>
    <tr> 
        <td align="center" height="90" background="../img/board/board/del_bg.gif">
            <table width="256" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                    <td height="64" align="center" background="../img/board/board/delimg02.gif">
                        <img src="../img/board/board/del_pw.gif" width="75" height="16" align="absmiddle">&nbsp;&nbsp;&nbsp; 
                        <input name="pass" type="password" id="pass3" size="16" class="textbox1">
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr> 
        <td align="center" valign="top" background="../img/product/board/del_bg.gif"><img src="../img/board/board/del_line.gif" width="339" height="10"></td>
    </tr>
    <tr> 
        <td height="24" align="center" background="../img/board/board/del_bg.gif">
            <input type="image" src="../img/board/board/ok_btn.gif" border="0">&nbsp;&nbsp;
            <a href="javascript:history.back();"><img src="../img/board/board/cencle_btn.gif"  border="0"></a>
        </td>
    </tr>
    <tr> 
        <td align="center" valign="top"><img src="../img/board/board/delimg01.gif" width="339" height="13"></td>
    </tr>
</form>
</table>
<!-- 게시판 끝--->
