<?php

include "../include/session_config.php";
include "../admin/head.php";

function sanitize_input($input) {
    return htmlspecialchars($input, ENT_QUOTES, 'EUC-KR');
}

if(isset($_POST['resaletype']) && isset($_POST['p_code'])){
    DBquery("update products set saletype='".sanitize_input($_POST['resaletype'])."' where p_code='".sanitize_input($_POST['p_code'])."'");
}
if(isset($_POST['rep_indexs']) && isset($_POST['p_code'])){
    DBquery("update products set p_indexs='".sanitize_input($_POST['rep_indexs'])."' where p_code='".sanitize_input($_POST['p_code'])."'");
}
if(isset($_POST['resaletype3']) && isset($_POST['p_code'])){
    $plus_row=DBarray("select plus01 from products where p_code='".sanitize_input($_POST['p_code'])."'");
    if($plus_row[0]=="y") DBquery("update products set plus01='n' where p_code='".sanitize_input($_POST['p_code'])."'");
    else DBquery("update products set plus01='y' where p_code='".sanitize_input($_POST['p_code'])."'");
}
if(isset($_POST['resaletype4']) && isset($_POST['p_code'])){
    $plus_row=DBarray("select plus02 from products where p_code='".sanitize_input($_POST['p_code'])."'");
    if($plus_row[0]=="y") DBquery("update products set plus02='n' where p_code='".sanitize_input($_POST['p_code'])."'");
    else DBquery("update products set plus02='y' where p_code='".sanitize_input($_POST['p_code'])."'");
}
if(isset($_POST['resaletype5']) && isset($_POST['p_code'])){
    $naver_yn=DBarray("select naver_yn from products where p_code='".sanitize_input($_POST['p_code'])."'");
    if($naver_yn[0]=="y") DBquery("update products set naver_yn='n' where p_code='".sanitize_input($_POST['p_code'])."'");
    else DBquery("update products set naver_yn='y' where p_code='".sanitize_input($_POST['p_code'])."'");
}
?>
<script language="javascript">
function product_del(url){
    a=confirm("��ǰ�� ���� �Ͻðڽ��ϱ�?");
    if(a == true){
        location.replace(url);
    }else{
        return;
    }
}
</script>
<script>
function saletype(p_code,resaletype){ 
    location.replace("<?=$PHP_SELF?>?offset=<?=sanitize_input($offset)?>&category=<?=sanitize_input($category)?>&select=<?=sanitize_input($select)?>&content=<?=sanitize_input($content)?>&p_code="+p_code+"&resaletype="+resaletype);
}
function p_indexs(p_code,rep_indexs){
    location.replace("<?=$PHP_SELF?>?offset=<?=sanitize_input($offset)?>&category=<?=sanitize_input($category)?>&select=<?=sanitize_input($select)?>&content=<?=sanitize_input($content)?>&p_code="+p_code+"&rep_indexs="+rep_indexs);
}
function saletype3(p_code,resaletype3){
    location.replace("<?=$PHP_SELF?>?offset=<?=sanitize_input($offset)?>&category=<?=sanitize_input($category)?>&select=<?=sanitize_input($select)?>&content=<?=sanitize_input($content)?>&p_code="+p_code+"&resaletype3="+resaletype3);
}
function saletype4(p_code,resaletype4){
    location.replace("<?=$PHP_SELF?>?offset=<?=sanitize_input($offset)?>&category=<?=sanitize_input($category)?>&select=<?=sanitize_input($select)?>&content=<?=sanitize_input($content)?>&p_code="+p_code+"&resaletype4="+resaletype4);
}
function saletype5(p_code,resaletype5){
    location.replace("<?=$PHP_SELF?>?offset=<?=sanitize_input($offset)?>&category=<?=sanitize_input($category)?>&select=<?=sanitize_input($select)?>&content=<?=sanitize_input($content)?>&p_code="+p_code+"&resaletype5="+resaletype5);
}
</script>
<script>
function saletype_list(saletype){
    location.replace("<?=$PHP_SELF?>?category=<?=sanitize_input($category)?>&select=<?=sanitize_input($select)?>&content=<?=sanitize_input($content)?>&saletype="+saletype);
}
</script>

