<?php
$act = "dangky";
if(isset($_GET['act'])){
    $act=$_GET['act'];
}
switch($act){
    case 'dangky':
        include_once "./View/registration.php";
        break;
    case 'dangky_action':
        //gui gu lieu thong tin nguoi dung vua nhap qua dangky_action
        $tenkh='';
        $dc = '';
        $sodt='';
        $user='';
        $email='';
        $pass='';
        if(isset($_POST['submit'])){
            $tenkh=$_POST['txttenkh']; //minh anh
            $dc=$_POST['txtdiachi']; //hcm
            $sodt = $_POST['txtsodt']; //123456
            $user = $_POST['txtusername']; //anhanh
            $email=$_POST['txtemail'];
            $pass=$_POST['txtpass'];
            $saltF="G45a#?";
            $saltL='Td23$%';
            $passnew=md5($saltF.$pass.$saltL);//da dc ma hoa
            //controller yeu cau phai dem thong tin nafy insert vao database?Model
            //truoc khi insert can kiem tra xem user va email da ton tai chua?
            $kh=new user();
            $check=$kh->checkUser($user, $email)->rowCount();
            if($check>=1)
            {
                echo '<script> alert("Username hoặc Email đã tồn tại");</script>';
                echo '<meta http-equiv="refresh" content="0; url=./index.php?action=dangky"/>';
                //include_once "./View/registration.php"
            }
            else
            {
                //insert vao database
                $inskh=$kh->insertKH($tenkh,$user,$passnew,$email,$dc,$sodt);
                    if($inskh!==false)
                    {
                        echo '<script> alert("Đăng ký thành công");</script>';
                        //include_once "./View/home.php"
                        echo '<meta http-equiv="refresh" content="0; url=./index.php"/>';
                    }
                    else{
                        echo '<script> alert("Đăng ký không thành công");</script>';
                        //include_once "./View/registration.php"
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=dangky"/>';
                    }
            }
        }
        break;
}
?>