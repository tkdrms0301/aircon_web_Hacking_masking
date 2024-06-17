<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<? include ("../include/title.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" href="../css/vsun.css" type="text/css">
<script TYPE='text/JavaScript' LANGUAGE='JavaScript1.2' SRC='../js/style.js'></script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><? include ("../include/top.php"); ?></td>
  </tr>
  <tr>
    <td align="center" valign="top">
	  <table width="890" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="175" valign="top"></td>
          <td height="10"></td>
        </tr>
		<tr>
          <td width="175" align="center" valign="top">
		    <table width="175" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td><? include ("../include/login.php"); ?></td>
              </tr>
              <tr> 
                <td height="7"></td>
              </tr>
              <tr> 
                <td><? include ("../include/left_banner.php"); ?></td>
              </tr>
            </table>
		  </td>
          <td align="right" valign="top">
		    <table width="700" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="700" valign="top"><img src="../img/as/stitle02.gif" width="700" height="52"></td>
              </tr>
              <tr> 
                <td align="center" valign="top"><br>
                  <img src="../img/as/st_img04.jpg" width="658" height="94"><br>
                </td>
              </tr>
              <tr> 
                <td align=center>
<form method="post" name="myform" action="request_ok.php"  onSubmit="return validate(this)">
<table width="632" border="0" cellspacing="0" cellpadding="0">
              
                <tr> 
                  <td bgcolor="#2479CA" height="2" colspan="2"></td>
                </tr>
                <tr> 
                  <td height="1" colspan="2"></td>
                </tr>
				<tr> 
                  <td height="28" bgcolor="#EEF6FC">&nbsp;&nbsp;<img src="icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>종류</strong></font></td>
                  <td bgcolor="#FFFFFF">&nbsp; 
<select NAME="category1" required   hname="종류">
<option value="">:::::선택:::::::</option>
<?
$query = DBquery("SELECT * FROM category WHERE category < 100 order by indexs asc"); 
while($row=mysql_fetch_array($query)):
?>
<option value="<?=$row[category]?>"><?=$row[name]?></option>

<?endwhile;?>
</select>
				  </td>
                </tr>
				<tr>
                   <td background="../img/as/form_m_line.gif" height="5" colspan="3"></td>
                </tr>
                <tr> 
                  <td width="120" height="28" bgcolor="#EEF6FC">&nbsp;&nbsp;<img src="icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>이름</strong></font></td>
                  <td width="448" bgcolor="#FFFFFF">&nbsp; 
				  <input name="name" type="text" id="name" size="10" class=textbox1 required   hname="이름"></td>
                </tr>
				<tr>
                   <td background="../img/as/form_m_line.gif" height="5" colspan="3"></td>
                </tr>
                <tr> 
                  <td height="28" bgcolor="#EEF6FC">&nbsp;&nbsp;<img src="icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>전화</strong></font></td>
                  <td bgcolor="#FFFFFF">&nbsp; 
				  <select class=textbox1 name=phone1>
                      <option value=02 selected>02</option>
                      <option value=031>031</option>
                      <option value=032>032</option>
                      <option value=033>033</option>
                      <option value=041>041</option>
                      <option value=042>042</option>
                      <option value=043>043</option>
                      <option value=051>051</option>
                      <option value=052>052</option>
                      <option value=053>053</option>
                      <option value=054>054</option>
                      <option value=055>055</option>
                      <option value=061>061</option>
                      <option value=062>062</option>
                      <option value=063>063</option>
                      <option value=064>064</option>
                    </select>
                    - 
                    <input class=textbox1 maxLength=4 size=5 name=phone2>
                    - 
                    <input class=textbox1 maxLength=4 size=5 name=phone3></td>
                </tr>
				<tr>
                   <td background="../img/as/form_m_line.gif" height="5" colspan="3"></td>
                </tr>
                <tr> 
                  <td height="28" bgcolor="#EEF6FC">&nbsp;&nbsp;<img src="icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>핸드폰</strong></font></td>
                  <td bgcolor="#FFFFFF">&nbsp; 
				  <select class=textbox1 name=hphone1 required   hname="핸드폰">
                      <option value=011 selected>011</option>
                      <option value=010>010</option>
                      <option value=016>016</option>
                      <option value=017>017</option>
                      <option value=018>018</option>
                      <option value=019>019</option>
                    </select>
                    - 
                    <input class=textbox1 maxLength=4 size=5 name=hphone2 required   hname="핸드폰">
                    - 
                    <input class=textbox1 maxLength=4 size=5 name=hphone3 required   hname="핸드폰"></td>
                </tr>
				<tr>
                   <td background="../img/as/form_m_line.gif" height="5" colspan="3"></td>
                </tr>
                <tr> 
                  <td bgcolor="#EEF6FC" valign="top" style="padding-top:8px;">&nbsp;&nbsp;<img src="icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>설치 희망일</strong></font></td>
                  <td height="28" bgcolor="#FFFFFF">&nbsp; <input name="in_date" type="text" size="13" value="<?=$row[in_date]?>" class=textbox1 ><a href="#" onClick="javascript:popFrame.fPopCalendar(in_date,in_date,popCal);return false"><img src="../img/common/butn1.gif" width="47" height="20" align="absmiddle"></a> </td>
                </tr>
				<tr>
                   <td background="../img/as/form_m_line.gif" height="5" colspan="3"></td>
                </tr>
                <tr> 
                  <td rowspan="3" bgcolor="#EEF6FC" valign="top" style="padding-top:8px;">&nbsp;&nbsp;<img src="icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>설치 희망지</strong></font></td>
                  <td height="28" bgcolor="#FFFFFF">&nbsp; <input class=textbox1 id=zip1 readOnly size=4 name=zip1>
                    - 
                    <input class=textbox1 id=zip2 readOnly  size=4 name=zip2> 
                    &nbsp;<a href="javascript:;" onClick="window.open('../member/zipcode.php', 'popup', 'scrollbars=no,resizable=no,width=500,height=249,left=200, top=200');" style="CURSOR: hand"><img height=19 src="../img/member/zipcode.jpg" width=67 align=absMiddle border=0></a></td>
                </tr>
                <tr> 
                  <td height="22" bgcolor="#FFFFFF">&nbsp; <input class=textbox1 size=65 name=address1></td>
                </tr>
                <tr> 
                  <td height="22" bgcolor="#FFFFFF">&nbsp; <input class=textbox1 size=65 name=address2></td>
                </tr>
				<tr>
                   <td background="../img/as/form_m_line.gif" height="5" colspan="3"></td>
                </tr>
				 
				 
                <tr> 
                  <td height="28" bgcolor="#EEF6FC">&nbsp;&nbsp;<img src="icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>이메일</strong></font></td>
                  <td bgcolor="#FFFFFF">&nbsp; <input class=textbox1 size=35 name=email></td>
                </tr>
				<tr>
                   <td background="../img/as/form_m_line.gif" height="5" colspan="3"></td>
                </tr>
                <tr> 
                  <td bgcolor="#EEF6FC" valign="top" style="padding-top:8px;">&nbsp;&nbsp;<img src="icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>남기실 
                    글 </strong></font></td>
                  <td bgcolor="#FFFFFF" valign="top" style="padding-top:8px;">
                    &nbsp; <textarea name="comment" cols="55" rows="8" class="textbox1"></textarea>
                    <br>
                    <br>
                  </td>
                </tr>
                <tr> 
                  <td height="1" colspan="2"></td>
                </tr>
                <tr> 
                  <td bgcolor="#2479CA" height="2" colspan="2"></td>
                </tr>
              
            </table><br>
			      <center><input type="image" src="../img/common/c_btn.gif"  border="0"></center>
	  </form>
				</td>
              </tr>
            </table>
		   </td>
        </tr>
      </table>
	  </td>
  </tr>
  <tr>
    <td align="center" valign="top"><? include ("../include/copyright.php"); ?></td>
  </tr>
</table>
</body>
</html>
<div id='popCal' style='POSITION:absolute;display:none;border:1px ridge;width:10;top:200'>
<iframe name="popFrame" src="../js/calendar/calendar.html" frameborder="0" scrolling="no" width=174 height=180></iframe>
</div>
<script event=onclick() for=document>popCal.style.display = "none";</script>