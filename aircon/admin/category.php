<? include "../admin/head.php";

function sanitize_input($input) {
  return htmlspecialchars($input, ENT_QUOTES, 'EUC-KR');
}

// ����� �Է¿��� ���� ó��
if ($action == 'reg_cat' && $new_category_code && $new_category_name ) {
	$new_category_code_full = sanitize_input($new_category_code) . sanitize_input($present_category_code); /* ���� �����Ǵ� ���� ī�װ��ڵ�(2�ڸ�)�� ���� �з����� ī�װ� �ڵ带 �����Ͽ� ��ü ī�װ��ڵ�(6�ڸ�)�� �����Ѵ�. */
	$SQL_STR = "SELECT count(UID) FROM category WHERE category = '$new_category_code_full'";
	$SQL_QRY = mysql_query($SQL_STR);
	$EXISTS = @mysql_result($SQL_QRY, 0, 0);
	if($EXISTS){
		ECHO "<html><script language = 'javascript'>window.alert('ī�װ��ڵ尡 �ߺ��Ǿ����ϴ�2. \\n\\n�ٸ� ���ڸ� �Է����ּ���.');</script>
     		<META http-equiv='refresh' content ='0;url=$PHP_SELF?menu3=show&THEME=" . sanitize_input($THEME) . "&where=" . sanitize_input($where) . "&present_category_code=" . sanitize_input($present_category_code) . "'>
     		</HTML>";
		exit;
	}
	$SQL_STR = "INSERT INTO category (category,name,indexs) VALUES('$new_category_code_full','" . sanitize_input($new_category_name) . "','" . sanitize_input($new_category_code) . "')";
	$SQL_QRY = mysql_query($SQL_STR) or die(mysql_error());
}

if ($action == 'mod_cat') {
	DBquery("update category set name='" . sanitize_input($new_category_name) . "',indexs='" . sanitize_input($new_indexs) . "' where category='" . sanitize_input($category) . "'");	
		
	echo "<html>
		<META http-equiv='refresh' content ='0;url=$PHP_SELF?menu3=show&THEME=" . sanitize_input($THEME) . "&where=" . sanitize_input($where) . "&present_category_code=" . sanitize_input($present_category_code) . "&nation=" . sanitize_input($nation) . "&car_kind=" . sanitize_input($car_kind) . "'>
		</HTML>";
	exit;		
}

/*********************************************************************************************************************************/
if ($action == 'delete') {
/* ī�װ� DB���� ����� START */
 $SQL_STR = "DELETE FROM category WHERE category LIKE '%" . sanitize_input($present_category_code) . "'";
 $SQL_QRY = mysql_query($SQL_STR) or die(mysql_error());
						
	
    echo "<html>
    <META http-equiv='refresh' content ='0;url=$PHP_SELF?menu3=show&THEME=" . sanitize_input($THEME) . "&present_category_code=" . sanitize_input($present_category_code) . "'>
    </HTML>";
    exit;
}
/*********************************************************************************************************************************/
?>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<SCRIPT LANGUAGE=javascript>
<!--
function really(){
if (confirm('\nī�װ������� ����ī�װ� \n������ ��� ����ī�װ� �� �����Ͱ� �����˴ϴ�.\n\n������ �����Ͻðڽ��ϱ�?\n\n')) return true;
return false;
}

function really1(){
if (confirm('\nī�װ������ ��ī�װ� \n������ ��� ����ī�װ��� ����Ǿ����ϴ�.\n\n������ �����Ͻðڽ��ϱ�?\n')) return true;
return false;
}
function onlyNumber() {
	if(((event.keyCode > 64)&&(event.keyCode < 91))||((event.keyCode > 106)&&(event.keyCode < 123)))
		event.returnValue=false;
}
function actionqry(f,val){
f.action.value = val;
f.submit();
}
//-->
</SCRIPT>


