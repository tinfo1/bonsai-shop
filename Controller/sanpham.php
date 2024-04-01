<?php
$act = "sanpham";
if (isset($_GET["act"])) {
    $act = $_GET["act"]; //sanpham khuyen mai
}
switch ($act) {
    case 'sanpham':
        include_once './View/sanpham.php';
        break;

    case 'sanphamkhuyenmai':
        include_once "./View/sanpham.php";
        break;
    case 'sanphamchitiet':
        include_once "./View/sanphamchitiet.php";
        break;
    case 'searchtxt':
        $search = $_POST['txtsearch'];
        $bn = new sanpham;
        // Lưu kết quả truy vấn vào biến $result
        $result = $bn->searchSanpham($search);
        // Truyền biến $result vào trang web banhngotsearch.php
        include_once "./View/searchsp.php";
        break;
}
