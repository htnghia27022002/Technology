<?php
include "config/connect.php";
session_start();

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
   <title>Đăng Nhập</title>
</head>
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

<body>
   <section class="vh-100">
      <div class="container-fluid h-custom">
      <h1>Login !</h1>
         <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
               <img src="img/login.jpg" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
               <form method="POST" action="" autocomplete="off">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                     <label class="form-label" for="form3Example3">Email address</label>
                     <input type="email" name="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid email address" />
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-3">
                     <label class="form-label" for="form3Example4">Password</label>
                     <input type="password" name="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" />
                  </div>

                  <div class="d-flex justify-content-between align-items-center">
                     <a href="register.php" class="text-body">register ?</a>
                  </div>
                  <label id="loi" class="form-check-label" for="form2Example3"></label>

                  <div class="text-center text-lg-start mt-4 pt-2">
                     <button type="submit" name="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>

</body>
<?php
   if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $re_sql = "SELECT * FROM admin_user Where email='@email' AND password='@password'";
      $search = ['@email','@password'];
      $replace = ["$email","$password"];
      $sql = str_replace($search,$replace,$re_sql);
      $result = mysqli_query($cnn, $sql); 
      if ($result->num_rows > 0) {
         $r = $result->fetch_assoc();
         $_SESSION['name'] = $r['name'];
         $_SESSION['id'] = $r['id'];
         $status = $r['status'];
         echo $status;
         if($status == 'user'){
            header("location:index.php");
         }
         else{
           header("location:admin/index.php");            
         }
      }else{
        echo '<script> document.getElementById("loi").innerHTML = "Email hoặc mật khẩu không đúng !";  
         </script>';
      }
   }
?>
</html>