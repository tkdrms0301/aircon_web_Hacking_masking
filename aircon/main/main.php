<html>
<head>
<? include ("../include/title.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" href="../css/vsun.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin=0 topmargin=0>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? include ("../include/top.php"); ?></td>
  </tr>
  <tr>
    <td>
      <table width="890" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td width="175" valign="top"></td>
          <td height="10"></td>
        </tr>
        <tr> 
          <td width="175" valign="top"> 
            <table width="175" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td><? include ("../include/category.php"); ?></td>
              </tr>
              <tr> 
                <td height="7"></td>
              </tr>
              <tr> 
                <td><? include ("../include/left_banner.php"); ?></td>
              </tr>
            </table>
          </td>
          <td valign="top" align="right"> 
            <table width="699" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="520" valign="top">
				 <table width="520" border="0" cellpadding="0" cellspacing="1" bgcolor="CFCFD0">
                    <tr>
                      <td align="center" bgcolor="#FFFFFF"><script>mEmbed("src=../swf/main.swf","width=518","height=207");</script></td>
                    </tr>
                  </table>
				  </td>
                <td width="6"></td>
                <td valign="top"> 
                  <table width="173" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td>
					  <?include "event.php";?>
					  </td>
                    </tr>
                    <tr> 
                      <td height="10"></td>
                    </tr>
                    <tr> 
                      <td><img src="../img/main/img_banner1.jpg" width="173" border="0" usemap="#main_ban"></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr> 
                <td height="12"></td>
                <td height="12"></td>
                <td height="12"></td>
              </tr>
              <tr> 
                <td colspan="3"><img src="../img/main/img_bottom_pro.jpg" width="699" height="195" border="0" usemap="#hit"></td>
              </tr>
              <tr> 
                <td height="12"></td>
                <td height="12"></td>
                <td height="12"></td>
              </tr>
              <tr> 
                <td valign="top"> 
                  
<? include "hit_pro.php";?>
                </td>
                <td>&nbsp;</td>
                <td valign="top"><a href="../product/old_product.php"><img src="../img/main/hit_side.jpg" width="173" height="220" border="0"></a></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td colspan="3"><img src="../img/main/brand_1.jpg" width="699" height="52" border="0" usemap="#brand01"></td>
              </tr>
              <tr> 
                <td height="12"></td>
                <td height="12"></td>
                <td height="12"></td>
              </tr>
              <tr> 
                <td valign="top"> 
<? include "main_pro.php";?>                  
                </td>
                <td>&nbsp;</td>
                <td valign="top"> 
<? include "recom_pro.php";?>                  
                </td>
              </tr>
              <tr> 
                <td height="12"></td>
                <td height="12"></td>
                <td height="12"></td>
              </tr>
              <tr> 
                <td colspan="3"><img src="../img/main/promotion.jpg" width="699" height="92" border="0" usemap="#event"></td>
              </tr>
              <tr> 
                <td height="12"></td>
                <td height="12"></td>
                <td height="12"></td>
              </tr>
              <tr> 
                <td colspan="3">
                  <table width="699" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="228" valign="top">
<? include "qna.php";?>                        
                      </td>
                      <td width="17">&nbsp;</td>
                      <td width="228" valign="top">
<? include "customer01.php";?>
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td width="16">&nbsp;</td>
                      <td valign="top"><a href="../as/as.php"><img src="../img/main/price.jpg" width="210" height="113" border="0"></a></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td><? include ("../include/copyright.php"); ?></td>
  </tr>
</table>
<map name="event">
  <area shape="rect" coords="262,10,454,87" href="../product/e_product.php?brand=1">
  <area shape="rect" coords="479,10,694,83" href="../product/e_product.php?brand=2">
  <area shape="rect" coords="7,16,224,74" href="../product/e_product.php?brand=3">
</map>
<map name="brand01" id="brand01">
  <area shape="rect" coords="368,8,470,46" href="../product/b_product.php?brand=1">
  <area shape="rect" coords="527,7,665,45" href="../product/b_product.php?brand=2">
  <area shape="rect" coords="213,5,302,45" href="../product/b_product.php?brand=3">
  <!--<area shape="rect" coords="557,8,690,43" href="../product/b_product.php?brand=4">-->
</map>
<map name="hit">
  <area shape="rect" coords="17,16,141,176" href="/product/product.php?category=000001">
  <area shape="rect" coords="163,19,280,176" href="/product/product.php?category=000002">
  <area shape="rect" coords="433,17,554,179" href="/product/product.php?category=000004">
  <area shape="rect" coords="565,21,689,177" href="/product/product.php?category=000005">
  <area shape="rect" coords="295,18,416,177" href="/product/product.php?category=000003">
</map>
<map name="main_ban">
  <area shape="rect" coords="7,60,144,83" href="../as/as.php">
  <area shape="rect" coords="10,89,143,112" href="../as/cleaner.php">
</map>
</body>
</html>
