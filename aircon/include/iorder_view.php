
					<TABLE width=640 border=0 align="center" cellPadding=0 cellSpacing=0 background="../img/order/bg.jpg">
                          <TBODY>
                            <TR>
                              <TD width=290 height=33 align="center"><img src="../img/order/name.jpg"></TD>
                              <TD width=5><img src="../img/order/bar.jpg" width="5" ></TD>
                              <TD width=110 align="center"><img src="../img/order/su.jpg"  ></TD>
                              <TD width=5><img src="../img/order/bar.jpg" width="5" ></TD>
                              <TD width=80 align="center"><img src="../img/order/money.jpg" ></TD>
                              <TD width=5><img src="../img/order/bar.jpg" width="5" ></TD>
                              <TD width=80 align="center"><img src="../img/order/total.jpg" ></TD>
                              <TD width=5><img src="../img/order/bar.jpg" width="5" ></TD>
                              
                            </TR>
                          </TBODY>
                        </TABLE>

                  <table width="640" border="0" cellspacing="0" cellpadding="0" align="center">
<?php
include "../include/session_config.php";
include "../include/xss_filter.php";
$orderno=mysql_real_escape_string($orderno);
$query=DBquery("select * from orders where orderno='$orderno'");
if(!mysql_num_rows($query))error_check("�ֹ�����... �����ڿ��� �����ϼ���.");
$cnout=0;

$row=DBarray("select * from orders where orderno='$orderno' limit 0,1");

if($row[userid]!=$_SESSION[user_id] && !$_SESSION['U_ID']){
  error_check("������ �ֹ������� �ƴմϴ�.");
   # redirect iorder.php
   redirect($_SERVER["HTTP_REFERER"]);
}
products($row[product]);
for($cnt=0;$cnt<sizeof($pp_code)-1;$cnt++){
?>
                    <tr> 
                      <td width="340" height="28">&nbsp;&nbsp;<strong><?=$pp_name[$cnt]?></strong></td>
                      <td width="100" align="center"><?=$pp_count[$cnt]?>��</td>
                      <td width="100"  align="center"><font color="#FF9900"><strong><?=number_format($pp_price[$cnt])?>��</strong></font></td>
                      <td width="100"  align="center"><font color="#FF0000"><strong><?=number_format($pp_price[$cnt]*$pp_count[$cnt])?>��</strong></font></td>
                    </tr>
                    <tr> 
                      <td background="../img/board/board/dot.gif"height="3" colspan="5"></td>
                    </tr>
<? 
	$sndGoodname .=$pp_name[$cnt]."-".$cnt;
	} 
################��۰���##################
	Baesong($pp_total);
	if($row[use_point]>0){
		$TOTALPRICE=$TOTALPRICE-$row[use_point];
		$str_point = number_format($row[use_point])."����Ʈ���<br>";
	}
################��۰���##################
?>
				 
                    <tr> 
                      <td height="28" colspan="5">&nbsp;&nbsp;[��۷�] <strong><?=number_format($BAESONG)?>�� 
                        �̻� ���Ž� ��۷� <?=number_format($BAESONGBI)?>�� ����</strong> </td>
                    </tr>
                  </table>
				  <table width="640" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr> 
                      <td height="1" colspan="6" bgcolor="DFDFDF"></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="6"></td>
                    </tr>
                    <tr align="right" bgcolor="#F6F6F6"> 
                      <td width="150" height="28">�ֹ��ݾ�</td>
                      <td  height="28" align="center" nowrap><font color="#FF9900"><strong><?=number_format($pp_total)?>��</strong></font></td>
                      <td width="42" height="28">��۷�</td>
                      <td width="94" height="28" align="center"><font color="#FF0000"><strong><?=$string_baesong?></strong></font></td>
                      <td width="72" height="28">�� �����ݾ�</td>
                      <td width="144" align="center" nowrap>
					  <font color="#0000ff"><?=$str_point?>
					  <font color="#FF0000"><strong><?=number_format($TOTALPRICE)?>��</strong></font></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="6"></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="6" bgcolor="DFDFDF"></td>
                    </tr>
                  </table>
