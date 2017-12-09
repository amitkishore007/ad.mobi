     <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                      <div class="container">
                            <div class="page-content-inner">
                                <div class="mt-content-body">
                                    
                                   <div class="row">
                                            <div class="col-md-4 ">
                                                <!-- BEGIN Portlet PORTLET-->
                                                <div class="portlet box blue-hoki">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-gift"></i>Personal details </div>
                                                        <div class="tools">
                                                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                                            <a href="#" class="fullscreen" data-original-title="" title=""> </a>
                                                           </div>
                                                        <div class="actions">
                                                            <a href="javascript:;" class="btn btn-default btn-sm">
                                                                <i class="fa fa-pencil"></i> Edit </a>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                                        <div class="scroller" style="height: 250px; overflow: hidden; width: auto;" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd" data-initialized="1">
                                                            <table class="table table-hover">
                                                                
                                                                    <tr>
                                                                       
                                                                        <td><strong>Username: </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->username); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>first name: </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->fname); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Last name: </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->lname); ?></td>
                                                                       
                                                                    </tr>
                                        
                                                                    <tr>
                                                                       
                                                                        <td><strong>Email : </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->email); ?></td>
                                                                       
                                                                    </tr>

                                                                    <tr>
                                                                       
                                                                        <td><strong>Phone: </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->phone); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Gender: </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->gender); ?></td>
                                                                       
                                                                    </tr>
                                                                    
                                                            </table>
                                                            <br> 
                                                            </div><div class="slimScrollBar" style="background: rgb(161, 178, 189); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 110.803px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; border-radius: 7px; background: yellow; opacity: 0.2; z-index: 90; right: 1px; display: none;"></div></div>
                                                    </div>
                                                </div>
                                                <!-- END Portlet PORTLET-->
                                            </div>
                                            <div class="col-md-4 ">
                                                <!-- BEGIN Portlet PORTLET-->
                                                <div class="portlet box red">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-gift"></i>Address </div>
                                                        <div class="tools">
                                                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                                            <a href="#" class="fullscreen" data-original-title="" title=""> </a>
                                                           </div>
                                                        <div class="actions">
                                                            <a href="javascript:;" class="btn btn-default btn-sm">
                                                                <i class="fa fa-pencil"></i> Edit </a>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                                        <div class="scroller" style="height: 250px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red" data-initialized="1">
                                                            <table class="table table-hover">
                                                                
                                                                    <tr>
                                                                       
                                                                        <td><strong>Country: </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->country); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>State: </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->state); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>City: </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->city); ?></td>
                                                                       
                                                                    </tr>
                                        
                                                                    <tr>
                                                                       
                                                                        <td><strong>Pincode : </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->zipcode); ?></td>
                                                                       
                                                                    </tr>

                                                                    <tr>
                                                                       
                                                                        <td><strong>Address: </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->address); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Sub address: </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->address_two); ?></td>
                                                                       
                                                                    </tr>
                                                                    
                                                            </table>
                                                            <br>  </div></div>
                                                    </div>
                                                </div>
                                                <!-- END Portlet PORTLET-->
                                            </div>
                                            <div class="col-md-4 ">
                                                <!-- BEGIN Portlet PORTLET-->
                                                <div class="portlet box yellow">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-gift"></i>Bank Details </div>
                                                        <div class="tools">
                                                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                                            <a href="#" class="fullscreen" data-original-title="" title=""> </a>
                                                           </div>
                                                        <div class="actions">
                                                            <a href="javascript:;" class="btn btn-default btn-sm">
                                                                <i class="fa fa-pencil"></i> Edit </a>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <!-- <div class="" style="position: relative; overflow: hidden; width: auto; height: 250px;"> -->
                                                        <div class="scroller" style="height: 250px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="1" data-rail-color="red" data-handle-color="green" data-initialized="1">
                                                            <table class="table table-hover">
                                                                
                                                                    <tr>
                                                                       
                                                                        <td><strong>Account holder name: </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->account_holder_name); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Account number: </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->account_number); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Bank name: </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->bank_name); ?></td>
                                                                       
                                                                    </tr>
                                        
                                                                    <tr>
                                                                       
                                                                        <td><strong>Branch : </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->branch); ?></td>
                                                                       
                                                                    </tr>

                                                                    <tr>
                                                                       
                                                                        <td><strong>IFSC Code: </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->ifsc); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Business Pan: </strong></td>
                                                                        <td><?php echo htmlentities($my_profile->business_pan); ?></td>
                                                                       
                                                                    </tr>
                                                                    
                                                            </table>
                                                            <br> </div>
                                                            <!-- </div> -->
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