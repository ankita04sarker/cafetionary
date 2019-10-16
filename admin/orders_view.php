<?php 
      include('ainclude/header.php');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Order Management</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <?php 
              require_once('db/connect.php');
              if(isset($_GET['orderid'])){
                $id=$_GET['orderid'];
                $sql="DELETE FROM orders WHERE id=:id";
                $stmt=$pdo->prepare($sql);
                $stmt->bindParam(':id',$id,PDO::PARAM_INT);
                $stmt->execute();
                $_SESSSION['delmsg']="Order Deleted Successfully.";
/*                header('Location:div_view.php');*/
                
              }
            ?>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SL No</th>
                      <th>Customer ID</th>
                      <th>Customer Name</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Food Name</th>
                      <th>Type</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>SL No</th>
                      <th>Customer ID</th>
                      <th>Customer Name</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Food Name</th>
                      <th>Type</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      require_once("db/adminoperation.php");
                       adminoperations::showorders();
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