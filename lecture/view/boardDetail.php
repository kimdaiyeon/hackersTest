<?
	$prevPage = $_SERVER["HTTP_REFERER"];
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";
	$boardNo = $_GET['boardNo'];
	$page = $_GET['now_page'];
	$sql = "SELECT * FROM board b, lecture l WHERE 1=1 AND b.lecname=l.lec_name AND b.no =  ".$boardNo." ";
	$result = mysql_query($sql);
	$result_row=mysql_fetch_assoc($result);
	$score=$result_row['score']*20;
	$attachPath=$result_row['attachPath'];
	$attach=$result_row['attach'];
	$attachDownPath=$result_row['attachDownPath'];

	$attachPathArray = split("<PATH>",$attachPath);
	$attachNameArray = split("<NAME>",$attach);	
	$attachDownPathArray = split("<DOWNPATH>",$attachDownPath);
	$sql_count_update = "UPDATE board SET COUNT=COUNT+1 WHERE 1=1 and no =  ".$boardNo."";
	$result_update = mysql_query($sql_count_update);
	// echo '<pre>';
	// print_r($attachNameArray);
	// echo '</pre>';
?>

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
<link rel="stylesheet" href="/daumeditor/css/editor.css" type="text/css" charset="utf-8"/>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
<script type="text/javascript" src="http://test.hackers.com/lecture/common.js"></script>
<script>
	$(document).ready(function(){
		listChange('',<?=$page?>);
	});
	function deleteBoard(boardNo){
		if (confirm("정말 삭제하시겠습니까??") == true){    //확인
			$.ajax({
				url:"/lecture/back/boardDeleteBack.php",
				dataType: 'json',
				type:"POST",
				data:{
					boardNo:boardNo
				},
				success:function(result){
					if(result == 1){
						alert("게시글이 삭제 되었습니다.");
						location.href='<?=$prevPage?>';
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

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs-view">
			<caption class="hidden">수강후기</caption>
			<colgroup>
				<col style="*"/>
				<col style="width:20%"/>
			</colgroup>
			<tbody>
				 <tr>
					<th scope="col"><?=$result_row['title']?></th>
					<th scope="col" class="user-id">작성자: <?=$result_row['id']?> <br> 조회수(<?=$result_row['count']?>)</th>
				 </tr>
				<tr>
					<td colspan="2">
						<div class="box-rating">
							<span class="tit_rating"><?=$result_row['date']?></span><br>
							<span class="tit_rating">강의만족도</span>
							<span class="star-rating">
								<span class="star-inner" style="width:<?=$score?>%"></span>
							</span>
						</div>
						<div style="overflow:auto;">
							<?=$result_row['contents']?>
						<!-- 절대 후회 없는 강의예요!<br />
						강의시간도 적당하고 요점만 잘 잡아서 설명해주시네요!<br />
						조직에서 관리직을 담당하고 계신 분이라면 꼭 추천합니다. <br /> -->
						</div>
					</td>
				</tr>
				<?if($attachNameArray[1] != ""){?>
					<tr>
						<td>
							<div id="tx_attach_div" class="tx-attach-div" style="display:block;">
								<div id="tx_attach_txt" class="tx-attach-txt">첨부 파일</div>
								<div id="tx_attach_box" class="tx-attach-box" >
									<div class="tx-attach-box-inner" >
										<div id="tx_attach_preview" class="tx-attach-preview">
											<p></p>
											<img src="/daumeditor/images/icon/editor/pn_preview.gif" id="board_preview" width="147" height="108" unselectable="on">
										</div>
										<div class="tx-attach-main">
											<ul id="tx_attach_list" class="tx-attach-list">
												<?for($i=1;$i<count($attachPathArray);$i++){?>
													<li class="type-image tx-existed">
													<dl>
														<dt class="tx-name" onclick="imgChange('<?=$attachPathArray[$i]?>');"><?=$attachNameArray[$i]?></dt>
														<dd class="tx-button">
															<a class="tx-delete"></a>
															<a class="tx-insert" style="display:block" href="<?=$attachDownPathArray[$i]?>" download="<?=$attachNameArray[$i]?>">다운로드</a>
														</dd>
													</dl>
												</li>
												<?}?>
											</ul>
										</div>
									</div> 
								</div>
							</div>
						</td>
					</tr>
				<?}?>
			</tbody>
		</table>
		
		
		<p class="mb15"><strong class="tc-brand fs16"><?=$result_row['id']?>님의 수강하신 강의 정보</strong></p>
		
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
			<a href="<?=$prevPage?>"class="btn-m-gray">목록</a>
			<?if($result_row['id'] == $_SESSION['id']){?>
				<a href='/lecture/view/boardWrite.php?page=update&boardNo=<?=$result_row['no']?>' class="btn-m ml5";>수정</a>
				<a href="#" onclick="deleteBoard('<?=$result_row['no']?>');" class="btn-m-dark">삭제</a>
			<?}?>
		</div>

		<div class="search-info">
			<!-- <div class="search-form f-r">
				<select class="input-sel" id="board_type" style="width:158px">
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
			</div> -->
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
