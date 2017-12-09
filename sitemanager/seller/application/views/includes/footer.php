
            <footer id="colophon" class="site-footer">


	<div class="footer-newsletter">
		
	</div>

	<div class="footer-bottom-widgets">

		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-7 col-md-push-5">
					
					
					<div class="columns">
						<aside id="nav_menu-3" class="widget clearfix widget_nav_menu">
							<div class="body">
								<h4 class="widget-title">Account</h4>
								<div class="menu-footer-menu-2-container">
									<ul id="menu-footer-menu-2" class="menu">
											
										<li class="menu-item animate-dropdown"><a title="Wallet" href="<?php echo base_url('login/login_vandor'); ?>"> Log In</a></li>
				<li class="menu-item animate-dropdown"><a title="Wallet" href="<?php echo base_url('login/vandor_signup'); ?>"> Signup</a></li>
									
									<li class="menu-item"><a href="<?php echo base_url('shop/payment_security'); ?>">Payment Security</a></li>
									  <li class="menu-item"><a href="<?php echo base_url('shop/recharge_policy'); ?>">Recharge</a></li>

										
									</ul>
								</div>
							</div>
						</aside>
					</div>
					<!-- /.columns -->
					<div class="columns">
						<aside id="nav_menu-2" class="widget clearfix widget_nav_menu">
							<div class="body">
								<h4 class="widget-title">Terms and conditions</h4>
								<div class="menu-footer-menu-1-container">
									<ul id="menu-footer-menu-1" class="menu">
											
									  <li class="menu-item"><a href="<?php echo base_url('shop/infringement'); ?>">Infringement</a></li>
									  
									  <li class="menu-item"><a href="<?php echo base_url('shop/return_and_cancellation'); ?>">Returns And Cancellations</a></li>
									  <li class="menu-item"><a href="<?php echo base_url('shop/return_policy'); ?>">Returns Policy</a></li>
									  <li class="menu-item"><a href="<?php echo base_url('shop/shipping_policy'); ?>">Shipping</a></li>
									  <li class="menu-item"><a href="<?php echo base_url('shop/terms_of_use'); ?>">Terms of use</a></li>
												
									</ul>
								</div>
							</div>
						</aside>
					</div><!-- /.columns -->

					<div class="columns">
						<aside id="nav_menu-4" class="widget clearfix widget_nav_menu">
							<div class="body">
								<h4 class="widget-title">Customer Care</h4>
								<div class="menu-footer-menu-3-container">
									<ul id="menu-footer-menu-3" class="menu">
										
										
										<li class="menu-item"><a href="<?php echo base_url('shop/privacy'); ?>">Privacy Policy</a></li>
										  <li class="menu-item"><a href="<?php echo base_url('shop/help_and_faq'); ?>">Help & FAQ</a></li>
									  <li class="menu-item"><a href="<?php echo base_url('shop/help_centre'); ?>">Help Centre</a></li>
									
										<li class="menu-item"><a href="<?php echo base_url('shop/contact_us'); ?>">Contact us</a></li>
										<li class="menu-item"><a href="<?php echo base_url('shop/customer_support'); ?>">Customer support</a></li>
									
									</ul>
								</div>
							</div>
						</aside>
					</div><!-- /.columns -->

				</div><!-- /.col -->

				<div class="footer-contact col-xs-12 col-sm-12 col-md-5 col-md-pull-7">
					<div class="footer-logo">
						<?php if(isset($logo)): ?>
							<img src="<?php echo base_url(); ?>uploads/<?php echo $logo->logo; ?>" >
						<?php else: ?>
							<a href="<?php echo base_url('shop'); ?>">Mobicharge logo</a>	
						<?php endif; ?>
					</div><!-- /.footer-contact -->

					<div class="footer-call-us">
						<div class="media">
							<span class="media-left call-us-icon media-middle"><i class="ec ec-support"></i></span>
							<div class="media-body">
								<span class="call-us-text">Got Questions ? Call us 24/7!</span>
								<span class="call-us-number">+91-9999291453, 8586008046</span>
							</div>
						</div>
					</div><!-- /.footer-call-us -->



				</div>


			
			</div>

			<div class="row">
			<hr/>
				<div class="col-md-12">
					<div class="privacy-policy-footer">
						<?php if(isset($privacy_policy->heading)): ?>
							<h3><?php echo $privacy_policy->heading; ?></h3>
						<?php endif ?>
						<?php if(isset($privacy_policy->content)): ?>
									<?php echo $privacy_policy->content; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="copyright-bar">
		<div class="container">
			<div class="pull-left flip copyright">&copy; <a href="javascript:void(0);">Mobicharge</a> - All Rights Reserved</div>
			<div class="pull-right flip payment">
				<div class="footer-payment-logo">
					<ul class="cash-card card-inline">
						<li class="card-item"><img src="<?php echo base_url('assets/img/payments.png'); ?>" alt=""></li>
						 <li class="card-item last-item"><img src="<?php echo base_url(); ?>assets/img/wallet-img.png" alt="" width="71"></li>
						
					</ul>
				</div><!-- /.payment-methods -->
			</div>
		</div><!-- /.container -->
	</div><!-- /.copyright-bar -->
</footer><!-- #colophon -->

        </div><!-- #page -->

         <script type="text/javascript" src="<?php echo base_url(); ?>assets/public/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/public/js/tether.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/public/js/bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/public/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/public/js/echo.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/public/js/wow.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/public/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/public/js/jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/public/js/electro.js"></script>

        <script>
        	var ajax_url = "<?php echo base_url(); ?>"
        </script>
        <script src='<?php echo base_url('assets/js/jquery.form.js'); ?>'></script>
           
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/public/js/script.js"></script>

      
           <script>
           (function($) {
               $(document).ready(function(){
                   // $(".changecolor").switchstylesheet( { seperator:"color"} );
                   $('.show-theme-options').click(function(){
                       $(this).parent().toggleClass('open');
                       return false;
                   });

                   $('#home-pages').on( 'change', function() {
                       $.ajax({
                           url : $('#home-pages option:selected').val(),
                           success:function(res) {
                               location.href = $('#home-pages option:selected').val();
                           }
                       });
                   });

                    $('#demo-pages').on( 'change', function() {
            			$.ajax({
            				url : $('#demo-pages option:selected').val(),
            				success:function(res) {
            					location.href = $('#demo-pages option:selected').val();
            				}
            			});
            		});

                    $('#header-style').on( 'change', function() {
            			$.ajax({
            				url : $('#header-style option:selected').val(),
            				success:function(res) {
            					location.href = $('#header-style option:selected').val();
            				}
            			});
            		});

                    $('#shop-style').on( 'change', function() {
            			$.ajax({
            				url : $('#shop-style option:selected').val(),
            				success:function(res) {
            					location.href = $('#shop-style option:selected').val();
            				}
            			});
            		});

                    $('#product-category-col').on( 'change', function() {
            			$.ajax({
            				url : $('#product-category-col option:selected').val(),
            				success:function(res) {
            					location.href = $('#product-category-col option:selected').val();
            				}
            			});
            		});

                    $('#single-products').on( 'change', function() {
            			$.ajax({
            				url : $('#single-products option:selected').val(),
            				success:function(res) {
            					location.href = $('#single-products option:selected').val();
            				}
            			});
            		});

                    $('.style-toggle').on( 'click', function() {
            			$(this).parent('.config').toggleClass( 'open' );
            		});
               });
        })(jQuery);
        </script>
   
    </body>


</html>
