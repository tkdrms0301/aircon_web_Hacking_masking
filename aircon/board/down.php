<?php
  include "../include/session_config.php";
  include "../include/config.php";
  # 아래부터 다운로드 부분
  # file1 = 업로드시 올린 파일명 (test.zip)
  # sfile1 = 실제 서버에 들어가 있는 파일저장 장소 (directory 포함 - /home/test/www/data/test.zip)
  $query="select * from brd_".$board." where id='$id'";
  $result=DBquery($query);

  if($result) {
    $total=mysql_num_rows($result);

    # 파일 정보가 DB 에 있는지 체크
    if($total) {
      $row=mysql_fetch_array($result);
		  $file="../board/data/".$row[file1]; # 서버에 저장된 파일 정보
		  $dnfile=$row[file1_name]; # 사용자가 받아갈 파일명
			  if(!file_exists($file)){
				  echo "
					<script>
					window.alert('저장할 파일에 문제가 발생하였습니다.');
					history.back();
					</script>
				   ";
				exit;
			  }
    } else {
      echo "
            <script>
            window.alert('저장할 파일에 문제가 발생하였습니다.');
            history.back();
            </script>
           ";
      exit;
    } 
  } else {
    echo "
          <script>
          window.alert('DB Error');
          history.back();
          </script>
         ";
    # echo mysql_error();
    exit;
  }

$dn = "1"; // 1 이면 다운 0 이면 브라우져가 인식하면 화면에 출력 
$dn_yn = ($dn) ? "attachment" : "inline"; 
$bin_txt = "1";
$bin_txt = ($bin_txt) ? "r" : "rb"; 

if(eregi("(MSIE 5.0|MSIE 5.1|MSIE 5.5|MSIE 6.0)", $HTTP_USER_AGENT))
{ 
  if(strstr($HTTP_USER_AGENT, "MSIE 5.5")) 
  { 
    header("Content-Type: doesn/matter"); 
    Header("Content-Length: ".(string)(filesize("$file"))); 
    Header("Content-Disposition: filename=$dnfile");   
    Header("Content-Transfer-Encoding: binary");   
    Header("Pragma: no-cache");  
	Header("Cache-Control: cache, must-revalidate");
    Header("Expires: 0");   

  } 

  if(strstr($HTTP_USER_AGENT, "MSIE 5.0")) 
  { 
    Header("Content-type: file/unknown"); 
    header("Content-Disposition: attachment; filename=$dnfile"); 
    Header("Content-Description: PHP3 Generated Data"); 
    header("Pragma: no-cache"); 
	Header("Cache-Control: cache, must-revalidate");
    header("Expires: 0"); 
  } 

  if(strstr($HTTP_USER_AGENT, "MSIE 5.1")) 
  { 
    Header("Content-type: file/unknown"); 
    header("Content-Disposition: attachment; filename=$dnfile"); 
    Header("Content-Description: PHP3 Generated Data"); 
    header("Pragma: no-cache"); 
	Header("Cache-Control: cache, must-revalidate");
    header("Expires: 0"); 
  } 
  
  if(strstr($HTTP_USER_AGENT, "MSIE 6.0"))
  {
    Header("Content-type: application/x-msdownload"); 
    Header("Content-Length: ".(string)(filesize("$file")));   // 이부부을 넣어 주어야지 다운로드 진행 상태가 표시
    Header("Content-Disposition: attachment; filename=$dnfile");   
    Header("Content-Transfer-Encoding: binary");   
    Header("Pragma: no-cache");   
	Header("Cache-Control: cache, must-revalidate");
    Header("Expires: 0");   
  }
} else { 
  Header("Content-type: file/unknown");     
  Header("Content-Length: ".(string)(filesize("$file"))); 
  Header("Content-Disposition: $dn_yn; filename=$dnfile"); 
  Header("Content-Description: PHP3 Generated Data"); 
  Header("Pragma: no-cache"); 
  Header("Cache-Control: cache, must-revalidate");
  Header("Expires: 0"); 
} 

if (is_file("$file")) { 
  $fp = fopen("$file", "rb"); 

  if (!fpassthru($fp))
    fclose($fp); 

} else { 
  echo "해당 파일이나 경로가 존재하지 않습니다."; 
} 
?>