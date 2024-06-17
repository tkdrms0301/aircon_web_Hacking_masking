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
    <td bgcolor="#FFFFFF" align="left">메일발송은 서버에 필요이상의 부하를 유발하므로 새벽시간을 이용하시기 바랍니다. 중복해서 보내지 마십시오. <br>
특정 메일서버로는 전송이 되지 않을 수도 있습니다. <br>
    </td>
  </tr>
</table>
<table width="686" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">

<table width="686" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
<form method="post" name="Ya_user_search">
  <tr> 
    <td colspan="3" bgcolor="#F2FFE6">메일발송</td>
  </tr>
  <tr> 
    <td width="147" bgcolor="#FFFFFF">전체</td>
    <td colspan="2" bgcolor="#FFFFFF">전체 메일보내기 [<a href="#" onClick="window.open('sendmail.php?to=all&table=p&tablename=개인회원','sendmail','width=490,height=500');">클릭</a>]</td>
  </tr>

  <tr> 
	<td rowspan="4" bgcolor="#FFFFFF">조건</td>
    <td height="30" bgcolor="#F9F9F9">나이</td>
    <td bgcolor="#FFFFFF"><input name="age1" type="text" id="age1"  size="4"> 
      &nbsp;세 ~ 
      <input name="age2" type="text" id="age2"  size="4"> &nbsp;세</td>
  </tr>
  <tr> 
    <td height="30" bgcolor="#F9F9F9">지역</td>
    <td bgcolor="#FFFFFF"> 
		<select name="address1" >
			 <option value="">선택</option>
		<? foreach($address1_ARR as $key => $val) { ?>
				 <option value="<?=$val?>"><?=$val?></option>
		<?  } ?>
            </select>
	  </td>
  </tr>
  <tr> 
    <td height="30" bgcolor="#F9F9F9">관심분야</td>
    <td bgcolor="#FFFFFF"> 
<input type="radio" name="concern" value=""  checked> 
전체
<input name="concern" type="radio" value="공무원"  >
공무원&nbsp;&nbsp;
<input type="radio" name="concern" value="자격증">
자격증 &nbsp;&nbsp;
<input type="radio" name="concern" value="국가고시" >
국가고시&nbsp;&nbsp;
<input type="radio" name="concern" value="수능" >
수능&nbsp;&nbsp;

	  </td>
  </tr>
  <tr> 
    <td colspan="2" bgcolor="#FFFFFF"><br> <br>
       [<a href="#" onclick="sendmail02();">메일발송하기</a>]&nbsp;&nbsp;</td>
  </tr></form>
</table>
<br>
<!---------main------------>
<? include "../admin/tail.php";?>