<table width=900 cellpadding=0 cellspacing=0 border=0>
    <tr>
        <td width=100% valign=top>
            <table cellpadding="4" cellspacing="0" border="0" width="100%">
                <tr><td><b>�� �з�</b></td></tr>
                <tr><td height="1" bgcolor="#f2f2f2"></td></tr>
            </table>
            <table cellpadding="0" cellspacing="5" border="0" width="100%">
            <tr>
              <td>
<?

$query = DBquery("select * from category where category < 100 ");
while($row=mysql_fetch_array($query)){
    if(substr($category,-2)==substr($row['category'], -2)) $fontcolor="<font color=#ff0000><b>";
    else $fontcolor="";
?>
  <a href="<?=$PHP_SELF?>?category=<?=sanitize_input($row['category'])?>"><?=$fontcolor?><?=sanitize_input($row['name'])?></b></font></a> | 
<? }?>
                    
              </td>
            </tr>
            </table>

            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr><td height="1" bgcolor="#f2f2f2"></td></tr>
            </table>
            <!--------------- L category Show --------------------------->
<!--------------- M and S category Show -------------------------->
            <? if($category >= 1):?>
            <table cellpadding="4" cellspacing="0" border="0" width="100%">
                <tr><td><B>�� 2���з�</B></td></tr>
                <tr><td height="1" bgcolor="#f2f2f2"></td></tr>
            </table>

            <!------- midcode and Lcategory Image Show --------------------------->
            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                    <td colspan=2>
                        <table cellspacing=0 cellpadding=5 border=0 width=100%>
                            <tr>
                                <td valign=middle width=100% bgcolor="ffffff">
<?
if($category): /* ��ü if�� ���� */
$LIKE=substr($category,-2);
$BOLD = substr($category, -4);
$query = DBquery("SELECT * FROM category WHERE category >= 100 AND category < 10000 AND category LIKE '%$LIKE' order by category asc");
while($row=mysql_fetch_array($query)){
    if(substr($category,-4)==substr($row['category'], -4)) $fontcolor="<font color=#ff0000><b>";
    else $fontcolor="";
?>
   <a href="<?=$PHP_SELF?>?category=<?=sanitize_input($row['category'])?>"><?=$fontcolor?><?=sanitize_input($row['name'])?></b></font></a> |  

<? 
    ########## �ߺз� ���� #########################################
}
endif;
?>
                                
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>        
            </table>

            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr><td height="1" bgcolor="#f2f2f2"></td></tr>
            </table>
<? endif; if($category >= 100):?>
            <!--------------- M and S category Show ------------------------>

            <table cellpadding="4" cellspacing="0" border="0" width="100%">
                <tr><td><B>�� 3���з�</B></td></tr>
                <tr><td height="1" bgcolor="#f2f2f2"></td></tr>
            </table>

            <!------- midcode and Lcategory Image Show ------------------------------>
            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                    <td colspan=2>
                        <table cellspacing=0 cellpadding=5 border=0 width=100%>
                            <tr>
                                <td valign=middle width=100% bgcolor="ffffff">
<?
if($category >= 100): /* ��ü if�� ���� */
$LIKE=substr($category,-4);
$query = DBquery("SELECT * FROM category WHERE category >= 10000 AND category < 1000000 AND category LIKE '%$LIKE' order by category asc");
while($row=mysql_fetch_array($query)){
    if(substr($category,-6)===substr($row['category'], -6)) $fontcolor="<font color=#ff0000><b>";
    else $fontcolor="";
?>
   <a href="<?=$PHP_SELF?>?category=<?=sanitize_input($row['category'])?>"><?=$fontcolor?><?=sanitize_input($row['name'])?></b></font></a> |  

<? 
    ########## �Һз� ���� #########################################
}
endif;
?>
                                
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>        
            </table>
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr><td height="1" bgcolor="#f2f2f2"></td></tr>
            </table>
            
