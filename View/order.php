<div class="table-responsive">
 
<?php 
if (!isset($_SESSION['makh'])) :
  echo '<script> alert("Vui lòng đăng nhập trước khi mua hàng)</script>';
  echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
?>
<?php 
else:
?>

    <form action="" method="post">
      <table class="table table-bordered" border="0">
     
      <?php
      if (isset($_SESSION['mahd'])):
        $mahd = $_SESSION['mahd'];
        $hd = new hoadon();
        $khhd = $hd->getKhachHangHD($mahd);
        $tenkh = $khhd['tenkh'];
        $dc = $khhd['diachi'];
        $sdt = $khhd['sodienthoai'];
        $ngay = $khhd['ngaydat']
          ?>
      
      
       <tr>
          <td colspan="4">
            <h2 style="color: red;">HÓA ĐƠN</h2>
          </td>
        </tr>
      <tr>
          <td colspan="2">Số Hóa đơn: 
            <?php echo $mahd; ?>
          </td>

          <td colspan="2"> Ngày lập:
          <?php echo $ngay; ?>
          </td>
        </tr>
       <tr>
          <td colspan="2">Họ và tên:</td>
          <td colspan="2">  <?php echo $tenkh; ?> </td>
        </tr>
       <tr>
          <td colspan="2">Địa chỉ:  </td>
          <td colspan="2">   <?php echo $dc; ?></td>
        </tr>
        <tr>
          <td colspan="2">Số điện thoại: </td>
          <td colspan="2">  <?php echo $sdt; ?></td>
        </tr>
        ?>
      </table>
      <!-- Thông tin sản phầm -->
      <table class="table table-bordered">
        <thead>

          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
          
        <?php
          $j = 0;
          $sp = $hd->getHangHoaHD($mahd);
          while ($set = $sp->fetch()):
            $j++;
            ?>

            <tr>
              <td>  <?php echo $j ?></td>
              <td>   <?php echo $set['tenhh'] ?></td>
              <td>Size: <?php echo $set['co']?> </td>
              <td>Đơn Giá: <?php echo $set['dongia'] ?> 
               - Số Lượng:  <?php echo $set['soluongmua'] ?><br />
              </td>
            </tr>
            <?php
          endwhile;
          ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b> 
              <?php
                $gh = new giohang();
                echo $gh->getTotal();
                ?>  
              <sup><u>đ</u></sup></b>
            </td>
           
          </tr>
        </tbody>
      </table>
    </form>
    <?php
      endif;
      ?>
</div>
<?php  
endif;
?>
</div>