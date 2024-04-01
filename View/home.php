
 <?php
  include_once "Model/sanpham.php";
  ?>
  <!--Section: Examples-->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="row">
          <div class="col-lg-8 text-right"><br>
              <h1 class="mb-5 font-weight-bold" style="color: Green;">SẢN PHẨM MỚI NHẤT</h1>
          </div>
          <div class="col-lg-4 text-right mt-4">
              <a href="index.php?action=sanpham&ac=6">
                  <span style="color: gray;">Xem chi tiết</span></div>
          </a>


      </div>
      <!--Grid row-->
      <div class="row">
         <?php
            $hh=new sanpham();
            $result=$hh->getHangHoaNew();//gọi dữ liệu được lấy về và đổ lên  view
            while($set=$result->fetch())://$set là array
         ?>

              <!--Grid column-->
              <div class="col-lg-3 col-md-3 mb-3 text-left " >
                   <div>
                   <p style=" border: 3px solid white; background-color: #1ECA19; text-align: center;color: antiquewhite; margin-bottom: 2px; width: 265px;margin-left: -1px;">
                       <?php echo $set['tenloai'];?>
                   </p>
                   </div>
                  <div class="view overlay z-depth-1-half ">
                      <img src="./Content/imagetourdien/<?php echo $set['hinh'];?>" class="img-fluid " style="height: 300px;" alt="">
                      <div class="mask rgba-white-slight"></div>
                  </div>

                  <h5 class="my-4 font-weight-bold" style="color: red;"><?php echo number_format($set['dongia']); ?><sup><u>đ</u></sup></h5>
                  <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>">
                      <span><?php echo $set['tenhh']; ?></span></a>
                  <button class="btn btn-danger" id="may4" value="lap 4">New</button>
               

              </div>
              <?php
              endwhile;
              ?>
         
      </div>

      <!--Grid row-->

  </section>
  <!-- end sản phẩm mới nhất -->
  <!-- sản phẩm khuyến mãi -->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="row">
          <div class="col-lg-8 text-right">
            <br>
              <h1 class="mb-5 font-weight-bold" style="color: Green;">SẢN PHẨM KHUYẾN MÃI</h1>
          </div>
          <div class="col-lg-4 text-right mt-4">
              <a href="index.php?action=sanpham&act=sanphamkhuyenmai">
                  <span style="color: gray;">Xem chi tiết</span></div>
          </a>

      </div>
      <!--Grid row-->
      <div class="row">
         
         <?php 
            $hh=new sanpham();
             $result = $hh -> getHangHoaSale();
             while($set=$result->fetch()) {  
         ?>
           <!--Grid column-->
           <div class="col-lg-3 col-md-4 mb-3 text-left">

               <div class="view overlay z-depth-1-half">
                   <img class="hinh" src="Content\imagetourdien\<?php echo $set['hinh']?>" class="img-fluid" alt=""  style="height: 300px;width: 95%;">
                   <div class="mask rgba-white-slight"></div>
               </div>

               <h5 class="my-4 font-weight-bold">
                   <font color="red"><?php echo $set['giamgia']?><sup><u>đ</u></sup></font>
                   <strike><?php echo $set['dongia']; ?></strike><sup><u>đ</u></sup>
               </h5>

               <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>">
                   <span><?php echo $set['tenhh'];?></span></a>
               <button class="btn btn-danger" id="may4" value="lap 4">SALE</button>
             
           </div>
         <?php }?>
   </div>


  </section>
  <!-- end sản phẩm khuyến mãi -->
  <style>
    a:hover{
        color: #1ECA19;
    }
  </style>
