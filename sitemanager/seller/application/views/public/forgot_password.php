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
<h3>Personal Information</h3>
<?php if($this->session->userdata('is_logged_in') && $this->session->userdata('role')=='user'): ?>
<form class="form-horizontal">
  <div class="form-group">
    <label for="name" class="col-sm-4 control-label" style="margin: 20px 0px;">Old Password</label>
    <div class="col-sm-8" style="margin: 20px 0px;">
      <input type="text" class="form-control" placeholder="Old Password">
    </div>
  </div>
  <div class="form-group">
    <label for="name" class="col-sm-4 control-label">New Password</label>
    <div class="col-sm-8">
      <input type="text" class="form-control"  placeholder="New Password">
    </div>
  </div>
  <div class="form-group">
    <label for="name" class="col-sm-4 control-label" style="margin: 20px 0px;">Retype New Password
</label>
    <div class="col-sm-8" style="margin: 20px 0px;">
      <input type="text" class="form-control"  placeholder="Retype New Password
">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-10"> 
      <button type="submit" class="btn btn-primary">submit</button>
    </div>
  </div>


</form>
<?php else: ?>

  <div class="no-user-login">
    <h4>Please login first !</h4>
  </div>

<?php endif; ?>
  </div>
  </div>
</div>
