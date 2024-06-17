<?
include("../admin/head.php");
if(!$table)$table="request";
if ($del) {
	DBquery("delete from $table where no='$no'");
	mysql_close();
	redirect("$PHP_SELP?offset=$offset&select=$select&content=$content&sex=$sex&location=$location&age1=$age1&age2=$age2&level=$level");
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
function mem_del(no){
	a=confirm(" 삭제 하시겠습니까?");
	if(a == true){	location.replace("<?=$PHP_SELF?>?offset=<?=$offset?>&select=<?=$select?>&content=<?=$content?>&sex=<?=$sex?>&location=<?=$location?>&age1=<?=$age1?>&age2=<?=$age2?>&level=<?=$level?>&del=yes&no="+no);
	}else{
		return;
	}
}
function changelevel(clevel,no){
	location.replace("<?=$PHP_SELF?>?offset=<?=$offset?>&select=<?=$select?>&content=<?=$content?>&sex=<?=$sex?>&location=<?=$location?>&age1=<?=$age1?>&age2=<?=$age2?>&level=<?=$level?>&clevel="+clevel+"&no="+no);
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


function onlyNumber() {
if(((event.keyCode > 64)&&(event.keyCode < 91))||((event.keyCode > 106)&&(event.keyCode < 123)))
event.returnValue=false;
}
</script>
<body>


<br>
<table width=700 cellpadding=5 cellspacing=1 border=0 bgcolor=#dddddd>
  <tr bgcolor=#EFEFEF> 
    <td nowrap align="center"><B>No</B></td>
    <td nowrap align="center"><B>성명</B></td>
    <td nowrap align="center"><B>전화번호</B></td>
    <td nowrap align="center"><B>이메일</B></td>
    <td nowrap align="center"><B>신청일</B></td>
    <td nowrap align="center"><B>비고</B></td>
  </tr>
<?
  	
	$result=DBquery("select * from $table $condition order by no desc limit $offset, $limit");
	
	while ($row=mysql_fetch_array($result)) {
?>
  <tr bgcolor=#ffffff>
    <td nowrap align="center"><?=$no--?></td>
    <td nowrap align="center"><a href="mailto:<?=$row[email]?>"><?=$row[name]?></a></td>
    <td nowrap align="center"><?=$row[tel]?></td>
    <td nowrap align="center"><a href="mailto:<?=$row[email]?>"><?=$row[email]?></a></td>
    <td nowrap align="center"><?=$row[wdate]?></td>
    <td nowrap align="center">[<a href="javascript:memWindow1('online_view.php?no=<?=$row[no]?>')">보기</a>][<a href="javascript:mem_del('<?=$row[no]?>');">삭제</a>]</td>
  </tr>
<?
	}
?>  
</table>
<table width=700  cellpadding=5 cellspacing=1 border=0>
  <tr bgcolor=#ffffff align=center> 
    <td colspan="9" align="center" nowrap> 
      <?
	if ($offset>=$limit*$page) {
		$newpage=$offset-$limit*$page;
		$prev10="<a href='$PHP_SELF?main=list&offset=$newpage&bd=$bd&select=$select&content=$content&level=$level&sex=$sex&location=$location&age1=$age1&age2=$age2&level=$level'>[이전]</a>";
	}

	if ($offset!=0) $newpage=((int)($offset/$limit/$page))*$limit*$page+$limit*$page;
	else $newpage=$limit*$page;
	if ($newpage<=$numrows) {
		$next10="<a href='$PHP_SELF?main=list&offset=$newpage&bd=$bd&select=$select&content=$content&level=$level&sex=$sex&location=$location&age1=$age1&age2=$age2&level=$level'>[다음]</a>";
	}

	for ($i=1;$i<=$page;$i++) {
		if ($numrows<(($i-1)+((int)($offset/(10*$limit)))*10)*$limit+1) break;
	    $newoffset=$limit*($i-1)+((int)($offset/(10*$limit)))*(10*$limit);
	    if ($offset!=$newoffset){
    		$_page .="<a href='$PHP_SELF?main=list&offset=$newoffset&select=$select&content=$content&level=$level&sex=$sex&location=$location&age1=$age1&age2=$age2&level=$level'>";
	    }
		else $_page .=("<b>[");
    	$_page .= (($i+((int)($offset/(10*$limit)))*10));
	    if ($offset!=$newoffset){
	   		$_page .= "</a>";
	    }
		else $_page .= ("]</b>");
		$_page .=  " ";
	}
	echo ("${prev10} $_page ${next10}");
?>
    </td>
  </tr>
		
  
</table>
<br>
<table width="800">
	<tr>
		<td align="center"></td>
	</tr>
</table>
</body>
</html>
<?
	mysql_close();
?>
<?include "../admin/tail.php";?>