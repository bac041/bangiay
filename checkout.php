
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
include 'config.php';
// @require 'mail/sendmail.php';
/////////////////////////////////////////////////////// Này là gửi mail
use PHPMailer\PHPMailer\PHPMailer;
function sendmail(){
   $nameuser = $_POST['name'];
   $date = date('d/m/Y H:i:s');
    $name = "Sheep.";  // Name of your website or yours
    $to = $_POST['email'];  // mail of reciever
    $subject = "Bạn đã đặt hàng thành công tại Fruits Shop";
    $body = " <h3> Xin chào  ".$nameuser."  </h3>
    <div>
    <p>Đơn hàng của bạn đã được đặt thành công vào ngày ".$date." </p>
    <p>Cảm ơn bạn đã đặt hàng bên Fruits Shop! Bên mình sẽ vận chuyển cho bạn sớm nhất</p>
    </div>
    ";
    $from = "21004237@st.vlute.edu.vn";  // you mail
    $password = "kimngan1234";  // your mail password

    // Ignore from here

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    // To Here

    //SMTP Settings
    $mail->isSMTP();
    // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
    $mail->Host = "smtp.gmail.com"; // smtp address of your email
    $mail->SMTPAuth = true;
    $mail->Username = $from;
    $mail->Password = $password;
    $mail->Port = 587;  // port
    $mail->SMTPSecure = "tls";  // tls or ssl
    $mail->smtpConnect([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        ]
    ]);

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($from, $name);
    $mail->addAddress($to); // enter email address whom you want to send
    $mail->Subject = ("$subject");
    $mail->Body = $body;
    if ($mail->send()) {
      //   echo "Email is sent!";
    } else {
      //   echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
    }
}
// if (isset($_GET['sendmail'])) {
//    sendmail();
// }





$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['order'])){

      sendmail();

   

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $address = $_POST['flat'] .' '. $_POST['street'] .' '. $_POST['city'] .' '. $_POST['state'] .' '. $_POST['country'] .' - Mã bưu cục '. $_POST['pin_code'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $placed_on = date('d/m/Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $cart_query->execute([$user_id]);
   if($cart_query->rowCount() > 0){
      while($cart_item = $cart_query->fetch(PDO::FETCH_ASSOC)){
         $cart_products[] = $cart_item['name'].' ( '.$cart_item['quantity'].' )';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      };
   };

   // $pattern = '/^\d{3}[-\s]+?\d{3}[-\s]?\d{4}$/';// biến sdt

   $total_products = implode( ', ',$cart_products);

   $order_query = $conn->prepare("SELECT * FROM `orders` WHERE name = ? AND number = ? AND email = ? AND method = ? AND address = ? AND total_products = ? AND total_price = ?");
   $order_query->execute([$name, $number, $email, $method, $address, $total_products, $cart_total]);

   if($cart_total == 0){
      // $message[] = 'your cart is empty';
   }elseif($order_query->rowCount() > 0){
      // $message[] = 'order placed already!';
   }else{

      $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES(?,?,?,?,?,?,?,?,?)");
      $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $cart_total, $placed_on]);
      $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
      $delete_cart->execute([$user_id]);
      $message[] = 'Đặt hàng thành công!';
     



   }


 


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tiến hành thanh toán</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href="images/sheep.ico">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="display-orders">

   <?php
      $cart_grand_total = 0;
      $select_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
      $select_cart_items->execute([$user_id]);
      if($select_cart_items->rowCount() > 0){
         while($fetch_cart_items = $select_cart_items->fetch(PDO::FETCH_ASSOC)){
            $cart_total_price = ($fetch_cart_items['price'] * $fetch_cart_items['quantity']);
            $cart_grand_total += $cart_total_price;
   ?>
   <p> <?= $fetch_cart_items['name']; ?> <span>(<?= ''.$fetch_cart_items['price'].' vnđ x '. $fetch_cart_items['quantity']; ?>)</span> </p>
   <?php
    }
   }else{
      echo '<p class="empty">giỏ hàng trống!</p>';
   }
   ?>
  
   <div class="grand-total">Tổng cộng : <span><?= $cart_grand_total; ?> vnđ</span></div>
</section>

<section class="checkout-orders">

   <form action="" method="POST">

      <h3>Thông tin đặt hàng</h3>

      <div class="flex">
         <div class="inputBox">
            <span>Họ tên :</span>
            <input type="text" name="name" value="<?= $fetch_profile['name']; ?>" placeholder="nhập họ tên" class="box" required>
         </div>
         <div class="inputBox">
            <span>Số điện thoại :</span>
            <input type="text"  name="number"  placeholder="nhập số điện thoại" class="box" required pattern="[0-9]{10}" title="phải chứa 10 kí tự số">
         </div>
         <div class="inputBox">
            <?php 
                        if(isset($report)){echo $report;}
            ?>
            <span>Email của bạn :</span>
            <input type="email" value="<?= $fetch_profile['email']; ?>" name="email" placeholder="nhập email" class="box" required>
         </div>
         <div class="inputBox">
            <span>Phương thức thanh toán :</span>
            <select name="method" class="box" required>
               <option value="thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option> <!-- cash on delivery -->
               <option value="thẻ tín dụng">Thẻ tín dụng</option> <!-- credit card -->
               <option value="thẻ ghi nợ">Thẻ ghi nợ</option> <!-- paytm -->
            </select>
         </div>
         <div class="inputBox">
            <span> Gần đâu:</span>
            <input type="text" name="flat" placeholder="vd: gần nhà thờ.." class="box" required>
         </div>
         <div class="inputBox">
            <span> Địa chỉ:</span>
            <input type="text" name="street" placeholder="số nhà 11" class="box" required>
         </div>
         <div class="inputBox">
            <span>Xã/phường :</span>
            <input type="text" name="city" placeholder="nhập vào xã/phường" class="box" required>
         </div>
         <div class="inputBox">
            <span>Huyện/tỉnh :</span>
            <input type="text" name="state" placeholder="nhập vào huyện/tỉnh" class="box" required>
         </div>
         <div class="inputBox">
            <span>Quốc gia :</span>
            <input type="text" name="country" placeholder="vd: Việt Nam" class="box" required>
         </div>
         <div class="inputBox">
            <span>Mã bưu cục :</span>
            <input type="number" min="0" name="pin_code" placeholder="nhập vào mã bưu cục" class="box" required>
         </div>
      </div>

      <input type="submit" name="order" class="btn <?= ($cart_grand_total > 1)?'':'disabled'; ?>" value="đặt hàng">

   </form>

</section>





<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>