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
	<title>STATIONARY</title>
	<style type="text/css">

	</style>
	<link rel="stylesheet" type="text/css" href="css/Stationary.css">
</head>
<body style="background-image:url(image/cafe.jpg);">
	<header>

		<div id= "text">
			<section class="product">
				<center><h1 class="title">Stationary</h1><hr align="center" width="100%" color="green"></center><br>
				<h1>
					Stationary Items
				</h1><br>
				<?php
                      require_once("admin/db/adminoperation.php");
                       adminoperations::foods('Stationary');
                 ?>
				<!-- <div class="product-list-item">
					<img class="img-responsive" src="image/pen.png" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						1.Pen
					</h3>
					<p>PRICE:10TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/pencil.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						2.pencil
					</h3>
					<p>PRICE:10TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/marker.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						3.Marker
					</h3>
					<p>PRICE:30TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/A4.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						4. A4 page
					</h3>
					<p>PRICE:5TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/color_pen.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						5.Color Pen
					</h3>
					<p>PRICE:15TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/designr_pen.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						6.Designr pen
					</h3>
					<p>PRICE:20TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/Eraser.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						7.Eraser
					</h3>
					<p>PRICE:10TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/file.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						8.File
					</h3>
					<p>PRICE:15TK</p>
				</div>
				
				<div class="product-list-item">
					<img class="img-responsive" src="image/khata.png" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						9.Khata
					</h3>
					<p>PRICE:40TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/puncher.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						10.puncher
					</h3>
					<p>PRICE:60TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/sharpener1.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						11.Sharpener
					</h3>
					<p>PRICE:15TK</p>
				</div>
				<div class="product-list-item">
					<img class="img-responsive" src="image/ruler.jpg" height="261px" width="450px" alt="">
					<h3 class="product-heading">
						12.Ruler
					</h3>
					<p>PRICE:30TK</p>
				</div>
				 -->
			</div>

		</section>
	</header>
</body>
</html>
