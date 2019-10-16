<?php include('admin/db/connect.php');  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Sign Up</title>
  <link href="css/signup.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image: url(image/img4.jpg);">
  <div style='height: 500px; width: 400px;margin: 0px auto;'>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <div id="signup-box">
      <div class="left-box">
        <h1>Sign Up</h1>
        <input type="text" name="id" placeholder="ID"/>
        <input type="text" name="email" placeholder="Email"/>
        <input type="password" name="password" placeholder="Password"/>
        <input type="password" name="confirm" placeholder="Conform Password"/>
        <input type="submit" name="signup" value="Submit"/>
      </div>
    </div>

  </form>
  <?php 
      if(isset($_POST['signup'])){
        $user_id=$_POST['id'];
        $mail=$_POST['email'];
        $password=$_POST['password'];
        $confirm=$_POST['confirm'];

        //echo "<p>$user_id  : $mail  : $password : $confirm</p>";
        require_once('admin/db/adminoperation.php');
        adminoperations::user_already_exist_checking($user_id,$mail,$_POST['password'],$confirm);


      }
  ?>
</div>
</body>
</html>
