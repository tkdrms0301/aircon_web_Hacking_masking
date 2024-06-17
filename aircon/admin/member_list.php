<?
include("../admin/head.php");

function sanitize_input($input) {
    return htmlspecialchars($input, ENT_QUOTES, 'EUC-KR');
}
if(!$table)$table="users";
if ($del) {
	DBquery("delete from $table where no='$no'");
	mysql_close();
	redirect("$PHP_SELP?offset=$offset&select=$select&content=$content&sex=$sex&location=$location&age1=$age1&age2=$age2&PandB=$PandB");
	exit;
}
if($clevel){
	DBquery("update $table set level='$clevel' where no='$no'");
	mysql_close();
	redirect("$PHP_SELP?offset=$offset&select=$select&content=$content&sex=$sex&location=$location&age1=$age1&age2=$age2&level=$level");
	exit;
}

if (!$offset) $offset=0;
	$limit=10;
	$page=10;
	
  if ($content) {
    $select=mysql_real_escape_string($select);
    $content=mysql_real_escape_string($content);
    if (!strpos($select, "name")) $select = "name";
		else if (!strpos($select, "userid")) $select = "userid";
    else if (!strpos($select, "company")) $select = "company";
		else $select = "name";
    $condition="where $select like '%$content%'";
  } else $condition="";
  
	if($age1){

		$ag1=year_check($age1);
		if($age2){
			$ag2=year_check($age2);
			if($condition)$condition .=" and left(jumin,2) between '$ag2' and '$ag1'";
			else $condition .="where left(jumin,2) between '$ag2' and '$ag1'";
		}else{
			if($condition)$condition .=" and left(jumin,2)='$ag1'";
			else $condition .="where left(jumin,2)='$ag1'";
		}
	}
	if($location){
			if($condition)$condition .=" and juso1 like '%$location%'";
			else $condition .="where juso1 like '%$location%'";
	}
	if($sex){
			if($condition)$condition .=" and substring(jumin,8,1) ='$sex'";
			else $condition .="where substring(jumin,8,1) ='$sex'";
	}if($PandB){
			if($condition)$condition .=" and PandB ='$PandB'";
			else $condition .="where PandB ='$PandB'";
	}
	//echo $condition;
$row=mysql_fetch_array(DBquery("select count(*) from $table $condition"));
$numrows=$row[0];
	$no=$numrows-$offset;
?>

<script language="javascript">
function mem_del(no){
	a=confirm("지워진 회원정보는 복구할 수 없습니다. 회원정보를 삭제 하시겠습니까?");
	if(a == true){	location.replace("<?=$PHP_SELF?>?offset=<?=$offset?>&select=<?=sanitize_input($select)?>&content=<?=sanitize_input($content)?>&sex=<?=sanitize_input($sex)?>&location=<?=sanitize_input($location)?>&age1=<?=sanitize_input($age1)?>&age2=<?=sanitize_input($age2)?>&PandB=<?=sanitize_input($PandB)?>&del=yes&no="+no);
	}else{
		return;
	}
}
function changelevel(clevel,no){
	location.replace("<?=$PHP_SELF?>?offset=<?=$offset?>&select=<?=sanitize_input($select)?>&content=<?=sanitize_input($content)?>&sex=<?=sanitize_input($sex)?>&location=<?=sanitize_input($location)?>&age1=<?=sanitize_input($age1)?>&age2=<?=sanitize_input($age2)?>&level=<?=$level?>&clevel="+clevel+"&no="+no);
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



<table width=686 cellpadding=0 cellspacing=0>
  <tr> 
    <td width="400" align=left>
      현재 <?=sanitize_input($numrows)?>
      명이 가입했습니다.<br>
	  
	  </td>
    <td width="400" align=right>[<a href="javascript:memWindow('sendmail.php?to=all');">전체메일방송</a>]</td>
  </tr>
</table><br>

<br>
<table width=686 cellpadding=5 cellspacing=1 border=0 bgcolor=#dddddd>
  <tr bgcolor=#F3F9FA> 
    <td nowrap align="center">No</td>
    <td nowrap align="center">아이디 (메일)</td>
    <td nowrap align="center">이름</td>
    <td nowrap align="center">주민등록번호</td>
    <td nowrap align="center">전화</td>
    <td nowrap align="center">휴대전화</td>
    <td nowrap align="center">가입일</td>
    <td nowrap align="center">비고</td>
  </tr>
<?
  	
	$result=DBquery("select * from $table $condition order by wdate desc,no desc limit $offset, $limit");
	
	while ($row=mysql_fetch_array($result)) {

?>
  <tr bgcolor=#ffffff>
    <td nowrap align="center"><?=$no--?></td>
    <td nowrap align="center"><a href="javascript:memWindow1('member_view.php?id=<?=sanitize_input($row['userid'])?>')"><?=sanitize_input($row['userid'])?></a> (<a href="mailto:<?=sanitize_input($row['email'])?>"><?=sanitize_input($row['email'])?></a>)</td>
    <td nowrap align="center"><?=sanitize_input($row['name'])?></td>
    <td nowrap align="center"><?=sanitize_input($row['jumin'])?></td>
    <td nowrap align="center"><?=sanitize_input($row['tel'])?></td>
    <td nowrap align="center"><?=sanitize_input($row['cell'])?></td>
    <td nowrap align="center"><?=sanitize_input($row['wdate'])?></td>
    <td nowrap align="center">[<a href="javascript:memWindow1('member_view.php?id=<?=sanitize_input($row['userid'])?>')">보기</a>][<a href="javascript:mem_del('<?=sanitize_input($row['no'])?>');">삭제</a>]</td>
  </tr>
<?
	}
?>  
  
</table>
<table width=686 cellpadding=5 cellspacing=1 border=0 >
  <tr bgcolor=#ffffff> 
    <td colspan="9" align="center" nowrap> 
<?
$listsort="select=" . sanitize_input($select) ."&content=" . sanitize_input($content) . "&PandB=" . sanitize_input($PandB);
	include "../include/page.php";
	echo ("${prev10} $_page ${next10}");
?>
    </td>
  </tr>
		  
</table>

<br>
 <table border="0" cellspacing="0" cellpadding="0">
<form name="search" action="<?=sanitize_input($PHP_SELF)?>?PandB=<?=sanitize_input($PandB)?>" method="post">
                                <tr> 
                                  <td height="1"></td>
                                  <td rowspan="2"> 
                                    <input type="text"  name="content" value='<?=sanitize_input($content)?>' class="textarea_01" >
                                    <input name="image" type='image' src="../img/board/board/search_btn.gif" align="absmiddle" >
                                  </td>
                                </tr>
                                <tr> 
                                  <td width="55"> 
					 <select name="select">

                    <option value='name' <? if ($select=="name") echo "selected";?>>이름</option>
                    <option value='userid' <? if ($select=="userid") echo "selected";?>>아이디</option>
                    <option value='company' <? if ($select=="company") echo "selected";?>>회사명</option>
					</select>  
                                  </td>
                                </tr>
</form>
                              </table>
</body>
</html>
<?
	mysql_close();
?>
<?include "../admin/tail.php";?>
