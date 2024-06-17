<? include "../admin/head.php";?>
<? if(!strcmp($mode,"form")) {?>
<TABLE>
<TR>
	<TD align=center>
<!--------------->

<table width="650" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="10"><br>
                        <img src="../img/market/t<?=$s_category?>.jpg" width="178" height="28"></td>
                    </tr>
                    <tr> 
                      <td height="10" align="right"></td>
                    </tr>
					</table>
<?
				if($no){
									$row = DBarray("select * from market where no='$no' and userid='".$_SESSION['user_id']."'");

				$submit_btn="pang_edit_btn.gif";
?>
<script language="javascript"> 
		<!--
		function checkInput (form) {
		if (!form.Category1.value) { alert(""); return; }
		if (!form.name.value) { alert(""); form.name.focus(); return; }
		if(!form.price.value) { alert(""); form.price.focus(); return;         }
		form.submit(); }  
		//--> 
</script>
<?

				 }else{
				$submit_btn="market_btn.gif";
?>	
<script language="javascript"> 
		<!--
		function checkInput (form) {
		if (!form.Category1.value) { alert(""); return; }
		if (!form.name.value) { alert(""); form.name.focus(); return; }
		if(!form.price.value) { alert(""); form.price.focus(); return;         }
		if(!form.image1.value) { alert(""); form.image1.focus(); return;         } if(!form.image2.value) { alert(""); form.image2.focus(); return;         }
		form.submit(); }   
		function IsNumber(formname) { var form = eval("document.reg_form." + formname);
		for(var i = 0; i < form.value.length; i++) { var chr = form.value.substr(i,1); if(chr < '0' || chr > '9') {    return false; } } return true;   }
		//--> 
</script>
<? } ?>
                  <table width="650" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="center" valign="top"><img src="../img/market/mak_img.gif" width="610" height="133"></td>
                    </tr>
                  </table>

                  <table  width=632 cellpadding=0 cellspacing=0 border=0>
	                  <tr>
		              <td width=100% valign=top>
               <form name="reg_form" method="post" ENCTYPE="multipart/form-data" action="<?echo("$php_self?mode=process&category=$mcode")?>">
<INPUT TYPE="hidden" name="s_category" value="<?=$s_category?>">
<INPUT TYPE="hidden" name="no" value="<?=$row[no]?>">
		                  <table cellspacing="1" cellpadding="5" width="100%" border="0" bgcolor="#dadada">
                            <tr bgcolor="#ffffff"> 
                              <td bgcolor="#FCFCFC"><font color="#333333"></font></td>
                              <td> 
                                <!------------------------------------------------------------------------------->
<select name="Category1" >
                        <option value="" selected> </option>
                        <?
$sqlstr = "SELECT * FROM category WHERE category < 100  ORDER BY UID ASC";
$sqlqry = mysql_query($sqlstr);
while($list=@mysql_fetch_array($sqlqry)):
if($list[category]==$category)$selected="selected";
else $selected="";
echo"<option value='$list[category]' ${selected}>$list[name]</option> \n";
endwhile;
?>
                      </select>
								
								</td>
                            </tr>
                            <tr bgcolor="#ffffff"> 
                              <td bgcolor="#FCFCFC"><font color="#333333"></font></td>
                              <td><input type="text" name="name" size=60 value="<?=$row[p_name]?>"></td>
                            </tr>
                            <tr bgcolor="#ffffff"> 
                              <td bgcolor="#FCFCFC"><font color="#333333"></font></td>
                              <td><input type="text" name="price" size=20 value="<?=$row[p_price]?>"><font color="#FF6600">ex)
                              </font></td>
                            </tr>
                            
                            <tr bgcolor="#ffffff"> 
                              <td bgcolor="#FCFCFC"><font color="#333333"><br>
                                <input TYPE="checkbox" NAME="htmlYN" value="y" <? if($row[htmlYN]=="y")echo "checked"?>>
                                </font></td>
                              <td><textarea name="comment" cols="70" rows="10"><?=stripslashes($row[p_comment])?></textarea></td>
                            </tr>

                            <tr bgcolor="#ffffff"> 
                              <td rowspan="3" valign="top" bgcolor="#FCFCFC"><font color="#333333"></font></td>
                              <td>
                                <input type="file" name="image1" size="30"> <font color="#FF6600">
                                140x150</font>
<? 
$hmax=213; $wmax=249;
			if(file_exists("../market_img/{$row[no]}a.jpg")){?>
			<br>&#149; <br><br>

			<center>
			<?=makeImg("../market_img/{$row[no]}a.jpg")?>
			</center>
<? } ?>
								</td>
                            </tr>
                            <tr bgcolor="#ffffff"> 
                              <td>
                                <input type="file" name="image2" size="30"> <font color="#FF6600">
                                250X250</font>
<? if(file_exists("../market_img/{$row[no]}b.jpg")){?>
			<br>&#149; <br><br>
			<center><?=makeImg("../market_img/{$row[no]}b.jpg")?></center>
<? } ?>
								</td>
                            </tr>
                            <tr bgcolor="#ffffff"> 
                              <td>
                                <input type="file" name="image3" size="30"> <font color="#FF6600">
                                450X450</font>
<? if(file_exists("../market_img/{$row[no]}c.jpg")){?>
			<br>&#149; <br><br>

			<center><?=makeImg("../market_img/{$row[no]}c.jpg")?></center>

<? } ?>
								</td>
                            </tr>
                          
                          </table>
					<table width="632" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="62" align="center"><img src="../img/market/<?=$submit_btn?>" width="81" height="30" border="0" onClick="Javascript:checkInput(document.reg_form);" style="cursor:hand">&nbsp;<A HREF="market.php?category=<?=$category?>&s_category=<?=$s_category?>&offset=<?=$offset?>"><img src="../img/market/can_btn.gif" width="81" height="30"></A></td>
                    </tr>
                  </table>
		</form>


		</td>

	</tr>
</table>

<!--------------->
	</TD>
</TR>
</TABLE>
<?

} else if(!strcmp($mode,"process")) {
	
	$pnum = substr($pcode,-4);

if(!$no){
	if(!$image1_name || !$image2_name) {
		error_check("");
		exit;
	}
}
	if($Category4)$markets_category=$Category4;
	elseif($Category3)$markets_category=$Category3;
	elseif($Category2)$markets_category=$Category2;
	elseif($Category1)$markets_category=$Category1;
				
					

$input[category]=$markets_category;
$input[s_category]=$s_category;
$input[p_name]=$name;
$input[p_price]=$price;
$input[htmlYN]=$htmlYN;
$input[p_comment]=addslashes($comment);
$input[wdate]=date('Y-m-d');
$input[userid]=$_COOKIE[user_id];
if(!$no){
	$result = setInsert("market", $input);
	$pcode=mysql_insert_id();
}else{
	$result = setUpdate("market", $input, $query_option="where no='$no'", $type=0);
	$pcode=$no;
}

	if($result){
		if($image1_name){
			move_uploaded_file($image1,"../market_img/${pcode}a.jpg");
		}

		###################
		if($image2_name){
			move_uploaded_file($image2,"../market_img/${pcode}b.jpg");
		}
		###################
		if($image3_name){
			move_uploaded_file($image3,"../market_img/${pcode}c.jpg");
		}
		echo("<meta http-equiv='Refresh' content='0; URL=market.php?category=$Category1&s_category=$s_category'>");
		exit;
	}else{
	
	error_check("");
	}
}
?>
<? include "../admin/tail.php";?>