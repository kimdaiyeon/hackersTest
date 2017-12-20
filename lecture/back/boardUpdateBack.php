<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";
	session_start();
	$board_lecname = $_POST['board_lecname'];
	$board_lectype = $_POST['board_lectype'];
	$board_title = $_POST['board_title'];
	$radio = $_POST['radio'];
	$content = $_POST['content'];

	$useName = $_POST['useName'];
	$useId = $_POST['useId'];
	$board = $_POST['boardNo'];
	$preURL = $_POST['preURL'];

	$images = $_POST['attach_image'];
	$imagesName = $_POST['attach_image_filename'];
	$imagesSize = $_POST['attach_image_fileSize'];
	// $imagesDownPath = $_SERVER['DOCUMENT_ROOT']."/daumeditor/images/kdy_image/";
	$imagesDownPath = "/daumeditor/images/kdy_image/";

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
	$sql ="UPDATE board 
			set
			lecname='".$board_lecname."' ,  
			lectype='".$board_lectype."' ,  
			title='".$board_title."' ,
			score='".$radio."' ,
			contents='".$content."' ,
			NAME='".$useName."' ,
			id='".$useId."' ,
			DATE= NOW() ,
			attachPath= '".$imgPath."',
			attach= '".$imgName."',
			attachDownPath= '".$imgDownPath."',
			fileSize= '".$imgSize."'
			where 1=1
			AND no='".$board."' ";
			
	$result = mysql_query($sql);
	//header("Location:".$preURL);
	$msg = "후기가 수정되었습니다";  
	echo " <html><head>  
	<script name=javascript>  
		if('$msg' != '') {  
		self.window.alert('$msg');  
		} 
		location.href='$preURL';  
	</script>
	</head></html> ";
?>