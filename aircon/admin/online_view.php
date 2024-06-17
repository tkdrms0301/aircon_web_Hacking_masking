<?php
  include "../include/session_config.php";
	include ("check.php");
	include "../include/config.php";
	include "../include/function.php";
  include("../include/xss_filter.php");

  $no = mysql_real_escape_string($no);

  if (!ctype_digit($no)) {
    echo "<script>
    window.alert('잘못된 접근입니다.');
    window.close();
    </script>";
  }
  $row=DBarray("select * from request where no='$no'");
?>
<link href="../css/vsun.css" rel="stylesheet" type="text/css">
<body>
				<table width="632" border="0" cellspacing="0" cellpadding="0">
              
                <tr> 
                  <td bgcolor="#2479CA" height="2" colspan="2"></td>
                </tr>
                <tr> 
                  <td height="1" colspan="2"></td>
                </tr>
				<tr> 
                  <td height="28" bgcolor="#EEF6FC">&nbsp;&nbsp;<img src="../as/icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>종류</strong></font></td>
                  <td bgcolor="#FFFFFF">&nbsp; 
<?=categoryname($row[category],1)?>
				  </td>
                </tr>
				<tr>
                   <td background="../img/as/form_m_line.gif" height="5" colspan="3"></td>
                </tr>
                <tr> 
                  <td width="120" height="28" bgcolor="#EEF6FC">&nbsp;&nbsp;<img src="../as/icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>이름</strong></font></td>
                  <td width="448" bgcolor="#FFFFFF">&nbsp; 
<?=$row[name]?></td>
                </tr>
				<tr>
                   <td background="../img/as/form_m_line.gif" height="5" colspan="3"></td>
                </tr>
                <tr> 
                  <td height="28" bgcolor="#EEF6FC">&nbsp;&nbsp;<img src="../as/icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>전화</strong></font></td>
                  <td bgcolor="#FFFFFF">&nbsp; 
<?=$row[tel]?></td>
                </tr>
				<tr>
                   <td background="../img/as/form_m_line.gif" height="5" colspan="3"></td>
                </tr>
                <tr> 
                  <td height="28" bgcolor="#EEF6FC">&nbsp;&nbsp;<img src="../as/icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>핸드폰</strong></font></td>
                  <td bgcolor="#FFFFFF">&nbsp; 
<?=$row[cell]?></td>
                </tr>
				<tr>
                   <td background="../img/as/form_m_line.gif" height="5" colspan="3"></td>
                </tr>
                <tr> 
                  <td bgcolor="#EEF6FC" valign="top" style="padding-top:8px;">&nbsp;&nbsp;<img src="../as/icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>설치 희망일</strong></font></td>
                  <td height="28" bgcolor="#FFFFFF">&nbsp; 
<?=$row[in_date]?>
				  </td>
                </tr>
				<tr>
                   <td background="../img/as/form_m_line.gif" height="5" colspan="3"></td>
                </tr>
                <tr> 
                  <td rowspan="3" bgcolor="#EEF6FC" valign="top" style="padding-top:8px;">&nbsp;&nbsp;<img src="../as/icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>설치 희망지</strong></font></td>
                  <td height="28" bgcolor="#FFFFFF">&nbsp; 
<?=$row[zip]?>
				  </td>
                </tr>
                <tr> 
                  <td height="22" bgcolor="#FFFFFF">&nbsp; <?=safe_output($row[address1])?></td>
                </tr>
                <tr> 
                  <td height="22" bgcolor="#FFFFFF">&nbsp; <?=safe_output($row[address2])?></td>
                </tr>
				<tr>
                   <td background="../img/as/form_m_line.gif" height="5" colspan="3"></td>
                </tr>
				 
				 
                <tr> 
                  <td height="28" bgcolor="#EEF6FC">&nbsp;&nbsp;<img src="../as/icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>이메일</strong></font></td>
                  <td bgcolor="#FFFFFF">&nbsp; <?=$row[email]?></td>
                </tr>
				<tr>
                   <td background="../img/as/form_m_line.gif" height="5" colspan="3"></td>
                </tr>
                <tr> 
                  <td bgcolor="#EEF6FC" valign="top" style="padding-top:8px;">&nbsp;&nbsp;<img src="../as/icon.jpg" width="10" height="10" align="absmiddle">&nbsp;<font color="#6399CA"><strong>남기실 
                    글 </strong></font></td>
                  <td bgcolor="#FFFFFF" valign="top" style="padding-top:8px;">
                    &nbsp; <?=stripslashes(nl2br(safe_output($row[comment])))?>
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
              
            </table><Br>

			<CENTER>&nbsp;&nbsp;<a href="javascript:window.close();" >닫기</a> </CENTER>
</body>

</html>
<?
	mysql_close();
?>