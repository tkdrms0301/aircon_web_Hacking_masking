<?php
session_start();

// 세션 만료 시간 (초)
$session_lifetime = 1800; // 30분

// 세션의 마지막 활동 시간 갱신
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $session_lifetime)) {
    // 세션 만료
    session_unset();
    session_destroy();
    session_start(); // 새로운 세션 시작
}

$_SESSION['LAST_ACTIVITY'] = time(); // 현재 시간을 마지막 활동 시간으로 갱신

// 세션 설정 갱신
ini_set('session.gc_maxlifetime', $session_lifetime);
ini_set('session.cookie_lifetime', $session_lifetime);

?>