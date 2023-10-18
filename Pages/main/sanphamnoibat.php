<?php
$sql = "select product.id, product.name, catalog_name ,product.image_link  from product inner join catalog on product.parent_id = catalog.parent_id where status = 1 order by id  LIMIT 4";
$result = mysqli_query($cnn, $sql);
$row1 = $result->fetch_array();
$row2 = $result->fetch_array();
$row3 = $result->fetch_array();
$row4 = $result->fetch_array();
?>
<div class="container spnoibat">
   <h3>Sản Phẩm nổi bật</h3>
   <hr class="gachngang">
   <div class="row sp">
      <div class="col-sm-6 spnb-1">
         <a style="text-decoration: none;color:black;" href="index.php?x=chitiet&id=<?php echo $row1["id"] ?>">
            <div class="sanphamlon">
               <h4><?php echo $row1["catalog_name"] ?></h4>
               <h2><?php echo $row1["name"] ?></h2>
               <img src="img/<?php echo $row1["image_link"] ?>" alt="">
            </div>
         </a>
      </div>
      <div class="col-sm-6 spnb-2">
         <div class="row">
            <div class="col-sm-6 sp-cot-1">
               <a style="text-decoration: none;color:black;" href="index.php?x=chitiet&id=<?php echo $row2["id"] ?>">
                  <div class="sp cot-1">
                     <p><?php echo $row2["catalog_name"] ?></p>
                     <h4><?php echo $row2["name"] ?></h4>
                     <img src="img/<?php echo $row2["image_link"] ?>" alt="">
                  </div>
               </a>
            </div>
            <div class="col-sm-6 sp-cot-2">
               <a style="text-decoration: none;color:black;" href="index.php?x=chitiet&id=<?php echo $row3["id"] ?>">
                  <div class="sp cot-2">
                     <p><?php echo $row3["catalog_name"] ?></p>
                     <h4><?php echo $row3["name"] ?></h4>
                     <img src="img/<?php echo $row3["image_link"] ?>" alt="">
                  </div>
               </a>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6 sp-cot-3">
               <a style="text-decoration: none;color:black;" href="index.php?x=chitiet&id=<?php echo $row4["id"] ?>">
                  <div class="sp cot-3">
                     <p><?php echo $row4["catalog_name"] ?></p>
                     <h4><?php echo $row4["name"] ?></h4>
                     <img src='img/<?php echo $row4["image_link"] ?>' alt="">
                  </div>
               </a>
            </div>
            <div class="col-sm-6 sp-cot-4">
               
                  <div class="sp cot-4">
                     <img src="img/tatca-sp.png" alt="">
                  </div>
               
            </div>
         </div>
      </div>
   </div>
</div>