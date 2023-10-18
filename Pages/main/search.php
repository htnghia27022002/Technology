<div class="container">
   <?php
   if (isset($_GET['search']) && $_GET['search'] != "") {
      $sql_search = "SELECT * FROM product WHERE name LIKE '%". $_GET["search"] . "%'";
      $result_search = mysqli_query($cnn, $sql_search)
   ?>
      <?php if ($result_search->num_rows > 0) { ?> <br>
         <div class="alert alert-primary" role="alert">
            Kết quả cho "<strong><?php echo $_GET['search'] ?></strong>" có <strong><?php echo $result_search->num_rows; ?></strong> sản phẩm.
         </div>
         <div style="padding: 20px 0;" class="row box-spmoi">
            <?php while ($row = $result_search->fetch_assoc()) { ?>
               <div style="height: 450px;" class="col-sm-3">
                  <a style="color: black;" href="index.php?x=chitiet&id=<?php echo $row["id"]; ?>">
                     <div class="box-sp box-hover">
                        <img src="img/<?php echo $row["image_link"]; ?>" alt="">
                        <div class="text">
                           <p><?php echo $row["name"]; ?></p>
                           <h4 style="color: brown;"><?php echo number_format($row['price']) . " vnđ" ?></h4>
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i><br><br>
                        </div>
                     </div>
                  </a>
               </div>
            <?php }; ?>
         </div>
      <?php } else { ?>
         <br><br><br><h1 class="text-center">Không tìm thấy sản phẩm !</h1>
   <?php }
   }else{
      echo "<br><br><br><h1 class='text-center'>Vui lòng nhập sản phẩm cần tìm !</h1>";
   }
   ?>
</div>