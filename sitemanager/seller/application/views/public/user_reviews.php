<div class="container">
    <nav class="woocommerce-breadcrumb" >
     
    </nav><!-- .woocommerce-breadcrumb -->
  </div><!-- .col-full -->
<div class="container">
<div class="row">
  
    	<div class="col-md-3 col-lg-3">
        <?php $this->load->view('includes/my_account_sidebar'); ?>
    	</div>
    	<div class="col-md-6 col-lg-6">

    
  <?php if($this->session->userdata('is_logged_in') && $this->session->userdata('role')=='user'): ?>

    <div class="form-horizontal my-account-form">
     
     <h4 class="text-center">No reviews given</h4>
     
    </div>
  <?php else: ?>

    <div class="no-login-msg">
      <h3 class="text-center">Please login to proceed</h3>
    </div>
<?php endif; ?>


    	</div>
</div>
</div>