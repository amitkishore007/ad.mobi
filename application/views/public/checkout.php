	<!-- checkout:start -->

	<div id="content" class="site-content" tabindex="-1">
	<div class="container">

		<nav class="woocommerce-breadcrumb"><!-- <a href="">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Checkout --></nav>

		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<article class="page type-page status-publish hentry">
					<header class="entry-header"><h1 itemprop="name" class="entry-title">Checkout</h1></header><!-- .entry-header -->

					<form enctype="multipart/form-data" action="#" class="checkout woocommerce-checkout" method="post" name="checkout">
	<div id="customer_details" class="col2-set">
		<div class="col-1">
			<div class="woocommerce-billing-fields">

				<h3>Billing Details</h3>

				<p id="billing_first_name_field" class="form-row form-row form-row-first validate-required"><label class="" for="billing_first_name">First Name <abbr title="required" class="required">*</abbr></label>
				<input type="text"  value="<?php echo isset($myinfo) ? $myinfo->username : ''; ?>" placeholder="" id="billing_first_name" name="fname" class="input-text ">
				<span class="text-danger error fname-error"></span>

				</p>

				<p id="billing_last_name_field" class="form-row form-row form-row-last validate-required"><label class="" for="billing_last_name">Last Name <abbr title="required" class="required">*</abbr></label>
				<input type="text" value="" placeholder="" id="billing_last_name" name="lname" class="input-text ">
				<span class="text-danger error lname-error"></span>

				</p><div class="clear"></div>

			<!-- 	<p id="billing_company_field" class="form-row form-row form-row-wide"><label class="" for="billing_company">Company Name</label>
				<input type="text" value="" placeholder="" id="billing_company" name="billing_company" class="input-text ">

				</p> -->

				<p id="billing_email_field" class="form-row form-row form-row-first validate-required validate-email"><label class="" for="billing_email">Email Address <abbr title="required" class="required">*</abbr></label>
				<input type="email" value="<?php echo isset($myinfo) ? $myinfo->email : ''; ?>" placeholder="" id="billing_email" name="email" class="input-text ">
				 <span class="text-danger error email-error"></span>
				</p>

				<p id="billing_phone_field" class="form-row form-row form-row-last validate-required validate-phone"><label class="" for="billing_phone">Phone <abbr title="required" class="required">*</abbr></label>
				<input type="tel" value="<?php echo isset($myinfo) ? $myinfo->phone : ''; ?>" placeholder="" id="billing_phone" name="phone" class="input-text ">
				 <span class="text-danger error phone-error"></span>

				</p><div class="clear"></div>

				<p id="billing_country_field" class="form-row form-row form-row-wide validate-required validate-email"><label class="" for="billing_country">Country <abbr title="required" class="required">*</abbr></label>
				<input type="text" value="<?php echo isset($myinfo) ? $myinfo->country : ''; ?>" placeholder="" id="billing_country" name="country" class="input-text ">
				<span class="text-danger error country-error"></span>

				</p><div class="clear"></div>
				<p id="billing_state_field" class="form-row form-row form-row-first validate-required validate-email"><label class="" for="billing_state">State<abbr title="required" class="required">*</abbr></label>
				<input type="text" value="<?php echo isset($myinfo) ? $myinfo->state : ''; ?>" placeholder="" id="billing_state" name="state" class="input-text ">
				<span class="text-danger error state-error"></span>
				</p>	
				<p id="billing_city_field" class="form-row form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required"><label class="" for="billing_city">Town / City <abbr title="required" class="required">*</abbr></label>
				<input type="text" value="<?php echo isset($myinfo) ? $myinfo->city : ''; ?>" placeholder="" id="billing_city" name="city" class="input-text ">
				 <span class="text-danger error city-error"></span>
				</p>

				<p id="billing_address_1_field" class="form-row form-row form-row-wide address-field validate-required"><label class="" for="billing_address_1">Address <abbr title="required" class="required">*</abbr></label>
				<input type="text" value="<?php echo isset($myinfo) ? $myinfo->address : ''; ?>" placeholder="Street address" id="billing_address_1" name="address" class="input-text ">
				 <span class="text-danger error address-error"></span>
				</p>

				<p id="billing_address_2_field" class="form-row form-row form-row-wide address-field">
				<input type="text" value="" placeholder="Apartment, suite, unit etc. (optional)" id="billing_address_2" name="address2" class="input-text ">
				 <span class="text-danger error sub-addr-error"></span>
				</p>

				

		
				<p id="billing_postcode_field" class="form-row form-row form-row-last address-field validate-postcode validate-required" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode"><label class="" for="billing_postcode">Postcode / ZIP <abbr title="required" class="required">*</abbr></label>
				<input type="text" value="<?php echo isset($myinfo) ? $myinfo->zipcode : ''; ?>" placeholder="" id="billing_postcode" name="pincode" class="input-text ">

				<span class="text-danger error pincode-error"></span>

				</p>

				<div class="clear"></div>
				<?php if(!$this->session->userdata('is_logged_in')): ?>
				<p class="form-row form-row-wide create-account"><input type="checkbox" value="1" name="createaccount" id="createaccount" class="input-checkbox" > <label class="checkbox" for="createaccount">Create an account?</label></p>
				<?php endif; ?>
				<div class="checkout-password-div">
					<p id="password_field" class="form-row form-row form-row-last password_field password_field validate-required" data-o_class="form-row form-row form-row-last address-field validate-required password_field"><label class="" for="password_field">Password <abbr title="required" class="required">*</abbr></label>
				<input type="password" value="" placeholder="Password" id="checkout-pass" name="checkout-pass" class="input-text ">

				<span class="text-danger error password-error"></span>

				</p>

				<p id="retypepassword_field" class="form-row form-row form-row-last retypepassword_field password_field validate-required" data-o_class="form-row form-row form-row-last address-field validate-required retypepassword_field"><label class="" for="retypepassword_field">Retype Password <abbr title="required" class="required">*</abbr></label>
				<input type="password" value="" placeholder="Retype password" id="checkout-retypepass" name="checkout-pass" class="input-text ">

				<span class="text-danger error retype-error"></span>

				</p>
				</div>

			</div>
		</div>

		<div class="col-2">
			<h3>Shipping Details</h3>
			<div class="woocommerce-shipping-fields">
				<!-- <h3 id="ship-to-different-address">
					<label class="checkbox" for="ship-to-different-address-checkbox">Ship to a different address?</label>
					<input type="checkbox" value="1" name="ship_to_different_address" class="input-checkbox" id="ship-to-different-address-checkbox">
				</h3>
 -->
				<p id="order_comments_field" class="form-row form-row notes"><label class="" for="order_comments">Order Notes</label><textarea cols="5" rows="2" placeholder="Notes about your order, e.g. special notes for delivery." id="order_comments" class="input-text " name="order_note"></textarea>
					<span class="text-danger error order-note-error"></span>	
				</p>
			</div>
		</div>
	</div>

	<h3 id="order_review_heading">Your order</h3>

	<div class="woocommerce-checkout-review-order" id="order_review">
		<table class="shop_table woocommerce-checkout-review-order-table">
			<thead>
				<tr>
					<th class="product-name">Product</th>
					<th class="product-total">Total</th>
				</tr>
			</thead>
			<tbody>
			 <?php if(isset($cart_items)): ?>
			 	<?php foreach ($cart_items as $item): ?>
				<tr class="cart_item">
					<td class="product-name">
						<?php echo $item['name'] ?>
						<strong class="product-quantity">× <?php  echo $item['qty']; ?></strong>													</td>
					<td class="product-total">
						<span class="amount"> Rs.<?php echo $item['subtotal']; ?></span>
					</td>
				</tr>
				<?php  endforeach; ?>
			<?php endif; ?>
				
			</tbody>
			<tfoot>

				<tr class="cart-subtotal">
					<th>Subtotal</th>
					<td><span class="amount"> Rs.<?php echo $item['subtotal']; ?></span></td>
				</tr>

				<!-- <tr class="shipping">
					<th>Shipping</th>
					<td data-title="Shipping">Flat Rate: <span class="amount"> Rs.300.00</span> <input type="hidden" class="shipping_method" value="international_delivery" id="shipping_method_0" data-index="0" name="shipping_method[0]"></td>
				</tr> -->

				<tr class="order-total">
					<th>Total</th>
					<td><strong><span class="amount"> Rs.<?php echo $total_cart_price; ?></span></strong> </td>
				</tr>
			</tfoot>
		</table>

		<div class="woocommerce-checkout-payment" id="payment">
			<div class="overlay-div"></div>
			<ul class="wc_payment_methods payment_methods methods checkout-payment-method">
				<li class="wc_payment_method payment_method_bacs">
					<input type="radio" data-order_button_text="" checked="checked" value="debit" name="payment_method" class="input-radio" id="payment_method_bacs">
					<label for="payment_method_bacs">Debit card</label>
					<div class="payment_box payment_method_bacs">
						<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
					</div>
				</li>
				<?php if($this->session->userdata('is_logged_in') && $this->session->userdata('role')=='user'): ?> 
				<li class="wc_payment_method payment_method_cheque">
					<input type="radio" data-order_button_text="" value="wallet" name="payment_method" class="input-radio" id="payment_method_cheque">
					<label for="payment_method_cheque">Mobicharge wallet 	<span class="text-danger wallet-error"></span></label>
					<div style="display:none;" class="payment_box payment_method_cheque">
						<p>User the mobicharge wallet to place the order. </p>
					</div>
				</li>
			<?php  endif; ?>

				<li class="wc_payment_method payment_method_cod">
					<input type="radio" data-order_button_text="" value="cod" name="payment_method" class="input-radio" id="payment_method_cod">

					<label for="payment_method_cod">Cash on Delivery</label>
					<div style="display:none;" class="payment_box payment_method_cod">
						<p>Pay with cash upon delivery.</p>
					</div>
				</li>
				<li class="wc_payment_method payment_method_cod">
					<input type="radio" data-order_button_text="" value="online" name="payment_method" class="input-radio" id="payment_method_online">

					<label for="payment_method_online">Online payment</label>
					<div style="display:none;" class="payment_box payment_method_cod">
						<p>Pay online.</p>
					</div>
				</li>
				
			</ul>
			<div class="form-row place-order">

			   <!--  <p class="form-row terms wc-terms-and-conditions">
					<input type="checkbox" id="terms" name="terms" class="input-checkbox">
			        <label class="checkbox" for="terms">I’ve read and accept the <a target="_blank" href="terms-and-conditions.html">terms &amp; conditions</a> <span class="required">*</span></label>
			        <input type="hidden" value="1" name="terms-field">
			    </p> -->
				<p class='text-danger check-error'></p>
				<input type="submit" id="place_order" data-value="Place order" value="Place order" class="button alt">
			</div>
		</div>
	</div>
</form>
				</article>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .container -->
</div><!-- #content -->



	<!-- checkout:end -->