<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">회원가입</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>회원가입 완료</strong>
				</div>
			</div>

			<div class="join-step-bar">
				<ul>
					<li><i class="icon-join-agree"></i> 약관동의</li>
					<li class="on"><i class="icon-join-chk"></i> 본인확인</li>
					<li class="last"><i class="icon-join-inp"></i> 정보입력</li>
				</ul>
			</div>

			<div class="tit-box-h4">
				<h3 class="tit-h4">본인인증</h3>
			</div>

			<div class="section-content after">
				<div class="identify-box" style="width:100%;height:190px;">
					<div class="identify-inner">
						<strong>휴대폰 인증</strong>
						<p>주민번호 없이 메시지 수신가능한 휴대폰으로 1개 아이디만 회원가입이 가능합니다. </p>

						<br />
						<input type="text" class="input-text" onkeydown='return onlyNumber(event)' onkeyup='removeChar(event)' id="phone1" style="width:50px"/> - 
						<input type="text" class="input-text" onkeydown='return onlyNumber(event)' onkeyup='removeChar(event)' id="phone2" style="width:50px"/> - 
						<input type="text" class="input-text" onkeydown='return onlyNumber(event)' onkeyup='removeChar(event)' id="phone3" style="width:50px"/>
						<a href="#" class="btn-s-line" id="inbunGo">인증번호 받기</a>
						<input="hidden" id="inbunCheck" value="n">

						<br /><br />
						<input type="text" class="input-text"  onkeydown='return onlyNumber(event)' onkeyup='removeChar(event)' id="phoneNumber" style="width:200px" value="<?php echo $aa; ?>"/>
						<a href="#" onclick="checkPhoneNumber();" class="btn-s-line">인증번호 확인</a>
					</div>
					<i class="graphic-phon"><span>휴대폰 인증</span></i>
				</div>
			</div>

		</div>
	</div>
</div>
<script>
	 $(document).ready(function(){
		var pageCheck = "<?=$_SESSION['pageCheck']?>";
		if(pageCheck == "2go"){
			$('#phone1').on('keyup', function() {
				if($(this).val().length > 3) {
					$(this).val($(this).val().substring(0, 3));
				}
			});
			$('#phone2,#phone3').on('keyup', function() {
				if($(this).val().length > 4) {
					$(this).val($(this).val().substring(0, 4));
				}
			});
		}else{
			alert("잘못된 접근입니다.");
			location.replace("/");
		}
		$("#inbunGo").click(function(){
			$("#inbunCheck").val("y");
		})
	})
function checkPhoneNumber(){
	if($("#inbunCheck").val() == "n"){
		alert("인증번호를 받아주세요.");
	}else{
		var checknumber = $("#phoneNumber").val();
		if(checknumber == "123456"){
			var phone1 = $("#phone1").val();
			var phone2 = $("#phone2").val();
			var phone3 = $("#phone3").val();
			var pageCheck = "3go";
			$.post("/member/membervar.php",{phone1:phone1,phone2:phone2,phone3:phone3,pageCheck:pageCheck},
				function(data){
					location.replace("/member/index.php?mode=step_03");
			});
		}else{
			alert("인증번호가 일치하지 않습니다.");
		}
	}
}
</script>