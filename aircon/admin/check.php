<?
if(!$_SESSION[U_ID]){
echo "<script language='javascript'>
//alert('로그인후 이용하세요');
location.replace('../admin/securelogin.php');
</script>";
exit;
}
?>