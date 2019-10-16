<?php 
      include('ainclude/header.php');
      require_once('db/connect.php');
  ?>

  <div class="container col-md-6">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Update District Name</div>
        <?php
			if (isset($_POST['submit'])) {
				require_once('db/adminoperation.php');
				adminoperations::updateSubMenu($id,$_POST['submenu']);
				//echo "<h1 style='text-align:center;'>".$_POST['menu']." ".$_POST['submenu']."<h1>";
				//echo 'Done Insertion';
			}
		?>
      <div class="card-body col-md-12">
		<?php 
			require_once('db/connect.php');
			$GLOBALS['id'] =intval($_GET['menuid']);
			$sql="SELECT *from menu where id=$id";
			$stmt=$pdo->prepare($sql);
			$stmt->execute();
			$obj=$stmt->fetchObject();
			$district=$obj->title;
			$GLOBALS['pid']=$obj->parent_id;
			
		?>
          <form action="dist_view.php" method="post">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12 mt-3">
                  <label class="float-left col-md-6">Division Name :</label>
                  <select name="menu" id="menu" class="form-control float-right col-md-6">
        					<!--   <option value="">Select Division</option> -->
        							<?php
        								require_once('db/adminoperation.php');
        								adminoperations::editDropMenu($pid);
        					
        							?>
                  </select>
                </div>
                <div class="col-md-12 mt-3">
                  <label class="float-left col-md-6">District Name :</label>
                  <input type="text" class="form-control float-right col-md-6" name="submenu" value="<?php echo $district; ?>" placeholder="Enter District Name">
                </div>
              </div>
            </div>
              <input type="submit" name="submit" class="btn btn-primary" value="Update">
          </form>
      </div>
    </div>
  </div>

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
<?php
      include('ainclude/footer.php');
?>