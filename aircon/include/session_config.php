<?php
session_start();

// ���� ���� �ð� (��)
$session_lifetime = 1800; // 30��

// ������ ������ Ȱ�� �ð� ����
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $session_lifetime)) {
    // ���� ����
    session_unset();
    session_destroy();
    session_start(); // ���ο� ���� ����
}

$_SESSION['LAST_ACTIVITY'] = time(); // ���� �ð��� ������ Ȱ�� �ð����� ����

// ���� ���� ����
ini_set('session.gc_maxlifetime', $session_lifetime);
ini_set('session.cookie_lifetime', $session_lifetime);

?>