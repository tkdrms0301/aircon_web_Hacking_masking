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
		if (!form.Category1.value) { alert("분류를 선택하세요!"); return; }
		if (!form.name.value) { alert("상품명을 입력하세요!"); form.name.focus(); return; }
		if(!form.price.value) { alert("판매가격을 입력하세요!"); form.price.focus(); return;         }
		if(!form.image1.value) { alert("이미지1을 선택하세요!"); form.image1.focus(); return;         } if(!form.image2.value) { alert("이미지2를 선택하세요!"); form.image2.focus(); return;         }
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
	<tr><td>&nbsp; ■<b>  새상품 등록하기 </b></td></tr>
	<tr><td height="1" bgcolor="#6858a0"></td></tr>
	</table>

		<form name="reg_form" method="post" ENCTYPE="multipart/form-data" action="<?echo("$php_self?mode=process&category=$mcode")?>">

		<table cellspacing="1" cellpadding="5" width="100%" border="0" bgcolor="#dadada">
		<tr bgcolor="#f2f2f2">
			<td colspan=2>
			&#149; 등록하고자 하는 카테고리를 확인하시고 진행하세요.<br>
			&#149; 상품이미지는 가로나 세로의 사이즈가  최적화 이미지사이즈보다 클경우 <br>
				   가로세로 비율에 적용되어 축소됩니다.
			<br>
			</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>카테고리</td>
			<td>
			<!------------------------------------------------------------------------------->
			<table border="0" cellpadding="0" cellspacing="0" width="100%" >
<tr bgcolor="#FFFFFF"> 
          <td > 
<!------------------대분류-------onChange="getValue('catfrm',this,0,1,'document.reg_form.Category2',0)"------>
<select name="Category1" onChange="getValue('catfrm',this,0,1,'document.reg_form.Category2',0)">
                        <option value="" selected>분류 </option>
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
         <option value="" >2차분류</option>
</select>
<select name="Category3" >
<option value="" selected>3차분류</option>
</select>
          </td></tr>
			</table>
			</td>
		</tr>
		
		<tr bgcolor="#ffffff">
			<td>브랜드</td>
			<td>
<select name="p_brand">
<option value="" selected>선택 </option>
<? foreach ($BRAND_ARRAY as $key => $value) { ?>
 <option value="<?=$key?>" ><?=$value?></option>
<? }?> 
</select>
* 브랜드 샵에 표시할 상품만 선택하세요~
			</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>상품명</td>
			<td><input type="text" name="name" size=60></td>
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
			<td><input type="text" name="price" size=20>ex)숫자로만 입력하세요</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>추가설명</td>
			<td>
*추가설명은 한줄에 하나씩 입력하세요.<br>
*마지막 라인에 빈칸이 없도록 제거해주세요.<br>
<TEXTAREA name="option" rows=4 cols=35  class="inputtext" wrap=off></TEXTAREA>  등록 예제=>
<TEXTAREA name="etcoption2" rows=4 cols=35 class="inputtext" wrap=off>
색상=파랑색
사이즈=200 x 300
</TEXTAREA>

			<br></td>
		</tr>
		
		<tr bgcolor="#ffffff">
			<td>제품 설명<br>
			</td>
			<td><?include_once('../gmEditor/func_editor.php');?>
<?=myEditor(1,'../gmEditor','reg_form','comment','600','300','euc-kr');?></td>
		</tr>

		<tr bgcolor="#ffffff">
			<td>상품사진</td>
			<td>작은사진<input type="file" name="image1" size="30"> 최적사이즈 115X115 </td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>&nbsp;</td>
			<td>상세보기 <input type="file" name="image2" size="30"> 최적사이즈 250X250</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>&nbsp;</td>
			<td>팝업이미지1 <input type="file" name="image3" size="30"> 최적사이즈 450X450</td>
		</tr>
		
		</table>
		
		<p align="center">
			<input type="button" value=" 등록합니다. " onClick="Javascript:checkInput(this.form);">
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

	########## 자료실에 등록할 파일을 선택하지 않은 경우 ##########
	if(!$image1_name || !$image2_name) {
		error_check("이미지를 등록해주세요.");
		exit;
	}
	########## 이미지들을 지정디렉토리에 저장 ########## 
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
    ########## 상품 목록 출력화면으로 이동하고 종료 ##########
if($result){
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
	}###################
	if($image5_name){
		move_uploaded_file($image5,"../product_img/${pcode}e.jpg");
	}		
	########## 상품 테이블에 입력값을 등록한다. ########## 
    echo("<meta http-equiv='Refresh' content='0; URL=product_list.php?category=$Category1&page=$page&keyfield=$keyfield&key=$encoded_key'>");
    exit;
}else{
	echo $result;
	//error_check("등록실패.. 잠시후 다시등록해주세요.");
	}
}
?>
<?include "../admin/tail.php";?>