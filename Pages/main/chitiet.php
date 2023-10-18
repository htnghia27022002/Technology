  <style>
     .box-carousel {
        width: 80%;
        
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
     }

     .img-thumb {
        width: 100px;
        height: 80px;
        border: 1px solid #ccc;
        float: left;
        margin: 0 5px;
     }   
     table{
        border-radius: 10px;
        margin: 50px 0;
     }
     tr th{
         font-size: 25px;padding-top:10px;color: black;text-align: center;
     }
     tr td{
        color: #444444;
        padding: 10px;
     }
     .tr_hover{
         background-color: #F2F2F2;
     }
  </style>
  <?php
   if (isset($_GET["id"])) {
      $sql = "SELECT * FROM product WHERE id = '" . $_GET["id"] . "'";
      $result = mysqli_query($cnn, $sql);
      $row = $result->fetch_assoc();  
         $img = explode(",", $row["image_list"]);
   } else {
      echo "Dữ Liệu Trống";
   }
   $sql_catalog = "SELECT * FROM catalog where parent_id ='". $row["parent_id"]."'";
   $result_catalog = mysqli_query($cnn,$sql_catalog);
   $r_catalog = $result_catalog->fetch_assoc();
   ?>
  <div style="min-height: 600px;">
     <div class="container">
        <div class="row">
           <div class="col-sm-6"><br>
              <div class="box-carousel">
                 <!-- Carousel -->
                 <div style="height: 100%;" id="demo" class="carousel slide" data-bs-ride="carousel">
                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                       <?php if($row["image_list"] == "") { ?>
                        <div class="carousel-item">
                             <img src="img/<?php echo $row["image_link"]; ?>" sclass="d-block w-100">
                          </div>
                        <?php } else {?>
                       <?php for ($i = 0; $i < count($img); $i++) { ?>
                          <div class="carousel-item">
                             <img src="img/<?php echo $img[$i]; ?>" sclass="d-block w-100">
                          </div>
                       <?php } }?>
                    </div>

                    <!-- Left and right controls/icons -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                       <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                       <span class="carousel-control-next-icon"></span>
                    </button>
                 </div>       
              </div>
              <br>
              <div>
              <?php if($row["image_list"] == "") { ?>
               <div class="img-thumb">
                       <img width="100%" height="100%" src="img/<?php echo $row["image_link"]; ?>">
                    </div>
                        <?php } else {?>
                 <?php for ($i = 0; $i < count($img); $i++) { ?>
                    <div class="img-thumb">
                       <img width="100%" height="100%" src="img/<?php echo $img[$i]; ?>">
                    </div>
                 <?php }} ?>
              </div>
              <?php if($row["content"] != ""){ ?>
               <h3 style="margin-top: 100px;font-weight: bold;">Thông Tin Sản Phẩm</h3>
               <p style="font-size: 25px;width:90%;"><?php echo $row["content"]; ?></p>
               <?php } ?>
           </div>
           <div class="col-sm-6">
                  <br>
                  <h3><?php echo $r_catalog["catalog_name"] ." ". $row["name"]; ?></h3>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i><br><br>
                  
                  <?php if($row["sale"]!=0){ ?>
                     <span style="text-decoration: line-through;"><?php echo number_format($row["price"])." vnđ";  ?></span>                    
                  <?php } ?>
                     <h4 style="color: brown;font-weight: bold;"><?php
                        $num = ($row["price"] * (100 - $row['sale']))/100;
                      echo number_format($num)." vnđ";  ?></h4>
                  <br>
                  <form action="Pages/main/addcart.php?id=<?php echo $row["id"]; ?>" method="POST">
                     <input name="buy" value="Mua Ngay" type="submit" style="width:150px;height:50px;" class="btn btn-dark"/>
                     <input value="Thêm Vào Giỏ" name="addcart" type="submit" style="border: 1px solid #000;width:200px;height:50px;" class="btn btn-basic"/>
                  </form>
                  <?php 
                     $sql_thongso = "SELECT * FROM thongso where id ='". $_GET["id"]."'";
                     $result_thongso = mysqli_query($cnn,$sql_thongso);
                     if($result_thongso->num_rows > 0){
                        $r_thongso = $result_thongso->fetch_assoc();
                  ?>
                 <table style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" width=500px cellpadding=10 cellspacing=0 >
                     <tr>
                        <th colspan="2">Thông Số Kỹ Thuật</th>
                     </tr>
                     <tr>
                        <td width=200px>Màn Hình</td>
                        <td><?php echo $r_thongso["man_hinh"]; ?></td>
                     </tr>
                     <tr>
                        <td width=200px>Công Nghệ Màn Hình</td>
                        <td><?php echo $r_thongso["cg_man_hinh"]; ?></td>
                     </tr>
                     <tr>
                        <td width=200px>Camera Trước</td>
                        <td><?php echo $r_thongso["camera_truoc"]; ?></td>
                     </tr>
                     <tr>
                        <td width=200px>Camera Sau</td>
                        <td><?php echo $r_thongso["camera_sau"]; ?></td>
                     </tr>
                     <tr>
                        <td width=200px>ChipSet</td>
                        <td><?php echo $r_thongso["chipset"]; ?></td>
                     </tr>
                     <tr>
                        <td width=200px>RAM</td>
                        <td><?php echo $r_thongso["ram"]; ?></td>
                     </tr>
                     <tr>
                        <td width=200px>ROM</td>
                        <td><?php echo $r_thongso["rom"]; ?></td>
                     </tr>
                     <tr>
                        <td width=200px>Pin</td>
                        <td><?php echo $r_thongso["pin"]; ?></td>
                     </tr>
                     <tr>
                        <td width=200px>Hệ Đều Hành</td>
                        <td><?php echo $r_thongso["he_dieu_hanh"]; ?></td>
                     </tr>
                     <tr>
                        <td width=200px>Cpu</td>
                        <td><?php echo $r_thongso["cpu"]; ?></td>
                     </tr>
                     <tr>
                        <td width=200px>Trọng Lượng</td>
                        <td><?php echo $r_thongso["trong_luong"]; ?></td>
                     </tr>
                  </table>
                  <?php } else{ ?>                    
                     <h5 class="text-center" style="margin: 50px 0;">Không có dữ liệu hiện thị !</h5>
                  <?php }?>
               </div>
        </div>
     </div>
     <div class="container">
        <?php 
            $sql_rand = "SELECT * FROM product";
            $result_rand = mysqli_query($cnn,$sql_rand);           
            $rand = mt_rand(1,mysqli_num_rows($result_rand)-4);          
            $sql_2 = "SELECT * FROM product LIMIT 4 offset $rand ";
            $result_2 = mysqli_query($cnn,$sql_2);
        ?>
        <h2 style="margin: 50px 0;" class="text-center">Các Sản Phẩm Khác</h2>
        <div style="padding: 20px 0;" class="row box-spmoi">
            <?php while ($row_2 = $result_2->fetch_assoc()) { ?>
               <div style="height: 450px;" class="col-sm-3">
                  <a style="color: black;" href="index.php?x=chitiet&id=<?php echo $row_2["id"]; ?>">
                     <div class="box-sp box-hover">
                        <img src="img/<?php echo $row_2["image_link"]; ?>" alt="">
                        <div class="text">
                           <p><?php echo $row_2["name"]; ?></p>
                           <h4 style="color: brown;"><?php echo number_format($row_2['price']) . " vnđ" ?></h4>
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i><br><br>
                        </div>

                     </div>
                  </a>
               </div>
            <?php }  ?>
     </div>
  </div>
  <script>
     const img_thum = document.querySelectorAll(".img-thumb");
     const img_item = document.querySelectorAll(".carousel-item");
     img_item[0].classList.add("active");
     for (let i = 0; i < img_thum.length; i++) {
        for (let j = img_thum.length - 1; j >= 0; j--) {
           img_thum[i].addEventListener("click", function() {
              if (j == i) {
                 img_item[i].classList.add("active");
              } else {
                 img_item[j].classList.remove("active");
              }
           })
        }
     }
     const tr = document.querySelectorAll("tr");
     for(let i = 1; i < tr.length; i += 2){
        tr[i].classList.add("tr_hover");
     }
  </script>