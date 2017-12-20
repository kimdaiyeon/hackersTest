<?php    
    include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";
    //include("DBconfig.php");
    
    $chId = $_POST['chId'];
    $sql = "SELECT * FROM test WHERE id='".$chId."'";
    $result = mysql_query($sql);
    $count = mysql_num_rows($result);

    echo $count;
?>