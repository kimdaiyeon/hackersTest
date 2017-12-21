<div id="container" class="container">
	<div id="nav-left" class="nav-left">
		<div class="nav-left-tit"> 
			<span>직무교육 안내</span>
		</div>
		<ul class="nav-left-lst">
			<? include_once "{$_SERVER['DOCUMENT_ROOT']}/lecture_board/view/include/BoardLeft.php"; ?>
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
				<a href="/lecture_board/index.php?mode=write" class="btn-m">후기 작성</a>
			<?}?>
		</div>
	</div>
</div>
<script type="text/javascript" src="http://test.hackers.com/lecture_board/common.js"></script>
<script>
	$(document).ready(function(){
		listChange('',1);
	});
</script>