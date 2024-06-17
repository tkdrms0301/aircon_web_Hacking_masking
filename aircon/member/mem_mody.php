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
                <td><? include ("../include/category.php"); ?></td>
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
                <td width="700"><img src="../img/member/stitle01.gif" width="700" height="53"></td>
              </tr>
              <tr> 
                <td align="center" valign="top"> 
<?php
include 'xss_filter.php';

$user_input = isset($_GET['content']) ? $_GET['content'] : '';

$sanitized_input = sanitize_input($user_input);
?>


                  <!-- 회원가입 -->
    <form name="myform" method="post" action="mem_mody_ok.php">
				    <INPUT TYPE="hidden" name="id" value="<?=$user_row[userid]?>">
					<INPUT TYPE="hidden" name="jumin1" value="<?=$jumin[0]?>">
					<INPUT TYPE="hidden" name="jumin2" value="<?=$jumin[1]?>">
					<input name="name" type="hidden" id="name" size="10" class="textbox1" value="<?=$user_row[name]?>">
                  <table width="626" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">
					  <!-- 가입 폼 -->
					      <table cellSpacing=0 cellPadding=0 width=626 border=0>
                          <tr>
                            <td height=3 colSpan=2 bgcolor="#E1F4CC"></td>
                          </tr>
                          <tr>
                            <td colSpan=2 height=2></td>
                          </tr>
                          <tr>
                            <td width=121 background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m1.gif" width=100></td>
                            <td width="505">&nbsp;
                                <?=$user_row[userid]?></td>
                          </tr>
                          <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m2.gif" width=100></td>
                            <td>&nbsp;
                                <input class=textbox1 id=pwd type=password name=pwd value="<?=$user_row[pass]?>">
                              (영문 대/소문자, 숫자, 특수문자 중 2종류 이상을 조합하여 최소 10자리 이상이어야 합니다)</td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m3.gif" width=100></td>
                            <td>&nbsp;
                                <input class=textbox1 id=pwd1 type=password name=pwd1 value="<?=$user_row[pass]?>">
                            </td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m4.gif" width=100></td>
                            <td>&nbsp;
                                <?=$user_row[name]?>
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
                                <input class=textbox1 size=65 name=address1 value="<?=sanitize_input($user_row[address1])?>">
                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;
                                <input class=textbox1 size=65 name=address2 value="<?=sanitize_input($user_row[address2])?>">
                            </td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m9.gif" width=100></td>
                            <td>&nbsp;
                                <input class=textbox1 size=35 name=email value="<?=$user_row[email]?>">
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
                                <input name="mailcheck" type="radio" value="n" <? if ($user_row[mailcheck]=="n") echo "checked";?>>
                              거부</td>
                          </tr>
                          <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td valign="top" background="../img/member/m_bg.jpg" style="background-repeat:repeat-x"><img height=29 src="../img/member/m11.gif" width=100></td>
                            <td valign="top" style="padding-top:8px;">
                              &nbsp; <textarea name="comment" cols="60" rows="8" class="textbox1"><?=sanitize_input(stripslashes($user_row[comment]))?></textarea>
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
						
					  <!-- 가입 폼 -->
					  </td>
                    </tr>
                  </table>
				  <br>
                   <img src="../img/member/mod_btn.jpg" width="81" height="30" style="CURSOR: hand" onClick=javascript:check();>&nbsp;&nbsp;<A HREF="../main/main.php"><img src="../img/member/cancel_btn.jpg"></a><br>
				  <br>
				  </form>
                  <!-- 회원가입 -->
                </td>
              </tr>
              <tr> 
                <td>&nbsp; </td>
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