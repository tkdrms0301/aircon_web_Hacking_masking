<?php
include '../include/session_config.php';
?>
<?php if (!isset($_SESSION['user_id'])) { ?>
<script>
    function frmLogin_check() {
        if (!frmLogin.id.value) {
            alert("아이디를 입력하세요.");
            frmLogin.id.focus();
            return false;
        }
        if (!frmLogin.pass.value) {
            alert("패스워드를 입력하세요.");
            frmLogin.pass.focus();
            return false;
        }
    }
</script>
<form method="post" name="frmLogin" action="../member/login_ok.php" onsubmit="return frmLogin_check()">
    <input type="hidden" name="url" value="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table width="175" border="0" cellspacing="0" cellpadding="0">
        <tr> 
            <td><img src="../img/main/login_1.jpg" width="175" height="36"></td>
        </tr>
        <tr> 
            <td bgcolor="#E7E7E7" align="center"> 
                <table width="165" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr> 
                        <td width="24"><img src="../img/main/login_id.jpg" width="24" height="16"></td>
                        <td align="center"> 
                            <input type="text" name="id" size="12" tabindex="1">
                        </td>
                        <td rowspan="2" align="right" width="44">
                            <input type="image" src="../img/main/login_btn.jpg" width="38" height="38" border="0" tabindex="3">
                        </td>
                    </tr>
                    <tr> 
                        <td><img src="../img/main/login_pw.jpg" width="24" height="16"></td>
                        <td align="center"> 
                            <input type="password" name="pass" size="12" tabindex="2">
                        </td>
                    </tr>
                </table>
                <img src="../img/main/login_line.jpg" width="163" height="5" vspace="5"><br>
                <img src="../img/main/login_join.jpg" width="163" height="19" border="0" usemap="#join"> 
            </td>
        </tr>
        <tr> 
            <td><img src="../img/main/login_2.jpg" width="175" height="7"></td>
        </tr>
    </table>
    
    <map name="join">
        <area shape="rect" coords="4,2,57,17" href="../member/agree.php">
        <area shape="rect" coords="61,3,159,19" href="#" onclick="MM_openBrWindow('../member/search.php','','width=295,height=233,left=200, top=200')" style="cursor: hand">
    </map>
</form>
<?php } else { ?>
<!--로그 아웃 -->
<table width="175" border="0" cellspacing="0" cellpadding="0">
    <tr> 
        <td><img src="../img/main/login_1.jpg" width="175" height="36"></td>
    </tr>
    <tr> 
        <td bgcolor="#E7E7E7" align="center"> 
            <table width="165" height="40" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr> 
                    <td align="center"> 
                        <strong><font color="#153486"><?php echo $_SESSION['user_name']; ?></font></strong>님 환영합니다 
                    </td>
                    <td rowspan="2" align="right" width="44"></td>
                </tr>
            </table>
            <img src="../img/main/login_line.jpg" width="163" height="5" vspace="5"><br>
            <img src="../img/main/login_mody.jpg" width="163" height="19" border="0" usemap="#mody"> 
        </td>
    </tr>
    <tr> 
        <td><img src="../img/main/login_2.jpg" width="175" height="7"></td>
    </tr>
</table>
<map name="mody">
    <area shape="rect" coords="4,2,57,17" href="../member/mem_mody.php">
    <area shape="rect" coords="61,3,159,19" href="../member/logout.php">
</map>
<?php } ?>

<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
    window.open(theURL,winName,features);
}
//-->
</script>
