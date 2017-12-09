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
   				<li class="menu-item animate-dropdown"><a title="Wallet" href="<?php echo base_url('shop/wallet'); ?>"><img src="<?php echo base_url(); ?>assets/img/wallet.png" style="float: left;height: 15px;  width: 17px; margin-right: 5px;  margin-top: 4px;"> Wallet</a></li>

				<li class="menu-item animate-dropdown"><a title="Shop" href="<?php echo base_url('shop/home'); ?>"><i class="ec ec-shopping-bag"></i>Shop</a></li>
			
   				<?php if($this->session->userdata('is_logged_in')): ?>
   				
	   					<?php if($this->session->userdata('role')=='vandor' || $this->session->userdata('role')=='superadmin'): ?>
						
							<li class="menu-item animate-dropdown"><a href="<?php echo base_url('admin'); ?>">View dashboard</a></li>
						
						<?php else: ?>

							<li class="menu-item animate-dropdown"><a title="My Account" href="<?php echo base_url('shop/my_account'); ?>"><i class="ec ec-user"></i>My Account</a></li>
							<li class="menu-item animate-dropdown"><a title="Logout" href="<?php echo base_url('logout'); ?>">
							<img src="<?php echo base_url('assets/img/logout.png'); ?>" style='float: left;height: 15px;  width: 17px; margin-right: 5px;  margin-top: 4px;'>
							Logout</a></li>
							

						<?php endif; ?>

   				<?php else: ?>

				<li class="menu-item animate-dropdown"><a title="Wallet" href="<?php echo base_url('login'); ?>"> Log In</a></li>
				<li class="menu-item animate-dropdown"><a title="Wallet" href="<?php echo base_url('login/signup'); ?>"> Signup</a></li>
   				<li class="menu-item animate-dropdown"><a title="Wallet" href="<?php echo base_url('login/vandor_signup'); ?>"> Sale with us</a></li>
   				<?php endif; ?>

				</ul>
		</nav>
	</div>
</div><!-- /.top-bar -->

            <header id="masthead" class="site-header header-v3">
    <div class="container">
        <div class="row">

            <!-- ============================================================= Header Logo ============================================================= -->
<div class="header-logo">

	<a href="<?php  echo base_url('shop'); ?>" class="header-logo-link">
		<?php if(isset($logo)): ?>
			<img src="<?php echo base_url(); ?>uploads/<?php echo $logo->logo; ?>" >
		<?php else: ?>
			<a href="<?php echo base_url('shop'); ?>">Mobicharge logo</a>	
		<?php endif; ?>
	</a>
</div>
<!-- ============================================================= Header Logo : End============================================================= -->

            <form class="navbar-search" method="GET" action="<?php echo base_url('shop/search_product'); ?>">
	<label class="sr-only screen-reader-text" for="search">Search for:</label>
	<div class="input-group">
			<div class="search-input">
				<input type="text" id="search" class="form-control search-field search-product" dir="ltr" value="" name="s" placeholder="Search for products" autocomplete="off" />
				<ul id="result">
				
				</ul>
			</div>
		
		<div class="input-group-addon search-categories">
			<select name="category" id='product_cat' class='postform resizeselect search-category' >
				<option value="">All Categories</option>
				<?php if(isset($category_search_left)): ?>
					<?php foreach ($category_search_left as $category) : ?>
							<?php echo $category; ?>
					<?php endforeach; ?>
				<?php endif; ?>		
			</select>
		</div>

		<div class="input-group-btn">
			<button type="submit" name='search' value='product' class="btn btn-secondary"><i class="ec ec-search"></i></button>
		</div>


	</div>
