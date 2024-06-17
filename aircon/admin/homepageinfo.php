<? include "../admin/head.php";

// 비밀번호 복잡성 검토 함수
function checkPasswordComplexity($pwd) {
  $uppercase = preg_match('@[A-Z]@', $pwd);
  $lowercase = preg_match('@[a-z]@', $pwd);
  $numbering    = preg_match('@[0-9]@', $pwd);
  $specialChars = preg_match('@[^\w]@', $pwd);

  // 각 조건을 만족하는지 확인
  $length = strlen($pwd);
  $types = $uppercase + $lowercase + $numbering + $specialChars;

  if (($types >= 2 && $length >= 10) || ($types >= 3 && $length >= 8)) {
      return true;
  } else {
      return false;
  }
}

if($mode){
$input[A_id]=$A_id;
if($A_pass1){
  // 비밀번호 복잡성 검토
  if (!checkPasswordComplexity($A_pass1)) {
    OnlyMsgView("비밀번호는 영문 대문자, 영문 소문자, 숫자, 특수문자 중 2종류 이상을 조합하여 최소 10자리 이상, 또는 3종류 이상을 조합하여 최소 8자리 이상이어야 합니다.");
    redirect($_SERVER["HTTP_REFERER"]);
    exit;
  }else{
    $input[A_pass]=$A_pass1;
  } 
}
$input[A_name]=$A_name;
$input[A_email]=$A_email;
for($cnt=0;$cnt<sizeof($A_bank1);$cnt++){
	if($A_bank1[$cnt])$A_banks .=$A_bank1[$cnt]."|".$A_bank2[$cnt]."|".$A_bank3[$cnt]."\n";
}
$input[A_bank]=$A_banks;
$input[A_hp]=$A_hp;
$input[A_tel]=$A_tel;
$input[A_baesong]=$A_baesong;
$input[A_baesongbi]=$A_baesongbi;
$input[A_usepoint]=$A_usepoint;
$input[A_point]=$A_point;

$input[A_baesong01]=addslashes($A_baesong01);
$input[A_baesong02]=addslashes($A_baesong02);
$input[A_baesong03]=addslashes($A_baesong03);
$input[wdate]=date('Y-m-d');
setUpdate("admin", $input, $query_option="", $type=0);
}
$row=DBarray("select * from admin  limit 0,1");
$bank = explode("\n",$row[A_bank]);

?>
<!---------main------------>

<form method="post" name="admin" action="<?=$PHP_SELF?>?mode=mody">

<table width="800" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
  <tr> 
    <td colspan="4" bgcolor="#F2FFE6">관리자모드 로그인정보</td>
  </tr>
  <tr> 
    <td width="147" height="30" bgcolor="#F9F9F9">이름<br></td>
    <td colspan="3" bgcolor="#FFFFFF"><input name="A_name" type="text" id="id"  size="20" value="<?=$row[A_name]?>"></td>
  </tr>
   <tr> 
    <td width="147" height="30" bgcolor="#F9F9F9">로그인아이디<br></td>
    <td colspan="3" bgcolor="#FFFFFF"><input name="A_id" type="text" id="id"  size="10" value="<?=$row[A_id]?>"></td>
  </tr>
  <tr> 
  <td height="30" bgcolor="#F9F9F9">현재비밀번호</td>
    <td width="170" height="30" bgcolor="#FFFFFF">
      <input name="A_pass" type="password" id="pw" value="<?=$row[A_pass]?>" size="10">
      <button type="button" onclick="togglePasswordVisibility()">보기</button>
    </td>
    <td width="140" bgcolor="#F9F9F9">비밀번호변경</td>
    <td width="298" bgcolor="#FFFFFF"><input name="A_pass1" type="password" id="pw2" size="10" value=""></td>
  </tr>
  <tr> 
    <td width="147" height="30" bgcolor="#F9F9F9">관리자이메일<br></td>
    <td colspan="3" bgcolor="#FFFFFF"><input name="A_email" type="text" id="id"  size="30" value="<?=$row[A_email]?>"></td>
  </tr>
  <tr> 
    <td width="147" height="30" bgcolor="#F9F9F9">전화번호<br></td>
    <td colspan="3" bgcolor="#FFFFFF"><input name="A_tel" type="text" id="id"  size="30" value="<?=$row[A_tel]?>"></td>
  </tr>
  <tr> 
    <td width="147" height="30" bgcolor="#F9F9F9">팩스번호<br></td>
    <td colspan="3" bgcolor="#FFFFFF"><input name="A_hp" type="text" id="id"  size="30" value="<?=$row[A_hp]?>"></td>
  </tr>
  <tr align="right"> 
    <td height="30" colspan="4" bgcolor="#FFFFFF"><input type="image" src="img/mody.gif" align="absmiddle" width="65" height="19"></td>
  </tr>
