<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/dist/css/bootstrap.min.css">
	<script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?=base_url()?>assets/web/css/style-fontend.css" type="text/css">
	<link rel="stylesheet" href="<?=base_url()?>assets/web/css/responsive-fontend.css" type="text/css">
	<link rel="stylesheet" href="<?=base_url()?>assets/web/js/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/web/js/owlcarousel/assets/owl.theme.default.min.css">
	<script src="<?=base_url()?>assets/web/js/vendors/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/web/js/vendors/highlight.js"></script>
	<script src="  <?=base_url()?>assets/web/js/app.js"></script>
	<script src="<?=base_url()?>assets/web/js/owlcarousel/owl.carousel.js"></script>
	<script src="<?=base_url()?>assets/web/js/script.js"></script>
	<title>Teemo Gentlement</title>
</head>

<body>
	<header>
		<div id="header-top">
			<div class="container">
				<div class="head1">
					<div class="col-xs-12 col-sm-6 col-md-6 phone">
						<img src="<?=base_url()?>assets/web/img/phone.jpg">
						<p>(0123) 456 7890</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 account">
						<ul class="navbar-right menutop">
							<li><a href="">WishList</a></li>
							<li><a href="">Compare</a></li>
							<li><a href="">Account <span class="glyphicon glyphicon-triangle-bottom"></span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div id="header-top2">
			<div class="container">
				<div class="col-xs-12 col-md-3 logo">
					<a href="#"><img src="<?=base_url()?>assets/web/img/logo.jpg"></a>
				</div>
				<div class="col-xs-12 col-md-4 search">
					<div class="input-group">
						<input type="text" id="txt-search" name="search" value="" size="50" class="form-control search-text" placeholder="Search ">
						<span class="input-group-btn">
							<button class="btn btn-secondary searchbtn" type="button"><span class="glyphicon glyphicon-search"></span></button>
						</span>
					</div>
					<ul class="list-group" id="result">

					</ul>
				</div>
				<script>
					$(document).ready(function() {
						$.ajaxSetup({
							cache: false
						});
						$('#txt-search').keyup(function() {
							$('#result').html('');
							$('#state').val('');
							var searchField = $('#txt-search').val();
							var expression = new RegExp(searchField, "i");
							$.getJSON('data.json', function(data) {
								$.each(data, function(key, value) {
									if (value.name.search(expression) != -1) {
										$('#result').append('<li class="list-group-item link-class">' + value.name + ' | <span class="text-muted">' + value.location + '</span></li>');
									}
								});
							});
						});

						$('#result').on('click', 'li', function() {
							var click_text = $(this).text().split('|');
							$('#txt-search').val($.trim(click_text[0]));
							$("#result").html('');
						});
					});
				</script>
				<div class="col-xs-12 col-md-5 head-option">
					<div class="shop">
						<select class="form-control money">
							<option>$</option>
							<option>VND</option>
							<option>Dolar</option>
						</select>
						<select class="form-control language">
							<option>Language</option>
							<option>English</option>
							<option>Vietnamese</option>
						</select>
						<a href="#" class="btn btn-danger sp-cart"> <span class="glyphicon glyphicon-shopping-cart"></span> Shopping cart (0)</a>
					</div>
				</div>
			</div>
		</div>
		<div id="head-nav">
			<div class="container">
				<div class="row">
					<nav class="navbar-inverse">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse" id="myNavbar">
							<div class="head-nav-menu">
								<ul class="nav navbar-nav">
									<li><a href="#">Home</a></li>
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">Women <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="#">Skirt</a></li>
											<li><a href="#">Bikini</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">Men <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="#">Jeans</a></li>
											<li><a href="#">Coat</a></li>
										</ul>
									</li>
									<li><a href="#">Shoes</a></li>
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">Bags <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="#">Balo</a></li>
											<li><a href="#">Wallet</a></li>
										</ul>
									</li>
									<li><a href="#">Toys</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
		<div id="header-mid">
			<div class="container">
				<p class="text1">iriure dolor in Hendrerit</p>
				<p class="text2">Duis autem vel eum </p>
				<button type="button">SHOP MEN</button>
			</div>
		</div>
		<div id="header-bot">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-4 ship"><span class="fa fa-truck"></span> Free Shipping on all orders over $100.</div>
					<div class="col-xs-12 col-sm-4 col-md-4 ship"><span class="glyphicon glyphicon-globe"></span> Worldwide Delivery and same day dispatch.</div>
					<div class="col-xs-12 col-sm-4 col-md-4 ship"><span class="glyphicon glyphicon-gift"></span> Receive Gifts when you 100 subscribe. </div>
				</div>
			</div>
		</div>
	</header>

	<div id="mid-content">
		<div id="post">
			<div class="container">
				<div class="col-xs-12 col-sm-12 col-md-4 mid-shoe">
					<button type="button">shoes store</button>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 mid-bag">
					<button type="button">hand bags</button>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 mid-clo">
					<button type="button">colothing</button>
				</div>
			</div>
		</div>
		<div id="mid-content">
			<div class="container">
				<div class="box">
					<p class="mid-title">clothings</p>
					<div class="clean"></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 bn-jacket">

					<div class="img-jacket">
						<div class="jacket">
							<p class="img-title">Jackets For Men</p>
							<p>-</p>
							<p class="img-content">Criminal Damage Shorts in Mesh with Stripe Denim Shorts In Slim</p>
							<button type="button">SHOP  COLLECTION</button>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 list-clothing">
					<div class="owl-carousel owl-theme owl-clothing">
						<div class="item">
							<div class="img-sp">
								<div class="saler">
									<a href="#" class="new">New</a>
									<br>
									<a href="#" class="sale">Sale</a>
									<p class="rate">-15%</p>
								</div>

								<div class="hover">
									<a href=""><span class="glyphicon glyphicon-shopping-cart"></span></a>
									<a href=""><span class="fa fa-heart-o"></span></a>
									<a href=""><span class="fa fa-exchange"></span></a>
								</div>
								<?php foreach ($result as $i => $item) { ?>
								<?php if($item->picture != ''){?>
								<img src="<?=base_url()?>uploads/<?=$item->picture?>">
								<?php } ?>


								<?php } ?>

							</div>
							<div class="name">
								<?php echo $item->name ?>
							</div>
							<div class="cost">
								<p>$<?php echo $item->price ?> <span>$700.000</span></p>
							</div>
							<div class='rating-widget'>
								<fieldset class="rating">
									<input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
									<input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
									<input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
									<input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
									<input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
									<input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
									<input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
									<input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
									<input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
									<input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
								</fieldset>
							</div>
						</div>

					</div>

				</div>


			</div>

		</div>

	</div>

	<div id="mid-content">
		<div class="container">
			<div class="box">
				<p class="mid-title">bags & shoes</p>
				<div class="clean"></div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 list-bag">
				<div class="owl-carousel owl-theme owl-shoe">
					<div class="item">
						<div class="img-sp">
							<div class="saler">
								<a href="#" class="new">New</a>
								<br>
								<a href="#" class="sale">Sale</a>
								<p class="rate">-15%</p>
							</div>

							<div class="hover">
								<a href=""><span class="glyphicon glyphicon-shopping-cart"></span></a>
								<a href=""><span class="fa fa-heart-o"></span></a>
								<a href=""><span class="fa fa-exchange"></span></a>
							</div>
							<img src="<?=base_url()?>assets/web/img/shoe1.jpg">

						</div>
						<div class="name">
							Denim Shorts in Super Skinny
						</div>
						<div class="cost">
							<p>$696,000 <span>$700.000</span></p>
						</div>
						<div class='rating-widget'>
							<fieldset class="rating">
								<input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
								<input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
								<input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
								<input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
								<input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
								<input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
								<input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
								<input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
								<input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
								<input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
							</fieldset>
						</div>
					</div>
					<div class="item">
						<div class="img-sp">
							<div class="saler">
								<a href="#" class="new">New</a>
								<br>
								<a href="#" class="sale">Sale</a>
								<p class="rate">-15%</p>
							</div>

							<div class="hover">
								<a href=""><span class="glyphicon glyphicon-shopping-cart"></span></a>
								<a href=""><span class="fa fa-heart-o"></span></a>
								<a href=""><span class="fa fa-exchange"></span></a>
							</div>
							<img src="<?=base_url()?>assets/web/img/shoe2.jpg">

						</div>
						<div class="name">
							Jersey Shorts in Mid-Length
						</div>
						<div class="cost">
							<p>$696,000 <span>$700.000</span></p>
						</div>
						<div class='rating-widget'>
							<fieldset class="rating">
								<input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
								<input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
								<input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
								<input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
								<input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
								<input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
								<input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
								<input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
								<input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
								<input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
							</fieldset>
						</div>
					</div>
				</div>

			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 bn-bag">
				<div class="owl-carousel owl-theme owl-bag">
					<div class="item">
						<div class="img-bag">
							<div class="jacket">
								<p class="img-title">handbags sale</p>
								<p>-</p>
								<p class="img-content">Criminal Damage Shorts in Mesh with Stripe Denim Shorts In Slim Print</p>
								<button type="button">SHOP  COLLECTION</button>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="img-jacket">
							<div class="jacket">
								<p class="img-title">handbags sale</p>
								<p>-</p>
								<p class="img-content">Criminal Damage Shorts in Mesh with Stripe Denim Shorts In Slim Print</p>
								<button type="button">SHOP  COLLECTION</button>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
