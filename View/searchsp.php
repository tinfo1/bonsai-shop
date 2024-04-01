<div class="container">

    <div class="row">
    
        <?php 
        $db=new sanpham();
        while ($set = $result->fetch()):
        ?>
        <div class="col-lg-3 col-md-4 mb-3" style="min-width: 255px;">
                        <div class="card h-100" >
                          
                            <img class="card-img-top" src="./Content/imagetourdien/<?php echo $set['hinh'];?>" alt="">
                            <div style="min-height: 75px;" class="card-body d-flex flex-column align-items-stretch">
                                <a  href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>" class="card-title">
                                    <?php echo $set['tenhh'] ?>
                                </a>
                                <h5 class="my-4 font-weight-bold" style="color: red;">
                                    <?php echo number_format($set['dongia']); ?>
                                    <sup><u>đ</u></sup></br>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
            
                </div>
            </div>
    </div>
</div>