<?php
include "../include/session_config.php";
include "../admin/head.php";

function sanitize_input($input) {
    return htmlspecialchars($input, ENT_QUOTES, 'EUC-KR');
}
$Lcategory = substr($mcode,-2);
$Mcategory = $mcode;
$query = DBquery("select name from category where category like '%$Lcategory'");
$row = mysql_fetch_object($query);
$Lcategoryname = $row->name;
$query = DBquery("select name from category where category = '$Mcategory'");
$row = mysql_fetch_object($query);
$Mcategoryname = $row->name;
if(!strcmp($mode,"form")) {
?>
<table  width=700 cellpadding=0 cellspacing=0 border=0>
	<tr>
		<td width=100% valign=top>
		<script language="javascript"> 
		<!--
		function checkInput (form) {
		if (!form.Category1.value) { alert("�з��� �����ϼ���!"); return; }
		if (!form.name.value) { alert("��ǰ���� �Է��ϼ���!"); form.name.focus(); return; }
		if(!form.price.value) { alert("�ǸŰ����� �Է��ϼ���!"); form.price.focus(); return;         }
		if(!form.image1.value) { alert("�̹���1�� �����ϼ���!"); form.image1.focus(); return;         } if(!form.image2.value) { alert("�̹���2�� �����ϼ���!"); form.image2.focus(); return;         }
		editor_wr_ok(); }   
		function IsNumber(formname) { var form = eval("document.reg_form." + formname);
		for(var i = 0; i < form.value.length; i++) { var chr = form.value.substr(i,1); if(chr < '0' || chr > '9') {    return false; } } return true;   }
		//--> 
		</script>
<script>
<!--
function getValue(targ,selObj,restore,cat,targi,targv){ //v3.0
if(targv) {
var preval = targv.options[targv.selectedIndex].value;
}
else var preval = "";
  eval(targ+".location='./subcategory.php?keyword='+selObj.options[selObj.selectedIndex].value+'&targi='+targi+'&preval='+preval+'&cat="+cat+"'");
  if (restore) selObj.selectedIndex=0;
}

-->
</script>
<iframe src="./subcategory.php" name="catfrm" width=0 height=0 frameborder=0 scrolling=no></iframe>
	<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr><td>&nbsp; ��<b>  ����ǰ ����ϱ� </b></td></tr>
	<tr><td height="1" bgcolor="#6858a0"></td></tr>
	</table>

		<form name="reg_form" method="post" ENCTYPE="multipart/form-data" action="<?echo("$php_self?mode=process&category=$mcode")?>">

		<table cellspacing="1" cellpadding="5" width="100%" border="0" bgcolor="#dadada">
		<tr bgcolor="#f2f2f2">
			<td colspan=2>
			&#149; ����ϰ��� �ϴ� ī�װ��� Ȯ���Ͻð� �����ϼ���.<br>
			&#149; ��ǰ�̹����� ���γ� ������ �����  ����ȭ �̹���������� Ŭ��� <br>
				   ���μ��� ������ ����Ǿ� ��ҵ˴ϴ�.
			<br>
			</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>ī�װ�</td>
			<td>
			<!------------------------------------------------------------------------------->
			<table border="0" cellpadding="0" cellspacing="0" width="100%" >
<tr bgcolor="#FFFFFF"> 
          <td > 
<!------------------��з�-------onChange="getValue('catfrm',this,0,1,'document.reg_form.Category2',0)"------>
<select name="Category1" onChange="getValue('catfrm',this,0,1,'document.reg_form.Category2',0)">
                        <option value="" selected>�з� </option>
                        <?
$sqlstr = "SELECT * FROM category WHERE category < 100  ORDER BY UID ASC";
$sqlqry = mysql_query($sqlstr);
while($list=@mysql_fetch_array($sqlqry)):
echo"<option value='$list[category]' ${selected}>$list[name]</option> \n";
endwhile;
?>
                      </select>
<!-------------------2�з�------------->
<select name="Category2" onChange="getValue('catfrm',this,0,2,'document.reg_form.Category3',document.reg_form.Category1)">
         <option value="" >2���з�</option>
</select>
<select name="Category3" >
<option value="" selected>3���з�</option>
</select>
          </td></tr>
			</table>
			</td>
		</tr>
		
		<tr bgcolor="#ffffff">
			<td>�귣��</td>
			<td>
<select name="p_brand">
<option value="" selected>���� </option>
<? foreach ($BRAND_ARRAY as $key => $value) { ?>
 <option value="<?=$key?>" ><?=$value?></option>
<? }?> 
</select>
* �귣�� ���� ǥ���� ��ǰ�� �����ϼ���~
			</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>��ǰ��</td>
			<td><input type="text" name="name" size=60></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>����</td>
			<td>
<INPUT TYPE="checkbox" NAME="plus01" value="y" <? if($row[plus01]=="y")echo"checked"?> >��ȹ��ǰ

<INPUT TYPE="checkbox" NAME="plus02" value="y" <? if($row[plus02]=="y")echo"checked"?> >�߰��ǰ
			</td>
		</tr>
		
		<tr bgcolor="#ffffff">
			<td>�ǸŰ���</td>
			<td><input type="text" name="price" size=20>ex)���ڷθ� �Է��ϼ���</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>�߰�����</td>
			<td>
