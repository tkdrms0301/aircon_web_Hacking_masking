<?php
include "../include/title.php"; 
include '../include/session_config.php';
include '../include/xss_filter.php';


$input = array(
    'orderno' => sanitize_input($orderno),
    'price' => sanitize_input($TOTALPRICE),
    'point' => sanitize_input($TOT_POINT),
    'product' => $PRODUCT,
    'userid' => $_SESSION['user_id']
);

if ($mypoint && $_SESSION['user_id'] && $_SESSION['user_name']) {
    $input['use_point'] = sanitize_input($mypoint);
    ########point use#######
    $pinput = array(
        'order_no' => $orderno,
        'userid' => $_SESSION['user_id'],
        'product' => $PRODUCT,
        'point' => sanitize_input($mypoint * -1),
        'reason' => "포인트구매",
        'wdate' => date('Y-m-d')
    );

    $row = DBarray("select * from point where order_no='$orderno'");
    if ($row[0]) {
        $insert = setUpdate("point", $pinput, "where order_no='$orderno'");
    } else {
        $insert = setInsert("point", $pinput);
    }
    ########point use#######
}

// 사용자정보
$input['name'] = sanitize_input($name);
$input['email'] = sanitize_input($email);
$input['tel'] = sanitize_input("$tel1-$tel2-$tel3");
$input['cell'] = sanitize_input("$cell1-$cell2-$cell3");
$input['juso'] = sanitize_input("[$zip1-$zip2] $juso1 $juso2");
$input['rname'] = sanitize_input($rname);
$input['remail'] = sanitize_input($remail);
$input['rtel'] = sanitize_input("$rtel1-$rtel2-$rtel3");
$input['rcell'] = sanitize_input("$rcell1-$rcell2-$rcell3");
$input['rjuso'] = sanitize_input("[$rzip1-$rzip2] $rjuso1 $rjuso2");
$input['comment'] = addslashes(sanitize_input($comment));

###### 세금계산서추가 ######
$input['tax'] = sanitize_input($tax);
$input['bz_no'] = sanitize_input("$bz1-$bz2-$bz3");
$input['companyname'] = sanitize_input($companyname);
$input['name2'] = sanitize_input($name2);
$input['bz_zip'] = sanitize_input("$bz_zip1-$bz_zip2");
$input['bz_juso1'] = sanitize_input($bz_juso1);
$input['bz_juso2'] = sanitize_input($bz_juso2);
$input['upjong'] = sanitize_input($upjong);
$input['uptae'] = sanitize_input($uptae);
###### 세금계산서추가 ######

// 입금정보
$input['bank'] = sanitize_input($bank);
$input['paymethod'] = sanitize_input($paymethod);
$input['ordertype'] = sanitize_input($ordertype); // c=cart, b=bargain, p=point
$input['state'] = 1;
$input['wdate'] = date('Y-m-d H:i:s');

$row = DBarray("select * from orders where orderno='$orderno'");
if ($row[0]) {
    $insert = setUpdate("orders", $input, "where orderno='$orderno'");
} else {
    $insert = setInsert("orders", $input);
}

if ($insert) {
    // cartid 세션 변수 비우기
    unset($_SESSION['cartid']);
    redirect1("orderInfo.php?orderno=$orderno");
}

?>
