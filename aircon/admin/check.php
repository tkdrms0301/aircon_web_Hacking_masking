<?
if(!$_SESSION[U_ID]){
echo "<script language='javascript'>
//alert('�α����� �̿��ϼ���');
location.replace('../admin/securelogin.php');
</script>";
exit;
}
?>