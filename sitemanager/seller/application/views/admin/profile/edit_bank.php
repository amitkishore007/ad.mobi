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
                                                            <i class="fa fa-gift"></i>Edit bank details </div>
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
                                                                       
                                                                        <td><strong>Account holder name: </strong></td>
                                                                        <td>
                                                                        <!-- <select name="country" id="country" class="form-control">
                                                                            <option value="">Select Country</option>
                                                                            <option value="India">India</option>

                                                                        </select> -->
                                                                        <input type="text" name="holder_name" id="holder_name" class="form-control holder_name" value="<?php echo $my_profile->account_holder_name; ?>">
                                                                        <span class="error text-danger holder_name-error"></span>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Account Number: </strong></td>
                                                                        <td><!-- <select name="state" id="state" class="form-control">
                                                                            <option value="">state</option>
                                                                            <option value="Delhi">Delhi</option>
                                                                            <option value="UP">UP</option>

                                                                        </select> -->
                                                                        
                                                                        <input type="text" name="account_number" id="account_number" class="form-control account_number" value="<?php echo $my_profile->account_number; ?>">
                                                                        <span class="error text-danger account_number-error"></span>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Bank name: </strong></td>
                                                                        <td>
                                                                        <!-- <select name="city" id="city" class="form-control">
                                                                            <option value="">City</option>
                                                                            <option value="New delhi">New delhi</option>
                                                                           
                                                                        </select> -->
                                                                        <input type="text" name="bank_name" id="bank_name" class="form-control bank_name" value="<?php echo $my_profile->bank_name; ?>">
                                                                        <span class="error text-danger bank_name-error"></span>
                                                                        </td>
                                                                       
                                                                    </tr>

                                                                    <tr>
                                                                       
                                                                        <td><strong>State: </strong></td>
                                                                        <td>
                                                                        <!-- <select name="city" id="city" class="form-control">
                                                                            <option value="">City</option>
                                                                            <option value="New delhi">New delhi</option>
                                                                           
                                                                        </select> -->
                                                                        <input type="text" name="bank_state" id="bank_state" class="form-control bank_state" value="<?php echo $my_profile->state; ?>">
                                                                        <span class="error text-danger bank_state-error"></span>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                            <tr>
                                                                       
                                                                        <td><strong>city: </strong></td>
                                                                        <td>
                                                                        <!-- <select name="city" id="city" class="form-control">
                                                                            <option value="">City</option>
                                                                            <option value="New delhi">New delhi</option>
                                                                           
                                                                        </select> -->
                                                                        <input type="text" name="bank_city" id="bank_city" class="form-control bank_city" value="<?php echo $my_profile->city; ?>">
                                                                        <span class="error text-danger bank_city-error"></span>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Branch : </strong></td>
                                                                        <td><input type="number"  min="0" class="form-control branch" value="<?php echo $my_profile->branch; ?>">
                                                                        <span class="error text-danger branch-error"></span>
                                                                        </td>
                                                                       
                                                                    </tr>

                                                                    <tr>
                                                                       
                                                                        <td><strong>IFSC: </strong></td>
                                                                        <td><input name="ifsc" id="ifsc" placeholder="ifsc code" class="form-control ifsc" value='<?php echo $my_profile->ifsc; ?>' />    
                                                                        <span class="error text-danger ifsc-error"></span>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Pan: </strong></td>
                                                                        <td><input type="text" name='pan' class="form-control pan" value="<?php echo $my_profile->pan; ?>">
                                                                        <span class="error text-danger pan-error"></span>
                                                                        </td>
                                                                      
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Business Pan: </strong></td>
                                                                        <td><input type="text" name='business_pan' class="form-control business_pan" value="<?php echo $my_profile->business_pan; ?>">
                                                                        <span class="error text-danger business_pan-error"></span>
                                                                        </td>
                                                                      
                                                                       
                                                                    </tr>

                                                                    <tr>
                                                                       
                                                                        <td><strong>&nbsp; </strong></td>
                                                                        <td><input type="submit" class="submit-bank btn btn-primary"></td>

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