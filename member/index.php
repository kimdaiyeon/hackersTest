<?php
include_once $_SERVER['DOCUMENT_ROOT']."/DBconfig.php";
session_start();
include $_SERVER['DOCUMENT_ROOT']."/include/header.php";
$mode = $_SERVER['DOCUMENT_ROOT']."/member/view/".$_GET['mode'].".php";
if(!file_exists($mode)){
	include $_SERVER['DOCUMENT_ROOT']."/index.html";
}else{
	include	$mode;
}
include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
?>