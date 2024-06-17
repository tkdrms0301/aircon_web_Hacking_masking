
<table width="170" border="0" cellspacing="0" cellpadding="0">


              <tr> 
                <td bgcolor="#565656" height="35" style=padding-left:10px><b><img src="img/icon2.jpg" width="9" height="9" align="absmiddle"> 
                  <font color="#FFFFFF">고객센터</b></font></td>
              </tr>
			  
<?
$MENU_ARR=array(
"qna"=>"질문/답변",
"customer01"=>"에어컨 상식"

);
foreach ($MENU_ARR as $key => $value) {
	if($board==$key)$font_coloe="<font color='#ff0000'>";
	else  $font_coloe="<font color='#000000'>";
?>
              <tr> 
                <td height="25"style=padding-left:10px><img src="img/icon.jpg" width="4" height="4" align="absmiddle"> 
                  <A HREF="../admin/board.php?board=<?=$key?>"><?=$font_coloe?><?=$value?></font></A></td>
              </tr>
              <tr> 
                <td><img src="img/dot.jpg" width="170" height="5"></td>
              </tr>
<? } ?>  
			 
            </table>
          </td>
          <td valign="top"  style="padding-left:25"> <br>
            <br>