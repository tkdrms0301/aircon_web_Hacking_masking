<?php
include '../include/session_config.php';
unset($_SESSION['cartid']);
unset($_SESSION['orderno']);
include "../include/title.php";

echo"<script language=javascript>
document.location.replace('../main/main.php');
</script>";
exit;
?>