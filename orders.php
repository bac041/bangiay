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
   <title>Đơn hàng</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" href="/css/style.css"> -->


   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href="images/sheep.ico">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="placed-orders">

   <h1 class="title">Đơn hàng đã đặt</h1>

   <div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
      $select_orders->execute([$user_id]);
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <p> Ngày mua : <span><?= $fetch_orders['placed_on']; ?></span> </p> <!-- placed on -->
      <p> Tên khách hàng : <span><?= $fetch_orders['name']; ?></span> </p>  <!-- name -->
      <p> Số điện thoại : <span><?= $fetch_orders['number']; ?></span> </p> <!-- number -->
      <p> Email : <span><?= $fetch_orders['email']; ?></span> </p>  <!-- email -->
      <p> Địa chỉ : <span><?= $fetch_orders['address']; ?></span> </p>  <!-- address -->
      <p> Phương thức thanh toán : <span><?= $fetch_orders['method']; ?></span> </p>  <!-- payment method -->
      <p> Sản phẩm mua : <span><?= $fetch_orders['total_products']; ?></span> </p>  <!-- your orders -->
      <p> Tổng thanh toán : <span><?= $fetch_orders['total_price']; ?> vnđ</span> </p> <!-- total_price -->
      <p> Trạng thái đơn hàng : <span style="color:<?php if($fetch_orders['payment_status'] == 'đang xử lí'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p> <!-- payment status -->
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">Bạn chưa có đơn hàng nào!</p>';
   }
   ?>

   </div>

</section>









<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>

<?php include 'backtotop.php' ?>