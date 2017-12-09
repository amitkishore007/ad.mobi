<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
       
 <title>Mobicharge</title>

        <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/public/css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/public/css/font-awesome.min.css" media="all" />
        <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/public/css/animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/public/css/font-electro.css" media="all" />
        <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/public/css/owl-carousel.css" media="all" />
        <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/public/css/style.css" media="all" />
        <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/public/css/colors/black.css" media="all" />
         <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/public/css/paytm.style.css" media="all" />
         <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/public/css/config.css" media="all" /> -->
      
		
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>
	

        <link rel="shortcut icon" href="assets/images/fav-icon.png">
    </head>

    <body class="home page-template page-template-template-homepage-v3 full-color-background">
        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

            <div class="top-bar">
	<div class="container">
		<nav>
			<ul id="menu-top-bar-left" class="nav nav-inline pull-left animate-dropdown flip">
				<li class="menu-item animate-dropdown"><a title="Welcome to Worldwide Electronics Store" href="#">Mobicharge India Private Limited</a></li>
			</ul>
		</nav>

		<nav>
			<ul id="menu-top-bar-right" class="nav nav-inline pull-right animate-dropdown flip">
   				<li class="menu-item animate-dropdown"><a href="javascript:void();"> 24x7 Customer support</a></li>
   				

			
   				<?php if($this->session->userdata('is_logged_in')): ?>
   				
	   					<?php if($this->session->userdata('role')=='vandor' || $this->session->userdata('role')=='superadmin'): ?>
						
							<li class="menu-item animate-dropdown"><a href="<?php echo base_url('admin'); ?>">View dashboard</a></li>
						
						<?php else: ?>

							
							<li class="menu-item animate-dropdown"><a title="Logout" href="<?php echo base_url('logout'); ?>">
							<img src="<?php echo base_url('assets/img/logout.png'); ?>" style='float: left;height: 15px;  width: 17px; margin-right: 5px;  margin-top: 4px;'>
							Logout</a></li>
							

						<?php endif; ?>

   				<?php else: ?>

				<li class="menu-item animate-dropdown"><a title="Wallet" href="<?php echo base_url('login'); ?>"> Log In</a></li>
				/
   				<li class="menu-item animate-dropdown"><a title="Wallet" href="<?php echo base_url('login/vandor_signup'); ?>"> Signup</a></li>
   				<?php endif; ?>

				</ul>
		</nav>
	</div>
</div><!-- /.top-bar -->

            <header id="masthead" class="site-header header-v3">
    <div class="container">
        <div class="row">

            <!-- ============================================================= Header Logo ============================================================= -->

<!-- ============================================================= Header Logo : End============================================================= -->
<!-- 
<form class="navbar-search" method="GET" action="<?php echo base_url('shop/search_product'); ?>">
	<div class="input-group">
			<div class="search-input">
				<input type="text" id="search" class="form-control "  value="" name="s" placeholder="Search for products" autocomplete="off" />
				<ul id="result">
				
				</ul>
			</div>
		
		

		<div class="input-group-btn">
			<button type="submit" name='search' value='product' class="btn btn-secondary"><i class="ec ec-search"></i></button>
		</div>


	</div>
</form> -->
            

<!-- <ul class="navbar-wishlist nav navbar-nav pull-right flip">
	<li class="nav-item">
		<a href="<?php //echo base_url('shop/wishlist'); ?>" class="nav-link"><i class="ec ec-favorites"></i></a>
	</li>
</ul> -->
<!-- <ul class="navbar-compare nav navbar-nav pull-right flip">
	<li class="nav-item">
		<a href="compare.html" class="nav-link"><i class="ec ec-compare"></i></a>
	</li>
</ul> -->
        </div><!-- /.row -->
    </div>
</header><!-- #masthead -->


</nav><!-- /.navbar -->