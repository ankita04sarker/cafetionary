<?php 
      include('ainclude/header.php');
    require_once('db/connect.php');
    
    if(isset($_GET['userid'])){
      $id=$_GET['userid'];
      $sql="SELECT *FROM user Where id=$id";
      $stmt=$pdo->prepare($sql);
      $stmt->execute();
      $obj=$stmt->fetchObject();
      $user_id=$obj->user_id;
      $password=$obj->password;
      $mail=$obj->mail;
      //print_r($obj);
    }
  ?>
  <div class="container col-md-6">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Update User Info</div>
      <div class="card-body col-md-12">
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <input type="hidden" name="id" value='<?php echo $id; ?>' />
                <input type="text" class="form-control mt-3" name="user_id" value='<?php echo $user_id; ?>' placeholder="Enter UserId" required="">
                <input type="text" class="form-control mt-3" name="password" value='<?php echo $password; ?>'  placeholder="Enter Password" required="">
                <input type="text" class="form-control mt-3" name="mail" value='<?php echo $mail; ?>'  placeholder="Enter Email" required="">
              </div>
            </div>
          </div>
      <div class="form-group">
      <div class="form-row">
        <div class="col-md-8" style="margin:0px auto;">
          <input type ="submit" name="submit" value="Update" class="btn btn-primary btn-block">
        </div>
      </div>
      </div>
        </form>
        <?php 
            if (isset($_POST['submit'])) {
                $id=$_POST['id'];
                $user_id=$_POST['user_id'];
                $mail=$_POST['mail'];
                $password=$_POST['password'];
                
                //echo "$id  : $user_id  : $password : $mail ";

                require_once('db/adminoperation.php');
                adminoperations::updateuser($id,$user_id,$mail,$_POST['password']);
                echo "<p class='text-success'>User Info Updated Successfully.</p>";
              }
            ?>
      </div>
    </div>
  </div>

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
<?php
      include('ainclude/footer.php');
?>