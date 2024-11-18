<?php

include 'config.php';

session_start();









?>










<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Liên lạc</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href="images/sheep.ico">

</head>
<body>
   
<header class="header">

   <div class="flex">
   <img src="images\grennfarm.png" alt="Lỗi" width="100px">
   <a href="home.php" class="logo" style = "font-family: 'Rubik', sans-serif;"><span>GRENN FARM</span></a>

      <nav class="navbar">
         <a href="index.php">Trang chủ</a>
         <a href="login.php">Sản phẩm</a>
         <a href="login.php">Đơn hàng</a>
         <a href="index_about.php">Về chúng tôi</a>
         <a href="login.php">Liên lạc</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <a href="index_search.php" class="fas fa-search"></a>
        
      </div>

      <div class="profile">
         <div class="flex-btn">
            <!-- <a href="login.php" class="option-btn">đăng nhập</a> -->
            <a href="register.php" class="option-btn">Đăng kí</a>
            <a href="login.php" class="option-btn">Đăng nhập</a>
         </div>
      </div>

   </div>

<section class="contact">

   <h1 class="title">Gửi liên lạc đến GRENN FARM </h1>

   <form action="" method="POST">
      <input type="text" name="name" class="box" required placeholder="Tên của bạn">
      <input type="email" name="email" class="box" required placeholder="Email của bạn">
      <input type="number" name="number" min="0" class="box" required placeholder="Số điện thoại của bạn">
      <textarea name="msg" class="box" required placeholder="Hãy nói thứ bạn muốn gửi đến chúng tôi! Rất mong nghe được những lời góp ý tích cực từ bạn!" cols="30" rows="10"></textarea>
      <input type="submit" value="Gửi đến GRENN FARM" class="btn" name="send">
   </form>

</section>








<?php include 'index_footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>