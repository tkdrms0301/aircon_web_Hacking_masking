

function checkid() {
	var id = eval(myform.id)
    var AlphaDigit; 
    var IDLength; 
    var NumberChar, CompChar; 
    var ChkFlag; 
    str=document.myform.id.value;
        
	if(!id.value){
		alert('아이디를 입력하신후 확인하세요');
		myform.id.focus();
		return false;
	} else {
		if(myform.id.value) {
			if(myform.id.value.length < 4 || myform.id.value.length > 10){
				alert("아이디는 4~10자 사이로 입력하십시오.");
				myform.id.focus();
				return false;
			}else{
				AlphaDigit= "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"; 
				
				IDLength = str.length; 
				
				for (i = 0; i < IDLength; i++){ 
					NumberChar = str.charAt(i); 
					ChkFlag = false; 
					for (j = 0; j < AlphaDigit.length ; j++){ 
						CompChar = AlphaDigit.charAt(j); 
						if (NumberChar.toLowerCase() == CompChar.toLowerCase())
							ChkFlag = true; 
					} 
					if (ChkFlag == false){ 
						alert("ID는 숫자와 영문의 조합만이 가능합니다."); 
						document.myform.id.value=""; 
						document.myform.id.focus(); 
						return false; 
					} 
				}    
			}
		}	
		return true;
	}
}
// 숫자체크 함수
function NumberCheck(strTemp)
{
var strLen = strTemp.length
var chick = true

for(i=0; i < strLen; i++)
{
  if((strTemp.charAt(i) < "0") || (strTemp.charAt(i) > "9"))
   {
    chick = false;
	 break;
	 }
	}
	return chick;
}

//null check함수
function nullCheck(strTemp)
{
var TempLen = strTemp.length;
var chick = false;
for(i=0; i < TempLen; i++)
 {
  if(strTemp.charAt(i) != " ")
   {
   chick = true;
   break;
    }
   }
  return chick
}
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
 }
 function pop_up1(url) {
  window.open(url,'search','width=500, height=250, scrollbars=no status=yes');
}
 function open_idcheck() {
	if (checkid()) {
		window.open("../member/checkid.php?id=" + myform.id.value,"id","width=300,height=170");
	}
}
function check()
{
  var email	= myform.email.value;


if(checkid()!=true){
		return false;
	}
if(nullCheck(document.myform.id.value)==false)
{
alert("아이디를 입력해 주세요");
document.myform.id.focus();
return;
}
if(nullCheck(document.myform.pwd.value)==false || (document.myform.pwd.value.length < 4))
{
alert("비밀번호는 4자리 이상이어야 합니다");
document.myform.pwd.focus();
return;
}
 astr = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*";

for(i=0; i < document.myform.pwd.value.length; i++)
    {
    if(astr.indexOf(document.myform.pwd.value.substring(i,i+1))< 0)
     {
       alert("비밀번호는 영어와 숫자와 특수문자(!@#$%^&*)만 사용 가능합니다");

        document.myform.pwd.value = "";

        document.myform.pwd.focus();

       return;

       }
     }
if(nullCheck(document.myform.pwd1.value)==false)
{
alert("비밀번호를 입력해주세요");
document.myform.pwd1.focus();
return;
}
if(document.myform.pwd.value != document.myform.pwd1.value)
{
alert("비밀번호가 일치하지 않습니다");
document.myform.pwd.value="";
document.myform.pwd1.value="";
return;
}

if(nullCheck(document.myform.name.value)==false)
{
alert("이름을 입력해 주세요");
document.myform.name.focus();
return;
}
if(nullCheck(document.myform.jumin1.value)==false)
{
alert("주민번호를 입력해 주세요");
document.myform.jumin1.focus();
return;
}
if(nullCheck(document.myform.jumin2.value)==false)
{
alert("주민번호를 입력해 주세요");
document.myform.jumin2.focus();
return;
}
if(nullCheck(document.myform.address1.value)==false)
{
alert("주소를 입력해 주세요");
document.myform.address1.focus();
return;
}
if(nullCheck(document.myform.address2.value)==false)
{
alert("주소를 입력해 주세요");
document.myform.address2.focus();
return;
}





if(nullCheck(document.myform.phone2.value)==false && nullCheck(document.myform.hphone2.value)==false)
{
alert("연락처나 핸드폰번호를 적어주세요");
return;
}
if(nullCheck(document.myform.email.value)==false)
{
alert("e-메일 주소를 입력해 주세요");
document.myform.email.focus();
return;
}
function error (elem,text) {
        if (errfound) return;
        window.alert(text);
        elem.select();
        elem.focus();
        errfound=true;
}

{
	errfound = false;
	var str_jumin1 = myform.jumin1.value;
	var str_jumin2 = myform.jumin2.value;
	var checkImg='';


	var i3=0
	for (var i=0;i<str_jumin1.length;i++)
	{
		var ch1 = str_jumin1.substring(i,i+1);
		if (ch1<'0' || ch1>'9') { i3=i3+1 }
	}
	if ((str_jumin1 == '') || ( i3 != 0 ))
	{
		error(myform.jumin1,'없는 주민등록번호 입니다.\n\n다시 입력해 주세요!!');
	}



	var i4=0
	for (var i=0;i<str_jumin2.length;i++)
	{
		var ch1 = str_jumin2.substring(i,i+1);
		if (ch1<'0' || ch1>'9') { i4=i4+1 }
	}
	if ((str_jumin2 == '') || ( i4 != 0 ))
	{
	  error(myform.jumin2,'없는 주민등록번호 입니다.\n\n다시 입력해 주세요!!');
	}

	if(str_jumin1.substring(0,1) < 2)
	{
	error(myform.jumin2,'없는 주민등록번호 입니다.\n\n다시 입력해 주세요!!');
	}

	if(str_jumin2.substring(0,1) > 2)
	{
		error(myform.jumin2,'없는 주민등록번호 입니다.\n\n다시 입력해 주세요!!');
	}

	if((str_jumin1.length > 7) || (str_jumin2.length > 8))
	{
		error(myform.jumin2,'없는 주민등록번호 입니다.\n\n다시 입력해 주세요!!');
	}

	if ((str_jumin1 == '72') || ( str_jumin2 == '18'))
	{
	  error(myform.jumin1,'없는 주민등록번호 입니다.\n\n다시 입력해 주세요!!');
	}

	var f1=str_jumin1.substring(0,1)
	var f2=str_jumin1.substring(1,2)
	var f3=str_jumin1.substring(2,3)
	var f4=str_jumin1.substring(3,4)
	var f5=str_jumin1.substring(4,5)
	var f6=str_jumin1.substring(5,6)
	var hap=f1*2+f2*3+f3*4+f4*5+f5*6+f6*7
	var l1=str_jumin2.substring(0,1)
	var l2=str_jumin2.substring(1,2)
	var l3=str_jumin2.substring(2,3)
	var l4=str_jumin2.substring(3,4)
	var l5=str_jumin2.substring(4,5)
	var l6=str_jumin2.substring(5,6)
	var l7=str_jumin2.substring(6,7)
	hap=hap+l1*8+l2*9+l3*2+l4*3+l5*4+l6*5
	hap=hap%11
	hap=11-hap
	hap=hap%10
	if (hap != l7)
	{
	  error(myform.jumin1,'없는 주민등록번호 입니다.\n\n다시 입력해 주세요!!');
	}


	var i9=0

	if (!errfound)
		document.myform.submit();
	}

}



