<?php
class user
{
    //phuong thuc kiem tra user va email co ton tai chua?
    function checkUser($user, $email)
    {
        $db = new connect();
        $select = "SELECT a.username,a.email from khachhang  a where a.username='$user' or a.email='$email'";
        $result = $db->getList($select);
        return $result;
    }
    //phuong thuc insert vao database
    function insertKH($tenkh, $user, $matkhau, $email, $diachi, $sodt)
    {
        $db = new connect();
        $query = "INSERT INTO khachhang (makh,tenkh,username,matkhau,email,diachi,sodienthoai)
        VALUES (NULL,'$tenkh','$user','$matkhau','$email','$diachi','$sodt')";
        //exec
        $result = $db->exec($query);
        return $result;
    }
    //thuc hien hien thi thong tin ra
    function loginKH($user, $pass)
    {
        $db = new connect();
        $select = "SELECT a.makh,a.tenkh,a.username FROM khachhang a WHERE a.username='$user' and a.matkhau='$pass'";
        $result = $db->getInstance($select);
        return $result;
    }
    function checkEmail($email)
    {
        $db = new connect();
        $select = "select * from khachhang where email='$email'";
        $result = $db->getList($select);
        return $result;
    }
    function updateEmailPass($emailold,$passnew)
    {
        $db = new connect();
        $query = "update khachhang set PASS='$passnew' where EMAIL='$emailold'";
        // echo $query;
        $db->exec($query);

    }
}
