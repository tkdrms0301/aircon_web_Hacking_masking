<?php
include "../include/session_config.php";
include "../include/title.php";

// 비밀번호 복잡성 검토 함수
function checkPasswordComplexity($pwd) {
    $uppercase = preg_match('@[A-Z]@', $pwd);
    $lowercase = preg_match('@[a-z]@', $pwd);
    $numbering    = preg_match('@[0-9]@', $pwd);
    $specialChars = preg_match('@[^\w]@', $pwd);

    // 각 조건을 만족하는지 확인
    $length = strlen($pwd);
    $types = $uppercase + $lowercase + $numbering + $specialChars;

    if (($types >= 2 && $length >= 10) || ($types >= 3 && $length >= 8)) {
        return true;
    } else {
        return false;
    }
}

// 비밀번호 복잡성 검토
if (!checkPasswordComplexity($pwd)) {
    OnlyMsgView("비밀번호는 영문 대문자, 영문 소문자, 숫자, 특수문자 중 2종류 이상을 조합하여 최소 10자리 이상, 또는 3종류 이상을 조합하여 최소 8자리 이상이어야 합니다.");
    redirect($_SERVER["HTTP_REFERER"]);
    exit;
}

 // 필수 입력 항목 확인
 if (!isset($pwd) || trim($pwd) === '' ||
 !isset($jumin1) || trim($jumin1) === '' ||
 !isset($jumin2) || trim($jumin2) === '' ||
 !isset($name) || trim($name) === '' ||
 !isset($zip1) || trim($zip1) === '' ||
 !isset($zip2) || trim($zip2) === '' ||
 !isset($address1) || trim($address1) === '' ||
 !isset($email) || trim($email) === '') {
     OnlyMsgView("필수 입력 항목을 모두 입력해 주세요.");
     redirect($_SERVER["HTTP_REFERER"]);
     exit;
 }


$input['pass'] = $pwd;
$input['name'] = $name;
$input['jumin'] = $jumin1 . "-" . $jumin2;
$input['zip'] = $zip1 . "-" . $zip2;
$input['address1'] = $address1;
$input['address2'] = $address2;
if ($phone2) $input['tel'] = $phone1 . "-" . $phone2 . "-" . $phone3;
if ($hphone2) $input['cell'] = $hphone1 . "-" . $hphone2 . "-" . $hphone3;
$input['email'] = $email;
$input['mailcheck'] = $mailcheck;
$input['company'] = $company;
$input['bz_no'] = $bz_no1 . "-" . $bz_no2 . "-" . $bz_no3;
$input['comment'] = addslashes($comment);
$input['wdate'] = date('Y-m-d');

// 아이디 중복검사.
if (!isset($_SESSION['user_id'])) {
    $input['userid'] = $id;
    $row = DBarray("select userid from users where userid='$id'");
    if ($row[0]) {
        error_check("이미 아이디가 존재합니다. 아이디를 체크하세요.");
    }
    setInsert("users", $input);
} else {
    setUpdate("users", $input, "where userid='{$_SESSION['user_id']}'", 0);
}

mysql_close();

if (!isset($_SESSION['user_id'])) {
    OnlyMsgView("올바로 등록되었습니다.");
    echo ("<meta http-equiv='Refresh' content='0.0; URL=../main/main.php'>");
} else {
    OnlyMsgView("올바로 수정되었습니다.");
    echo ("<meta http-equiv='Refresh' content='0.0; URL=../mem/mem_mody.php'>");
}
?>
