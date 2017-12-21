<?php
include_once $_SERVER['DOCUMENT_ROOT']."/DBconfig.php";
//include("DBconfig.php");

$nm=$_POST['nm'];
$id=$_POST['id'];
$pw=$_POST['pw'];
//암호화
$pwN=hash('sha256',$pw);
$email=$_POST['email'];
$pNum=$_POST['pNum'];
$nNum=$_POST['nNum'];
$pun=$_POST['pun'];
$adress=$_POST['adress'];
$adressdetail=$_POST['adressdetail'];
$snsinfo=$_POST['snsinfo'];
$mailinfo=$_POST['mailinfo'];
$sql = "INSERT INTO test (nm,id,pw,email,pnum,nnum,pun,adress,adressdetail,snsinfo,mailinfo,idlevel) VALUES('$nm','$id','$pwN','$email','$pNum','$nNum','$pun','$adress','$adressdetail','$snsinfo','$mailinfo','1')";

/*
$sql = "INSERT INTO test
		SET
		nm 			= {$nm},
		id 			= {$id},
		pw 			= {$pw},
		email 		= {$email},
		pnum 		= {$pnum},
		nnum 		= {$nnum},
		pun 		= {$pun},
		adress 		= {$adress},
		snsinfo 	= {$snsinfo},
		mailinfo 	= {$mailinfo}
		";

*/
$result = mysql_query($sql);
echo $result;

exit;
?>