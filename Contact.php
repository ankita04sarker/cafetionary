<?php
ob_start();
session_start();


include('admin/db/connect.php');
if($_SESSION['userid']==0 and $_SESSION['adminid']==0){
  header('Location:Login.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <link href="css/Contact.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image:url(image/cafe.jpg);">
  <div class="contact-form">
    <div class="title">
      <h1>Contact Us</h1>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
      <div class="txtb">
        <label>Full Name :</label>
        <input type="text" name="name" value="" placeholder="Enter your Name">
      </div>

      <div class="txtb">
        <label>Email :</label>
        <input type="email" name="email" value="" placeholder="Enter your Email">
      </div>

      <div class="txtb">
        <label>Phone Number :</label>
        <input type="text" name="phone" value="" placeholder="Enter your Phone Number">
      </div>

      <div class="txtb">
        <label>Message :</label>
        <textarea name="message"></textarea>
      </div>

      <div style="width:50%;height:40px;margin:0px auto;">
        <input type="submit" style="width:100%;height: 100%;border-radius: 10%;background-color: blue;" name="send" value="Send"/>
      </div>
    </form>
    <?php 
        if(isset($_POST['send'])){
          $userid=$_SESSION['userid'];
          $name=$_POST['name'];
          $email=$_POST['email'];
          $phone=$_POST['phone'];
          $message=$_POST['message'];
          $status="Pending";
          //echo "$userid : $name : $email : $phone : $message";

          require_once('admin/db/adminoperation.php');
          adminoperations::send_user_mail($userid,$name,$email,$phone,$message,$status);
        }
    ?>
  </div>

</body>
</html>
