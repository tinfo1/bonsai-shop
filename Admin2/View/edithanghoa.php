<?php
  if(isset($_GET['id']))
  {
    $mahh=$_GET['id'];
    $hh=new hanghoa();
    $kq=$hh->getHangHoaID($mahh);
    $tenhh=$kq['tenhh'];
    $maloai=$kq['maloai'];
    $mota=$kq['mota'];
  }
?>
<?php
$ac=1;
if(isset($_GET['action']))
{
  if(isset($_GET['act'])&& $_GET['act']=='insert_action')
  {
    $ac=1;
  }
  else
  {
    $ac=2;
  }
}
?>
<div class="row col-md-4 col-md-offset-4" >
  <?php
    if($ac==1)
    {
      echo'<form action="index.php?action=hanghoa&act=insert_action" method="post" enctype="multipart/form-data">';
    }
    else
    {
      echo'<form action="index.php?action=hanghoa&act=update_action" method="post" enctype="multipart/form-data">';
    }
  ?>

    <table class="table" style="border: 0px;">

      <tr>
        <td>Mã hàng</td>
        <td> <input type="text" class="form-control" name="mahh" value="<?php if(isset($mahh)) echo $mahh;?>" readonly/></td>
      </tr>
      <tr>
        <td>Tên hàng</td>
        <td><input type="text" class="form-control" name="tenhh"  value="<?php if(isset($tenhh)) echo $tenhh;?>"  maxlength="100px"></td>
      </tr>
     
      <tr>
        <td>Mã loại</td>
        <td>
          <select name="maloai" class="form-control" style="width:150px;">
            <?php
            $selectLoai=-1;
            if(isset($maloai) && $maloai!=-1)
            {
              $selectLoai=$maloai;
            }
              $loai=new loai();
              $result=$loai->getLoai();
              while($set=$result->fetch()):
            ?>
              <option value="<?php echo $set['idloai']?>" <?php if($selectLoai==$set['idloai']) echo 'selected';?>><?php echo $set['tenloai']?></option>
            <?php
             endwhile;
            ?>
          </select>
        </td>
      </tr>
   
      <tr>
        <td>Mô tả</td>
        <td><input type="text" class="form-control"  value="<?php if(isset($mota)) echo $mota;?>" name="mota">
        </td>
      </tr>
      

      <tr>
        <td colspan="2">
          <input type="submit" value="submit">
          

        </td>
      </tr>

    </table>
  </form>
</div>