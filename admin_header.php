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

      <a href="admin_page.php" class="logo" style="font-family: 'Rubik', sans-serif;">Quản lí<span> Grenn Farm</span></a>

      <nav class="navbar">
         <a href="admin_page.php">Thống kê</a>
         <a href="admin_products.php">Sản phẩm</a>
         <a href="admin_orders.php">Đơn hàng</a>
         <a href="admin_users.php">Tài khoản</a>
         <a href="admin_contacts.php">Tin nhắn</a>
      </nav>
      <div class="icons">
         <!-- Lấy tên  -->
      <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
<!-- ------------------- -->
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <i>Xin chào <?= $fetch_profile['name']; ?>!</i>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
         <p><?= $fetch_profile['name']; ?></p>
         <a href="admin_update_profile.php" class="btn">Cập nhật hồ sơ</a>
         <a href="logout.php" class="delete-btn">Đăng xuất</a>
         <div class="flex-btn">
            <!-- <a href="login.php" class="option-btn">đăng nhập</a> -->
            <!-- <a href="register.php" class="option-btn">đăng kí</a> -->
         </div>
      </div>

   </div>

</header>