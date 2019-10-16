<?php 
      include('ainclude/header.php');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Customer Management</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <!--POPUP Modal Ends Here -->
            <?php 
              require_once('db/connect.php');
              if(isset($_GET['userid'])){
                $id=$_GET['userid'];
                $sql="DELETE FROM user WHERE id=:id";
                $stmt=$pdo->prepare($sql);
                $stmt->bindParam(':id',$id,PDO::PARAM_INT);
                $stmt->execute();
                $_SESSSION['delmsg']="User Deleted Successfully.";
                
              }
            ?>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SL No</th>
                      <th>User Id</th>
                      <th>Password</th>
                      <th>Contact Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>SL No</th>
                      <th>User Id</th>
                      <th>Password</th>
                      <th>Contact Email</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      require_once("db/adminoperation.php");
                       adminoperations::showuser();
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