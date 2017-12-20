<?php 
	header("Content-Type:application/json"); 
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";

	$boardNo = $_POST['boardNo'];
	$sql = "DELETE FROM board WHERE NO='".$boardNo."'";
	$result = mysql_query($sql);
	
	echo $result;
?>