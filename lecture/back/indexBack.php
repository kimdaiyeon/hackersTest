<?php
session_start();
$mode = $_GET['mode'];			//reauset가 list로 올경우
$exMode = explode('_', $mode); //reauset가 board_list로 올경우
switch($mode){
	case "'".$mode."'" :include $_SERVER['DOCUMENT_ROOT']."/lecture/view/".$mode.".php";
	break;
	case "write":include $_SERVER['DOCUMENT_ROOT']."/lecture/view/boardWrite.php";
	break;
	case "update":include $_SERVER['DOCUMENT_ROOT']."/lecture/view/boardWrite.php";
	break;
	default :
		include $_SERVER['DOCUMENT_ROOT']."/lecture/index.php";
	break;
}
?>






<?php
// session_start();
// $mode = $_GET['mode'];
// $exMode = explode('_', $mode);

// switch($mode){
// 	case "board_".$exMode[1]:include $_SERVER['DOCUMENT_ROOT']."/lecture/";
// 	break;
// 	case 'board_'.$mode: include $_SERVER['DOCUMENT_ROOT']."/board".$mode.".php" break;
// 	case "write":include $_SERVER['DOCUMENT_ROOT']."/lecture/view/boardWrite.php";
// 	break;
// 	case "view":include $_SERVER['DOCUMENT_ROOT']."/boardView.php";
// 	break;
// 	case "update":include $_SERVER['DOCUMENT_ROOT']."/lecture/view/boardWrite.php";
// 	break;
// 	default :
// 		include $_SERVER['DOCUMENT_ROOT']."/index.html";
// 	break;
// }
?>