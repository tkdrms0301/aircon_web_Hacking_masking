<?php
include ("../include/session_config.php");
include ("../include/config.php");
include ("../include/function.php");

$id = $_POST['id'];
$pass = $_POST['pass'];

if (!$id || !$pass) {
    echo "<script>alert('���̵� �� ��й�ȣ�� �Է����ּ���.');</script>";
}
$id = mysql_real_escape_string($id);
$pass = mysql_real_escape_string($pass);

$row = DBarray("SELECT * FROM users WHERE userid = '$id' AND pass = '$pass'");

if ($row['userid']) { // ȸ���� ���� ��
    DBquery("UPDATE users SET visitcnt = visitcnt + 1, ldate = NOW() WHERE userid = '$id'");

    // ���ǿ� ����� ���� ����
    $_SESSION['user_id'] = $row['userid'];
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['user_tel'] = $row['tel'];
    $_SESSION['user_cell'] = $row['cell'];
    $_SESSION['user_level'] = $row['level'];

    $redirect_url = isset($_POST['gotourl']) && !empty($_POST['gotourl']) ? $_POST['gotourl'] : "../main/main.php";
    header("Location: $redirect_url");
    exit();
} else { // ȸ���� �ƴ� ��
    echo "<script>alert('���̵� �� ��й�ȣ�� ��ġ���� �ʽ��ϴ�.'); history.back();</script>";
    exit();
}
?>