<table width="800" border="0">
              <tr>
                <td width="30" height="8"></td>
                <td width="839" height="8"></td>
              </tr>
              <tr>
                <td width="30">&nbsp;</td>
                <td width="800" valign="top"><table cellspacing=0 bordercolordark=white width="800" bgcolor=#c0c0c0 bordercolorlight=#dddddd border=1 class="s1">
                    <tbody> 
                    <tr> 
                      
            
          <td bgcolor=#ffffff><b><font color="#FF6600">ī�װ� �޴���</font></b></td>
                    </tr>
                    <tr> 
                      <td bgcolor=#ffffff> 
                        <table cellspacing=0 cellpadding=0 width="100%" border=0 class="s1">
                          <tbody> 
                          <tr> 
                            
                <td align=middle width=57 valign="top"><font color=#ff6600>[note]</font> </td>
                            
                    <td width="697">��ǰī�װ��� 
                                ���, ����, ���� ���� �ϴ� ���Դϴ�.  <br>
                                ī�װ��� ������ ����Ʈ�� ī�װ� �ڵ������ ����Ʈ �ǹǷ� �ڵ忡 ������ 2�ڸ����ڸ� 
                                <br>
                                �־�ñ�ٶ��ϴ�. <br>
								
								
								<br>
                                (  <img src="../img/admin/cat_modify.gif" width="16" height="16"> 
                                ī�װ���� �� ���� <img src="../img/admin/cat_delete.gif" width="14" height="16"> 
                                ī�װ� ���� ) </td>
                          </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    </tbody>
                  </table><br>
                  
      <TABLE cellSpacing=0 borderColorDark=white width="800" bgColor=#c0c0c0 borderColorLight=#dddddd 
border=1 class="s1">
        <TBODY> 
        <TR> 
            <TD bgColor=#ffffff><font color="#000000">&nbsp; </font>
			<table width="400" border="0" cellSpacing=1 bgcolor=#cccccc> 
              <form action='<?=$PHP_SELF?>' method="post">
                <input type=HIDDEN name=menu3 value='show'>
                <input type=HIDDEN name=THEME value='<?=sanitize_input($THEME)?>'>
                <input type=HIDDEN name=action value='reg_cat'>
                <tr  bgcolor=#ffffff> 
                  <td width="170"><font color="#000000"> 
                    �з����<input size=26 name="new_category_name" class="textbox3">
                    </font></td>
                  <td width="100" align=right><font color="#000000"> 
                    �ڵ�(�ʱ����)
					<input size=5 name="new_category_code" maxlength=2 onKeyDown="onlyNumber()" class="textbox3">
                    </font></td>
                  <td width="84" align=left>
                    <input type="image" src="../img/admin/da.gif" width="84" height="20" align="absmiddle">
                  </td>
                </tr>
              </form>
            </table>
              
              
			</TD>
        </TR>
        </TBODY> 
      </TABLE> 
	
   <table cellspacing=0 bordercolordark=white width="800" bgcolor=#c0c0c0 bordercolorlight=#dddddd border=0 class="s1" cellpadding="0">
        <input type=hidden value=show name="menu2">
        <input type=hidden name=THEME value=<?=$THEME?>>
        <input type=hidden value=delete name=action>
        <tbody>
          <tr align=middle height=22 bgcolor="#ffffff"> 
            <td width="400" bgcolor="E0E4E8"> <div align="center"><font color="#000000">�з�</font></div></td>
            <td width="400" align=left bgcolor="#B9C2CC"> <div align="center"><font color="#000000">2���з�</font></div></td>
			
            <td width="400" bgcolor="E0E4E8"> <div align="center"><font color="#000000">3���з�</font></div></td>
			
          </tr>
          <tr> 
            <td background="img/list_line.gif" colspan=3 height=1></td>
          </tr>
          <tr bgcolor="#ffffff"> 
            <td align=middle valign="top" bgcolor="#ffffff"> 
              <!-- 2�� ����Ʈ ǥ�� ���� -->
              <table width=100% cellspacing=0 cellpadding=0 border=0 class="s1" >
<?
$LIKE=substr($present_category_code,-2);
$SQL_STR = "SELECT * FROM category WHERE category < 100  order by indexs asc";
$SQL_QRY = mysql_query($SQL_STR) or die(mysql_error());
$BOLD = substr($present_category_code,-2);
while($LIST=mysql_fetch_array($SQL_QRY)):
$bcode = substr($LIST[category],-2);
?>
                <TR HEIGHT=23> 
                  <TD> 
                    <?
		if($BOLD == $LIST[category]) ECHO "<A HREF='$PHP_SELF?menu3=show&THEME=$THEME&where=sub_regis2&present_category_code=$bcode&nation=$nation'><B>$LIST[name](��ϼ��� : $LIST[indexs])</B></A>\n";
		else ECHO " <A HREF='$PHP_SELF?menu3=show&THEME=$THEME&where=sub_regis2&present_category_code=$bcode&nation=$nation'>$LIST[name](��ϼ��� : $LIST[indexs])</A>\n";
