<?php 
class binhluan{
    function insertComment($makh,$mahh,$noidung)  {
        $db=new connect;
        $query="insert into binhluan(mabinhluan,makh,mahh,noidung,luotthich) value (null,$makh,$mahh,'$noidung',0)";
        $db->exec($query);
    }

    function selectBinhLuan($mabanh)  {
        $db=new connect;
        $select="select a.TENKH,b.noidung from khachhang a,binhluan b where a.MAKH=b.makh and b.mabanh=$mabanh";
        $result=$db->getList($select);
        return $result;
    }
}
?>