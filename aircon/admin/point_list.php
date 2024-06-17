<?
include("../admin/head.php");
if(!$table)$table="point";
if ($del) {
	DBquery("delete from $table where po_no='$po_no'");
	mysql_close();
	redirect("$PHP_SELP?offset=$offset&select=$select&content=$content");
	exit;
}
if($insert && $p_userid && $p_point && $p_reason) {
$input[userid] =$p_userid;
$input[point]=$p_point;
$input[reason]=$p_reason;
$input[wdate]=date('Y-m-d');
	setInsert($table, $input);
	mysql_close();
	redirect("$PHP_SELP?offset=$offset&select=$select&content=$content");
	exit;
}
if (!$offset) $offset=0;
	$limit=10;
	$page=10;
	
if ($content) $condition="where $select like '%$content%'"; else $condition="";
$row=mysql_fetch_array(DBquery("select count(*) from $table $condition"));
$numrows=$row[0];
	$no=$numrows-$offset;
?>

<script language="javascript">
function mem_del(po_no){
	a=confirm("지워진 정보는 복구할 수 없습니다. 삭제 하시겠습니까?");
	if(a == true){	location.replace("<?=$PHP_SELF?>?offset=<?=$offset?>&select=<?=$select?>&content=<?=$content?>&del=yes&po_no="+po_no);
	}else{
		return;
	}
}
function memWindow(ref) {
   var window_left = (screen.width-700)/2;
   var window_top = (screen.height-500)/2;   
   window.open(ref,"memWin",'width=500,height=450,status=no,scrollbars=yes,top=' + window_top + ',left=' + window_left + '');
}

function memWindow1(ref) {
   var window_left = (screen.width-700)/2;
   var window_top = (screen.height-500)/2;   
   window.open(ref,"memWin",'width=700,height=450,status=no,scrollbars=yes,top=' + window_top + ',left=' + window_left + '');
}
</script>
<body>



<table width=686 cellpadding=0 cellspacing=0>
  <tr> 
    <td width="400" align=left>
     <br>
	  *최근순으로 적립금이 발생한 내역을 확인하실 수 있습니다.<br>

	  *적립내역을 삭제하거나 특정회원에게 적립금을 지급할 수 있습니다.
	  </td>

  </tr>
</table><br>

<br>
<table width=686 cellpadding=5 cellspacing=1 border=0 bgcolor=#dddddd>
  <tr bgcolor=#ffffff> 
    <td nowrap align="center">No</td>
    <td nowrap align="center">아이디</td>
    <td nowrap align="center">적립내역</td>
    <td nowrap align="center">가감포인트</td>
    <td nowrap align="center">날짜</td>
    <td nowrap align="center">비고</td>
  </tr>
<?
  	
	$result=DBquery("select * from $table $condition order by po_no  desc limit $offset, $limit");
	
	while ($row=mysql_fetch_array($result)) {
?>
  <tr bgcolor=#ffffff>
    <td nowrap align="center"><?=$no--?></td>
    <td nowrap align="center"><a href="javascript:memWindow1('member_view.php?id=<?=$row[userid]?>')"><?=$row[userid]?></a></td>
    <td nowrap align="left">&nbsp;<?=$row[reason]?></td>
    <td nowrap align="center"><?=$row[point]?></td>
    <td nowrap align="center"><?=$row[wdate]?></td>
    <td nowrap align="center">
<? 
	$pro_row=DBarray("select count(*) from orders where orderno='$row[order_no]'");
	if($pro_row[0]){
?>
	[<a href="order_view.php?&orderno=<?=$row[order_no]?>">보기</a>]
<? }?>
	[<a href="javascript:mem_del('<?=$row[po_no]?>');">삭제</a>]</td>
  </tr>
<?
	}
?>  
  <tr bgcolor=#ffffff> 
    <td colspan="9" align="center" nowrap> 
<?
$listsort="select=$select&content=$content&PandB=$PandB";
	include "../include/page.php";
	echo ("${prev10} $_page ${next10}");
?>
    </td>
  </tr>
		
  
</table>
<br>
<script>
function addpoint_check(){
	if(!addpoint.p_userid.value){
		alert("아이디를 입력하세요.");
		addpoint.p_userid.focus();
		return;
	}if(!addpoint.p_point.value){
		alert("적립금을 입력하세요.");
		addpoint.p_point.focus();
		return;
	}if(!addpoint.p_reason.value){
		alert("사유를 입력하세요.");
		addpoint.p_reason.focus();
		return;
	}
	document.addpoint.submit();
}
</script>
 <table border="0" cellspacing="0" cellpadding="0">
<form name="addpoint" action="<?=$PHP_SELF?>?insert=ok" method="post">
                                <tr> 

<td>회원아이디 : <input type="text"  name="p_userid" value='' size=8 class="textarea_01" ></td>
<td>포인트 : <input type="text"  name="p_point" value='' size=8 class="textarea_01" ></td>
<td>사유 : <input type="text"  name="p_reason" value='' size=30 class="textarea_01" ></td>
<td>[<A HREF="javascript:addpoint_check();">추가</A>]</td>

                                </tr>

</form>
                              </table>
</body>
</html>
<?
	mysql_close();
?>
<?include "../admin/tail.php";?>