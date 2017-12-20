//메일 선택시
function selectEmail(usePage){
    $('#'+usePage+'email2').val($('#'+usePage+'emailSelect > option:selected').val());
};
//숫자만 입력(ex.핸드폰,인증번호)
function onlyNumber(event){
	event = event || window.event;
	var keyID = (event.which) ? event.which : event.keyCode;
	if ( (keyID >= 48 && keyID <= 57) || (keyID >= 96 && keyID <= 105) || keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39 || keyID == 9) 
		return;
	else
		return false;
}
function removeChar(event) {
    event = event || window.event;
    var keyID = (event.which) ? event.which : event.keyCode;
    if ( keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39 ) 
        return;
    else
        event.target.value = event.target.value.replace(/[^0-9]/g, "");
}
//한글과 영문만(ex.성명)
function onlyKrEn(textId,textKr){
    var terms=/^[가-힣a-zA-Z]+$/g;
    if( !terms.test( $('#'+textId+'').val() ) ) {
        $('#'+textId+'Check').html('형식에 비적합한 '+textKr+' 입니다.');
        $('#'+textId+'Check').css("color","red");
        $('#'+textId+'Check').css("margin-left","5px");
    }else{
        $('#'+textId+'Check').html('형식에 적합한 '+textKr+' 입니다.');
        $('#'+textId+'Check').css("color","blue");
        $('#'+textId+'Check').css("margin-left","5px");
    }
}
//한글과 영문과 숫자만(ex.아이디)
function onlyKrEnNu(textId,textKr){
    var terms=/^[가-힣a-zA-Z0-9]+$/g;
    if( !terms.test( $('#'+textId+'').val() ) ) {
        $('#'+textId+'Check').html('형식에 비적합한 '+textKr+' 입니다.');
        $('#'+textId+'Check').css("color","red");
        $('#'+textId+'Check').css("margin-left","5px");
    }else{
        $('#'+textId+'Check').html('형식에 적합한 '+textKr+' 입니다.');
        $('#'+textId+'Check').css("color","blue");
        $('#'+textId+'Check').css("margin-left","5px");
    }
}
var saveID = "findId_phone";
function radioCheck(choiseID){
    //var result = $('input:radio[id='+choiseID.id+']').is(':checked');
    $('#'+choiseID.id+'TR').css("display","");
    $('#'+saveID+'TR').css("display","none");
    saveID = choiseID.id;
}
var saveID = "findPw_phone";
function radioCheck2(choiseID){
    //var result = $('input:radio[id='+choiseID.id+']').is(':checked');
    $('#'+choiseID.id+'TR').css("display","");
    $('#'+saveID+'TR').css("display","none");
    saveID = choiseID.id;
}
//올바른 핸드폰번호인지 확인후 인증번호 받기
function phoneNumberCheck(usepage){
    var phonenumber = $('#'+usepage+'phone1').val();
    phonenumber += $('#'+usepage+'phone2').val();
    phonenumber += $('#'+usepage+'phone3').val();

    if(phonenumber.length == 11){
        $('#'+usepage+'phoneInbunCheck').val("y");
        alert("인증메세지가 전송되었습니다.");
    }else{
        alert("올바른 핸드폰 번호가 아닙니다.");
    }
}
// //성명 확인
// function chka2(obj){
//     if (event.keyCode == 32 ) // 스페이스 입력 가능
//     {
//      return;
//     }else if(( event.keyCode < 65) || ( keyCode > 122 && event.keyCode <= 127)  ){
//       alert("한글과 영문만 입력이 가능합니다");
//                   event.keyCode = null;
//       return;
//           }
//   }

