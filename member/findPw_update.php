<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";
	session_start();
	$no = $_POST['findPw_no'];
	//$id = $_POST['findPw_id'];
	$pw = $_POST['findPw_pw1'];
	$pwN=hash('sha256',$pw);
	//$pageCheck = $_POST['pageCheck'];
	$sql = "UPDATE test SET pw='".$pwN."' WHERE NO='".$no."'";
	
    $result = mysql_query($sql);
	echo $result;    
?>