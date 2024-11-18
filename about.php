<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

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
   
<?php include 'header.php'; ?>

<section class="about">

   <div class="row">

      <div class="box">
         <img src="images/about-img-1.png" alt="">
         <h3>Vì sao chọn Grenn Farm?</h3> 
         <p>Giúp Grenn Farm trả lời câu hỏi này.</p><p> Làm sao để lựa chọn được thực phẩm sạch, vừa an toàn về chất lượng, vừa tiết kiệm thời gian để đảm bảo tốt cho sức khỏe của gia đình mình?</p>
         <a href="contact.php" class="btn">Liên hệ Grenn Farm</a>
      </div>

      <div class="box">
         <img src="images/about-img-2.png" alt="">
         <h3>Grenn Farm cung cấp những gì?</h3>
         <p>Grenn Farm mang đến sự tiện lợi, sức khỏe,niềm vui và sự hài lòng</p>
         <p> Grenn Farm cung cấp các loại trái cây, rau, củ, quả, nấm từ tất cả các miền với nguồn trái cây được chọn lựa kỹ càng ngay tại vườn trái cây theo tiêu chuẩn VietGap.</p>
         <a href="shop.php" class="btn">Sản phẩm của Grenn Farm</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">Thành viên sáng lập Grenn Farm</h1>

   <div class="box-container">

   <div class="box">
         <img src="images/maianhbac.jpg" alt="">
         <p>Chức vụ: Quản Lý</p>
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
         <p>Quê quán: Nam Định</p>
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









<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>

<?php include 'backtotop.php' ?>