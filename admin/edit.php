<?php
require "../config/connect.php";
$id = $_GET['id'];
$sql = "SELECT * FROM product WHERE id = '".$id."'";
$result = mysqli_query($cnn,$sql);
$row = $result->fetch_assoc();
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
   <title>sửa sản phẩm</title>
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
            <h1 style="margin-top: 50px; color: brown;display: inline;">Sửa Sản Phẩm</h1>
            <form enctype="multipart/form-data" action="handle.php?a=edit" method="POST">
               <table style="margin-left:200px;" cellpadding="10">
                  <tr>         
                     <td>Tên Sản Phẩm:</td>
                     <input type="hidden" name="id" value="<?php echo $id ?>">
                     <td><input id="name" type="text" name="name" value="<?php echo $row['name']?>"></td>
                  </tr>                
                     <td>Giá Sản Phẩm:</td>
                     <td>
                        <input id="price" value="<?php echo $row['price']?>" type="text" name="price">
                     </td>
                  </tr>
                  <tr>
                     <td>Nội Dung:</td>
                     <td>
                        <textarea  name="content" cols="30" rows="5"><?php echo $row['content']?></textarea>
                     </td>
                  </tr>
                  <tr>
                     <td>Giảm Giá:</td>
                     <td>
                        <input size="5" type="text" value="<?php echo $row['sale']?>" name="sale"> <label for="sale">%</label>
                     </td>
                  </tr>
                     <td>Hiện Trạng</td>
                     <td>
                        <table cellpadding="5">
                           <tr>
                              <td>
                                 <input class="rd" checked type="radio" id="sp" name="status" value="0">
                                 <label for="sp">Sản Phẩm Thường</label><br>
                                 <input class="rd" type="radio" id="spnb" name="status" value="1">
                                 <label for="spnb">Sản Phẩm Nỗi Bật</label>
                              </td>
                              <td>
                                 <input class="rd" type="radio" id="sphd" name="status" value="2">
                                 <label for="sphd">Sản Phẩm Hấp Dẫn</label><br>
                                 <input class="rd" type="radio" id="spm" name="status" value="3">
                                 <label for="spm">Sản Phẩm Mới</label>
                              </td>
                           </tr>
                           <script>
                              const btnRadio = document.querySelectorAll(".rd");
                              btnRadio[<?php echo $row['status']; ?>].checked = true;
                           </script>
                        </table>
                     </td>
                  </tr>
               </table>
               <div width="100%" style="text-align: center; margin-bottom: 100px;">
                  <button class="btn btn-success" name="submit" type="submit">Lưu </button>
                  <button class="btn btn-warning" type="reset">Xóa</button>
               </div>
            </form>
         </div>
</body>
</html>