
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <div class="container">
                            <div class="page-content-inner">
                                <div class="mt-content-body">
                                    
                                    <!-- start row -->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal form-row-seperated" action="#">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-shopping-cart"></i>Privacy policy us <span class="text-center alert alert-success success-msg"></span></div>
                                            <div class="actions btn-set">
                                                <a type="button" name="back" class="btn btn-default btn-outline" href='<?php echo base_url('privacy'); ?>'>
                                                    <i class="fa fa-angle-left"></i> Back</a>
                                               
                                              
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
                                                                <label class="col-md-2 control-label">Title:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10"> 
                                                                    <input type="text" class="form-control privacy_title"  name="about_title" value='<?php echo $privacy_content->heading; ?>' placeholder=""> 

                                                                     <span class="text-danger  title-error"></span>   
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Content:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <div name="summernote" id="summernote_1" class="privacy_content"><?php echo $privacy_content->content; ?></div>
                                                                    <span class="text-danger  about_content-error"></span> 
                                                                </div>
                                                            </div>
                                                          
                                                            

                                                          

                                                            <div class="form-group">
                                                            <label class="col-md-2 control-label">
                                                                    <span class="required"> &nbsp; </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <button type="button" data-loading-text="Loading..." data-privacyId='<?php echo $privacy_content->id; ?>' class="btn btn-primary btn-lg mt-ladda-btn ladda-button mt-progress-demo edit_privacy" data-style="expand-left">
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
          

          