
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">
                        <span class="alert alert-success product-msg">successfully add new porduct,<b> <a href='<?php base_url('product/create'); ?>'>Add another</a></b></span>
                        </h1>
                            

                        <!-- END PAGE TITLE-->
                         <div class="container">
                                <div class="page-content-inner">
                                    <div class="mt-content-body">
                                        
                                        <!-- start row -->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-horizontal form-row-seperated" >
                                    <div class="portlet light bordered">
                                     <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_general"  data-toggle="tab"> General </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#excel_tab"  data-toggle="tab">Upload using Excel </a>
                                                    </li> 
                                                    <li class="">
                                                        <a href="#excel_tab_download"  data-toggle="tab">Download excel</a>
                                                    </li>
                                        
                                                </ul>
                                        <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Upload a new product</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided">
                                                <a href="<?php echo base_url('product'); ?>" class="btn btn-transparent dark btn-outline btn-circle btn-sm">Back to products</a>
                                              
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
                                                       <form method='POST' action="<?php echo base_url('product/uploadExcel'); ?>" enctype="multipart/form-data" class=" dropzone-file-area" id='upload-product-excel'  style="width: 500px; margin-top: 50px;">
                                                            <h3 class="sbold">click to upload</h3>
                                                           <p class="text-center"> <input type="file" name='file' class="excel-upload"></p>
                                                                               <div class="progressBar">
                                                                                    <div class="bar"></div>
                                                                                    <div class="percent">0%</div>
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
                                            <div class="tabbable-bordered">
                                               
                                                <div class="tab-content product-add-div">
                                                <div class="product-ajax-loader">
                                                            <img src="<?php  echo base_url('assets/img/loader.gif'); ?>" />
                                                </div>
                                                
                                                    <div class="tab-pane active" id="tab_general">
                                                        <div class="form-body">
                                                        
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Name:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control product_name" name="product[name]" placeholder="">
                                                                       <span class="error name-error text-danger"></span> 
                                                                     </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Description:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <div name="summernote" class='add_product_desc' id="summernote_1"></div>
                                                                    <span class="error desc-error text-danger"></span> 
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="form-group add-after-this">
                                                                <label class="col-md-2 control-label">Categories:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                     <div class="input-group select2-bootstrap-append">
                                                                        <select id="single-append-text" class="form-control select2-allow-clear product_cat">
                                                                           
                                                                            <option value=''> Choose categroy</option>
                                                                           <?php if(isset($categories)): ?>
                                                                            <?php foreach($categories as $categroy): ?>
                                                                                  <option value='<?php echo $categroy->id; ?>'><?php echo $categroy->name; ?></option>
                                                                           <?php  endforeach; ?>
                                                                           <?php endif; ?>

                                                                        </select>

                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-default" type="button" data-select2-open="single-append-text">
                                                                                <span class="glyphicon glyphicon-search"></span>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                        <span class="error category-error text-danger"></span> 
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group variation-checkbox">
                                                                <label class="col-md-2 control-label">Variation checkbox:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                   
                                                                    <div class="input-group">
                                                                            <div class="icheck-inline">
                                                                                <label > <input type="checkbox" class="icheck color" id='color' data-checkbox="icheckbox_square-grey" value='color'> Color </label>
                                                                                <label > <input type="checkbox"  class="icheck size"   data-checkbox="icheckbox_square-grey" value='size'> Size </label>
                                                                                <label > <input type="checkbox" class="icheck dimension"  data-checkbox="icheckbox_square-grey"   value='dimension'> Dimension </label>
                                                                                <label > <input type="checkbox" class="icheck weight"   data-checkbox="icheckbox_square-grey"  value='weight'>  Weight </label>
                                                                                
                                                                            </div>
                                                                        </div>   
                                                                </div>
                                                            </div>
                                                            <div class="form-group variation-color">
                                                                <label class="col-md-2 control-label">Color: 
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                   
                                                                        <div class="input-group">
                                                                            <div class="icheck-inline">
                                                                                <label> <input type="radio" name="color" class="icheck" data-radio="iradio_square-grey" value='transparent' data-colorCode=''> <span style='background-color: #fff;height: 40px;width: 40px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Transparent </label>
                                                                            <?php if(isset($colors)): ?>
                                                                                <?php foreach ($colors as $color) { ?>
                                                                                   
                                                                                <label> <input type="radio" name="color" class="icheck" data-radio="iradio_square-grey" value='<?php echo $color->name; ?>' data-colorCode='<?php echo $color->code; ?>'> <span style='background-color: <?php echo $color->code; ?>;height: 40px;width: 40px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <?php echo $color->name; ?> </label>
                                                                               <?php } ?>
                                                                               <!--  <label> <input type="radio" name="color" class="icheck" data-radio="iradio_square-grey"> <span style='background-color: #000;height: 40px;width: 40px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Black </label>
                                                                                <label> <input type="radio" name="color" class="icheck" data-radio="iradio_square-grey"> <span style='background-color: #000;height: 40px;width: 40px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Black </label>
                                                                                <label> <input type="radio" name="color" class="icheck" data-radio="iradio_square-grey"> <span style='background-color: #000;height: 40px;width: 40px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Black </label>
                                                                                <label> <input type="radio" name="color" class="icheck" data-radio="iradio_square-grey"> <span style='background-color: #000;height: 40px;width: 40px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Black </label>
                                                                                <label> <input type="radio" name="color" class="icheck" data-radio="iradio_square-grey"> <span style='background-color: #000;height: 40px;width: 40px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Black </label>
                                                                                <label> <input type="radio" name="color" class="icheck" data-radio="iradio_square-grey"> <span style='background-color: #000;height: 40px;width: 40px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Black </label>
                                                                                <label> <input type="radio" name="color" class="icheck" data-radio="iradio_square-grey"> <span style='background-color: #000;height: 40px;width: 40px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Black </label>-->                                                                    
                                                                               <span class="error color-error text-danger"></span> 
                                                                                <?php else: ?>
                                                                                    <h3>No Colors available</h3>
                                                                                <?php endif; ?>            
                                                                    </div>
                                                                        </div>   
                                                                </div>
                                                             </div>

                                                              <div class="form-group variation-weight">
                                                                <label class="col-md-2 control-label">Weight:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-2">
                                                                   <input type="number" min='0' name="weight" class='form-control product-weight'>
                                                                   <span class="error weight-error text-danger"></span> 
                                                                   
                                                                </div>
                                                                 <div class="col-md-2">
                                                                    <select class="form-control weight-unit" >
                                                                       <option value=''>Select unit</option>
                                                                       <option value='mg'>Milligram (mg)</option>
                                                                       <option value='g'>Gram (g)</option>
                                                                       <option value='kg'>kilogram (km)</option>
                                                                       <option value='oz'>ounce (oz)</option>
                                                                       
                                                                   </select>
                                                                       <span class="error weight-unit-error text-danger"></span> 
                                                                 </div>
                                                             </div>
                                                            <div class="form-group variation-height">
                                                                <label class="col-md-2 control-label">Height:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-2">
                                                                   <input type="number" min='0' name="height" class='form-control product-height'>
                                                                       <span class="error height-error text-danger"></span> 
                                                                   
                                                                </div>
                                                                 <div class="col-md-2">
                                                                    <select class="form-control height-unit">
                                                                       <option value=''>Select unit</option>
                                                                       <option value='mm'>millimeter (mm)</option>
                                                                       <option value='cm'>centimeter (cm)</option>
                                                                       <option value='in'>inch (in)</option>
                                                                       <option value='ft'>feet (ft)</option>
                                                                       <option value='m'>meter (m)</option>
                                                                       
                                                                   </select>
                                                                       <span class="error height-unit-error text-danger"></span> 
                                                                 </div>
                                                             </div>
                                                                      
                                                              <div class="form-group variation-width">
                                                                <label class="col-md-2 control-label">Width:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-2">
                                                                   <input type="number" min='0' name="width" class='form-control product-width'>
                                                                       <span class="error width-error text-danger"></span> 
                                                                   
                                                                </div>
                                                                 <div class="col-md-2">
                                                                    <select class="form-control width-unit">
                                                                       <option value=''>Select unit</option>
                                                                       <option value='mm'>millimeter (mm)</option>
                                                                       <option value='cm'>centimeter (cm)</option>
                                                                       <option value='in'>inch (in)</option>
                                                                       <option value='ft'>feet (ft)</option>
                                                                       <option value='m'>meter (m)</option>
                                                                   </select>

                                                                       <span class="error width-unit-error text-danger"></span> 
                                                                 </div>
                                                             </div> 
                                                               <div class="form-group variation-length">
                                                                <label class="col-md-2 control-label">Length:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-2">
                                                                   <input type="number" min='0' name="length" class='form-control product-length'>
                                                                       <span class="error product-length-error text-danger"></span> 
                                                                   
                                                                </div>
                                                                 <div class="col-md-2">
                                                                    <select class="form-control length-unit">
                                                                       <option value=''>Select unit</option>
                                                                       <option value='mm'>millimeter (mm)</option>
                                                                       <option value='cm'>centimeter (cm)</option>
                                                                       <option value='in'>inch (in)</option>
                                                                       <option value='ft'>feet (ft)</option>
                                                                       <option value='m'>meter (m)</option>
                                                                   </select>
                                                                       <span class="error length-unit-error text-danger"></span> 
                                                                   
                                                                 </div>
                                                             </div>
                                                             <div class="form-group variation-thickness">
                                                                <label class="col-md-2 control-label">Thickness:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-2">
                                                                   <input type="number" min='0' name="thickness" class='form-control product-thickness'>
                                                                   <span class="error thickness-error text-danger"></span> 
                                                                   
                                                                </div>
                                                                 <div class="col-md-2">
                                                                    <select class="form-control thickness-unit" >
                                                                      <option value=''>Select unit</option>
                                                                       <option value='mm'>millimeter (mm)</option>
                                                                       <option value='cm'>centimeter (cm)</option>
                                                                       <option value='in'>inch (in)</option>
                                                                       <option value='ft'>feet (ft)</option>
                                                                       <option value='m'>meter (m)</option>
                                                                       
                                                                   </select>
                                                                       <span class="error thickness-unit-error text-danger"></span> 
                                                                 </div>
                                                             </div>          
                                                            <div class="form-group variation-size">
                                                                <label class="col-md-2 control-label">Size:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                   <select name='variation-size' class="variation-size form-control">
                                                                        <option value="">Select size </option>
                                                                        <option value="s">Small (S)</option>
                                                                        <option value="m">Medium (M)</option>
                                                                        <option value="l">Large (L)</option>
                                                                        <option value="xl">Extra Large (XL)</option>
                                                                        <option value="xxl"> Double Extra Large (XXL)</option>
                                                                   </select>
                                                                       <span class="error variation-size-error text-danger"></span> 
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">SKU:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                    <input type="text" class="form-control product_sku" name="product[sku]" placeholder=""> 
                                                                    <span class="error sku-error text-danger"></span> 
                                                                </div>
                                                                
                                                                <label class="col-md-2 control-label">Quantity:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                    <input type="number" class="form-control product_qty" name="product[qty]" placeholder=""> 
                                                                <span class="error qty-error text-danger"></span> 
                                                                </div>


                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Price:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                    <input  type="number" min='0' value="0" name="demo2" class="form-control product_price"> 
                                                               <span class="error price-error text-danger"></span> 
                                                                </div>

                                                                <label class="col-md-2 control-label">Shipping cost:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                    <input id="touchspin_3" type="text" value="0" name="demo2" class="form-control product_shipping"> 
                                                               <span class="error shipping-error text-danger"></span> 
                                                                </div>
                                                            </div>
                                                             <div class="form-group">
                                                                <label class="col-md-2 control-label">Image
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <form id="product_image" method="POST" action='<?php echo base_url('product/upload_image'); ?>' enctype="multipart/form-data">
                                                                      
                                                                                <input type="file" name="file" id='file'> 
                                                                                <span class="error image-error text-danger"></span> 
                                                                            
                                                                          
                                                                                <div class="progressBar">
                                                                                    <div class="bar"></div>
                                                                                    <div class="percent">0%</div>
                                                                                </div>
                                                                    </form>
                                                                    <img src="" class='uploaded_image'>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="col-md-2 control-label">
                                                                         <span class="required"></span>
                                                                </label>

                                                                <div class="col-md-10">
                                                                    <a class="btn dark btn-outline sbold product-image-modal" href="<?php echo base_url('product/get_product_images'); ?>"  data-target="#ajax" data-toggle="modal">Select Image</a>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Status:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <select class="table-group-action-input form-control input-medium product_status" name="product[status]">
                                                                        <option value="">Select...</option>
                                                                        <option value="1">Published</option>
                                                                        <option value="0">Not Published</option>
                                                                    </select>
                                                                    <span class="error status-error text-danger"></span> 
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                            <label class="col-md-2 control-label">
                                                                    <span class="required"> &nbsp; </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="hidden" value='' class='thumbnail' name="thumbnail">
                                                                    <button type="button" data-loading-text="Loading..." class="btn btn-primary btn-lg mt-ladda-btn ladda-button mt-progress-demo add_product" data-style="expand-left">
                                                                        <span class="ladda-label">Submit</span>
                                                                    </button>
                                                                    <h2 class="alert alert-success product-msg">successfully add new porduct,<b> <a href='<?php base_url('product/create'); ?>'>Add another</a></b></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- excel tab -->
                                                     <div class="tab-pane " id="excel_tab">
                                                     <div class="excel-upload-form">
                                                         <h3 class="text-center">Choose excel file to upload</h3>
                                                            <div class="form-body">

                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Category:
                                                                     <span class="required"> * </span>
                                                                    </label>
                                                                    <div class="col-md-9">
                                                                           <select class="category-list form-control category-select-list" >
                                                                               <option value=''> Choose categroy</option>
                                                                               <?php if(isset($categories)): ?>
                                                                                <?php foreach($categories as $categroy): ?>
                                                                                      <option value='<?php echo $categroy->id; ?>'><?php echo $categroy->name; ?></option>
                                                                               <?php  endforeach; ?>
                                                                               <?php endif; ?>
                                                                           </select> 
                                                                        <span class="error category-error text-danger"></span> 
                                                                     </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Choose excel:
                                                                         <span class="required"> * </span>
                                                                    </label>
                                                                    <div class="col-md-9">
                                                                     <form method='POST' action="<?php echo base_url('product/excelUploadOnly'); ?>" enctype="multipart/form-data" class="" id='uploadExelFile'  style="margin-top: 10px;">
                                                         
                                                                       <input type="file" name='file' class="excel-upload"></p>
                                                                       <div class="progressBar">
                                                                            <div class="bar"></div>
                                                                            <div class="percent">0%</div>
                                                                        </div>
                                                                        <span class="text-danger excel-file-error" ></span>
                                                                      </form>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                   
                                                                    <div class="col-md-9 col-md-offset-3">
                                                                      <input type="hidden" name="excel-file" class="excel-file" value=''>
                                                                       <input type="submit" class="btn btn-primary bt-lg upload-excel-btn" name='upload_excel' value='Upload'></p>
                                                                      
                                                                    </div>
                                                                </div>  
                                                            </div>
                                                           
                                                     </div>
                                                     </div>
                                                    <!-- excel tab end-->

                                                     <!-- excel tab 2 -->
                                                     <div class="tab-pane " id="excel_tab_download">
                                                        <div class="excel-download">
                                                            <?php if(isset($excels)): ?>
                                                     <table class="table table-hover table-light">
                                                                <thead>
                                                                   
                                                                    <tr class="uppercase">
                                                                        <th> # </th>
                                                                        <th> Category </th>
                                                                        <th> Download </th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i=1; ?>
                                                                <?php foreach ($excels as $excel): ?>
                                                                    <tr>
                                                                        <td> <?php echo $i; ?> </td>
                                                                       
                                                                        <td><?php echo ucwords($excel->category); ?></td>
                                                                        <td>
                                                                            <a class="btn btn-primary" href='<?php echo base_url('myexcels/'.$excel->name); ?>' download>Download</a>
                                                                        </td>
                                                                    </tr>

                                                                    <?php $i++; ?>
                                                                <?php endforeach; ?>
                                                                   
                                                                </tbody>
                                                            </table>
                                                        <?php else: ?>
                                                            <h3 class="text-center"> No Excel available !</h3>
                                                        <?php endif; ?>
                                                        </div>
                                                     </div>
                                                    <!-- excel tab end-->
                                                    
                                                    
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

                 <!--DOC: Aplly "modal-cached" class after "modal" class to enable ajax content caching-->
                    <div class="modal modal-cached fade" id="ajax" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="product-ajax-loader text-center">
                                    <img src="<?php echo base_url(); ?>/assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
                                    <span> &nbsp;&nbsp;Loading... </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal -->
         
        