
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                       
                        <div class="container">
                            <div class="page-content-inner">
                                <div class="mt-content-body">
                                    
                                    <!-- start  row -->
                    <div class="row">
                        <div class="col-md-12">
                              <div class="portlet light bordered top-search-bar">
                                  <div class="portlet-body">
                                      <div class="filter-form">
                                       
                                          <form class="form-horizontal form-bordered">
                                                <div class="form-body">

                                                    <div class="form-group">
                                                    <div class="col-md-1">
                                                        
                                                    </div>
                                                     
                                                        <div class="col-md-8">
                                                                <input type="text" class="form-control"  placeholder='Search for the product by title, seller name, category name'>
                                                        
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="submit" class='btn btn-primary' value='search'>
                                                        </div>
                                                    </div>
                                                   
                                                            
                                                    
                                                </div>
                                            </form>
                                      </div>
                                  </div>
                              </div>
                        </div>
                    </div>
                            <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                     <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_general"  data-toggle="tab"> General </a>
                                        </li>
                                        <li class="">
                                            <a href="#tab_active"  data-toggle="tab">Active products</a>
                                        </li> 
                                        <li class="">
                                            <a href="#tab_inactive"  data-toggle="tab">Inactive products</a>
                                        </li>
                                          <li class="">
                                            <a href="#tab_less_five"  data-toggle="tab">Stock less then 5</a>
                                        </li>
                                        <li class="">
                                            <a href="#my_products"  data-toggle="tab">My Products</a>
                                        </li>
                            
                                    </ul>
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Manage product</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided">
                                                <a href="<?php echo base_url('product/create'); ?>" class="btn btn-transparent dark btn-outline btn-circle btn-sm">Add a new product</a>
                                                <a href="#excelModal" data-toggle="modal" class="btn btn-transparent dark btn-outline btn-circle btn-sm">upload using excel</a>
                                            </div>
                                        </div>
                                        <!-- excel modal -->
                                        <div id="excelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title text-center">Upload Excel file</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form method='POST' action="<?php echo base_url('product/excelUploadOnly'); ?>" enctype="multipart/form-data" class=" dropzone-file-area" id='upload-product-excel'  style="width: 500px; margin-top: 50px;">
                                                           
                                                            <select name="category" id='excelCategory-form' class="form-control">
                                                                <option value="">Select Category</option>
                                                               <?php if(isset($categories)): ?>
                                                                <?php foreach ($categories as $category): ?>
                                                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                                                <?php endforeach; ?>

                                                                <?php endif; ?>
                                                            </select>
                                                            <div class="upload-exc-form">
                                                            <h3 class="sbold">click to upload</h3>
                                                           <p class="text-center"> <input type="file" name='file' class="excel-upload"></p>
                                                                               <div class="progressBar">
                                                                                    <div class="bar"></div>
                                                                                    <div class="percent">0%</div>
                                                                                </div>
                                                            </div>
                                                            <!-- <p> Choose your excel file to upload the products. </p> -->
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn default" data-dismiss="modal" aria-hidden="true">Close</button>
                                                        <!-- <button class="btn yellow">Save</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <!-- excel modal  end-->

                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content product-add-div">
                                             <div class="tab-pane active" id="tab_general">
                                             <div class="text-left actions-list-wrapper">   
                                                <ul class="actions">
                                                   
                                                    <li>
                                                        <select name="" id="actions-list">
                                                            <option value="">Select Action</option>
                                                            <option value="">Active</option>
                                                            <option value="">Inactive</option>
                                                            <option value="">Delete</option>
                                                        </select>
                                                    </li>
                                                    <li><input type="submit" name='submit' class="btn btn-default do-action" value='Submit'></li>
                                                    <li></li>
                                                </ul>
                                             </div>
                                                 
                                                <table class="table table-striped table-bordered table-hover ">
                                            <thead>
                                                <tr class="">
                                                    <th> <label for="select-all">
                                                        <input type="checkbox" id='select-all' > All</label></th>
                                                    <th>S. No.</th>
                                                    <th>Image</th>
                                                    <th>Title</th>

                                                    <th>Vandor</th>
                                                    <th>Status</th>
                                                    <th>hot sale</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if (isset($products)):  $i=1; ?>

                                            <?php foreach ($products as $product):  ?>

                                                <tr id='row_<?php echo $product->product_id ?>'>
                                                <td><input type="checkbox" class='product-select' name='check-product' data-productId='<?php echo $product->product_id; ?>'></td>
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                    <?php if($product->upload_type=='excel'): ?>
                                                        <img src="<?php  echo $product->thumbnail; ?>" height='80' >
                                                    <?php else: ?>
                                                        
                                                        <img src="<?php echo base_url('uploads/'.$product->thumbnail); ?>" height='80' >
                                                    <?php endif; ?>

                                                    </td>
                                                    <td><?php echo $product->title; ?></td>
                                                    <td><?php echo $product->username; ?></td>
                                                    <td><span id="status_<?php echo $product->product_id; ?>" class='<?php echo $product->status ? 'text-success' : 'text-danger'; ?>'><?php echo $product->status ? "Published" : "Not published"; ?></span>  <input type="checkbox" <?php echo $product->status ? 'checked' : ''; ?> class="make-switch product-status" data-on-text="Public" data-productId='<?php echo $product->product_id; ?>' data-off-text="Private" data-size="mini"></td>
                                                   <td><input type="checkbox" <?php echo $product->hot_sale ? "checked" : ''; ?> class="make-switch hot-sale" data-on-text="Active" data-productId='<?php echo $product->product_id; ?>'  data-off-text="Inactive" data-size="mini"></td>
                                                    <td>
                                                    <a href="<?php echo base_url('product/edit/'.$product->product_id); ?>" class='btn btn-sm btn-info'>Edit</a>
                                                     <a class="btn red-mint btn-large delete-product " data-productId = "<?php echo $product->product_id; ?>" data-toggle="confirmation" data-original-title="Are you sure ?"
                                            title="">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                            

                                            </tbody>
                                        </table>
                                        <p class="text-center"> <a href="javascript:void();" class="btn btn-primary" data-productStatus='inactive'>Load More</a></p>
                                                 
                                             </div>
                                             <div class="tab-pane " id="tab_active">
                                                 <div class="active-products">

                                                     <?php if(isset($active_products)): ?>
                                                     <table class="table table-hover table-light">
                                                                <thead>
                                                                   
                                                                    <tr class="uppercase">
                                                                        <th> # </th>
                                                                        <th> Image </th>
                                                                        <th> Title </th>
                                                                        <th> Vandor </th>
                                                                        <th> Status </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i=1; ?>
                                                                <?php foreach ($active_products as $product): ?>
                                                                    <tr>
                                                                        <td> <?php echo $i; ?> </td>
                                                                        <td> 
                                                                        <?php if($product->upload_type=='excel'): ?>
                                                                            <img src="<?php echo $product->thumbnail; ?>" height='80'>
                                                                        <?php else: ?> 
                                                                            <img src="<?php echo base_url('uploads/'.$product->thumbnail); ?>" height='80'>
                                                                        
                                                                        <?php endif; ?>
                                                                         </td>
                                                                        <td><?php echo ucwords($product->title); ?></td>
                                                                        <td><?php echo ucwords($product->username); ?></td>
                                                                        <td>
                                                                            <span class="label label-sm label-success"> <?php echo $product->status ? 'Active' : ''; ?> </span>
                                                                        </td>
                                                                    </tr>

                                                                    <?php $i++; ?>
                                                                <?php endforeach; ?>
                                                                   
                                                                </tbody>
                                                            </table>
                                                        <?php else: ?>
                                                            <h3 class="text-center"> No products uploaded yet !</h3>
                                                        <?php endif; ?>
                                                        <p class="text-center"> <a href="javascript:void();" class="btn btn-primary" data-productStatus='active'>Load More</a></p>
                                                     
                                                 </div>
                                             </div>
                                             <div class="tab-pane " id="tab_inactive">
                                             <div class="inactive-products">
                                                 <?php if(isset($inactive_products)): ?>
                                                     <table class="table table-hover table-light">
                                                                <thead>
                                                                   
                                                                    <tr class="uppercase">
                                                                        <th> # </th>
                                                                        <th> Image </th>
                                                                        <th> Title </th>
                                                                        <th> Vandor </th>
                                                                        <th> Status </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i=1; ?>
                                                                <?php foreach ($inactive_products as $product): ?>
                                                                    <tr>
                                                                        <td> <?php echo $i; ?> </td>
                                                                        <td> 
                                                                        <?php if($product->upload_type=='excel'): ?>
                                                                            <img src="<?php echo $product->thumbnail; ?>" height='80'>
                                                                        <?php else: ?> 
                                                                            <img src="<?php echo base_url('uploads/'.$product->thumbnail); ?>" height='80'>
                                                                        
                                                                        <?php endif; ?>
                                                                         </td>
                                                                        <td><?php echo ucwords($product->title); ?></td>
                                                                        <td><?php echo ucwords($product->username); ?></td>
                                                                        <td>
                                                                            <span class="label label-sm label-success"> <?php echo $product->status ? 'Active' : 'Inactive'; ?> </span>
                                                                        </td>
                                                                    </tr>

                                                                    <?php $i++; ?>
                                                                <?php endforeach; ?>
                                                                   
                                                                </tbody>
                                                            </table>
                                                        <?php else: ?>
                                                            <!-- <h3 class="text-center"> No products uploaded yet !</h3> -->
                                                        <?php endif; ?>
                                                         <p class="text-center"> <a href="javascript:void();" class="btn btn-primary" data-productStatus='inactive'>Load More</a></p>
                                                     
                                             </div>
                                             </div>
                                              <div class="tab-pane" id="tab_less_five">
                                              <div class="low-stock-products">
                                                    <?php if(isset($low_stock_products)): ?>
                                                     <table class="table table-hover table-light">
                                                                <thead>
                                                                   
                                                                    <tr class="uppercase">
                                                                        <th> # </th>
                                                                        <th> Image </th>
                                                                        <th> Title </th>
                                                                        <th> Vandor </th>
                                                                        <th> Status </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i=1; ?>
                                                                <?php foreach ($low_stock_products as $product): ?>
                                                                    <tr>
                                                                        <td> <?php echo $i; ?> </td>
                                                                        <td> 
                                                                        <?php if($product->upload_type=='excel'): ?>
                                                                            <img src="<?php echo $product->thumbnail; ?>" height='80'>
                                                                        <?php else: ?> 
                                                                            <img src="<?php echo base_url('uploads/'.$product->thumbnail); ?>" height='80'>
                                                                        
                                                                        <?php endif; ?>
                                                                         </td>
                                                                        <td><?php echo ucwords($product->title); ?></td>
                                                                        <td><?php echo ucwords($product->username); ?></td>
                                                                        <td>
                                                                            <span class="label label-sm label-success"> <?php echo $product->status ? 'Active' : 'Inactive'; ?> </span>
                                                                        </td>
                                                                    </tr>

                                                                    <?php $i++; ?>
                                                                <?php endforeach; ?>
                                                                   
                                                                </tbody>
                                                            </table>
                                                        <?php else: ?>
                                                            <!-- <h3 class="text-center"> No products uploaded yet !</h3> -->
                                                        <?php endif; ?>

                                                       <?php  //if($low_product_count>=20): ?>
                                                            
                                                             <p class="text-center"> <a href="javascript:void();" class="btn btn-primary" data-productStatus='low-stock'>Load More</a></p>
                                                       <?php // endif; ?>

                                              </div>
                                             </div>
                                             <div class="tab-pane" id="my_products">
                                                 <div class="my-products-div">
                                                     

                                                     <p class="text-center"> <a href="javascript:void();" class="btn btn-primary" data-productStatus='my-product'>Load More</a></p>
                                                 </div>
                                             </div>
                                        </div>
                                        
                                    </div>

                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                
                            </div>
                        </div>


                        <!-- end  row -->
                        
                                   
                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
               