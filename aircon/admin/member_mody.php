<? include "../admin/head.php";
	if(!$table)$table="users";
	
	$f_query = "select * from $table where userid = '$id'";
	$u_row = DBarray($f_query);
		$jumin=explode("-",$u_row[jumin]);
		$zip=explode("-",$u_row[zip]);
		$tel=explode("-",$u_row[tel]);
		$cell=explode("-",$u_row[cell]);
		$userid=$id;
?>
		  <form name=myform action="mem_mody_ok.php" method=post ENCTYPE="multipart/form-data" >
		  <INPUT TYPE="hidden" name="level" value="<?=$level?>">
					<INPUT TYPE="hidden" name="id" value="<?=$u_row[userid]?>">
					<INPUT TYPE="hidden" name="name" value="<?=$u_row[name]?>">
					<INPUT TYPE="hidden" name="jumin1" value="<?=$jumin[0]?>">
					<INPUT TYPE="hidden" name="jumin2" value="<?=$jumin[1]?>">
		  <table width="684" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td><img src="../img/member/title_edit.jpg" width="684" height="32"></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td align="center"> <table cellspacing=0 cellpadding=0 width=684 border=0>
                    <tbody>
                      <tr> 
                        <td height="32"><img height=28 

                        src="../img/member/stitle01_s01.gif" 

                        width=340></td>
                      </tr>
                    </tbody>
                  </table>
                  <table cellspacing=0 cellpadding=0 width=684 align=center 

                  border=0>
                    
                      <tbody>
                        <tr> 
                          <td colspan=2 height=2></td>
                        </tr>
                        <tr> 
                          <td valign=top 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>
                        <tr> 
                          <td width=96><img height=29 

                        src="../img/member/01.jpg" 

width=95></td>
                          <td>&nbsp; 
                            &nbsp;<?=$u_row[userid]?></td>
                        </tr>
                        <tr> 
                          <td valign=top 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>
                        <tr> 
                          <td><img height=29 

                        src="../img/member/02.jpg" 

width=95></td>
                          <td>&nbsp; <input class=textbox1 id=pwd type=password 

                        size=20 name=pwd value="<?=$u_row[pass]?>">
                            (비밀번호는 4~12자의 영문,숫자이어야 합니다)</td>
                        </tr>
                        <tr valign=top > 
                          <td colspan=2 height=3 background="../img/member/dot.gif"></td>
                        </tr>
                        <tr> 
                          <td><img height=29 

                        src="../img/member/03.jpg" 

width=95></td>
                          <td>&nbsp; <input class=textbox1 id=pwd1 type=password 

                        size=20 name=pwd1 value="<?=$u_row[pass]?>" > </td>
                        </tr>
                        <tr valign=top> 
                          <td 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>
                        <tr> 
                          <td><img height=29 

                        src="../img/member/04.jpg" 

width=95></td>
                          <td>&nbsp; <?=$u_row[name]?></td>
                        </tr>
                        <tr valign=top> 
                          <td 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>
                        <tr> 
                          <td><img height=29 

                        src="../img/member/05.jpg" 

width=95></td>
                          <td>&nbsp; <?=$jumin[0]?>-*******
                            &nbsp;</td>
                        </tr>
                        <tr valign=top> 
                          <td 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>
                        <tr> 
                          <td height=31><img height=29 

                        src="../img/member/06.jpg" 

