<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<header class="header">

   <div class="flex">
      <img src="images\grennfarm.png" alt="Lỗi" width="100px">
      <a href="home.php" class="logo" style = "font-family: 'Rubik', sans-serif;"><span>GRENN FARM</span></a>

      <nav class="navbar">
         <a href="home.php">Trang chủ</a>
         <a href="shop.php">Sản phẩm</a>
         <a href="orders.php">Đơn hàng</a>
         <a href="about.php">Về chúng tôi</a>
         <a href="contact.php">Liên lạc</a>
      </nav>


      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <a href="search_page.php" class="fas fa-search"></a>
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            // $count_wishlist_items->execute([$user_id]);
         ?>
         <!-- <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?= $count_wishlist_items->rowCount(); ?>)</span></a> -->
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $count_cart_items->rowCount(); ?>)</span></a>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
         <p><?= $fetch_profile['name']; ?></p>
         <a href="user_profile_update.php" class="btn">Cập nhật hồ sơ</a>
         <a href="index.php" class="delete-btn">Đăng xuất</a>
         <div class="flex-btn">
            <!-- <a href="login.php" class="option-btn">đăng nhập</a> -->
            <a href="register.php" class="option-btn">Đăng kí</a>
         </div>
      </div>

   </div>

</header>