</table>
<br>
<br>
<br>
<table width="800" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
  <tr> 
    <td colspan="4" bgcolor="#F2FFE6">입금계좌정보 </td>
  </tr>
  <tr align="center"> 
    <td width="147" height="30" bgcolor="#F9F9F9">은행명<br></td>
    <td width="434" bgcolor="#F9F9F9">계좌</td>
    <td width="93" bgcolor="#F9F9F9">예금주<br></td>
  </tr>
<div id='bankToDiv'>
<? 
for($cnt=0;$cnt<sizeof($bank);$cnt++){
	$A_bank=explode("|",$bank[$cnt]);
?>
  <tr bgcolor="#FFFFFF"> 
    <td height="30" align="center">
	<input name="A_bank1[]" type="text"  value="<?=$A_bank[0]?>" size="15" ></td>
    <td height="30">
	<input name="A_bank2[]" type="text" value="<?=$A_bank[1]?>" size="40"></td>
    <td height="30">
	<input name="A_bank3[]" type="text"  value="<?=$A_bank[2]?>" size="15"></td>
  </tr>
<?}?>
</div>
  <tr align="right"> 
    <td height="30" colspan="4" bgcolor="#FFFFFF"><input name="image3" type="image" src="img/reg.gif" align="absmiddle" width="65" height="19"></td>
  </tr>
</table>
<br>


<table width="800" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
  <tr> 
    <td colspan="4" bgcolor="#F2FFE6">배송기간 및 배송방법
</td>
  </tr>
  <tr> 
    <td width="583" height="30" bgcolor="#F9F9F9"> &nbsp; 
	<TEXTAREA NAME="A_baesong01" ROWS="6" COLS="98 "><?=stripslashes($row[A_baesong01])?></TEXTAREA>
     </td>
    <td width="194" colspan="3" align="right" bgcolor="#FFFFFF"><input name="image2" type="image" src="img/mody.gif" align="absmiddle" width="65" height="19"></td>
  </tr>
</table>
<br>
<table width="800" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
  <tr> 
    <td colspan="4" bgcolor="#F2FFE6">교환/반품/환불
</td>
  </tr>
  <tr> 
    <td width="583" height="30" bgcolor="#F9F9F9"> &nbsp; 
	<TEXTAREA NAME="A_baesong02" ROWS="6" COLS="98"><?=stripslashes($row[A_baesong02])?></TEXTAREA>
     </td>
    <td width="194" colspan="3" align="right" bgcolor="#FFFFFF"><input name="image2" type="image" src="img/mody.gif" align="absmiddle" width="65" height="19"></td>
  </tr>
</table>
<br>
<table width="800" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
  <tr> 
    <td colspan="4" bgcolor="#F2FFE6">주문취소
</td>
  </tr>
  <tr> 
    <td width="583" height="30" bgcolor="#F9F9F9"> &nbsp; 
	<TEXTAREA NAME="A_baesong03" ROWS="6" COLS="98"><?=stripslashes($row[A_baesong03])?></TEXTAREA>
     </td>
    <td width="194" colspan="3" align="right" bgcolor="#FFFFFF"><input name="image2" type="image" src="img/mody.gif" align="absmiddle" width="65" height="19"></td>
  </tr>
</table>
<br>
<table width="800" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
  <tr> 
    <td colspan="4" bgcolor="#F2FFE6">배송비 관리</td>
  </tr>
  <tr> 
    <td width="583" height="30" bgcolor="#F9F9F9"> &nbsp; 
      <input name="A_baesong" type="text" id="id4" size="10" value="<?=$row[A_baesong]?>">
      부터 배송비를 적용합니다.(*숫자로만 입력하세요.)<br></td>
    <td width="194" colspan="3" align="right" bgcolor="#FFFFFF"><input name="image2" type="image" src="img/mody.gif" align="absmiddle" width="65" height="19"></td>
  </tr>
  <tr> 
    <td width="583" height="30" bgcolor="#F9F9F9"> &nbsp; 배송비는
      <input name="A_baesongbi" type="text" id="id4" size="10" value="<?=$row[A_baesongbi]?>">
      원입니다.(*숫자로만 입력하세요.)<br></td>
    <td width="194" colspan="3" align="right" bgcolor="#FFFFFF"><input name="image2" type="image" src="img/mody.gif" align="absmiddle" width="65" height="19"></td>
  </tr>
 
</table>

</form>
<br>
<!---------main------------>
<? include "../admin/tail.php";?>

<script>
function togglePasswordVisibility() {
  var passwordField = document.getElementById("pw");
  var button = event.target;

  if (passwordField.type === "password") {
    passwordField.type = "text";
    button.textContent = "숨기기";
  } else {
    passwordField.type = "password";
    button.textContent = "보기";
  }
}
</script>