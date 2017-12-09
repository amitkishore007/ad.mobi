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
    <form class="form-horizontal my-account-form">
      <div class="form-group">
        <label for="name" class="col-sm-4 control-label" style="margin: 20px 0px;">First Name</label>
        <div class="col-sm-8" style="margin: 20px 0px;">
          <input type="text" class="form-control acc-fname" placeholder="First Name" value='<?php echo $personal_info->fname; ?>'>
          <span class="text-danger error fname-error" ></span>
        </div>
      </div>
       
      <div class="form-group">
        <label for="name" class="col-sm-4 control-label">Last Name</label>
        <div class="col-sm-8">
          <input type="text" class="form-control acc-lname"  placeholder="Last Name" value='<?php echo $personal_info->lname; ?>'>
          <span class="text-danger error lname-error" ></span>
        </div>
      </div>
    
      <div class="form-group">
        <label for="name" class="col-sm-4 control-label" style="margin: 20px 0px;">Phone number</label>
        <div class="col-sm-8" style="margin: 20px 0px;">
          <input type="text" class="form-control acc-phone" placeholder="Phone" value='<?php echo $personal_info->phone; ?>'>
          <span class="text-danger error phone-error" ></span>
        </div>
      </div>
      <div class="form-group">
        <label for="name" class="col-sm-4 control-label" style="margin: 20px 0px;">Gender</label>
        <div class="col-sm-5" style="margin: 20px 0px;">
         <select class="form-control acc-gender">
            <option value=''>--Gender--</option>
            <option value='male' <?php echo $personal_info->gender=='male' ? 'selected' :''; ?>>Male</option>
            <option value='female' <?php echo $personal_info->gender=='female' ? 'selected' :''; ?>>Female</option>
        </select>
          <span class="text-danger error gender-error" ></span>

        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-10"> 
          <button type="submit" class="btn btn-primary save-personal-info">Save Changes</button>
          <h3 class="alert alert-success success-msg">Changes saved </h3>
        </div>
      </div>
    </form>
    	</div>
</div>
</div>