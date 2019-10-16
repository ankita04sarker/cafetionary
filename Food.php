<?php
ob_start();
session_start();


include('admin/db/connect.php');
if($_SESSION['userid']==0 ){
	header('Location:Login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Food</title>
	<style type="text/css">

	</style>
	<link rel="stylesheet" type="text/css" href="css/Food.css">
</head>
<body style="background-image:url(image/cafe.jpg);">
	<header>

		<div id= "text">
			<section class="product">
				<center><h1 class="title">FOOD</h1><hr align="center" width="100%" color="green"></center><br>
				<h1>
					SNACKS
				</h1><br>

				<?php
                      require_once("admin/db/adminoperation.php");
                       adminoperations::foods('Snacks');
                 ?>
				<!-- <div class="product-list-item">
					<img class="img-responsive" src="image/Burger.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						1.Chicken Burger
					</h3>
					<p>PRICE:30TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/Roll.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						2.Roll
					</h3>
					<p>PRICE:10TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/noodles.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						3.Special Noodles
					</h3>
					<p>PRICE:20TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/Singara.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						4.Singara
					</h3>
					<p>PRICE:5TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/samucha.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						5.Samucha
					</h3>
					<p>PRICE:5TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/Sandwiches.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						6.Sandwiche
					</h3>
					<p>PRICE:15TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/chicken.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						7.Chicken Fry
					</h3>
					<p>PRICE:40TK</p>
				</div> -->

				<center><hr align="center" width="100%" color="green"></center>
				<h1>
					KHICHURI
				</h1><br>
				<?php
                      require_once("admin/db/adminoperation.php");
                       adminoperations::foods('Khichuri');
                 ?>
				<!-- <div class="product-list-item">
					<img class="img-responsive" src="image/khicuri.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						8.Special Khichuri
					</h3>
					<p>PRICE:20TK</p>
				</div>
				-->
				<center><hr align="center" width="100%" color="green"></center></span>
				<h1>
					DRINKS
				</h1><br>
				<?php
                      require_once("admin/db/adminoperation.php");
                       adminoperations::foods('Drinks');
                 ?>
                <!--
				<div class="product-list-item">
					<img class="img-responsive" src="image/juice.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						9.Pran Juice
					</h3>
					<p>PRICE:20TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/coffee.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						10.COFFEE
					</h3>
					<p>PRICE:18TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/coke.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						11.Coca cola
					</h3>
					<p>PRICE:25TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/sevenup.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						12.Seven Up
					</h3>
					<p>PRICE:30TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/Furtika.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						13.Furtika
					</h3>
					<p>PRICE:30TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/mangolee.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						14.Mangolee
					</h3>
					<p>PRICE:30TK</p>
				</div>
				
				<center><hr align="center" width="100%" color="green"></center></span>
				<h1>
					SWEETS
				</h1><br>
				<div class="product-list-item">
					<img class="img-responsive" src="image/chocolate_cake.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						15. chocolate Pastry
					</h3>
					<p>PRICE:10TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/kitkate.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						16.Kitkat
					</h3>
					<p>PRICE:10TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/Vanila.jpeg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						17. Vanila Pestry
					</h3>
					<p>PRICE:10TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/cake.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						18. Muffin Cake
					</h3>
					<p>PRICE:10TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/cone.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						19.chocolate ice-cream
					</h3>
					<p>PRICE:45TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/cone1.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						20.Vanila ice-cream
					</h3>
					<p>PRICE:45TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/ice cream.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						21. chocolate ice-cream
					</h3>
					<p>PRICE:25TK</p>
				</div> -->
				<center><hr align="center" width="100%" color="green"></center></span>
				<h1>
					CHIPS
				</h1><br>
				<?php
                      require_once("admin/db/adminoperation.php");
                       adminoperations::foods('Chips');
                 ?>
				<!-- <div class="product-list-item">
					<img class="img-responsive" src="image/Alooz.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						22. Alooz chips
					</h3>
					<p>PRICE:15TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/Dong Dong.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						23. Dong Dong chips
					</h3>
					<p>PRICE:10TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/Mr. Twist.jpeg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						24. Mr. Twist
					</h3>
					<p>PRICE:15TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/Cenachur.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						25. Cenachur
					</h3>
					<p>PRICE:10TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/jhal muri.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						26.Jhal Muri
					</h3>
					<p>PRICE:10TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/poteto1.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						27.Poteto chips
					</h3>
					<p>PRICE:10TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/potato.png" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						28. Potato chips
					</h3>
					<p>PRICE:10TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/ring.png" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						29. Ring chips
					</h3>
					<p>PRICE:10TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/pran-dal.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						30. pran dal
					</h3>
					<p>PRICE:10TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/sun.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						31. sun chips
					</h3>
					<p>PRICE:15TK</p>
				</div>
				 -->
			</div>

		</section>
	</header>
</body>
</html>
