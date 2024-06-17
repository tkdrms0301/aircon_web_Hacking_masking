<? include "../admin/head.php";

if($bae_song){

		////////////포인트 및 스토어 판매수..////
		if($bae_song=="3"){ //배송완료면 poion 테이블 인서트 busers 에  테이블  ordercnt +1 업테이트
				$orow=DBarray("select * from orders  where no='$no'");
				if($orow[userid]){ //회원구매인경우 포인트추가
						$inp[userid]=$orow[userid];
						$inp[order_no]=$orow[orderno];
						$inp[product]=$orow[product];
						$inp[point]=$orow[point];
						$inp[reason]="주문-".$orow[orderno];
						$inp[wdate]=date('Y-m-d');
						setInsert("point",$inp);
						DBquery("update users set ordercnt=ordercnt+1 where userid='$orow[userid]'");
				}

		}

			DBquery("update orders set baesong='$bae_song' where no='$no'");
			redirect1("order_list.php?offset=$offset&ordertype=$ordertype");
}

	

if($REstate){

			DBquery("update orders set state='$REstate' where no='$no'");
			redirect1("order_list.php?offset=$offset&ordertype=$ordertype");
			

}
if($cancel !=''	){

		////////////포인트 및 스토어 판매수..////
		if($cancel>=5){ //반품및 환불완료면 poion 테이블 인서트 busers 에  테이블  ordercnt -1 업테이트
				$orow=DBarray("select * from orders  where no='$no'");
				$inp[userid]=$orow[userid];
				$inp[order_no]=$orow[orderno];
				$inp[product]=$orow[product];
				$point=$orow[point]*= -1; //음수로 변환
				$inp[point]=$point;
				$inp[reason]=state($cancel,7)."-".$orow[orderno];
				$inp[wdate]=date('Y-m-d');
				setInsert("point",$inp);
				
		}
		////////////포인트 및 스토어 판매수..////

			DBquery("update orders set cancel='$cancel' where no='$no'");
			if($ordertype) redirect1("order_list.php?offset=$offset&ordertype=$ordertype");
			else redirect1("$url?offset=$offset&today=$today&url=$url&select=$selct&content=$content");

}

$orderno=mysql_real_escape_string($orderno);
if (!ctype_digit($no)) {
    echo "<script>
    window.alert('잘못된 접근입니다.');
    window.close();
    </script>";
}
$row=DBarray("select * from orders where orderno='$orderno' limit 0,1");

if($row[view_time]=='0000-00-00 00:00:00')DBquery("update orders set view_time=now() where  orderno='$orderno'");
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
function print(){

	window.open("order_print.php?orderno=<?=$orderno?>","_blank","width=650,height=900");

}
</script>
<IMG SRC="./img/print.jpg" WIDTH="107" HEIGHT="37" BORDER="0" ALT="" onClick="print()" style=cursor:hand>
<table width="672" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<TR>
	<TD bgcolor=#fffff>주문번호 : <?=$orderno?> </TD>
</TR>
</TABLE><br>
<table width="672" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                    <tr align="center" bgcolor="#D1E3A8"> 
                      <td width="55" height="30">결제</td>
				      <td width="617" height="30" bgcolor=#ffffff align=left>
<select name="REstate" onchange="REstatechang(this.value);">
	<option value='1' <? if($row[state]=='1')echo"selected";?>>입금전</option>
	<option value='2' <? if($row[state]=='2')echo"selected";?>>입금확인</option>
</select><b>(통장이나 PG사의 입금정보를 꼭 확인해 주세요.)</b>
					  </td>
                    </tr>
                    <tr align="center" bgcolor="#D1E3A8"> 
                      <td width="55" height="30">배송</td>
				      <td width="617" height="30" bgcolor=#ffffff align=left>
<select name="bae_song" onchange="baesongchang(this.value);" <?=$showable?>>
	<option value='1' <? if($row[baesong]=='1')echo"selected";?>>배송전</option>
	<option value='2' <? if($row[baesong]=='2')echo"selected";?>>배송중</option>
	<option value='3' <? if($row[baesong]=='3')echo"selected";?>>배송완료</option>
</select>
					  </td>
                    </tr>
<? if($row[baesong]=="3"){?>
<!--
                    <tr align="center" bgcolor="#D1E3A8"> 
                      <td width="55" height="30">상태</td>
				      <td width="617" height="30" bgcolor=#ffffff align=left>
<select name="cancel" onchange="cancel(this.value);">
	<option value='0' >특이사항없음</option>
	<option value='5' <? if($row[cancel]=="5")echo"selected";?>>승인취소</option>
	<option value='6' <? if($row[cancel]=="6")echo"selected";?>>환불</option>
</select><b>(배송완료된 상품에 대해서 반품을 요청할 경우 사용자의 적립금을 반환합니다.)</b>
</td></tr>
--->
<? } ?>
</table><br>
<!------------------>
<table width="672" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
<TR>
	<TD bgcolor=#ffffff align=center>
<? include "../include/iorder_view.php";?>
</TD>
</TR>
</TABLE>


<? include "../admin/tail.php";?>