<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<!--[if (IE 7)]><html class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<!--[if (IE 8)]><html class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" id="X-UA-Compatible" content="IE=EmulateIE10" />
<title>해커스 HRD</title>
<meta name="description" content="해커스 HRD" />
<meta name="keywords" content="해커스, HRD" />

<!-- 파비콘설정 -->
<link rel="shortcut icon" type="image/x-icon" href="http://img.hackershrd.com/common/favicon.ico" />
<?php 
	include("/member/membervar.php");
?>
<!-- xhtml property속성 벨리데이션 오류/확인필요 -->
<meta property="og:title" content="해커스 HRD" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.hackershrd.com/" />
<meta property="og:image" content="http://img.hackershrd.com/common/og_logo.png" />

<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/common.css" />
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/bxslider.css" />
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/main.css" /><!-- main페이지에만 호출 -->
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/sub.css" /><!-- sub페이지에만 호출 -->
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/login.css" /><!-- login페이지에만 호출 -->

<script type="text/javascript" src="/member/common.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
<!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script><script charset="UTF-8" type="text/javascript" src="http://t1.daumcdn.net/cssjs/postcode/1506320738556/170925.js"></script>
<script>
    //본 예제에서는 도로명 주소 표기 방식에 대한 법령에 따라, 내려오는 데이터를 조합하여 올바른 주소를 구성하는 방법을 설명합니다.
    function find_juso() {
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
                document.getElementById('pun').value = data.zonecode; //5자리 새우편번호 사용
                document.getElementById('adress1').value = fullRoadAddr;
            }
        }).open();
    }
