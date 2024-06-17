<?php
include "../include/session_config.php";
	include ("check.php");
	include "../include/config.php";
	include "../include/function.php";

?>
<html>
<head>
<title>::  :: 관리자모드</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" href="../css/vsun.css" type="text/css">
<script language="JavaScript">
<!--
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
// -->

function MM_findObj(n, d) { //v4.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}

function MM_showHideLayers() { //v3.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v='hide')?'hidden':v; }
    obj.visibility=v; }
}

function nalog(){
        window.open('http://www.hbom.co.kr/nalog505/admin_counter.php?counter=hbom','','width=700,height=600,scrollbars=yes');
}
//-->
</script>
<script type="text/javascript">
<!--
	function loginform_bgChange(obj, act) {
		if ( act == 'F') {
			obj.className = 'textbox1';
			obj.style.backgroundColor='#ffffff';
		} else {
			obj.className = 'textbox2';
			obj.style.backgroundColor='#F2F2F2';	
		}			
	}
//-->
</script>
</head>
<body bgcolor="#FFFFFF" text="#000000" leftmargin=0 topmargin=0>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td height="6" bgcolor="#82C9D2"></td>
  </tr>
  <tr> 
    <td> 
      <table width="900" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="50%"><IMG SRC="./img/admin_logo.gif" WIDTH="171" HEIGHT="60" BORDER="0" ALT=""></td>
          <td align="right" valign="bottom" width="50%" height="60"><A HREF="admin_process.php?mode=logout"><img src="img/logout.jpg" width="96" height="27"></A>

		  </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td bgcolor="#979797"> 
      <table width="920" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="170"><img src="img/top1.jpg" width="170" height="46"></td>
          <td bgcolor="#979797"> 
            <table width="730" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr> 
                <td width="12%" align="center"><b><a href='order_list.php'><b><font color="#FFFFFF">주문관리</a></font></b></td>
                <td width="5" align="center"><img src="img/bar.jpg" height="21"></td>
                <td width="12%" align="center"><b><a href='product_list.php'><b><font color="#FFFFFF">상품관리</a></font></b></td>
                <td width="5" align="center"><img src="img/bar.jpg" height="21"></td>
                <td width="12%" align="center"><b><a href='member_list.php'><b><font color="#FFFFFF">회원관리</a></font></b></td>
                <td width="5" align="center"><img src="img/bar.jpg" height="21"></td>
				<td width="12%" align="center"><b><a href='community.php?board=news'><b><font color="#FFFFFF">이벤트NEWS</a></font></b></td>
                <td width="5" align="center"><img src="img/bar.jpg" height="21"></td>
				<td width="12%" align="center"><b><a href='online_list.php'><b><font color="#FFFFFF">무료견적</a></font></b></td>
                <td width="5" align="center"><img src="img/bar.jpg" height="21"></td>
				<td width="12%" align="center"><b><a href='board.php?board=qna'><b><font color="#FFFFFF">고객센터</a></font></b></td>
                <td width="5" align="center"><img src="img/bar.jpg" height="21"></td>
				<td width="12%" align="center"><b><a href='homepageinfo.php'><b><font color="#FFFFFF">관리자정보</a></font></b></td>
                <td width="5" align="center"><img src="img/bar.jpg" height="21"></td>

              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td bgcolor="#F2F2F2" height="10"></td>
  </tr>
  <tr>
    <td> 
      <table width="900" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="170" bgcolor="#F3F9FA" valign="top" height="400"> 
<!-------------------------------------------------->
<? 
if(substr(basename($PHP_SELF),0,6)=="order_"){
		include "left_order.php";
}
if(substr(basename($PHP_SELF),0,7)=="product" || substr(basename($PHP_SELF),0,8)=="category" ){
		include "left_product.php";
}if(basename($PHP_SELF)=="member_list.php" ||  substr(basename($PHP_SELF),0,5)=="point"){
		include "left_member.php";
}if(basename($PHP_SELF)=="community.php"){
		include "left_community.php";
}if(basename($PHP_SELF)=="board.php"){
		include "left_board.php";
}if(basename($PHP_SELF)=="market.php" || basename($PHP_SELF)=="market_regi.php" || basename($PHP_SELF)=="market_detail.php"){
		include "left_market.php";
}if(basename($PHP_SELF)=="homepageinfo.php"){
		include "left_homepageinfo.php";
}if(basename($PHP_SELF)=="online_list.php"){
		include "left_online.php";
}

?>
<!----------------------------------------->