<!------------------------------>
<table width="640" border="0" align="center" cellpadding="0" cellspacing="0">
                    
                    <tr>
                      <td><br>
                      </td>
                    </tr>
                    <tr>
                      <td align="center"><img src="../img/order/ju_title.gif" width="650" height="30" border="0"></td>
                    </tr>
                    <tr>
                      <td height="10"></td>
                    </tr>
                    <tr>
                      <td align="center">
                        <TABLE cellSpacing=1 cellPadding=0 width=640 bgColor=#EBEBEB border=0>
                          <TR bgColor=#ffffff>
                            <TD width=125 bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>����</STRONG> </TD>
                            <TD width="512" height=32>&nbsp;&nbsp;
                                <?=$row[name]?>
                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>�ּ�</STRONG></TD>
                            <TD height=32>&nbsp;&nbsp; <?=$row[juso]?>
                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>��ȭ��ȣ</STRONG> </TD>
                            <TD height=32>&nbsp;&nbsp;
							<?=$row[tel]?>
                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>�ڵ�����ȣ</STRONG> </TD>
                            <TD height=32>&nbsp;&nbsp;
							<?=$row[cell]?>
                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>�̸���</STRONG> </TD>
                            <TD height=32>&nbsp;&nbsp;
							<?=$row[email]?>
                            </TD>
                          </TR>
                        </TABLE>
                      </td>
                    </tr>


                    <tr>
                      <td><br>
                        <br>
                      </td>
                    </tr>
                    <tr>
                      <td><img src="../img/order/su_title.gif" width="650" height="30" border="0"></td>
                    </tr>
                    <tr>
                      <td height="10" align="center"></td>
                    </tr>
                    <tr>
                      <td align="center">
                        <TABLE cellSpacing=1 cellPadding=0 width=640 bgColor=#EBEBEB border=0>
                          <TR bgColor=#ffffff>
                            <TD width=125 bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>����</STRONG> </TD>
                            <TD width="512" height=32>&nbsp;&nbsp;
                               <?=$row[rname]?>
                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>�ּ�</STRONG></TD>
                            <TD height=32>&nbsp;&nbsp;
							<?=safe_output($row[rjuso])?>
                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>��ȭ��ȣ</STRONG> </TD>
                            <TD height=32>&nbsp;&nbsp;
							<?=$row[rtel]?>
                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>�ڵ�����ȣ</STRONG> </TD>
                            <TD height=32>&nbsp;&nbsp;
							<?=$row[rcell]?>                            </TD>
                          </TR>
                          <TR bgColor=#ffffff>
                            <TD bgColor=#FCFCFC height=32>&nbsp;&nbsp; <STRONG>�̸���</STRONG> </TD>
                            <TD height=32>&nbsp;&nbsp;
							<?=$row[remail]?>
                            </TD>
                          </TR>
                        </TABLE>
                      </td>
                    </tr>
                    <tr>
                      <td><br>
                        <br>
                      </td>
                    </tr>

                     <tr>
                      <td><img src="../img/order/kyul_title.gif" width="650" height="30" border="0"></td>
                    </tr>
                    <tr>
                      <td height="10" align="center"></td>
                    </tr>
                    <tr>
                      <td align="center">
<table width="640" border="0" cellpadding="0" cellspacing="1" bgcolor="E6E6E6">
                    <tr bgcolor="#FFFFFF"> 
                      <td width="131" height="32" bgcolor="#F6F6F6">&nbsp;&nbsp;&nbsp; 
                        <strong>�������</strong> </td>
                      <td width="516" height="32">&nbsp;
                        <?=state($row[paymethod],4)?></td>
                    </tr>
<? if($row[use_point]>0){?>
                    <tr bgcolor="#FFFFFF"> 
                      <td height="32" bgcolor="#F6F6F6">&nbsp;&nbsp;&nbsp; 
                        <strong>������ ���</strong> </td>
                      <td height="32">&nbsp; <?=number_format($row[use_point])?></td>
                    </tr>
<? }?>
<? if($row[bank]){?>
                    <tr bgcolor="#FFFFFF"> 
                      <td height="32" bgcolor="#F6F6F6">&nbsp;&nbsp;&nbsp; 
                        <strong>�Ա�����</strong> </td>
                      <td height="32">&nbsp; <?=$row[bank]?></td>
                    </tr>
<? }?>
                    <tr bgcolor="#FFFFFF">
                      <td height="32" bgcolor="#F6F6F6">&nbsp;&nbsp;&nbsp; <strong>����ó��</strong> </td>
                      <td height="32" style="padding-left:10"><strong><font color="#FF9900">
					  
<? if($row[cancel]>0){?>
					  <?=state($row[cancel],7)?>
<? }else{?><?=state($row[state],$row[paymethod])?><br><?=state($row[baesong],5)?>
<? } ?>
                      </font></strong></td>
                    </tr>
                  </table>

                      </td>
                    </tr>
                  
                  </table>
<!------------------------------>
                  
                  