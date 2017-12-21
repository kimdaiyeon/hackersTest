<?
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";

	$now_page = ($_POST['page']) ? $_POST['page'] : 1;
	$type = $_POST['type'];
	$lec_type = $_POST['lec_type'];
	$lec_select = $_POST['lec_select'];
	$lec_textVal = $_POST['lec_textVal'];

	$list_size = 10;

	$listS=($list_size*($now_page-1))+1;
	$listE=$list_size*($now_page);

	if($lec_select=="강사"){
		$sql="SELECT * 
			FROM (
				SELECT @ROWNUM := @ROWNUM + 1 AS ROWNUM, 
					lecture.* 
				FROM lecture,(SELECT @ROWNUM := 0) R 
				WHERE 1=1
				AND lec_type LIKE '%".$type."%'
				AND lec_type LIKE '%".$lec_type."%'
				AND lec_teacher LIKE '%".$lec_textVal."%'
				) C 
			WHERE C.ROWNUM BETWEEN ".$listS." AND ".$listE."";
	}else{
		$sql="SELECT * 
			FROM (
				SELECT @ROWNUM := @ROWNUM + 1 AS ROWNUM, 
					lecture.* 
				FROM lecture,(SELECT @ROWNUM := 0) R 
				WHERE 1=1
				AND lec_type LIKE '%".$type."%'
				AND lec_type LIKE '%".$lec_type."%'
				AND lec_name LIKE '%".$lec_textVal."%'
				) C 
			WHERE C.ROWNUM BETWEEN ".$listS." AND ".$listE."";
	}
	$result = mysql_query($sql);
?>

<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
	<caption class="hidden">강의List</caption>
	<colgroup>
		<col style="width:10%"/>
		<col style="width:15%"/>
		<col style="*"/>
		<col style="width:15%"/>
		<col style="width:12%"/>
	</colgroup>

	<thead>
		<tr>
			<th scope="col">강의번호</th>
			<th scope="col">분류</th>
			<th scope="col">강의명</th>
			<th scope="col">강의시간</th>
			<th scope="col">강의 수</th>
		</tr>
	</thead>

	<tbody>
		<?while($row = mysql_fetch_array($result)){?>
			<tr class="bbs-sbj">
				<td><?=$row['lec_no'] ?></td>
				<td><?=$row['lec_type'] ?></td>
				<td>
					<a href="/admin/index.php?mode=detail&lecNo=<?=$row['lec_no']?>">
						<span class="tc-gray ellipsis_line"><?=$row['lec_name'] ?></span>
						<strong class="ellipsis_line"><?=$row['lec_teacher'] ?></strong>
					</a>
				</td>
				<td><?=$row['lec_time'] ?>시간</td>
				<td class="last"><?=$row['lec_timenum'] ?>강</td>
			</tr>
		<?}?>
		<!-- //set -->
	</tbody>
</table>
<div class="box-paging">
	<? include_once "{$_SERVER['DOCUMENT_ROOT']}/admin/view/include/lecPage.php"; ?>
</div>