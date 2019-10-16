<?php 
      include('ainclude/header.php');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Food Management</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Foods</h6>
              <a href="food_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-edit fa-sm text-white-50"></i> Create New</a>
            </div>
            <?php 
              require_once('db/connect.php');
              if(isset($_GET['foodid'])){
                $id=$_GET['foodid'];
                $sql="DELETE FROM foods WHERE id=:id";
                $stmt=$pdo->prepare($sql);
                $stmt->bindParam(':id',$id,PDO::PARAM_INT);
                $stmt->execute();
                $_SESSSION['delmsg']="Food Item Deleted Successfully.";
/*                header('Location:food_view.php');*/
                
              }
            ?>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SL No</th>
                      <th>Food Name</th>
                      <th>Type</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>SL No</th>
                      <th>Food Name</th>
                      <th>Type</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      require_once("db/adminoperation.php");
                       adminoperations::showfoods();
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
<?php
      include('ainclude/footer.php');
?>