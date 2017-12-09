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

    <h3>Customer support ?</h3>
  
  <?php if($this->session->userdata('is_logged_in') && $this->session->userdata('role')=='user'): ?>

    <div class="form-horizontal my-account-form">
      <div class="form-group">
        <label for="name" class="col-sm-4 control-label" style="margin: 20px 0px;">Subject</label>
        <div class="col-sm-8" style="margin: 20px 0px;">
          <input type="text" class="form-control query-subject" placeholder="First Name" value='<?php //echo $personal_info->fname; ?>'>
          <span class="text-danger error subject-error" ></span>
        </div>
      </div>
       
      <div class="form-group">
        <label for="name" class="col-sm-4 control-label">Query</label>
        <div class="col-sm-8">
          <textarea name="query" placeholder="write your query" id="query-msg" rows="10"></textarea>
          <span class="text-danger error query-msg-error" ></span>
        </div>
      </div>
    
      <div class="form-group">
        <label for="name" class="col-sm-4 control-label" style="margin: 20px 0px;">Attach thumbnail</label>
        <div class="col-sm-8" style="margin: 20px 0px;">
                <form method='POST' enctype='multipart/form-data' action="<?php echo base_url('shop/upload_image'); ?>" id='attach-thumbnail'>
                    <input type="file" name='file' class="form-control " id='file-attach' >
                  <div class="progressBar">
                    <div class="bar"></div>
                    <div class="percent">0%</div>
                </div>
                </form>
         
          <span class="text-danger error attach-error" ></span>
        </div>
      </div>
     
      
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-10"> 
        <input type="hidden" id='file-attach-hidden' value=''>
          <button type="submit" class="btn btn-primary submit-user-query">Submit query</button>
          <h3 class="alert alert-success success-msg">Changes saved </h3>
        </div>
      </div>
    </div>
  <?php else: ?>

    <div class="no-login-msg">
      <h3 class="text-center">Please login to proceed</h3>
    </div>
<?php endif; ?>


    	</div>
</div>
</div>