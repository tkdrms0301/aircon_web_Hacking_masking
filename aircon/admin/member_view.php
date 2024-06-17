<?php
include "../include/session_config.php";
include("./check.php");
include("../include/config.php");
include("../include/function.php");
if(!$table)$table="users";

function sanitize_input($input) {
  return htmlspecialchars($input, ENT_QUOTES, 'EUC-KR');
}
	
	$f_query = "select * from $table where userid = '$id'";
	$f_rs = DBarray($f_query);
		$jumin=explode("-",$f_rs[jumin]);
		$zip=explode("-",$f_rs[zip]);
		$tel=explode("-",$f_rs[tel]);
		$cell=explode("-",$f_rs[cell]);
		$bz_nos=explode("-",$f_rs[bz_no]);
		$userid=$id;
?>
<html>
<head>
<link rel="stylesheet" href="../css/vsun.css" type="text/css">

</head>
<body topmargin=0 leftmargin=0 scroll=yes ><Br>
<? include "member_view_menu.php"?>
<form name="myform" method="post" action="mem_mody_ok.php">

					<INPUT TYPE="hidden" name="id" value="<?=$f_rs[userid]?>">
<table width="650" border="0" cellspacing="1" cellpadding="5" align=center bgcolor="cccccc">
<TR bgcolor=#cccccc align=center>
	<TD><B>최근접속 날짜</B></TD>
	<TD><B>총방문수</B></TD>

</TR>
<TR bgcolor=#ffffff align=center>
	<TD><?=$f_rs[ldate]?></TD>
	<TD><?=$f_rs[visitcnt]?></TD>
	
