<?php 
	header("Content-Type:application/json"); 
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";

	$lec_type = $_POST['lec_type'];
	$sql = "SELECT distinct lec_name FROM lecture WHERE lec_type ='".$lec_type."'";
	$result = mysql_query($sql);
	$o = array(); 

	while ($row = mysql_fetch_assoc($result)) { 
		        $t = new stdClass(); 
		        $t->lec_name = $row['lec_name'];
		        $o[] = $t; 
		        unset($t); 
		    }
	echo json_encode($o); 

?>