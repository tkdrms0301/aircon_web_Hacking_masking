<?php
include ("../include/config.php");
include ("../include/function.php");
include ("../include/session_config.php");

// ���� ����
session_unset();
session_destroy();

// ������ �����ϰ� �ִ� ��Ű �����
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// ���ο� ���� ����
session_start();
session_regenerate_id(true); // 
OnlyMsgView("�α׾ƿ� �Ǿ����ϴ�. �̿��� �ּż� �����մϴ�.");
echo("<meta http-equiv='Refresh' content='0; URL=../main/main.php'>");
?>