<?
    $mode = $_GET['mode'];

    switch($mode) {
        case 'login':
            include_once $_SERVER['DOCUMENT_ROOT']."/member/DBconfig.php";
            session_start();
            $id = $_POST['id'];
            $preURL = $_POST['preURL'];
            $pw = $_POST['pw'];
            $currentURL = $_POST['currentURL'];
            $sql= "select * from test where 1=1 and id='".$id."' ";
            $result = mysql_query($sql);
            $count = mysql_num_rows($result);
            
            if($count == "1"){
                $_SESSION['id'] = $_POST['id'];
                $row = mysql_fetch_array($result);
                $dbPw = $row['pw'];
                if(fnLogin($_POST['pw'],$dbPw)){
                    $dbNo = $row['no'];
                    $_SESSION['no'] = $dbNo;
                    $dbNm = $row['nm'];
                    $_SESSION['nm'] = $dbNm;
                    $dbId = $row['id'];
                    $_SESSION['id'] = $dbId;
                    $dbIdLevel = $row['idlevel'];
                    $_SESSION['idlevel'] = $dbIdLevel;
        
                    header('Location:'.$preURL);
                }else{
                    echo "<script>alert(\"PASSWORD가 일지하지 않습니다\");</script>";
                    echo "<script>history.go(-1);</script>";
                }
                
            }else{
                echo "<script>alert(\"존재하지 않는 ID입니다.\");</script>";
                echo "<script>document.location.href='/member/login.html';</script>";
            }
            
            function fnLogin($loginPw,$dbPw){
                
                $loginPw=hash('sha256',$loginPw);
        
                if(strcasecmp($loginPw,$dbPw) == 0){
                    return true;
                }else{
                    return false;
                }
            }
        break;

    }
?>