<?php
include '../include/xss_filter.php';

$user_input = isset($_GET['content']) ? $_GET['content'] : '';
$sanitized_input = sanitize_input($user_input);
?>

<script>
function check_search(){
    var content = search_form.content.value;
    content = content.replace(/[<]/g, "&lt;").replace(/[>]/g, "&gt;");
    search_form.content.value = content;
    if (!search_form.content.value) {
        alert('검색어를 입력하세요.');
        search_form.content.focus();
        return false;
    }
    return true;
}
</script>
<table width="175" border="0" cellspacing="0" cellpadding="0">
    <tr> 
        <td align="center" valign="top">
        <!-- 제품검색 -->
        <?php
        //if(!$link_page)
        $link_page="../product/product.php";
        ?>
        <table width="175" border="0" cellspacing="0" cellpadding="0">
            <form name="search_form" method="get" action="<?= htmlspecialchars($link_page, ENT_QUOTES, 'EUC-KR') ?>" onsubmit="return check_search()">
            <input type="hidden" name="select" value="p_name">
            <tr>
                <td><img src="../img/banner/search_title.jpg" width="175" height="29"></td>
            </tr>
            <tr>
                <td align="center" valign="top" background="../img/banner/saerch_bg.jpg">
                    <input name="content" type="text" id="content" size="15" class="textbox1" value="<?= $sanitized_input ?>">
                    &nbsp;<input type="image" src="../img/banner/search_btn.jpg" width="49" height="18" border="0" align="absmiddle">
                </td>
            </tr>
            <tr>
                <td><img src="../img/banner/saerch_botm.jpg" width="175" height="8"></td>
            </tr>
            </form>
        </table>
        <!--- 제품검색 -->
        </td>
    </tr>
    <tr> 
        <td height="7"></td>
    </tr>
    <tr> 
        <td><img src="../img/main/brand.jpg" width="175" border="0" usemap="#brand"></td>
    </tr>
    <tr> 
        <td height="7"></td>
    </tr>
    <tr> 
        <td><img src="../img/main/bank.jpg" width="175" border="0" usemap="#bank"></td>
    </tr>
    <tr> 
        <td height="7"></td>
    </tr>
    <tr> 
        <td><img src="../img/banner/site.jpg" width="175" height="247" border="0" usemap="#banner"></td>
    </tr>
</table>
                
<map name="brand">
  <area shape="rect" coords="8,66,164,84" href="../product/b_product.php?brand=3">
  <area shape="rect" coords="10,92,167,115" href="../product/b_product.php?brand=1">
  <area shape="rect" coords="13,122,166,144" href="../product/b_product.php?brand=2">
  <area shape="rect" coords="13,155,166,174" href="../product/b_product.php?brand=4">
</map>
<map name="bank">
  <area shape="rect" coords="95,81,171,101" href="http://www.kbstar.com/" target="_blank">
  <area shape="rect" coords="98,121,173,148" href="http://www.wooribank.com/" target="_blank">
</map>
<map name="banner">
  <area shape="rect" coords="14,10,163,44" href="http://www.naver.com" target="_blank">
  <area shape="rect" coords="16,59,166,100" href="http://www.auction.co.kr/" target="_blank">
  <area shape="rect" coords="14,104,160,155" href="http://www.mple.com/" target="_blank">
  <area shape="rect" coords="13,160,167,197" href="http://www.gmarket.co.kr/" target="_blank">
  <area shape="rect" coords="12,204,160,244" href="http://www.gsestore.co.kr/" target="_blank">
</map>
