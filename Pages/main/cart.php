<style>
   .input-group{
   margin-top: 20px;
   display: block;
}
.input-group a > button{
   width: 25px;
   height: 25px;
   border: 1px solid #ccc;
   border-radius: 3px;
}
.sl{
   width: 60px ;
   height: 25px;
   padding-top: 5px;
   text-align: center;
   border: none;
   border-top: 1px solid #ccc;
   border-bottom: 1px solid #ccc;
}
table{
   margin-bottom: 50px;
}
table tr th{
   font-size: 18px;
   height: 50px;
}
.tr_{
   background-color: rgb(245,245,245);
}
.thanhtoan{
   color: white;
   text-decoration: none;
}
</style>

<div class="container">
   <br><br>
   <?php
   if (isset($_SESSION['cart'])) { ?>
      <a style="float: right;" href="Pages/main/addcart.php?xoatatca=1"><button class="btn btn-danger">Xoá Tất Cả</button></a><br><br>
      <table class="text-center" width="100%"  cellspacing="0" cellpadding="5">
         <tr>
            <th>id</th>
            <th>Mã Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Hình Ảnh</th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th>Thành Tiền</th>
            <th></th>
         </tr>
         <?php
         $stt = 0;
         $thanhtien = 0;
         $tong = 0;
         foreach ($_SESSION['cart'] as $item) {
            $dongia = ($item["price"] * (100 - $item['sale']))/100;
            $stt++;
            $thanhtien = $dongia * $item['amount'];
            $tong += $thanhtien;
         ?>
            <tr>
               <td><?php echo $stt; ?></td>
               <td><?php echo $item['id']; ?></td>
               <td><?php echo $item['name']; ?></td>
               <td><img width="80px" src="img\<?php echo $item['image']; ?>" alt=""></td>
               <td>
                  <div class="input-group mb-3 input-group-sm">
                  <a href="Pages/main/addcart.php?tru=<?php echo $item['id']; ?>"><button>-</button></a>
                     <input type="text" class="sl" value="<?php echo $item['amount']; ?>" readonly />
                     <a href="Pages/main/addcart.php?cong=<?php echo $item['id']; ?>"><button>+</button></a>
                  </div>
               </td>        
               <td><?php echo number_format($dongia) . " Vnđ"; ?></td>
               <td><?php echo number_format($thanhtien) . " Vnđ";  ?></td>
               <td><a href="Pages/main/addcart.php?xoa=<?php echo $item['id']; ?>"><button class="btn btn-primary">Xoá</button></a></td>
            </tr>
         <?php } ?>
         <tr style="background-color: aliceblue !important;height:80px;">
            <td style="text-align: left;font-weight: bold; font-size:20px;" colspan="8">Tổng cộng: <?php echo number_format($tong) . " Vnđ";  ?></td>
         </tr>
      </table>
      <div>
         <button class="btn btn-info"><a class="thanhtoan" href="Pages/main/thanhtoan.php">Thanh toán</a></button>
      </div>
      
   <?php } else { ?>
      <h2 style="margin-top: 100px;" class="text-center">Giỏ Hàng Trống</h2>
   <?php } ?>
<script>
   const tr = document.querySelectorAll("tr");
   for(let i = 0; i < tr.length; i+= 2){
      tr[i].classList.add("tr_");
   }
</script>
</div>
<br><br>