?>
                  </TD>
                  <TD ALIGN=RIGHT> 
                    <A HREF='<?=$PHP_SELF?>?menu3=show&THEME=<?=$THEME?>&where=sub_regis2&present_category_code=<?=$bcode?>&&nation=<?=$nation?>#subinput'><IMG src='../img/admin/cat_modify.gif' BORDER='0' alt='����ī�װ� ��� �� ����ī�װ� ����'></A> 
                    
                    <A HREF='<?=$PHP_SELF?>?menu3=show&THEME=<?=$THEME?>&action=delete&present_category_code=<?=$bcode?>&&nation=<?=$nation?>#subinput' onclick='return really()'><IMG src='../img/admin/cat_delete.gif' BORDER='0' alt='����ī�װ� ����'></A> 
                  </TD>
                </TR>
                <TR> 
                  <TD COLSPAN=2 WIDTH=100% HEIGHT=1 BGCOLOR=EFEFEF></TD>
                </TR>
                <?
 endwhile;
?>
              </table>
              
            </td>
            <td valign="top" bgcolor="#ffffff"> 
              <!-- �ߺз� ����Ʈ ǥ�� ���� -->
              <table width=100% cellspacing=0 cellpadding=0 border=0 class="s1">
<?
if($present_category_code >= 1): /* ��ü if�� ���� */
$LIKE=substr($present_category_code,-2);
$SQL_STR = "SELECT * FROM category WHERE  category >= 100 AND category < 10000 and category like '%$LIKE' order by indexs asc";
$BOLD = substr($present_category_code, -4);
$SQL_QRY = mysql_query($SQL_STR);
while($LIST=mysql_fetch_array($SQL_QRY)):
$mcode = substr($LIST[category],-4);
?>
                <TR HEIGHT=23> 
                  <TD> 
                    <?
		if($BOLD == $LIST[category]) ECHO "<A HREF='$PHP_SELF?menu3=show&THEME=$THEME&action=sub_regis3&present_category_code=$mcode&nation=$nation'><B>$LIST[name](��ϼ��� : ".$LIST[indexs].")</B></A>\n";
		else ECHO " <A HREF='$PHP_SELF?menu3=show&THEME=$THEME&action=sub_regis3&present_category_code=$mcode&nation=$nation'>$LIST[name](��ϼ��� : ".$LIST[indexs].")</A>\n";
?>
                  </TD>
                  <TD ALIGN=RIGHT> 
                    <a href='<?=$PHP_SELF?>?menu3=show&THEME=<?=$THEME?>&where=sub_regis3&present_category_code=<?=$mcode?>&nation=<?=$nation?>#subinput'><img src='../img/admin/cat_modify.gif' border='0' alt='����ī�װ� ��� �� ����ī�װ� ����'></a> 
                    
                    <A HREF='<?=$PHP_SELF?>?menu3=show&THEME=<?=$THEME?>&action=delete&present_category_code=<?=$mcode?>&nation=<?=$nation?>#subinput' onclick='return really()'><IMG src='../img/admin/cat_delete.gif' BORDER='0' alt='����ī�װ� ����'></A> 
                  </TD>
                </TR>
                <TR> 
                  <TD COLSPAN=2 WIDTH=100% HEIGHT=1 BGCOLOR=EFEFEF></TD>
                </TR>
                <?			
 endwhile;
 endif;
?>
              </table>
              
            </td>

            <td align=middle valign="top" bgcolor="#ffffff"> 
              <!-- �Һз� ����Ʈ ǥ�� ���� -->
              <table width=100% cellspacing=0 cellpadding=0 border=0 class="s1">
                <?
if($present_category_code >= 100): /* ��ü if�� ���� */
$LIKE=substr($present_category_code,-4);

$SQL_STR = "SELECT * FROM category WHERE category >= 10000 AND category LIKE '%$LIKE' order by indexs asc";
$SQL_QRY = mysql_query($SQL_STR);
while($LIST=mysql_fetch_array($SQL_QRY)):
$scode = $LIST[category];
?>
                <TR HEIGHT=23 > 
                  <TD nowrap> 
                    <?
		if($present_category_code == $LIST[category]) ECHO "<A HREF='$PHP_SELF?menu3=show&THEME=$THEME&action=sub_regis4&present_category_code=$scode&nation=$nation'><B>$LIST[name](��ϼ��� : ".$LIST[indexs].")</B></A>\n";
		else ECHO " <A HREF='$PHP_SELF?menu3=show&THEME=$THEME&action=sub_regis4&present_category_code=$scode&nation=$nation'>$LIST[name](��ϼ��� : ".$LIST[indexs].")</A>\n";
