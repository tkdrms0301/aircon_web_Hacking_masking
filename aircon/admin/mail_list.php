<? include "../admin/head.php";?>
<script language="javascript">

function onlyNumber() {
if(((event.keyCode > 64)&&(event.keyCode < 91))||((event.keyCode > 106)&&(event.keyCode < 123)))
event.returnValue=false;
}
function sendmail01(){
	window.open("sendmail.php","sendmail","width=490,height=500");
		document.Ya_buser_search.target = 'sendmail';
		document.Ya_buser_search.action ='sendmail.php';
		document.Ya_buser_search.submit();
}
function sendmail02(){
	window.open("sendmail.php","sendmail","width=490,height=500");
		document.Ya_user_search.target = 'sendmail';
		document.Ya_user_search.action ='sendmail.php';
		document.Ya_user_search.submit();
}
</script>
<!---------main------------>
<table width="686" border="0" cellpadding="5" cellspacing="0" bgcolor="#dddddd">
  <tr>
    <td bgcolor="#FFFFFF" align="left">���Ϲ߼��� ������ �ʿ��̻��� ���ϸ� �����ϹǷ� �����ð��� �̿��Ͻñ� �ٶ��ϴ�. �ߺ��ؼ� ������ ���ʽÿ�. <br>
Ư�� ���ϼ����δ� ������ ���� ���� ���� �ֽ��ϴ�. <br>
    </td>
  </tr>
</table>
<table width="686" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">

<table width="686" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
<form method="post" name="Ya_user_search">
  <tr> 
    <td colspan="3" bgcolor="#F2FFE6">���Ϲ߼�</td>
  </tr>
  <tr> 
    <td width="147" bgcolor="#FFFFFF">��ü</td>
    <td colspan="2" bgcolor="#FFFFFF">��ü ���Ϻ����� [<a href="#" onClick="window.open('sendmail.php?to=all&table=p&tablename=����ȸ��','sendmail','width=490,height=500');">Ŭ��</a>]</td>
  </tr>

  <tr> 
	<td rowspan="4" bgcolor="#FFFFFF">����</td>
    <td height="30" bgcolor="#F9F9F9">����</td>
    <td bgcolor="#FFFFFF"><input name="age1" type="text" id="age1"  size="4"> 
      &nbsp;�� ~ 
      <input name="age2" type="text" id="age2"  size="4"> &nbsp;��</td>
  </tr>
  <tr> 
    <td height="30" bgcolor="#F9F9F9">����</td>
    <td bgcolor="#FFFFFF"> 
		<select name="address1" >
			 <option value="">����</option>
		<? foreach($address1_ARR as $key => $val) { ?>
				 <option value="<?=$val?>"><?=$val?></option>
		<?  } ?>
            </select>
	  </td>
  </tr>
  <tr> 
    <td height="30" bgcolor="#F9F9F9">���ɺо�</td>
    <td bgcolor="#FFFFFF"> 
<input type="radio" name="concern" value=""  checked> 
��ü
<input name="concern" type="radio" value="������"  >
������&nbsp;&nbsp;
<input type="radio" name="concern" value="�ڰ���">
�ڰ��� &nbsp;&nbsp;
<input type="radio" name="concern" value="�������" >
�������&nbsp;&nbsp;
<input type="radio" name="concern" value="����" >
����&nbsp;&nbsp;

	  </td>
  </tr>
  <tr> 
    <td colspan="2" bgcolor="#FFFFFF"><br> <br>
       [<a href="#" onclick="sendmail02();">���Ϲ߼��ϱ�</a>]&nbsp;&nbsp;</td>
  </tr></form>
</table>
<br>
<!---------main------------>
<? include "../admin/tail.php";?>
