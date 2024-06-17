<?
$savedir = $DOCUMENT_ROOT."/product_img";
$saveurl = $HTTP_HOST."/product_img";

if(!defined(__ADMIN_ROW)){
		 define(__ADMIN_ROW,"TRUE");
		 $admin_row=DBarray("select * from admin limit 0,1");
}
$BAESONG = $admin_row[A_baesong];
$BAESONGBI = $admin_row[A_baesongbi];
$USEPOINT = $admin_row[A_usepoint];
$PERCENT_POINT = $admin_row[A_point];
$ADMIN_NAME= $admin_row[A_name]; 
$ADMIN_MAIL= $admin_row[A_email];
if (!defined(__ONLY_NUM)){					//숫자입력체크 스크립트
	define(__ONLY_NUM, "onKeyPress=\"if ((event.keyCode<48)||(event.keyCode>57)) event.returnValue=false;\"");
}
if (!defined(__ONFOCUS)){
	define(__ONFOCUS, "onFocus=\"loginform_bgChange(this,'F')\" onblur=\"loginform_bgChange(this,'B');\"");

}
function redirect($url){
echo"<script language=javascript>
document.location = '$url'
</script>";
exit;
}
function redirect1($url){
echo"<script language=javascript>
document.location.replace('$url')
</script>";
exit;
}


function OnlyMsgView($Msg){
echo"<script language='javascript'>
alert('$Msg');
</script>";
}

// 창닫기
function error_close($msg) {
echo "<script>
window.alert('$msg');
self.close();
</script>";
exit;
}

// 알림
function error_check($msg) {
echo "<script>
window.alert('$msg');
history.go(-1);
</script>";
exit;
}

// 보모창 리로드 및 창닫기
function error_reload() {
echo "<script>
window.opener.location.reload();
self.close();
</script>";
exit;
}
// 알림 페이지이동
function redirect_alert($where,$msg) {
echo "<script language='javascript'>
alert('$msg');
location.replace('$where');
</script>";
exit;
}

// 이메일체크
function email_check($email){
if(!eregi("^[^@ ]+@[a-zA-Z0-9\-\.]+\.+[a-zA-Z0-9\-\.]", $email)){
return;
}
for($i = 1; $i <= strlen($email); $i++){
if((Ord(substr("$email", $i - 1, $i)) & 0x80)){
return;
}
}
return $email;
}

function get_msg($msg){
echo"<script>alert('$msg');history.back();</script>";
exit;
}

// html 태그
function html($str){
$str=str_replace("?>","?&gt;",$str);
$str=str_replace("<?","&lt;?",$str);
// $str=str_replace("\"","&quot;",$str);
return $str;
}

// 글자자르기 함수 하단 끝까지
function is_han($text){ 
$text=ord($text); 
if($text >= 0xa1 && $text <= 0xfe) return 1; 
} 

function is_alpha($char){ 
$char = ord($char); 
if($char >= 0x61 && $char <= 0x7a) return 1; 
if($char >= 0x41 && $char <= 0x5a) return 2; 
} 

function cut_string($msg,$cut_size,$tail="...") { 
if($cut_size <= 0) return $msg; 
$msg = strip_tags($msg); 
$msg = str_replace("&mp;quot;","\"",$msg); 
if(strlen($msg) <= $cut_size) return $msg; 
for($i=0;$i<$cut_size;$i++) if(ord($msg[$i])>127) $han++; else $eng++; 
if($han%2) $han--; 
$cut_size = $han + $eng; 
$tmp = substr($msg,0,$cut_size); 
$tmp .= $tail; 
return $tmp; 
} 
	function isnew($datetime, $limit=7) {
		$wdate=explode (" ",$datetime);
		$time=explode(":",$wdate[1]);
		$date=explode("-",$wdate[0]);
		$now=date("U");
		$write=mktime($time[0],$time[1],$time[2],$date[1],$date[2],$date[0]);
		if ($now-$write <= 60*60*24*$limit) return true;
		else return false;
	}

function newimg($tid,$table,$orderby='id'){
	$row=DBarray("select wdate from $table where tid='$tid' order by $orderby desc limit 0,1");
	if(isnew($row[0],1)){
		echo"<img src='../img/my/new_icon.gif' width='9' height='9' align='absmiddle'>";
	}
}
#####이미지사이즈조절###
function makeImg($num) {
   global $hmax, $wmax,$newheight,$newwidth; // max width and height
   $image = $num;
   list($width, $height, $type, $attr) = @getimagesize($image);
   $hscale = $height / $hmax;
   $wscale = $width / $wmax;
   if (($hscale > 1) || ($wscale > 1)) {
       $scale = ($hscale > $wscale)?$hscale:$wscale;
   } else {
       $scale = 1;
   }
   $newwidth = floor($width / $scale);
   $newheight= floor($height / $scale);

   return  "<img width='$newwidth' height='$newheight' src='$image' border=0 align='absmiddle' name='img01'>";
} 



