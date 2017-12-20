<?php
    //값 주고 받기 저장소
    $phone1=$_POST['phone1'];
    $phone2=$_POST['phone2'];
    $phone3=$_POST['phone3'];
    session_start();
    $_SESSION['phone1'] = $_POST['phone1'];
    $_SESSION['phone2'] = $_POST['phone2'];
    $_SESSION['phone3'] = $_POST['phone3'];
    $_SESSION['sessionPhoneCheck'] = '123456';

    $_SESSION['pageCheck']=$_POST['pageCheck'];
?>