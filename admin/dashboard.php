<?php 
      include('ainclude/header.php');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Foods</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php 
              $sql ="SELECT  *from foods";
              $query = $pdo -> prepare($sql);
              $query->execute();
              $foods=$query->rowCount();
              echo htmlentities($foods);
            ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Orders</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
              $sql ="SELECT  *from orders";
              $query = $pdo -> prepare($sql);
              $query->execute();
              $orders=$query->rowCount();
              echo htmlentities($orders);
            ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-th-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--- Total Tour Places Listed -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Earning</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $sql ="SELECT  count(id) as price from orders where status='success'";
              $query = $pdo -> prepare($sql);
              $query->execute();
              $obj=$query->fetchObject();
              $price=$obj->price;
              echo htmlentities($price);
            ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Orders</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $sql ="SELECT  *from orders where status ='pending'";
              $query = $pdo -> prepare($sql);
              $query->execute();
              $pending=$query->fetchAll(PDO::FETCH_OBJ);
              $pending=$query->rowCount();
              echo htmlentities($pending);
            ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
<?php
      include('ainclude/footer.php');
?>