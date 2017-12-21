<div id="container" class="container">
	<div id="content" class="content" style="width:auto;">
		<div class="tit-box-h3">
			<h3 class="tit-h3">관리자 페이지</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>관리자페이지</span>
				<strong>강의List</strong>
			</div>
		</div>
		<ul class="tab-list tab5" >
			<li class="on" id="all" onclick=changeTab(this.id);><a href="#" onclick="listChange('','1')">전체</a></li>
			<li id="jic1" onclick=changeTab(this.id);><a href='#' onclick="listChange('일반직무','1')">일반직무</a></li>
			<li id="jic2" onclick=changeTab(this.id);><a href='#' onclick="listChange('산업직무','1')">산업직무</a></li>
			<li id="jic3" onclick=changeTab(this.id);><a href='#' onclick="listChange('공통역량','1')">공통역량</a></li>
			<li id="jic4" onclick=changeTab(this.id);><a href='#' onclick="listChange('어학및자격증','1')">어학및자격증</a></li>
		</ul>
		<div class="search-info">
			<div class="search-form f-r">
				<select class="input-sel" style="width:158px" id="lec_type">
					<option value="">전체</option>
					<option value="일반직무">일반직무</option>
					<option value="산업직무">산업직무</option>
					<option value="공통역량">공통역량</option>
					<option value="어학및자격증">어학및자격증</option>
				</select>
				<select class="input-sel" style="width:158px" id="lec_select">
					<option value="강의명">강의명</option>
					<option value="강사">강사</option>
				</select>
				<input type="text" class="input-text" placeholder="입력하세요." id="lec_textVal" style="width:158px"/>
				<button type="button" class="btn-s-dark" onclick="listChange()">검색</button>
			</div>
		</div>
		<div id="lecList">
			<!-- <? include_once "{$_SERVER['DOCUMENT_ROOT']}/admin/view/include/lecList.php"; ?> -->
		</div>
		<div class="box-btn t-r">
			<a href="/admin/index.php?mode=write&page=insert" class="btn-m">강의등록</a>
		</div>
	</div>
</div>
<script type="text/javascript" src="common.js"></script>
<script>
	$(document).ready(function(){
		listChange('',1);
	});
	
</script>