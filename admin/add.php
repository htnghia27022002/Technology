<?php
require "../config/connect.php";
$sql_Loai = "Select * from catalog";
$result_loai = mysqli_query($cnn, $sql_Loai);
$sql_dong = "Select * from category";
$result_dong = mysqli_query($cnn, $sql_dong);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <title>thêm sản phẩm</title>
   <style>
      td {
         font-size: 20px;
      }
      .icon{
         font-size: 35px;
         display: inline;
         padding: 0 20px;
      }
      .icon:hover{
         color: blue;
      }
   </style>

</head>
<body>
<div style="margin-top: 50px;" class="container">
            <a style="color: black;" href="index.php" title="Exit"><i class="icon bi bi-arrow-bar-left"></i></a>
            <h1 style="margin-top: 50px; color: brown;display: inline;">Thêm Sản phẩm mới </h1>
            <form enctype="multipart/form-data" action="handle.php?a=add" method="POST">
               <input type="hidden" name="ac" value="add">
               <table style="margin-left:200px;" cellpadding="10">
                  <tr>
                     <td>Tên Sản Phẩm:</td>
                     <td><input id="name" type="text" name="name"></td>
                  </tr>
                  <tr>
                     <td>Loại Sản Phẩm:</td>
                     <td>
                        <select name="parent_id">
                           <?php while ($row_loai = $result_loai->fetch_assoc()) { ?>
                              <option value="<?php echo $row_loai['parent_id'] ?>"><?php echo $row_loai['catalog_name'] ?></option>
                           <?php } ?>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td>Dòng Sản Phẩm:</td>
                     <td>
                        <select name="catalog_id">
                           <?php while ($row_dong = $result_dong->fetch_assoc()) { ?>
                              <option value="<?php echo $row_dong['catalog_id'] ?>"><?php echo $row_dong['category_name'] ?></option>
                           <?php } ?>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td>Giá Sản Phẩm:</td>
                     <td>
                        <input id="price" type="text" name="price">
                     </td>
                  </tr>
                  <tr>
                     <td>Nội Dung:</td>
                     <td>
                        <textarea name="content" cols="30" rows="5"></textarea>
                     </td>
                  </tr>
                  <tr>
                     <td>Giảm Giá:</td>
                     <td>
                        <input type="text" size="5" name="sale"><label for="sale">%</label>
                     </td>
                  </tr>
                  <tr>
                     <td>Hình Ảnh:</td>
                     <td>
                        <input type="file" name="image">
                     </td>
                  </tr>
                  <tr>
                     <td>Danh sách Hình Ảnh:</td>
                     <td><input type="file" name="image_list"></td>
                  </tr>
                  <tr>
                     <td>Hiện Trạng</td>
                     <td>
                        <table cellpadding="5">
                           <tr>
                              <td>
                                 <input checked type="radio" id="sp" name="status" value="0">
                                 <label for="sp">Sản Phẩm Thường</label><br>
                                 <input type="radio" id="spnb" name="status" value="1">
                                 <label for="spnb">Sản Phẩm Nỗi Bật</label>
                              </td>
                              <td>
                                 <input type="radio" id="sphd" name="status" value="2">
                                 <label for="sphd">Sản Phẩm Hấp Dẫn</label><br>
                                 <input type="radio" id="spm" name="status" value="3">
                                 <label for="spm">Sản Phẩm Mới</label>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
               <div width="100%" style="text-align: center; margin-bottom: 100px;">
                  <button class="btn btn-success" name="submit" type="submit">Thêm </button>
                  <button class="btn btn-warning" type="reset">Xóa</button>
               </div>
            </form>
         </div>
</body>
</html>