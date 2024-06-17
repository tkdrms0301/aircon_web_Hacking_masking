<?
include ("../include/config.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<script language="JavaScript">
<!--
<? 
if($cat == "1"){
$category_new = substr($keyword,-2);
$sqlstr ="select category, name from category WHERE category >= 100 AND category < 10000  AND category LIKE '%$category_new' ORDER BY UID ASC";
$sqlqry = mysql_query($sqlstr) or die(mysql_error()); 
$list_count = mysql_num_rows($sqlqry);
$i = 1;
?>
top.<?=$targi?>.options.length = "0";  
top.<?=$targi?>.options.length = "<?=$list_count+1?>";
top.<?=$targi?>.options[0].value = "";
top.<?=$targi?>.options[0].text = "2차 분류";
<?
while($list = mysql_fetch_array($sqlqry)):
?>
        top.<?=$targi?>.options[<?=$i?>].value = "<?=$list[category]?>";
		top.<?=$targi?>.options[<?=$i?>].text = "<?=$list[name]?>";
<?
$i++;
endwhile;
}else if($cat == "2"){
$category_new1 = substr($keyword,-4);
$sqlstr ="SELECT category, name FROM category WHERE category >= 10000 AND category < 1000000 AND category LIKE '%$category_new1' ORDER BY category ASC";
$sqlqry = mysql_query($sqlstr) or die(mysql_error()); 
$list_count = mysql_num_rows($sqlqry);
if(!$list_count) {
$list_count = 1;
$status = "on";
}
$i = 1;
?>
top.<?=$targi?>.options.length = "0"; 
top.<?=$targi?>.options.length = "<?=$list_count+1?>";
top.<?=$targi?>.options[0].value = "";
top.<?=$targi?>.options[0].text = "3차분류";
<?
while($list = mysql_fetch_array($sqlqry)):
?>
        top.<?=$targi?>.options[<?=$i?>].value = "<?=$list[category]?>";
		top.<?=$targi?>.options[<?=$i?>].text = "<?=$list[name]?>";
<?
$i++;
endwhile;
if($status){
echo"   top.$targi.options[0].value = \"\";
		top.$targi.options[0].text = \"분류없슴\";";

}
}else if($cat == "3"){
$category_new1 = substr($keyword,-6);
$sqlstr ="SELECT category, name FROM category WHERE category >= 1000000 AND category LIKE '%$category_new1' ORDER BY category ASC";
$sqlqry = mysql_query($sqlstr) or die(mysql_error()); 
$list_count = mysql_num_rows($sqlqry);
if(!$list_count) {
$list_count = 1;
$status = "on";
}
$i = 1;
?>
top.<?=$targi?>.options.length = "0"; 
top.<?=$targi?>.options.length = "<?=$list_count+1?>";
top.<?=$targi?>.options[0].value = "";
top.<?=$targi?>.options[0].text = "4차분류";
<?
while($list = mysql_fetch_array($sqlqry)):
?>
        top.<?=$targi?>.options[<?=$i?>].value = "<?=$list[category]?>";
		top.<?=$targi?>.options[<?=$i?>].text = "<?=$list[name]?>";
<?
$i++;
endwhile;
if($status){
echo"   top.$targi.options[0].value = \"\";
		top.$targi.options[0].text = \"분류없슴\";";

}
}
?>
//-->
</script>

<body bgcolor="#FFFFCC">
</body></html>