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
<script type="text/javascript" src="http://test.hackers.com/lecture/common.js"></script>
<script>
	$(document).ready(function(){
		listChange('',1);
	});
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
		<? include_once "{$_SERVER['DOCUMENT_ROOT']}/member/header.php"; ?>
	</div>
<div id="container" class="container">
	<div id="nav-left" class="nav-left">
		<div class="nav-left-tit"> 
			<span>직무교육 안내</span>
		</div>
		<ul class="nav-left-lst">
			<? include_once "{$_SERVER['DOCUMENT_ROOT']}/lecture/view/include/BoardLeft.php"; ?>
		</ul>
	</div>

	<div id="content" class="content">
		<div class="tit-box-h3">
			<h3 class="tit-h3">수강후기</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>직무교육 안내</span>
				<strong>수강후기</strong>
			</div>
		</div>

		<ul class="tab-list tab5">
			<li class="on" id="all" onclick=changeTab(this.id);><a href="#" onclick="listChange('','1','tab')">전체</a></li>
			<li id="jic1" onclick=changeTab(this.id);><a href='#' onclick="listChange('일반직무','1','tab')">일반직무</a></li>
			<li id="jic2" onclick=changeTab(this.id);><a href='#' onclick="listChange('산업직무','1','tab')">산업직무</a></li>
			<li id="jic3" onclick=changeTab(this.id);><a href='#' onclick="listChange('공통역량','1','tab')">공통역량</a></li>
			<li id="jic4" onclick=changeTab(this.id);><a href='#' onclick="listChange('어학및자격증','1','tab')">어학및자격증</a></li>
		</ul>
		<div class="search-info">
			<div class="search-form f-r">
				<select class="input-sel" id="board_type"style="width:158px">
					<option value="">전체</option>
					<option value="일반직무">일반직무</option>
					<option value="산업직무">산업직무</option>
					<option value="공통역량">공통역량</option>
					<option value="어학및자격증">어학및자격증</option>
				</select>
				<select class="input-sel" id="board_select" style="width:158px">
					<option value="강의명">강의명</option>
					<option value="작성자">작성자</option>
				</select>
				<input type="text" class="input-text" id="board_textVal" placeholder="강의명을 입력하세요." style="width:158px"/>
				<button type="button" class="btn-s-dark" onclick="listChange()">검색</button>
			</div>
		</div>
		<div id="boardList">
		
		</div>
		<div class="box-btn t-r">
			<?if($_SESSION['id']){?>
				<a href="/lecture/back/indexBack.php?mode=write" class="btn-m">후기 작성</a>
			<?}?>
		</div>
	</div>
</div>


	<div id="footer" class="footer">
		<? include_once "{$_SERVER['DOCUMENT_ROOT']}/member/footer.php"; ?>
	</div>
</div>
</body>
</html>