function categoryname($category,$type="",$url="",$brand="",$content=""){
	$step01=substr($category,-2);
	$step02=substr($category,-4);
	$step03=substr($category,-6);
	$step04=$category;
$row01=DBarray("select category,name from category where category < 100 and category like '%$step01'");
if($category>=100)$row02=DBarray("select category,name from category where category >= 100 AND category < 10000 and category like '%$step02'");

if($category>=10000)$row03=DBarray("select category,name from category where category >= 10000 AND category < 1000000 and category like '%$step03'");
$row04=DBarray("select category,name from category where category >= 1000000 and category = '$step04'");
	if($row01[name])$c_name="<A HREF='$url?category=$row01[category]'>$row01[name]</A>";
	if($row02[name])$c_name.=" &gt; "."<A HREF='$url?category=$row02[category]'>$row02[name]</a>";
	if($row03[name])$c_name.=" &gt; "."<A HREF='$url?category=$row03[category]'>$row03[name]</a>";
	if($row04[name])$c_name.=" &gt; "."<A HREF='$url?category=$row04[category]'>$row04[name]</a>";
	


	###################페이지별 위치 추가###############
if($url=="../product/product.php"){
	$page_name="<A HREF='$url'>상품리스트</A> &gt; ";
}elseif($url=="../product/old_product.php"){
	$page_name="<A HREF='$url'>중고상품</A>  &gt; ";
}elseif($url=="../product/e_product.php"){
	$page_name="<A HREF='$url'>기획전</A>  &gt; ";
}elseif($url=="../product/b_product.php"){
	$page_name="<A HREF='$url'>브랜드 샵</A>  &gt; ";
}


	####################################################
		if($type=="1") return $row01[name];
		else if($type=="2") return $row02[name];
		else if($type=="3") return $row03[name]."&nbsp;";
		else if($category)	return $page_name.$c_name;
		else if($content)	return "<font color='##2152C9'><b>".$content."</b></font>의 검색리스트";
		else  return substr($page_name,0,-6);
	
}


function Baesong($totprice){
	global $BAESONG,$BAESONGBI,$string_baesong,$TOTALPRICE;
	if($totprice >= $BAESONG){
				$TOTALPRICE=$totprice;
				$string_baesong="무료";
	}else{
				$TOTALPRICE=$totprice+$BAESONGBI;
				$string_baesong=number_format($BAESONGBI)."원";
	}

}


function shopimg($img,$hmax,$wmax,$size="s"){
	if(substr($img,-4,1)=="."){
	if(file_exists($img)){
		return makeImg($img);
	}else{
		if($size=="s")return  makeImg("../img/common/noimg_a.jpg");
		else return  makeImg("../img/common/noimg_b.jpg");
	} 
	}
}
function state($state,$type="1"){
	if($type=="1")$state_array=array("","입금전","<font color='#00CC00'>입금확인</font>"); //state
	if($type=="2")$state_array=array("","카드결제","<font color='#00CC00'>승인완료</font>"); //state
	elseif($type=="3")$state_array=array("","환불","교환","반품","구매취소"); //cancel
	elseif($type=="7")$state_array=array("","환불처리요청","교환처리완료","반품확인","취소처리완료","환불처리","반품처리"); //cancel
	elseif($type=="4")$state_array=array("","무통장","카드"); //paymethod 
	elseif($type=="5")$state_array=array("","배송전","<font color='#FF00FF'>배송중</font>","<font color='#FF0000'>배송완료</font>"); //baesong
	elseif($type=="6")$state_array=array("","환불요청","교환요청","반품요청","구매취소요청"); //mody_state
	return $state_array[$state];
}




function products($product){
	global $pp_name,$pp_code,$pp_option,$pp_count,$pp_price,$pp_point,$pp_total,$pp_points,$cart_product_name,$cart_cnt;
	$products=explode("@@",$product);
	for($cnt=0;$cnt<sizeof($products);$cnt++){
		$pro=explode("|",$products[$cnt]);
			$pp_code[$cnt]=$pro[0];
			$pp_option[$cnt]=$pro[1];
			$pp_count[$cnt]=$pro[2];
			$pp_name[$cnt]=$pro[3];
			$pp_price[$cnt]=$pro[4];
			$pp_point[$cnt]=$pro[5];
			$pp_total += $pp_price[$cnt]*$pp_count[$cnt];
			$pp_points += $pp_point[$cnt];
	}
		if($pp_name[1]){
			$cart_cnt=sizeof($pp_name)-2;
			$cart_product_name=$pp_name[0]." 외".$cart_cnt;
		}else{
			$cart_product_name=$pp_name[0];
			$cart_cnt=1;
		}
}

function age($jumin1,$jumin2="1") {
$now = date("Y", time());
if($jumin2 > 2)$jumin_year = "20".$jumin1;
else $jumin_year = "19".$jumin1;
$age = $now - $jumin_year + 1;

echo $age;
}
function year_check($age){
	$thisYear=date('Y');
	$birth_year = $thisYear-$age;

return substr($birth_year,-2);
}
$address1_ARR=array("서울","인천","경기","강원","대전","충북","충남","부산","울산","대구","경북","경남","광주","전북","전남","제주");




function TOT($tablename,$userid,$type=""){
	if($type) $tot=DBarray("select count(*) from $tablename where $type='$userid'");
	else $tot=DBarray("select count(*) from $tablename where userid='$userid'");
	return $tot[0];
}


$BRAND_ARRAY=array(
"3"=>"캐리어",
"1"=>"LG",
"2"=>"삼성"

);

function sendmail($from_name, $from_mail, $Mail_to, $Mail_body, $Mail_title) {
		$Mail_header = "From: $from_name <$from_mail>\r\n";
		$Mail_header .= "Reply-To: $from_mail\r\n";
		$Mail_header .= "Content-Type: text/html;charset=EUC-KR";
		$result = mail ($Mail_to, $Mail_title, $Mail_body, $Mail_header);
		if ($result)	return true; 
		else return false;
	}
?>