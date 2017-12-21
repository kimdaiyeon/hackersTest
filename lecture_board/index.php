<?php
include_once $_SERVER['DOCUMENT_ROOT']."/DBconfig.php";
session_start();

include $_SERVER['DOCUMENT_ROOT']."/include/header.php";
$mode = $_SERVER['DOCUMENT_ROOT']."/lecture_board/view/".$_GET['mode'].".php";
if(!file_exists($mode)){
	include $_SERVER['DOCUMENT_ROOT']."/index.html";
}else{
	include	$mode;
}
include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
?>







<?php
// session_start();
// $mode = $_GET['mode'];
// $exMode = explode('_', $mode);

// switch($mode){
// 	case "board_".$exMode[1]:include $_SERVER['DOCUMENT_ROOT']."/lecture_board/";
// 	break;
// 	case 'board_'.$mode: include $_SERVER['DOCUMENT_ROOT']."/board".$mode.".php" break;
// 	case "write":include $_SERVER['DOCUMENT_ROOT']."/lecture_board/view/boardWrite.php";
// 	break;
// 	case "view":include $_SERVER['DOCUMENT_ROOT']."/boardView.php";
// 	break;
// 	case "update":include $_SERVER['DOCUMENT_ROOT']."/lecture_board/view/boardWrite.php";
// 	break;
// 	default :
// 		include $_SERVER['DOCUMENT_ROOT']."/index.html";
// 	break;
// }
?>