</div>
<div id="mid-content">
	<div class="container">
		<div class="box">
			<p class="mid-title">best seller <span>Hot sale</span></p>
			<div class="clean"></div>
		</div>
		<div class="col-xs-12 col-md-12 sell">
			<div class="owl-carousel owl-theme owl-bestSeller">
				<div class="item">
					<div class="img-sp">
						<div class="saler">
							<a href="#" class="new">New</a>
						</div>
						<img src="<?=base_url()?>assets/web/img/sli1.jpg">

					</div>
					<div class="name">
						Free People Super Cycle, ersey Number Graphic
					</div>
					<div class="cost">
						<p>$696,000 <span>$700.000</span></p>
					</div>
					<div class='rating-widget'>
						<fieldset class="rating">
							<input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
							<input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
						</fieldset>
					</div>
				</div>
				<div class="item">
					<div class="img-sp">
						<div class="saler">
							<a href="#" class="sale">Sale</a>
						</div>

						<img src="<?=base_url()?>assets/web/img/sli2.jpg">

					</div>
					<div class="name">
						Three Dots 3/4 Sleeve Deep V-Neck
					</div>
					<div class="cost">
						<p>$696,000</p>
					</div>
					<div class='rating-widget'>
						<fieldset class="rating">
							<input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
							<input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
						</fieldset>
					</div>
				</div>
				<div class="item">
					<div class="img-sp">

						<img src="<?=base_url()?>assets/web/img/sli3.jpg">

					</div>
					<div class="name">
						Free People Super Cycle, ersey Number Graphic
					</div>
					<div class="cost">
						<p>$696,000 <span>$700.000</span></p>
					</div>
					<div class='rating-widget'>
						<fieldset class="rating">
							<input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
							<input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
						</fieldset>
					</div>
				</div>
				<div class="item">
					<div class="img-sp">

						<img src="<?=base_url()?>assets/web/img/sli4.jpg">

					</div>
					<div class="name">
						Three Dots 3/4 Sleeve Deep V-Neck
					</div>
					<div class="cost">
						<p>$696,000 <span>$700.000</span></p>
					</div>
					<div class='rating-widget'>
						<fieldset class="rating">
							<input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
							<input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
						</fieldset>
					</div>
				</div>
				<div class="item">
					<div class="img-sp">

						<img src="<?=base_url()?>assets/web/img/sli5.jpg">

					</div>
					<div class="name">
						Free People Super Cycle, ersey Number Graphic
					</div>
					<div class="cost">
						<p>$696,000 <span>$700.000</span></p>
					</div>
					<div class='rating-widget'>
						<fieldset class="rating">
							<input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
							<input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
						</fieldset>
					</div>
				</div>


			</div>
		</div>

	</div>
