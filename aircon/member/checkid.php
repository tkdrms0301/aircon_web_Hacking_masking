<html>
<head>
<title>���̵� �ߺ�üũ</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" href="../css/vsun.css" type="text/css">
</head>
<body>
<center>
<br>
<?
	include ("../include/config.php");
	include ("../include/function.php");

  if (preg_match('/[\s\-()\/\\.\\,;=%#&|!]/', $id)) {
    echo "<script>
      alert('Ư�����ڰ� ���Ե� �߸��� ���̵��Դϴ�.');
      window.history.back();
      </script>";
    exit;
  }
  
  $id=mysql_real_escape_string($id);
	$row=DBarray("select userid from users where userid='$id'");
			
	if ($row[0]) {
    ?>
      <font size="2"> 
      <?=$id?>
      <img src="../img/member/noon.jpg" width="19" height="21" align="absbottom"> 
      <br>
      <img src="../img/member/already.jpg" width="135" height="21"> <br>
      </font> 
    <?
	} else{ //ȸ�������� �Ǿ� ���� �ʴ� ���̵�
    ?>
      <font size="2"> 
      <?=$id?>
      <img src="../img/member/noon.jpg" width="19" height="21" align="absbottom"> 
      <br>
      <img src="../img/member/call.jpg" width="127" height="21"> <br>
      </font> 
    <?
	}
?>
  <br>
  <a href="javascript:window.close();"><img src="../img/member/close.jpg" border="0" width="70" height="26"></a>
</center>
</body>
</html>