<?php
   $sql = "select * from product where status=2 order by id desc limit 3";
   $result = mysqli_query($cnn,$sql);
   $row1 = $result->fetch_array();
   $row2 = $result->fetch_array();
   $row3 = $result->fetch_array();
?>
<div class="container-fluid thongtinhapdan">
   <h3>Thông tin hấp dẫn</h3>
   <hr class="gachngang">
   <div class="row">
      <div class="col-sm-8 box-sphd">
         <div class="box-sphd box-1">
            <div class="sphd-1">
               <h4>Technology Store</h4>
               <p>Mang đến cho bạn những SẢN PHẨM và DỊCH VỤ tốt nhất !!</p> 
               
                  <button type="button" onclick="redirect();" class="btn btn-dark">Duyệt qua ngay nào !</button>               
                   
            </div>
         </div>
         <div class="row box-sphd">
            <div class="col-sm-6 box-sphd box-2">
            <a style="color: black;" href="index.php?x=chitiet&id=<?php echo $row3["id"]; ?>">
               <div class="sphd-2 box-hover">
                  <img src="img/<?php echo $row3["image_link"]; ?>" alt="">
                  <div class="text">
                     <p><?php echo $row3["name"]; ?></p>                     
                     <span ><?php echo number_format($row3["price"])." vnđ";  ?></span>                    
                     <h4 style="color: brown;"><?php
                        $num = ($row3["price"] * (100 - $row3['sale']))/100;
                      echo number_format($num)." vnđ";  ?></h4>   <br>                 
                  </div>
               </div>
            </a>
            </div>
            <div class="col-sm-6 box-sphd box-3">
            <a style="color: black;" href="index.php?x=chitiet&id=<?php echo $row2["id"]; ?>">
               <div class="sphd-3 box-hover">
                  <img src="img/<?php echo $row2["image_link"]; ?>" alt="">
                  <div class="text">
                     <p><?php echo $row2["name"]; ?></p>                                   
                     <span ><?php echo number_format($row2["price"])." vnđ";  ?></span>                    
                     <h4 style="color: brown;"><?php
                        $num = ($row2["price"] * (100 - $row2['sale']))/100;
                      echo number_format($num)." vnđ";  ?></h4>      <br>     
                  </div>
               </div>
            </a>
            </div>
         </div>
      </div>
      <div class="col-sm-4  box-sphd box-4">
         <a style="color: black;" href="index.php?x=chitiet&id=<?php echo $row1["id"]; ?>">
         <div class="sphd-4 box-hover">
            <img src="img/<?php echo $row1["image_link"]; ?>" alt="">
            <div class="text">
               <p><?php echo $row1["name"]; ?></p>               
               <span ><?php echo number_format($row1["price"])." vnđ";  ?></span>                    
                     <h4 style="color: brown;"><?php
                        $num = ($row1["price"] * (100 - $row1['sale']))/100;
                      echo number_format($num)." vnđ";  ?></h4> <br>                
            </div>
         </div></a>
      </div>
   </div>
</div>