 <div id="content" class="site-content shop-products" tabindex="-1" >
    <div class="container">

        <nav class="woocommerce-breadcrumb" ><!-- <a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Smart Phones &amp; Tablets --></nav>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">

            <?php //print_r($latest_products); ?>

                <header class="page-header">
                   
                    <p class="woocommerce-result-count"><!-- Showing 1&ndash;15 of 20 results --></p>
                </header>

                <div class="shop-control-bar">
                    <ul class="shop-view-switcher nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
                    </ul>
                    <form class="woocommerce-ordering" method="get">
                        <select name="orderby" class="orderby">
                            <option value="menu_order"  selected='selected'>Default sorting</option>
                            <option value="popularity" >Sort by popularity</option>
                            <option value="rating" >Sort by average rating</option>
                            <option value="date" >Sort by newness</option>
                            <option value="price" >Sort by price: low to high</option>
                            <option value="price-desc" >Sort by price: high to low</option>
                        </select>
                    </form>
<form class="form-electro-wc-ppp"><select name="ppp"  class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>

                </div>

                <div class="tab-content">

<div role="tabpanel" class="tab-pane active" id="grid" aria-expanded="true">



    <ul class="products columns-3">
            
        <?php if($latest_products): $i=1; ?>
            <?php foreach ($latest_products as $product): ?>
            <li class="product <?php  echo $i==1 ? 'first' : ''; ?> <?php  echo $i==3 ? 'last' : ''; ?> ">
                <div class="product-outer">
                    <div class="product-inner">
                        <span class="loop-product-categories">
                        <a href="<?php echo base_url('shop/search_product?category='.$product->category_id.'&name'); ?>" ><?php echo $product->category; ?></a></span>
                        <a href="<?php echo base_url('shop/quickview/'.$product->id); ?>">
                            <h3><?php echo $product->title; ?></h3>
                            <div class="product-thumbnail">
                           <?php if(isset($product->thumbnail)): ?>
                                <?php if ($product->upload_type=='excel'):  ?>
                                    <img data-echo="<?php echo $product->thumbnail; ?>" src="<?php echo base_url(); ?>assets/public/images/blank.gif" alt="">
                                <?php else: ?>
                                                                                
                                    <img data-echo="<?php echo base_url('uploads/'.$product->thumbnail); ?>" src="<?php echo base_url(); ?>assets/public/images/blank.gif" alt="">
                                <?php endif; ?>
                            <?php else: ?>
                                
                                    <img data-echo="<?php echo base_url('assets/img/placeholder.jpg'); ?>" src="<?php echo base_url(); ?>assets/public/images/blank.gif" alt="">

                            <?php endif; ?>

                            </div>
                        </a>

                        <div class="price-add-to-cart">
                            <span class="price">
                                <span class="electro-price">
                                    <ins><span class="amount">Rs.<?php echo $product->price; ?></span></ins>
                                    <del><span class="amount">Rs.<?php echo $product->compare_price; ?></span></del>
                                </span>
                            </span>
                            <a rel="nofollow" href="javascript:void(0);" data-productQty='1' data-productId='<?php echo $product->id; ?>' class="button add_to_cart_button addToCart">Add to cart</a>
                        </div><!-- /.price-add-to-cart -->

                        <div class="hover-area">
                            <div class="action-buttons">

                                <a href="javascript:void(0);" data-productId='<?php echo $product->id; ?>' rel="nofollow" class="add_to_wishlist">
                                        Wishlist</a>

                                
                            </div>
                        </div>
                    </div><!-- /.product-inner -->
                </div><!-- /.product-outer -->
            </li>
        <?php $i++; endforeach; ?>
    <?php else: ?>
        <div class="no-match text-center">
            <h3 class="text-center">No Match found</h3>
        </div>
        <?php endif; ?>
         
    </ul>
