<style>
    .menu>li:hover>a {
        background-color: #23CF5A;
        text-align: center;
        border-radius: 15px;
        box-shadow: 0px 0px 5px #23CF5A;
    }

    .menu li a {
        font-size: 16px;
        font-weight: 600;
        font-family: 'Times New Roman', Times, serif;

    }
</style>
<header class="row ">
    <!-- nav san pham -->
    <section class="col-12" style="height: 60px;">
        <div class="row ">

            <!-- test -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top scrolling-navbar" style="margin-bottom: 0px;">

                <div class="collapse navbar-collapse" id="basicExampleNav">

                    <!-- Links -->
                    <ul class="navbar-nav mr-auto smooth-scroll menu">
                        <li class="nav-item active " style="margin-left:90px;">
                            <a class="nav-link" href="index.php?action=senda&page=1&ac=1"><b>SEN ĐÁ - XƯƠNG RỒNG</b> </a>
                        </li>
                        <li class="nav-item active" style="margin-left:100px;">
                            <a class="nav-link" href="index.php?action=chauhoa&page=1&ac=2"><b>CHẬU ĐẤT NUNG - CHẬU SỨ</b></a>
                        </li>
                        <li class="nav-item active" style="margin-left:100px;">
                            <a class="nav-link" href="index.php?action=phanbon&page=1&ac=3"><b>ĐẤT TRỒNG - PHÂN BÓN</b></a>
                        </li>
                        <li class="nav-item active" style="margin-left:100px;">
                            <a class="nav-link" href="index.php?action=phukien&page=1&ac=4"> <b>PHỤ KIỆN TIỂU CẢNH</b></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- end test -->
        </div>


    </section>
    <!-- dang ky -->
    <section class="row offset-md-3">

        <div class="col-12">
            <div class="row ">
                <nav class="navbar navbar-expand-lg n navbar-light bg-light" style="margin-bottom: 0px; ">

                    <!-- Right -->
                    <ul class="navbar-nav ml-auto menu">
                        <li class="nav-item active ">
                            <a class="nav-link" href="index.php?action=home"> <i class="fa fa-home"></i> Trang Chủ <span class="sr-only">(current)</span></a>
                        </li>


                        <li>
                            <form class="form-inline" action="index.php?action=sanpham&act=searchtxt" method="post" style="margin-top:8px;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <!-- <a href="Trangchu.php?trang=tk"> -->
                                        <input class="input-group-text" style="height: 35px;" type="submit" id="btsearch" value="Tìm Kiếm" />
                                        <!-- </a> -->
                                        <!-- <span class="input-group-text">@</span> -->
                                        <input type="text" name="txtsearch" class="form-control" placeholder="Tìm Kiếm" />
                                    </div>

                            </form>
                        </li>
                        <?php
                        if (!isset($_SESSION['makh'])) {
                        ?>
                            <li class="nav-item">
                                <a href="index.php?action=dangky" class="nav-link">Đăng Ký</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?action=dangnhap" class="nav-link"><span class="fa fa-user"></span> Đăng Nhập</a>;
                            </li>
                        <?php
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['makh'])) {
                        ?>
                            <li class="nav-item">
                                <a href="index.php?action=dangnhap&act=dangxuat" class="nav-link">Đặng Xuất</a>
                            </li>
                        <?php
                        }
                        ?>
                        <li>
                            <a href="index.php?action=giohang" class="nav-link"><img src="./Content/imagetourdien/cartx2.png" width="30px" height="30px" alt=""></a>

                        </li>
                        <li>

                            <?php
                            if (isset($_SESSION['makh'])) {
                                echo '<li> 
                                    <p style="color: red; margin-top: 20px; margin-left: 0px;">' . $_SESSION['tenkh'] . '</p> 
                                    </li>';
                            } else {
                                echo '<li> 
                                    <p style="color: red; margin-top: 20px; margin-left: 0px;">Xin Chào </p> 
                                    </li>';
                            }
                            ?>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </section>


</header>
<!-- dang ky -->

<!-- hinh dộng -->
<div class="row">

    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div id="carousel-example-1z" class="carousel slide carousel-fade carousel-fade" data-ride="carousel">
                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                        <li data-target="#carousel-example-1z" data-slide-to="2"></li>

                    </ol>
                    <!--/.Indicators-->
                    <!--Slides-->
                    <div class="container">

                        <div class="carousel-inner z-depth-1-half" role="listbox" style="margin:auto">
                            <!--First slide-->
                            <div class="carousel-item active">
                                <img class=" w-100" src="./Content/imagetourdien/banner2.png" style="height: 500px;" alt=" First slide">
                            </div>
                            <!--/First slide-->
                            <!--Second slide-->
                            <div class="carousel-item">
                                <img class=" w-100" src="./Content/imagetourdien/banner1.jpg" style="height: 500px;" alt="Second slide">
                            </div>
                            <!--/Second slide-->
                            <!--Third slide-->
                            <div class="carousel-item">
                                <img class="w-100" src="./Content/imagetourdien/banner3.png" alt="Third slide" style="height: 500px;">
                            </div>

                            <!--/Third slide-->
                        </div>

                    </div>
                    <!--/.Slides-->
                    <!--Controls-->
                    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <!--/.Controls-->
                </div>
            </div>
        </div>

    </div>
</div>