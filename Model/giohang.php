<?php
class giohang{
    function addGioHang($id,$co,$soluong)
    {
        //thieu hinh, ten sp, ten mau, thanh tien, don gia
        // tu id truy van ra lay duoc ten, don gia
        $sp=new sanpham();
        $idsp=$sp->getHangHoaId($id);
        $tensp=$idsp['tenhh'];
        $dongia=$idsp['dongia'];
        //lay ra ten mau, tu idmau lay ra mau sac
        // $mau=$hh->getHangHoaMauSacId($idmau);
        // $tenmau=$mau['mausac'];
        //lay hinh dua vao idsan sam, idmau, size
        $hinh=$sp->getHangHoaIDMauSizeHinh($id,$co);
        $img=$hinh['hinh'];
        $total=$soluong*$dongia;
        $flag=false;
        $index=0;
        //truoc khi them vao gio hang thi can kiem tra xem la gio hang do co hang hay chua
        //duyet qua gio hang
        foreach($_SESSION['cart'] as $key => $item){
            if($item['mahh']==$id  && $item['size']==$co)
            {
                $flag=true;
                $soluong +=$_SESSION['cart'][$key]['soluong'];
                $this->updateGioHang($index,$soluong);//giohang::updateGioHang...
            }
        }
        if($flag==false)
        {
            //tao ra doi tuong
        $item=array(
            'mahh'=>$id,//thuoc tinh -> gia tri
            'tenhh'=>$tensp,
            'hinh'=>$img,
            'size'=>$co,
            'soluong'=>$soluong,
            'dongia'=>$dongia,
            'thanhtien'=>$total
        );
        //dem doi tuong them vao gio hang a[]
        $_SESSION['cart'][]=$item;
        }   
    }
    //phuong thuc updateGioHang
    function updateGioHang($index, $soluong)
    {
        if($soluong<=0)
        {
            unset($_SESSION['cart'][$index]);
        }
        else
        {
            //update la phep gan
            $_SESSION['cart'][$index]['soluong']=$soluong;
            $tiennew=$_SESSION['cart'][$index]['soluong']*$_SESSION['cart'][$index]['dongia'];
            $_SESSION['cart'][$index]['thanhtien']=$tiennew;
        }
    }
    function getTotal()
    {
        $subtotal=0;
        foreach($_SESSION['cart'] as $item){
            $subtotal+=$item['thanhtien'];
        }
        return number_format($subtotal,2);
    }
}
?>