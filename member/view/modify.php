<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/DBconfig.php";
	session_start();
	$no =$_SESSION['no'];
	$id =$_SESSION['id'];

	$sql = "SELECT * FROM test WHERE 1=1 AND NO='".$no."' AND id='".$id."'";
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	$no = $row['no'];
	$nm = $row['nm'];
	$id = $row['id'];
	$email = $row['email'];
	$arremail = split('@',$email);
	$pnum = $row['pnum'];
	$arrpnum = split('-',$pnum);
	$nnum = $row['nnum'];
	$arrnnum = split('-',$nnum);
	$pun = $row['pun'];
	$adress = $row['adress'];
	$adressdetail = $row['adressdetail'];
	$snsinfo = $row['snsinfo'];
	// echo '<pre>';
	// print_r($row);
	// echo '</pre>';
?>
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">내정보수정</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>내정보수정</strong>
				</div>
			</div>

			<div class="section-content">
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">강의정보</caption>
					<colgroup>
						<col style="width:15%"/>
						<col style="*"/>
					</colgroup>

					<tbody>
						<input type="hidden" id="updateMember_no" value="<?=$no?>">
						<tr>
							<th scope="col"><span class="icons">*</span>이름</th>
							<td id= "updateMember_nameText"><?=$nm?></td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>아이디</th>
							<td>
								<input type="text" class="input-text" id="updateMember_idText" onchange="onlyKrEnNu(this.id,'ID')" style="width:302px" value="<?=$id?>" placeholder="영문자로 시작하는 4~15자의 영문소문자, 숫자"/>
								<a href="#" onclick="idCheck('updateMember_')" class="btn-s-tin ml10">중복확인</a>
								<a id="updateMember_idTextCheck" style="margin-left:5px;"></a>
								<!-- 중복확인할경우 체크사항 -->
								<input type="hidden" id="updateMember_idCheckH" value="y"/>
								<!-- 처음아이디랑 수정후 아이디랑 같은지 비교 -->
								<input type="hidden" id="updateMember_dbIdText" value="<?=$id?>"/>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>비밀번호</th>
							<td>
								<input type="password" class="input-text" id="updateMember_pwText" style="width:302px" onchange="pwCheck('updateMember_')" placeholder="8-15자의 영문자/숫자 혼합"/>
								<a id="updateMember_pw1CheckText" style="margin-left:5px;"></a>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>비밀번호 확인</th>
							<td>
								<input type="password" class="input-text" id="updateMember_pw2Text" style="width:302px"/>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>이메일주소</th>
							<td>
								<input type="text" class="input-text" value="<?=$arremail[0]?>" id="updateMember_email1Text" style="width:138px"/> @ <input type="text" id="updateMember_email2Text" class="input-text" value="<?=$arremail[1]?>" style="width:138px"/>
								<select class="input-sel" style="width:160px" id="updateMember_emailSelect" onchange="selectEmail('updateMember_')">
									<option value="">직접 입력</option>
									<option value="naver.com">naver.com</option>
									<option value="daum.net">daum.net</option>
									<option value="gmail.com">gmail.com</option>
									<option value="haha.co.kr">haha.co.k</option>
								</select>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>휴대폰 번호</th>
							<td><?=$pnum?></td>
						</tr>
						<tr>
							<th scope="col"><span class="icons"></span>일반전화 번호</th>
							<td>
								<input type="text" class="input-text" id="updateMember_nnum1Text" style="width:88px" value="<?=$arrnnum[0]?>"/> - 
								<input type="text" class="input-text" id="updateMember_nnum2Text" style="width:88px" value="<?=$arrnnum[1]?>"/> - 
								<input type="text" class="input-text" id="updateMember_nnum3Text" style="width:88px" value="<?=$arrnnum[2]?>"/>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>주소</th>
							<td>
								<p >
									<label>우편번호 <input type="text" class="input-text ml5" id="updateMember_punText" value="<?=$pun?>" style="width:242px" disabled /></label><a href="#" class="btn-s-tin ml10" onclick="find_juso_update()">주소찾기</a>
								</p>
								<p class="mt10">
									<label>기본주소 <input type="text" class="input-text ml5" id="updateMember_adressText" value="<?=$adress?>" style="width:719px"/></label>
								</p>
								<p class="mt10">
									<label>상세주소 <input type="text" class="input-text ml5" id="updateMember_adressdetailText" value="<?=$adressdetail?>" style="width:719px"/></label>
								</p>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>SMS수신</th>
							<td>
								<div class="box-input">
									<label class="input-sp">
										<input type="radio" name="radio" id="updateMember_snsinfo" value="y" <?=($row['snsinfo']=='Y') ? 'checked' : ''?>/>
										<span class="input-txt">수신함</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="radio" id="updateMember_snsinfo"  value="n" <?=($row['snsinfo']=='N') ? 'checked' : ''?>/>
										<span class="input-txt">미수신</span>
									</label>
								</div>
								<p>SMS수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>메일수신</th>
							<td>
								<div class="box-input">
									<label class="input-sp">
										<input type="radio" name="radio2" value="y" id="updateMember_mailinfo" <?=($row['mailinfo']=='Y') ? 'checked' : ''?>/>
										<span class="input-txt">수신함</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="radio2" value="n" id="updateMember_mailinfo" <?=($row['mailinfo']=='N') ? 'checked' : ''?>/>
										<span class="input-txt">미수신</span>
									</label>
								</div>
								<p>메일수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="box-btn">
					<a href="#" class="btn-l" onclick="memberupdate_check('updateMember_')";>정보수정</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="/member/common.js"></script>
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script><script charset="UTF-8" type="text/javascript" src="http://t1.daumcdn.net/cssjs/postcode/1506320738556/170925.js"></script>