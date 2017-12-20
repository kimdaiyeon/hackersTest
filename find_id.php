
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<!--[if (IE 7)]><html class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<!--[if (IE 8)]><html class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" id="X-UA-Compatible" content="IE=EmulateIE8" />
<title>해커스 HRD</title>
<meta name="description" content="해커스 HRD" />
<meta name="keywords" content="해커스, HRD" />
<!-- 파비콘설정 -->
<link rel="shortcut icon" type="image/x-icon" href="http://img.hackershrd.com/common/favicon.ico" />

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

<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
<script type="text/javascript" src="/member/common.js"></script>
<script type="text/javascript" src="/member/init.js"></script>
<script>
	 function findId(){
		var findId_name = $("#findId_nameText").val();
		if($('input:radio[id=findId_phone]').is(':checked')){
			var findId_phone = $("#findId_phone1").val();
			findId_phone += "-";
			findId_phone += $("#findId_phone2").val();
			findId_phone += "-";
			findId_phone += $("#findId_phone3").val();
		}else{
			var findId_email = $('#findId_email1').val();
			findId_email += '@';
			findId_email += $('#findId_email2').val();
		}
		var findId_inbun = $("#findId_inbun").val();


		if(findId_name == ""){
			alert("성명을 입력해주세요");
			return false;
		}else if($('input:radio[id=findId_phone]').is(':checked')){
			if(findId_phone == ""){
				alert("핸드폰번호을 입력해주세요");
				return false;
			}else{
				if(findId_inbun != "123456"){
					alert("인증번호가 일치하지않습니다.");
					return false;
				}
			}
		}else if($('input:radio[id=findId_email]').is(':checked')){
			if(findId_email == ""){
				alert("이메일을 입력해주세요");
				return false;
			}else{
				if(findId_email != "123456"){
					alrt("인증번호가 일치하지않습니다.");
					return false;
				}
			}
		}
		if(findId_inbun == ""){
			alert("인증번호를 입력해주세요.");
			return false;
		}else if($("#findId_phoneInbunCheck").val() == "n"){
			alert("인증을 완료하지않았습니다.");
			return false;
		}else if( $("#findId_nameTextCheck").css("color") !="rgb(0, 0, 255)" ){
			alert("성명이 올바르지 않습니다.");
			return false;
		}else{
			var pageCheck = "findId_ok";
			var paramdate ={
				findId_name:findId_name,
				findId_phone:findId_phone,
				findId_email:findId_email,
				findId_inbun:findId_inbun
			};
			$.ajax({
			url:"/member/findId.php",
			type:"POST",
			data: paramdate,
			success:function(data){
				if(data){
					location.replace("/findId_ok.php");
				}else{
					//아이디 조회시 없을때
					alert("찾을수 없는 ID입니다.");
					history.go(-1);
				}
			},
			error:function(data){
				alert(data);
			}
		});
		}
	 }
</script>
<!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->

</head><body>
<!-- skip nav -->
<div id="skip-nav">
<a href="#content">본문 바로가기</a>
</div>
<!-- //skip nav -->

<div id="wrap">
	<div id="header" class="header">
		
	</div>
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">아이디/비밀번호 찾기</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>아이디/비밀번호 찾기</strong>
				</div>
			</div>

			<ul class="tab-list">
				<li class="on"><a href="/member/index.php?mode=find_id">아이디 찾기</a></li>
				<li ><a href="/member/index.php?mode=find_pass">비밀번호 찾기</a></li>
			</ul>

			<div class="tit-box-h4">
				<h3 class="tit-h4">아이디 찾기 방법 선택</h3>
			</div>
			<dl class="find-box">
				<dt>휴대폰 인증</dt>
				<dd>
					고객님이 회원 가입 시 등록한 휴대폰 번호와 입력하신 휴대폰 번호가 동일해야 합니다.
					<label class="input-sp big">
						<input type="radio" name="radio" id="findId_phone" onclick="radioCheck(this)" checked/>
						<span class="input-txt"></span>
					</label>
				</dd>
			</dl>

			<dl class="find-box">
				<dt>이메일 인증</dt>
				<dd>
					고객님이 회원 가입 시 등록한 이메일 주소와 입력하신 이메일 주소가 동일해야 합니다.
					<label class="input-sp big">
						<input type="radio" name="radio"  id="findId_email" onclick="radioCheck(this)" />
						<span class="input-txt"></span>
					</label>
				</dd>
			</dl>

			<div class="section-content mt30">
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">아이디 찾기 개인정보 입력</caption>
					<colgroup>
						<col style="width:15%"/>
						<col style="*"/>
					</colgroup>

					<tbody>
						<tr>
							<th scope="col">성명</th>
							<td>
								<input type="text" class="input-text" id="findId_nameText" onchange="onlyKrEn(this.id,'성명')"; style="width:302px" />
								<a id="findId_nameTextCheck"></a>
							</td>
						</tr>
						<tr id="findId_phoneTR" style="display:">
							<th scope="col">핸드폰번호</th>
							<td>
								<input type="text" class="input-text" onkeydown='return onlyNumber(event)' onkeyup='removeChar(event)' id="findId_phone1" maxlength="3" style="width:50px"/> - 
								<input type="text" class="input-text" onkeydown='return onlyNumber(event)' onkeyup='removeChar(event)' id="findId_phone2" maxlength="4" style="width:50px"/> - 
								<input type="text" class="input-text" onkeydown='return onlyNumber(event)' onkeyup='removeChar(event)' id="findId_phone3" maxlength="4" style="width:50px"/>
								<a href="#" class="btn-s-tin ml10" onclick="phoneNumberCheck('findId_')">인증번호 받기</a>
								<input type="hidden" id="findId_phoneInbunCheck" value="n"/>
							</td>
						</tr>
						<tr id="findId_emailTR" style="display:none">
							<th scope="col">이메일주소</th>
							<td>
								<input type="text" class="input-text" id="findId_email1" style="width:138px"/> @ <input type="text" id="findId_email2"class="input-text" style="width:138px"/>
								<select class="input-sel" style="width:160px" id="findId_emailSelect" onchange="selectEmail('findId_')">
									<option value="">직접 입력</option>
									<option value="naver.com">naver.com</option>
									<option value="daum.net">daum.net</option>
									<option value="gmail.com">gmail.com</option>
									<option value="haha.co.kr">haha.co.k</option>
								</select>
								<a href="#" class="btn-s-tin ml10">인증번호 받기</a>
								<input type="hidden" id="findId_mailInbunCheck" value="n"/>
							</td>
						</tr>
						<tr>
							<th scope="col">인증번호</th>
							<td>
								<input type="text" class="input-text" id="findId_inbun" onkeydown='return onlyNumber(event)' onkeyup='removeChar(event)' maxlength="6" style="width:478px" />
								<a href="#" class="btn-s-tin ml10" onclick="findId()">인증번호 확인</a>
							</td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

	<div id="footer" class="footer">
		
	</div>
</div>
</body>
</html>
