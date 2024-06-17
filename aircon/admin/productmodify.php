<?php
include "../include/session_config.php";
include "../admin/head.php";

function sanitize_input($input) {
    return htmlspecialchars($input, ENT_QUOTES, 'EUC-KR');
}

$Lcategory = substr($category,-2);
$Mcategory = $category;
include_once('../gmEditor/func_editor.php');
$row = DBarray("select * from products where p_code='$p_code'");
	$content = stripslashes(trim($row[p_comment]));// 폼 수정시 이전값을 가져오기 위해 필요함
    $upload_image = '';// 이미지 업로드 사용 (1은 사용안함)
    $upload_media = '1';// 미디어 업로드 사용 (1은 사용안함)
##### 분류 이름 가져오기#############################################
$query = DBquery("select name from category where category like '%$Lcategory'");
$rowl = mysql_fetch_object($query);
$Lcategoryname = $rowl->name;
$query = DBquery("select name from category where category = '$Mcategory'");
$rowm = mysql_fetch_object($query);
$Mcategoryname = $rowm->name;
########## 전달된 변수 $mode의 값이 "form"일 경우 수정양식을 출력한다. ##########
if(!strcmp($mode,"form")) {
?>
<table  width=700 cellpadding=0 cellspacing=0 border=0>
	<tr>
		<td width=100% valign=top>
		<script language="javascript"> 
		<!--
		function checkInput (form) {
		if (!form.pcode.value) { alert("상품 분류 코드 입력이 잘못되었습니다!"); return; } if (!form.name.value) { alert("상품명을 입력하세요!"); form.name.focus(); return; }
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
	<tr><td>&nbsp; ■<b>  상품 수정하기</b></td></tr>
	<tr><td height="1" bgcolor="#6858a0"></td></tr>
	</table>

		<form name="reg_form" method="post" ENCTYPE="multipart/form-data" action="<?echo("$php_self?mode=process&category=$category")?>">

		<table cellspacing="1" cellpadding="5" width="100%" border="0" bgcolor="#dadada">
		
		<tr bgcolor="#ffffff">
			<td>카테고리</td>
			<td>
<select name="Category1" onChange="getValue('catfrm',this,0,1,'document.reg_form.Category2',0)">
                        <option value="<?="0000".substr($row[category],-2)?>" selected><?=categoryname($row[category],1)?></option>
                        <?
$sqlstr = "SELECT * FROM category WHERE category < 100  ORDER BY UID ASC";
$sqlqry = mysql_query($sqlstr);
while($list=@mysql_fetch_array($sqlqry)):
echo"<option value='$list[category]' ${selected}>$list[name]</option> \n";
endwhile;
?>
                      </select>
<!-------------------2분류------------->
<select name="Category2" onChange="getValue('catfrm',this,0,2,'document.reg_form.Category3',document.reg_form.Category1)">
         <option value="<?="00".substr($row[category],-4)?>" selected><?=categoryname($row[category],2)?></option>
</select>
<select name="Category3" >
<option value="<?=$row[category]?>" selected><?=categoryname($row[category],3)?></option>
</select>			
			</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>브랜드</td>
			<td>
<select name="p_brand">
<option value="" selected>브랜드 </option>
<? foreach ($BRAND_ARRAY as $key => $value) { ?>
 <option value="<?=$key?>" <? if($key==$row[p_brand])echo"selected"?>><?=$value?></option>
<? }?>
			</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>제품번호</td>
			<td><?=$row[p_code]?><input type=hidden name=pcode value=<?=$row[p_code]?>>
			</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>상품명</td>
			<td><input type="text" name="name" size=60 value="<?=$row[p_name]?>"></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>구분</td>
			<td>
<INPUT TYPE="checkbox" NAME="plus01" value="y" <? if($row[plus01]=="y")echo"checked"?> >기획상품

<INPUT TYPE="checkbox" NAME="plus02" value="y" <? if($row[plus02]=="y")echo"checked"?> >중고상품
			</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>판매가격</td>
			<td><input type="text" name="price" size=20 value="<?=$row[p_price]?>">ex)숫자로만 입력하세요</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>추가설명</td>
			<td>
*추가설명은 한줄에 하나씩 입력하세요.<br>
*마지막 라인에 빈칸이 없도록 제거해주세요.<br>
<TEXTAREA name="option" rows=4 cols=35  class="inputtext" wrap=off><?=$row[p_option]?></TEXTAREA>  등록 예제=>
<TEXTAREA name="etcoption2" rows=4 cols=35 class="inputtext" wrap=off>
색상=파랑색
사이즈=200 x 300
</TEXTAREA>

			<br></td>
		</tr>
		
		<tr bgcolor="#ffffff">
			<td>제품 설명<br></td>
			<td>
<?=myEditor(1,'../gmEditor','reg_form','comment','600','300','euc-kr');?>
			</td>
		</tr>
		
		<tr bgcolor="#ffffff">
			<td>상품사진</td>
			<td>작은사진<input type="file" name="image1" size="30"> 최적사이즈 115X115 
<? 
$hmax=213; $wmax=249;
			if(file_exists("../product_img/{$row[p_code]}a.jpg")){?>
			<br>&#149; 아래 이미지를 변경하고자 하실 때만 입력해 주세요.<br><br>

			<center>
			<?=makeImg("../product_img/{$row[p_code]}a.jpg")?>
			</center>
<? } ?>
			</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>&nbsp;</td>
			<td>상세보기 <input type="file" name="image2" size="30"> 최적사이즈 250X250
<? if(file_exists("../product_img/{$row[p_code]}b.jpg")){?>
			<br>&#149; 아래 이미지를 변경하고자 하실 때만 입력해 주세요.<br><br>
			<center><?=makeImg("../product_img/{$row[p_code]}b.jpg")?></center>
<? } ?>
			</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>&nbsp;</td>
			<td>팝업이미지1 <input type="file" name="image3" size="30"> 최적사이즈 450X450
<? if(file_exists("../product_img/{$row[p_code]}c.jpg")){?>
			<br>&#149; 아래 이미지를 변경하고자 하실 때만 입력해 주세요.<br><br>

			<center><?=makeImg("../product_img/{$row[p_code]}c.jpg")?></center>

<? } ?>
			</td>
		</tr>
		
		</table>
		
		<p align="center">
			<input type="button" value=" 수정합니다. " onClick="Javascript:checkInput(this.form);">
		</p>
			
		</form>


		</td>

	</tr>
</table>
</body>
</html>
<?

########## 변수 $mode의 값이 "process"일 경우 중분류 추가후 분류로 다시 이동 ##########
} else if(!strcmp($mode,"process")) {

	###########################################
	$pnum = substr($pcode,-4);

	########## 이미지들을 지정디렉토리에 저장 ########## 
	########## 파일이 저장될 자료실의 디렉토리를 설정 / 서버의 경로를 따라 적어야 한다. ##########
	
	
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
	}
	###################
	if($image5_name){
		move_uploaded_file($image5,"../product_img/${pcode}e.jpg");
	}		
	########## 상품 테이블에 입력값을 등록한다. ########## 
	if($Category4)$products_category=$Category4;
	elseif($Category3)$products_category=$Category3;
	elseif($Category2)$products_category=$Category2;
	elseif($Category1)$products_category=$Category1;
	$input[category]=$products_category;
if(!$plus01)$plus01='n';
if(!$plus02)$plus02='n';
$input[p_name]=sanitize_input($name);
$input[p_price]=$price;
$input[hits]=$hits;
$input[htmlYN]=$htmlYN;
$input[make_com]=$make_com;
$input[make_nation]=$make_nation;
$input[p_option]=$option;
$input[p_option2]=$option2;
$input[p_brand]=$p_brand;
$input[plus01]=$plus01;
$input[plus02]=$plus02;
$input[p_comment]=sanitize_input(addslashes($comment));
$input[p_baesong]=addslashes($bae_song);



	//$result = setInsert("products", $input);
				setUpdate("products", $input, $query_option="where p_code='$pcode'", $type=0);

    ########## 상품 목록 출력화면으로 이동하고 종료 ##########

    echo("<meta http-equiv='Refresh' content='0; URL=product_list.php?category=$category&offset=$offset'>");
    exit;
}
?>
<?include "../admin/tail.php";?>

