<style>
   ::placeholder{
      font-size: 12px;
      font-style: italic;
   }
</style>
<?php include "config/connect.php";
   session_start();
?>
<?php
$sql = "select * from catalog";
$result_parent = mysqli_query($cnn, $sql);

?>
<div class="container-fluid header">
   <div style="width: 200px; height: 100px; display: inline;float: left;margin: 5px 50px;">
      <a href="index.php"><img src="img/logo.png" alt=""></a>
   </div>
   
   <div class="icon">
   <form action="index.php?x=search&" class="form-group" method="GET" style="float: left;">
         <div style="float: left;display: inline-flex;margin: auto 0;" class="input-group"> 
               <input type="hidden" name="x" value="search">  
               <input type="search" placeholder="Nhập tên sản phẩm cần tìm..." name="search" id="form1" class="form-control" />              
            <button type="submit" class="btn btn-primary">
               <i class="bi bi-search"></i>
            </button>
         </div>
   </form>
      &nbsp;&nbsp;&nbsp;
      <a title="cart" style="color: black;" href="index.php?x=cart"><svg fill="currentColor" class="cart" viewBox="0 0 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
         </svg></a>
      <sup style="font-size: 18px;">( <strong>
            <?php
            if (isset($_SESSION['cart'])) {
               echo count($_SESSION['cart']);
            } else {
               echo "0";
            }
            ?>
         </strong> )</sup>
      &nbsp;&nbsp;&nbsp;
      <?php if(!isset($_SESSION['id'])){ ?>
      <a title="Login" style="margin: 0;padding:0;color:black;" href="login.php"><svg fill="currentColor" class="user" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
         </svg></a>
         <?php }else{?>
            <a title="<?php echo $_SESSION['name']; ?>" href="" >
            <svg fill="blue" class="bi bi-person-check-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg></a>
            <?php }?>
         &nbsp;&nbsp;&nbsp;
      <a title="LogOut" style="color: black;" href="logout.php">
         <svg fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
         </svg>
      </a>
   </div>
   
   <ul class="menu">
      <li class="menu-item"><a href="#" class="item-link">Sản Phẩm <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
               <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z" />
            </svg></a>
         <div class="menu-child">
            <?php while ($row_parent = mysqli_fetch_assoc($result_parent)) : ?>
               <div class="menu-child-item" style="vertical-align: top;">
                  <a style="color: blue; text-decoration: none;" href="index.php?x=sanpham&parent_id=<?php echo $row_parent['parent_id'] ?>&catalog_id=all">
                     <h4 style="font-size: 20px;"><?php echo $row_parent["catalog_name"]; ?></h4>
                  </a>
                  <ul>
                     <?php
                     $sql_child = "select * from category Where parent_id ='" . $row_parent["parent_id"] . "'";
                     $result_child = mysqli_query($cnn, $sql_child);
                     while ($row_child = mysqli_fetch_assoc($result_child)) {
                     ?>
                        <li><a href="index.php?x=sanpham&parent_id=<?php echo $row_parent['parent_id']; ?>&catalog_id=<?php echo $row_child['catalog_id']; ?>"><?php echo $row_child["category_name"]; ?></a></li>
                     <?php } ?>
                  </ul>
               </div>
            <?php endwhile; ?>
      </li>
      <li class="menu-item"><a href="#" class="item-link">Khám Phá</a></li>
      <li class="menu-item"><a href="#" class="item-link">Ưu Đãi</a></li>
      <li class="menu-item"><a href="#" class="item-link">Hỗ Trợ</a></li>
      <li class="menu-item"><a href="#" class="item-link">Liên Hệ</a></li>
   </ul>
  
</div>
<hr style="margin: 0; padding: 0; height: 1px; color: #ccc;">