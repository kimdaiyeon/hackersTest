<?php
session_start();
$mode = $_GET['mode'];

switch($mode){
	case "step_01":include $_SERVER['DOCUMENT_ROOT']."/newmember1.php";
	break;
	case "step_02":include $_SERVER['DOCUMENT_ROOT']."/newmember2.php";
	break;
	case "step_03":include $_SERVER['DOCUMENT_ROOT']."/newmember3.php";
	break;
	case "regist":include $_SERVER['DOCUMENT_ROOT']."/newmember4.php";
	break;
	case "complete":include $_SERVER['DOCUMENT_ROOT']."/member/login.html";
	break;
	case "find_id":include $_SERVER['DOCUMENT_ROOT']."/find_id.php";
	break;
	case "find_pass":include $_SERVER['DOCUMENT_ROOT']."/find_pass.php";
	break;
	case "modify":include $_SERVER['DOCUMENT_ROOT']."/modify.php";
	break;
	default :
		include $_SERVER['DOCUMENT_ROOT']."/index.html";
	break;
}
?>