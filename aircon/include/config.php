<? 
// ����Ÿ���̽��� �����մϴ�.
$host_name=""; 
$user_name="";   
$db_name="";        
$db_password="";   
 
 
//���� ���� ����
$msg="����Ÿ���̽� ������ �ȵǾ����ϴ�. �ý��� �����ڿ��� �����ϼ���.";

$connect=@mysql_connect($host_name, $user_name, $db_password);  
@mysql_select_db($db_name, $connect) or die("<font color='#c60000'>$msg</font>");

// Error handling function
function handleError() {
    echo "<html></html>";
    exit;
}

// mysql_query function
function DBquery($qry)
{
    global $connect;
    $result = @mysql_query($qry, $connect);
    if (!$result) {
        handleError();
    }
    return $result;
}

// mysql_fetch_array function
function DBarray($qry)
{
    global $connect;
    $result = @mysql_query($qry, $connect);
    if (!$result) {
        handleError();
    }
    return mysql_fetch_array($result);
}

// mysql_fetch_array function Test
function DBarrayTest($qry, $params)
{
    global $connect;
    foreach ($params as &$param) {
        $param = mysql_real_escape_string($param, $connect);
    }
    $qry = vsprintf($qry, $params);
    $result = @mysql_query($qry, $connect);
    if (!$result) {
        handleError();
    }
    return mysql_fetch_array($result);
}

// mysql_affected_rows function
function DBaffected($qry)
{
    global $connect;
    $result = @mysql_query($qry, $connect);
    if (!$result) {
        handleError();
    }
    return mysql_affected_rows();
}

function setSelect($table, $field="*", $query_option="",$type="1") {
	
	$query = "select $field from $table $query_option";
	if($type=="1"){
		return DBarray($query);
	}else{
		return DBquery($query);
	}

}
function getTotalCount($table, $field="id", $query_option="") {

	$query = "select count($field) from $table $query_option";
	$row=DBarray($query);
	$total = $row[0];

	return $total;

}

function setInsert($table, $input) {
	//�迭�� key���� val���� �̿��Ͽ� ������ �����.
	$i = 0;
	while (list($key,$val)=each($input)) {
		if($i == 0) {
			$inputKey = $key;
			$inputVal = "'$val'";
		} else {
			$inputKey .= ", $key";
			$inputVal .= ", '$val'";
		}
		$i++;
	}
	$query = "insert into $table ($inputKey) values ($inputVal)";
	$result = DBquery($query);
	if($result) {
				return $result;
				echo "insert into $table ($inputKey) values ($inputVal)<br>";
	}
	else echo "insert into $table ($inputKey) values ($inputVal)";
}


function setUpdate($table, $input, $query_option="", $type=0) {
	//�迭�� key���� val���� �̿��Ͽ� ������ �����.
	if($type == 0) {
		$i = 0;
		while (list($key,$val)=each($input)) {
			if($i == 0) {
				$inputVal = "$key = '$val'";
			} else {
				$inputVal .= ", $key = '$val'";
			}
			$i++;
		}
	} else {
		$inputVal = $input;
	}
	$query = "update $table set $inputVal $query_option";
	$result = DBquery($query);
	return $result;

}
?>