?>
                  </TD>
                  <TD ALIGN=RIGHT nowrap> 

                    <A HREF='<?=$PHP_SELF?>?menu3=show&THEME=<?=$THEME?>&where=sub_regis4&present_category_code=<?=$scode?>&nation=<?=$nation?>#subinput'><IMG src='../img/admin/cat_modify.gif' BORDER='0' alt='����ī�װ� ��� �� ����ī�װ� ����'></A>
                    <A HREF='<?=$PHP_SELF?>?menu3=show&THEME=<?=$THEME?>&action=delete&present_category_code=<?=$scode?>&nation=<?=$nation?>#subinput' onclick='return really()'><IMG src='../img/admin/cat_delete.gif' BORDER='0' alt='����ī�װ� ����'></A> 
                  </TD>
                </TR>
                <TR> 
                  <TD COLSPAN=2 WIDTH=100% HEIGHT=1 BGCOLOR=EFEFEF></TD>
                </TR>
<?			
 endwhile;
 endif;
?>
              </table>
            
            </td>
          </tr>
          <tr> 
            <td background="img/list_line.gif" colspan=3 height=1><A name="subinput"></A></td>
          </tr>
 <tr>
<!----------------------1��------------------>	  
            <td height="50"   bgcolor="#ffffff"> 
			
			<? 
			if( $where == 'sub_regis1' || $where == 'sub_regis2'):
			$row_2=DBarray("SELECT * FROM category WHERE category < 100  AND category LIKE '%$present_category_code'");
			$row=DBarray("SELECT * FROM category WHERE category < 100  AND category LIKE '%$present_category_code'");
			?>

				<?
				if($where == 'sub_regis1') $level = 1;
				else if($where == 'sub_regis2') $level = 2;
				else if($where == 'sub_regis3') $level = 3;
				?>
			    <form action='<?=$PHP_SELF?>' method=post name="catfrm2">
                <input type=HIDDEN name=menu3 value='show'>
                <input type=HIDDEN name=THEME value='<?=$THEME?>'>
                <input type=HIDDEN name=where value='<?=$where?>'>
				<input type=HIDDEN name=nation value='<?=$row_2[nation]?>'>
                <input type=HIDDEN name=present_category_code value='<?=$present_category_code?>' onKeyDown="onlyNumber()">
				<input type=HIDDEN name=category value='<?=sprintf("%08d",$present_category_code);?>' onKeyDown="onlyNumber()">
               
				<input type=HIDDEN name=action value=''>
                <input type=HIDDEN name=lv value='<?=$level?>'>
                
				<? if($where == 'sub_regis1'):?>
				ī�װ��� : <input type=TEXT name=new_category_name class="textbox3" size=18 value="<?=$row_2[name]?>"><br>
                �ʱ��ڵ� : <input type=TEXT name=new_category_code size=3 maxlength="2" class="textbox3">
				
                <img src="../img/admin/dung.gif" width="55" height="20" onclick=actionqry(document.catfrm2,'reg_cat'); style=cursor:hand align="absmiddle">
				<? endif;?>
				<? if($where == 'sub_regis2'):?>
				ī�װ��� : <input type=TEXT name=new_category_name size=18 value="<?=$row_2[name]?>" class="textbox3"><br>
				��ϼ��� : <input type=TEXT name=new_indexs size=3 maxlength="2" value="<?=$row[indexs]?>" class="textbox3">
				
				<img src="../img/admin/byun.gif" width="55" height="20" onclick=actionqry(document.catfrm2,'mod_cat'); style=cursor:hand align="absmiddle"> 
				<? endif;?>
              </form> 

			  <? endif;?>
			  
			  </td>
