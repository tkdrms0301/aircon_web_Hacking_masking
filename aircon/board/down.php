<?php
  include "../include/session_config.php";
  include "../include/config.php";
  # �Ʒ����� �ٿ�ε� �κ�
  # file1 = ���ε�� �ø� ���ϸ� (test.zip)
  # sfile1 = ���� ������ �� �ִ� �������� ��� (directory ���� - /home/test/www/data/test.zip)
  $query="select * from brd_".$board." where id='$id'";
  $result=DBquery($query);

  if($result) {
    $total=mysql_num_rows($result);

    # ���� ������ DB �� �ִ��� üũ
    if($total) {
      $row=mysql_fetch_array($result);
		  $file="../board/data/".$row[file1]; # ������ ����� ���� ����
		  $dnfile=$row[file1_name]; # ����ڰ� �޾ư� ���ϸ�
			  if(!file_exists($file)){
				  echo "
					<script>
					window.alert('������ ���Ͽ� ������ �߻��Ͽ����ϴ�.');
					history.back();
					</script>
				   ";
				exit;
			  }
    } else {
      echo "
            <script>
            window.alert('������ ���Ͽ� ������ �߻��Ͽ����ϴ�.');
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

$dn = "1"; // 1 �̸� �ٿ� 0 �̸� �������� �ν��ϸ� ȭ�鿡 ��� 
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
    Header("Content-Length: ".(string)(filesize("$file")));   // �̺κ��� �־� �־���� �ٿ�ε� ���� ���°� ǥ��
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
  echo "�ش� �����̳� ��ΰ� �������� �ʽ��ϴ�."; 
} 
?>