</TR>
</TABLE>

                        <table cellSpacing=0 cellPadding=0 width=650 border=0 align=center>
                          <tr>
                            <td height=3 colSpan=2 bgcolor="#E1F4CC"></td>
                          </tr>
                          <tr>
                            <td colSpan=2 height=2></td>
                          </tr>
                          <tr>
                            <td width=120 background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m1.gif" width=100></td>
                            <td width="530">&nbsp;
                                <?=$f_rs[userid]?></td>
                          </tr>
                          <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m2.gif" width=100></td>
                            <td>&nbsp;
                                <input class=textbox1 id=pwd type=password name=pwd value="<?=$f_rs[pass]?>">
                              (비밀번호는 4~12자의 영문,숫자이어야 합니다)</td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m3.gif" width=100></td>
                            <td>&nbsp;
                                <input class=textbox1 id=pwd1 type=password name=pwd1 value="<?=$f_rs[pass]?>">
                            </td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m4.gif" width=100></td>
                            <td>&nbsp;
                               <?=$f_rs[name]?>
                            </td>
                          </tr>
                          <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m5.gif" width=100></td>
                            <td>&nbsp;
                                <?=$jumin[0]?>-*******
                            </td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          
						  
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m6.gif" width=100></td>
                            <td>&nbsp;
							<SELECT class=textbox1 name=phone1>
                                  <option value="02" <? if ($tel[0]=="02") echo "selected";?>>02</option>
                                      <option value="031" <? if ($tel[0]=="031") echo "selected";?>>031</option>
                                      <option value="032" <? if ($tel[0]=="032") echo "selected";?>>032</option>
                                      <option value="033" <? if ($tel[0]=="033") echo "selected";?>>033</option>
                                      <option value="041" <? if ($tel[0]=="041") echo "selected";?>>041</option>
                                      <option value="042" <? if ($tel[0]=="042") echo "selected";?>>042</option>
                                      <option value="043" <? if ($tel[0]=="043") echo "selected";?>>043</option>
                                      <option value="051" <? if ($tel[0]=="051") echo "selected";?>>051</option>
                                      <option value="052" <? if ($tel[0]=="052") echo "selected";?>>052</option>
                                      <option value="053" <? if ($tel[0]=="053") echo "selected";?>>053</option>
                                      <option value="054" <? if ($tel[0]=="054") echo "selected";?>>054</option>
                                      <option value="055" <? if ($tel[0]=="055") echo "selected";?>>055</option>
                                      <option value="061" <? if ($tel[0]=="061") echo "selected";?>>061</option>
                                      <option value="062" <? if ($tel[0]=="062") echo "selected";?>>062</option>
                                      <option value="063" <? if ($tel[0]=="063") echo "selected";?>>063</option>
                                      <option value="064" <? if ($tel[0]=="064") echo "selected";?>>064</option>
                                </SELECT>
                              -
                              <INPUT 
                        class=textbox1 maxLength=4 size=5 name=phone2 value="<?=$tel[1]?>">
                              -
                              <INPUT 
                        class=textbox1 maxLength=4 size=5 name=phone3 value="<?=$tel[2]?>">
                            </td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td height=31 background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m7.gif" width=100></td>
                            <td>&nbsp;
                                <SELECT class=textbox1 name=hphone1>
										<option value="010" <? if ($cell[0]=="010") echo "selected";?>>010</option>
									  <option value="011" <? if ($cell[0]=="011") echo "selected";?>>011</option>
                                      <option value="016" <? if ($cell[0]=="016") echo "selected";?>>016</option>
                                      <option value="017" <? if ($cell[0]=="017") echo "selected";?>>017</option>
                                      <option value="018" <? if ($cell[0]=="018") echo "selected";?>>018</option>
                                      <option value="019" <? if ($cell[0]=="019") echo "selected";?>>019</option>
                                </SELECT>
                              -
                              <INPUT class=textbox1 
                        maxLength=4 size=4 name=hphone2 value="<?=$cell[1]?>">
                              -
                              <INPUT class=textbox1 
                        maxLength=4 size=4 name=hphone3 value="<?=$cell[2]?>">
                            </td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m8.gif" width=100></td>
                            <td>&nbsp;
                                <input class=textbox1 id=zip1 readOnly size=4 name=zip1 value="<?=$zip[0]?>">
                              -
                              <input class=textbox1 id=zip2 readOnly  size=4 name=zip2 value="<?=$zip[1]?>">
                              &nbsp;<a href="#" onClick="window.open('../member/zipcode.php', 'popup', 'scrollbars=no,resizable=no,width=500,height=249,left=200, top=200');" style="CURSOR: hand"><img height=19 src="../img/member/zipcode.jpg" width=67 align=absMiddle border=0></a></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;
                                <input class=textbox1 size=65 name=address1 value="<?=sanitize_input($f_rs[address1])?>">
                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;
                                <input class=textbox1 size=65 name=address2 value="<?=sanitize_input($f_rs[address2])?>">
                            </td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m9.gif" width=100></td>
                            <td>&nbsp;
                                <input class=textbox1 size=35 name=email value="<?=$f_rs[email]?>">
                            </td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m10.gif" width=100></td>
                            <td>&nbsp;
                                <input name="mailcheck" type="radio" value="y" checked>
                              수신
                              &nbsp;
                                <input name="mailcheck" type="radio" value="n" <? if ($f_rs[mailcheck]=="n") echo "checked";?>>
                              거부</td>
                          </tr>
                          <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td valign="top" background="../img/member/m_bg.jpg" style="background-repeat:repeat-x"><img height=29 src="../img/member/m11.gif" width=100></td>
                            <td valign="top" style="padding-top:8px;">
                              &nbsp; <textarea name="comment" cols="70" rows="8" class="textbox1"><?=sanitize_input(stripslashes($f_rs[comment]))?></textarea>
                              <br>
                              <br>
                            </td>
                          </tr>
						  <tr>
                            <td colSpan=2 height=2></td>
                          </tr>
                           <tr>
                             <td bgcolor="#E1F4CC" colSpan=2 height=3></td>
                              </tr>
                        </table>
                      </td>
                    </tr>
                  </table>	
					  
					 
 
<table width="650" border=0 cellspacing="0" cellpadding="3" align=center>
<tr>
	<td align=center>[<a href="#" onClick="window.close(self)" title="Close this window">Close Window</a>]</td>
</tr>
</table>
</body>
</html>