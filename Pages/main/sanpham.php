<style>
   .page:hover {
      color: blue;
      border: 1px solid blue;
   }

   .page {
      width: 300px;
      height: 40px;
      border: 1px solid black;
      border-radius: 10px;
      text-align: center;
      padding: 8px 0;
      margin: 0 auto;
   }
</style>
<?php
$page = !empty($_GET["page"]) ? ($_GET["page"]) : 1;
$item_page = 8 * $page;
$sql_1 = "SELECT product.id,product.name,product.price,product.image_link,catalog_name from product inner join catalog on product.parent_id = catalog.parent_id where product.parent_id = '" . $_GET["parent_id"] . "' LIMIT $item_page";
$sql_2 = "SELECT * from product where product.parent_id = '" . $_GET["parent_id"] . "' AND product.catalog_id='" . $_GET["catalog_id"] . "' LIMIT $item_page";
$result_1 = mysqli_query($cnn, $sql_1);
$result_2 = mysqli_query($cnn, $sql_2);
$row_1 = $result_1->fetch_assoc();
$row_2 = $result_2->fetch_assoc();
$records = mysqli_query($cnn, "Select * from product where parent_id ='" . $_GET["parent_id"] . "'");
$records_2 = mysqli_query($cnn, "Select * from product where parent_id ='" . $_GET["parent_id"] . "' AND catalog_id = '" . $_GET["catalog_id"] . "'");
$re_category = mysqli_query($cnn, "Select * from category where parent_id ='" . $_GET["parent_id"] . "' AND catalog_id = '" . $_GET["catalog_id"] . "'");
$row_category = $re_category->fetch_assoc();
?>
<div style="min-height: 600px;margin-bottom: 200px;">
<br><br>
   <div class="container">
      <h4><strong ><?php echo $row_1["catalog_name"]; ?> <?php if ($result_2->num_rows > 0) { ?> </strong > \ <?php echo $row_category["category_name"]; ?> <?php } ?></h4>
      <hr style="height: 2px;">
      <?php if ($_GET["catalog_id"] == "all") { ?>

         <!-- Trang Cấp 1-->
         <?php if($result_1->num_rows > 0){ ?>        
            <div style="padding: 20px 0;" class="row box-spmoi">
               <?php do { ?>
                  <div style="height: 450px;" class="col-sm-3">
                     <a style="color: black;" href="index.php?x=chitiet&id=<?php echo $row_1["id"]; ?>">
                        <div class="box-sp box-hover">
                           <img src="img/<?php echo $row_1["image_link"]; ?>" alt="">
                           <div class="text">
                              <p><?php echo $row_1["name"]; ?></p>
                              <?php if($row_1["sale"]!=0){ ?>
                     <span style="text-decoration: line-through;"><?php echo number_format($row_1["price"])." vnđ";  ?></span>                    
                  <?php } ?>
                     <h4 style="color: brown;font-weight: bold;"><?php
                        $num = ($row_1["price"] * (100 - $row_1['sale']))/100;
                      echo number_format($num)." vnđ";  ?></h4>
                              <i class="bi bi-star-fill text-warning"></i>
                              <i class="bi bi-star-fill text-warning"></i>
                              <i class="bi bi-star-fill text-warning"></i>
                              <i class="bi bi-star-fill text-warning"></i>
                              <i class="bi bi-star-fill text-warning"></i><br><br>
                           </div>

                        </div>
                     </a>
                  </div>
               <?php } while ($row_1 = $result_1->fetch_assoc()); ?>
            </div>
            <div style="width: 100%;">
               <!-- Phân Trang -->
               <?php
               if ($item_page < $records->num_rows) {
                  $page += 1;
               ?>
                  <a class="page_link" style="text-decoration: none; color:black" href="?x=sanpham&parent_id=<?php echo $_GET['parent_id'] ?>&catalog_id=<?php echo $_GET['catalog_id'] ?>&page=<?php echo $page ?>">
                     <div style="font-weight: 500;" class="page">
                        Xem Thêm <strong><?php echo $records->num_rows - $item_page  ?> sản phẩm </strong><i class="bi bi-caret-down-fill"></i>
                     </div>
                  </a>
               <?php } ?>
            </div>   
         <?php } else{ ?> 
               <h1>Không có sản phẩm nào !</h1>
            <?php }; ?>    
         <!-- Trang Cấp 2-->

      <?php } else { ?>
         <?php if($result_2->num_rows > 0){ ?>
         <div style="padding: 20px 0;" class="row box-spmoi">
            <?php do { ?>
               <div style="height: 450px;" class="col-sm-3">
                  <a style="color: black;" href="index.php?x=chitiet&id=<?php echo $row_2["id"]; ?>">
                     <div class="box-sp box-hover">
                        <img src="img/<?php echo $row_2["image_link"]; ?>" alt="">
                        <div class="text">
                           <p><?php echo $row_2["name"]; ?></p>
                           <?php if($row_2["sale"]!=0){ ?>
                     <span style="text-decoration: line-through;"><?php echo number_format($row_2["price"])." vnđ";  ?></span>                    
                  <?php } ?>
                     <h4 style="color: brown;font-weight: bold;"><?php
                        $num = ($row_2["price"] * (100 - $row_2['sale']))/100;
                      echo number_format($num)." vnđ";  ?></h4>
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i><br><br>
                        </div>

                     </div>
                  </a>
               </div>

            <?php } while ($row_2 = $result_2->fetch_assoc()); ?>
         </div>
         <div style="width: 100%;">
            <!-- Phân Trang -->
            <?php
            if ($item_page < $records_2->num_rows) {
               $page += 1;
            ?>
               <a class="page_link" style="text-decoration: none; color:black" href="?x=sanpham&parent_id=<?php echo $_GET['parent_id'] ?>&catalog_id=<?php echo $_GET['catalog_id'] ?>&page=<?php echo $page ?>">
                  <div class="page">
                     Xem Thêm <strong><?php echo $records_2->num_rows - $item_page  ?> sản phẩm </strong><i class="bi bi-caret-down-fill"></i>
                  </div>
               </a>
            <?php } ?>
         </div>
         <?php } else {?>
            <h1 style="text-align: center;margin-top: 100px;">Không có sản phẩm nào !</h1>
         <?php };?>
      <?php } ?>
   </div>
</div>