<?php
    ob_start();
    session_start();
    

include('admin/db/connect.php');
    if($_SESSION['userid']==0){
      header('Location:Login.php');
    }
 ?>
<!DOCTYPE html>
      <html>
        <head>
          <title>Baust Caftionary</title>
          <link href="css/styles.css" rel="stylesheet" type="text/css">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        </head>
        <body>
          <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-image:url(image/cafe.jpg);">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="main">
                <div class="logo">
                  <a href="admin/index.php"><img src="image/depertment-logo.png" alt=""></a>
                </div>

                <div class="search-box" style="height: 45px;">
                  <input class="search-txt" type="text" name="search"  placeholder="Type to search" /><span>
                  <a class="search-btn" href="#">
                    <i class="fas fa-search"></i>
                  </a></span>
                </div>

              <ul class="navbar-nav">
                <li>
                  <a href="index.php">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item dropdown">
                  <a  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories <span class="caret"></span></a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a  href="Food.php">Food</a>
            <a  href="Stationary.php">Stationery</a>
          </div>
        </li>

<li>
        <a href="Contact.php">Contact Us <span class="sr-only"></span></a>
      </li>
      <li>
        <a href="Rating.php">Review <span class="sr-only"></span></a>
      </li>
      <?php 
        if(!isset($_SESSION['userid'])){
          echo "
            <li><a href='Signup.php'>Sign Up <span class='sr-only'></span></a></li>
            <li><a href='Login.php'>Log In <span class='sr-only'></span></a></li>";
        }else{
          echo"<li><a href='logout.php'>Log Out <span class='sr-only'></span></a></li>";
        }
      ?>
    </ul>
  </div>
</nav>

                <div class="title">
                  <h1>Welcome To BAUST Caftionary.<br>
                  House Of Cafe and stationery</h1>
                </div>
                <div class="button">
                <a herf="#" class="btn">Order Now</a>
                </div>



          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </body>
      </html>
