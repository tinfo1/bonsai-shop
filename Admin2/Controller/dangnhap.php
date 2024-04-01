<?php
$act="dangnhap";
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        include_once "./View/dangnhap.php";
        break;
    
    case 'dangnhap_action':
       // nhận thông 
       if($_SERVER['REQUEST_METHOD']=='POST')// if(isset($_POST['txtusername'])&& isset($_POST['txtpassword']))// if(isset($_POST['login']))
       {
        $user=$_POST['txtusername'];
        $pass=$_POST['txtpassword'];
        $nv=new nhanvien();
        $check=$nv->getUserAdmin($user,$pass);
        if($check!==false)
        {
            $_SESSION['admin']=$check[0];
            echo '<script> alert("Đăng nhập thành công")</script>';
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa"/>';
        }
        else
        {
            echo '<script> alert("Đăng nhập  không thành công")</script>';
            include_once "./View/dangnhap.php";
        }
       }
        break;
}
    
?>