<?php
class connect {
    // thuộc tính
    var $db=null;
    // hàm tạo được gọi khi tạo 1 đối tượng
    function __construct()
    {
        $dsn='mysql:host=127.0.0.1;dbname=shopbanhoa';
        $user='root';
        $pass='';//nếu sài wamp,xamp, $pass=''
        try {
            $this->db=new PDO($dsn,$user,$pass,array(PDO:: MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); // :: là private
            // echo "kết nối thành công";
        } catch (\Throwable $th) {
            //throw $th;
            echo "kết nối không thành công";
            echo $th;
        }
    }
    // phương thức thực thi câu truy vấn  select ? ai làm ? query
    function getList($select) {
        $result=$this->db->query($select);//result=this->db->query(select*from)
        return $result;//1 table là 1 array lớn
        
    }
    // phương thức trả về 1 row
    function getInstance($select) {
        $results=$this->db->query($select);//result=this->db->query(select*from...where)
        $result=$results->fetch();//result là  1 array  của 1 dòng
        return $result;
    }
    // phương thức thực hiện câu truy vấn  insert,update,delete
    function exec($query) {
        $result=$this->db->exec($query);
        return $result;
    }
    // phương thức dùng prepare
    function execP($query) {
        $statement=$this->db->prepare($query);
        return $statement;
    }
}
?>