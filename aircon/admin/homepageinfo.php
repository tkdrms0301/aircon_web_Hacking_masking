<? include "../admin/head.php";

// ��й�ȣ ���⼺ ���� �Լ�
function checkPasswordComplexity($pwd) {
  $uppercase = preg_match('@[A-Z]@', $pwd);
  $lowercase = preg_match('@[a-z]@', $pwd);
  $numbering    = preg_match('@[0-9]@', $pwd);
  $specialChars = preg_match('@[^\w]@', $pwd);

  // �� ������ �����ϴ��� Ȯ��
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
  // ��й�ȣ ���⼺ ����
  if (!checkPasswordComplexity($A_pass1)) {
    OnlyMsgView("��й�ȣ�� ���� �빮��, ���� �ҹ���, ����, Ư������ �� 2���� �̻��� �����Ͽ� �ּ� 10�ڸ� �̻�, �Ǵ� 3���� �̻��� �����Ͽ� �ּ� 8�ڸ� �̻��̾�� �մϴ�.");
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
    <td colspan="4" bgcolor="#F2FFE6">�����ڸ�� �α�������</td>
  </tr>
  <tr> 
    <td width="147" height="30" bgcolor="#F9F9F9">�̸�<br></td>
    <td colspan="3" bgcolor="#FFFFFF"><input name="A_name" type="text" id="id"  size="20" value="<?=$row[A_name]?>"></td>
  </tr>
   <tr> 
    <td width="147" height="30" bgcolor="#F9F9F9">�α��ξ��̵�<br></td>
    <td colspan="3" bgcolor="#FFFFFF"><input name="A_id" type="text" id="id"  size="10" value="<?=$row[A_id]?>"></td>
  </tr>
  <tr> 
  <td height="30" bgcolor="#F9F9F9">�����й�ȣ</td>
    <td width="170" height="30" bgcolor="#FFFFFF">
      <input name="A_pass" type="password" id="pw" value="<?=$row[A_pass]?>" size="10">
      <button type="button" onclick="togglePasswordVisibility()">����</button>
    </td>
    <td width="140" bgcolor="#F9F9F9">��й�ȣ����</td>
    <td width="298" bgcolor="#FFFFFF"><input name="A_pass1" type="password" id="pw2" size="10" value=""></td>
  </tr>
  <tr> 
    <td width="147" height="30" bgcolor="#F9F9F9">�������̸���<br></td>
    <td colspan="3" bgcolor="#FFFFFF"><input name="A_email" type="text" id="id"  size="30" value="<?=$row[A_email]?>"></td>
  </tr>
  <tr> 
    <td width="147" height="30" bgcolor="#F9F9F9">��ȭ��ȣ<br></td>
    <td colspan="3" bgcolor="#FFFFFF"><input name="A_tel" type="text" id="id"  size="30" value="<?=$row[A_tel]?>"></td>
  </tr>
  <tr> 
    <td width="147" height="30" bgcolor="#F9F9F9">�ѽ���ȣ<br></td>
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
    <td colspan="4" bgcolor="#F2FFE6">�Աݰ������� </td>
  </tr>
  <tr align="center"> 
    <td width="147" height="30" bgcolor="#F9F9F9">�����<br></td>
    <td width="434" bgcolor="#F9F9F9">����</td>
    <td width="93" bgcolor="#F9F9F9">������<br></td>
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
    <td colspan="4" bgcolor="#F2FFE6">��۱Ⱓ �� ��۹��
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
    <td colspan="4" bgcolor="#F2FFE6">��ȯ/��ǰ/ȯ��
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
    <td colspan="4" bgcolor="#F2FFE6">�ֹ����
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
    <td colspan="4" bgcolor="#F2FFE6">��ۺ� ����</td>
  </tr>
  <tr> 
    <td width="583" height="30" bgcolor="#F9F9F9"> &nbsp; 
      <input name="A_baesong" type="text" id="id4" size="10" value="<?=$row[A_baesong]?>">
      ���� ��ۺ� �����մϴ�.(*���ڷθ� �Է��ϼ���.)<br></td>
    <td width="194" colspan="3" align="right" bgcolor="#FFFFFF"><input name="image2" type="image" src="img/mody.gif" align="absmiddle" width="65" height="19"></td>
  </tr>
  <tr> 
    <td width="583" height="30" bgcolor="#F9F9F9"> &nbsp; ��ۺ��
      <input name="A_baesongbi" type="text" id="id4" size="10" value="<?=$row[A_baesongbi]?>">
      ���Դϴ�.(*���ڷθ� �Է��ϼ���.)<br></td>
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
    button.textContent = "�����";
  } else {
    passwordField.type = "password";
    button.textContent = "����";
  }
}
</script>