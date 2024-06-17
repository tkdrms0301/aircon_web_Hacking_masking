<?php
include("../include/session_config.php");
include("check.php");
include("../include/config.php");
include("../include/function.php");

	if ($userid) {
		$f_query = "select * from users where userid = '$userid'";
		$f_rs = DBarray($f_query );
	}
?>
<html>
<head>
<link rel="stylesheet" href="../css/vsun.css" type="text/css">
<script>
function check_submit() {
	if (!sendmail.subject.value) {
		sendmail.subject.focus();
		alert("메일제목을 입력하세요");
		return false;
	}
	if (!sendmail.comment.value) {
		sendmail.comment.focus();
		alert("메일내용을 입력하세요");
		return false;
	}
	return true;
}
</script>
</head>
<body>
<table width="460">
  <form name="sendmail" action="sendmail_ok.php" method="post" onsubmit="return check_submit();">
	<tr>
		<td>
		<table width="100%" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
          <tr bgcolor="#ffffff"> 
            <td width="20%" align="center">받는이</td>
            <td width="80%"> 
<? if ($userid) {?>
              <?=$f_rs[userid]?>
              , 
              <?=$f_rs[name]?>

              <input name="name" type="hidden" id="id" value="<?=$f_rs[name]?>">
              <input name="email" type="hidden" id="id" value="<?=$f_rs[email]?>">

<? } else if ($to=="all") { ?>전체 메일입니다.
<input name="to" type="hidden" id="to" value="all"> 
<? }else { 
  
   if($sex)echo "성별 : $sex"; 
   if($age1)echo "나이 : $age1~$age2"; 
   if($address1)echo "지역 : $address1"; 
      if($concern)echo "관심분야 : $concern"; 
   
} ?>
<input name="sex" type="hidden" id="id" value="<?=$sex?>">
<input name="age1" type="hidden" id="id" value="<?=$age1?>">
<input name="age2" type="hidden" id="id" value="<?=$age2?>">
<input name="address1" type="hidden" id="id" value="<?=$address1?>">
<input name="concern" type="hidden" id="id" value="<?=$concern?>">
              
            </td>
          </tr>
          <tr bgcolor="#ffffff"> 
            <td width="20%" align="center">제 목</td>
            <td width="80%"><input name="subject" type="text" id="subject" size="40">
              <input name="html" type="checkbox" id="html" value="yes">
              html </td>
          </tr>
          <tr bgcolor="#ffffff"> 
            <td width="20%" align="center">내 용</td>
            <td width="80%"><textarea name="comment" cols="50" rows="15" id="comment"></textarea> </td>
          </tr>
        </table>
		<br>
		
		<table width="100%">		
			<tr>
				<td align="center"><input type="submit" name="Submit" value=" 확인 ">
              &nbsp;
              <input type="reset" name="Submit2" value="초기화">
              &nbsp; 
              <input type="button" value=" 닫기 " onclick="javascript:window.close()"></td>
			</tr>
		</table>
		
		</td>
	</tr></form>
</table>
</body>
</html>