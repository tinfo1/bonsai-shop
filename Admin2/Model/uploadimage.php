<?php
    function uploadImage()
    {
        // tạo thư mục chứa hình lấy về
        $target_dir="../../DuAnMau/Content/imagetourdien/";
        // lấy hình về từ server và để vào trong đường dẫn target_dir
       // $target_file="D:/NămHoc2021/PHP2/CodeMauNgay27_11_23/Nhom3/DuAnMau/Content/imagetourdien/hinh1.jpg";
        $target_file=$target_dir.basename($_FILES['image']['name']);
        // lấy phần mở rộng
        $imagefileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // kiểm tra xem image đã tồn tại trên server chưa
        $upload=1;
        if(isset($_POST['submit']))
        {
            $check=getimagesize($_FILES["image"]["tmp_name"]);
            // $check=$_FILES["image"]["size"];
            if($check!==false)
            {
                $upload=1;
            }
            else
            {
                $upload=0;
            }
        }
        // kiểm tra xem hinh này đã tồnt tại trong thư mục
        if(file_exists($target_file))
        {
            $upload=0;
            echo "Hình đã tồn tại";
        }
        // kiểm tra xem hình đó có vượt quá dung lượng hay không
        // 500kb=500000b
        if($_FILES["image"]["size"]>500000)
        {
            $upload=0;
            echo "Hình vượt quá dung lượng";
        }
        // kiểm tra xem có phài là hình hay không
        if($imagefileType!="jpg" && $imagefileType!="png"&& $imagefileType!="jpeg" && $imagefileType!="gif")
        {
            $upload=0;
            echo "Không phải là hình";
        }
        // tiến hành đưa hình vào thư mục
        if($upload==1)
        {
            if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file))
            {
                
                echo "Upload hình thành công";
            }
            else
            {
                echo "upload hình không thành công";
            }
        }

    }
?>