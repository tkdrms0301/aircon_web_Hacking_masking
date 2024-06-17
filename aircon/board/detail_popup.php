<?
include "../include/config.php";
include "../include/function.php";
$hmax=2000; $wmax=2000;
makeImg($img);
$y=$newheight;
$x=$newwidth;
?>
<script language=javascript>
var y=<?=$y?>;
var x=<?=$x?>;
	width = (x>window.screen.width-100) ? window.screen.width-100 : x;
	height = (y>window.screen.height-100) ? window.screen.height-100 : y ;
	big = (width!=x || height!=y) ? 1 : 0 ;
	
	window.resizeTo(width+20,height+50);
function fitwin(){
	window.moveTo((window.screen.width-document.body.clientWidth)/2,(window.screen.height-document.body.clientHeight)/2-15);
}

function move(){
	x_per = (<?=$x?>-document.body.clientWidth)/document.body.clientWidth;
	y_per = (<?=$y?>-document.body.clientHeight)/document.body.clientHeight;
	window.scroll(window.event.clientX*x_per,window.event.clientY*y_per);	
}
</script>

<body leftmargin=0 topmargin=0 scroll=no onLoad=fitwin()>
<center>
<img src='<?=$img?>' width=<?=$x?> height=<?=$y?> onClick="window.close();" style="cursor:hand"  <?  echo "onmousemove='move();'" ?>>
</center>
</body>