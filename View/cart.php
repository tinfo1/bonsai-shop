<div class="table-responsive">
  <?php
  if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
  ?>
  <div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <td colspan="5">
              <h2 style="color: red;">THÔNG TIN GIỎ HÀNG</h2>
            </td>
          </tr>
          <tr class="table-success text-center">
            <th>Số TT</th>
            <th>Tên sản phẩm</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th colspan="2">Giá</th>
            <th>Số lượng :</th>
            <th>
              <p>Thành tiền <sup><u>đ</u></sup></p>
            </th>
            <th>chức năng</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $j = 0;
          foreach ($_SESSION['cart'] as $key => $item) {
            $j++;
          ?>
            <tr>

              <td><?php echo $j; ?></td>

            <td> <?php echo $item['tenhh'] ?></td>

              <td>
                <img width="50px" height="50px" src="Content/imagetourdien/<?php echo $item['hinh']; ?>">
              </td>

              <td> Size:<?php echo $item['size'] ?> </td>

              <td>Đơn Giá:
                <?php echo number_format($item['dongia']); ?> 
            </td>

            <form action="index.php?action=giohang&act=update_giohang&id=<?php echo $key; ?>" method="post">

            <td>
                <input type="text" name="newqty[<?php echo $key; ?>]" value="<?php echo $item['soluong']; ?>" /><br />
              </td>

              <td>
              <p style="float: right;"> Thành Tiền : <?php echo number_format($item['thanhtien']); ?> <sup><u>đ</u></sup></p>
              </td>


              <td>
                <a href="index.php?action=giohang&act=delete_giohang&id=<?php echo $key; ?>">
                <button type="button" class="btn btn-danger">Xóa</button>
              </a>

                <button type="submit" class="btn btn-secondary">Sửa</button>

              </td>
            </form>
            </tr>
          <?php
          }
          ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b>   
                <?php
                  $gh=new giohang();
                  echo $gh->getTotal();
                ?> 
                <sup><u>đ</u></sup></b>
            </td>
            <td><a href="index.php?action=thanhtoan">Thanh toán</a></td>
          </tr>
        </tbody>
      </table>
      </div> 
  <?php
  } else {
    echo '<script> alert("Giỏ hàng của bạn chưa có hàng");</script>';
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
  }
  ?>
</div>
</div>