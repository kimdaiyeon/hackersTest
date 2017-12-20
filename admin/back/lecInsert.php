<?php 
	include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";

	$lec_no = $_POST['lecNo'];
	$lec_type = $_POST['lecdata_type'];
	$lec_name = $_POST['lecdata_name'];
	$lec_teacher = $_POST['lecdata_teacher'];
	$lec_level = $_POST['lecdata_level'];
	$lec_time = $_POST['lecdata_time'];
	$lec_timenum = $_POST['lecdata_timenum'];
	
	
	$img_dirDB = "http://test.hackers.com/admin/img"; 
	$img_dir = $_SERVER['DOCUMENT_ROOT']."/admin/img";
	
	$img_tmp = $_FILES['lecdata_upfile']['tmp_name']; //임시 파일명 
	$img_type = $_FILES['lecdata_upfile']['type']; //저장가능 이미지 타입 
	$img_name = $_FILES['lecdata_upfile']['name']; //파일명(ex: xxxx.jpg) 
	
	 
	if($img_name){
		$filename = explode(".",$img_name); //파일명 및 확장자를 분리한 배열 
		$extension = strtoupper($filename[sizeof($filename)-1]); //확장자 추출 
		
		 
		
		// 기존의 파일과 이름이 같을 경우 filename 을 2_filename 과 같이 rename 
		$now_count = 0; 
		$echo_now_count = ""; 
		$original_file_name = $img_name; 
		
		while( 1 ){ 
			$lec_imgname = $echo_now_count.$original_file_name; // 파일이름 변경 
			if(!file_exists("$img_dir/$lec_imgname")){
				break;
			}  
			if($now_count){
				$now_count++;
			}else{ 
				$now_count=2;
			}
			$echo_now_count = $now_count."_"; 
		} 
		$lec_imgpath = $img_dir."/".$lec_imgname; //copy시 전체경로 및 파일명 
		$lec_imgpathDB= $img_dirDB."/".$lec_imgname;
		
		if(copy($img_tmp, $lec_imgpath)) { //파일 업로드 
			unlink($img_tmp); //임시파일삭제 
		}else{
			unlink($img_tmp); 
			echo(" 
					 <script> 
		
					 window.alert('파일 저장시 오류가 발생하였습니다.\\n감사합니다.'); 
		
					 history.go(-1); 
		
					 </script> 
		
					 "); 
			 exit; 
		 }	
		// echo 'filepath:';
		// print_r($extension);
		// echo '</br>';
		// echo 'filename:';
		// print_r($lec_imgname);
	
		 //과제.확장자가 이미지 파일이 아닌것을 올렸을때
		 if($extension=="PHP"||$extension=="C"||$extension == "HTML"||$extension == "HWP"){
			unlink($img_tmp); 
			echo(" 
					 <script> 
		
					 window.alert('웹관련 파일 업로드는 지원 하지않습니다.\\n감사합니다.'); 
		
					 history.go(-1); 
		
					 </script> 
		
					 "); 
			 exit;
		 }
		 $sql="INSERT into lecture (lec_name,lec_type,lec_teacher,lec_level,lec_time,lec_timenum,lec_imgpath,lec_imgname)
		 value ('". $lec_name ."','". $lec_type ."','". $lec_teacher ."','". $lec_level ."','". $lec_time ."','". $lec_timenum ."','". $lec_imgpathDB ."','". $lec_imgname ."')";
	}else{
		$sql="INSERT into lecture (lec_name,lec_type,lec_teacher,lec_level,lec_time,lec_timenum,lec_imgpath,lec_imgname)
		value ('". $lec_name ."','". $lec_type ."','". $lec_teacher ."','". $lec_level ."','". $lec_time ."','". $lec_timenum ."','','')";	
	}
	
	echo $sql; 
	$msg = "강의가 등록되었습니다";  
	echo " <html><head>  
	<script name=javascript>  
		if('$msg' != '') {  
		self.window.alert('$msg');  
		} 
		location.href='/admin/index.php';  
	</script>
	</head></html> ";
	mysql_query($sql) or die (mysql_error());
?>