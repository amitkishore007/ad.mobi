<div class="container">
    <nav class="woocommerce-breadcrumb" >
     
    </nav><!-- .woocommerce-breadcrumb -->
  </div><!-- .col-full -->
<div class="container">
  <div class="row">


    
      	<div class="col-md-3 col-lg-3">
          <?php $this->load->view('includes/my_account_sidebar'); ?>
      	</div>


      	<div class="col-md-9 col-lg-9">
<!-- <div class="wishlist-title "> -->
                                <h3>My wishlist</h3>
                            <!-- </div> -->
                            <table data-token="" data-id="" data-page="1" data-per-page="5" data-pagination="no" class="shop_table cart wishlist_table">

                                <thead>
                                    <tr>

                                        <th class="product-remove"></th>

                                        <th class="product-thumbnail"></th>

                                        <th class="product-name">
                                            <span class="nobr">Product Name</span>
                                        </th>

                                        <th class="product-price">
                                            <span class="nobr">Unit Price</span>
                                        </th>
                                        <th class="product-stock-stauts">
                                            <span class="nobr">Stock</span>
                                        </th>

                                        <th class="product-add-to-cart"></th>

                                    </tr>
                                </thead>

                                <tbody>
                                <?php if(isset($my_wishlist)): ?>
                                  <?php foreach ($my_wishlist as $wish): ?>
                                    <tr>
                                        <td class="product-remove">
                                            <div>
                                                <a title="Remove this product" class="remove remove_from_wishlist" href="javascript::void(0);">×</a>
                                            </div>
                                        </td>

                                        <td class="product-thumbnail">
                                            <a href="<?php echo base_url('shop/quickview/'.$wish->product_id); ?>">
                                            <?php if(isset($wish->thumbnail)): ?>
                                             <?php if ($wish->upload_type=='excel'): ?>
                                             
                                                <img width="180" height="180" alt="1" class="wp-post-image" src="<?php echo $wish->thumbnail; ?>">
                                               <?php else: ?>
                                                <img width="180" height="180" alt="1" class="wp-post-image" src="<?php echo base_url('uploads/'.$wish->thumbnail); ?>">
                                             
                                             <?php endif; ?>
                                           <?php else: ?>
                                                <img width="180" height="180" alt="1" class="wp-post-image" src="<?php echo base_url('assets/img/placeholder.jpg'); ?>">
                                            <?php endif; ?>
                                            </a>
                                        </td>

                                        <td class="product-name">
                                            <a href="<?php echo base_url('shop/quickview/'.$wish->product_id); ?>"><?php echo htmlentities($wish->title); ?></a>
                                        </td>

                                        <td class="product-price">
                                            <span class="electro-price"><span class="amount"> Rs.<?php echo $wish->price; ?></span></span>
                                        </td>

                                        <td class="product-stock-status">
                                            <span class="in-stock"><?php echo $wish->quantity>0 ? 'In stock': "Out of stock"; ?></span>
                                        </td>

                                        <td class="product-add-to-cart">
                                            <!-- Date added -->

                                            <!-- Add to cart button -->
                                            <?php if($wish->quantity>0): ?>
                                                <a href="javascript::void(0);" data-productId='<?php echo $wish->product_id; ?>' data-type='normal' data-productQty='1' class="button addToCart"> Add to Cart</a>
                                            <?php endif; ?>
                                            <!-- Change wishlist -->

                                            <!-- Remove from wishlist -->
                                        </td>
                                    </tr>
                                      <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="6"></td>
                                    </tr>
                                </tfoot>

                            </table>
  </div>
  </div>
</div>