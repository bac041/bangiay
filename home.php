<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['add_to_wishlist'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);

   $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
   $check_wishlist_numbers->execute([$p_name, $user_id]);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   // if($check_wishlist_numbers->rowCount() > 0){
   //    $message[] = 'already added to wishlist!';
   // }elseif($check_cart_numbers->rowCount() > 0){
   //    $message[] = 'already added to cart!';
   // }else{
   //    $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
   //    $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
   //    $message[] = 'added to wishlist!';
   // }

}

if(isset($_POST['add_to_cart'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
      $message[] = 'Đã được thêm vào giỏ hàng!';
   }else{

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$p_name, $user_id]);

      if($check_wishlist_numbers->rowCount() > 0){
         $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
         $delete_wishlist->execute([$p_name, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'Đã thêm giỏ hàng!';
   }

}

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
   <link rel="icon" href="images\grennfarm.png">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="home-bg">

   <section class="home">

      <div class="content">
         <span>Đừng lo, đây là sản phẩm hữu cơ</span>
         <h3>Grenn Farm   Vì sức khỏe người Việt</h3>
         <p>Chúng tôi, các bạn và người thân, ít nhiều cũng đã từng là NẠN NHÂN của thực phẩm bẩn. Hơn ai hết chúng tôi hiểu tầm quan trọng của các nguyên liệu chế biến thức ăn SẠCH?</p>
         <a href="about.php" class="btn">Về chúng tôi!</a>
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
         <p>Đồ uống tại Grenn Farm được sản xuất theo chuẩn VSATTP với các loại sữa,nước ép được chiết suất từ các loại trái cây tự nhiên.</p>
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
      <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
      <input type="number" min="1" value="1" name="p_qty" class="qty">
      <!-- <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist"> -->
      <input type="submit" value="Thêm giỏ hàng" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">Không có sản phẩm nào!</p>';
   }
   ?>

   </div>

</section>







<?php include 'footer.php';?>

<script src="js/script.js"></script>

</body>
</html>

<?php include 'backtotop.php' ?>