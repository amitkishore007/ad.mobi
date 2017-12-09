<div class="container">
    <nav class="woocommerce-breadcrumb" >
     
    </nav><!-- .woocommerce-breadcrumb -->
  </div><!-- .col-full -->
<div class="container">
<div class="row">


  
    	<div class="col-md-3 col-lg-3">
        <?php $this->load->view('includes/my_account_sidebar'); ?>
    	</div>
      <?php $status_orders = array('pending','new_order','packed'); ?>


    	<div class="col-md-6 col-lg-6">
         <h3 class="text-center">My Orders</h3>
         
         <?php if(isset($my_orders)): ?>
          <?php foreach ($my_orders as $order): ?>
          <div style="border: 1px solid #ccc; margin-bottom: 50px;" class="order-parent-div">
         <div class="order-id-div">order id: #<?php echo $order->cart_id; ?></div>
            <!-- this order id is the cart table id -->
            
          <div style="margin: 15px 30px;  float: left;">
            <?php if(isset($order->thumbnail)): ?>
                <?php if($order->upload_type=='excel'): ?>
                  
                <img  class='my-order-img' src="<?php echo $order->thumbnail; ?>" height='80'>
                <?php else: ?>
                <img class='my-order-img'  src="<?php echo base_url('uploads/'.$order->thumbnail); ?>" height='80'>

                <?php endif; ?>
              <?php else: ?>
              <img  class='my-order-img' src="<?php base_url('assets/img/placeholder.jpg'); ?>" height="80">
            <?php endif; ?>
          </div>
          <div style="margin: 30px 0px; ">
            <p><?php echo htmlentities($order->title); ?><br/>
            <span class='product-color-span'>Color: <span style="background-color: <?php echo substr($order->color_code,0,4); ?>;"></span></span></p>
          </div>
          <p></p>
        <div class="woocommerce-checkout-review-order" id="order_review">
            <table class="shop_table woocommerce-checkout-review-order-table">
              
              <tbody>
                
                
              </tbody>
              <tfoot>

                <tr class="cart-subtotal">
                  <th>Seller:
        </th>
                  <td><span class="amount">
                    
                  <?php if(isset($order->seller_username)){
                        
                            echo htmlentities($order->seller_username);
                     } else {

                      echo ucwords($order->fname.' '.$order->lname);

                     } 
                   ?>

                  </span></td>
                </tr>
               
                
                <?php if(isset($order->delivery_date)): ?>
                  <tr class="order-total">
                    <th>Delivered Date </th>
                    <td><span class="amount"> <?php echo date('d m Y, h:i:s',strtotime($order->delivery_date)); ?></span></td>
                  </tr>
                <?php else: ?>
                  <tr class="order-total">
                    <th>Delivery status </th>
                    <td><span class="amount badge"> <?php echo $order->order_status; ?></span></td>
                  </tr>                  
                <?php endif; ?>

                <tr class="order-total">
                  <th>Total</th>
                  <td><strong><span class="amount"> Rs.<?php echo $order->subtotal; ?></span></strong> </td>
                </tr>
              </tfoot>
            </table>

            <div class="woocommerce-checkout-payment text-center" >
            <?php if(in_array($order->order_status,$status_orders)){ ?>
                <a href="javascript:void(0);" class="btn btn-default my-btn" style="width: 100%;">Cancel</a>
            <?php } elseif($order->order_status=='delivered'){ ?>
    

                <a href="javascript:void(0);" class="btn btn-default my-btn" style="width: 100%;">Return</a>
            <?php } ?>

            </div>
          </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
          <h3>No Orders</h3>
        <?php endif; ?>
  
  </div>
</div>
</div>