function birth_check() {
        strjumin = document.myform.jumin1.value

        if(strjumin.substring(0,2) > "05")
                document.myform.Byear.value = "19" + strjumin.substring(0,2)
        else
                document.myform.Byear.value = "20" + strjumin.substring(0,2)

        bmonth_pos = strjumin.substring(2,4) - 1
        bday_pos = strjumin.substring(4,6) - 1

        document.myform.Bmonth[bmonth_pos].selected = true
        document.myform.Bday[bday_pos].selected = true

        document.myform.jumin2.focus()

}

function birth_write()
{
if(myform.jumin1.value != "")
{
myform.Byear.value = "19" + myform.jumin1.value.substring(0,2);
myform.Bmonth.value = myform.jumin1.value.substring(2,4);
myform.Bday.value = myform.jumin1.value.substring(4,6);
}else{
myform.Byear.value = "";
myform.Bmonth.value = "";
myform.Bday.value = "";
}
}



var isNN = (navigator.appName.indexOf("Netscape")!=-1);

function autoTab(input,len, e) {
        var keyCode = (isNN) ? e.which : e.keyCode;
        var filter = (isNN) ? [0,8,9] : [0,8,9,16,17,18,37,38,39,40,46];
        if(input.value.length >= len && !containsElement(filter,keyCode)) {
        input.value = input.value.slice(0, len);
        input.form[(getIndex(input)+1) % input.form.length].focus();
}

function aaa(e) {
        var keyCode = (isNN) ? e.which : e.keyCode;
        alert(keyCode);
        return false;
}
function containsElement(arr, ele) {
        var found = false, index = 0;
        while(!found && index < arr.length)
        if(arr[index] == ele)
        found = true;
        else
        index++;
        return found;
}

function getIndex(input) {
        var index = -1, i = 0, found = false;
        while (i < input.form.length && index == -1)
        if (input.form[i] == input)index = i;
        else i++;
        return index;
        }
return true;

}




