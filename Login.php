<?php
    ob_start();
    session_start();
    

include('admin/db/connect.php');
    include('admin_check.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="css/login.css" rel="stylesheet" type="text/css">
  </head>
  <body style="background-image: url(image/img4.jpg);">
    <div class="box">
      <h2>Login</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <div class="inputBox">
          <input type="text" name="id" required="">
          <label>ID</label>
          <div class="inputBox">
            <input type="password" name="password" required="">
            <label>Password</label>
        </div>
        <input type="submit" name="login" value="Sign In">
      </form>
    <?php
            
            if(isset($_POST['login'])){
                $userid = $_POST['id'];
                $pass = $_POST['password'];
                //echo "$userid : $pass<br/>";
                check_admin::user_check($userid,$pass);
                
                
            }
            
        ?>
    </div>
  </div>
  </body>
</html>
