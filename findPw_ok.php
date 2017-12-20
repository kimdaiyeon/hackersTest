
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
<?php
	session_start();
?>
<script>
	function findPw_update(){
		var findPw_pw1 = $("#findPw_pwText").val();
		var findPw_pw2 = $("#findPw_pw2Text").val();
		if($("#findPw_pw1CheckText").css("color") == "rgb(0, 0, 255)")){
			alert("비밀번호를 확인해주세요.");
			$('#findPw_pwText').focus();
			return false;
		}else if(findPw_pw1 == findPw_pw2){
			var findPw_no = $("#findPw_no")[0].innerText;
			var pageCheck = "findPw_update";
			var paramdate ={
					findPw_no:findPw_no,
					findPw_pw1:findPw_pw1,
					findPw_pw2:findPw_pw2,
					pageCheck:pageCheck
				};
			$.ajax({
				url:"/member/findPw_update.php",
				type:"POST",
				data: paramdate,
				success:function(data){
					if(data == "1"){
						//로그인페이지로??
						alert("비밀번호가 변경되었습니다.");
						location.replace("/member/login.html");
					}else{
						alert("비밀번호 수정 실패");
					}
				},
				error:function(data){
					alert(data);
				}
			});
		}else{
			alert("비밀번호를 확인해주세요.");
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
				<li><a href="#">아이디 찾기</a></li>
				<li class="on"><a href="#">비밀번호 찾기</a></li>
			</ul>

			<div class="tit-box-h4">
				<h3 class="tit-h4">비밀번호 재설정</h3>
			</div>

			<div class="section-content mt30">
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">비밀번호 재설정</caption>
					<colgroup>
						<col style="width:17%"/>
						<col style="*"/>
					</colgroup>

					<tbody>
						<a id="findPw_no" style="display:none;"><?=$_SESSION['findPw_no']?><a/>
						<tr>
							<th scope="col">신규 비밀번호 입력</th>
							<td>
								<input type="password" class="input-text" id="findPw_pwText" onchange="pwCheck('findPw_')"placeholder="영문자로 시작하는 4~15자의 영문소문자,숫자" style="width:302px" />
								<a id="findPw_pw1CheckText" style="margin-left:5px;"></a>
							</td>
						</tr>
						<tr>
							<th scope="col">신규 비밀번호 재확인</th>
							<td><input type="password" class="input-text" id="findPw_pw2Text" style="width:302px" /></td>
						</tr>
					</tbody>
				</table>
				<div class="box-btn">
					<a href="#" class="btn-l" onclick="findPw_update()">확인</a>
				</div>
			</div>
		</div>
	</div>
</div>

	<div id="footer" class="footer">
	</div>
</div>
</body>
</html>