</div>
<div role="tabpanel" class="tab-pane" id="grid-extended" aria-expanded="true">

    <ul class="products columns-3">
           <?php if (isset($latest_products)): ?>
            <?php foreach ($latest_products as $product):  ?>

            <li class="product <?php echo $i==1 ? 'first' : ''; ?> <?php echo $i==3 ? 'last' : ''; ?>">
                <div class="product-outer">
                    <div class="product-inner">
                        <span class="loop-product-categories">
                        <a href="<?php echo base_url('shop/search_product?category='.$product->category_id.'&name='); ?>" rel="tag">Smartphones</a></span>
                        <a href="<?php echo base_url('shop/quickview/'.$product->id); ?>">
                            <h3><?php echo ucwords($product->title); ?></h3>
                            <div class="product-thumbnail">
                                <?php if(isset($product->upload_type) && $product->upload_type=='excel'): ?>
                                    
                                    <img class="wp-post-image" data-echo="<?php echo $product->thumbnail; ?>" src="<?php echo base_url('assets/public/images/blank.gif'); ?>" alt="">
                                    
                                <?php else: ?>

                                    <img class="wp-post-image" data-echo="<?php echo base_url('uploads/'.$product->thumbnail); ?>" src="<?php echo base_url('assets/public/images/blank.gif'); ?>" alt="">
                                <?php endif; ?>
                            
                            </div>

                            <div class="product-rating">
                                <div title="" class="star-rating"><span style="width:80%"></div><!--  (3) -->
                            </div>

                            <div class="product-short-description">
                                
                                <?php $features =  explode("::", $product->features); ?>
                                <ul>
                                <?php if(count($features)): ?>
                                    <?php foreach ($features as $feature): ?>
                                    <li><span class="a-list-item"><?php echo htmlentities($feature); ?></span></li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </ul>
                                
                            </div>

                            <div class="product-sku">SKU: <?php echo $product->sku; ?></div>
                        </a>
                        <div class="price-add-to-cart">
                            <span class="price">
                                <span class="electro-price">
                                    <ins><span class="amount">Rs.<?php echo $product->price; ?></span></ins>
                                    <del><span class="amount">Rs.<?php echo $product->compare_price; ?></span></del>
                                </span>
                            </span>
                            <a rel="nofollow" href="javascript:void(0);" class="button add_to_cart_button">Add to cart</a>
                        </div><!-- /.price-add-to-cart -->
                        <div class="hover-area">
                            <div class="action-buttons">

                                <a href="javascript:void(0);" data-productId='<?php echo $product->id; ?>' rel="nofollow" class="add_to_wishlist">
                                        Wishlist</a>

                                
                            </div>
                        </div>
                    </div><!-- /.product-inner -->
                </div><!-- /.product-outer -->
            </li> 
        <?php endforeach; ?>
        <?php else: ?>
            <h3 class="text-center">No products available</h3>
        <?php endif; ?>
    </ul>
</div>  
<div role="tabpanel" class="tab-pane" id="list-view" aria-expanded="true">

    <ul class="products columns-3">
            <li class="product list-view">
                <div class="media">
                    <div class="media-left">
                        <a href="single-product.html">
                            <img class="wp-post-image" data-echo="assets/images/products/1.jpg" src="<?php echo base_url(); ?>assets/public/images/blank.gif" alt="">
                        </a>
                    </div>
                    <div class="media-body media-middle">
                        <div class="row">
                            <div class="col-xs-12">
                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                    <div class="product-rating">
                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                    </div>
                                    <div class="product-short-description">
                                        <ul style="padding-left: 18px;">
                                            <li>4.5 inch HD Screen</li>
                                            <li>Android 4.4 KitKat OS</li>
                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                            <li>20 MP front Camera</li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-12">

                                <div class="availability in-stock">
                                    Availablity: <span>In stock</span>
                                </div>


                                <span class="price"><span class="electro-price"><span class="amount"> Rs.629.00</span></span></span>
                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                <div class="hover-area">
                                    <div class="action-buttons">
                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                <span class="feedback">Product added!</span>
                                                <a rel="nofollow" href="#">Wishlist</a>
                                            </div>

                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a rel="nofollow" href="#">Wishlist</a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>
                                        <div class="clear"></div>
                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
                    
            </ul>
</div>
                    <div role="tabpanel" class="tab-pane" id="list-view-small" aria-expanded="true">

    <ul class="products columns-3">
                    <li class="product list-view list-view-small">
                <div class="media">
                    <div class="media-left">
                        <a href="single-product.html">
                            <img class="wp-post-image" data-echo="assets/images/products/1.jpg" src="<?php echo base_url(); ?>assets/public/images/blank.gif" alt="">
                        </a>
                    </div>
                    <div class="media-body media-middle">
                        <div class="row">
                            <div class="col-xs-12">
                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                    <div class="product-short-description">
                                        <ul style="padding-left: 18px;">
                                            <li>4.5 inch HD Screen</li>
                                            <li>Android 4.4 KitKat OS</li>
                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                            <li>20 MP front Camera</li>
                                        </ul>
                                    </div>
                                    <div class="product-rating">
                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-12">
                                <div class="price-add-to-cart">
                                    <span class="price"><span class="electro-price"><span class="amount"> Rs.1,218.00</span></span></span>
                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                </div><!-- /.price-add-to-cart -->
                                <div class="hover-area">
                                    <div class="action-buttons">

                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>

                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </li>
                    
            </ul>
