

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Về chúng tôi</title>

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
         <a href="index_contact.php">Liên lạc</a>
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


<section class="about">

   <div class="row">

      <div class="box">
         <img src="images/about-img-1.png" alt="">
         <h3>Vì sao chọn GRENN FARM?</h3> 
         <p>Giúp GRENN FARM trả lời câu hỏi này.</p><p> Làm sao để lựa chọn được thực phẩm sạch, vừa an toàn về chất lượng, vừa tiết kiệm thời gian để đảm bảo tốt cho sức khỏe của gia đình mình?</p>
         <a href="index_contact.php" class="btn">Liên hệ GRENN FARM</a>
      </div>

      <div class="box">
         <img src="images/about-img-2.png" alt="">
         <h3>GRENN FARM cung cấp những gì?</h3>
         <p>GRENN FARM mang đến sự tiện lợi, sức khỏe,niềm vui và sự hài lòng</p>
         <p>GRENN FARM cung cấp các loại trái cây, rau, củ, quả, nấm từ tất cả các miền với nguồn trái cây được chọn lựa kỹ càng ngay tại vườn trái cây theo tiêu chuẩn VietGap.</p>
         <a href="login.php" class="btn">Sản phẩm của GRENN FARM</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">Thành viên sáng lập Fruits Shop</h1>

   <div class="box-container">

   <div class="box">
         <img src="images/maianhbac.jpg" alt="">
         <p>Chức vụ: Quản lý</p>
         <p>Quê quán: Hải Dương</p>

         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Mai Anh Bắc</h3>
      </div>

      <div class="box">
         <img src="images/mono.png" alt="">
         <p>Chức vụ: Chủ tịch</p>
         <p>Quê quán: Nam định</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Trần Quốc Huy</h3>
      </div>

    

   </div>

</section>


<?php include 'index_footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>

<?php include 'backtotop.php' ?>