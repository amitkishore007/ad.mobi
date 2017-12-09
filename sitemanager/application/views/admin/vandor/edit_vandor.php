
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <!-- END PAGE TITLE-->
                          <div class="container">
                        <h1 class="page-title"> </h1>
                                <div class="page-content-inner">
                                    <div class="mt-content-body">
                                        
                                         <!-- start row -->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal form-row-seperated" action="#">
                                    <div class="portlet light">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-shopping-cart"></i>Vandor (Edit <?php echo $vandor->username; ?>'s info)<span class="text-center alert alert-success success-msg"></span></div>
                                            <div class="actions btn-set">
                                                <a type="button" name="back" class="btn btn-secondary-outline btn btn-primary">
                                                    <i class="fa fa-angle-left"></i> Back</a>
                                                <a class="btn btn-secondary-outline btn btn-default">
                                                    Create new vandor</a>
                                               
                                                
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="tabbable-bordered">
                                                <ul class="nav nav-tabs">
                                                   
                                                    
                                                   
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_general">
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">username:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10"> 
                                                                    <input type="text" class="form-control vandor_name"  name="vandor[name]" value='<?php echo $vandor->username; ?>' placeholder="username"> 

                                                                     <span class="text-danger  vandor_name-error"></span>   
                                                                    </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Email:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10"> 
                                                                    <input type="text" class="form-control vandor_email"  name="vandor[email]" placeholder="Email" value='<?php echo $vandor->email; ?>'> 

                                                                     <span class="text-danger  vandor_email-error"></span>   
                                                                    </div>
                                                            </div>
                                                           
                                                          

                                                            <div class="form-group">
                                                            <label class="col-md-2 control-label">
                                                                    <span class="required"> &nbsp; </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <button type="button" data-loading-text="Loading..." class="btn btn-primary btn-lg mt-ladda-btn ladda-button mt-progress-demo edit-vandor" data-style="expand-left">
                                                                        <span class="ladda-label">Submit</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- end row -->
                        
                                    </div>
                                </div>
                            </div>

                      

                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
          