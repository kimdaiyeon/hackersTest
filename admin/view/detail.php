<?
	$prevPage = $_SERVER["HTTP_REFERER"];
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";
	$lecNo = $_GET['lecNo'];
	$sql = "SELECT * FROM lecture WHERE lec_no ='".$lecNo."'";
	$result = mysql_query($sql);
	$result_row=mysql_fetch_assoc($result);
?>
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
		<ul class="tab-list tab5">
			<li class="on" id="all" onclick=changeTab(this.id);><a href="#" onclick="listChange('','1','tab')">전체</a></li>
			<li id="jic1" onclick=changeTab(this.id);><a href='#' onclick="listChange('일반직무','1','tab')">일반직무</a></li>
			<li id="jic2" onclick=changeTab(this.id);><a href='#' onclick="listChange('산업직무','1','tab')">산업직무</a></li>
			<li id="jic3" onclick=changeTab(this.id);><a href='#' onclick="listChange('공통역량','1','tab')">공통역량</a></li>
			<li id="jic4" onclick=changeTab(this.id);><a href='#' onclick="listChange('어학및자격증','1','tab')">어학및자격증</a></li>
		</ul>
		
		<div id="lecDetail">
			<p class="mb15"><strong class="tc-brand fs16" id="lecDetail_title">강의 정보</strong></p>
			<table border="0" cellpadding="0" cellspacing="0" class="tbl-lecture-list">
				<caption class="hidden">강의정보</caption>
				<colgroup>
					<col style="width:166px"/>
					<col style="*"/>
					<col style="width:110px"/>
				</colgroup>
				<tbody>
					<tr>
						<td>
							<a href="#" class="sample-lecture">
								<?if($result_row['lec_imgpath']){?>
									<img src="<?=$result_row['lec_imgpath']?>" alt="" width="144" height="101" />
								<?}else{?>
									<img src="http://via.placeholder.com/144x101" alt="" width="144" height="101" />
								<?}?>
								<span class="tc-brand">샘플강의 ▶</span>
							</a>
						</td>
						<td class="lecture-txt">
							<span>분류: <?=$result_row['lec_type']?></span>
							<em class="tit mt10"><?=$result_row['lec_name']?></em>
							<p class="tc-gray mt20">강사: <?=$result_row['lec_teacher']?> | 학습난이도 : <?=$result_row['lec_level']?> | 교육시간: <?=$result_row['lec_time']?>시간 (<?=$result_row['lec_timenum']?>강)</p>
						</td>
						<td class="t-r"><a href="#" class="btn-square-line">강의<br />상세</a></td>
					</tr>
				</tbody>
			</table>
			<div class="box-btn t-r">
				<a href="#"class="btn-m-gray">목록</a>
				<a href='/admin/index.php?mode=write&page=update&lecNo=<?=$result_row['lec_no']?>' class="btn-m ml5";>수정</a>
				<a href="#" onclick="deleteLec('<?=$result_row['lec_no']?>');" class="btn-m-dark">삭제</a>
			</div>
		</div>

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
					<option value="담당선생님">담당선생님</option>
				</select>
				<input type="text" class="input-text" placeholder="글자를입력하세요." id="lec_textVal" style="width:158px"/>
				<button type="button" class="btn-s-dark" onclick="listChange()">검색</button>
			</div>
		</div>

		<div id="lecList">
			<? include_once "{$_SERVER['DOCUMENT_ROOT']}/admin/view/include/lecList.php"; ?>
		</div>
	</div>
</div>
<script type="text/javascript" src="common.js"></script>
<script type="text/javascript" src="http://test.hackers.com/admin/common.js"></script>
<script>
	$(document).ready(function(){
		listChange('',1);
	});
	function deleteLec(lecNo){
		if (confirm("정말 삭제하시겠습니까??") == true){    //확인
			$.ajax({
				url:"/admin/back/lecDeleteBack.php",
				type:"POST",
				data:{
					lecNo:lecNo
				},
				success:function(result){
					if(result == 1){
						alert("강의가 삭제 되었습니다.");
						location.href='<?=$prevPage?>';
					}else{
						alert(result);
					}
				},
				error:function(){
					alert("실패");
				}
			});
		}else{   //취소
			return;
		}
	}
</script>