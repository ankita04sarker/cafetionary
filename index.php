<?php
ob_start();
session_start();


include('admin/db/connect.php');
    /*if($_SESSION['userid']==0){
      header('Location:Login.php');
    }*/
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Baust Caftionary</title>
      <style>
      #result {
       position: absolute;
       width: 500px;
       max-width:870px;
       cursor: pointer;
       overflow:hidden;
       box-sizing: border-box;
       z-index: 100000001;
       padding: 15px;
      }
      #result:hover{
        z-index: 1000001;
      }
      .link-class{
        width:100%;
      }
      .link-class:hover{
       background-color:#f1f1f1;
      }
      .order{
        line-height: 30px;
        margin:2px;
      }
      .order:hover{
        color:blue;
      }
      </style>

      <link href="css/styles.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>


    </head>
    <body style="background:url(image/cafe.jpg) no-repeat fixed;background-size: cover;">
      <nav class="navbar navbar-expand-lg" >
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="main">
            <div class="logo">
              <a href="admin/index.php"><img src="image/depertment-logo.png" alt=""></a>
            </div>
            <?php 
              require_once('create_json.php');
              //createJson::get_data();
              $file_name ="data.json"; 
              file_put_contents($file_name, createJson::get_data());
            ?>
            <div class="search-box" style="height: 45px;">
              <input class="search-txt" type="text" name="search" id="search"  placeholder="Type to search" /><span>
                  <i class="fas fa-search"></i></span>
              <ul class="list-group" id="result">
          
              </ul>
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
            <div class="btn button " id="orderoption" style="line-height: 34px;">
              <!-- <a herf="#" class="btn" id="orderoption" onclick="orderoption()">Order Now</a> -->
              <p>Order Now</p>

            </div>



            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                 $.ajaxSetup({ cache: false });
                 $('#search').keyup(function(){
                  $('#result').html('');
                  var searchField = $('#search').val();
                  var expression = new RegExp(searchField, "i");
                  $.getJSON('data.json', function(data) {
                   $.each(data, function(key, value){
                    if (value.name.search(expression) != -1 || value.price.search(expression) != -1 || value.type.search(expression) != -1){
                    var loc='admin/'+value.image;
                    $('#result').append('<a href="order.php?foodid='+value.id+'"><li class="list-group-item link-class"><img src="'+loc+'" height="80" width="80" class="img-thumbnail" /> '+value.name+' | <span class="text-muted"><b>Price-</b>'+value.price+'BDT&nbsp;  |  <b>Type-</b>'+value.type+'</span></li></a>');
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
              <!--  ORDER NOW SCRIPT -->
              <script>
                document.getElementById("orderoption").addEventListener("click", orderoption);
                function orderoption(){
                  document.getElementById('orderoption').innerHTML="<a href='food.php' class='btn order'>Food</a><a href='Stationary.php' class='btn order'>Stationary</a>";
                }
              </script>
          </body>
          </html>
