 <div id="content" class="site-content" tabindex="-1">
   <?php //print_r($curr_cat); ?>
    <div class="container">
        <nav class="woocommerce-breadcrumb" >
        	&nbsp;
        </nav>

        <div id="primary" class="content-area">
        	<main id="main" class="site-main">

        		 <section>
                    <header>
                    <?php if(isset($curr_cat)): ?>
                        <h2 class="h1"><?php echo ucwords($curr_cat->name); ?></h2>
                    <?php endif; ?>
                    </header>

                    <div class="woocommerce columns-4">
                        <ul class="product-loop-categories">
    <?php if (isset($child_category)): ?>
		<?php foreach ($child_category as $category):  ?>
            <li class="product-category product">
    					<a href="<?php echo base_url('shop/search_product/?category='.$category->id); ?>">
    			<img src="<?php echo base_url('assets/img/placeholder.jpg'); ?>" class="img-responsive" alt="">
    			<h3>
    			<?php echo $category->name; ?>			
    			</h3>
    		</a>

		</li><!-- /.item -->
    <?php endforeach; ?>
    <?php endif; ?>

		                        </ul>
                    </div>
                </section>

            	</main><!-- /.site-main -->
        </div><!-- /.content-area -->
    </div>
</div>