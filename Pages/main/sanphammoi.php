<?php
   $sql = "SELECT * from product where status = 3 order by id LIMIT 7";
   $result = mysqli_query($cnn,$sql);

?>
<div class="container spmoi">
            <h3>Sản phẩm mới nhất</h3>
            <hr class="gachngang">
            <div class="row box-spmoi">
               <?php while($row = $result->fetch_assoc()): ?>
               <div class="col-sm-3">
                  <a style="color: black;" href="index.php?x=chitiet&id=<?php echo $row["id"]; ?>">
                  <div class="box-sp box-hover">
                     <img src="img/<?php echo $row["image_link"]; ?>" alt="">
                     <div class="text">
                        <p><?php echo $row["name"]; ?></p>          
                        <h4 style="color: brown;"><?php echo number_format($row['price'])." vnđ" ?></h4>                        
                        </br>
                     </div>
                  </div>
                  </a>
               </div>
               <?php endwhile; ?>               
               <div class="col-sm-3">
                  <div class="box-sp box-sp-all box-hover">
                     <img src="img/tatca-sp.png" alt="">
                  </div>
               </div>
            </div>
         </div> 