<?php 
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";

	$lec_no = $_POST['lecNo'];
	$sql = "DELETE FROM lecture WHERE lec_no='".$lec_no."'";
	$result = mysql_query($sql);
	
	echo $result;
	// echo '<pre>';
	// print_r($result_row);
	// echo '</pre>';
?>