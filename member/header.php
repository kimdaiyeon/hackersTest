<?php
	session_start();
	$nm =$_SESSION['nm'];
	$no =$_SESSION['no'];
	$id =$_SESSION['id'];	
	$idlevel =$_SESSION['idlevel'];
?>
<div class="nav-section">
	<div class="inner p-r">
		<h1><a href="/"><img src="http://img.hackershrd.com/common/logo.png" alt="해커스 HRD LOGO" width="165" height="37"/></a></h1>
		<div class="nav-box">
			<h2 class="hidden">주메뉴 시작</h2>
			
			<ul class="nav-main-lst">
				<li class="mnu">
					<a href="#">일반직무</a>
					<ul class="nav-sub-lst">
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
					</ul>
				</li>
				<li class="mnu2">
					<a href="#">산업직무</a>
					<ul class="nav-sub-lst">
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
					</ul>
				</li>
				<li class="mnu3">
					<a href="#">공통역량</a>
					<ul class="nav-sub-lst">
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
					</ul>
				</li>
				<li class="mnu4">
					<a href="#">어학 및 자격증</a>
					<ul class="nav-sub-lst">
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
					</ul>
				</li>
				<li class="mnu5">
					<a href="#">직무교육 안내</a>
					<ul class="nav-sub-lst">
						<li><a href="/lecture/back/indexBack.php?mode=list">수강후기</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
					</ul>
				</li>
				<li class="mnu6">
					<a href="#">내 강의실</a>
					<ul class="nav-sub-lst">
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
						<li><a href="#">서브메뉴</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>

	<div class="nav-sub-box">
		<div class="inner"><!-- <a href="#"><img src="/" alt="배너이미지" width="171" height="196"></a> --></div>
	</div>

</div>

<div class="top-section">
	<div class="inner">
		<div class="link-box">
			<!-- 로그인전 -->
			<? if(!isset($_SESSION['id'])) { ?>
			<div id="logoff">
				<a href="/member/login.html">로그인</a>
				<a href="/member/index.php?mode=step_01">회원가입</a>
				<a href="#">상담/고객센터</a>
			</div>
			<? } else { ?>
			<!-- 로그인후 -->
			<div id="logon">
				<a href="/member/logout.php"><? echo $_SESSION['nm'] ?> 님 로그아웃</a>
				<a href="/member/index.php?mode=modify">내정보</a>
				<a href="#">상담/고객센터</a>
				<?if($idlevel >= 7){?>
					<a href="/admin/index.php">관리자페이지</a>
				<?}?>
			</div>
			<? } ?>
		</div>
	</div>
</div>