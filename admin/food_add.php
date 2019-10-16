<?php 
      include('ainclude/header.php');
    require_once('db/connect.php');
  ?>
  <div class="container col-md-6">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add New Food Info</div>
      <div class="card-body col-md-12">
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <input type="text" class="form-control mt-3" name="name" value='' placeholder="Enter Food/Stationary Name" required="">
                <input type="number" class="form-control mt-3" name="price" value=''  placeholder="Enter Price" required="">
                <select name="type" class="form-control mt-3" id="type">
                    <option value="Snacks">Snacks</option>
                    <option value="Khichuri">Khicuri</option>
                    <option value="Drinks">Drinks</option>
                    <option value="Sweets">Sweets</option>
                    <option value="Chips">Chips</option>
                    <option value="Stationary">Stationary</option>
                </select>
                <input type="file" name="image" class="form-control mt-3"/>
              </div>
            </div>
          </div>
      <div class="form-group">
      <div class="form-row">
        <div class="col-md-8" style="margin:0px auto;">
          <input type ="submit" name="submit" value="Save" class="btn btn-primary btn-block">
        </div>
      </div>
      </div>
        </form>
        <?php 
            if (isset($_POST['submit'])) {
                $name=$_POST['name'];
                $type=$_POST['type'];
                $price=$_POST['price'];
                $loc = "images/";
                $filename = $_FILES['image']['name'];
                $tmpname = $_FILES['image']['tmp_name'];
                $filesize = $_FILES['image']['size'];
                $filetype = $_FILES['image']['type'];
  
                $filepath = $loc.$filename;

                //echo "$name  : $type  : $price  : $filepath ";

                $rslt = move_uploaded_file($tmpname,$filepath);
                error_reporting(E_ERROR | E_PARSE);
                if(!isset($rslt)){
                  echo "<p class='text-danger'>Failed to Upload. Try Again</p>";                              
                  exit();
                      
                }
                require_once('db/adminoperation.php');
                adminoperations::food_already_exist_checking($name,$price,$type,$filepath);
                
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