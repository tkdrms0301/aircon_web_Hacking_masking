<? include "../admin/head.php";?>
      <? 
	  if (!$board) $board="free_board";

	  if (!$show) $show="list";
	  if($board=="movie" || $board=="about"){
		  if($show=="list")$show="gallery_list";
	  }
	  echo "<br>";

	  include ("../admin/board/".$show.".php"); 

	  ?>
<? include "../admin/tail.php";?>