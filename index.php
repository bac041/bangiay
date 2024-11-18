<?php

include 'config.php';





?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Trang chủ</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href="images\fruits-shop.png">

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


<div class="home-bg">

   <section class="home">

      <div class="content">
         <span>Đừng lo, đây là sản phẩm hữu cơ</span>
         <h3>Fruits Shop   Vì sức khỏe người Việt</h3>
         <p>Chúng tôi, các bạn và người thân, ít nhiều cũng đã từng là NẠN NHÂN của thực phẩm bẩn. Hơn ai hết chúng tôi hiểu tầm quan trọng của các nguyên liệu chế biến thức ăn SẠCH?</p>
         <a href="index_about.php" class="btn">Về chúng tôi!</a>
      </div>

   </section>

</div>

<section class="home-category">

   
<h1 class="title">Danh mục</h1>

<div class="box-container">

   <div class="box">
      <img src="images\Thit.png" alt="">
      <h3>Thịt</h3>
      <p>Các loại thịt tươi tại Grenn Farm được nhập khẩu từ nhiều nước trên thế giới, với đa dạng các loại thịt theo loại, với giá cả phải chăng.</p>
      <a href="category.php?category=thit" class="btn">Thịt</a>
   </div>

   <div class="box">
      <img src="images\ca.jpg" alt="">
      <h3>Cá</h3>
      <p>Cửa hàng cá của Grenn Farm cung cấp các loại cá tươi, được nhập khẩu từ nhiều nước trên thế giới. Chúng tôi cung cấp đa dạng các loại cá theo mùa, đảm bảo chất lượng và tươi ngon.</p>
      <a href="category.php?category=ca" class="btn">Cá</a>
   </div>

   <div class="box">
      <img src="images/cat-3.png" alt="">
      <h3>Rau củ quả</h3>
      <p>Rau củ ở Grenn Farm đảm bảo không thuốc bảo vệ thực vật, không dùng phân bón hóa học, không thuốc diệt cỏ và các sản phẩm biến đổi gen.</p>
      <a href="category.php?category=rau" class="btn">Rau củ</a>
   </div>

   <div class="box">
      <img src="images/thucuong.png" alt="">
      <h3>Đồ uống</h3>
      <p>Đồ uống tại Grenn Farm có các sản phẩm được sản xuất theo chuẩn VSATTP với các loại sữa,nước ép được chiết suất từ các loại trái cây tự nhiên.</p>
      <a href="category.php?category=douong" class="btn">Đồ uống hữu cơ</a>
   </div>

</div>

</section>

<section class="products">

<h1 class="title">Sản phẩm mới nhất</h1>

<div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" class="box" method="POST">
      <div class="price"><span><?= $fetch_products['price']; ?></span> VNĐ</div>
      <!-- <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a> -->
      <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
      <input type="number" min="1" value="1" name="p_qty" class="qty">
      <a href="login.php"> <input type="submit" value="Thêm giỏ hàng" class="btn" name="add_to_cart"></a>
      <!-- <input type="submit" value="Thêm giỏ hàng" class="btn" name="add_to_cart"> -->
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">Không có sản phẩm nào!</p>';
   }
   ?>

   </div>

</section>







<?php include 'index_footer.php';?>

<script src="js/script.js"></script>

</body>
</html>

<?php include 'backtotop.php' ?>