<?php
    class cthanghoa{
        function insertCTHangHoa($mahh,$mamau,$masize,$dongia,$slt,$hinh,$giamgia)
        {
            $db=new connect();
            $query="insert into cthanghoa(idhanghoa,idmau,idsize,dongia,soluongton,hinh,giamgia) values ($mahh,$mamau,$masize,$dongia,$slt,'$hinh',$giamgia)";
            echo $query;
            $result=$db->exec($query);
            return $result;
        }
    }
?>