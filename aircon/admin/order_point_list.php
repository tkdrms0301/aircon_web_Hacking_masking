<? include "../admin/head.php";
if($del=="yes" && $no){
	DBquery("delete  from point_orders where no='$no'");

}
$listsort="ordertype=$ordertype&today=$today&tid=$tid&select=$select&content=$content&mody_state=$mody_state&state=$state&baesong=$baesong&userid=$userid";
?>
<script>
function list_sort(state,bae_song){
	window.location.href="<?=$PHP_SELF?>?<?=$listsort?>&state="+state+"&bae_song="+bae_song;
}
function memWindow1(ref) {
   var window_left = (screen.width-700)/2;
   var window_top = (screen.height-500)/2;   
   window.open(ref,"memWin",'width=700,height=450,status=no,scrollbars=yes,top=' + window_top + ',left=' + window_left + '');
}
</script>
<table border="0" cellpadding="0" cellspacing="0" width="850" >
<tr>
	<td>
	
	<select name="baesong" onchange="list_sort(state.value,this.value)">
		<option value="">선택</option>
		<option value="1" <? if($bae_song=="1")echo"selected";?>>배송전</option>
		<option value="2" <? if($bae_song=="2")echo"selected";?>>배송중</option>
		<option value="3" <? if($bae_song=="3")echo"selected";?>>배송완료</option>
	</select>

	</td>
</tr>
</table>
<!------------------------------------------------------------>
<table width="800" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                    <tr align="center" bgcolor="#D1E3A8"> 
                      <td width="88" height="30">주문번호</td>
                      <td height="30" >이름[아이디]</td>
                      <td width="216" height="30">주문상품</td>
                      <td width="88" height="30">주문포인트</td>
                      <td width="55" height="30">배송</td>
				      <td width="52" height="30" nowrap>상세정보</td>
				      <td width="52" height="30" nowrap>삭제</td>
                    </tr>
<?
if (!$offset) $offset=0;
	$limit=10;
	$page=10;
	if ($content) $condition="where $select like '%$content%'"; else $condition="";
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
	
	$row=DBarray("select count(*) from point_orders  $condition");
	$numrows=$row[0];
	$no=$numrows-$offset;

$query=DBquery("select * from point_orders  $condition order by no desc limit $offset, $limit");


$cnout=0;
while($row=mysql_fetch_array($query)){

if($row[userid])$row[name]="<a href=\"javascript:memWindow1('member_view.php?id=$row[userid]')\"><font color=#0000ff>".$row[name]."</font>[".$row[userid]."]</a>";
?>
                    <tr align="center" bgcolor="#FFFFFF" height="30"> 
                      <td><?=substr($row[wdate],0,10)?></td>
					  <td><?=$row[name]?></td>
                      <td nowrap align=left><?=$pp_name[0]?></td>
                      <td><?=number_format($TOTALPRICE)?>원</td>
                      
					  <td><?=state($row[baesong],5)?></td>
					  <td><a href="order_point_view.php?no=<?=$row[no]?>&ordertype=<?=$ordertype?>&offset=<?=$offset?>&today=<?=$today?>&url=<?=$PHP_SELF?>&orderno=<?=$row[orderno]?>">보기</a><br></td>
					  <td><a href="<?=$PHP_SELF?>?no=<?=$row[no]?>&<?=$listsort?>&del=yes&offset=<?=$offset?>" onClick="return confirm('삭제하시겠습니까?');">삭제</a><br></td>
                    </tr>
<? 
 
$pp_name='';$pp_code='';$pp_option='';$pp_count='';$pp_price='';$pp_point='';$pp_total='';$pp_points='';
}
?>
                  </table>
                  <br>
<?

include "../include/page.php";
	
?>
<br>
<!------------------------------------------------------------>

<form name="search" action="<?=$PHP_SELF?>?<?=$listsort?>" method="post">
					 <select name="select">
                    <option value='orderno' <? if ($select=="orderno") echo "selected";?>>주문번호</option>
                    <option value='name' <? if ($select=="name") echo "selected";?>>주문자성명</option>
					</select>  
					<input type="text" name="content" value='<?=$content?>' class="textarea_01">
                        <input name="image" type='image' src="../img/customer/board/search_btn.gif" width="57" height="20" align="absmiddle" >
						</form>
<? include "../admin/tail.php";?>