				<table width="600" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td width="320" height="33"><img src="../img/basket/name.gif" width="320" height="33"></td>
                      <td width="51"><img src="../img/basket/ea.gif" width="51" height="33"></td>
                      <td width="70"><img src="../img/basket/price.gif" width="70" height="33"></td>
                      <td width="85"><img src="../img/basket/add.gif" width="85" height="33"></td>
                      <td width="74"><img src="../img/basket/delete.gif" width="74" height="33"></td>
                    </tr>
                  </table>
                  <table width="600" border="0" cellspacing="0" cellpadding="0">
<?
$orderno=mysql_real_escape_string($orderno);
$query=DBquery("select * from orders where orderno='$orderno'");
if(!mysql_num_rows($query))error_check("�ֹ�����... �����ڿ��� �����ϼ���.");
$cnout=0;

$row=DBarray("select * from orders where orderno='$orderno' limit 0,1");
products($row[product]);
for($cnt=0;$cnt<sizeof($pp_code)-1;$cnt++){
?>
                    <tr valign=top style="padding-top:5"> 
                      <td width="320" height="28" style="padding-left:6px;">
					  <?=$pp_name[$cnt]?><br>
		<? 
			$p_options=explode("#!#",trim($pp_option[$cnt]));
			if($pp_option[$cnt]):
			for($optioncnt=0;$optioncnt<sizeof($p_options)-1;$optioncnt++){
			$p_optionss=explode("@@",$p_options[$optioncnt]);
			$p_option_price_=$p_optionss[2]*$p_optionss[1];
			$pp_total+=$p_option_price_;
		?>
				&nbsp;-<FONT  COLOR='#FF0099'><?=trim($p_optionss[0])?>(<?=number_format($p_optionss[2])?>)
				x 
				<?=$p_optionss[1]?>
				
				=
				<?=number_format($p_option_price_)?></FONT>
				<br>
		<? }endif;?>
                      </td>
                      <td width="51" align="center"><?=$pp_count[$cnt]?>��</td>
                      <td width="70" align="center"><font color="#FF9900"><strong><?=number_format($pp_price[$cnt])?>��</strong></font></td>
                      <td width="85" align="center"><font color="#FF0000"><strong><?=number_format($pp_price[$cnt]*$pp_count[$cnt])?>��</strong></font></td>
                      <td width="74" align="center">
					  <!--<A HREF="javascript:document.form1.submit();">����</A>/<a href="../cart/cartupdate.php?c_id=<?=$row[c_id]?>">����</a>
					  --->
					  </td>
                    </tr>
                    <tr> 
                      <td  background="../img/basket/dot.gif" height="3" colspan="5"></td>
                    </tr>
<? } 
################��۰���##################
	Baesong($pp_total);
