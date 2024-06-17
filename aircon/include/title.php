<?php
include "../include/session_config.php";
include "../include/config.php";
include "../include/function.php";
?>
<title>:: 탑에어컨에 오신 것을 환영합니다 ::</title>
<script type="text/javascript">
<!--
	function loginform_bgChange(obj, act) {
		if ( act == 'F') {
			obj.className = 'textbox1';
			obj.style.backgroundColor='#ffffff';
		} else {
			obj.className = 'textbox2';
			obj.style.backgroundColor='#F0F0F0';	
		}			
	}
//-->
</script>
<?php
if(isset($_SESSION['user_id'])) {
	$user_row = DBarray("SELECT * FROM users WHERE userid ='{$_SESSION['user_id']}' LIMIT 0,1");
	$wish_list = explode("|", $wish_lists);
	$user_name = $user_row['name'];
	$jumin = explode("-", $user_row['jumin']);
	$zip = explode("-", $user_row['zip']);
	$tel = explode("-", $user_row['tel']);
	$cell = explode("-", $user_row['cell']);
	$bz_nos = explode("-", $user_row['bz_no']);
}

if (preg_match("/mypage.php|mypage1.php|mypage2.php/", $_SERVER['PHP_SELF'])) {
	if (!isset($_SESSION['user_id'])) {
		error_check("회원만 이용 가능합니다.");
		//redirect_alert("/login/login.php?url=/mypage/orderinfo.php","회원만 이용가능합니다.");
		exit;
	}
}

if (preg_match("/market|community|qna.php|as.php/", $_SERVER['PHP_SELF'])) {
	if (isset($_SESSION['user_id'])) {
		$write = "ok";
	}
}
?>
<script src="../js/lib.validate.js"></script>
<script TYPE='text/JavaScript' LANGUAGE='JavaScript1.2' SRC='../js/member.js'></script>
<script TYPE='text/JavaScript' LANGUAGE='JavaScript1.2' SRC='../js/mEmbed.js'></script>
<body style="overflow-x:hidden;" topmargin=0 leftmargin=0>
