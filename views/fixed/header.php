<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="../../assets/images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">

                                <?php if(isset($_SESSION['user'])) : ?>
                                    <li><a href="index.php?page=cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								    <li><a href="models/users/logout.php"><i class="fa fa-lock"></i> Logout </a></li>
                                <?php else : ?>
                                    <li><a href="index.php?page=login"><i class="fa fa-lock"></i> Login</a></li>
                                <?php endif ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php?page=home">Shop</a></li>
								<li><a href="index.php?page=contact-us">Contact</a></li>
                                <?php if(isset($_SESSION['admin'])): ?>
                                <li><a href="index.php?page=admin">Admin panel</a></li>
                                <?php endif; ?>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->