</div>
                </div>

                <?php if(isset($total_products) && isset($products_limit)): ?>
                    <?php  if($total_products>$products_limit): ?>
                <div class="shop-control-bar-bottom">
                    <p class="woocommerce-result-count load_more_div text-center">
                        <a href="javascript:void(0);" data-page='1' data-offset='22' data-limit='21'  class="load-more-products btn btn-secondary" data-s='<?php echo $this->input->get('s') ? $this->input->get('s') : ''; ?>' data-category='<?php echo $this->input->get('category') ? $this->input->get('category') : ''; ?>'>Load more</a>
                        <div class="fidget-loader">
                            <svg width="60px"  height="60px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-fidget-spinner">
                                <g transform="rotate(216 50 50)">
                                  <g transform="translate(50 50)">
                                    <g ng-attr-transform="scale({{config.r}})" transform="scale(0.8)">
                                      <g transform="translate(-50 -58)">
                                        <path ng-attr-fill="{{config.c2}}" d="M27.1,79.4c-1.1,0.6-2.4,1-3.7,1c-2.6,0-5.1-1.4-6.4-3.7c-2-3.5-0.8-8,2.7-10.1c1.1-0.6,2.4-1,3.7-1c2.6,0,5.1,1.4,6.4,3.7 C31.8,72.9,30.6,77.4,27.1,79.4z" fill="#45aee7"></path>
                                        <path ng-attr-fill="{{config.c3}}" d="M72.9,79.4c1.1,0.6,2.4,1,3.7,1c2.6,0,5.1-1.4,6.4-3.7c2-3.5,0.8-8-2.7-10.1c-1.1-0.6-2.4-1-3.7-1c-2.6,0-5.1,1.4-6.4,3.7 C68.2,72.9,69.4,77.4,72.9,79.4z" fill="#bda0b2"></path>
                                        <circle ng-attr-fill="{{config.c4}}" cx="50" cy="27" r="7.4" fill="#ce64a6"></circle>
                                        <path ng-attr-fill="{{config.c1}}" d="M86.5,57.5c-3.1-1.9-6.4-2.8-9.8-2.8c-0.5,0-0.9,0-1.4,0c-0.4,0-0.8,0-1.1,0c-2.1,0-4.2-0.4-6.2-1.2 c-0.8-3.6-2.8-6.9-5.4-9.3c0.4-2.5,1.3-4.8,2.7-6.9c2-2.9,3.2-6.5,3.2-10.4c0-10.2-8.2-18.4-18.4-18.4c-0.3,0-0.6,0-0.9,0 C39.7,9,32,16.8,31.6,26.2c-0.2,4.1,1,7.9,3.2,11c1.4,2.1,2.3,4.5,2.7,6.9c-2.6,2.5-4.6,5.7-5.4,9.3c-1.9,0.7-4,1.1-6.1,1.1 c-0.4,0-0.8,0-1.2,0c-0.5,0-0.9-0.1-1.4-0.1c-3.1,0-6.3,0.8-9.2,2.5c-9.1,5.2-12,17-6.3,25.9c3.5,5.4,9.5,8.4,15.6,8.4 c2.9,0,5.8-0.7,8.5-2.1c3.6-1.9,6.3-4.9,8-8.3c1.1-2.3,2.7-4.2,4.6-5.8c1.7,0.5,3.5,0.8,5.4,0.8c1.9,0,3.7-0.3,5.4-0.8 c1.9,1.6,3.5,3.5,4.6,5.7c1.5,3.2,4,6,7.4,8c2.9,1.7,6.1,2.5,9.2,2.5c6.6,0,13.1-3.6,16.4-10C97.3,73.1,94.4,62.5,86.5,57.5z M29.6,83.7c-1.9,1.1-4,1.6-6.1,1.6c-4.2,0-8.4-2.2-10.6-6.1c-3.4-5.9-1.4-13.4,4.5-16.8c1.9-1.1,4-1.6,6.1-1.6 c4.2,0,8.4,2.2,10.6,6.1C37.5,72.8,35.4,80.3,29.6,83.7z M50,39.3c-6.8,0-12.3-5.5-12.3-12.3S43.2,14.7,50,14.7 c6.8,0,12.3,5.5,12.3,12.3S56.8,39.3,50,39.3z M87.2,79.2c-2.3,3.9-6.4,6.1-10.6,6.1c-2.1,0-4.2-0.5-6.1-1.6 c-5.9-3.4-7.9-10.9-4.5-16.8c2.3-3.9,6.4-6.1,10.6-6.1c2.1,0,4.2,0.5,6.1,1.6C88.6,65.8,90.6,73.3,87.2,79.2z" fill="#0055a5"></path>
                                      </g>
                                    </g>
                                  </g>
                                  <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;360 50 50" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animateTransform>
                                </g>
                              </svg>
                          </div>
                    </p>
  
                </div>
                    <?php endif; ?>
                <?php endif; ?>


            </main><!-- #main -->
        </div><!-- #primary -->

        <div id="sidebar" class="sidebar" role="complementary">
            <aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
    <ul class="product-categories category-single">
        <li class="product_cat">
            <ul class="show-all-cat">
                <li class="product_cat"><span class="show-all-cat-dropdown">Show All Categories</span>
                    <?php if(isset($categories)): ?>
                    <ul>
                    <?php foreach ($categories as $category):  ?>
                        <?php if($category['parent_id']==0): ?>
                        <li class="cat-item">
                            <a href="<?php echo base_url('shop/search_product?category='.$category['id'].'&name='.$category['name']); ?>"><?php echo ucwords($category['name']); ?></a> 
                        </li>
                    <?php endif; ?>
                    <?php endforeach; ?>

                      
                    </ul>
                <?php else: ?>
                    <h4 class="text-center">No categories available !</h4>
                <?php endif; ?>

                </li>
            </ul>
            
        </li>
    </ul>
