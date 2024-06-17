<? include "../admin/head.php";

function sanitize_input($input) {
    return htmlspecialchars($input, ENT_QUOTES, 'EUC-KR');
}

if($del=="yes" && $no){
    DBquery("delete from orders where no='$no'");
}

$listsort="ordertype=" . sanitize_input($ordertype) . "&today=" . sanitize_input($today) . "&tid=" . sanitize_input($tid) . "&select=" . sanitize_input($select) . "&content=" . sanitize_input($content) . "&mody_state=" . sanitize_input($mody_state) . "&state=" . sanitize_input($state) . "&baesong=" . sanitize_input($baesong) . "&userid=" . sanitize_input($userid);
?>

<script>
function list_sort(state,bae_song){
    window.location.href="<?=sanitize_input($PHP_SELF)?>?<?=sanitize_input($listsort)?>&state="+state+"&bae_song="+bae_song;
}
function memWindow1(ref) {
   var window_left = (screen.width-700)/2;
   var window_top = (screen.height-500)/2;   
   window.open(ref,"memWin",'width=700,height=450,status=no,scrollbars=yes,top=' + window_top + ',left=' + window_left + '');
}
</script>
<table border="0" cellpadding="0" cellspacing="0" width="880">
<tr>
    <td align=right>
     입금상태  : 
    <select name="state" onchange="list_sort(this.value,baesong.value)">
        <option value="">선택</option>
        <option value="1" <? if($state=="1")echo"selected";?>>입금전</option>
        <option value="2" <? if($state=="2")echo"selected";?>>입금확인</option>
    </select>
    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;
    배송상태  : 
    <select name="baesong" onchange="list_sort(state.value,this.value)">
        <option value="">선택</option>
        <option value="1" <? if($bae_song=="1")echo"selected";?>>배송전</option>
        <option value="2" <? if($bae_song=="2")echo"selected";?>>배송중</option>
        <option value="3" <? if($bae_song=="3")echo"selected";?>>배송완료</option>
    </select>
    </td>
</tr>
</table>
<Br>
<!------------------------------------------------------------>
<table width="880" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr align="center" bgcolor="#F3F9FA"> 
      <td width="88" height="30">주문번호/날짜</td>
      <td height="30">이름[아이디]</td>
      <td width="216" height="30">주문상품</td>
      <td width="88" height="30">주문가격</td>
      <td width="76" height="30">결제방식</td>
      <td width="69" height="30">결제</td>
      <td width="55" height="30">배송</td>
      <td width="52" height="30" nowrap>상세정보</td>
      <td width="52" height="30" nowrap>삭제</td>
    </tr>
<?
if (!$offset) $offset=0;
$limit=10;
$page=10;
if ($content) {
    $select=mysql_real_escape_string($select);
    $content=mysql_real_escape_string($content);
    if (!strpos($select, "oderno")) $select = "orderno";
    else if (!strpos($select, "name")) $select = "name";
    else $select = "name";
    $condition="where $select like '%$content%'";
} else $condition="";
if ($ordertype){
    if(!$condition)$condition="where ordertype ='$ordertype'";
    else $condition .=" and ordertype ='$ordertype'";
}
if($bae_song){
    if(!$condition)$condition="where baesong='$bae_song'";
    else $condition .="and baesong='$bae_song'";
}
if($today){
    if(!$condition)$condition="where substring(wdate,1,10)='$today'";
    else $condition .="and substring(wdate,1,10)='$today'";
}if($state){
    if(!$condition)$condition="where state='$state'";
    else $condition .="and state='$state'";
}if($nowYM){
        if(!$condition)$condition ="where wdate like '$nowYM%' and cancel < 4";
        else $condition .="and wdate like '$nowYM%' and cancel < 4";
}
if($orderno){
    if(!$condition)$condition="where orderno like '%$orderno%'";
    else $condition .="and orderno like '%$orderno%'";
}if($products){
    if(!$condition)$condition="where product like '%$products%'";
    else $condition .="and product like '%$products%'";
}if($name){
    if(!$condition)$condition="where name like '%$name%'";
    else $condition .="and name like '%$name%'";
}if($userid){
    if(!$condition)$condition="where userid = '$userid'";
    else $condition .="and userid = '$userid'";
}if($address1){
    if(!$condition)$condition="where rjuso like '%$address1%'";
    else $condition .="and rjuso like '%$address1%'";
}