</div>
</div>
<div id="mid-content">
	<div class="container">
		<div class="box">
			<p class="mid-title">Popular blogs</p>
			<div class="clean"></div>
		</div>
		<div class="col-xs-12 col-md-12 blog">
			<div class="owl-carousel owl-theme owl-blog">
				<div class="item">
					<p class="mid-blog">Vivamus vehicula urna non leo vehicula, et auctor nisi dapibus. Aliquam enim nulla</p>
					<div class="bot-blog">
						<div class="clean2"></div>
						<div class="col-xs-12 left-blog">
							<p>March 02, 2015</p>
						</div>
						<div class="col-xs-12 right-blog">
							<a href="#">Read more</a>
						</div>
					</div>
					<img class="img-responsive" src="<?=base_url()?>assets/web/img/blog1.jpg">
				</div>
				<div class="item">
					<p class="mid-blog">Vivamus vehicula urna non leo vehicula, et auctor nisi dapibus. Aliquam enim nulla</p>
					<div class="bot-blog">
						<div class="clean2"></div>
						<div class="col-xs-12 left-blog">
							<p>March 02, 2015</p>
						</div>
						<div class="col-xs-12 right-blog">
							<a href="#">Read more</a>
						</div>
					</div>
					<img class="img-responsive" src="<?=base_url()?>assets/web/img/blog2.jpg">
				</div>
				<div class="item">
					<p class="mid-blog">Vivamus vehicula urna non leo vehicula, et auctor nisi dapibus. Aliquam enim nulla</p>
					<div class="bot-blog">
						<div class="clean2"></div>
						<div class="col-xs-12 left-blog">
							<p>March 02, 2015</p>
						</div>
						<div class="col-xs-12 right-blog">
							<a href="#">Read more</a>
						</div>
					</div>
					<img class="img-responsive" src="<?=base_url()?>assets/web/img/blog3.jpg">
				</div>
			</div>
		</div>
	</div>
