<?php 
      include('ainclude/header.php');
    require_once('db/connect.php');
    
    if(isset($_GET['foodid'])){
      $id=$_GET['foodid'];
      $sql="SELECT *FROM foods Where id=$id";
      $stmt=$pdo->prepare($sql);
      $stmt->execute();
      $obj=$stmt->fetchObject();
      $name=$obj->name;
      $type=$obj->type;
      $price=$obj->price;
      //print_r($obj);
    }
  ?>
  <div class="container col-md-6">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Update Food Info</div>
      <div class="card-body col-md-12">
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <input type="hidden" name="id" value='<?php echo $id; ?>' />
                <input type="text" class="form-control mt-3" name="name" value='<?php echo $name; ?>' placeholder="Enter Food/Stationary Name" required="">
                <input type="number" class="form-control mt-3" name="price" value='<?php echo $price; ?>'  placeholder="Enter Price" required="">
                <select name="type" class="form-control mt-3"  id="type" required="">
                    <option value="Snacks">Snacks</option>
                    <option value="Khichuri">Khicuri</option>
                    <option value="Drinks">Drinks</option>
                    <option value="Sweets">Sweets</option>
                    <option value="Chips">Chips</option>
                    <option value="Stationary">Stationary</option>
                </select>
                <input type="file" name="file" class="form-control mt-3"/>
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
                $name=$_POST['name'];
                $type=$_POST['type'];
                $price=$_POST['price'];
                $loc = "images/";
                $filename = $_FILES['image']['name'];
                $tmpname = $_FILES['image']['tmp_name'];
                $filesize = $_FILES['image']['size'];
                $filetype = $_FILES['image']['type'];
  
                $filepath = $loc."".$filename;

//                echo "$name  : $type  : $price  : $filepath ";

                $rslt = move_uploaded_file($tmpname,$filepath);
                error_reporting(E_ERROR | E_PARSE);
                
                if(!isset($rslt)){
                  echo "<p class='text-danger'>Failed to Upload. Try Again</p>";                              
                  exit();
                      
                }
                require_once('db/adminoperation.php');
                adminoperations::updatefood($id,$name,$type,$price,$filepath);
                echo "<p class='text-success'>Food Item Updated Successfully.</p>";
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