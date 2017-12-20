<?php 
    header("Content-Type:application/json"); 
    $img_tmp = $_FILES['board_image_file']['tmp_name']; //임시 파일명 
	$img_type = $_FILES['board_image_file']['type']; //저장가능 이미지 타입 
    $img_name = $_FILES['board_image_file']['name']; //파일명(ex: xxxx.jpg) 
    $img_size = $_FILES['board_image_file']['size']; //사이즈
    
    $img_dir = $_SERVER['DOCUMENT_ROOT']."/daumeditor/images/kdy_image";
    
    
    // 기존의 파일과 이름이 같을 경우 filename 을 2_filename 과 같이 rename 
    $now_count = 0; 
    $echo_now_count = ""; 
    $original_file_name = $img_name; 
    
    while( 1 ){ 
        $board_imgname = $echo_now_count.$original_file_name; // 파일이름 변경 
        if(!file_exists("$img_dir/$board_imgname")){
            break;
        }  
        if($now_count){
            $now_count++;
        }else{ 
            $now_count=2;
        }
        $echo_now_count = $now_count."_"; 
    }

    $imgpath = $img_dir."/".$board_imgname; //copy시 전체경로 및 파일명 

    if(copy($img_tmp, $imgpath)) { //파일 업로드 
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
    
    $img_file = new stdClass(); 
    $img_file->tmp_name = $_FILES['board_image_file']['tmp_name']; //임시 파일명 
    $img_file->type = $_FILES['board_image_file']['type']; //저장가능 이미지 타입 
    $img_file->name = $_FILES['board_image_file']['name']; //파일명(ex: xxxx.jpg) 
    $img_file->size = $_FILES['board_image_file']['size']; //사이즈
    $img_file->defaultPath = $_SERVER['DOCUMENT_ROOT']; //사이즈
    echo json_encode($img_file);
?>