</div>
<div id="advertise">
	<div class="container">
		<div class="col-xs-12 col-sm-12 col-md-12 img-qc">
			<div class="owl-carousel owl-theme owl-adv">
				<a href="#"><img src="<?=base_url()?>assets/web/img/qc.jpg"></a>
				<a href="#"><img src="<?=base_url()?>assets/web/img/qc1.jpg"></a>
				<a href="#"><img src="<?=base_url()?>assets/web/img/qc2.jpg"></a>
				<a href="#"><img src="<?=base_url()?>assets/web/img/qc3.jpg"></a>
			</div>
		</div>

	</div>

</div>
<div id="footer-cont">
	<div class="container">
		<div class="col-xs-12 col-sm-12 col-md-3 describe">
			<div class="bot-logo"><a href="#"><img src="<?=base_url()?>assets/web/img/qc4.jpg"></a></div>
			<p>Vestibulum sagittis, nisl nec pellentesque suscipit, arcu nisi maximus neque, vitae finibus erat odio eu lacus. Curabitur malesuada erat eros, quis dignissim dui accumsan id. Cras non imperdiet metus.
			</p>
			<div class="read"><a href="#">Continus Reading >></a></div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 references">
			<div class="custom">
				<p>Customer service</p>
			</div>
			<div class="list-refer">
				<a href="#" class="foot-refer">- Shipping Policy</a>
				<a href="#" class="foot-refer">- Compensation Fist</a>
				<a href="#" class="foot-refer">- My Account</a>
				<a href="#" class="foot-refer">- Return Policy</a>
				<a href="#" class="foot-refer">- Contact Us</a>
			</div>
			<script>
				var acc = document.getElementsByClassName("custom");
				var i;

				for (i = 0; i < acc.length; i++) {
					acc[i].onclick = function() {
						this.classList.toggle("active");
						var panel = this.nextElementSibling;
						if (panel.style.display === "block") {
							panel.style.display = "none";
						} else {
							panel.style.display = "block";
						}
					}
				}
			</script>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 references">
			<div class="custom">
				<p>Payment & Shipping</p>
			</div>
			<div class="list-refer">
				<a href="#" class="foot-refer">- Term of Use</a>
				<a href="#" class="foot-refer">- Payment Methods</a>
				<a href="#" class="foot-refer">- Shipping Guide</a>
				<a href="#" class="foot-refer">- Locations We Ship To</a>
				<a href="#" class="foot-refer">- Estimated Delivery Time</a>
			</div>
			<script>
				var acc = document.getElementsByClassName("custom");
				var i;

				for (i = 0; i < acc.length; i++) {
					acc[i].onclick = function() {
						this.classList.toggle("active");
						var panel = this.nextElementSibling;
						if (panel.style.display === "block") {
							panel.style.display = "none";
						} else {
							panel.style.display = "block";
						}
					}
				}
			</script>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 references">
			<div class="custom">
				<p>Contact us</p>
			</div>
			<div class="contact">
				<p class="us"><span class="glyphicon glyphicon-map-marker"></span><strong> Addresss:</strong> Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>
				<p class="us"><span class="glyphicon glyphicon-envelope"></span><strong> Email:</strong> info@plazathemes.com</p>
				<p class="us"><span class="glyphicon glyphicon-earphone"></span><strong> Phone: 0987. 654. 321</strong></p>
			</div>
			<script>
				var acc = document.getElementsByClassName("custom");
				var i;

				for (i = 0; i < acc.length; i++) {
					acc[i].onclick = function() {
						this.classList.toggle("active");
						var panel = this.nextElementSibling;
						if (panel.style.display === "block") {
							panel.style.display = "none";
						} else {
							panel.style.display = "block";
						}
					}
				}
			</script>
		</div>
	</div>
