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
                                                       
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                                        <div class="scroller" style="height: 250px; overflow: hidden; width: auto;" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd" data-initialized="1">
                                                            <table class="table table-hover">
                                                                
                                                                    <tr>
                                                                       
                                                                        <td><strong>Username: </strong></td>
                                                                        <td><?php echo htmlentities($seller->username); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>first name: </strong></td>
                                                                        <td><?php echo htmlentities($seller->fname); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Last name: </strong></td>
                                                                        <td><?php echo htmlentities($seller->lname); ?></td>
                                                                       
                                                                    </tr>
                                        
                                                                    <tr>
                                                                       
                                                                        <td><strong>Email : </strong></td>
                                                                        <td><?php echo htmlentities($seller->email); ?></td>
                                                                       
                                                                    </tr>

                                                                    <tr>
                                                                       
                                                                        <td><strong>Phone: </strong></td>
                                                                        <td><?php echo htmlentities($seller->phone); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Gender: </strong></td>
                                                                        <td><?php echo htmlentities($seller->gender); ?></td>
                                                                       
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
                                                        
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                                        <div class="" style="height: 250px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red" data-initialized="1">
                                                            <table class="table table-hover">
                                                                
                                                                    <tr>
                                                                       
                                                                        <td><strong>Country: </strong></td>
                                                                        <td><?php echo htmlentities($seller->country); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>State: </strong></td>
                                                                        <td><?php echo htmlentities($seller->state); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>City: </strong></td>
                                                                        <td><?php echo htmlentities($seller->city); ?></td>
                                                                       
                                                                    </tr>
                                        
                                                                    <tr>
                                                                       
                                                                        <td><strong>Pincode : </strong></td>
                                                                        <td><?php echo htmlentities($seller->zipcode); ?></td>
                                                                       
                                                                    </tr>

                                                                    <tr>
                                                                       
                                                                        <td><strong>Address: </strong></td>
                                                                        <td><?php echo htmlentities($seller->address); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Sub address: </strong></td>
                                                                        <td><?php echo htmlentities($seller->address_two); ?></td>
                                                                       
                                                                    </tr>
                                                                    
                                                            </table>
                                                            <br>  </div><div class="slimScrollBar" style="background: red; width: 7px; position: absolute; top: 60px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 140.351px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: block; border-radius: 7px; background: blue; opacity: 0.2; z-index: 90; right: 1px;"></div></div>
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
                                                       
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><div class="scroller" style="height: 250px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="1" data-rail-color="red" data-handle-color="green" data-initialized="1">
                                                            <table class="table table-hover">
                                                                
                                                                    <tr>
                                                                       
                                                                        <td><strong>Account holder name: </strong></td>
                                                                        <td><?php echo htmlentities($seller->account_holder_name); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Account number: </strong></td>
                                                                        <td><?php echo htmlentities($seller->account_number); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Bank name: </strong></td>
                                                                        <td><?php echo htmlentities($seller->bank_name); ?></td>
                                                                       
                                                                    </tr>
                                        
                                                                    <tr>
                                                                       
                                                                        <td><strong>Branch : </strong></td>
                                                                        <td><?php echo htmlentities($seller->branch); ?></td>
                                                                       
                                                                    </tr>

                                                                    <tr>
                                                                       
                                                                        <td><strong>IFSC Code: </strong></td>
                                                                        <td><?php echo htmlentities($seller->ifsc); ?></td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                        <td><strong>Business Pan: </strong></td>
                                                                        <td><?php echo htmlentities($seller->business_pan); ?></td>
                                                                       
                                                                    </tr>
                                                                    
                                                            </table>
                                                            <br> </div><div class="slimScrollBar" style="background: green; width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 110.803px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: block; border-radius: 7px; background: red; opacity: 0.2; z-index: 90; right: 1px;"></div></div>
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