</form>
            <ul class="navbar-mini-cart navbar-nav animate-dropdown nav pull-right flip">
	<li class="nav-item dropdown">
		<a href="<?php echo base_url('cart'); ?>" class="nav-link" data-toggle="dropdown">
			<i class="ec ec-shopping-bag"></i>
			<span class="cart-items-count count cart-count"><?php echo isset($total_cart_items) ? $total_cart_items : 0 ; ?></span>
			<span class="cart-items-total-price total-price cart-price"><span class="amount">Rs.<?php echo isset($total_cart_price) ? $total_cart_price : 0; ?></span></span>
		</a>
		<ul class="dropdown-menu dropdown-menu-mini-cart">
			<li>
				<div class="widget_shopping_cart_content  mini-cart-wrap">

	<?php if(isset($cart_items) && !empty($cart_items)): ?>
					<ul class="cart_list product_list_widget">
					<?php foreach ($cart_items as $item) : ?>
						<li class="mini_cart_item row_<?php echo $item['rowid']; ?>" >
							<a title="Remove this item" class="remove removeProduct" data-productHash='<?php echo $item['rowid'];  ?>' data-productId='<?php echo $item['id']; ?>' data-productName='<?php echo $item['name']; ?>' data-productThumb='<?php echo base_url(); ?>uploads/<?php echo $item['thumbnail']; ?>' href="javascript:void(0);">×</a>
							<a href="<?php echo base_url('shop/quickview/'.$item['id']); ?>">
							
							<?php if (isset($item['thumbnail'])): ?>
								<?php  if($item['upload_type']=='excel'): ?>
									<img data-echo="<?php echo $item['thumbnail']; ?>" class='attachment-shop_thumbnail size-shop_thumbnail wp-post-image'>
								<?php else: ?>
									
									<img data-echo="<?php echo base_url(); ?>uploads/<?php echo $item['thumbnail']; ?>" class='attachment-shop_thumbnail size-shop_thumbnail wp-post-image'>
								<?php endif; ?>
									
									<?php else: ?>
								
									<img data-echo="<?php echo base_url(); ?>assets/img/placeholder.jpg" class='attachment-shop_thumbnail size-shop_thumbnail wp-post-image'>
							<?php endif; ?>
							
							</a>

							<span class="quantity"><?php echo $item['qty']; ?> × <span class="amount">Rs.<?php echo $item['subtotal']; ?></span></span>
						</li>
					<?php endforeach; ?>

					</ul><!-- end product list -->

		<?php else: ?>
			<span class='text-center'> Nothing in your shopping cart</span>
		<?php endif; ?>

					<p class="total"><strong>Subtotal:</strong> <span class="amount">Rs.<?php echo $total_cart_price; ?></span></p>


					<p class="buttons">
						<a class="button wc-forward" href="<?php echo base_url('cart'); ?>">View Cart</a>
						<a class="button checkout wc-forward" href="<?php echo base_url('shop/checkout'); ?>">Checkout</a>
					</p>


				</div>
			</li>
		</ul>
	</li>
</ul>

<ul class="navbar-wishlist nav navbar-nav pull-right flip">
	<li class="nav-item">
		<a href="<?php echo base_url('shop/wishlist'); ?>" class="nav-link"><i class="ec ec-favorites"></i></a>
	</li>
</ul>
<!-- <ul class="navbar-compare nav navbar-nav pull-right flip">
	<li class="nav-item">
		<a href="compare.html" class="nav-link"><i class="ec ec-compare"></i></a>
	</li>
</ul> -->
        </div><!-- /.row -->
    </div>
</header><!-- #masthead -->

<nav class="navbar navbar-primary navbar-full yamm">
	<div class="container">
		<div class="clearfix">
			<button class="navbar-toggler hidden-sm-up pull-right flip" type="button" data-toggle="collapse" data-target="#header-v3">
&#9776;			</button>
		</div>

		<div class="collapse navbar-toggleable-xs" id="header-v3">
			<ul class="nav navbar-nav">
			<?php if(count($categories)): ?>
																
				<?php foreach($categories as $category):  ?>
					<?php if($category['parent_id']==0): ?>
							<li class="menu-item animate-dropdown"><a title="<?php echo $category['name']; ?>" href="<?php echo base_url('shop/category/'.$category['id']); ?>"><?php echo $category['name']; ?></a></li>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
			</ul>
		</div><!-- /.collpase -->
	</div>
</nav><!-- /.-container -->
</nav><!-- /.navbar -->