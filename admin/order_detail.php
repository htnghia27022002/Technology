<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cart_detail</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <style>
      table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

      tr:nth-child(odd) {
         background-color: rgb(241 245 249); 
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
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
<?php
   require "../config/connect.php";
   if(isset($_GET['code'])){
   $sql = "SELECT * FROM cart_detail,product WHERE cart_detail.id_sanpham = product.id AND code_cart =".$_GET['code'];
   $result = $cnn->query($sql);
}
?>
<div class="container">
<div style="margin-top: 50px;" class="container">
<a style="color: black;" href="order.php" title="Exit"><i class="icon bi bi-arrow-bar-left"></i></a>
   <h1 style="margin-top: 50px; color: brown;display: inline;">Xem đơn hàng</h1>
<br><br>
<h4>Mã Đơn Hàng: <?php echo $_GET['code']?></h4>
<br>
<table cellspacing="0" width="100%" cellpadding="10">
         <tr>
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Hình</th>
            <th>Số Lượng</th>
            <th>Đơn Giá</th>
            <th>Thành tiền</th>
         </tr>
         <?php while($row=$result->fetch_assoc()):?>
            <tr>
               <td><?php echo $row['id']; ?></td>
               <td><?php echo $row['name']; ?></td>
               <td><img width="100px" height="100px" src="../img/<?php echo $row['image_link']; ?>"/></td>
               <td><?php echo $row['soluong']; ?></td>
               <?php 
                  $dongia = ($row["price"] * (100 - $row['sale']))/100;
               ?>
               <td><?php echo number_format($dongia) ?></td>
               <td><?php $thanhtien = $dongia * $row['soluong']; echo number_format($thanhtien); $tong +=$thanhtien;  ?></td>
            </tr>
         <?php endwhile; ?>
         <tr>
            <td colspan="6"><h5 style="font-weight: bold;">Tổng Cộng: <?php echo number_format($tong) ?></h5></td>
         </tr>
</table>
<br><br>
</div>
</body>
</html>