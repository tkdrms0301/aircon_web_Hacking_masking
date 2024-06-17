<? 
	include "../include/session_config.php";
	include ("check.php");
	include "../include/config.php";
	include "../include/function.php";
$row=DBarray("select * from orders where orderno='$orderno' limit 0,1");

?>
<link rel="stylesheet" href="../css/vsun.css" type="text/css">
<body topmargin=0 leftmargin=0>
<table width="672" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
<TR>
	<TD bgcolor=#ffffff align=center>
<? include "../include/iorder_view.php";?>
</TD>
</TR>
</TABLE>
<script>
print();
</script>
