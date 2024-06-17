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
                <td width="700"><img src="../img/member/stitle.gif" width="700"></td>
              </tr>
              <tr> 
                <td align="center" valign="top"> 
                  <!-- 회원가입 -->
                  <table width="626" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                      <td><img src="../img/member/welcom.gif"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">
					  <!-- 가입 폼 -->
<form name="myform" method="post" action="mem_join_ok.php">
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
                                <input class=textbox1 name=id>
                            &nbsp;<a href="javascript:open_idcheck();"><img height=19 src="../img/member/double.jpg" width=48 align=absMiddle border=0></a> (ID는 4~12자의 영문,숫자이어야 합니다) </td>
                          </tr>
                          <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m2.gif" width=100></td>
                            <td>&nbsp;
                                <input class=textbox1 id=pwd type=password name=pwd>
                              (영문 대/소문자, 숫자, 특수문자 중 2종류 이상을 조합하여 최소 10자리 이상이어야 합니다)</td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m3.gif" width=100></td>
                            <td>&nbsp;
                                <input class=textbox1 id=pwd1 type=password name=pwd1>
                            </td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m4.gif" width=100></td>
                            <td>&nbsp;
                                <input class=textbox1 id=name name=name>
                            </td>
                          </tr>
                          <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m5.gif" width=100></td>
                            <td>&nbsp;
                                <input class=textbox1 maxLength=6 size=6 name=jumin1>
                              -
                              <input class=textbox1 type=password maxLength=7 size=7 name=jumin2>
                            </td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m6.gif" width=100></td>
                            <td>&nbsp;
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
                              <input class=textbox1 maxLength=4 size=5 name=phone3>
                            </td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td height=31 background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m7.gif" width=100></td>
                            <td>&nbsp;
                                <select class=textbox1 name=hphone1>
                                  <option value=011 selected>011</option>
                                  <option value=010>010</option>
                                  <option value=016>016</option>
                                  <option value=017>017</option>
                                  <option value=018>018</option>
                                  <option value=019>019</option>
                                </select>
                              -
                              <input class=textbox1 maxLength=4 size=4 name=hphone2>
                              -
                              <input class=textbox1 maxLength=4 size=4 name=hphone3>
                            </td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m8.gif" width=100></td>
                            <td>&nbsp;
                                <input class=textbox1 id=zip1 readOnly size=4 name=zip1>
                              -
                              <input class=textbox1 id=zip2 readOnly  size=4 name=zip2>
                              &nbsp;<a href="#" onClick="window.open('../member/zipcode.php', 'popup', 'scrollbars=no,resizable=no,width=500,height=249,left=200, top=200');" style="CURSOR: hand"><img height=19 src="../img/member/zipcode.jpg" width=67 align=absMiddle border=0></a></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;
                                <input class=textbox1 size=65 name=address1>
                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;
                                <input class=textbox1 size=65 name=address2>
                            </td>
                          </tr>
                           <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td background="../img/member/m_bg.jpg"><img height=29 src="../img/member/m9.gif" width=100></td>
                            <td>&nbsp;
                                <input class=textbox1 size=35 name=email>
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
                                <input name="mailcheck" type="radio" value="n">
                              거부</td>
                          </tr>
                          <tr>
                            <td colSpan=2 height=3><img src="../img/member/dot_line.gif"></td>
                          </tr>
                          <tr>
                            <td valign="top" background="../img/member/m_bg.jpg" style="background-repeat:repeat-x"><img height=29 src="../img/member/m11.gif" width=100></td>
                            <td valign="top" style="padding-top:8px;">
                              &nbsp; <textarea name="comment" cols="70" rows="8" class="textbox1"></textarea>
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
                   <img src="../img/member/ok_btn.jpg" width="81" height="30"  style="CURSOR: hand" onClick=javascript:check();>&nbsp;&nbsp;<A HREF="../main/main.php"><img src="../img/member/cancel_btn.jpg"></a><br>
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