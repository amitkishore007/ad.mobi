
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <div class="container">
                                <div class="page-content-inner">
                                    <div class="mt-content-body">
                                        
                                       <!-- row  -->
                                         <!-- start  row -->
                       
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Home Categories below home banners</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided">
                                              
                                                <a href="<?php echo base_url('category'); ?>" class='btn btn-transparent dark btn-outline btn-sm'>Back to category</a>
                                                <a href="<?php echo base_url('category/create'); ?>" class='btn btn-transparent dark btn-outline btn-sm'>Create new category</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="portlet-body">
                                    <p>These categories will be displayed below home slider</p>
                                        <table class="table table-striped table-bordered " >
                                            <thead>
                                                <tr class="">
                                                    <th>S. No.</th>
                                                    <th>Catergory 1</th>
                                                    <th>Catergory 2</th>
                                                    <th>Catergory 3</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>

                                           
                                                <tr >
                                                    <td>1</td>
                                                    
                                                    <td>
                                                              <select class="home-category" data-number='1' data-type='one'>
                                                              
                                                                <option value=''>Select category</option>
                                                                  <?php if(isset($categories)): ?>
                                                                        <?php foreach ($categories as $category) : ?>
                                                                                
                                                                             

                                                                                     <option value="<?php echo $category->id; ?>" <?php echo isset($category_one_one) && ($category_one_one->cat_id == $category->id) ? 'selected' : ''; ?> ><?php echo $category->name; ?></option>
                                                                              
                                                                              
                                                                        <?php endforeach; ?>
                                                                  <?php endif; ?> 
                                                                </select>
                                                     </td>
                                                     <td>
                                                            <select class="home-category" data-number='2' data-type='one'>
                                                              
                                                                <option value=''>Select category</option>
                                                                  <?php if(isset($categories)): ?>
                                                                        <?php foreach ($categories as $category) : ?>
                                                                                <option value="<?php echo $category->id; ?>" <?php echo isset($category_one_two) && ($category_one_two->cat_id == $category->id) ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                                                                        <?php endforeach; ?>
                                                                  <?php endif; ?> 
                                                                </select>
                                                     </td>
                                                     <td>
                                                          <select class="home-category" data-number='3' data-type='one'>
                                                              
                                                                <option value=''>Select category</option>
                                                                  <?php if(isset($categories)): ?>
                                                                        <?php foreach ($categories as $category) : ?>
                                                                                <option value="<?php echo $category->id; ?>" <?php echo isset($category_one_three) && ($category_one_three->cat_id == $category->id) ? 'selected' : ''; ?> ><?php echo $category->name; ?></option>
                                                                        <?php endforeach; ?>
                                                                  <?php endif; ?> 
                                                                </select>
                                                     </td>
           
                                                </tr>
                                            
                                     
                                            

                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                
                            </div>
                        </div>


                        <!-- end  row -->

                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Home Categories in bestselling section</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided">
                                              
                                                <!-- <a href="<?php //echo base_url('category/upload_banner'); ?>" class='btn btn-transparent dark btn-outline btn-circle btn-sm'>Upload a new banner</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                    <p>These categories will be displayed in bestselling section</p>
                                        <table class="table table-striped table-bordered table-hover " >
                                            <thead>
                                                <tr class="">
                                                    <th>S. No.</th>
                                                    <th>Catergory 1</th>
                                                    <th>Catergory 2</th>
                                                    <th>Catergory 3</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>

                                           
                                                <tr >
                                                    <td>1</td>
                                                    
                                                    <td>
                                                              <select class="home-category" data-number='1' data-type='two'>
                                                              
                                                                <option value=''>Select category</option>
                                                                  <?php if(isset($categories)): ?>
                                                                        <?php foreach ($categories as $category) : ?>
                                                                                <option value="<?php echo $category->id; ?>" <?php echo isset($category_two_one) && ($category_two_one->cat_id == $category->id) ? 'selected' : ''; ?> ><?php echo $category->name; ?></option>
                                                                        <?php endforeach; ?>
                                                                  <?php endif; ?> 
                                                                </select>
                                                     </td>
                                                     <td>
                                                            <select class="home-category" data-number='2' data-type='two'>
                                                              
                                                                <option value=''>Select category</option>
                                                                  <?php if(isset($categories)): ?>
                                                                        <?php foreach ($categories as $category) : ?>
                                                                                <option value="<?php echo $category->id; ?>" <?php echo isset($category_two_two) && ($category_two_two->cat_id == $category->id) ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                                                                        <?php endforeach; ?>
                                                                  <?php endif; ?> 
                                                                </select>
                                                     </td>
                                                     <td>
                                                          <select class="home-category" data-number='3' data-type='two'>
                                                              
                                                                <option value=''>Select category</option>
                                                                  <?php if(isset($categories)): ?>
                                                                        <?php foreach ($categories as $category) : ?>
                                                                                <option value="<?php echo $category->id; ?>" <?php echo isset($category_two_three) && ($category_two_three->cat_id == $category->id) ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                                                                        <?php endforeach; ?>
                                                                  <?php endif; ?> 
                                                                </select>
                                                     </td>
           
                                                </tr>
                                            
                                     
                                            

                                            </tbody>
                                        </table>

                                        
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                
                            </div>
                        </div>
                            
                                       <!-- row end -->
                            
                                       <!-- section 3 -->

                                          <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Best selling categories</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided">
                                              
                                                <!-- <a href="<?php //echo base_url('category/upload_banner'); ?>" class='btn btn-transparent dark btn-outline btn-circle btn-sm'>Upload a new banner</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                    <p>These categories will be displayed in bestselling section</p>
                                        <table class="table table-striped table-bordered table-hover " >
                                            <thead>
                                                <tr class="">
                                                    <th>S. No.</th>
                                                    <th>Category section 2</th>
                                                    <th>Category Section three</th>
                                                    
                                                
                                                </tr>
                                            </thead>
                                            <tbody>

                                           
                                                <tr >
                                                    <td>1</td>
                                                    
                                                    <td>
                                                              <select class="home-category" data-number='1' data-type='three'>
                                                              
                                                                <option value=''>Select category</option>
                                                                  <?php if(isset($categories)): ?>
                                                                        <?php foreach ($categories as $category) : ?>
                                                                                <option value="<?php echo $category->id; ?>" <?php echo isset($category_two_one) && ($category_two_one->cat_id == $category->id) ? 'selected' : ''; ?> ><?php echo $category->name; ?></option>
                                                                        <?php endforeach; ?>
                                                                  <?php endif; ?> 
                                                                </select>
                                                     </td>
                                                     <td>
                                                            <select class="home-category" data-number='1' data-type='four'>
                                                              
                                                                <option value=''>Select category</option>
                                                                  <?php if(isset($categories)): ?>
                                                                        <?php foreach ($categories as $category) : ?>
                                                                                <option value="<?php echo $category->id; ?>" <?php echo isset($category_two_two) && ($category_two_two->cat_id == $category->id) ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                                                                        <?php endforeach; ?>
                                                                  <?php endif; ?> 
                                                                </select>
                                                     </td>
                                                    
           
                                                </tr>
                                            
                                     
                                            

                                            </tbody>
                                        </table>

                                        
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                
                            </div>
                        </div>
                            
                                       <!-- row end -->
                                       <!-- section 3 : end -->


                                       <!-- section 3 -->

                                          <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Best selling categories</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided">
                                              
                                                <!-- <a href="<?php //echo base_url('category/upload_banner'); ?>" class='btn btn-transparent dark btn-outline btn-circle btn-sm'>Upload a new banner</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                    <p>Top categories listed at the botton of the home page</p>
                                        <table class="table table-striped table-bordered table-hover " >
                                            <thead>
                                              
                                            </thead>
                                            <tbody>

                                           
                                                <tr >
                                                    
                                                    <td>
                                                            <div class="input-group">
                                                                            <div class="icheck-inline top-cat-list">
                                                                                <?php if(isset($categories)): ?>
                                                                                     <?php foreach ($categories as $category) : ?>
                                                                        
                                                                                        <label >
                                                                                            <input type="checkbox" class="icheck top-category" data-cat-id = '<?php echo $category->id; ?>' data-checkbox="icheckbox_square-grey" value='' <?php echo isset($category->checked)  ? 'checked' : ''; ?> > <?php echo $category->name; ?>
                                                                                        </label>

                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?> 
                                                                                  
                                                                            <div class="loader-overlay"><img src="<?php echo base_url('assets/img/loader.gif'); ?>"></div>
                                                                            </div>

                                                                        </div>
                                                     </td>
                                                     
                                                    
           
                                                </tr>
                                            
                                     
                                            

                                            </tbody>
                                        </table>

                                        
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                
                            </div>
                        </div>
                            
                                       <!-- row end -->
                                       <!-- section 3 : end -->

                                    </div>
                                </div>
                            </div>
                      
                        

                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT-->