<!DOCTYPE html>
<html lang="">
	<head>
		<title>Book Store</title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
		<!--Customer CSS -->
		<link href="css/style.css" rel="stylesheet" media="screen">
	</head>

	<body>
		<header><!--start header-->
			<div class="container"><!--start top header-->
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-4">
							<div class="logo text-left">
								<a href="index.php"> <img src="img/logo.png" alt="Book Store" /></a>
							</div>
						</div>
						<div class="col-md-4">
							<div class="search-w">
								<div class="input-group">
									<input type="text" class="form-control">
									<span class="input-group-btn">
										<button class="btn btn-success" type="button">
											<i class ="glyphicon glyphicon-search"> Search</i>
										</button>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="pull-right">
								<div class ="cart-w">
									<span>
										<i class="glyphicon glyphicon-shopping-cart"></i>
										<strong> Your cart</strong><br/>
										<strong>$125.0 </strong>
										<button type="button" class="btn btn-success btn-sm">Checkout</button>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!--end top header-->

			<div class="head-nav">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<hr/>
							<ul class="nav nav-pills">
								<li class="active">
									<a href="#">Home</a>
								</li>
								<li class="dropdown">
									<a href="#" class="drop-down-toggle" data-toggle="dropdown">
										Products
									</a>
									<ul class="dropdown-menu">
										<li><a href="#">New product</a></li>
										<li><a href="#">Top product</a></li>
									</ul>
								</li>
								<li><a href="#">News</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
							<hr/>
						</div>
					</div>
				</div>
			</div><!--end head nav-->
		</header><!--end header-->

		<section class="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							</ol>
							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item active">
									<img src="img/banner1.jpg" alt="Banner 1">
									<div class="carousel-caption">
										<h3>Demo banner</h3>
										<p>Caption your book here!</p>
									</div>
								</div>
								<div class="item">
									<img src="img/banner2.jpg" alt="Banner 2">
									<div class="carousel-caption">
										<h3>Demo banner</h3>
										<p>Caption your book here!</p>
									</div>
								</div>
								<div class="item">
									<img src="img/banner3.jpg" alt="Banner 3">
									<div class="carousel-caption">
										<h3>Demo banner</h3>
										<p>Caption your book here!</p>
									</div>
								</div>
							</div>
							<!-- Controls -->
							<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							</a>
						</div>
					</div>
				</div>
			</div><!--end container-->
		</section><!--end .banner-->
	    <div class="container">

	        <div class="row">
	            <div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
						    <h3 class="panel-title"><strong>Catagories</strong></h3>
						</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li class="active"><a href="#">Children</a></li>
								<li><a href="#">Science</a></li>
								<li><a href="#">Fantasy</a></li>
								<li><a href="#">Mystery</a></li>
								<li><a href="#">Romance</a></li>
								<li><a href="#">Horror</a></li>
								<li><a href="#">Poety</a></li>
								<li><a href="#">Crime</a></li>
							</ul>
						</div>
					</div>
				</div><!--end left nav-->
	            <div class="col-md-9">
	                <div class="thumbnail">
	                    <img class="img-responsive text-center" src="img/banner1.png" alt="">
	                    <div class="caption-full">
	                        <h2 class="pull-right">$24.99</h2>
	                        <h1><a href="#">A wanted man</a></h1>
	                        <h3><strong>By Lee Child</strong></h3>
	                        <p>Want to make these reviews work? Check out this building a review system tutorial</a></strong> over at maxoffsky.com!</p>
	                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
	                    </div>
	                </div>
	                <div class="user-case">
	                	<div class="text-right">
							<a class="btn btn-success">Add to cart</a>
							<a class="btn btn-default">Report problem</a>
						</div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- /.container -->

	    <div class="container">
	        <hr>
	        <footer>
	            <div class="row">
	                <div class="col-lg-12">
	                    <p>Copyright &copy; Book Store 2014</a>
	                    </p>
	                </div>
	            </div>
	        </footer>
	    </div>
	    <!-- /.container -->

	    <!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>