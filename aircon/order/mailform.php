<?
$Comment ="
<style>
td { color:#98946B;font-size: 12px;font-family:	����,Arial ;line-height: 18px;}
</style>
				<TABLE width=640 border=0 acellPadding=0 cellSpacing=0>
                                      <tr> 
                                        <td width='280' height='33' align='center' ><strong>��ǰ��</strong></td>
                                        <td align='center' width='1'></td>
                                        <td width='120' align='center' ><strong>����</strong></td>
                                        <td align='center' width='1'></td>
                                        <td width='90' align='center' ><strong>����</strong></td>
                                        <td align='center' width='1'></td>
                                        <td height='33' width='90' align='center' ><strong>�հ�</strong></td>
                                        
                                        
                                      </tr>
                                    </TABLE>
                  <table cellspacing=0 cellpadding=0 width=640 border=0 >
";
$query=DBquery("select * from orders where orderno='$orderno'");
$cnout=0;
$row=DBarray("select * from orders where orderno='$orderno' limit 0,1");
products($row[product]);
for($cnt=0;$cnt<sizeof($pp_code)-1;$cnt++){

$Comment .="
                    <tr>
                      <td width='374' height='28'>&nbsp;&nbsp;<strong>$pp_name[$cnt] $pp_option[$cnt]</strong></td>
                      <td width='53' align='center'>$pp_count[$cnt] ��</td>
                      <td width='75' align='center'><font color='#FF9900'><strong>".number_format($pp_price[$cnt])." ��</strong></font></td>
                      <td width='77' align='center'><font color='#FF0000'><strong> ".number_format($pp_price[$cnt]*$pp_count[$cnt])." ��</strong></font></td>
                      <td width='71' align='center'><strong><font color='#FF9900'></td>
                    </tr>
                    <tr>
                      <td background='http://$HTTP_HOST/img/shopping/dot.gif' height='3' colspan='5'></td>
                    </tr>
";

	$sndGoodname .=$pp_name[$cnt]."-".$cnt;
	}
################��۰���##################
	Baesong($pp_total);

################��۰���##################
$Comment .="<tr>
                      <td height='28' colspan='5'>&nbsp;&nbsp;[��۷�] <strong>".number_format($BAESONG)."��
                        �̻� ���Ž� ��۷� ".number_format($BAESONGBI)."�� ����</strong> </td>
                    </tr>
                  </table>
				  <table width='618' border='0' cellspacing='0' cellpadding='0'>
                    <tr>
                      <td height='1' colspan='6' bgcolor='DFDFDF'></td>
                    </tr>
                    <tr>
                      <td height='1' colspan='6'></td>
                    </tr>
                    <tr align='right' bgcolor='#F6F6F6'>
                      <td width='200' height='28'>�ֹ��ݾ�</td>
                      <td  height='28' align='center' nowrap><font color='#FF9900'><strong>".number_format($pp_total)."��</strong></font></td>
                      <td width='42' height='28'>��۷�</td>
                      <td width='94' height='28' align='center'><font color='#FF0000'><strong>$string_baesong</strong></font></td>
                      <td width='72' height='28'>�� �����ݾ�</td>
                      <td width='94' align='center' nowrap><font color='#FF0000'><strong>".number_format($TOTALPRICE)."��</strong></font></td>
                    </tr>
                    <tr>
                      <td height='1' colspan='6'></td>
                    </tr>
                    <tr>
                      <td height='1' colspan='6' bgcolor='DFDFDF'></td>
                    </tr>
                  </table>
                  <br>
                  <table width='618' border='0' cellspacing='0' cellpadding='0'>
                    <tr>
                      <td>�ֹ�������</td>
                    </tr>
                  </table>

                  <table width='618' border='0' cellpadding='0' cellspacing='1' bgcolor='E6E6E6'>
                    <tr bgcolor='#FFFFFF'>
                      <td width='131' height='32' bgcolor='#F6F6F6'>&nbsp;&nbsp;&nbsp;
                        <strong>����</strong> </td>
                      <td width='516' height='32'>&nbsp;&nbsp;$row[name]</td>
                    </tr>
                    <tr bgcolor='#FFFFFF'>
                      <td height='32' bgcolor='#F6F6F6'>&nbsp;&nbsp;&nbsp;
                        <strong>�ּ�</strong> </td>
                      <td height='32'>&nbsp;&nbsp;�� : $row[juso]</td>
                    </tr>
                    <tr bgcolor='#FFFFFF'>
                      <td height='32' bgcolor='#F6F6F6'>&nbsp;&nbsp;&nbsp;
                        <strong>��ȭ��ȣ</strong> </td>
                      <td height='32'>&nbsp;&nbsp;$row[tel]</td>
                    </tr>
                    <tr bgcolor='#FFFFFF'>
                      <td height='32' bgcolor='#F6F6F6'>&nbsp;&nbsp;&nbsp;
                        <strong>�ڵ�����ȣ</strong> </td>
                      <td height='32'>&nbsp;&nbsp;$row[cell]</td>
                    </tr>
                    <tr bgcolor='#FFFFFF'>
                      <td height='32' bgcolor='#F6F6F6'>&nbsp;&nbsp;&nbsp;
                        <strong>�̸���</strong> </td>
                      <td height='32'>&nbsp;&nbsp;$row[email]</td>
                    </tr>
                  </table>
				  <br>
                  <table width='618' border='0' cellspacing='0' cellpadding='0'>
                    <tr>
                      <td>����������</td>
                    </tr>
                  </table>
                  <table width='618' border='0' cellpadding='0' cellspacing='1' bgcolor='E6E6E6'>
                    <tr bgcolor='#FFFFFF'>
                      <td width='131' height='32' bgcolor='#F6F6F6'>&nbsp; <strong>������
                        �� </strong></td>
                      <td width='516' height='32'>&nbsp;&nbsp;$row[rname]</td>
                    </tr>
                    <tr bgcolor='#FFFFFF'>
                      <td height='32' bgcolor='#F6F6F6'>&nbsp;&nbsp;<strong>�ּ�</strong>
                      </td>
                      <td height='32'>&nbsp;&nbsp;�� : $row[rjuso]</td>
                    </tr>
                    <tr bgcolor='#FFFFFF'>
                      <td height='32' bgcolor='#F6F6F6'>&nbsp;&nbsp;<strong>��ȭ��ȣ</strong>
                      </td>
                      <td height='32'>&nbsp;&nbsp;$row[rtel]</td>
                    </tr>
                    <tr bgcolor='#FFFFFF'>
                      <td height='32' bgcolor='#F6F6F6'>&nbsp;&nbsp;<strong>�ڵ�����ȣ</strong>
                      </td>
                      <td height='32'>&nbsp;&nbsp;$row[rcell]</td>
                    </tr>
                    <tr bgcolor='#FFFFFF'>
                      <td height='32' bgcolor='#F6F6F6'>&nbsp;&nbsp;<strong>�̸���</strong>
                      </td>
                      <td height='32'>&nbsp;&nbsp;$row[email]</td>
                    </tr>
					<tr bgcolor='#FFFFFF'>
                      <td height='32' bgcolor='#F6F6F6'>&nbsp;&nbsp;<strong>��۽ÿ䱸����</strong>
                      </td>
                      <td height='32'><br>&nbsp;&nbsp;".stripslashes(nl2br($row[comment]))."<br>
                        <br>
                      </td>
                    </tr>
                  </table>
                  <br>
                  <table width='618' border='0' cellspacing='0' cellpadding='0'>
                    <tr>
                      <td>��������</td>
                    </tr>
                  </table>
                  <table width='618' border='0' cellpadding='0' cellspacing='1' bgcolor='E6E6E6'>
                    <tr bgcolor='#FFFFFF'>
                      <td width='131' height='32' bgcolor='#F6F6F6'>&nbsp;&nbsp;&nbsp;
                        <strong>�������</strong> </td>
                      <td width='516' height='32'>&nbsp;
                        ".state($row[paymethod],4)."</td>
                    </tr>

                    <tr bgcolor='#FFFFFF'>
                      <td height='32' bgcolor='#F6F6F6'>&nbsp;&nbsp;&nbsp;
                        <strong>�Ա�����</strong> </td>
                      <td height='32'>&nbsp; $row[bank]</td>
                    </tr>
                    <tr bgcolor='#FFFFFF'>
                      <td height='32' bgcolor='#F6F6F6'>&nbsp;&nbsp;&nbsp; <strong>����ó��</strong> </td>
                      <td height='32'><strong><font color='#FF9900'>

".state($row[state],$row[paymethod])."<br>".state($row[baesong],5)."
                      </font></strong></td>
                    </tr>
                  </table>
";
?>