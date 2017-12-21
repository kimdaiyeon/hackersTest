<?
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";

	$now_page = ($_POST['page']) ? $_POST['page'] : 1;
	$type = $_POST['type'];
	$board_type = $_POST['board_type'];
	$board_select = $_POST['board_select'];
	$board_textVal = $_POST['board_textVal'];
	$searchType = $_POST['searchType'];

	$list_size = 20;
	$block_size = 5;

	$listS=($list_size*($now_page-1))+1;
	$listE=$list_size*($now_page);
	if(!$type){
		$type = $board_type;
	}
	$sql="SELECT count(*) FROM (SELECT @ROWNUM := @ROWNUM + 1 AS ROWNUM, board.* 
			FROM board,(SELECT @ROWNUM := 0) R 
			WHERE 1=1
			AND lectype LIKE '%".$type."%'";
	if($board_select=="작성자"){
		$sql .="AND NAME LIKE '%".$board_textVal."%'";
	}else{
		$sql .="AND lecname LIKE '%".$board_textVal."%'";
	}
	$sql .="ORDER BY COUNT DESC
				)c";	
	
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
	// print_r($searchType);
	// echo '</pre>';

	// echo '<pre>';
	// print_r($sql);
	// echo '</pre>';

	// echo '<pre>';
	// print_r($total_record."/");
	// print_r($total_page."/");
	// print_r($now_block."/");
	// print_r($total_block);
	// echo '</pre>';
?>
<a href="javascript:listChange('<?=$type?>',1,'<?=$searchType?>')"><i class="icon-first"><span class="hidden">첫페이지</span></i></a>
<?if(1 < $now_block){
	$pre_page = ($now_block - 1) * $page_per_block;
?>
	<a href="javascript:listChange('<?=$type?>',<?=$pre_page?>,'<?=$searchType?>')"><i class="icon-prev"><span class="hidden">이전페이지</span></i></a>
<?}?>
<? for($i = $pageS; $i <= $pageE; $i++) {?>
	<?if($i == $now_page){?>
		<a href="javascript:listChange('<?=$type?>',<?=$i?>,'<?=$searchType?>')"class="active" ><?=$i?></a>
	<?}else{?>
		<a href="javascript:listChange('<?=$type?>',<?=$i?>,'<?=$searchType?>')" ><?=$i?></a>
	<?}?>
<?}?>
<?if($now_block < $total_block){
	$next_page = $now_block * $block_size + 1;
?>
	<a href="javascript:listChange('<?=$type?>',<?=$next_page?>,'<?=$searchType?>')"<i class="icon-next"><span class="hidden">다음페이지</span></i></a>
<?}?>
<a href="javascript:listChange('<?=$type?>',<?=$total_page?>,'<?=$searchType?>')"><i class="icon-last"><span class="hidden">마지막페이지</span></i></a>