<? endif;?>
<br>
<LI>���̹���ü��ǰ  : <A HREF="http://www.topaircon.net/ep/all.php" target="_blank">http://www.topaircon.net/ep/all.php</A>
<LI>���̹�����ǰ  : <A HREF="http://www.topaircon.net/ep/brief.php" target="_blank">http://www.topaircon.net/ep/brief.php</A>
            <!------- spacer ----------------------------------------------->
            <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center'>
                <tr  bgcolor=#cccccc><td height=1></td></tr> 
                <tr><td>&nbsp;</td></tr>
            </table>
            <!--------------- M and S category Show --------------------------->

            
            <!----------  Product Register Button --------------------->
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
              <td>&nbsp; 
                <input type="radio" name="saletype" value="p" <? if($saletype=="p")echo"checked";?> onClick="saletype_list(this.value)">�Ϲ�                
                <input type="radio" name="saletype" value="s" <? if($saletype=="s")echo"checked";?> onClick="saletype_list(this.value)">HIT��ǰ
                <input type="radio" name="saletype" value="n" <? if($saletype=="n")echo"checked";?> onClick="saletype_list(this.value)">���λ�ǰ
                <input type="radio" name="saletype" value="b" <? if($saletype=="b")echo"checked";?> onClick="saletype_list(this.value)">��õ��ǰ
              </td>
              <td align=right></td>
            </tr>
            </table>

            <!------- spacer ----------------------------------------------->
            <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center'>
                <tr><td height=5></td></tr>        
            </table>
            <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center'>
                <tr><td height=5 align=right>�������� : <FONT COLOR="#FF0099"><B>���ڰ� Ŭ���� ��ܿ� ��ġ�մϴ�.</B></FONT></td></tr>        
            </table>
    
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr><td>
        <table border="0" cellspacing="1" cellpadding="4" align="center" bgcolor=#BBD1E8 width="100%">
            <tr bgcolor='#3F7DBC'>
                <td align=center><font color="#FFFFFF">�̹���</font></td>
                <td align=center><font color="#FFFFFF">��ǰ��/�귣��</font></td>
                <td align=center><font color="#FFFFFF">��ǰ�ڵ�/��ǰ��ġ</font></td>
                <td align=center><font color="#FFFFFF">�ǸŰ�</font></td>
                <td align=center><font color="#FFFFFF">������ġ</font></td>
                <td align=center><font color="#FFFFFF">��������</font></td>
                <td align=center><font color="#FFFFFF">��ȹ/�߰�</font></td>
                <td align=center ><font color="#FFFFFF">����</font></td>
                
                <td align=center nowrap><font color="#FFFFFF">���� &middot ����</font></td>
            </tr>


