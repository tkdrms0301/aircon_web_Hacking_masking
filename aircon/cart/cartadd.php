<?php
	include("../include/config.php");
	include("../include/function.php");
	include("../include/session_config.php");

	$pcode=mysql_real_escape_string($pcode);
	str_replace(" ","",$pcode);
	str_replace("-","",$pcode);
	str_replace("(","",$pcode);
	str_replace(")","",$pcode);
	str_replace("/","",$pcode);
	str_replace("\\","",$pcode);
	str_replace(".","",$pcode);
	str_replace(",","",$pcode);
	str_replace(";","",$pcode);
	str_replace("=","",$pcode);
	if (!ctype_digit($pcode)) {
		// 숫자가 아닌 경우 경고 메시지를 표시하고 뒤로 가기
		echo "<script>
		alert('잘못된 상품 번호입니다.');
		window.history.back();
		</script>";
	}

	$p_row=DBarray("select p_code  from products where p_code ='$pcode' limit 0,1");

	if(!$p_row[0]){
		echo "<script>
		window.alert('상품코드를 확인해주세요');
		window.history.back();
		</script>";
	}

	
	if($option1){
		$option1=trim($option1);
		if($option2){
			$option2=trim($option2);
			$option=$option1.",".$option2;
		}
		else $option=$option1;
	}
	
	$option=mysql_real_escape_string($option);
	$row = DBarray("select * from cart where cartid='" . $_SESSION['cartid'] . "' and p_code='$pcode' and p_option='$option'");
	if ($row[c_id]) {	//있는물건인가 확인
		DBquery("update cart set p_count=p_count + $order_count,p_totalprice=p_totalprice+($row[p_price]*$order_count) where c_id='${row[c_id]}'");
	}else{
		$f_rs = DBarray("select * from products where p_code = '$pcode'");
		$date = time();
		$rem=sprintf("%03d",array_pop(explode(".",$REMOTE_ADDR)));

		$temp = $date.$rem;
		if (!isset($_SESSION['cartid'])) {
			$cartid = $temp;
			$_SESSION['cartid'] = $cartid;
		}
$input[cartid]=$cartid;
$input[p_code]=$f_rs[p_code];
$input[p_name]=$f_rs[p_name];
$input[p_price]=$f_rs[p_price];
$input[p_option]=$option;
$input[p_count]=$order_count;
$input[p_totalprice]=$order_count*$f_rs[p_price];
$input[i_id]=0;
$input[regdate]=date('Y-m-d h:i:s');

						setInsert("cart",$input);
		
		
	}
			if($dirct=="yes")redirect("../order/order.php");
			else if($dirct=="off") echo "<script>window.opener.location.reload();self.close();</script>";
			else if ($dirct=="basket")redirect("../basket/basket.php");
			else redirect($_SERVER[ "HTTP_REFERER" ]);


?>