</div>
</div>
<footer>
	<div id="subscribe">
		<div class="container">
			<div class="col-xs-12 col-md-5 sign-up">
				<input type="text" class="form-control newslletter" placeholder="Sign up for newslletter ">
				<button class="btn btn-secondary sign" type="button">subscribe</button>
			</div>
			<div class="col-xs-12 col-md-7 follow">
				<div class="list-follow">
					<a href="#"><img id="fb" src="https://www.w3schools.com/css/img_trans.gif"></a>
					<a href="#"><img id="twit" src="https://www.w3schools.com/css/img_trans.gif"></a>
					<a href="#"><img id="gg" src="https://www.w3schools.com/css/img_trans.gif"></a>
					<a href="#"><img id="ins" src="https://www.w3schools.com/css/img_trans.gif"></a>
					<a href="#"><img id="you" src="https://www.w3schools.com/css/img_trans.gif"></a>
					<a href="#"><img id="vibe" src="https://www.w3schools.com/css/img_trans.gif"></a>
				</div>
			</div>
		</div>
	</div>
	<div id="end">
		<p>COPYRIGHT © <span>2015 plazaTHEMES</span>.. ALL RIGHTS RESERVED</p>
	</div>
	<div id="menu-end">
		<div class="container">
			<div class="col-xs-12 col-md-7 foot-menu">
				<ul>
					<li><a href="#">Site Map</a></li>
					<li><a href="#">Search Terms</a></li>
					<li><a href="#">Advanced Search</a></li>
					<li><a href="#">Orders and Returns</a></li>
					<li><a href="#">Customer Service</a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-md-5 payment">
				<div class="img-payment">
					<a href="#"><img src="<?=base_url()?>assets/web/img/payment.jpg"></a>
					<a href="#"><img src="<?=base_url()?>assets/web/img/payment2.jpg"></a>
					<a href="#"><img src="<?=base_url()?>assets/web/img/payment3.jpg"></a>
					<a href="#"><img src="<?=base_url()?>assets/web/img/payment4.jpg"></a>
					<a href="#"><img src="<?=base_url()?>assets/web/img/payment5.jpg"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-logo">
		<img src="<?=base_url()?>assets/web/img/footer.png">
	</div>
</footer>
<div class="btnTop">
	<button onclick="topFunction()" id="btnBackToTop" title="Go to top"><i class="fa fa-sort-desc" aria-hidden="true"></i></button>

</div>

</body>

</html>
