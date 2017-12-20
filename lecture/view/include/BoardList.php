<?
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";
	
	$now_page = ($_POST['page']) ? $_POST['page'] : 1;
	$type = $_POST['type'];
	$board_type = $_POST['board_type'];
	$board_select = $_POST['board_select'];
	$board_textVal = $_POST['board_textVal'];
	$searchType = $_POST['searchType'];

	$list_size = 20;
	
	if($now_page == 1){
		$listS = 0;
		$listE = 17;
	}else{
		$listS = ($list_size*($now_page-1)-2);
		$listE = ($list_size*($now_page)-3);
	}
	if(!$type){
		$type = $board_type;
	}
	//sql
	$sql="SELECT * FROM (SELECT @ROWNUM := @ROWNUM + 1 AS ROWNUM, board.* 
			FROM board,(SELECT @ROWNUM := 0) R 
			WHERE 1=1
			AND lectype LIKE '%".$type."%'";
	if($board_select=="작성자"){
		$sql .="AND NAME LIKE '%".$board_textVal."%'";
	}else{
		$sql .="AND lecname LIKE '%".$board_textVal."%'";
	}
	//베스트 쿼리문
	$sql_B = $sql."ORDER BY COUNT DESC) C where C.ROWNUM BETWEEN 0 and 3;";
	$sql .="ORDER BY date DESC
				)c
			WHERE c.rownum BETWEEN ".$listS." AND ".$listE."";	
	$result = mysql_query($sql);
	$result_B = mysql_query($sql_B);
	// echo "<pre>";
	// echo $sql;
	// echo "</pre>";
	// echo "<pre>";
	// echo $searchType;
	// echo "</pre>";
?>
<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
	<caption class="hidden">수강후기</caption>
	<colgroup>
		<col style="width:10%"/>
		<col style="width:15%"/>
		<col style="*"/>
		<col style="width:15%"/>
		<col style="width:12%"/>
	</colgroup>

	<thead>
		<tr>
			<th scope="col">번호</th>
			<th scope="col">분류</th>
			<th scope="col">제목</th>
			<th scope="col">강좌만족도</th>
			<th scope="col">작성자</th>
		</tr>
	</thead>

	<tbody>
		<!-- set -->
		<?if($now_page == 1){
			while($row_best = mysql_fetch_array($result_B)){?>
				<tr class="bbs-sbj">
					<td><span class="txt-icon-line"><em>BEST</em></span></td>
					<td><?=$row_best['lectype'] ?></td>
					<td>
						<a href="/lecture/view/boardDetail.php?&boardNo=<?=$row_best['no']?>&now_page=<?=$now_page?>">
							<span class="tc-gray ellipsis_line"><?=$row_best['lecname'] ?></span>
							<strong class="ellipsis_line"><?=$row_best['title'] ?></strong>
						</a>
					</td>
					<td>
						<span class="star-rating">
							<? $score=$row_best['score']*20; ?>
							<span class="star-inner" style="width:<?=$score?>%"></span>
						</span>
					</td>
					<td class="last"><?=$row_best['name'] ?></td>
				</tr>
			<?}
		}while($row = mysql_fetch_array($result)){?>
				<tr class="bbs-sbj">
					<td><?=$row['no'] ?></td>
					<td><?=$row['lectype'] ?></td>
					<td>
						<a href="/lecture/view/boardDetail.php?&boardNo=<?=$row['no']?>&now_page=<?=$now_page?>">
							<span class="tc-gray ellipsis_line"><?=$row['lecname'] ?></span>
							<strong class="ellipsis_line"><?=$row['title'] ?></strong>
						</a>
					</td>
					<td>
						<span class="star-rating">
							<? $score=$row['score']*20; ?>
							<span class="star-inner" style="width:<?=$score?>%"></span>
						</span>
					</td>
					<td class="last"><?=$row['name'] ?></td>
				</tr>
			<?}?>
		<!-- //set -->
	</tbody>
</table>
<div class="box-paging">
	<? include_once "{$_SERVER['DOCUMENT_ROOT']}/lecture/view/include/BoardPage.php"; ?>
</div>