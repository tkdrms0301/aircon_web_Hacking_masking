<?
	if ($offset>=$limit*$page) {
		$newpage=$offset-$limit*$page;
		$prev10="<a href='$PHP_SELF?offset=$newpage&$listsort'><img src='../img/board/board/prev_btn.gif' width='13' height='13' align='absmiddle'></a>";
	}

	if ($offset!=0) $newpage=((int)($offset/$limit/$page))*$limit*$page+$limit*$page;
	else $newpage=$limit*$page;
	if ($newpage<=$numrows) {
		$next10="<a href='$PHP_SELF?offset=$newpage&$listsort'><img src='../img/board/board/next_btn.gif' width='13' height='13' align='absmiddle'></a>";
	}

	for ($i=1;$i<=$page;$i++) {
		if ($numrows<(($i-1)+((int)($offset/(10*$limit)))*10)*$limit+1) break;
	    $newoffset=$limit*($i-1)+((int)($offset/(10*$limit)))*(10*$limit);
	    if ($offset!=$newoffset){
    		$_page .=" | "."<a href='$PHP_SELF?offset=$newoffset&$listsort'>";
	    }
		else $_page .=" | ".("<strong><font color='#000000'>");
    	$_page .= (($i+((int)($offset/(10*$limit)))*10));
	    if ($offset!=$newoffset){
	   		$_page .= "</a>";
	    }
		else $_page .= ("</font></strong>");
		$_page .=  " ";
	}
	
?>