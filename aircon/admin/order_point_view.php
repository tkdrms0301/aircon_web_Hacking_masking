<? include "../admin/head.php";

if($bae_song){

		if($bae_song=="3"){ 
				$orow=DBarray("select * from point_orders  where no='$no'");
				if($orow[userid]){ 
						$inp[userid]=$orow[userid];
						$inp[order_no]=$orow[orderno];
						$inp[product]=$orow[product];
						$inp[point]=$orow[point];
						$inp[reason]="주문-".$orow[orderno];
						$inp[wdate]=date('Y-m-d');
						setInsert("zamzzari_point",$inp);
						DBquery("update users set ordercnt=ordercnt+1 where userid='$orow[userid]'");
				}
					$today=date('Y-m-d');
					$quer=DBquery("update point_orders set sdate_movie='$today' where  no='$no'");
					
					
				

		}


			DBquery("update point_orders set baesong='$bae_song' where no='$no'");
			redirect1("order_point_list.php?offset=$offset&ordertype=$ordertype");
}

	

if($REstate){

			DBquery("update point_orders set state='$REstate' where no='$no'");
			redirect1("order_point_list.php?offset=$offset&ordertype=$ordertype");
			

}
if($cancel !=''	){

		if($cancel>=5){ 
				$orow=DBarray("select * from point_orders  where no='$no'");
				$inp[userid]=$orow[userid];
				$inp[order_no]=$orow[orderno];
				$inp[product]=$orow[product];
				$point=$orow[point]*= -1; 
				$inp[point]=$point;
				$inp[reason]=state($cancel,7)."-".$orow[orderno];
				$inp[wdate]=date('Y-m-d');
				setInsert("edumecca_point",$inp);
				
		}

			DBquery("update point_orders set cancel='$cancel' where no='$no'");
			if($ordertype) redirect1("order_point_list.php?offset=$offset&ordertype=$ordertype");
			else redirect1("$url?offset=$offset&today=$today&url=$url&select=$selct&content=$content");

}
$row=DBarray("select * from point_orders where orderno='$orderno' limit 0,1");
?>
<script>
function baesongchang(bae_song){
	document.location.replace("<?=$PHP_SELF?>?bae_song="+bae_song+"&no=<?=$no?>&offset=<?=$offset?>&ordertype=<?=$ordertype?>&today=<?=$today?>&url=<?=$url?>&select=<?=$selct?>&content=<?=$content?>");
}
function REstatechang(REstate){
	document.location.replace("<?=$PHP_SELF?>?REstate="+REstate+"&no=<?=$no?>&offset=<?=$offset?>&ordertype=<?=$ordertype?>&today=<?=$today?>&url=<?=$url?>&select=<?=$selct?>&content=<?=$content?>");
}
function cancel(cancel){
	document.location.replace("<?=$PHP_SELF?>?cancel="+cancel+"&no=<?=$no?>&offset=<?=$offset?>&ordertype=<?=$ordertype?>&today=<?=$today?>&url=<?=$url?>&select=<?=$selct?>&content=<?=$content?>");
}
</script>
<br>

<table width="600" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                    
                    <tr align="center" bgcolor="#D1E3A8"> 
                      <td width="131" height="30">배송</td>
				      <td width="617" height="30" bgcolor=#ffffff align=left>
<select name="bae_song" onchange="baesongchang(this.value);" <?=$showable?>>
	<option value='1' <? if($row[baesong]=='1')echo"selected";?>>배송전</option>
	<option value='2' <? if($row[baesong]=='2')echo"selected";?>>배송중</option>
	<option value='3' <? if($row[baesong]=='3')echo"selected";?>>배송완료</option>
</select>
					  </td>
                    </tr>

</table>
<!------------------>

<? include "../include/i_point_order_view.php";?>



<? include "../admin/tail.php";?>