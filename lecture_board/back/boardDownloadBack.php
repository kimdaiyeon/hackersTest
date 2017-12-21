<?php
$save_dir = "이미지경로"; 
$file = $save_dir."/".$filename; 

Header("Content-type: application/x-msdownload"); 
Header("Content-Disposition: attachment; filename=".$filename.""); 
Header("Content-Transfer-Encoding: binary"); 
Header("Pragma: no-cache"); 
Header("Expires: 0"); 

$handle    = fopen($file, "r"); 
while(!feof($handle)){ 
        echo fread($handle,4096); 
}; 
?>