if($sY){ //기간sprintf("%04d-%02d-%02d", $year, $month, $day);
        if($sM) $ssdate=$sY."-".sprintf("%02d",$sM);
        else $ssdate=$sY."-00";
    if($eY){
        if($eM) $eedate=$eY."-".sprintf("%02d",$eM);
        else $eedate=$eY."-00";
        if(!$condition)$condition="where left(wdate,7) between '$ssdate' and '$eedate'";
        else $condition .="and left(wdate,7)  between '$ssdate' and '$eedate'";
    }else{
        if(!$condition)$condition="where left(wdate,7) = '$ssdate'";
        else $condition .="and left(wdate,7)  = '$ssdate'";
    }
}

$row=DBarray("select count(*) from orders  $condition");
$numrows=$row[0];
$no=$numrows-$offset;

$query=DBquery("select * from orders  $condition order by no desc limit $offset, $limit");

$cnout=0;
while($row=mysql_fetch_array($query)){
    if($row[view_time]=='0000-00-00 00:00:00')$BGCOLOR="bgcolor=#ffffff";
    else $BGCOLOR="bgcolor=#F3F9FA";
    if($row[product]=="자료이전"){
        $cart_product_name="자료이전";
        $pp_total=$row[price];
    }else{
        products($row[product]);
    }

if($row[userid])$row[name]="<a href=\"javascript:memWindow1('member_view.php?id=".sanitize_input($row[userid])."')\"><font color=#0000ff>".sanitize_input($row[name])."</font>[".sanitize_input($row[userid])."]</a>";

?>
    <tr align="center" <?=$BGCOLOR?>> 
      <td><?=sanitize_input($row[orderno])?><br><?=substr(sanitize_input($row[wdate]),0,10)?></td>
      <td><?=$row[name]?></td>
      <td nowrap align=left><?=$cart_product_name?></td>
      <td><?=number_format($pp_total)?>원</td>
      <td><?=state($row[paymethod],4)?>
      </td>
      <td nowrap><?=state($row[state],$row[paymethod])?>
<?  if($row[cancel]>0){?>
        <br>
      <FONT  COLOR="#FF00CC"><?=state($row[cancel],7)?></FONT>
<? 
}
?>
      </td>
      <td><?=state($row[baesong],5)?></td>
      <td><a href="order_view.php?no=<?=sanitize_input($row[no])?>&ordertype=<?=sanitize_input($ordertype)?>&offset=<?=sanitize_input($offset)?>&today=<?=sanitize_input($today)?>&url=<?=sanitize_input($PHP_SELF)?>&orderno=<?=sanitize_input($row[orderno])?>">보기</a><br></td>
      <td><a href="<?=sanitize_input($PHP_SELF)?>?no=<?=sanitize_input($row[no])?>&<?=sanitize_input($listsort)?>&del=yes&offset=<?=sanitize_input($offset)?>" onClick="return confirm('삭제하시겠습니까?');">삭제</a><br></td>
    </tr>
<? 
 
$pp_name='';$pp_code='';$pp_option='';$pp_count='';$pp_price='';$pp_point='';$pp_total='';$pp_points='';
$TOTALPRICE='';
}
?>
</table>
<br>
<center>
<?

include "../include/page.php";
echo ("${prev10} $_page ${next10}"); 
?>
<br><br>
<!------------------------------------------------------------>

<form name="search" action="<?=sanitize_input($PHP_SELF)?>?<?=sanitize_input($listsort)?>" method="post">
 <select name="select">
    <option value='orderno' <? if ($select=="orderno") echo "selected";?>>주문번호</option>
    <option value='name' <? if ($select=="name") echo "selected";?>>주문자성명</option>
</select>  
<input type="text" name="content" value='<?=sanitize_input($content)?>' class="textarea_01">
    <input name="image" type='image' src="../img/board/board/search_btn.gif"  align="absmiddle">
</form>
<br><br>
<? include "../admin/tail.php";?>
