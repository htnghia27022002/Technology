<?php
include("../../config/connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <title>Thanh toán</title>
   <style>
      * {
         margin: 0;
         padding: 0;
         font-family: Arial, Helvetica, sans-serif;
      }

      h1 {
         font-family: Moon Dance;
         font-size: 80px;
      }

      h5 {
         font-size: 25px;
         font-weight: 500;
      }

      .col-sm-6 p {
         font-size: 25px;
         font-weight: bold;
      }

      .table tr td {
         padding: 20px 10px;
         font-size: 20px;
         font-style: italic;
      }

      .td {
         font-weight: bold;
      }

      table {
         margin-bottom: 100px;
      }

      table tr th {
         font-size: 18px;
         height: 50px;
      }

      .thanhtoan {
         color: white;
         text-decoration: none;
      }
   </style>
</head>

<body>
   <div class="container">
      <?php
      $id_kh = $_SESSION["id"];
      $sql = "SELECT * FROM admin_user WHERE id = '" . $id_kh . "'";
      $result_kh = mysqli_query($cnn, $sql);
      $r_kh  = $result_kh->fetch_assoc();
      if (!isset($_SESSION["id"])) {
         echo "<script> alert('Bạn cần phải đăng nhập để thực hiện thanh toán !!');
            window.location='../../login.php';
            </script>";
      } else { ?>
         <h1>Thanh toán đơn hàng</h1>
         <div class="container">
            <div class="row">
               <div class="col-sm-6">
                  <p>Thông tin khách hàng</p>
                  <table class="table" border="0" cellpadding="5">
                     <tr>
                        <td>Tên khách hàng:</td>
                        <td class="td"><?php echo $r_kh['name']; ?></td>
                     </tr>
                     <tr>
                        <td>Email: </td>
                        <td class="td"><?php echo $r_kh['email']; ?></td>
                     </tr>
                     <tr>
                        <td>Số điện thoại: </td>
                        <td class="td"><?php echo $r_kh['phone']; ?></td>
                     </tr>
                     <tr>
                        <td>Địa chỉ: </td>
                        <td class="td"><?php echo $r_kh['address']; ?></td>
                     </tr>
                  </table>
                  <?php
                  $code_oder = rand(0, 9999);
                  $insert_cart = "insert into cart(id_khachhang,code_cart,cart_status) values('" . $id_kh . "','" . $code_oder . "',1)";
                  if(isset($_POST['submit'])){
                  $cart_query = $cnn->query($insert_cart);}
                  
                  ?>
               </div>
               <div class="col-sm-6">
                  <p>Thông tin đơn hàng</p>
                  <table class="text-center" width="100%" cellspacing="0" cellpadding="5">
                     <tr>
                        <th>Hình Ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                        <th>Thành Tiền</th>
                        <th></th>
                     </tr>
                     <?php
                     $stt = 0;
                     $thanhtien = 0;
                     $tong = 0;
                     foreach ($_SESSION['cart'] as $item) {
                        $stt++;
                        $dongia = ($item["price"] * (100 - $item['sale']))/100;
                        $thanhtien = $dongia * $item['amount'];
                        $tong += $thanhtien;
                     ?>
                        <tr>
                           <td><img width="80px" src="../../img\<?php echo $item['image']; ?>" alt=""></td>
                           <td><?php echo $item['name']; ?></td>
                           <td>
                              x<?php echo $item['amount']; ?>
                           </td>
                           <td><?php  echo number_format($dongia); ?></td>
                           <td><?php echo number_format($thanhtien);  ?></td>
                        </tr>
                        <?php
                           $id_sp = $item['id'];
                           $soluong = $item['amount'];
                           $insert_cart_detail = "insert into cart_detail(code_cart,id_sanpham,soluong) values('" . $code_oder . "','" . $id_sp . "','".$soluong."')";
                           if(isset($_POST['submit'])){
                           $cnn->query($insert_cart_detail);
                           }
                        ?>
                     <?php } ?>
                     <tr style="background-color: aliceblue !important;height:80px;">
                        <td style="text-align: left;font-weight: bold; font-size:20px;" colspan="8">Tổng cộng: <?php echo number_format($tong) . " Vnđ";  ?></td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      <?php 
      
   } ?>
   <form action="" method="POST">
      <input class="btn btn-warning" type="submit" name="submit" value="Đặt Hàng">
   </form>
   </div><br><br>
   <?php
      if(isset($_POST['submit'])){
         unset($_SESSION['cart']);
         echo "<script> alert('Cảm ơn bạn đã mua hàng !');
            window.location='../../index.php';
            </script>";
      }
   ?>
</body>
</html>