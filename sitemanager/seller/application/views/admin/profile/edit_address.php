     <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                      <div class="container">
                            <div class="page-content-inner">
                                <div class="mt-content-body">
                                    
                                   <div class="row">
                                  
                                         
                                         
                                            <div class="col-md-12 ">
                                                <!-- BEGIN Portlet PORTLET-->
                                                <div class="portlet box red">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-gift"></i>Edit Address </div>
                                                        <div class="tools">
                                                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                                            <a href="#" class="fullscreen" data-original-title="" title=""> </a>
                                                           </div>
                                                        <div class="actions">
                                                            <a href="<?php echo base_url('admin/my_profile'); ?>" class="btn btn-default btn-sm">
                                                                <i class="fa fa-pencil"></i> Back </a>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="" style="position: relative; overflow: hidden; width: auto; height: auto;">
                                                        <div class="scroller" style="height: auto; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red" data-initialized="1">
                                                            <table class="table table-hover">
                                                                
                                                                    <tr>
                                                                       
                                                                        <td><strong>Country: </strong></td>
                                                                        <td>
                                                                        <!-- <select name="country" id="country" class="form-control">
                                                                            <option value="">Select Country</option>
                                                                            <option value="India">India</option>

                                                                        </select> -->
                                                                        <input type="text" name="country" id="country" class="form-control country" value="<?php echo $my_profile->seller_country; ?>">
                                                                        <span class="error text-danger country-error"></span>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>State: </strong></td>
                                                                        <td><!-- <select name="state" id="state" class="form-control">
                                                                            <option value="">state</option>
                                                                            <option value="Delhi">Delhi</option>
                                                                            <option value="UP">UP</option>

                                                                        </select> -->
                                                                        
                                                                        <input type="text" name="state" id="state" class="form-control state" value="<?php echo $my_profile->seller_state; ?>">
                                                                        <span class="error text-danger state-error"></span>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>City: </strong></td>
                                                                        <td>
                                                                        <!-- <select name="city" id="city" class="form-control">
                                                                            <option value="">City</option>
                                                                            <option value="New delhi">New delhi</option>
                                                                           
                                                                        </select> -->
                                                                        <input type="text" name="city" id="city" class="form-control city" value="<?php echo $my_profile->seller_city; ?>">
                                                                        <span class="error text-danger city-error"></span>
                                                                        </td>
                                                                       
                                                                    </tr>
                                        
                                                                    <tr>
                                                                       
                                                                        <td><strong>Pincode : </strong></td>
                                                                        <td><input type="number"  min="0" class="form-control pincode" value="<?php echo $my_profile->zipcode; ?>">
                                                                        <span class="error text-danger pincode-error"></span>
                                                                        </td>
                                                                       
                                                                    </tr>

                                                                    <tr>
                                                                       
                                                                        <td><strong>Address: </strong></td>
                                                                        <td><textarea name="address" id="address" placeholder="Address" class="form-control seller-address" rows="10"><?php echo $my_profile->address; ?></textarea>    
                                                                        <span class="error text-danger address-error"></span>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>landmark: </strong></td>
                                                                        <td><input type="text" name='landmark' class="form-control landmark" value="<?php echo $my_profile->landmark; ?>">
                                                                        <span class="error text-danger landmark-error"></span>
                                                                        </td>
                                                                      
                                                                       
                                                                    </tr>

                                                                    <tr>
                                                                       
                                                                        <td><strong>&nbsp; </strong></td>
                                                                        <td><input type="submit" class="submit-address btn btn-primary"></td>

                                                                    </tr>
                                                                  
                                                                    
                                                            </table>
                                                            <br>  </div></div>
                                                    </div>
                                                </div>
                                                <!-- END Portlet PORTLET-->
                                            </div>
                                            
                                        </div>

                    </div>
                    
                                </div>
                            </div>
                        </div>

                        
                </div>
                </div>