<?php
    class sanpham{
        // phương thức hiên thị sản phẩm new
        function getHangHoaNew()
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // b2: cần lấy cái gì thì truy vấn cái đó
            $select="select a.mahh,a.tenhh ,b.hinh,b.dongia,b.giamgia,b.idkichco ,c.idkichco ,c.co,d.idloai,d.tenloai from sanpham a,ctsanpham b,kichco c,loaisp d
            WHERE a.mahh=b.idhanghoa and b.idkichco=c.idkichco and a.maloai=d.idloai  ORDER by a.mahh DESC limit 8";
            //b3: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt 
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getHangHoaSale()
        {
             //B1: kết nối đc với dữ liệu
             $db=new connect();
             // b2: cần lấy cái gì thì truy vấn cái đó
             $select="select a.mahh,a.tenhh,b.hinh,b.dongia,c.co,b.giamgia from sanpham a,ctsanpham b, kichco c 
             WHERE a.mahh=b.idhanghoa and b.idkichco=c.Idkichco and b.giamgia!=0 ORDER by a.mahh DESC LIMIT 4";
             //b3: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt 
             $result=$db->getList($select);
             return $result;// lấy được dữ liệu về
        }
        function getHanghoaAll(){
            $db=new connect(); 
            $select="select a.mahh,a.tenhh,b.dongia,b.hinh,b.giamgia,c.co FROM sanpham a,ctsanpham b,kichco c WHERE a.mahh=b.idhanghoa and b.idkichco=c.idkichco and b.giamgia=0 ORDER BY a.mahh DESC;";
            //ai thực hiện câu truy vấn select ? query
            $result=$db->getList($select);  
            return $result;
        }
        function getHanghoaAllSale(){
            $db=new connect(); 
            $select="select a.mahh,a.tenhh,b.hinh,b.dongia,b.giamgia,c.co from sanpham a,ctsanpham b, kichco c 
            WHERE a.mahh=b.idhanghoa and b.idkichco=c.Idkichco and b.giamgia!=0 ORDER by a.mahh DESC;";
            //ai thực hiện câu truy vấn select ? query
            $result=$db->getList($select);  
            return $result;
        }
        //phân trang cho sản phẩm
        function getHanghoaAllPage($start, $limit){
            $db=new connect(); 
            $select="select a.mahh,a.tenhh,b.hinh,b.dongia from sanpham a,ctsanpham b WHERE a.mahh=b.idhanghoa ORDER by a.mahh DESC limit ".$start.','.$limit;
            //ai thực hiện câu truy vấn select ? query
            $result=$db->getList($select);  
            return $result;
    }
    function getHangHoaID($id)  {
        $db=new connect();
        $select= "SELECT DISTINCT a.mahh , a.tenhh , a.mota ,b.dongia FROM sanpham a, ctsanpham b WHERE a.mahh=b.idhanghoa and a.mahh =$id;";
        //query  ? getlist va getInstance
        $result=$db->getInstance($select);
        return $result;
    }
    function getHangHoaSize($id) {
        $db=new connect();
        $select ="SELECT a.idkichco ,b.co FROM ctsanpham a,kichco b WHERE a.idkichco=b.idkichco and a.idhanghoa=$id";
        $result=$db->getList($select);
        return $result;
    }
    function getHangHoaHinh($id) 
    {
        $db=new connect();
        $select ="SELECT a.hinh FROM ctsanpham a WHERE a.idhanghoa=$id";    
        $result=$db->getList($select);
        return $result;
    }
    function getdanhmuc($ac){
        $db=new connect();
        $select="SELECT a.mahh,a.tenhh,a.mota,a.maloai,b.tenloai,c.hinh,c.dongia,c.giamgia  FROM sanpham a,loaisp b,ctsanpham c WHERE a.maloai=b.idloai and a.mahh=c.idhanghoa and a.maloai=$ac";
        $result=$db->getList($select);
        return $result;
    }
    function getdanhmucPage($ac,$limit,$start){
        $db=new connect();
        $select="SELECT a.mahh,a.tenhh,a.mota,a.maloai,b.tenloai,c.hinh,c.dongia,c.giamgia  FROM sanpham a,loaisp b,ctsanpham c WHERE a.maloai=b.idloai and a.mahh=c.idhanghoa and a.maloai=$ac limit ".$start.','.$limit;
        $result=$db->getList($select);
        return $result;
    }
    function getHangHoaIDMauSizeHinh($id,$size)
    {
        $db=new connect();
        //b2: can lay cai gi thi viet cau lenh select cai do
        $select="SELECT DISTINCT a.hinh from ctsanpham a, kichco b
        WHERE a.idhanghoa=$id and  b.co='$size'";
        $result=$db->getInstance($select);
        return $result;
    }
    function searchSanpham($txtsearch)
    {
        $db = new connect();
        $select = "select a.mahh,a.tenhh,b.dongia,b.hinh  from sanpham a ,ctsanpham b WHERE a.mahh=b.idhanghoa and tenhh LIKE '%$txtsearch%'";
        $result = $db->getList($select);
        return $result;
    }
}
?>