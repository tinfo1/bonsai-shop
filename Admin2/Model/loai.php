<?php
    class loai{
        function getLoai()
        {
            $db=new connect();
            $select="select * from loaisp";
            $result=$db->getList($select);
            return $result;
        }
    }
?>