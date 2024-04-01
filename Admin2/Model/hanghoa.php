<?php
class hanghoa{
    function getHangHoa()
    {
        $db=new connect();
        $select="select * from sanpham";
        $result=$db->getList($select);
        return $result;
    }
    function insertHangHoa($tenhh,$maloai,$mota)
    {
        $db=new connect();
        $query="insert into sanpham(mahh,tenhh,maloai,mota) 
        values (Null,'$tenhh',$maloai,'$mota')";
       
        $result=$db->exec($query);
        return $result;
    }
    // phường thức lấy thông tin dựa vào id
    function getHangHoaID($id)
    {
        $db=new connect();
        $select="select * from sanpham where mahh=$id";
        $result=$db->getInstance($select);
        return $result;
    }
    function updateHangHoa($mahh,$tenhh,$maloai,$mota)
    {
        $db=new connect();
        $query="update sanpham 
        set tenhh='$tenhh',maloai=$maloai,mota='$mota' 
        where mahh=$mahh";
        
        $result=$db->exec($query);
        return $result;
    }
}
?>