<?php
   $serverName = "localhost";
   $userName = "root";
   $passWord = "root1234";
   $databaseName = "Technology";
   $cnn = mysqli_connect($serverName,$userName,$passWord,$databaseName);
   if(mysqli_connect_errno()){
      echo "Lỗi ".mysqli_connect_error();
      exit();
   }
?>