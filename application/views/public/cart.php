<div class="main-container container">
		
		
		<div class="row">
		<!--Middle Part Start-->
       
    <!-- Cart start -->

    <div id="content" class="site-content" tabindex="-1">
  <div class="container">

    <nav class="woocommerce-breadcrumb">&nbsp;</nav>

    <div id="primary" class="content-area">
      <main id="main" class="site-main">
        <article class="page type-page status-publish hentry">
         
          <header class="entry-header"><h1 itemprop="name" class="entry-title">Cart</h1></header><!-- .entry-header -->

         <?php if(isset($cart_items) && count($cart_items)): ?>
          <form>

    <table class="shop_table shop_table_responsive cart">
        <thead>
            <tr>
                <th class="product-remove">&nbsp;</th>
                <th class="product-thumbnail">&nbsp;</th>
                <th class="product-name">Product</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-subtotal">Total</th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($cart_items as $item): ?>
            <tr class="cart_item row_<?php echo $item['rowid'] ?>" >

                <td class="product-remove">
                    <a class="remove removeProduct" href="javascript:void(0);" data-producthash='<?php echo $item['rowid']; ?>'>×</a>
                </td>

                <td class="product-thumbnail">
                    <a href="<?php echo base_url('shop/quickview/'.$item['id']); ?>">
                      <?php if(isset($item['thumbnail'])): ?>
                      <?php if($item['upload_type']=='excel'): ?>
                                    <img width="180" height="180" src="<?php echo $item['thumbnail']; ?>" alt="">
                      <?php else: ?>
                                    <img width="180" height="180" src="<?php echo base_url('uploads/'.$item['thumbnail']); ?>" alt="">

                      <?php endif; ?>
	                  <?php else: ?>
                                    <img width="180" height="180" src="<?php echo base_url('assets/img/placeholder.jpg'); ?>" alt="">

                      <?php endif; ?>
                    <!-- <img width="180" height="180" src="assets/images/products/2.jpg" alt=""> -->

                    </a>
                </td>

                <td data-title="Product" class="product-name">
                    <a href="<?php echo base_url('shop/quickview/'.$item['id']); ?>"><?php echo ucwords($item['name']); ?></a>
                </td>

                <td data-title="Price" class="product-price">
                    <span class="amount"> Rs.<?php echo $item['price']; ?></span>
                </td>

                <td data-title="Quantity" class="product-quantity">
                    <div class="quantity buttons_added"><input type="button" class="minus" value="-" data-productId='<?php echo $item['id']; ?>' data-productHash ='<?php echo $item['rowid']; ?>'>
                        <label>Quantity:</label>
                        <input type="number" size="4" class="input-text qty text" title="Qty" value="<?php echo $item['qty']; ?>" name="cart[92f54963fc39a9d87c2253186808ea61][qty]" max="29" min="0" step="1"  >
                        <input type="button" class="plus" value="+" data-productId='<?php echo $item['id']; ?>' data-productHash ='<?php echo $item['rowid']; ?>'>
                    </div>
                </td>

                <td data-title="Total" class="product-subtotal">
                    <span class="amount" id='price_<?php echo $item['rowid']; ?>'> Rs.<?php echo $item['subtotal']; ?></span>
                </td>
            </tr>
<?php endforeach; ?>
            
        </tbody>
    </table>
</form>
          <div class="cart-collaterals">

    <div class="cart_totals ">

        <h2>Cart Totals</h2>

        <table class="shop_table shop_table_responsive">

            <tbody>
                <tr class="cart-subtotal">
                    <th>Subtotal</th>
                    <td data-title="Subtotal"><span class="amount cart-price"> Rs.3,299.00</span></td>
                </tr>


                <tr class="shipping">
                    <th>Shipping</th>
                    <td data-title="Shipping"><!-- Flat Rate: <span class="amount"> Rs.300.00</span> <input type="hidden" class="shipping_method" value="international_delivery" id="shipping_method_0" data-index="0" name="shipping_method[0]">

                        <form method="post" action="http://transvelo.github.io/electro-html/cart.html" class="woocommerce-shipping-calculator">

                            <p><a data-toggle="collapse" aria-controls="calculator" href="#calculator" aria-expanded="false" class="shipping-calculator-button">Calculate Shipping</a></p>

                            <div id="calculator" class="shipping-calculator-form collapse">
                                <p id="calc_shipping_country_field" class="form-row form-row-wide">
                                    <select rel="calc_shipping_state" class="country_to_state" id="calc_shipping_country" name="calc_shipping_country">
                                        <option value="">Select a country…</option>
                                       
                                    </select>
                                </p>

                                <p id="calc_shipping_state_field" class="form-row form-row-wide validate-required">
                                    <span>
                                        <select id="calc_shipping_state" name="calc_shipping_state"><option value="">Select an option…</option></select>
                                    </span>
                                </p>

                                <p id="calc_shipping_postcode_field" class="form-row form-row-wide validate-required">
                                    <input type="text" id="calc_shipping_postcode" name="calc_shipping_postcode" placeholder="Postcode / ZIP" value="" class="input-text">
                                </p>

                                <p><button class="button" value="1" name="calc_shipping" type="submit">Update Totals</button></p>

                                <input type="hidden" value="1eafc42c5e" name="_wpnonce"><input type="hidden" value="/electro/cart/" name="_wp_http_referer">
                            </div>
                        </form> -->
                    </td>
                </tr>

                <tr class="order-total">
                    <th>Total</th>
                    <td data-title="Total"><strong><span class="amount cart-price"> Rs.3,599.00</span></strong> </td>
                </tr>
            </tbody>
        </table>

        <div class="wc-proceed-to-checkout">

            <a class="checkout-button button alt wc-forward" href="checkout.html">Proceed to Checkout</a>
        </div>
    </div>
</div>
        </article>
      <?php else: ?>
        <div class="row no-cart-content">
          <div class="col-md-12">
            
          <div class="alert alert-default text-center">
            <h3 class='text-center'>No products in your cart </h3>
            <h4 class='text-center'><a href="<?php echo base_url('shop'); ?>">Shop Here</a></h4>
          </div>
          </div>
        </div>

      <?php endif; ?>
      </main><!-- #main -->
    </div><!-- #primary -->
  </div><!-- .container -->
</div><!-- #content -->

    <!-- Cart start:end -->
        <!--Middle Part End -->
			
		</div>
	</div>