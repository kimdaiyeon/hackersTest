<?
	$pageCheck=$_GET['page'];
	if($pageCheck == "update"){
		$lecNo=$_GET['lecNo'];
		include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";
		$sql = "SELECT * FROM lecture WHERE lec_no =  ".$lecNo." ";
		$result = mysql_query($sql);
		$result_row=mysql_fetch_assoc($result);
	}
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

<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
<script type="text/javascript" src="/member/init.js"></script>
<script type="text/javascript" src="/member/common.js"></script>
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script><script charset="UTF-8" type="text/javascript" src="http://t1.daumcdn.net/cssjs/postcode/1506320738556/170925.js"></script>
<script>
	function check_submit(check){
		if(check == "insert"){
			document.myForm.action = "/admin/back/lecInsert.php"; 
		}else{
			document.myForm.action = "/admin/back/lecUpdate.php"; 
		}
        document.myForm.submit(); 
	}
	function lecdata_filedelete(){
		$("#lecdata_upfile_block").css("display","");
		$("#lecdata_upfile_none").css("display","none");
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
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<?if($pageCheck == "insert"){?>
					<h3 class="tit-h3">강의 등록</h3>
					<div class="sub-depth">
						<span><i class="icon-home"><span>홈</span></i></span>
						<span>관리자페이지</span>
						<strong>강의등록</strong>
					</div>
				<?}else{?>
					<h3 class="tit-h3">강의 수정</h3>
					<div class="sub-depth">
						<span><i class="icon-home"><span>홈</span></i></span>
						<span>관리자페이지</span>
						<strong>강의수정</strong>
					</div>
				<?}?>
			</div>

		<form name='myForm' method='post' ENCTYPE='multipart/form-data'>
			<div class="section-content">
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">강의정보</caption>
					<colgroup>
						<col style="width:15%"/>
						<col style="*"/>
					</colgroup>
					<tbody>
						<input type="hidden" name="lecdata_no" value="<?=$result_row['lec_no']?>">
						<tr>
							<th scope="col"><span class="icons">*</span>강의타입</th>
							<td>
								<select class="input-sel" id="lecdata_name" style="width:160px" name="lecdata_type">
									<option value="분류">분류</option>
									<option value="일반직무" <?=($result_row['lec_type']=='일반직무') ? 'selected' : ''?>>일반직무</option>
									<option value="산업직무" <?=($result_row['lec_type']=='산업직무') ? 'selected' : ''?>>산업직무</option>
									<option value="공통역량" <?=($result_row['lec_type']=='공통역량') ? 'selected' : ''?>>공통역량</option>
									<option value="어학및자격증" <?=($result_row['lec_type']=='어학및자격증') ? 'selected' : ''?>>어학및자격증</option>
								</select>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>강의명</th>
							<td id= "updateMember_nameText">
								<input type="text" class="input-text" name="lecdata_name" value="<?=$result_row['lec_name']?>" style="width:302px"/>	
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>강의자</th>
							<td>
								<input type="text" class="input-text" name="lecdata_teacher" value="<?=$result_row['lec_teacher']?>" maxlength="5" style="width:302px" />
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>강의 난이도</th>
								<td>
								<div class="box-input">
									<label class="input-sp" style="width:70px;">
										<input type="radio" name="lecdata_level"  value="상" <?=($result_row['lec_level']=='상') ? 'checked' : ''?>/>
										<span class="input-txt">상</span>
									</label>
									<label class="input-sp" style="width:70px;">
										<input type="radio" name="lecdata_level"  value="중"  checked="checked" <?=($result_row['lec_level']=='중') ? 'checked' : ''?>/>
										<span class="input-txt">중</span>
									</label>
									<label class="input-sp" style="width:70px;">
										<input type="radio" name="lecdata_level" value="하"  <?=($result_row['lec_level']=='하') ? 'checked' : ''?>/>
										<span class="input-txt">하</span>
									</label>
								</div>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>강의시간</th>
							<td>
								<input type="text" class="input-text" name="lecdata_time" value="<?=$result_row['lec_time']?>"  style="width:30px;text-align:right" placeholder="ex) 13"/>
								<a>시간</a>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>강의수</th>
							<td>
								<input type="text" class="input-text" name="lecdata_timenum" value="<?=$result_row['lec_timenum']?>" style="width:30px;text-align:right" placeholder="ex) 13"/>
								<a>강</a>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>썸네일 파일첨부</th>
							<td>
								<?if($result_row['lec_imgname'] != '') { 
									echo "
											<div id='lecdata_upfile_none'>
												<a>{C:/web/test/admin/img/{$result_row['lec_imgname']}}</a> 파일이 등록되어 있습니다.
												<input type='button' style='width:50px;height:30px;' value='삭제' onclick='lecdata_filedelete()'>											</div>
											<div style='display:none' id='lecdata_upfile_block'>
												파일첨부:
												<input type='file' accept='image/*' name='lecdata_upfile' size='20' />
												<p>첨부시 웹관련 파일 업로드 금지 (ex: .php/.html/.c 등)</p>	
											</div>
											";  
									}else{
									?>
										파일첨부:
										<!-- <input type="file" accept="image/*" name="lecdata_upfile" size="20" /> -->
										<input type="file" accept=".gif, .jpg, .png" name="lecdata_upfile" size="20" />
										<p>첨부시 웹관련 파일 업로드 금지 (ex: .php/.html/.c 등)</p>
								<?}?>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="box-btn">
					<?if($pageCheck == "insert"){?>
						<a href="javascript:check_submit('<?=$pageCheck?>')" class="btn-l">등록</a>
					<?}else{?>
						<a href="javascript:check_submit('<?=$pageCheck?>')" class="btn-l">수정</a>
					<?}?>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>

	<div id="footer" class="footer">
		<? include_once "{$_SERVER['DOCUMENT_ROOT']}/member/footer.php"; ?>
	</div>
</div>
</body>
</html>
