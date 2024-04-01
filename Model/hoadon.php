<?php
class hoadon
{
    function insertHoaDon($makh)
    {
        $db=new connect();
        $date= new DateTime('now');
        $ngay=$date->format('Y-m-d');//trong database dinh dang la nam thang ngay
        $query="insert into hoadon(mahd,makh,ngaydat,tongtien) values (NULL,$makh,'$ngay',0)";
        $db->exec($query);
        //da insert vao database roi
        //cai can lay ra la ma so hd vua insert vao
        $select="select mahd from hoadon order by mahd desc limit 1";
        $mahd=$db->getInstance($select);
        return $mahd[0]; //tra ve array(14);
    }
    //phuong thuc insert vao bang cthoadon
    function insertCTHoaDon($mahd,$mahh, $soluongmua,$size, $thanhtien)
    {
        $db=new connect();
        $query="insert into cthoadon(mahd,mahh,soluongmua,co,thanhtien)
        values ($mahd,$mahh,$soluongmua,'$size',$thanhtien)";
        $db->exec($query);
    }
    //phuong thuc update
    function updateHoaDonTongTien($mahd,$makh,$tongtien)
    {
        $db=new connect();
        $query="update hoadon set tongtien=$tongtien WHERE mahd=$mahd and makh=$makh";
        $db->exec($query);
    }
    function getKhachHangHD($mahd)
    {
        $db = new connect();
        $select = "select a.mahd,b.tenkh,b.diachi,b.sodienthoai,a.ngaydat from hoadon a, khachhang b Where a.makh=b.makh and mahd=$mahd";
        $result = $db->getInstance($select);
        return $result;
    }
    function getHangHoaHD($mahd)
    {
        $db = new connect();
        $select = "SELECT DISTINCT a.mahd,c.tenhh,b.dongia,a.soluongmua,a.co,a.thanhtien from cthoadon a,ctsanpham b,sanpham c WHERE a.mahh=b.idhanghoa and c.mahh=b.idhanghoa and a.mahd=$mahd";
        $result = $db->getList($select);
        return $result;
    }
}
?>