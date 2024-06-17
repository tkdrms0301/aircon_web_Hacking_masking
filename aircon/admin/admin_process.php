<?php
include "../include/session_config.php";
include "../include/config.php";
include "../include/function.php";
if($mode == "logout"){
	session_unregister("U_ID");
	session_unregister("U_PASS");

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
	redirect_alert("./securelogin.php","로그아웃 하였습니다.");
}

if ($admin_id == "" or $admin_passwd == "") {
echo "
<script>
window.alert('아이디/패스워드를 입력해 주세요!');
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
		###########비밀번호 체크
	}  else {  ?>
		<SCRIPT LANGUAGE="javascript">
		alert("패스워드가 일치하지 않습니다.");
		history.back();
		</SCRIPT>
<?
	}

###########아이디 체크
} else {
?>
<SCRIPT LANGUAGE="javascript">
alert("아이디 및 페스워드를 확인하세요.");
history.back();
</SCRIPT>
<?  
}
?>