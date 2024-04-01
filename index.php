  
<?php
include_once "Model/connect.php";
include_once "Model/sanpham.php";
//spl_autoload,load lên những  file  là class  hướng đối tượng
//cách 1:
// spl_autoload_register('myModelClassLoader');//
// function myModelClassLoader ($className) {
//     $path='Model/';
//     include_once $path.$className.'.php';
// }
//cách 2 :
session_start();
include_once "Model/class.phpmailer.php";
set_include_path(get_include_path() . PATH_SEPARATOR . 'Model/');
spl_autoload_extensions('.php');
spl_autoload_register();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- duong link icon cua boostrap4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!--duong link logo facbook  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
       integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- link đăng nhập -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- end link đăng nhập -->
    <link rel="stylesheet" type="text/css" href="Content/CSS/Tour.css" />
    <title>SanPham</title>
</head>

<body>
      <!-- header -->
<?php
    include_once "View/headder.php";
?>
      <!-- hiên thi noi dung -->
      <div class="container">
          <div class="row">
         <?php
         $ctrl="home";
         if(isset($_GET["action"]))
         {
            $ctrl=$_GET ["action"];
         }
         include_once "Controller/$ctrl.php";
         ?>
          </div>
      </div>
    <!-- hiên thị footer -->
    <?php
    include_once "View/footer.php";
    ?>
</body>

</html>