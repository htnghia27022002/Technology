<?php
   require "../config/connect.php";
   if(isset($_GET['id'])&&$_GET['id']!=""){
      $sql_delete = "DELETE FROM cart WHERE id_cart=".$_GET['id'];
      $sql_de = "DELETE FROM cart_detail WHERE code_cart=".$_GET['code_cart'];
      echo $sql_delete;
      echo $sql_de;
      if($cnn->query($sql_delete)&&$cnn->query($sql_de)){
         header("location:order.php");
      }
      else{
         echo '<script language="javascript">alert("Xóa thất bại!");
               window.location="order.php";
               </script>';
      }
   }
?>