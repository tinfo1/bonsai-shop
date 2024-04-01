<?php
//controller yêu cầu insert vào bảng hoadon
if (isset($_SESSION['makh'])) {
    $makh = $_SESSION['makh'];
    $hd = new hoadon();
    $sohd = $hd->insertHoaDon($makh); //14
    $_SESSION['mahd'] = $sohd;

    $total = 0;
    //đã có số hóa đơn, tiến hành insert vào bảng cthoadon
    //duyệt qua giỏ hàng, vì giỏ hàng được insert vào bảng cthoadon
    foreach ($_SESSION['cart'] as $key => $item) {
        //Controller yêu cầu model viết lệnh insert vào bảng cthoadon
        $hd->insertCTHoaDon($sohd, $item['mahh'], $item['soluong'], $item['size'], $item['thanhtien']);
        $total += $item['thanhtien'];
    }
    //sau khi insert vào cthoadon thì tiến hành update tổng tiền vào ngược lại bảng hoadon
    $hd->updateHoaDonTongTien($sohd, $makh, $total);
}
include_once "./View/order.php";
