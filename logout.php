<?php
   session_start();
   if($_SESSION['name'] && $_SESSION['id']){
      unset($_SESSION['name']);
      unset($_SESSION['id']);
      echo "<script> alert('Bạn đã đăng xuất !!');
            window.location='index.php';
            </script>";
   }else{
      echo "<script> alert('Bạn chưa đăng nhập !!');
            window.location='index.php';
            </script>";
   }

?>