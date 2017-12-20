<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";
	session_start();
	$name = $_POST['findPw_name'];
	$id = $_POST['findPw_id'];
	$phone = $_POST['findPw_phone'];
	$email = $_POST['findPw_email'];
	
	if($phone != ""){
		$sql = "SELECT * FROM test WHERE 1=1 and nm='".$name."' and id='".$id."' and pnum='".$phone."' " ;
	}
	
	if($email != ""){
		$sql = "SELECT * FROM test WHERE 1=1 and nm='".$name."' and id='".$id."' and email='".$email."' " ;
	}
	
    $result = mysql_query($sql);
	$count = mysql_num_rows($result);
	
	if($count == "1"){
		 $row = mysql_fetch_array($result);
		$dbNo = $row['no'];
		$_SESSION['findPw_no'] = $dbNo;
		echo "true";
		// //header('Location: /member/findId_ok.php');
	}else{
		echo "false";
		session_destroy();
		// echo "<script>alert(\"찾을수 없는 ID입니다.\");</script>";s
		// echo "<script>history.go(-1);</script>";
	}
    
?>