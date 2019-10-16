<?php
  session_start();
  error_reporting(0);
  include('db/connect.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Panel - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="background-image: url(images/img5.jpg);">

  <div class="container" >

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">ADMIN LOGIN</h1>
                  </div>
                  <form class="user" action="" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group col-lg-8 mx-auto">
                      <input type="submit" class="form-control btn btn-primary" name="login" id="submit" value="Login">
                    </div>
                    </a>
                  </form>
                  <hr>
                  <?php 
    
                      if (isset($_POST['login'])) {
                        $user=$_POST['email'];
                        $pass=md5($_POST['password']);
                        
                        $sql="SELECT email, password from admin where id=1";
                        $stmt=$pdo->prepare($sql);
                        $stmt->execute();
                        $rslt=$stmt->fetchObject();
                        $dbusr=$rslt->email;
                        $dbpass=$rslt->password;
                        
                        //print_r($rslt);
                        //echo "UserName : ".$dbusr."<br>";
                        //echo "Password : ".$dbpass;
                        
                        if($user==$dbusr && $pass==$dbpass){
                          //echo "Password Matched<br>Login successful";
                          $_SESSION['email']=$user;
                          header('Location:dashboard.php');

                        }
                        else{
                          echo "<p style='color:red'>Something Went Wrong try again</p>";
                        }
                      }

                    ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script>
    $(document).ready(function(){
     $.ajaxSetup({ cache: false });
     $('#search').keyup(function(){
      $('#result').html('');
      $('#state').val('');
      var searchField = $('#search').val();
      var expression = new RegExp(searchField, "i");
      $.getJSON('data.json', function(data) {
       $.each(data, function(key, value){
        if (value.name.search(expression) != -1 || value.location.search(expression) != -1)
        {
         $('#result').append('<li class="list-group-item link-class"><img src="'+value.image+'" height="40" width="40" class="img-thumbnail" /> '+value.name+' | <span class="text-muted">'+value.location+'</span></li>');
       }
     });   
     });
    });
     
     $('#result').on('click', 'li', function() {
      var click_text = $(this).text().split('|');
      $('#search').val($.trim(click_text[0]));
      $("#result").html('');
    });
   });
</script>

</body>

</html>
