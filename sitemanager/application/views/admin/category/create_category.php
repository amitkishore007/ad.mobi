
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
                                <div class="form-horizontal form-row-seperated" action="#">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-shopping-cart"></i>Category <span class="text-center alert alert-success success-msg"></span></div>
                                            <div class="actions btn-set">
                                                <a type="button" href='<?php echo base_url('category'); ?>' name="back" class="btn btn-secondary-outline">
                                                    <i class="fa fa-angle-left"></i> Back</a>
                                                <a class="btn btn-success" href='<?php echo base_url('category/create'); ?>'> Create a new category</a>
                                                
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
                                                                <label class="col-md-2 control-label">Name:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10"> 
                                                                    <input type="text" class="form-control cat_name"  name="product[name]" placeholder=""> 

                                                                     <span class="text-danger  cat_name-error"></span>   
                                                                    </div>
                                                            </div>

                                                             
                                                            <div class="form-group hidden">
                                                                <label class="col-md-2 control-label">Categry Description:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <div name="summernote" id="summernote_1" class="cat_desc"> </div>
                                                                    <span class="text-danger  cat_desc-error"></span> 
                                                                </div>
                                                            </div>

                                                          
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Categories:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                               
                                                                <div class="col-md-10">
                                                                     <div class="input-group select2-bootstrap-append">
                                                                        <select id="single-append-text"  class="form-control select2-allow-clear parent_cat">
                                                                            <option value=''>Select Parent category</option>
                                                                            <option value='0'>Make it a parent category</option>
                                                                            <?php if (isset($categories)) : ?>
                                                                                <?php foreach ($categories as $category) : ?>       
                                                                                      <option value="<?php echo  $category->id; ?>"><?php echo $category->name; ?></option>        
                                                                                <?php endforeach; ?>
                                                                            <?php endif; ?>    
                                                                        </select>
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-default" type="button" data-select2-open="single-append-text">
                                                                                <span class="glyphicon glyphicon-search"></span>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                         <span class="text-danger  parent_cat-error"></span> 
                                                                </div>
                                                            </div>

                             

                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Select Category variations:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10"> 
                                                                        <label>These will be linked to this category</label>
                                                                        <div class="input-group">
                                                                            <div class="icheck-inline">
                                                                                <label data-toggle="tooltip" title="Product added to this category will have color option">
                                                                                    <input type="checkbox" class="icheck" id='color' data-checkbox="icheckbox_square-grey" value='color'> Color </label>
                                                                                <label data-toggle="tooltip" title="Different sizes like M, S, L, XL, XXL will be available">
                                                                                    <input type="checkbox"  class="icheck"   data-checkbox="icheckbox_square-grey" class='size' value='size'> Size </label>
                                                                                <label data-toggle="tooltip" title="will be able to add height, width, length ">
                                                                                 <input type="checkbox" class="icheck"  data-checkbox="icheckbox_square-grey" class="dimension"  value='dimension'> Dimension </label>
                                                                                <label data-toggle="tooltip" title="additional field to add weight of the product"> 
                                                                                <input type="checkbox" class="icheck"   data-checkbox="icheckbox_square-grey" class="weight" value='weight'>  Weight </label>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Unique Id:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    
                                                                <input type="text" name="unique-id" placeholder="Unique Id for this category" class="form-control unique_id" />
                                                                   <span class="text-danger unique-id-error" ></span> 
                                                                </div>        
                                                            </div>
                                                          
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Choose image:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    
                                                                    <form method='POST' action="<?php echo base_url('category/upload_image'); ?>" enctype="multipart/form-data" class="" id='upload-category-image'  style=" margin-top: 10px;">
                                                            
                                                                           <p class="text-center"> 
                                                                               <input type="file" name='file' class="image-upload"></p>
                                                                               <div class="progressBar">
                                                                                    <div class="bar"></div>
                                                                                    <div class="percent">0%</div>
                                                                                </div>
                                                                    </form>

                                                                    <div class="category-img">
                                                                        <img src="" height="100">
                                                                    </div>

                                                                    <span class="text-danger .image-error"></span>
                                                                </div>      

                                                            </div>

                                                          

                                                            <div class="form-group">
                                                            <label class="col-md-2 control-label">
                                                                    <span class="required"> &nbsp; </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                <input type="hidden" class='cat-img' name="cat-img" value=''>
                                                                    <button type="button" data-loading-text="Loading..." class="btn btn-primary btn-lg mt-ladda-btn ladda-button mt-progress-demo create-cat" data-style="expand-left">
                                                                        <span class="ladda-label">Submit</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                   <!--  <pre>
                                                        <?php 

                                                                      ?>
                                                    </pre> -->
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
          

          