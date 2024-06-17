<?php
include("../include/session_config.php");
include("./check.php");
include("../include/config.php");
include("../include/function.php");
	if ($html=="yes") $comment=str_replace("\\","",$comment);
	else $comment=stripslashes(nl2br($comment));
	$url="http://topaircon.net/";
	$comment="<link href='${url}/css/vsun.css' rel='stylesheet' type='text/css'>
 <body>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td valign='top'><table width='578' border='0' align='center' cellpadding='0' cellspacing='0'>
        <tr>
          <td><img src='${url}/img/recommend/top.jpg' width='578' height='78'></td>
        </tr>
		<tr>
          <td height='60' align='center' background='${url}/img/recommend/bg_main.jpg'><br>
            <table width='560' border='0' cellspacing='0' cellpadding='1'>
              <tr> 
                <td bgcolor='#CCCCCC'>
				<table width='100%' border='0' cellspacing='0' cellpadding='5'>
                    <tr bgcolor='#FFFFFF'>
                      <td width='71%' align='center'><strong>${subject}</strong></td>
                      <td width='29%' align='center'><a href='http://topaircon.net/'><img src='${url}/img/recommend/bt_home.jpg' width='148' height='38' border='0'></a></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <br>
          </td>
        </tr>
        <tr>
          <td background='${url}/img/recommend/bg_main.jpg'><table width='560' border='0' align='center' cellpadding='1' cellspacing='0'>
              <tr> 
                <td bgcolor='#CCCCCC'><table width='100%' border='0' cellspacing='0' cellpadding='5'>
                    <tr bgcolor='#FFFFFF' valign=top height=200> 
                      <td>${comment}</td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <br>
          </td>
        </tr>
		               <tr> 
                <td><img src='${url}/img/recommend/copy.jpg' width='578' height='71'></td>
              </tr>
      </table></td>
  </tr>
</table>
";

	
	
	if ($name && $email) { // 특정개인메일
		$result=sendmail($ADMIN_NAME, $ADMIN_MAIL, $email, $comment, $subject);
		if ($result) error_close("메일이 정상적으로 보내졌습니다.");
		else echo ("<script>alert('메일서버에 이상이 있습니다. 서버관리자에게 문의하십시오.');</script>");	
	} 
	else if ($to=="all") { // 전체메일
	
		$comm="where mailcheck='y'";
		$result=DBquery("select email from users  $comm order by no desc");
		while ($row=mysql_fetch_array($result)) {
			$cnt++;
			sendmail($ADMIN_NAME, $ADMIN_MAIL, $row[email], $comment, $subject);
			echo "$cnt $row[email] <br>";
		}
			OnlyMsgView("메일 전송을 마칩니다.");
	
	}else{
		$comm="where mailcheck='y'";
		
		if($age1){
				$ag1=year_check($age1);
				if($age2){
					$ag2=year_check($age2);
					if($comm)$comm .="  and left(jumin,2) between '$ag2' and '$ag1'";
					else $comm .="where left(jumin,2) between '$ag2' and '$ag1'";
				}else{
					if($comm)$comm .="  and left(jumin,2)='$ag1'";
					else $comm .="where left(jumin,2)='$ag1'";
				}
		}if($address1){
				if(!$comm)$comm="where address1 like '$address1%'";
				else $comm .=" and address1 like '$address1%'";
		}if($concern){
				if(!$comm)$comm="where concern = '$concern'";
				else $comm .=" and concern = '$concern'";
		}
		$result=DBquery("select email from users  $comm  order by no desc");
		//echo "select email from $table  $comm  order by no desc";
		$cnt=0;
		while ($row=mysql_fetch_array($result)) {
			$cnt++;
			$query=sendmail($ADMIN_NAME, $ADMIN_MAIL, $row[email], $comment, $subject);
			if(!$query)echo "<font color=#ff0000>$cnt $row[email]</font> <br>";
			echo "$cnt $row[email] <br>";
		}
			echo ("전송이 완료되었습니다.");
	}
?>
<meta http-equiv='Content-Type' content='text/html; charset=euc-kr'>
<!--<script>window.close();</script>-->