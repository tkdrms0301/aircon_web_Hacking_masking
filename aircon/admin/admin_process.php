<?php
include "../include/session_config.php";
include "../include/config.php";
include "../include/function.php";
if($mode == "logout"){
	session_unregister("U_ID");
	session_unregister("U_PASS");

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
	redirect_alert("./securelogin.php","�α׾ƿ� �Ͽ����ϴ�.");
}

if ($admin_id == "" or $admin_passwd == "") {
echo "
<script>
window.alert('���̵�/�н����带 �Է��� �ּ���!');
history.back();
</script> ";
exit;
}
$row=DBarray("select * from admin where A_id='$admin_id' and A_pass='$admin_passwd'");
if ($admin_id == $row[A_id]) {  
	if ($admin_passwd ==  $row[A_pass]){  
		$U_ID = $admin_id;
		$U_PASS = $admin_passwd;
		$_SESSION['U_ID'] = $row[A_id];
		$_SESSION['U_PASS'] = $row[A_pass];
		session_register($_SESSION['U_ID'], $_SESSION['U_PASS']);

		echo "<meta http-equiv='Refresh' content='0; URL=index.php'>"; 
		###########��й�ȣ üũ
	}  else {  ?>
		<SCRIPT LANGUAGE="javascript">
		alert("�н����尡 ��ġ���� �ʽ��ϴ�.");
		history.back();
		</SCRIPT>
<?
	}

###########���̵� üũ
} else {
?>
<SCRIPT LANGUAGE="javascript">
alert("���̵� �� �佺���带 Ȯ���ϼ���.");
history.back();
</SCRIPT>
<?  
}
?>