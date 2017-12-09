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
                                                            <i class="fa fa-gift"></i>Edit Personal details </div>
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
                                                                       
                                                                        <td><strong>username: </strong></td>
                                                                        <td><input type="text" name='username' class="form-control username" value='<?php echo $my_profile->username; ?>'/>
                                                                        <span class="error text-danger username-error"></span>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>First name: </strong></td>
                                                                        <td><input type="text" name='fname' class="form-control fname" value='<?php echo $my_profile->fname; ?>'/>
                                                                        <span class="error text-danger fname-error"></span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Last name: </strong></td>
                                                                        <td><input type="text" name='lname' class="form-control lname" value='<?php echo $my_profile->lname; ?>'/>
                                                                        <span class="error text-danger lname-error"></span>
                                                                        </td>
                                                                       
                                                                    </tr>
                                        
                                                                    <tr>
                                                                       
                                                                        <td><strong>Gender : </strong></td>
                                                                        <td>
                                                                        <select name="gender" id="gender">
                                                                            <option value="">Select gender</option>
                                                                            <option value="male" <?php echo $my_profile=='male' ? 'selected' :''; ?>>Male</option>
                                                                            <option value="female" <?php echo $my_profile=='fmale' ? 'selected' :''; ?>>Female</option>
                                                                        </select>
                                                                        <span class="error text-danger gender-error"></span>
                                                                        </td>
                                                                       
                                                                    </tr>

                                                                   
                                                                    

                                                                    <tr>
                                                                       
                                                                        <td><strong>&nbsp; </strong></td>
                                                                        <td><input type="submit" class="btn btn-primary submit-personal-info"></td>

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