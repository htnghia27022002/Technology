<?php
   session_start();
   include "../../config/connect.php";
      //cong so luong
      if(isset($_SESSION['cart']) && isset($_GET['cong'])){
         $id = $_GET['cong'];
         foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
               $product[] = array('id'=>$cart_item['id'],'name'=>$cart_item['name'],'amount'=>$cart_item['amount'],'image'=>$cart_item['image'],'price'=>$cart_item['price'],'sale'=>$cart_item['sale']);                
               $_SESSION['cart'] = $product;
            }
            else{
               $tang = $cart_item['amount'] +1;
               if($tang <= 10){
                  $product[] = array('id'=>$cart_item['id'],'name'=>$cart_item['name'],'amount'=>$tang,'image'=>$cart_item['image'],'price'=>$cart_item['price'],'sale'=>$cart_item['sale']);                               
               }
               else{
                  $product[] = array('id'=>$cart_item['id'],'name'=>$cart_item['name'],'amount'=>$cart_item['amount'],'image'=>$cart_item['image'],'price'=>$cart_item['price'],'sale'=>$cart_item['sale']);                
               }
               $_SESSION['cart'] = $product;
            }
         }
         header("location:../../index.php?x=cart");
      }
      //tru so luong
      if(isset($_SESSION['cart']) && isset($_GET['tru'])){
         $id = $_GET['tru'];
         foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
               $product[] = array('id'=>$cart_item['id'],'name'=>$cart_item['name'],'amount'=>$cart_item['amount'],'image'=>$cart_item['image'],'price'=>$cart_item['price'],'sale'=>$cart_item['sale']);                
               $_SESSION['cart'] = $product;
            }
            else{
               $giam = $cart_item['amount'] - 1;
               if($giam > 0){
                  $product[] = array('id'=>$cart_item['id'],'name'=>$cart_item['name'],'amount'=>$giam,'image'=>$cart_item['image'],'price'=>$cart_item['price'],'sale'=>$cart_item['sale']);                
               }
               else{
                  $product[] = array('id'=>$cart_item['id'],'name'=>$cart_item['name'],'amount'=>$cart_item['amount'],'image'=>$cart_item['image'],'price'=>$cart_item['price'],'sale'=>$cart_item['sale']);                
               }
               $_SESSION['cart'] = $product;
            }
         }
         header("location:../../index.php?x=cart");
      }
      //xoa
      if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
         $id = $_GET['xoa'];
         foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
               $product[] = array('id'=>$cart_item['id'],'name'=>$cart_item['name'],'amount'=>$cart_item['amount'],'image'=>$cart_item['image'],'price'=>$cart_item['price'],'sale'=>$cart_item['sale']);                
            }
            $_SESSION['cart'] = $product;
         }
         header("location:../../index.php?x=cart");
      }
      //xoa tat ca
      if(isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1){
         unset($_SESSION['cart']);
         header("location:../../index.php?x=cart");
      }
      //them
      $id = $_GET["id"];
      $amount = 1;
      $sql = "SELECT * FROM product where id = '".$id."' LIMIT 1";
      $result = mysqli_query($cnn,$sql);
      $row = $result->fetch_array();
      if($row){
         $new_product = array(array('id'=>$id,'name'=>$row['name'],'amount'=>$amount,'image'=>$row['image_link'],'price'=>$row['price'],'sale'=>$row['sale']));
         if(isset($_SESSION['cart'])){
            $found = false;
            foreach($_SESSION['cart'] as $cart_item){
               if($cart_item['id'] == $id){
                  $product[] = array('id'=>$cart_item['id'],'name'=>$cart_item['name'],'amount'=>$cart_item['amount'] + 1 ,'image'=>$cart_item['image'],'price'=>$cart_item['price'],'sale'=>$cart_item['sale']);
                  $found = true;
               }else{
                  $product[] = array('id'=>$cart_item['id'],'name'=>$cart_item['name'],'amount'=>$cart_item['amount'],'image'=>$cart_item['image'],'price'=>$cart_item['price'],'sale'=>$cart_item['sale']);
               }
            }
            if($found == false){
               $_SESSION['cart'] = array_merge($product,$new_product);
            }else{
               $_SESSION['cart'] = $product;
            }
         }
         else{
            $_SESSION['cart'] = $new_product;
         }
         if(isset($_POST['addcart'])){
            $str =  "<script> alert('Đã thêm vào giỏ !!');
            window.location='../../index.php?x=chitiet&id=@id';
            </script>";
            $echo = str_replace('@id',$_GET["id"],$str);
            echo $echo;
         }
         else{
            header("location:../../index.php?x=cart");
         }
      }
