<?
	
  $host="";	      // 데이타베이스 서버 주소 (같은서버일경우 : )
  $user="";				      // 데이타베이스 접속 아이디
  $passwd="";			        // 데이타베이스 접속 비밀번호
  $dataname="";			// 데이타베이스 명

  $dbp = @mysql_connect($host,$user,$passwd);  //데이타베이스 접속
  @mysql_select_db($dataname,$dbp) or die("db connect err");

  $address = mysql_real_escape_string($address);
  $address = preg_replace('/[\s\-()\/\\.\\,;=%#&|!]/', '', $address);

  if ($mode == "find"){
    $query = " SELECT zipcode, zipaddr, street FROM zipcodes WHERE (zipaddr LIKE '%" .$address. "%') order by zipaddr";
    $result = mysql_query($query);
    $total = mysql_num_rows($result);

    if ($total > 0){
      $found = "on";
    }else{
      echo ("<script>alert('입력하신 정보와 일치하는 주소가 없습니다.');</script>");	
      meta_read("zipcode.php");    
    }   
  }    

  function meta_read($home,$second="0") {
    echo ("<meta http-equiv='Refresh' content='$second; URL=$home'>");
    exit;
  }
?>

<html>
<head>
<title>우편번호검색</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<script language="javascript">
<!--

function checkit()
{
   var z = document.form.address.value;
  
   if (z == "") 
   {
      alert("주소 중 동/읍/면의 이름을 입력하세요 ");
      document.form.address.focus();
      return;
   } 
   document.form.submit();
}

function select_zipcode(sel) 
{
	var addr = sel.options[sel.selectedIndex].value;
	var addr_arr = addr.split("^");

	document.form.addr1.value = addr_arr[0];
	document.form.addr2.value = addr_arr[1].substring(0, 3);
	document.form.addr3.value = addr_arr[1].substring(3, 6);
}

function selected()
{
	window.opener.myform.address1.value = form.addr1.value ;  
	window.opener.myform.zip1.value = form.addr2.value ;  
	window.opener.myform.zip2.value = form.addr3.value ;  
	window.opener.myform.address2.focus();
	self.close();
}
-->
</script>
</head>
<body bgcolor="white" text="black" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?
	if ($mode == "find"){
?>  
<form name="form" method="post" enctype="multipart/form-data" action="<? echo("$PHP_SELF?mode=found"); ?>" >
<?
	}else{
?>
<form name="form" method="post" enctype="multipart/form-data" action="../member/zipcode.php?mode=find" >
<?
	}
?>
  <table border="0" cellpadding="0" cellspacing="0" width="500" height="249">
    <tr> 
      <td height="75" align="center"><img src="../img/member/search/zip.jpg" width="500" height="105">
      </td>
    </tr>
    <?
	if ($found != "on"){
?>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td align="center"><input type="text" name="address">
      <input type = button value="검색" onClick="javascript:checkit();"></td>
    </tr>
    <?
	}else if ($found == "on") {
?>
    <tr> 
      <td align="center"><font size="2" color="blue"><b><br>
        <? echo($address) ?> </b></td>
    </tr>
    <tr> 
      <td align="center"> <select name="myselect" onChange="select_zipcode(form.myselect)">
          <option>--- 주소를 선택하세요.--- 
          <?
		for ($i = 0 ; $i < $total ; $i++){
			$RS = mysql_fetch_array($result);
			$zip1 = substr($RS[zipcode],0,3);
			$zip2 = substr($RS[zipcode],3,6);
?>
          <option  value="<? echo($RS[zipaddr]."^".$RS[zipcode]) ?>" ><?echo($RS[zipaddr]." ".$RS[street]." [".$zip1."-".$zip2."]"); ?> 
          <?              
    	}
?>
        </select></td>
    </tr>
    <tr> 
      <td align="center"><br> <? echo($f) ?> <font color="maroon" size="2">주소를 
        선택하신 후에 '확인'을 클릭해 주세요.</font> <br></td>
    </tr>
    <?
	}
?>
    <input type="hidden" name="addr1">
    <input type="hidden" name="addr2">
    <input type="hidden" name="addr3"></td></tr>
    <tr> 
      <td align="center" style="padding-bottom:20px"><input type="image" onClick="javascript:selected();" src="../img/member/search/ok.jpg" width="71" height="26">
        &nbsp;<input type="image" onClick="javascript:self.close();" src="../img/member/search/cancel.jpg" width="71" height="26"></td>
    </tr>
	 <tr> 
      <td height="3" bgcolor="#86A32D"></td>
    </tr>
  </table>
</form>
</body>
</html>
