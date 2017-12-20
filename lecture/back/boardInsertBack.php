<?php
	//header("Content-Type: application/json");
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";
	session_start();

	// print_r($_REQUEST);
	$images = $_POST['attach_image'];
	$imagesName = $_POST['attach_image_filename'];
	$imagesSize = $_POST['attach_image_fileSize'];
	// $imagesDownPath = $_SERVER['DOCUMENT_ROOT']."/daumeditor/images/kdy_image/";
	$imagesDownPath = "/daumeditor/images/kdy_image/";

	$board_lecname = $_POST['board_lecname'];
	$board_lectype = $_POST['board_lectype'];
	$board_title = $_POST['board_title'];
	$radio = $_POST['radio'];
	$content = $_POST['content'];
	$attach_image_length = $_POST['attach_image_length'];

	$useName = $_POST['useName'];
	$useId = $_POST['useId'];
	$useNo = $_POST['useNo'];
	$preURL = $_POST['preURL'];

	//사진이 2개 이상일때
	$imgPath = "";
	foreach($images as $a){
		$imgPath .= '<PATH>'.$a;
	}
	$imgName = "";
	$imgDownPath = "";
	foreach($imagesName as $a){
		$imgName .= '<NAME>'.$a;
		$imgDownPath .= '<DOWNPATH>'.$imagesDownPath.$a;
		
	}
	$imgSize = "";
	foreach($imagesSize as $a){
		$imgSize .= '<SIZE>'.$a;
	}
	$sql ="INSERT INTO board (lecname,lectype,title,score,contents,NAME,id,DATE,attachPath,attach,attachDownPath,fileSize,COUNT) VALUES('". $board_lecname ."','". $board_lectype ."','". $board_title ."','". $radio ."','". $content ."','". $useName ."','". $useId ."',NOW(),'". $imgPath ."','". $imgName ."','". $imgDownPath ."','". $imgSize ."',0)";
	$result = mysql_query($sql);
	
	$msg = "후기가 등록되었습니다";  
	echo " <html><head>  
	<script name=javascript>  
		if('$msg' != '') {  
		self.window.alert('$msg');  
		} 
		location.href='$preURL';
	</script>
	</head></html> ";
	//header("Location:".$preURL);
?>