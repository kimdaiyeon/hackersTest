<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";

	$no = $_POST['no'];
	$nm = $_POST['nm'];
	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$pwN=hash('sha256',$pw);
	$email = $_POST['email'];
	$nNum = $_POST['nNum'];
	$pun = $_POST['pun'];
	$adress = $_POST['adress'];
	$adressdetail = $_POST['adressdetail'];
	$snsinfo = $_POST['snsinfo'];
	$mailinfo = $_POST['mailinfo'];
	if($pw != ""){
		//비번포함 수정
		$sql = "UPDATE test 
				SET 
				id='".$id."' ,  
				pw='".$pwN."' ,  
				email='".$email."' ,
				nnum='".$nNum."' ,
				pun='".$pun."' ,
				adress='".$adress."' ,
				adressdetail='".$adressdetail."' ,
				snsinfo='".$snsinfo."' ,
				mailinfo='".$mailinfo."' 
				WHERE 1=1 
				AND no='".$no."' 
				AND nm='".$nm."' ";
	}else{
		//비번외 수정
		$sql = "UPDATE test 
				SET 
				id='".$id."' ,  
				email='".$email."' ,
				nNum='".$nNum."' ,
				pun='".$pun."' ,
				adress='".$adress."' ,
				adressdetail='".$adressdetail."' ,
				snsinfo='".$snsinfo."' ,
				mailinfo='".$mailinfo."' 
				WHERE 1=1 
				AND no='".$no."' 
				AND nm='".$nm."' ";
	}
	$result = mysql_query($sql);
	echo $result;
?>