width=95></td>
                          <td>&nbsp; <select class=textbox1 name=phone1 >
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
                            </select>
                            - 
                            <input 

                        class=textbox1 maxlength=4 size=5 name=phone2 value="<?=$tel[1]?>">
                            - 
                            <input class=textbox1 maxlength=4 size=5 name=phone3 value="<?=$tel[2]?>" > </td>
                        </tr>
                        <tr valign=top> 
                          <td 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>
                        <tr> 
                          <td><img height=29 

                        src="../img/member/06-1.jpg" 

                      width=95></td>
                          <td>&nbsp; <select class=textbox1 name=hphone1  >
                              <option value="010" <? if ($cell[0]=="010") echo "selected";?>>010</option>
									  <option value="011" <? if ($cell[0]=="011") echo "selected";?>>011</option>
                                      <option value="016" <? if ($cell[0]=="016") echo "selected";?>>016</option>
                                      <option value="017" <? if ($cell[0]=="017") echo "selected";?>>017</option>
                                      <option value="018" <? if ($cell[0]=="018") echo "selected";?>>018</option>
                                      <option value="019" <? if ($cell[0]=="019") echo "selected";?>>019</option>
                            </select>
                            - 
                            <input class=textbox1  maxlength=4 size=4 name=hphone2 value="<?=$cell[1]?>">
                            - 
                            <input  class=textbox1 maxlength=4 size=4 name=hphone3 value="<?=$cell[2]?>"> </td>
                        </tr>
                        <tr valign=top> 
                          <td 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>
                        <tr> 
                          <td><img height=29 

                        src="../img/member/08.jpg" 

width=95></td>
                          <td>&nbsp; <input class=textbox1 id=zip1 readOnly size=4 

                        name=zip1 value="<?=$zip[0]?>">
                            - 
                            <input class=textbox1 id=zip2 

                        readOnly size=4 name=zip2 value="<?=$zip[1]?>"> &nbsp;<a 

                        href="javascript:pop_up1('../member/zipcode.php')"><img height=19 

                        src="../img/member/zipcode.jpg" 

                        width=67 align=absMiddle border=0></a> </td>
                        </tr>
                        <tr> 
                          <td>&nbsp;</td>
                          <td>&nbsp; <input class=textbox1 size=65 name=address1 value="<?=$u_row[address1]?>"> </td>
                        </tr>
                        <tr> 
                          <td>&nbsp;</td>
                          <td>&nbsp; <input class=textbox1 size=65 name=address2 value="<?=$u_row[address2]?>"> </td>
                        </tr>
                        <tr valign=top> 
                          <td 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>
                        <tr> 
                          <td><img height=29 

                        src="../img/member/07.jpg" 

width=95></td>
                          <td style="PADDING-BOTTOM: 2px; PADDING-TOP: 2px">&nbsp; 
                            <input class=textbox1 size=35 name=email value="<?=$u_row[email]?>"> 
                          </td>
                        </tr>
                        <tr valign=top> 
                          <td 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>
                        <tr> 
                          <td colspan=2><img height=29 

                        src="../img/member/09.jpg" width=140 

                        align=absMiddle>&nbsp; &nbsp;&nbsp; <input type=radio CHECKED value=y name=mailcheck>
                            받음 &nbsp;&nbsp; <input  type=radio value=n name=mailcheck <? if ($u_row[mailcheck]=="n") echo "checked";?>>
                            받지 않음</td>
                        </tr>
                        <tr> 
                          <td colspan=2 height=3></td>
                        </tr>
                        <tr> 
                          <td bgcolor=#e8e8e8 colspan=2 

                  height=1></td>
                        </tr>
                      </tbody>
                   
                  </table>
<? if($level==2):?>
                  <br> <br> 
				  <table cellspacing=0 cellpadding=0 width=684 border=0>
                    <tbody>
                      <tr> 
                        <td height="32"><img height=28 

                        src="../img/member/12.jpg" 

                        width=340></td>
                      </tr>
                    </tbody>
                  </table>

                  <table cellspacing=0 cellpadding=0 width=684 align=center 

                  border=0>
                   
                      <tbody>
                        <tr> 
                          <td colspan=2 height=2></td>
                        </tr>
                        <tr> 
                          <td valign=top 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>
                        <tr> 
                          <td width=96 valign="top"><img src="../img/member/10.jpg" width="95" height="29"></td>
                          <td height="225">&nbsp; 약력 및 활동내용을 입력해 주십시오. 작가회원님의 상품과 함께 보여집니다
