
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
                                                <i class="fa fa-shopping-cart"></i>Category <span class="text-center alert alert-success success-msg"></span></div>
                                            <div class="actions btn-set">
                                                <a type="button" href='<?php echo base_url('category'); ?>' name="back" class="btn btn-default btn btn-secondary-outline">
                                                    <i class="fa fa-angle-left"></i> Back</a>
                                                <a class="btn btn-secondary-outline" href='<?php echo base_url('category/create'); ?>'>
                                                     Create new category</a>
                                               
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
                                                                    <input type="text" class="form-control cat_name"  name="product[name]" value='<?php echo $category->name; ?>' placeholder=""> 

                                                                     <span class="text-danger  cat_name-error"></span>   
                                                                    </div>
                                                            </div>
                                                            <div class="form-group hidden">
                                                                <label class="col-md-2 control-label">Categry Description:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <div name="summernote" id="summernote_1" class="cat_desc"><?php echo $category->description; ?></div>
                                                                    <span class="text-danger  cat_desc-error"></span> 
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Categories:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                               
                                                                <div class="col-md-10">
                                                                     <div class="input-group select2-bootstrap-append">
                                                                        <select id="single-append-text"  class="form-control select2-allow-clear parent_cat" <?php echo ($category->parent_id==0) ? 'disabled': ''; ?>>
                                                                            <option value=''>Select Parent category</option>
                                                                            <?php if($category->parent_id==0): ?>
                                                                                    <option value="0" selected>Make it parent</option>
                                                                            <?php endif; ?>
                                                                               <?php if(isset($categories)): ?>
                                                                                <?php foreach ($categories as $cat): ?> 
                                                                                    <?php if($cat->id != $category->id): ?>
                                                                                        <option value='<?php echo $cat->id ?>' <?php echo ($cat->id==$category->parent_id) ? 'selected' : '';?>><?php echo $cat->name; ?></option>
                                                                                   <?php endif; ?>
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
                                                            <label class="col-md-2 control-label">
                                                                    <span class="required"> &nbsp; </span>
                                                                </label>
                                                                <div class="col-md-10">

                                                                <a  href='<?php echo base_url('category'); ?>' class="btn btn-default btn-lg">
                                                                        Cancel
                                                                    </a>

                                                                    <button type="button" data-loading-text="Loading..." class="btn btn-primary btn-lg mt-ladda-btn ladda-button mt-progress-demo edit-cat" data-catId='<?php echo $category->id; ?>' data-style="expand-left">
                                                                        <span class="ladda-label">Submit</span>
                                                                    </button>

                                                                </div>
                                                            </div>
                                                            <p class="text-center alert alert-success success-msg"></p>
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
          