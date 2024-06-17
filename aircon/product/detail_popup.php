<?
include "../include/title.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
</head>
<?
$hmax="450";
$wmax="450";

	if(file_exists("../product_img/".$p_code."c.jpg"))$bigimg1 = "../product_img/".$p_code."c.jpg";
	//else $bigimg1 = "../images/noimg500.gif";

	if(file_exists("../product_img/".$p_code."d.jpg"))$bigimg2 = "../product_img/".$p_code."d.jpg";
	//else $bigimg2 = "../images/noimg500.gif";

	if(file_exists("../product_img/".$p_code."e.jpg"))$bigimg3 = "../product_img/".$p_code."e.jpg";
	//else $bigimg3 = "../images/noimg500.gif";


if(file_exists("../product_img/".$p_code."c.jpg"))$img="../product_img/".$p_code."c.jpg";
else $img="../product_img/".$p_code."b.jpg";
?>
<script>
function transimg(place) {
      if (place==1) { form_photo.img01.src="<?=$bigimg1?>";
			<? makeImg($bigimg1) ?>
			form_photo.img01.width="<?=$newwidth?>";
			form_photo.img01.height="<?=$newheight?>";
	  }
      if (place==2)  {form_photo.img01.src="<?=$bigimg2?>";
			<? makeImg($bigimg2) ?>
			form_photo.img01.width="<?=$newwidth?>";
			form_photo.img01.height="<?=$newheight?>";
	  }
      if (place==3) { form_photo.img01.src="<?=$bigimg3?>";
			<? makeImg($bigimg3) ?>
			form_photo.img01.width="<?=$newwidth?>";
			form_photo.img01.height="<?=$newheight?>";
	  }

}
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table width="450" height="454" border="0" cellspacing="0" cellpadding="0">
<form name="form_photo" method="post">
  <tr>
    <td align="center">
      <table width="450" height="454" border="0" cellpadding="0" cellspacing="1" bgcolor="E6E6E6">
        <tr>
          <td align="center" bgcolor="#FFFFFF" >
<a HREF="javascript:window.close();"><?=shopimg($img,$hmax,$wmax,"b")?></a>
		  </td>
        </tr>
      </table>
      
    </td>
  </tr>
  </form>
</table>
<!--
<?
$wmax=46; $hmax=46;
?>
<table width="450" height="28" border="0" cellpadding="0" cellspacing="0" valign=top>
  <tr>
	<td valign=top height="50">
<table border="0" cellpadding="0" cellspacing="0"  >

<tr>
<? if($bigimg1){?>
	<td width=50 height="50" >
<table border="0" cellpadding="2" cellspacing="1" width="50" height="50" bgcolor=#cccccc>
<tr bgcolor=#ffffff align=center height="50" >
	<td onMouseover=transimg(1) style="CURSOR: hand"><?=@makeImg($bigimg1,"simg01")?></td>
</tr>
</table>
	</td>
<? }?>
	<td>&nbsp;</td>
<? if($bigimg2){?>
	<td width=50 height="50"  align=center>
<table border="0" cellpadding="2" cellspacing="1" width="50" height="50" bgcolor=#cccccc>
<tr bgcolor=#ffffff align=center height="50" >
	<td onMouseover=transimg(2) style="CURSOR: hand"><?=@makeImg($bigimg2,"simg02")?></td>
</tr>
</table>
	</td>
<? }?>
		<td>&nbsp;</td>
<? if($bigimg3){?>
	<td width=50 height="50"  align=center>
<table border="0" cellpadding="2" cellspacing="1" width="50" height="50" bgcolor=#cccccc>
<tr bgcolor=#ffffff height="50" >
	<td onMouseover=transimg(3) style="CURSOR: hand"><?=@makeImg($bigimg3,"simg03")?></td>
</tr>
</table>
</td>
<? }?>
</tr></table>
--->
<table width="450" height="28" border="0" cellpadding="0" cellspacing="0" valign=top>
  <tr> 
    <td height="50" align="center"> <img src="../img/product/close.jpg" width="40" height="18" border="0" usemap="#Map">&nbsp;&nbsp;</tr>
</table>
<br>

<map name="Map">
  <area shape="rect" coords="-12,-1,65,21" href="javascript:window.close();">
</map>
</body>
</html>
