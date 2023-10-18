<!DOCTYPE html>
<html lang="en">
<?php
   session_start();
?>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="style/style.css">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <title>Home</title>
   <style>
      .admin{
         
         position: fixed;
         bottom: 5%;
         right: 5%;
         z-index: 1;
         opacity: 80%;
         border-radius: 50%;
         box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
      }
   </style>
</head>

<body style="position: relative;">
   <?php
      session_start();
      if(isset($_SESSION['name'])&&$_SESSION['name']=="admin"){?>
        <div class="admin">
           <a title="Go To Admin" href="admin/index.php"><img src="img/admin.jpg" style="border-radius: 50%;" width="80px" height="80px" =""></a>
        </div>
      <?php }
   ?>
   <div class="main-warp">
      <?php
      include("pages/header.php");
      include("pages/main.php");
      include("pages/footer.php");
      ?>
      <script src="dist/main.js"></script>
   </div>

</body>

</html>