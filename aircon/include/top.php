<?php
include "../include/session_config.php";
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td>
            <table width="890" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr> 
          <td width="175" height="50" valign=bottom><a href="../main/main.php"><img src="../img/common/logo.jpg" width="175" height="69" border="0"></a></td>
		  <td align=center valign=bottom><IMG SRC="../img/common/top_banner.gif" BORDER="0" ALT=""></td>
          <td align="right" valign="top" style=padding-top:10px><a href="../main/main.php">HOME</a> 
          <?php if(!isset($_SESSION['user_id'])){ ?>
            | <a href="../member/login.php">�α���</a>
			| <a href="../member/agree.php">ȸ������</a> 
<?php }else{?>
            | <a href="../member/logout.php">�α׾ƿ�</a>
			| <a href="../member/mem_mody.php">��������</a> 
<?php }?>
            | <a href="../basket/basket.php">��ٱ���</a> | <a href="../customer/customer.php">������</a> 
            | <a href="../mypage/mypage.php">�ֹ���ȸ</a> | <a href="../guide/guide.php">���ξȳ�</a></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td align="center" background="../img/common/menu_bg.jpg"><img src="../img/common/menu.jpg" width="890" height="45" border="0" usemap="#menu"></td>
        </tr>
      </table>
    
<map name="menu">
  <area shape="rect" coords="230,9,296,39" href="../product/e_product.php">
  <area shape="rect" coords="330,13,433,40" href="../product/b_product.php">
  <area shape="rect" coords="459,7,575,39" href="../as/as.php">
  <area shape="rect" coords="610,10,711,38" href="../as/cleaner.php">
  <area shape="rect" coords="742,11,838,35" href="../as/request.php">
</map>
