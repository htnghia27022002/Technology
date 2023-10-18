<?php
   require "../config/connect.php";
   $sql_oder = "SELECT * FROM cart";
   $result_cart = mysqli_query($cnn,$sql_oder);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quản lí đơn hàng</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
   th{
         font-size: 20px;
         background-color: lightcyan;
      }
      .icon{
         font-size: 35px;
         display: inline;
         padding: 0 20px;
      }
      .icon:hover{
         color: blue;
      }
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
</style>
<body>
<div style="margin-top: 50px;" class="container">
<a style="color: black;" href="index.php" title="Exit"><i class="icon bi bi-arrow-bar-left"></i></a>
   <h1 style="margin-top: 50px; color: brown;display: inline;">Quản lí đơn hàng</h1>
<br><br>
<?php if($result_cart->num_rows>0){ ?>
   <table cellspacing="0" width="100%" cellpadding="10">
         <tr>
            <th>ID</th>
            <th>Mã đơn hàng</th>
            <th>Tên Khách Hàng</th>
            <th>Địa Chỉ</th>
            <th>Tài Khoản</th>
            <th>Điện Thoại</th>
            <th>Quản Lí</th>
         </tr>
         <?php
            while($row_cart = $result_cart->fetch_assoc()){
               $sql_kh = "SELECT * FROM admin_user where id=".$row_cart['id_khachhang'];
               $re_kh = mysqli_query($cnn,$sql_kh);
               $row_kh = $re_kh->fetch_assoc();?>
               <tr>
                  <td><?php echo $row_cart['id_cart']; ?></td>
                  <td><?php echo $row_cart['code_cart']; ?></td>
                  <td><?php echo $row_kh['name']?></td>
                  <td><?php echo $row_kh['address']?></td>
                  <td><?php echo $row_kh['email']?></td>
                  <td><?php echo $row_kh['phone']?></td>
                  <td><a href="order_detail.php?code=<?php echo $row_cart['code_cart'];?>" class="btn btn-success">Xem đơn hàng</a> <button onclick="confirm_delete(<?php echo $row_cart['id_cart']; ?>,<?php echo $row_cart['code_cart']; ?>)" class="btn btn-danger">xóa</button></td>
               </tr>
            
         <?php }?>
</table>
<?php }else{
   echo "<br><br><br><h1 class='text-center'>Không có đơn hàng!</h1>";
} ?>
</div>
<br><br>
<script>
      function confirm_delete(id,cart_id){
         if(confirm("Bạn muốn xóa thật chứ")==true){
            window.open("order_delete.php?id="+id+"&code_cart="+cart_id,"_self");
         }
      }
   </script>
</body>
</html>