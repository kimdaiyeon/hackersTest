<?php 
	header("Content-Type:application/json"); 
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";

	$lecNo = $_POST['lecNo'];
	$sql = "SELECT * FROM lecture WHERE lec_no ='".$lecNo."'";
	$result = mysql_query($sql);
	$o = array(); 

	while ($row = mysql_fetch_assoc($result)) { 
		        $t = new stdClass(); 
				$t->lec_name = $row['lec_no'];
				$t->lec_name = $row['lec_name'];
				$t->lec_name = $row['lec_type'];
				$t->lec_name = $row['lec_teacher'];
				$t->lec_name = $row['lec_level'];
				$t->lec_name = $row['lec_time'];
				$t->lec_name = $row['lec_timenum'];
				$t->lec_name = $row['lec_imgpath'];
				$t->lec_name = $row['lec_imgname'];
		        $o[] = $t; 
		        unset($t); 
		    } 
		
	//$result_row=mysql_fetch_object($result);

	echo json_encode($o); 




	// echo $result_row[0];
	// echo '<pre>';
	// print_r($result_row);
	// echo '</pre>';
?>