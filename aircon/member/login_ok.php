<?php
include ("../include/session_config.php");
include ("../include/config.php");
include ("../include/function.php");

$id = $_POST['id'];
$pass = $_POST['pass'];

if (!$id || !$pass) {
    echo "<script>alert('아이디 및 비밀번호를 입력해주세요.');</script>";
}
$id = mysql_real_escape_string($id);
$pass = mysql_real_escape_string($pass);

$row = DBarray("SELECT * FROM users WHERE userid = '$id' AND pass = '$pass'");

if ($row['userid']) { // 회원이 맞을 때
    DBquery("UPDATE users SET visitcnt = visitcnt + 1, ldate = NOW() WHERE userid = '$id'");

    // 세션에 사용자 정보 저장
    $_SESSION['user_id'] = $row['userid'];
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['user_tel'] = $row['tel'];
    $_SESSION['user_cell'] = $row['cell'];
    $_SESSION['user_level'] = $row['level'];

    $redirect_url = isset($_POST['gotourl']) && !empty($_POST['gotourl']) ? $_POST['gotourl'] : "../main/main.php";
    header("Location: $redirect_url");
    exit();
} else { // 회원이 아닐 때
    echo "<script>alert('아이디 및 비밀번호가 일치하지 않습니다.'); history.back();</script>";
    exit();
}
?>