</script>
<script>
	$(document).ready(function(){
		var pageCheck = "<?=$_SESSION['pageCheck']?>";
		if(pageCheck == "3go"){
			$("#footer").load("/member/footer.php");
			$("#header").load("/member/header.php");
			//alert("<?=$_SESSION['phone3']?>");
			//alert("<?= $phone3?>");
			$("#pNum1").val("<?=$phone1?>");
			$("#pNum2").val("<?=$phone2?>");
			$("#pNum3").val("<?=$phone3?>");
			$("#radio1").click();
			$("#radio2").click();
		}else{
			alert("잘못된 접근입니다.");
			location.replace("/");
		}
		$('#id1').blur(function(){
			var idReg = /^[a-z]+[a-z0-9]{3,14}$/g;
			if( !idReg.test( $("#id1").val() ) ) {
				$("#idCheckText").html("형식에 비적합한 아이디입니다.");
				$("#idCheckText").css("color","red");
				$("#idCheckText").css("margin-left","5px");
			}else{
				$("#idCheckText").html("형식에 적합한 아이디입니다.");
				$("#idCheckText").css("color","blue");
				$("#idCheckText").css("margin-left","5px");
			}
		});
		$('#pw1').blur(function(){
			var pw1 = $('#pw1').val();
			var pw2 = $('#pw2').val();
			var pwReg = /^[A-za-z0-9]{7,14}/g;
			if(!pwReg.test(pw1)){
				$("#pw1CheckText").html("형식에 비적합한 비밀번호입니다.");
				$("#pw1CheckText").css("color","red");
				$("#pw1CheckText").css("margin-left","5px");
			}else{
				$("#pw1CheckText").html("형식에 적합한 비밀번호입니다.");
				$("#pw1CheckText").css("color","blue");
				$("#pw1CheckText").css("margin-left","5px");
			}
		});
		$('#pw2 ,#pw1').blur(function(){
			var pw1 = $('#pw1').val();
			var pw2 = $('#pw2').val();
			if( pw1 != pw2 ) {
				$("#pw2CheckText").html("비밀번호가 일치하지 않습니다.");
				$("#pw2CheckText").css("color","red");
				$("#pw2CheckText").css("margin-left","5px");
			}else{
				$("#pw2CheckText").html("비밀번호가 일치합니다.");
				$("#pw2CheckText").css("color","blue");
				$("#pw2CheckText").css("margin-left","5px");
			}
		});
		$('#email2').blur(function(){
			var email2 = $('#email2').val();
			
			if(email2.indexOf(".com") == -1 && email2.indexOf(".co.kr") == -1 && email2.indexOf(".net") == -1 ) {
				$("#email2CheckText").html("올바른 이메일이 아닙니다.");
				$("#email2CheckText").css("color","red");
				$("#email2CheckText").css("margin-left","5px");
			}else{
				$("#email2CheckText").html("");
				$("#email2CheckText").css("color","blue");
				$("#email2CheckText").css("margin-left","5px");
			}
		});
	})
	function onlyNumber(event){
		event = event || window.event;
		var keyID = (event.which) ? event.which : event.keyCode;
		if ( (keyID >= 48 && keyID <= 57) || (keyID >= 96 && keyID <= 105) || keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39 || keyID == 9) 
			return;
		else
			return false;
	}
	function memberRegist(){
		//var paraD = $('form').serialize();
		var name1 = $('#name1').val();
		var id1 = $('#id1').val();
		var pw1 = $('#pw1').val();
		var pw2 = $('#pw2').val();
		var email1 = $('#email1').val();
		var email2 = $('#email2').val();
		var pNum1 = $('#pNum1').val();
		var pNum2 = $('#pNum2').val();
		var pNum3 = $('#pNum3').val();
		var nNum1 = $('#nNum1').val();
		var nNum2 = $('#nNum2').val();
		var nNum3 = $('#nNum3').val();
		var pun = $('#pun').val();
		var adress1 = $('#adress1').val();
		var adress2 = $('#adress2').val();
		var radio1 = $('#radio1:checked').val();
		var radio2 = $('#radio2:checked').val();
		var idCheckH = $('#idCheckH').val();
		if(name1==""){
			alert("이름을 입력해주세요.");
			$('#name1').focus();
			return false;
		}
		if(id1==""){
			alert("ID를 입력해주세요.");
			$('#id1').focus();
			return false;
		}
		if(idCheckH =="n"){
			alert("아이디 중복확인을 해주세요.");
			$('#id1').focus();
			return false;
		}
		if(pw1 == ""){
			alert("비밀번호를 입력해주세요.");
			$('#pw1').focus();
			return false;
		}
		if(pw2 == ""){
			alert("비밀번호 확인을 입력해주세요.");
			$('#pw2').focus();
			return false;
		}
		if(pw1 != pw2){
			alert("비밀번호가 일치하지 않습니다.");
			$('#pw1').focus();
			return false;
		}
		if(email1 == "" || email2 == ""){
			alert("이메일을 입력해주세요");
			$('#email1').focus();
			return false;
		}
		if(pNum1 == "" || pNum2 == "" || pNum3 == ""){
			alert("핸드폰번호를 입력해주세요");
			$("#pNum1").attr('disabled', false);
			$("#pNum2").attr('disabled', false);
			$("#pNum3").attr('disabled', false);
			$('#pNum1').focus();
			return false;
		}
		if(adress1 == "" || pun == ""){
			alert("주소를 입력해주세요.");
			$('#adress1').focus();
			return false;
		}
		if($("#pw1CheckText").css("color") != "rgb(0, 0, 255)"){
			alert("형식에 비적합한 비밀번호입니다.");
			$('#pw1').focus();
			return false;
		}
		if($("#pw2CheckText").css("color") != "rgb(0, 0, 255)"){
			alert("비밀번호가 일치하지 않습니다.");
			$('#pw2').focus();
			return false;
		}
		if($("#email2CheckText").css("color") != "rgb(0, 0, 255)"){
			alert("올바른 이메일이 아닙니다.");
			$('#email2').focus();
			return false;
		}
		var paramdate = {
				nm:name1,
				id:id1,
				pw:pw1,
				email:email1+'@'+email2,
				pNum:pNum1+"-"+pNum2+"-"+pNum3,
				nNum:nNum1+"-"+nNum2+"-"+nNum3,
				pun:pun,
				adress:adress1,
				adressdetail:adress2,
				snsinfo:radio1,
				mailinfo:radio2
				};


		$.ajax({
			url:"/member/memberInsert.php",
			type:"POST",
			data: paramdate,
			dataType:"json",
			success:function(data){
				if(data == "1"){
					var pageCheck = "4go";
					$.post("/member/membervar.php",{pageCheck:pageCheck},
						function(data){
							location.replace("/member/index.php?mode=regist");
					});
				}else{
					alert("회원가입이 실패하였습니다.");
				}
			},
			error:function(){
				alert("회원가입이 실패하였습니다.");
			}
		});
	}
	function checkId(){
		var chId = $("#id1").val();
		// $.post("/member/checkId.php",{chId:chId},
		// 	function(data){
		// 		alert(data);
		// });
		if($("#idCheckText").css("color") == "rgb(0, 0, 255)"){
			$.ajax({
				url:"/member/checkId.php",
				type:"POST",
				data:{
					chId:chId
					//$("form").serialize()
				},
				success:function(result){	
					if(result == 0){
						alert("사용 가능한 ID입니다.")
						$("#idCheckH").val("y");
						$("#id1").attr('disabled', true);
					}else{
						alert("이미 사용중인 ID입니다.")
						$("#idCheckH").val("n");
						$("#id1").attr('disabled', false);
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
	function selectEmail1(){
		$('#email2').val($('#emailSelect > option:selected').val());
	}
</script>
</head><body>
<!-- skip nav -->
<div id="skip-nav">
<a href="#content">본문 바로가기</a>
</div>
<!-- //skip nav -->

<div id="wrap">
	<div id="header" class="header">
		
	</div>
<form>
	<input type="hidden" id="idCheckH" value="n"/>
	<div id="container" class="container-full">
		<div id="content" class="content">
			<div class="inner">
				<div class="tit-box-h3">
					<h3 class="tit-h3">회원가입</h3>
					<div class="sub-depth">
						<span><i class="icon-home"><span>홈</span></i></span>
						<strong>회원가입</strong>
					</div>
				</div>

				<div class="join-step-bar">
					<ul>
						<li><i class="icon-join-agree"></i> 약관동의</li>
						<li><i class="icon-join-chk"></i> 본인확인</li>
						<li class="last on"><i class="icon-join-inp"></i> 정보입력</li>
					</ul>
				</div>

				<div class="section-content">
					<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
						<caption class="hidden">강의정보</caption>
						<colgroup>
							<col style="width:15%"/>
							<col style="*"/>
						</colgroup>

						<tbody>
							<tr>
								<th scope="col"><span class="icons">*</span>이름</th>
								<td><input type="text" name="name1" id="name1" class="input-text" style="width:302px"/></td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>아이디</th>
								<td>
									<input type="text" name="id1" id="id1" class="input-text" style="width:302px" placeholder="영문자로 시작하는 4~15자의 영문소문자, 숫자"/>
									<a href="#" onclick="checkId()" class="btn-s-tin ml10">중복확인</a>
									<a id="idCheckText" style="margin-left:5px;"></a>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>비밀번호</th>
								<td>
									<input type="password" name="pw1" id="pw1" class="input-text" style="width:302px" placeholder="8-15자의 영문자/숫자 혼합"/>
									<a id="pw1CheckText" style="margin-left:5px;"></a>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>비밀번호 확인</th>
								<td>
									<input type="password" name="pw2" id="pw2" class="input-text" style="width:302px"/>
									<a id="pw2CheckText" style="margin-left:5px;"></a>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>이메일주소</th>
								<td>
									<input type="text" name="email1" id="email1" class="input-text" style="width:138px"/> @ <input type="text" name="email2" id="email2" class="input-text" style="width:138px"/>
									<select class="input-sel" id="emailSelect" onchange="selectEmail1()" style="width:160px">
										<option value="">직접 입력</option>
										<option value="naver.com">naver.com</option>
										<option value="daum.net">daum.net</option>
										<option value="gmail.com">gmail.com</option>
										<option value="haha.co.kr">haha.co.k</option>
									</select>
									<a id="email2CheckText" style="margin-left:5px;"></a>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>휴대폰 번호</th>
								<td>
									<input type="text" name="pNum1" id="pNum1" class="input-text" style="width:50px" disabled /> - 
									<input type="text" name="pNum2" id="pNum2" class="input-text" style="width:50px" disabled /> - 
									<input type="text" name="pNum3" id="pNum3" class="input-text" style="width:50px" disabled />
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons"></span>일반전화 번호</th>
								<td><input type="text" name="nNum1" id="nNum1" onkeydown='return onlyNumber(event)' class="input-text" style="width:88px"/> - <input type="text" name="nNum2" id="nNum2" onkeydown='return onlyNumber(event)' class="input-text" style="width:88px"/> - <input type="text" name="nNum3" id="nNum3" onkeydown='return onlyNumber(event)' class="input-text" style="width:88px"/></td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>주소</th>
								<td>
									<p >
										<label>우편번호 <input type="text" class="input-text ml5" name="pun" id="pun" style="width:242px" disabled /></label><a href="#" onclick="find_juso()" class="btn-s-tin ml10">주소찾기</a>
									</p>
									<p class="mt10">
										<label>기본주소 <input type="text" class="input-text ml5" name="adress1" id="adress1" style="width:719px"/></label>
									</p>
									<p class="mt10">
										<label>상세주소 <input type="text" class="input-text ml5" name="adress2" id="adress2" style="width:719px"/></label>
									</p>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>SMS수신</th>
								<td>
									<div class="box-input">
										<label class="input-sp">
											<input type="radio" name="radio1" id="radio1" value="y" id="" checked="checked"/>
											<span class="input-txt">수신함</span>
										</label>
										<label class="input-sp">
											<input type="radio" name="radio1" id="radio1" value="n" id="" />
											<span class="input-txt">미수신</span>
										</label>
									</div>
									<p>SMS수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>메일수신</th>
								<td>
									<div class="box-input">
										<label class="input-sp">
											<input type="radio" name="radio2" id="radio2" value="y" id="" checked="checked"/>
											<span class="input-txt">수신함</span>
										</label>
										<label class="input-sp">
											<input type="radio" name="radio2" id="radio2" value="n" id="" />
											<span class="input-txt">미수신</span>
										</label>
									</div>
									<p>메일수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
								</td>
							</tr>
						</tbody>
					</table>

					<div class="box-btn">
						<!-- <input type="submit" value="회원가입" class="btn-l"> -->
						<a href="#" onclick="memberRegist();" class="btn-l">회원가입</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

	<div id="footer" class="footer">
		
	</div>
</div>
</body>
</html>
