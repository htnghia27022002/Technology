<div style="min-height: 600px;">

<?php
   require "config/connect.php";
   if(isset($_GET["x"]))
   {
      $x = $_GET["x"];
   }
   else
   {
      $x = "";
   }
   switch($x){
      case "":
         include ("main/slider.php");
         include ("main/sanphamnoibat.php");
         include ("main/sanphamhapdan.php");
         include ("main/sanphammoi.php");
         include ("main/tintuc.php");
      break;
      case "chitiet":
         include ("main/chitiet.php");
      break;
      case "sanpham":
         include ("main/sanpham.php");
      break;
      case "cart":
         include ("main/cart.php");
      break;  
      case "search":
         include ("main/search.php");
      break;
   }
?>
</div>
