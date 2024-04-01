<?php
$act="loai";
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}
switch ($act) {
    case 'loai':
        include_once "./View/addloaisanpham.php";
        break;
    
    case 'loai_action':
        // lấy file đó về
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            // lấy file về $_FILES, name,tmp_name, type,size,error
            $file=$_FILES['file']['tmp_name'];
            // thay thế nhưng ký tự xBB,xEF,xBF
            file_put_contents($file,str_replace("\xEF\xBF\xBB","",file_get_contents($file)));
            // mở file đó ra
            $file_open=fopen($file,"r");
            while(($csv=fgetcsv($file_open,1000,","))!==false)
            {
                $idloai=$csv[0];
                $tenloai=$csv[1];
                $idmenu=$csv[2];
                $db=new connect();
                $query="insert into loaisp(idloai,tenloai,idmenu) values($idloai,'$tenloai',$idmenu)";
                $db->exec($query);
            }
            echo '<script>alert("Import thành công");</script>';
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
        }
        break;
}
  
?>