*�߰������� ���ٿ� �ϳ��� �Է��ϼ���.<br>
*������ ���ο� ��ĭ�� ������ �������ּ���.<br>
<TEXTAREA name="option" rows=4 cols=35  class="inputtext" wrap=off></TEXTAREA>  ��� ����=>
<TEXTAREA name="etcoption2" rows=4 cols=35 class="inputtext" wrap=off>
����=�Ķ���
������=200 x 300
</TEXTAREA>

			<br></td>
		</tr>
		
		<tr bgcolor="#ffffff">
			<td>��ǰ ����<br>
			</td>
			<td><?include_once('../gmEditor/func_editor.php');?>
<?=myEditor(1,'../gmEditor','reg_form','comment','600','300','euc-kr');?></td>
		</tr>

		<tr bgcolor="#ffffff">
			<td>��ǰ����</td>
			<td>��������<input type="file" name="image1" size="30"> ���������� 115X115 </td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>&nbsp;</td>
			<td>�󼼺��� <input type="file" name="image2" size="30"> ���������� 250X250</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>&nbsp;</td>
			<td>�˾��̹���1 <input type="file" name="image3" size="30"> ���������� 450X450</td>
		</tr>
		
		</table>
		
		<p align="center">
			<input type="button" value=" ����մϴ�. " onClick="Javascript:checkInput(this.form);">
		</p>
			
		</form>


		</td>

	</tr>
</table>
</body>
</html>
<?

########## ���� $mode�� ���� "process"�� ��� �ߺз� �߰��� �з��� �ٽ� �̵� ##########
} else if(!strcmp($mode,"process")) {

	###########################################
	$pnum = substr($pcode,-4);

	########## �ڷ�ǿ� ����� ������ �������� ���� ��� ##########
	if(!$image1_name || !$image2_name) {
		error_check("�̹����� ������ּ���.");
		exit;
	}
	########## �̹������� �������丮�� ���� ########## 
	if($Category4)$products_category=$Category4;
	elseif($Category3)$products_category=$Category3;
	elseif($Category2)$products_category=$Category2;
	elseif($Category1)$products_category=$Category1;
	//echo $products_category."<br>";
					$query = "select max(p_code) from products where p_code like '$products_category%'";
					$result = mysql_query($query);
					$numrows = mysql_num_rows($result);
					if($numrows == 0) {
					  $newnum = "0001";
					} else {

					//$maxnum = mysql_result($result,0,0);
					//echo $maxnum;
					  $maxnum = (int)substr(mysql_result($result,0,0),-4);
					  $newnum = $maxnum + 1;
					  
					}
				
					$pcode = $products_category.sprintf("%04d",$newnum);
					//echo $pcode;
					$query = "select p_code from products where p_code = '$pcode'";
					$result = mysql_query($query);
					$numrows = mysql_num_rows($result);
	
					if($numrows>0){
						$pcode_check=substr($pcode,0,-1);
						$max_pcode=DBarray("select max(p_code) from products where p_code like '$pcode_check%'");
						$pcode= $max_pcode[0] + 1;
					}			
if(!$plus01)$plus01='n';
if(!$plus02)$plus02='n';					
$pcode = $products_category.sprintf("%04d",$newnum);
$input[category]=sanitize_input($products_category);
$input[p_name]=sanitize_input($name);
$input[p_code]=$pcode;
$input[p_price]=$price;
$input[htmlYN]=$htmlYN;
$input[make_com]=$make_com;
$input[make_nation]=$make_nation;
$input[p_option]=$option;
$input[p_option2]=$option2;
$input[p_brand]=$p_brand;
$input[plus01]=$plus01;
$input[plus02]=$plus02;
$input[p_baesong]=addslashes($bae_song);
$input[p_comment]=sanitize_input(addslashes($comment));
$input[saletype]=$saletype;
$input[hits]=$hits;
$input[wdate]=date('Y-m-d');

	$result = setInsert("products", $input);
	
//echo "ffffffff";
    ########## ��ǰ ��� ���ȭ������ �̵��ϰ� ���� ##########
if($result){
	########## ������ ����� �ڷ���� ���丮�� ���� / ������ ��θ� ���� ����� �Ѵ�. ##########
		
	if($image1_name){
		move_uploaded_file($image1,"../product_img/${pcode}a.jpg");
	}

	###################
	if($image2_name){
		move_uploaded_file($image2,"../product_img/${pcode}b.jpg");
	}
	###################
	if($image3_name){
		move_uploaded_file($image3,"../product_img/${pcode}c.jpg");
	}
	###################
	if($image4_name){
		move_uploaded_file($image4,"../product_img/${pcode}d.jpg");
	}###################
	if($image5_name){
		move_uploaded_file($image5,"../product_img/${pcode}e.jpg");
	}		
	########## ��ǰ ���̺� �Է°��� ����Ѵ�. ########## 
    echo("<meta http-equiv='Refresh' content='0; URL=product_list.php?category=$Category1&page=$page&keyfield=$keyfield&key=$encoded_key'>");
    exit;
}else{
	echo $result;
	//error_check("��Ͻ���.. ����� �ٽõ�����ּ���.");
	}
}
?>
<?include "../admin/tail.php";?>