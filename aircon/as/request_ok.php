<?
include "../include/title.php";
$input[category]=$category1;
$input[name]=$name;
$input[in_date]=$in_date;

if($phone2)$input[tel]=$phone1."-".$phone2."-".$phone3;
if($hphone2)$input[cell]=$hphone1."-".$hphone2."-".$hphone3;
$input[zip]=$zip1."-".$zip2;
$input[address1]=$address1;
$input[address2]=$address2;
$input[email]=$email;
$input[comment]=addslashes($comment);
$input[wdate]=date('Y-m-d');
			

	setInsert("request", $input);
	mysql_close();
	OnlyMsgView("신청 되었습니다.");

	echo ("<meta http-equiv='Refresh' content='0.0; URL=../main/main.php'>");
?>