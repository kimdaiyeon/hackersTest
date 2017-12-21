<?
	session_start();
	//사용자 정보
	$no =$_SESSION['no'];
	$id =$_SESSION['id'];
	$name =$_SESSION['nm'];
	$prevPage = $_SERVER["HTTP_REFERER"];
	$pageCheck=$_GET['page'];
	if($pageCheck == "update"){
		$boardNo=$_GET['boardNo'];
		include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";
		$sql = "SELECT * FROM board WHERE no =  ".$boardNo." ";
		$result = mysql_query($sql);
		$result_row=mysql_fetch_assoc($result);
		$attachPath=$result_row['attachPath'];
		$attach=$result_row['attach'];
		$attachDownPath=$result_row['attachDownPath'];
		$attachSize=$result_row['fileSize'];
	
		$attachPathArray = split("<PATH>",$attachPath);
		$attachNameArray = split("<NAME>",$attach);	
		$attachDownPathArray = split("<DOWNPATH>",$attachDownPath);
		$attachSizeArray = split("<SIZE>",$attachSize);
		$filecount = count($attachPathArray);
	}
	// $boardNo = $_GET['board'];
	// include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";
	// $sql = "SELECT * FROM board b, lecture l WHERE 1=1 AND b.lecname=l.lec_name AND b.no =  ".$boardNo." ";
	// $result = mysql_query($sql);
	// $result_row=mysql_fetch_assoc($result);
	// $score=$result_row['score']*20;
	// echo '<pre>';
	// print_r($result_row);
	// echo '</pre>';
?>
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
			<?if($pageCheck == "insert"){?>
				<h3 class="tit-h3">수강후기</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<span>직무교육 안내</span>
					<strong>수강후기</strong>
				</div>
			<?}else{?>
				<h3 class="tit-h3">후기 수정</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<span>직무교육 안내</span>
					<strong>후기 수정</strong>
				</div>
			<?}?>
		</div>

		<div class="user-notice">
			<strong class="fs16">유의사항 안내</strong>
			<ul class="list-guide mt15">
				<li class="tc-brand">수강후기는 신청하신 강의의 학습진도율 25%이상 달성시 작성가능합니다. </li>
				<li>욕설(욕설을 표현하는 자음어/기호표현 포함) 및 명예훼손, 비방,도배글, 상업적 목적의 홍보성 게시글 등 사회상규에 반하는 게시글 및 강의내용과 상관없는 서비스에 대해 작성한 글들은 삭제 될 수 있으며, 법적 책임을 질 수 있습니다.</li>
			</ul>
		</div>
<?if($pageCheck == "update"){?>
	<form name="tx_editor_form" id="tx_editor_form" action="/lecture_board/back/boardUpdateBack.php"  method="post" accept-charset="utf-8">
<?}else{?>
	<form name="tx_editor_form" id="tx_editor_form" action="/lecture_board/back/boardInsertBack.php"  method="post" accept-charset="utf-8">
<?}?>
		<input type="hidden" name= "useNo" id="useNo" value="<?=$no?>">
		<input type="hidden" name= "useId" id="useId" value="<?=$id ?>">
		<input type="hidden" name= "useName" id="useName" value="<?=$name?>">
		<input type="hidden" value="<?=$prevPage?>" name="preURL">
		<input type="hidden" value="<?=$boardNo?>" name="boardNo">
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-col">
			<caption class="hidden">강의정보</caption>
			<colgroup>
				<col style="width:15%"/>
				<col style="*"/>
			</colgroup>

			<tbody>
				<tr>
					<th scope="col">강의</th>
					<td>
						<select class="input-sel" style="width:160px" id="board_lectype" name="board_lectype" onchange="lec_name(this.value)">
							<option value="일반직무">일반직무</option>
							<option value="산업직무">산업직무</option>
							<option value="공통역량">공통역량</option>
							<option value="어학및자격증">어학및자격증</option>
						</select>
						<select class="input-sel ml5" id="board_lecname" name="board_lecname" style="width:454px">
							<option value="">강의명</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="col">제목</th>
					<td><input type="text" class="input-text" id="board_title" value="<?=$result_row['title']?>" name="board_title" style="width:611px"/></td>
				</tr>
				<tr>
					<th scope="col">강의만족도</th>
					<td>
						<ul class="list-rating-choice">
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="board_score5" value="5" checked="checked"/>
									<span class="input-txt">5점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:100%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="board_score4" value="4"/>
									<span class="input-txt">4점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:80%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="board_score3" value="3"/>
									<span class="input-txt">3점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:60%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="board_score2" value="2"/>
									<span class="input-txt">2점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:40%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="board_score1" value="1"/>
									<span class="input-txt">1점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:20%"></span>
								</span>
							</li>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="editor-wrap">
			<? include_once "{$_SERVER['DOCUMENT_ROOT']}/daumeditor/editor.html"; ?>
			<textarea id="item_content" name="item_content" style="width:99%; height:180px; display: none" rows="15" cols="50">
				<?=$result_row['contents']?>
			</textarea>
		</div>
		
		<div class="box-btn t-r">
			<a href="#" class="btn-m-gray">목록</a>
			<?if($pageCheck == "update"){?>
				<a href="#" type="submit" onclick='saveContent()' class="btn-m ml5">수정</a>
			<?}else{?>
				<a href="#" type="submit" onclick='saveContent()' class="btn-m ml5">등록</a>
			<?}?>
		</div>
<!-- </form> -->
	</div>
</div>
<script type="text/javascript" src="http://test.hackers.com/lecture_board/common.js"></script>
<script>
	$(document).ready(function(){
		Editor.modify({
				 "content": $tx('item_content')
		});
		$("#board_lectype").val("<?=$result_row['lectype']?>").prop("selected", true);
		lec_name('<?=$result_row['lectype']?>');
		$("#board_score<?=$result_row['score']?>").click();
		<?if($attachNameArray[1] != ""){?>
			loadContent();
		<?}?>
	});
	function loadContent() {
		var attachments = {};
		<?for($i=1;$i<count($attachPathArray);$i++){?>
			attachments['image'+<?=$i?>] = [];
			attachments['image'+<?=$i?>].push({
				'attacher': 'image',
				'data': {
					'imageurl': '<?=$attachPath[$i]?>',
					'filename': '<?=$attachNameArray[$i]?>',
					'filesize': <?=$attachSizeArray[$i]?>,
					'originalurl': '<?=$attachPath[$i]?>',
					'thumburl': '<?=$attachPath[$i]?>'
				}
			});
		<?}?>
		/* 저장된 컨텐츠를 불러오기 위한 함수 호출 */
		Editor.modify({
			"attachments": function () { /* 저장된 첨부가 있을 경우 배열로 넘김, 위의 부분을 수정하고 아래 부분은 수정없이 사용 */
				var allattachments = [];
				for (var i in attachments) {
					allattachments = allattachments.concat(attachments[i]);
				}
				return allattachments;
			}()
		});
	}
</script>
<script>
	function lec_name(lec_type){
		$.ajax({
				url:"/lecture_board/back/lec_name.php",
				dataType: 'json',
				type:"POST",
				data:{
					lec_type:lec_type
				},
				success:function(result){
					$("#board_lecname").html("");
					var str;
					for(i=0;i<result.length;i++){
						str += "<option value='"+result[i].lec_name+"'>"+result[i].lec_name+"</option>"
					}
					$("#board_lecname").html(str);

					//업데이트할때는 db에 있는값 체크
					$("#board_lecname").val("<?=$result_row['lecname']?>").prop("selected", true);
				},
				error:function(){
					alert("실패");
				}
			});
	}
</script>