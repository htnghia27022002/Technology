<?php
include "../config/connect.php";
$a = $_GET['a'];
switch ($a) {
   case "add":
      if (isset($_POST['submit'])) {
         $name = $_POST['name'];
         $parent_id = $_POST['parent_id'];
         $catalog_id = $_POST['catalog_id'];
         $price = $_POST['price'];
         $content = empty($_POST['content']) ? "Không có dữ liệu!" : $_POST['content'];
         $sale = $_POST['sale'] == "" ? 0 : $_POST['sale'];
         $image = basename($_FILES['image']['name']);
         $image_list = basename($_FILES['image_list']['name']) == "" ? basename($_FILES['image']['name']) : basename($_FILES['image']['name']) . "," . basename($_FILES['image_list']['name']);
         $status = $_POST['status'];
         $sql_add = 'insert into product(parent_id,catalog_id,name,price,content,sale,image_link,image_list,status) 
            values(@parent_id,@catalog_id,"@name",@price,"@content",@sale,"@image_link","@image_list",@status)';
         $search = ['@parent_id', '@catalog_id', '@name', '@price', '@content', '@sale', '@image_link', '@image_list', '@status'];
         $replace = ["$parent_id", "$catalog_id", "$name", "$price", "$content", "$sale", "$image", "$image_list", "$status"];
         $sql_add = str_replace($search, $replace, $sql_add);
         $file = $_FILES['image'];
         $img_tmp = $_FILES['image']['tmp_name'];
         if ($file['type'] == 'image/jpeg' || $file['type'] == 'imgae/jpg' || $file['type'] == 'image/png') {
            if (basename($_FILES['image_list']['name'])!="") {
               if ($_FILES['image_list']['type'] == 'image/jpeg' || $_FILES['image_list']['type'] == 'imgae/jpg' || $_FILES['image_list']['type'] == 'image/png') {
                  move_uploaded_file($_FILES['image_list']['tmp_name'], '../img/' . basename($_FILES['image_list']['name']));
                  move_uploaded_file($img_tmp, '../img/' . $image);
                  mysqli_query($cnn, $sql_add);
                  echo '<script language="javascript">alert("Đã upload thành công!");
                  window.location="add.php";
                  </script>';
               } else {
                  echo '<script language="javascript">alert("Đã upload thất bại!");
                  window.location="add.php";
                  </script>';
               }
            } else {
               move_uploaded_file($img_tmp, '../img/' . $image);
               mysqli_query($cnn, $sql_add);
               echo '<script language="javascript">alert("Đã upload thành công!");
               window.location="add.php";
               </script>';
            }
         }
      }
      break;
   case "edit":
      if(isset($_POST['submit'])){
         $id = $_POST['id'];
         $name = $_POST['name'];
         $price = $_POST['price'];
         $content = empty($_POST['content']) ? "Không có dữ liệu!" : $_POST['content'];
         $sale = $_POST['sale'] == "" ? 0 : $_POST['sale'];
         $status = $_POST['status'];
         $sql_edit = "UPDATE product SET name='@name',price=@price,content='@content',sale=@sale,status=@status WHERE id=@id";
         $se = ['@name','@price','@content','@sale','@status','@id'];
         $re = ["$name","$price","$content","$sale","$status","$id"];
         $sql_edit = str_replace($se,$re,$sql_edit);
         if(mysqli_query($cnn,$sql_edit)){
            echo '<script language="javascript">alert("Sửa thành công!");
               window.location="index.php";
               </script>';
         }else{
            $echo = '<script language="javascript">alert("Sửa thất bại!");
               window.location="edit.php?id=@id";
               </script>';
            $echo = str_replace('@id',"$id",$echo);
            echo $echo;
         }
      }
      break;
   case "delete":
      $sql_delete = "DELETE FROM product WHERE id=".$_GET['id'];
      if(mysqli_query($cnn,$sql_delete)){
         header("location:index.php");
      }else{
         echo '<script language="javascript">alert("Có liên quan không xóa được!");
               window.location="index.php";
               </script>';
      }
      break;
}
