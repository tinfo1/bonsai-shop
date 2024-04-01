<?php
//kiem tra nguoi dung co gio hang hay chua
if(!isset($_SESSION['cart']))
{
    $_SESSION['cart']=array();
}
$act="giohang";
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}
switch($act){
    case 'giohang':
        include_once "./View/cart.php";
        break;
    case 'giohang_action':
        //nhan duoc idhang, mamau, size, soluong
        $id=0;
        $size='';
        $soluong=0;
        if(isset($_POST['mahh']))
        {
            $id=$_POST['mahh'];
            $size=$_POST['size'];
            $soluong=$_POST['soluong'];
            //controller yeu cau add nhung thong tin vao trong giohang
            $gh=new giohang();
            $gh->addGioHang($id,$size,$soluong);
             echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
        }
        break;
    case 'delete_giohang':
        if(isset($_GET['id']))
        {
            $vt=$_GET['id'];
            unset($_SESSION['cart'][$vt]);
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
        break;
    case 'update_giohang':
        //truyền qua đây là newqty vì nó là thẻ input
        if(isset($_POST['newqty']))
        {
            $newsl=$_POST['newqty'];//$newsl=array(0:2,1:4,2:1);
            var_dump($newsl);
            //duyệt qua giỏ hàng,đối tượng nào có sl khác nhau với sl của newsl thì tiến hành update
            foreach($newsl as $key => $value)
            {
                if($_SESSION['cart'][$key]['soluong']!=$value)
                {
                    $gh=new giohang();
                    $gh->updateGioHang($key,$value);
                }
            }
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
        break;
}
?>