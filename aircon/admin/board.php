<? include "../admin/head.php";?>
<TABLE>
<TR>
	<TD align=center>
      <? 
	  if (!$board) $board="notice";
	  if (!$show) $show="list";
	 
	  include ("../admin/board/".$show.".php"); 
	  ?>
	</TD>
</TR>
</TABLE>

<? include "../admin/tail.php";?>