<?
    if (!$offset) $offset=0;
    $limit=10;
    $page=10;
    if ($content) {
        $select=sanitize_input($select);
        $content=sanitize_input($content);
        if (!strpos($select, "p_name")) $select = "p_name";
        else if (!strpos($select, "p_code")) $select = "p_code";
        else $select = "p_name";
        $condition="where $select like '%$content%'";
    } else $condition="";
    if($category){
        if($category>=10000){ //�Һз�
            if(!$condition)$condition="where category = '$category'";
            else $condition .=" and category = '$category'";
        }else if($category>=100){
            $cat=substr($category,-4);
            if(!$condition)$condition="where category like '%$cat'";
            else $condition .=" and category like '%$cat'";
        }else{
            $cat=substr($category,-2);
            if(!$condition)$condition="where category like '%$cat'";
            else $condition .=" and category like '%$cat'";
        }
    }

    if($saletype){
            if($saletype=="p"){
                    if(!$condition)$condition="where saletype = ''";
                    else $condition .=" and saletype = ''";
            }else{
                    if(!$condition)$condition="where saletype = '$saletype'";
                    else $condition .=" and saletype = '$saletype'";
            }
    }

    $row=DBarray("select count(*) from products $condition");
    
    $numrows=$row[0];
    $no=$numrows-$offset;
    $result=DBquery("select * from products $condition order by p_indexs desc,category desc limit $offset, $limit");
    
    while ($row=mysql_fetch_array($result)) {
?>
                <tr bgcolor='#ffffff'>
                <td align='center'>
                <img src='../product_img/<?=sanitize_input($row['p_code'])?>a.jpg' width=20 height=20 border=0></td>
                <td align=left valign='top'><?=sanitize_input($row['p_name'])?><Br>
                <?=$BRAND_ARRAY["$row[p_brand]"]?>
                </td>
                <td  valign='top' nowrap><?=sanitize_input($row['p_code'])?><br><?=categoryname($row['category'])?></td>
                <td align=center valign='top'><?=number_format($row['p_price'])?></td>
                
                <td align=center valign='top'>
                <select name="resaletype" onchange="saletype('<?=sanitize_input($row['p_code'])?>',this.value)">
                    <option value="p" <? if($row['saletype']=="p")echo"selected";?>>�Ϲ�</option>
                    <option value="s" <? if($row['saletype']=="s")echo"selected";?>>HIT��ǰ</option>
                    <option value="n" <? if($row['saletype']=="n")echo"selected";?>>���λ�ǰ</option>
                    <option value="b" <? if($row['saletype']=="b")echo"selected";?>>��õ��ǰ</option>
                </select>
                </td>
                <td align=center valign='top'>
                <select name="p_indexs" onchange="p_indexs('<?=sanitize_input($row['p_code'])?>',this.value)">
                    <? for($cnt=1;$cnt<100;$cnt++){?>
                        <option value="<?=$cnt?>" <? if($row['p_indexs']==$cnt)echo"selected";?>><?=$cnt?></option>
                    <? }?>
                </select>
                </td>
                <td align=center valign='top'>

<INPUT TYPE="checkbox" NAME="plus01" value="y" <? if($row['plus01']=="y")echo"checked"?> onClick="saletype3('<?=sanitize_input($row['p_code'])?>',this.value)">

<INPUT TYPE="checkbox" NAME="plus02" value="y" <? if($row['plus02']=="y")echo"checked"?> onClick="saletype4('<?=sanitize_input($row['p_code'])?>',this.value)">
                </td>
                <td align=center valign='top'>

<INPUT TYPE="checkbox" NAME="naver_yn" value="y" <? if($row['naver_yn']=="y")echo"checked"?> onClick="saletype5('<?=sanitize_input($row['p_code'])?>',this.value)">


                </td>
                
                <td align=center valign=top nowrap>
                <a href='productmodify.php?mode=form&offset=<?=$offset?>&category=<?=$row['category']?>&p_code=<?=$row['p_code']?>'>
                <b>����</b></a>
                &middot 
                <a href="javascript:product_del('productdelete.php?offset=<?=$offset?>&category=<?=$category?>&keyfield=<?=$keyfield?>&key=<?=$encoded_key?>&bigcode=<?=$bigcode?>&midcode=<?=$midcode?>&p_code=<?=sanitize_input($row['p_code'])?>');">
                <b>����</b></td>
                </tr>
            
<?
}
?>
        </table>
        
    </td></tr>
    </table>
    <br>
    <!-- Main Contents End ------------------------------------------------------------------------------------>

    <!--------------------- �Ʒ� �κ��� ������ ��ũ ����� --------------->
    <table cellpadding="2" width="100%">
    <tr>
    <td align=center>

<?
$listsort="category=$category&saletype=$saletype&content=$content&select=$select";
    include "../include/page.php";
    echo ("${prev10} $_page ${next10}");
?>
    </td>
    </tr>
    </table>
    <!--------------------- �Ʒ� �κ��� ��ũ ����� ���̺� ���� ------------>


    <center>
<form name="search" action="<?=$PHP_SELF?>" method="post">
<input type="hidden" name="saletype" value="<?=$saletype?>">
<input type="hidden" name="category" value="<?=$category?>">

            <select name="select">
                    <option value='p_name' <? if ($select=="p_name") echo "selected";?>>��ǰ��</option>
                    <option value='p_code' <? if ($select=="p_code") echo "selected";?>>��ǰ�ڵ�</option>

                    
                  </select>
                  &nbsp; 
                  <input type="text" name="content" value='<?=sanitize_input($content)?>'>
                  &nbsp;<input type="image" src="../img/board/board/search_btn.gif"  align="absmiddle"> 
                </form>
    </center>
    <br><br>


        
        </td>
        <!-------- Second Colum ends here ---------------------------------------------------------->
        <!-------- Second Colum ends here ---------------------------------------------------------->
    </tr>
</table>
<?include "../admin/tail.php";?>
