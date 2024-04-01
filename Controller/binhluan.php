<?php 
if (isset($_SESSION['makh'])) {
    $makh=$_SESSION['makh'];
    $masp=$_POST['txtmahh'];
    $noidung=$_POST['comment']; 
    //inser cao database
    $bl= new binhluan();
    $bl->insertComment($makh,$masp,$noidung);
}
echo '<meta http-equiv="refresh" content="0;url=./index.php?action=banhngot&act=chitietbanhngot&id'.$masp.'"/>';
?>