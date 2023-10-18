<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <title>Đăng kí</title>
   <style>
   @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Overpass:wght@100&display=swap');
   .divider:after,
   .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
   }

   .h-custom {
      height: calc(100% - 73px);
   }

   @media (max-width: 450px) {
      .h-custom {
         height: 100%;
      }
   }

   #loi {
      color: red;
      margin-top: 10px;
   }
   h1{
      display: inline;
      position: absolute;
      color: darkblue;
      font-family: 'Moon Dance', sans-serif;
      font-size: 100px;
      font-weight: bold;
      left: 15%;
   }
   </style>
</head>
<body>
<section class="vh-100">
      <div class="container-fluid h-custom">
         <h1>Register !</h1>
         <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
               <img src="img/login.jpg" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            
               <form method="POST" action="" autocomplete="off">
                  <!-- Email input -->
                  <div class="form-outline mb-4">  
                  <label class="form-label" for="form3Example4">Name</label>           
                     <input type="" name="name" id="form3Example3" class="form-control form-control-lg" value="<?php echo $_POST['name']; ?>" placeholder="Enter name" />
                  </div>
                  <!-- Password input -->
                  <div class="form-outline mb-3"> 
                  <label class="form-label" for="form3Example4">Email</label>    
                     <input type="email" name="email" id="form3Example4" class="form-control form-control-lg" value="<?php echo $_POST['email']; ?>" placeholder="Enter email" />
                  </div> 
                  <div class="form-outline mb-3">   
                  <label class="form-label" for="form3Example4">Phone</label>  
                     <input type="" name="phone" id="form3Example4" class="form-control form-control-lg" value="<?php echo $_POST['phone']; ?>" placeholder="Enter phone" />
                  </div>             
                  <div class="form-outline mb-3">    
                  <label class="form-label" for="form3Example4">address</label> 
                     <input type="" name="address" id="form3Example4" class="form-control form-control-lg" value="<?php echo $_POST['address']; ?>" placeholder="Enter address" />
                  </div>
                  <div class="form-outline mb-3">   
                  <label class="form-label" for="form3Example4">Password</label>  
                     <input type="password" name="password" id="form3Example4" class="form-control form-control-lg" value="<?php echo $_POST['password']; ?>" placeholder="Enter password" />
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                     <a href="login.php" class="text-body">login ?</a>
                  </div>
                  <label id="loi" class="form-check-label" for="form2Example3"></label>
                  <div class="text-center text-lg-start mt-4 pt-2">
                     <button type="submit" name="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Ok</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>
</body>
<?php
   include "config/connect.php";
   if(isset($_POST['submit'])){
      if($_POST['name']==""){

         echo '<script> document.getElementById("loi").innerHTML = "Name không được bỏ trống !";  
         </script>';
      }
      else if($_POST['email']==""){
         echo '<script> document.getElementById("loi").innerHTML = "Email không được bỏ trống !";  
         </script>';
      }
      else if($_POST['phone']==""){
         echo '<script> document.getElementById("loi").innerHTML = "Phone không được bỏ trống !";  
         </script>';
      }
      else if($_POST['address']==""){
         echo '<script> document.getElementById("loi").innerHTML = "Address không được bỏ trống !";  
         </script>';
      }
      else if($_POST['password']==""){
         echo '<script> document.getElementById("loi").innerHTML = "password không được bỏ trống !";  
         </script>';
      }
      else{
         $sql_email = "select * from admin_user where email like '".$_POST['email']."'";
         $result_email = mysqli_query($cnn,$sql_email);
         if($result_email->num_rows > 0){
            echo '<script> document.getElementById("loi").innerHTML = "Email đã tồn tại !";  
            </script>';
            return;
         }
         $name = $_POST['name'];
         $email = $_POST['email'];
         $phone = $_POST['phone'];
         $address=$_POST['address'];
         $password=$_POST['password'];
         $status = "user";
         $insert = "INSERT INTO admin_user(name,email,phone,address,password,status) values('@name','@email','@phone','@address','@password','@status')";
         $search = ['@name','@email','@phone','@address','@password','@status'];
         $replace = ["$name","$email","$phone","$address","$password","$status"];
         $sql_in = str_replace($search,$replace,$insert);
         if($cnn->query($sql_in)){
         echo "<script> alert('Đăng kí thành công !!');
            window.location='login.php';
            </script>";}
      }
   }

?>
</html>