</aside>
<aside class="widget widget_electro_products_filter">
    <h3 class="widget-title">Filters</h3>
    <aside class="widget woocommerce widget_layered_nav brands-filter">
        <h3 class="widget-title">Brands</h3>
        <ul>
            <li style=""><a href="#">Apple</a> </li>
            <li style=""><a href="#">Gionee</a> </li>
            <li style=""><a href="#">HTC</a></li>
            <li style=""><a href="#">LG</a> </li>
            <li style=""><a href="#">Micromax</a> </li>
        </ul>
        <p class="maxlist-more"><a href="#">+ Show more</a></p>
    </aside>
    <aside class="widget woocommerce widget_layered_nav ">
        <h3 class="widget-title">Color</h3>
        <ul class="color-filter">
            <li style=""><a href="#">Black</a></li>
            <li style=""><a href="#">Black Leather</a></li>
            <li style=""><a href="#">Turquoise</a></li>
            <li style=""><a href="#">White</a> </li>
            <li style=""><a href="#">Gold</a> </li>
        </ul>
        <p class="maxlist-more"><a href="#">+ Show more</a></p>
    </aside>
</aside>
            <aside class="widget widget_text">
    <div class="textwidget">
        <a href="#">
        <!-- <img src="assets/images/banner/ad-banner-sidebar.jpg" alt="Banner"></a> -->
    </div>
</aside>
<aside class="widget widget_products">
    <h3 class="widget-title">Latest Products</h3>
    <ul class="product_list_widget">
        <?php if(isset($latest_products)): ?>
        <?php foreach ($latest_products as $l_product): ?>    
            <li>
                <a href="<?php echo base_url('shop/quickview/'.$l_product->id); ?>" title="<?php echo ucwords($l_product->title); ?>">
                    <?php if(isset($l_product->upload_type) && $l_product->upload_type=='excel'): ?>
                        <img width="180" height="180" src="<?php echo $l_product->thumbnail; ?>" alt="" class="wp-post-image"/>
                    <?php else: ?>
                        
                        <img width="180" height="180" src="<?php echo base_url('uploads/'.$l_product->thumbnail); ?>" alt="" class="wp-post-image"/>
                    <?php endif; ?>
                    <span class="product-title"><?php echo $l_product->title; ?></span>
                </a>
                <span class="electro-price"><ins><span class="amount">Rs.<?php echo $l_product->price; ?></span></ins> <del><span class="amount">Rs.<?php echo $l_product->compare_price; ?></span></del></span>
            </li>
            
        <?php endforeach; ?>
        
        <?php else: ?>
            <h3>No Products !</h3>
        <?php endif; ?>


       
    </ul>
</aside>
        </div>

    </div><!-- .container -->
</div><!-- #content -->