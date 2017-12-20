<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";
	session_start();
	$name = $_POST['findId_name'];
	$phone = $_POST['findId_phone'];
	$email = $_POST['findId_email'];
	
	if($phone != ""){
		$sql = "SELECT * FROM test WHERE 1=1 and nm='".$name."' and pnum='".$phone."' " ;
	}
	
	if($email != ""){
		$sql = "SELECT * FROM test WHERE 1=1 and nm='".$name."' and email='".$email."' " ;
	}
	
    $result = mysql_query($sql);
	$count = mysql_num_rows($result);
	
	if($count == "1"){
		 $row = mysql_fetch_array($result);
		$dbNm = $row['nm'];
		$dbId = $row['id'];
		$_SESSION['findId_nm'] = $dbNm;
		$_SESSION['findId_id'] = $dbId;
		echo "true";
		// //header('Location: /member/findId_ok.php');
	}else{
		echo "false";
		session_destroy();
		// echo "<script>alert(\"찾을수 없는 ID입니다.\");</script>";s
		// echo "<script>history.go(-1);</script>";
	}
    
?>