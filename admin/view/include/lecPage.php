<?
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";

	$now_page = ($_POST['page']) ? $_POST['page'] : 1;
	$type = $_POST['type'];
	$lec_type = $_POST['lec_type'];
	$lec_select = $_POST['lec_select'];
	$lec_textVal = $_POST['lec_textVal'];

	$list_size = 10;
	$block_size = 5;

	$listS=($list_size*($now_page-1))+1;
	$listE=$list_size*($now_page);
	if($lec_select=="강사"){
		$sql="SELECT COUNT(*)
		FROM (
			SELECT @ROWNUM := @ROWNUM + 1 AS ROWNUM, 
				lecture.* 
			FROM lecture,(SELECT @ROWNUM := 0) R 
			WHERE 1=1
				AND lec_type LIKE '%".$type."%'
				AND lec_type LIKE '%".$lec_type."%'
				AND lec_teacher LIKE '%".$lec_textVal."%'
			) C";
	}else{
		$sql="SELECT COUNT(*)
		FROM (
			SELECT @ROWNUM := @ROWNUM + 1 AS ROWNUM, 
				lecture.* 
			FROM lecture,(SELECT @ROWNUM := 0) R 
			WHERE 1=1
				AND lec_type LIKE '%".$type."%'
				AND lec_type LIKE '%".$lec_type."%'
				AND lec_name LIKE '%".$lec_textVal."%'
			) C";
	}
	$result_count = mysql_query($sql);
	$result_row=mysql_fetch_row($result_count);
	$total_record = $result_row[0];//게시물 총갯수
	//총 페이지
	$total_page = ceil($total_record / $list_size);
	//현재 블럭
	$now_block = ceil($now_page / $block_size);
	//전체블럭
	$total_block = ceil($total_page / $block_size);

	$pageS=($block_size*($now_block-1))+1;
	$pageE=$block_size*($now_block);

	if($pageE > $total_page) {
		$pageE = $total_page;
	}
	
	// echo '<pre>';
	// print_r($now_page."/");
	// print_r($pageS."/");
	// print_r($pageE."/");
	// print_r($now_block);
	// echo '</pre>';
?>
<a href="javascript:listChange('<?=$type?>',1)"><i class="icon-first"><span class="hidden">첫페이지</span></i></a>
<?if(1 < $now_block){
	$pre_page = ($now_block - 1) * $page_per_block;
?>
	<a href="javascript:listChange('<?=$type?>',<?=$pre_page?>)"><i class="icon-prev"><span class="hidden">이전페이지</span></i></a>
<?}?>
<? for($i = $pageS; $i <= $pageE; $i++) {?>
	<?if($i == $now_page){?>
		<a href="javascript:listChange('<?=$type?>',<?=$i?>)"class="active" ><?=$i?></a>
	<?}else{?>
		<a href="javascript:listChange('<?=$type?>',<?=$i?>)" ><?=$i?></a>
	<?}?>
<?}?>
<?if($now_block < $total_block){
	$next_page = $now_block * $block_size + 1;
?>
	<a href="javascript:listChange('<?=$type?>',<?=$next_page?>)"<i class="icon-next"><span class="hidden">다음페이지</span></i></a>
<?}?>
<a href="javascript:listChange('<?=$type?>',<?=$total_page?>)"><i class="icon-last"><span class="hidden">마지막페이지</span></i></a>