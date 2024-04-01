  <!-- quảng cáo -->
  <?php
  include "quangcao.php";
  ?>
  <!-- end quảng cáo -->
  <?php
  //bước 1 xác định  có bao nhiêu sản phẩm , select count(*)
  $hh = new sanpham();
  $ac = 1;
  if (isset($_GET['action'])) {
    $idloai = 6;
    $count = $hh->getHanghoaAll()->rowCount();
    if ($_GET['action'] == 'senda') {
      $ac = 1;
      $idloai = $ac;
      $count = $hh->getdanhmuc($idloai)->rowCount();
    }
    if ($_GET['action'] == 'chauhoa') {
      $ac = 2;
      $idloai = $ac;
      $count = $hh->getdanhmuc($idloai)->rowCount();
    }
    if ($_GET['action'] == 'phanbon') {
      $ac = 3;
      $idloai = $ac;
      $count = $hh->getdanhmuc($idloai)->rowCount();
    }
    if ($_GET['action'] == 'phukien') {
      $ac = 4;
      $idloai = $ac;
      $count = $hh->getdanhmuc($idloai)->rowCount();
    }
    if ($_GET['action'] == 'sanpham') {
      if (isset($_GET['act']) && $_GET['act'] == 'sanphamkhuyenmai') {
        $ac = 5;
      }
    }
  }
  $count = $hh->getHanghoaAll()->rowCount(); //14
  //bước 2 xác định  limit
  $limit = 8;
  //bước 3 tính ra là có bao nhiêu trang
  $trang = new page();
  $page = $trang->findPage($count, $limit); //2 trang 
  //bước 4  tính ra start 
  $start = $trang->findStart($limit);
  //bước 5 tạo biến chứa trang hiện tại 
  $current_page = isset($_GET["page"]) ? $_GET["page"] : 1;
  ?>
  <!-- end số lượt xem san phẩm -->
  <!-- sản phẩm-->





  <?php

  ?>
  <!--Section: Examples-->
  <section id="examples" class="text-center">

    <!-- Heading -->
    <div class="row">
      <div class="col-lg-8 text-right">
        <?php
        if ($ac == 1) {
          echo    ' <h1 class="mb-5 font-weight-bold text-left" style="color: Green;">Sen da-xuong rong</h1>';
        }
        if ($ac == 2) {
          echo '<h1 class="mb-5 font-weight-bold text-left" style="color: Green;">chau hoa</h1>';
        }
        if ($ac == 3) {
          echo '<h1 class="mb-5 font-weight-bold text-left" style="color: Green;">phan bon</h1>';
        }
        if ($ac == 4) {
          echo '<h1 class="mb-5 font-weight-bold text-left" style="color: Green;">phu kien</h1>';
        }
        if ($ac == 5) {
          echo '<h1 class="mb-5 font-weight-bold text-left" style="color: Green;">SẢN PHẨM KHUYẾN MÃI</h1>';
        }
        if ($ac == 6) {
          echo '<h1 class="mb-5 font-weight-bold text-left" style="color: Green;">SẢN PHẨM MOIWS NHAATS</h1>';
        }
        ?>
      </div>

    </div>
    <!--Grid row-->
    <div class="row">

      <?php

      $hh = new sanpham();

      //đổ từng sp lên View
      if ($idloai <= 5) {
        $result = $hh->getdanhmucPage($ac,$limit,$start);
      }
      else if ($idloai = 6) {
        $result = $hh->getHanghoaAllPage($start, $limit);
      }


      while ($set = $result->fetch()) :
      ?>
        <!--Grid column-->
        <div class="col-lg-3 col-md-4 mb-3 text-left">

          <div class="view overlay z-depth-1-half">
            <img src="Content/imagetourdien/<?php echo $set['hinh']; ?>  " class="img-fluid" alt="" style="height: 300px;">
            <div class="mask rgba-white-slight"></div>
          </div>
          <?php
          if ($ac <=5 ) {
            echo '<h5 class="my-4 font-weight-bold" style="color: red;">' . number_format($set['dongia']) . '</h5>';
          }
          if ($ac =6 ) {
            echo '<h5 class="my-4 font-weight-bold">
                    <font style-color= "red">' . number_format($set['dongia']) . '<sup><u>đ</u></sup>' .
              '</font>';
          }
          ?>
          </h5>
          <!-- <h5 class="my-4 font-weight-bold" style="color: red;">
                  <?php echo number_format($set['dongia']); ?><sup><u>đ</u></sup></br>
                  </h5> -->
          <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>">
            <span><?php echo $set['tenhh']; ?></span></br></a>
          <button class="btn btn-danger" id="may4" value="lap 4">New</button>


        </div>
      <?php
      endwhile;
      ?>
    </div>

    <!--Grid row-->

  </section>


  <!-- end sản phẩm mới nhất -->


  <div class="col-md-6 div col-md-offset-3">
    <ul class="pagination">
      <?php
      if ($current_page > 1 && $page > 1) {
        if ($idloai == 6) {
          echo '  <li ><a href="./index.php?action=sanpham&page=' . ($current_page - 1) . '">Prev</a></li>';
        } else if ($idloai <= 5) {
          echo '  <li ><a href="index.php?action=senda&page=1&ac=' . $ac . '&page=' . ($current_page - 1) . '">Prev</a></li>';
        }
      }
      for ($i = 1; $i <= $page; $i++) :
        if ($idloai == 6) :
      ?>

          <li><a href="./index.php?action=sanpham&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        endif;
        if ($idloai <= 5) :
        ?>
        <li><a href="index.php?action=<?php echo $ac; ?>&page=1&ac=<?php echo $ac; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php
      endif;
      endfor;
      if ($current_page < $page & $page > 1) {
        if ($idloai == 6) {
          # code...
          echo '  <li ><a href="./index.php?action=sanpham&page=' . ($current_page + 1) . '">Prev</a></li>';
        } else if ($idloai <= 5) {
          echo '<li ><a href="index.php?action=senda&page=1&ac=' . $ac . '&page=' . ($current_page + 1) . '">Prev</a></li>';
        }
      }
      ?>
    </ul>
  </div>
  <style>
    a:hover{
        color: #1ECA19;
    }
  </style>
