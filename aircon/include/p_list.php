<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
	
}


<? if(basename($PHP_SELF)=="main.php" || basename($PHP_SELF)=="product.php"){ ?>
function selectboxhidden(){
	if(document.reg_form.Category1) document.reg_form.Category1.style.visibility='hidden';
	if(document.reg_form.Category2) document.reg_form.Category2.style.visibility='hidden';
}
function selectboxshow(){
	if(document.reg_form.Category1) document.reg_form.Category1.style.visibility='visible';
	if(document.reg_form.Category2) document.reg_form.Category2.style.visibility='visible';
}
<?}else if(basename($PHP_SELF)=="sul.php" ){?>
function selectboxhidden(){
	if(document.online.tel1) document.online.tel1.style.visibility='hidden';
	if(document.online.cell1) document.online.cell1.style.visibility='hidden';
}
function selectboxshow(){
	if(document.online.tel1) document.online.tel1.style.visibility='visible';
	if(document.online.cell1) document.online.cell1.style.visibility='visible';
}
<?}else {?>
function selectboxhidden(){
}
function selectboxshow(){
}
<? }?>
//-->
</script>
<table width="180" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="../img/banner/p_ltitle.jpg" width="180" height="55"></td>
  </tr>
  <tr>
    <td align="center" background="../img/banner/p_lbg.jpg">
	 <table width="154" border="0" cellspacing="0" cellpadding="0">

<? 
$query = DBquery("SELECT * FROM category WHERE category < 100 order by indexs asc"); 
while($row=mysql_fetch_array($query)){
	$categoryint = intval($row[category]);
	if(substr($row[category],-2)==substr($category,-2))$fontss="<font color=#74BD04>";
	else $fontss="";
?>
      <tr>
        <td width="15" height="26" align="right" ><img src="../img/banner/icon.jpg" width="6" height="12" align="absmiddle"></td>
        <td width="139" onMouseOver="MM_showHideLayers('submenu<?=$categoryint?>','','show');selectboxhidden();" onMouseOut="MM_showHideLayers('submenu<?=$categoryint?>','','hide');selectboxshow();" style='cursor:hand'>&nbsp;<a href="../product/product.php?category=<?=$row[category]?>"><?=$fontss?><?=$row[name]?></font></a></td>
      </tr>
      <tr>
        <td height="3" colspan="2" background="../img/banner/dot.jpg"></td>
      </tr>
<? }?>	
	</table></td>
</tr>
<!-------------------------------------subcategory----------->
<tr><td width=110 align=right>

<?
if(basename($PHP_SELF)=="main.php")$toplay = "355";
else $toplay = "310";
$squery =  DBquery("select * from category where category < 100 order by indexs asc");
while($srow=mysql_fetch_array($squery)){
	$categoryint = intval($srow[category]);
	$toplay +="29";
?>	
<div id='submenu<?=$categoryint?>' style='position:absolute;  top:<?=$toplay?>px; z-index:1; visibility: hidden;' onMouseOver="MM_showHideLayers('submenu<?=$categoryint?>','','show');selectboxhidden();" onMouseOut="MM_showHideLayers('submenu<?=$categoryint?>','','hide');selectboxshow();">
<table width="306" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td><img src="../img/category/sub01/top01.gif" width="15" height="3"></td>
    <td width="288"><img src="../img/category/sub01/top.gif" width="288" height="3"></td>
    <td><img src="../img/category/sub01/top02.gif" width="3" height="3"></td>
  </tr>
  <tr> 
    <td width="15" valign="top" background="../img/category/sub01/bg.gif"><table width="13" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="15">&nbsp;</td>
        </tr>
        <tr> 
          <td><img src="../img/category/sub01/icon.gif" width="15" height="11"></td>
        </tr>
      </table></td>
    <td align="center" bgcolor="#FFFFFF"><table border='0' cellspacing='0' cellpadding='0' width='270'>
        <tr> 
          <td height='10'></td>
        </tr>
        <tr> 
          <td height='21' align='left' background='../img/category/sub01/title_bg.gif'>&nbsp;<img src='../img/category/sub01/icon01.gif' alt='' width='10' height='10' align='absmiddle'><strong>&nbsp;<?=$srow[name]?></strong></td>
        </tr>
        <tr> 
          <td height='10'></td>
        </tr>
        <tr> 
          <td><table  border='0' cellspacing='0' cellpadding='0'>
              <tr> 
<?
$LIKE=substr($srow[category],-2);
$query =  DBquery("SELECT * FROM category WHERE category >= 100 AND category < 10000 AND category LIKE '%$LIKE' order by category asc");
$cn=0;
while($row=mysql_fetch_array($query)){
?>
                <td height='22' align='left' valign='middle'><table width='130'  border='0' cellpadding='0' cellspacing='0'>
                    <tr> 
                      <td width='11' valign='top'><img src='../img/category/sub01/icon_detail_point.gif' width='11' height='10' align='absmiddle'></td>
                      <td class='detail-cate-padding'><a href="../product/product.php?category=<?=$row[category]?>"><?=$row[name]?></a></td>
                    </tr>
                  </table></td>
<? if($cn%2)echo"</tr><tr>"; $cn++;?>
<? } ?>
              </tr>
            </table>
			</td>
        </tr>
      </table> 
	  </td>
    <td width="10" background="../img/category/sub01/bg01.gif">&nbsp;</td>
  </tr>
  <tr> 
    <td><img src="../img/category/sub01/bottom01.gif" width="15" height="3"></td>
    <td><img src="../img/category/sub01/bottom.gif" width="288" height="3"></td>
    <td><img src="../img/category/sub01/bottom02.gif"width="3" height="3"></td>
  </tr>
</table>
</div>
<? } ?>
  </td></tr>
<!-------------------------------------subcategory----------->

  <tr>
    <td><img src="../img/banner/p_lbot.jpg" width="180" height="8"></td>
  </tr>
</table>