################��۰���##################
?>
                    <tr> 
                      <td height="28" colspan="5">&nbsp;&nbsp;[��۷�] <strong><?=number_format($baesong)?>�� 
                        �̻� ���Ž� ��۷� <?=number_format($baesongbi)?>�� ����</strong></td>
                    </tr>
                  </table>
				  <table width="629" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="1" colspan="8" bgcolor="DFDFDF"></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="8"></td>
                    </tr>
                    <tr align="right" bgcolor="#F6F6F6"> 
                      <td width="178" height="28">�ֹ��ݾ�</td>
                      <td width="94" height="28" align="center"><font color="#FF9900"><strong><?=number_format($pp_total)?>��</strong></font></td>
                      <td width="42" height="28">������</td>
                      <td width="58" height="28" align="center"><font color="#FF0000"><strong><?=number_format($TOTAL_POINT)?></strong></font></td>
					  <td width="42" height="28">��۷�</td>
                      <td width="94" height="28" align="center"><font color="#FF0000"><strong><?=$string_baesong?></strong></font></td>
                      <td width="72" height="28">�� �����ݾ�</td>
                      <td width="94" align="center"><font color="#FF0000"><strong><?=number_format($TOTALPRICE)?>��</strong></font></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="8"></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="8" bgcolor="DFDFDF"></td>
                    </tr>
                  </table>
                  <br>
                  <table width="600" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><img src="../img/order/order_name.gif" width="86" height="30"></td>
                    </tr>
                  </table> 
                  <table width="600" border="0" cellpadding="0" cellspacing="1" bgcolor="E6E6E6">
                    <tr bgcolor="#FFFFFF"> 
                      <td width="131" height="32" bgcolor="#FFE8E8">&nbsp;&nbsp;<img src="../img/order/icon.gif" width="12" height="12" align="absmiddle">&nbsp; <strong>����</strong> </td>
                      <td width="516" height="32">&nbsp;&nbsp;<?=$row[name]?></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                        <td height="32" bgcolor="#FFE8E8">&nbsp;&nbsp;<img src="../img/order/icon.gif" width="12" height="12" align="absmiddle">&nbsp; <strong>�ּ�</strong> </td>
                      <td height="32">&nbsp;&nbsp;�� : <?=$row[juso]?></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                       <td height="32" bgcolor="#FFE8E8">&nbsp;&nbsp;<img src="../img/order/icon.gif" width="12" height="12" align="absmiddle">&nbsp; <strong>��ȭ��ȣ</strong> </td>
                      <td height="32">&nbsp;&nbsp;<?=$row[tel]?></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                        <td height="32" bgcolor="#FFE8E8">&nbsp;&nbsp;<img src="../img/order/icon.gif" width="12" height="12" align="absmiddle">&nbsp; <strong>�ڵ�����ȣ</strong> </td>
                      <td height="32">&nbsp;&nbsp;<?=$row[cell]?></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                        <td height="32" bgcolor="#FFE8E8">&nbsp;&nbsp;<img src="../img/order/icon.gif" width="12" height="12" align="absmiddle">&nbsp; <strong>�̸���</strong> </td>
                      <td height="32">&nbsp;&nbsp;<?=$row[email]?></td>
                    </tr>
                  </table>
				  <br>
                  <table width="600" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                     <td><img src="../img/order/order_name01.gif" width="89" height="30"></td>
                    </tr>
                  </table> 
                  <table width="600" border="0" cellpadding="0" cellspacing="1" bgcolor="E6E6E6">
                    <tr bgcolor="#FFFFFF"> 
                      <td width="131" height="32" bgcolor="#FEEFE0">&nbsp; <strong>������ 
                        �� </strong></td>
                      <td width="516" height="32">&nbsp;&nbsp;<?=$row[rname]?></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td height="32" bgcolor="#FEEFE0">&nbsp;&nbsp;<strong>�ּ�</strong> 
                      </td>
                      <td height="32">&nbsp;&nbsp;�� : <?=$row[rjuso]?></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td height="32" bgcolor="#FEEFE0">&nbsp;&nbsp;<strong>��ȭ��ȣ</strong> 
                      </td>
                      <td height="32">&nbsp;&nbsp;<?=$row[rtel]?></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td height="32" bgcolor="#FEEFE0">&nbsp;&nbsp;<strong>�ڵ�����ȣ</strong> 
                      </td>
                      <td height="32">&nbsp;&nbsp;<?=$row[rcell]?></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td height="32" bgcolor="#FEEFE0">&nbsp;&nbsp;<strong>�̸���</strong> 
                      </td>
                      <td height="32">&nbsp;&nbsp;<?=$row[email]?></td>
                    </tr>
					<tr bgcolor="#FFFFFF"> 
                      <td height="32" bgcolor="#FEEFE0">&nbsp;&nbsp;<strong>��۽ÿ䱸����</strong> 
                      </td>
                      <td height="32"><br>&nbsp;&nbsp;<?=stripslashes(nl2br($row[comment]))?><br>
                        <br>
                      </td>
                    </tr>
                  </table>
                  <br>
                  <table width="600" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                       <td><img src="../img/order/order_name02.gif" width="86" height="30"></td>
                    </tr>
                  </table> 
                  <table width="600" border="0" cellpadding="0" cellspacing="1" bgcolor="E6E6E6">
                    <tr bgcolor="#FFFFFF"> 
                      <td width="131" height="32" bgcolor="#FED3EE">&nbsp;&nbsp;<img src="../img/order/icon01.gif" width="12" height="12" align="absmiddle">&nbsp; <strong>�������</strong> </td>
                      <td width="516" height="32">&nbsp;<?=state($row[paymethod],4)?></td>
                    </tr>
					<!--
                    <tr bgcolor="#FFFFFF"> 
                       <td height="32" bgcolor="#FED3EE">&nbsp;&nbsp;<img src="../img/order/icon01.gif" width="12" height="12" align="absmiddle">&nbsp; <strong>������ ���</strong> </td>
                      <td height="32">&nbsp; </td>
                    </tr>
					---->
                    <tr bgcolor="#FFFFFF"> 
                       <td height="32" bgcolor="#FED3EE">&nbsp;&nbsp;<img src="../img/order/icon01.gif" width="12" height="12" align="absmiddle">&nbsp; <strong>�Ա�����</strong> </td>
                      <td height="32">&nbsp; <?=$row[bank]?></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td height="32" bgcolor="#FED3EE">&nbsp;&nbsp;<img src="../img/order/icon01.gif" width="12" height="12" align="absmiddle">&nbsp; <strong>����ó��</strong> </td>
                        <td height="32" style="padding-left:5"><? if($row[cancel]>0){?>
					  <?=state($row[cancel],7)?>
<? }else{?><?=state($row[state],$row[paymethod])?><br><?=state($row[baesong],5)?>
<? } ?></td>
                    </tr>
                  </table>