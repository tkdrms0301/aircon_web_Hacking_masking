<?php
include "../include/session_config.php";
include "../include/title.php";

// ��й�ȣ ���⼺ ���� �Լ�
function checkPasswordComplexity($pwd) {
    $uppercase = preg_match('@[A-Z]@', $pwd);
    $lowercase = preg_match('@[a-z]@', $pwd);
    $numbering    = preg_match('@[0-9]@', $pwd);
    $specialChars = preg_match('@[^\w]@', $pwd);

    // �� ������ �����ϴ��� Ȯ��
    $length = strlen($pwd);
    $types = $uppercase + $lowercase + $numbering + $specialChars;

    if (($types >= 2 && $length >= 10) || ($types >= 3 && $length >= 8)) {
        return true;
    } else {
        return false;
    }
}

// ��й�ȣ ���⼺ ����
if (!checkPasswordComplexity($pwd)) {
    OnlyMsgView("��й�ȣ�� ���� �빮��, ���� �ҹ���, ����, Ư������ �� 2���� �̻��� �����Ͽ� �ּ� 10�ڸ� �̻�, �Ǵ� 3���� �̻��� �����Ͽ� �ּ� 8�ڸ� �̻��̾�� �մϴ�.");
    redirect($_SERVER["HTTP_REFERER"]);
    exit;
}

 // �ʼ� �Է� �׸� Ȯ��
 if (!isset($pwd) || trim($pwd) === '' ||
 !isset($jumin1) || trim($jumin1) === '' ||
 !isset($jumin2) || trim($jumin2) === '' ||
 !isset($name) || trim($name) === '' ||
 !isset($zip1) || trim($zip1) === '' ||
 !isset($zip2) || trim($zip2) === '' ||
 !isset($address1) || trim($address1) === '' ||
 !isset($email) || trim($email) === '') {
     OnlyMsgView("�ʼ� �Է� �׸��� ��� �Է��� �ּ���.");
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

// ���̵� �ߺ��˻�.
if (!isset($_SESSION['user_id'])) {
    $input['userid'] = $id;
    $row = DBarray("select userid from users where userid='$id'");
    if ($row[0]) {
        error_check("�̹� ���̵� �����մϴ�. ���̵� üũ�ϼ���.");
    }
    setInsert("users", $input);
} else {
    setUpdate("users", $input, "where userid='{$_SESSION['user_id']}'", 0);
}

mysql_close();

if (!isset($_SESSION['user_id'])) {
    OnlyMsgView("�ùٷ� ��ϵǾ����ϴ�.");
    echo ("<meta http-equiv='Refresh' content='0.0; URL=../main/main.php'>");
} else {
    OnlyMsgView("�ùٷ� �����Ǿ����ϴ�.");
    echo ("<meta http-equiv='Refresh' content='0.0; URL=../mem/mem_mody.php'>");
}
?>
