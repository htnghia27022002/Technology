<?php
require "../config/connect.php";
session_start();
if($_SESSION['name']=="admin"){
$page = !empty($_GET["page"]) ? ($_GET["page"]) : 1;
$item = 10;
$off = ($page - 1) * $item;
$sql_all = "SELECT * FROM product ORDER BY id";
$result_all = mysqli_query($cnn,$sql_all);
$item_page =ceil($result_all->num_rows / $item);
if(isset($_GET['search']) && $_GET['search'] != ""){
   $sql = "SELECT * FROM product WHERE name LIKE '%". $_GET["search"] . "%'";
}else{
$sql = "SELECT * FROM product ORDER BY id LIMIT ".$item." OFFSET ".$off;}
$result = mysqli_query($cnn, $sql);
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
   <title>Admin</title>
   <style>
      
      ::placeholder{
      font-size: 12px;
      font-style: italic;
   }
      th{
         font-size: 20px;
         background-color: lightcyan;
      }
      .tr_{
         background-color: aliceblue;
      }
      .home{
         position: fixed;
         bottom: 5%;
         right: 5%;
         z-index: 1;
         border-radius: 50%;
         opacity: 80%;
         text-align: center;  
         background-color: blue;    
         width: 80px;
         height: 80px;
         z-index: 1;
         border-radius: 50%;
         box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
      }
      tr:nth-child(odd) {
         background-color: rgb(241 245 249);
   }
      .home i::before{
         margin-top: 30%;
         font-size: 30px;
         color: white;
      }
   </style>
</head>

<body>
   <a title="Go To Home" href="../index.php"><div class="home">
      <i  class="bi bi-house-door-fill"></i>
   </div></a>
   <div class="container">
      <div style="padding: 50px 0;">
      <form action="" class="form-group" method="GET" style="float: left;">
         <div style="float: left;display: inline-flex;margin: auto 0;" class="input-group"> 
               <input type="search" placeholder="Nhập tên sản phẩm cần tìm..." name="search" id="form1" class="form-control" />              
            <button type="submit" class="btn btn-primary">
               <i class="bi bi-search"></i>
            </button>
         </div>
   </form>
         <a href="order.php" style="margin-left: 50px;"><button class="btn btn-dark">Đơn hàng</button></a>
         <a style="float: right;" href="add.php"><button class="btn btn-success">Thêm sản phẩm</button></a>
      </div>
      <?php if($result->num_rows > 0) {
      if(isset($_GET['search']) && $_GET['search'] != ""){?>
         <div class="alert alert-primary"  role="alert">
            Kết quả cho "<strong><?php echo $_GET['search'] ?></strong>" có <strong><?php echo $result->num_rows; ?></strong> sản phẩm.
         </div>
      <?php } ?>
      <table width="100%" cellpadding="10">
         <tr>
            <th width="10%">ID</th>
            <th width="25%">Name</th>
            <th width="25%">Images</th>
            <th width="20%">Price</th>
            <th width="20%">Status</th>
         </tr>
         <?php if(!isset($_GET['search']) || $_GET['search'] ==""){ ?>
         <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
               <td><?php echo $row['id']; ?></td>
               <td><?php echo $row['name']; ?></td>
               <td><img width="100px" height="100px" src="../img/<?php echo $row['image_link']; ?>" alt=""></td>
               <td><?php echo number_format($row['price']) . " vnđ" ?></td>
               <td>
                  <a href="edit.php?id=<?php echo $row['id'];?>"><button class="btn btn-warning">Sửa</button></a>
                  <button onclick="confirm_delete(<?php echo $row['id'];?>)" class="btn btn-danger">Xóa</button>
               </td>
            </tr>
         <?php endwhile; }else{
            while ($row = mysqli_fetch_assoc($result)){   
         ?>
            <tr>
               <td><?php echo $row['id']; ?></td>
               <td><?php echo $row['name']; ?></td>
               <td><img width="100px" height="100px" src="../img/<?php echo $row['image_link']; ?>" alt=""></td>
               <td><?php echo number_format($row['price']) . " vnđ" ?></td>
               <td>
                  <a href="edit.php?id=<?php echo $row['id'];?>"><button class="btn btn-warning">Sửa</button></a>
               <button onclick="confirm_delete(<?php echo $row['id'];?>)" class="btn btn-danger">Xóa</button>
               </td>
            </tr>
         <?php }}?>
         
      </table>
      <?php }else{?>
         <br><br><br><h1 class="text-center">Không tìm thấy sản phẩm !</h1>
         <?php }?>
      <div style="margin-bottom: 50px;" class="page">
      <ul class="pagination justify-content-center" style="margin:20px 0">
         <?php if(!isset($_GET['search']) || $_GET['search'] ==""){
            for($i = 1; $i < $item_page +1;$i++){ ?>
               <?php if($i != $page){ ?>
               <li class="page-item"><a  class="page-link" href="index.php?page=<?php echo $i;?>"><?php echo $i; ?></a></li>
               <?php } else{?>
                  <li class="page-item active"><a  class="page-link" href="index.php?page=<?php echo $i;?>"><?php echo $i; ?></a></li>
               <?php };?>
            <?php } } }else{
               header("location:../login.php");
            }
         ?>
      </ul> 
      </div>
   </div>
   <script>
      function confirm_delete(id){
         if(confirm("Bạn muốn xóa thật chứ")==true){
            window.open("handle.php?a=delete&id="+id,"_self");
         }
      }
   </script>
</body>
</html>