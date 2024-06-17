<?php
include ("../include/config.php");
include ("../include/function.php");
include ("../include/session_config.php");

// 세션 비우기
session_unset();
session_destroy();

// 세션을 저장하고 있는 쿠키 지우기
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 새로운 세션 시작
session_start();
session_regenerate_id(true); // 
OnlyMsgView("로그아웃 되었습니다. 이용해 주셔서 감사합니다.");
echo("<meta http-equiv='Refresh' content='0; URL=../main/main.php'>");
?>