<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/DBconfig.php";
    session_start();

    $mode = $_GET['mode'];

    switch($mode){

        case 'check_id': 
            $chId = $_POST['chId'];
            $sql = "SELECT * FROM test WHERE id='".$chId."'";
            $result = mysql_query($sql);
            $count = mysql_num_rows($result);
            echo $count;
        break;
        //
        case 'find_id':
            $name = $_POST['findId_name'];
            $phone = $_POST['findId_phone'];
            $email = $_POST['findId_email'];
            
            if($phone != ""){
                $sql = "SELECT * FROM test WHERE 1=1 and nm='".$name."' and pnum='".$phone."' " ;
            }
            
            if($email != ""){
                $sql = "SELECT * FROM test WHERE 1=1 and nm='".$name."' and email='".$email."' " ;
            }
            
            $result = mysql_query($sql);
            $count = mysql_num_rows($result);
            
            if($count == "1"){
                $row = mysql_fetch_array($result);
                $dbNm = $row['nm'];
                $dbId = $row['id'];
                $_SESSION['findId_nm'] = $dbNm;
                $_SESSION['findId_id'] = $dbId;
                echo "true";
            }else{
                echo "false";
                session_destroy();
            }
        break;
        //
        case 'find_pw':
            $name = $_POST['findPw_name'];
            $id = $_POST['findPw_id'];
            $phone = $_POST['findPw_phone'];
            $email = $_POST['findPw_email'];
            
            if($phone != ""){
                $sql = "SELECT * FROM test WHERE 1=1 and nm='".$name."' and id='".$id."' and pnum='".$phone."' " ;
            }
            
            if($email != ""){
                $sql = "SELECT * FROM test WHERE 1=1 and nm='".$name."' and id='".$id."' and email='".$email."' " ;
            }
            
            $result = mysql_query($sql);
            $count = mysql_num_rows($result);
            
            if($count == "1"){
                $row = mysql_fetch_array($result);
                $dbNo = $row['no'];
                $_SESSION['findPw_no'] = $dbNo;
                echo "true";
            }else{
                echo "false";
                session_destroy();
            }
        break;
        //
        case 'find_pw_update':
            $no = $_POST['findPw_no'];
            $pw = $_POST['findPw_pw1'];
            $pwN=hash('sha256',$pw);
            $sql = "UPDATE test SET pw='".$pwN."' WHERE NO='".$no."'";
            $result = mysql_query($sql);
            echo $result;  
        break;
        //
        case 'update':
            $no = $_POST['no'];
            $nm = $_POST['nm'];
            $id = $_POST['id'];
            $pw = $_POST['pw'];
            $pwN=hash('sha256',$pw);
            $email = $_POST['email'];
            $nNum = $_POST['nNum'];
            $pun = $_POST['pun'];
            $adress = $_POST['adress'];
            $adressdetail = $_POST['adressdetail'];
            $snsinfo = $_POST['snsinfo'];
            $mailinfo = $_POST['mailinfo'];
            if($pw != ""){
                //비번포함 수정
                $sql = "UPDATE test 
                        SET 
                        id='".$id."' ,  
                        pw='".$pwN."' ,  
                        email='".$email."' ,
                        nnum='".$nNum."' ,
                        pun='".$pun."' ,
                        adress='".$adress."' ,
                        adressdetail='".$adressdetail."' ,
                        snsinfo='".$snsinfo."' ,
                        mailinfo='".$mailinfo."' 
                        WHERE 1=1 
                        AND no='".$no."' 
                        AND nm='".$nm."' ";
            }else{
                //비번외 수정
                $sql = "UPDATE test 
                        SET 
                        id='".$id."' ,  
                        email='".$email."' ,
                        nNum='".$nNum."' ,
                        pun='".$pun."' ,
                        adress='".$adress."' ,
                        adressdetail='".$adressdetail."' ,
                        snsinfo='".$snsinfo."' ,
                        mailinfo='".$mailinfo."' 
                        WHERE 1=1 
                        AND no='".$no."' 
                        AND nm='".$nm."' ";
            }
            $result = mysql_query($sql);
            echo $result;
        break;
        //
        case 'login':
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
        //
        case 'logout':
            session_start();
            session_destroy();
            $prevPage = $_SERVER["HTTP_REFERER"];
            header('Location:'.$prevPage);
        break;
    }  
?>