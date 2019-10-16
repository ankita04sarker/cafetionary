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
  <div class="contact-form" style="width:500px;">
    <div class="title">
      <h1>Place Order</h1>
    </div>
    <?php 

    if(isset($_GET['foodid'])){
      $id=$_GET['foodid'];
      $sql="SELECT *FROM foods Where id=$id";
      $stmt=$pdo->prepare($sql);
      $stmt->execute();
      $obj=$stmt->fetchObject();
      $fid=$obj->id;
      $name=$obj->name;
      $type=$obj->type;
      $price=$obj->price;
      //print_r($obj);
    }
    $userid=$_SESSION['userid'];
    $sq="SELECT *FROM user where user_id='$userid'";
    $qry=$pdo->prepare($sq);
    $qry->execute();
    $ob=$qry->fetchObject();
    $uid=$ob->id;
    $mail=$ob->mail;
    $userid=$ob->user_id;
    ?>
    <form  action="order.php?foodid='<?php echo $id; ?>'" method="post" enctype="multipart/form-data">
      <div class="txtb">
        <label>Product Name :</label>
        <input type="text" name="foodname" value='<?php echo $name; ?>' placeholder="Enter your Name" disabled="" />
      </div>
      <div class="txtb">
        <label>Type :</label>
        <input type="text" name="type" value='<?php echo $type; ?>' placeholder="Enter Type" disabled="" />
      </div>
      <div class="txtb">
        <label>Price :</label>
        <input type="text" name="price" value='<?php echo $price." BDT"; ?>' placeholder="Enter your Name" disabled="" />
      </div>
      <div class="txtb">
        <label>Full Name :</label>
        <input type="text" name="name" value='' placeholder="Enter your Name" required="" />
      </div>

      <div class="txtb">
        <label>Phone Number :</label>
        <input type="text" name="phone" value='' placeholder="Enter your Phone Number" required="" />
      </div>

      <div class="txtb">
        <label>Shipping Address :</label>
        <input type="text" name="address" value='' placeholder="Enter your Address" required="" />
      </div>

      <div style="width:50%;height:40px;margin:0px auto;">
        <input type="submit" style="width:80%;height: 100%;border-radius: 10%;background-color: blue;" name="order" value="Order"/>
      </div>
    </form>
    <?php 
        if(isset($_POST['order'])){
          $userid=$uid;
          $foodid=$fid;
          $name=$_POST['name'];
          $phone=$_POST['phone'];
          $address=$_POST['address'];
          $status="Pending";
         // echo "$userid : $foodid : $name : $phone : $address : $status";

          require_once('admin/db/adminoperation.php');
          adminoperations::place_order($userid,$foodid,$name,$phone,$address,$status);
        }
    ?>
  </div>

</body>
</html>