<textarea name="comment" cols="78" rows="14" class="textbox1" id="comment" ><?=stripslashes($u_row[comment])?></textarea> 
                          </td>
                        </tr>
                        <tr> 
                          <td valign=top 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>
                        
                        <tr> 
                          <td ><img src="../img/member/11.jpg" width="95" height="29"></td>
                          <td ><input name="u_img" type="file" id="u_img" class=textbox1 onClick="document.myform.file_delete.checked=true">
<? if($u_row[u_img]&& file_exists("../member/data/".$u_row[u_img])){?>
<br>
<img src="../member/data/<?=$u_row[u_img]?>" width="127" height="149">
<input name="file_delete[0]" type="checkbox" id="file_delete" value="yes">
              사진삭제 시 체크하세요.
<? } ?>
						  </td>
                        </tr>
                        <tr> 
                          <td colspan=2 height=3></td>
                        </tr>
                        <tr> 
                          <td bgcolor=#e8e8e8 colspan=2  height=1></td>
                        </tr>
                      </tbody>
                   
                  </table>
                  <br> <br> 


				  <table cellspacing=0 cellpadding=0 width=684 border=0>
                    <tbody>
                      <tr> 
                        <td height="32"><img height=28 src="../img/member/12.jpg"  width=340></td>
                      </tr>
                    </tbody>
                  </table>
                  <table cellspacing=0 cellpadding=0 width=684 align=center border=0>
                    
                      <tbody>
                        <tr> 
                          <td colspan=2 height=2></td>
                        </tr>
                        <tr> 
                          <td valign=top 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>
                        <tr> 
                          <td width=96 valign="top"><img src="../img/member/14.jpg" width="95" height="29"></td>
                          <td> <input name="bank" type="text" id="bank" size="20" class=textbox1 value="<?=$u_row[bank]?>"> 
                          </td>
                        </tr>
                        <tr> 
                          <td valign=top 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>
                        <tr> 
                          <td width=96 valign="top"><img src="../img/member/15.jpg" width="95" height="29"></td>
                          <td> <input name="bank_user" type="text" id="bank_user" size="20" class=textbox1 value="<?=$u_row[bank_user]?>"> 
                          </td>
                        </tr>
                        <tr> 
                          <td valign=top 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>

                        <tr> 
                          <td ><img src="../img/member/16.jpg" width="95" height="29"></td>
                          <td > <input name="bank_acount" type="text" id="bank_acount" size="40" class=textbox1 value="<?=$u_row[bank_acount]?>"> 
                          </td>
                        </tr>
						<tr> 
                          <td valign=top 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>
						<tr> 
                          <td width=96 valign="top"><img src="../img/member/17.jpg" width="95" height="29"></td>
                          <td> 
						  <INPUT TYPE="radio" NAME="certificate" value="동의" checked>동의
						  <INPUT TYPE="radio" NAME="certificate" value="거부" <? if($u_row[certificate]=="거부")echo"checked";?>>거부
						  
                          </td>
                        </tr>
						<tr> 
                          <td valign=top 

                      background="../img/member/dot.gif" 

                      colspan=2 height=3></td>
                        </tr>
						<tr> 
                          <td width=96 valign="top"><img src="../img/member/18.jpg" width="95" height="29"></td>
                          <td> 
						  <INPUT TYPE="radio" NAME="baesung" value="작가" checked>작가
						  <INPUT TYPE="radio" NAME="baesung" value="쇼핑몰" <? if($u_row[baesung]=="쇼핑몰")echo"checked";?>>쇼핑몰
                          </td>
                        </tr>
                        <tr> 
                          <td colspan=2 height=3></td>
                        </tr>
                        <tr> 
                          <td bgcolor=#e8e8e8 colspan=2 

                  height=1></td>
                        </tr>
                      </tbody>
                    
                  </table>
<? endif;?>				  
                  <br> <img src="../img/member/mody_btn.gif" width="82" height="24" style="CURSOR: hand" onClick=javascript:check(); > 
<? include "../admin/tail.php";?>