<!----------------------1��------------------>
<!----------------------2��------------------>		  
            <td height="50"   bgcolor="#ffffff"> 
			
			<? 
			if( $where == 'sub_regis2' || $where == 'sub_regis3'):
			$row_2=DBarray("SELECT * FROM category WHERE category < 100  AND category LIKE '%$present_category_code'");
			$row=DBarray("SELECT * FROM category WHERE category >= 100 AND category < 10000 AND category LIKE '%$present_category_code'");
			?>

				<?
				if($where == 'sub_regis1') $level = 1;
				else if($where == 'sub_regis2') $level = 2;
				else if($where == 'sub_regis3') $level = 3;
				
				?>
			    <form action='<?=$PHP_SELF?>' method=post name="catfrm3">
                <input type=HIDDEN name=menu3 value='show'>
                <input type=HIDDEN name=THEME value='<?=$THEME?>'>
                <input type=HIDDEN name=where value='<?=$where?>'>
				<input type=HIDDEN name=nation value='<?=$row_2[nation]?>'>
                <input type=HIDDEN name=present_category_code value='<?=$present_category_code?>' onKeyDown="onlyNumber()">
				<input type=HIDDEN name=category value='<?=sprintf("%08d",$present_category_code);?>' onKeyDown="onlyNumber()">
               
				<input type=HIDDEN name=action value=''>
                <input type=HIDDEN name=lv value='<?=$level?>'>
                
				<? if($where == 'sub_regis2'):?>
				ī�װ��� : <input type=TEXT name=new_category_name size=18 class="textbox3"><br>
                �ʱ��ڵ� : <input type=TEXT name=new_category_code size=3 maxlength="2" class="textbox3">
				
                <img src="../img/admin/dung.gif" width="55" height="20" onclick=actionqry(document.catfrm3,'reg_cat'); style=cursor:hand align="absmiddle">
				<? endif;?>
				<? if($where == 'sub_regis3'):?>
				ī�װ��� : <input type=TEXT name=new_category_name size=18 value="<?=$row[name]?>" class="textbox3"><br>
				��ϼ��� : <input type=TEXT name=new_indexs size=3 maxlength="2" value="<?=$row[indexs]?>" class="textbox3">
				
				<img src="../img/admin/byun.gif" width="55" height="20" onclick=actionqry(document.catfrm3,'mod_cat'); style=cursor:hand align="absmiddle"> 
				<? endif;?>
				
              </form> 

			  <? endif;?>
			  
			  </td>
<!----------------------2��------------------>

<!----------------------3��----------------->  
            <td height="50"   bgcolor="#ffffff" nowrap> 
			
			<? 
			if( $where == 'sub_regis3' || $where == 'sub_regis4'):
			$row_2=DBarray("SELECT * FROM category WHERE category >= 100 AND category < 10000 AND category LIKE '%$present_category_code'");
			$row=DBarray("SELECT * FROM category WHERE category >= 10000  AND category LIKE '%$present_category_code'");
			?>
				<?
				if($where == 'sub_regis1') $level = 1;
				else if($where == 'sub_regis2') $level = 2;
				else if($where == 'sub_regis3') $level = 3;
				?>
			    <form action='<?=$PHP_SELF?>' method=post name="catfrm4">
                <input type=HIDDEN name=menu3 value='show'>
                <input type=HIDDEN name=THEME value='<?=$THEME?>'>
                <input type=HIDDEN name=where value='<?=$where?>'>
				<input type=HIDDEN name=nation value='<?=$row_2[nation]?>'>
                <input type=HIDDEN name=present_category_code value='<?=$present_category_code?>' onKeyDown="onlyNumber()">
				<input type=HIDDEN name=category value='<?=sprintf("%08d",$present_category_code);?>' onKeyDown="onlyNumber()">
               
				<input type=HIDDEN name=action value=''>
                <input type=HIDDEN name=lv value='<?=$level?>'>
				
				<? if($where == 'sub_regis3'):?>
				ī�װ��� :<input type=TEXT name=new_category_name size=18 class="textbox3"><br>
                �ʱ��ڵ� : <input type=TEXT name=new_category_code size=3 maxlength="2" class="textbox3">
				
                <img src="../img/admin/dung.gif" width="55" height="20" onclick=actionqry(document.catfrm4,'reg_cat'); style=cursor:hand align="absmiddle">
				<? endif;?>
				<? if($where == 'sub_regis4'):?>
				ī�װ��� :<input type=TEXT name=new_category_name size=18 value="<?=$row[name]?>" class="textbox3"><br>
				��ϼ��� : <input type=TEXT name=new_indexs size=3 maxlength="2" value="<?=$row[indexs]?>" class="textbox3">
				
				<img src="../img/admin/byun.gif" width="55" height="20" onclick=actionqry(document.catfrm4,'mod_cat'); style=cursor:hand align="absmiddle"> 
				<? endif;?>
				
              </form> 

			  <? endif;?>
			  
			  </td>
<!----------------------3��------------------>
          </tr>
          <tr> 
            <td align=middle bgcolor="#ffffff">&nbsp; </td>
            <td bgcolor="#ffffff">&nbsp; </td>
            <td align=middle bgcolor="#ffffff"></td>
          </tr>
       
</tbody>
      </table>
                 
               
                </td>
              </tr>
            </table>
<? include "../admin/tail.php";?>
