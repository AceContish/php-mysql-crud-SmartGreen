<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Smart Greens</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<style>
	.custom-column {
		width: 400px;
		height: 325px;
		background-color: #D9D9D9;
		display: flex;
		align-items: center;
		justify-content: center;
		margin-right: 60px;
	}
	.custom-column:last-child {
		margin-right: 0;
	}
	.carousel-caption h5, .carousel-caption p {
		color: #ffffff;
	}
	.img-height {
		height: 450px;
		object-fit: contain;
	}

	</style>
</head>
<body>
	<?php
		require 'navBar_user.html';
	?>
	<div class="container">
		<h1>Dashboard</h1><br>
		<div class="container text-center">
			<div class="row g-4">
				<div class="col custom-column" onclick="redirectProfile()">
					<div class="d-flex flex-column align-items-center">
						<img style="height: 188px; width: 178px;" src="Image/user.png" alt="">
						<p style="font-size: 26.802px;" class="mt-3">Profile</p>
					</div>
				</div>
				<div class="col custom-column" onclick="redirectCart()">
					<div class="d-flex flex-column align-items-center">
						<img style="height: 188px; width: 178px;" src="Image/shopping-cart.png" alt="">
						<p style="font-size: 26.802px;" class="mt-3">Cart</p>
					</div>
				</div>
				<div class="col custom-column" onclick="redirectRecipe()">
					<div class="d-flex flex-column align-items-center">
						<img style="height: 188px; width: 178px;" src="Image/recipe-book.png" alt="">
						<p style="font-size: 26.802px;" class="mt-3">Recipes</p>
					</div>
				</div>
			</div>
		</div><br><br><br>
		<div id="carouselExampleDark" class="carousel carousel-dark slide">
			<div class="carousel-indicators">
			  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
			  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
			  <div class="carousel-item active" data-bs-interval="10000">
				<img src="Image/Apple Pie.jpg" class="d-block w-100 img-height" alt="top1">
				<div class="carousel-caption d-none d-md-block">
				  <h5>Apple Pie</h5>
				  <p>Classic dessert with flaky crust and sweet, spiced apple filling.</p>
				</div>
			  </div>
			  <div class="carousel-item" data-bs-interval="2000">
				<img src="Image/ARROZ CON POLLO.jpg" class="d-block w-100 img-height" alt="top2">
				<div class="carousel-caption d-none d-md-block">
				  <h5>Arroz Con Pollo</h5>
				  <p>Chicken and rice dish with Latin American flavors.</p>
				</div>
			  </div>
			  <div class="carousel-item">
				<img src="Image/Cinnamon Roll with Orange Syrup.jpg" class="d-block w-100 img-height" alt="top3">
				<div class="carousel-caption d-none d-md-block">
				  <h5>Cinammon Roll</h5>
				  <p>Sweet, doughy pastry swirled with cinnamon and topped with icing.</p>
				</div>
			  </div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
			  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			  <span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
			  <span class="carousel-control-next-icon" aria-hidden="true"></span>
			  <span class="visually-hidden">Next</span>
			</button>
		  </div>
	<br><br>  
	</div>
	<script src="JS/scriptnav.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