//전화번호 합치기
function numPlus(num1,num2,num3){
    var num = num1+"-"+num2+"-"+num3;
    return num;
}
//전화번호 나누기
function numSplit(num){
    var numlist = num.splite("-");
    for(var i; i < numlist.length; i++){
        alert(i);
    }
    return numlist;
}
//ID 중복 체크
function idCheck(usepage){
    var chId = $('#'+usepage+'idText').val();
    if($('#'+usepage+'idTextCheck').css("color") == "rgb(0, 0, 255)"){
        $.ajax({
            url:"/member/checkId.php",
            type:"POST",
            data:{
                chId:chId
            },
            success:function(result){	
                if(result == 0){
                    alert("사용 가능한 ID입니다.")
                    //중복확인 했다 안했다.
                    $('#'+usepage+'idCheckH').val("y");
                    $('#'+usepage+'idText').attr('disabled', true);
                }else{
                    alert("이미 사용중인 ID입니다.")
                    //중복확인 했다 안했다.
                    $('#'+usepage+'idCheckH').val("n");
                    $('#'+usepage+'idText').attr('disabled', false);
                }
            },
            error:function(){
                alert("실패");
            }
        });
    }else{
        alert("아이디를 다시 입력하세요.");
    }
}
function memberupdate_check(usepage){
    var no = $('#'+usepage+'no').val();
    //var nameStr = $('#'+usepage+'nameText').val();
    var nameStr = $('#'+usepage+'nameText')[0].innerText;
    var idStr = $('#'+usepage+'idText').val();
    var dbidStr = $('#'+usepage+'dbIdText').val();
    var pwStr = $('#'+usepage+'pwText').val();
    var pw2Str = $('#'+usepage+'pw2Text').val();
    var email1Str = $('#'+usepage+'email1Text').val();
    var email2Str = $('#'+usepage+'email2Text').val();
    var nnum1Str = $('#'+usepage+'nnum1Text').val();
    var nnum2Str = $('#'+usepage+'nnum2Text').val();
    var nnum3Str = $('#'+usepage+'nnum3Text').val();
    var pun = $('#'+usepage+'punText').val();
    var adressStr = $('#'+usepage+'adressText').val();
    var adressdetailStr = $('#'+usepage+'adressdetailText').val();
    var snsinfo = $('#'+usepage+'snsinfo:checked').val();
    var mailinfo = $('#'+usepage+'mailinfo:checked').val();
    var idCheckH = $('#'+usepage+'idCheckH').val();

    if(idStr == ""){
        aler("ID를 입력해주세요.");
        $('#'+usepage+'idText').focus();
        return false;
    }else if(email1Str == "" || email2Str == ""){
        aler("Email을 입력해주세요.");
        $('#'+usepage+'email1Text').focus();
        return false;
    }else if(pun == ""){
        aler("우편번호를 입력해주세요.");
        $('#'+usepage+'punText').focus();
        return false;
    }else if(adressStr == ""){
        aler("주소를 입력해주세요.");
        $('#'+usepage+'adressText').focus();
        return false;
    }else if(idCheckH == 'n' || idStr != dbidStr){
        aler("ID중복확인을 해주세요.");
        $('#'+usepage+'idText').focus();
        return false;
    }else{
        //빈란,중복체크 확인 완료
        var paramdate = {
            no:no,
            nm:nameStr,
            id:idStr,
            pw:pwStr,
            email:email1Str+'@'+email2Str,
            nNum:nnum1Str+"-"+nnum2Str+"-"+nnum3Str,
            pun:pun,
            adress:adressStr,
            adressdetail:adressdetailStr,
            snsinfo:snsinfo,
            mailinfo:mailinfo
            };
            $.ajax({
                url:"/member/memberupdate.php",
                type:"POST",
                data: paramdate,
                success:function(data){
                    if(data == "1"){
                        alert("회원정보가 수정되었습니다.");
                        history.go(-1);
                    }else{
                        alert("수정실패");
                    }
                    
                },
                error:function(){
                    alert("회원가입이 실패하였습니다.");
                }
            });
    }
}
//주소찾기 다음API 함수
function find_juso_update() {
    new daum.Postcode({
        oncomplete: function(data) {
            // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

            // 도로명 주소의 노출 규칙에 따라 주소를 조합한다.
            // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
            var fullRoadAddr = data.roadAddress; // 도로명 주소 변수
            var extraRoadAddr = ''; // 도로명 조합형 주소 변수

            // 법정동명이 있을 경우 추가한다. (법정리는 제외)
            // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
            if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                extraRoadAddr += data.bname;
            }
            // 건물명이 있고, 공동주택일 경우 추가한다.
            if(data.buildingName !== '' && data.apartment === 'Y'){
               extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
            }
            // 도로명, 지번 조합형 주소가 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
            if(extraRoadAddr !== ''){
                extraRoadAddr = ' (' + extraRoadAddr + ')';
            }
            // 도로명, 지번 주소의 유무에 따라 해당 조합형 주소를 추가한다.
            if(fullRoadAddr !== ''){
                fullRoadAddr += extraRoadAddr;
            }
            
            // 우편번호와 주소 정보를 해당 필드에 넣는다.
            // $('#'+usepage+'punText').val(data.zonecode);
            // $('#'+usepage+'adressText').val(fullRoadAddr);
            document.getElementById('updateMember_punText').value = data.zonecode; //5자리 새우편번호 사용
            document.getElementById('updateMember_adressText').value = fullRoadAddr;
        }
    }).open();
}

function pwCheck(usePage){
    var pw1 = $('#'+usePage+'pwText').val();
    var pwReg = /^[A-za-z0-9]{7,14}/g;
    if(!pwReg.test(pw1)){
        $('#'+usePage+'pw1CheckText').html("형식에 비적합한 비밀번호입니다.");
        $('#'+usePage+'pw1CheckText').css("color","red");
        $('#'+usePage+'pw1CheckText').css("margin-left","5px");
    }else{
        $('#'+usePage+'pw1CheckText').html("형식에 적합한 비밀번호입니다.");
        $('#'+usePage+'pw1CheckText').css("color","blue");
        $('#'+usePage+'pw1CheckText').css("margin-left","5px");
    }
}