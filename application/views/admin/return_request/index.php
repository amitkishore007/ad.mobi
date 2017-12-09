
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <div class="container">
                    <div class="page-content-inner">
                        <div class="mt-content-body">
                            
                            <div class="row">
                                 <div class="col-md-12">
                                    <div class="portlet light">
                                                    <div class="portlet-title tabbable-line">
                                                        <div class="caption">
                                                            <i class="icon-pin font-yellow-crusta"></i>
                                                            <span class="caption-subject bold font-yellow-crusta uppercase"> Manage Return request </span>
                                                            <span class="caption-helper"></span>
                                                        </div>
                                                        <ul class="nav nav-tabs">
                                                            <li class='active'>
                                                                <a href="#portlet_tab3" data-toggle="tab"> Pending </a>
                                                            </li>
                                                            <li>
                                                                <a href="#portlet_tab2" data-toggle="tab"> Approved </a>
                                                            </li>
                                                            <li>
                                                                <a href="#portlet_tab3" data-toggle="tab"> Disproved  </a>
                                                            </li>
                                                            
                                                            
                                                        </ul>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="portlet_tab1">
                                                                <div class="scroller" style="height: 200px;">
                                                                    <table class="table table-striped table-bordered table-advance table-hover delivered-order-table">
                                                <thead>
                                                    <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                               
                                                    <th>phone</th>
                                                    <th><i class="fa fa-briefcase"></i> Address</th>
                                                  
                                                    <th>qty</th>
                                                    <th class="hidden-xs">
                                                             Order Note </th>
                                                        <th>
                                                            <i class="fa fa-bookmark"></i> Total </th>
                                                        <th> Payment Mode </th>
                                                        <th>view</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php if (isset($my_orders)) : $i=1; ?>
                                                        <?php foreach ($my_orders as $order):  ?>
                                                            <?php if($order->order_status=='delivered'): ?>
                                                            <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo ucwords($order->fname.' '.$order->lname); ?></td>
                                                          
                                                            <td><?php echo $order->phone; ?></td>
                                                            <td>
                                                            <b>Address: </b><?php echo htmlentities($order->address); ?><br/>
                                                            <b>City: </b><?php echo htmlentities($order->city); ?><br/>
                                                            <b>Country: </b><?php echo htmlentities($order->country); ?><br/>
                                                            <b>Pincode: </b><?php echo htmlentities($order->pincode); ?><br/>
                                                            </td>
                                                            <td><?php echo $order->qty; ?></td>
                                                            <td class="hidden-xs"> Server hardware purchase </td>
                                                                <td> Rs.<?php echo $order->subtotal;  ?>
                                                                    <span class="label label-sm label-success label-mini"> cod </span>
                                                                </td>
                                                                <td>COD</td>
                                                                <td>
                                                                    <a href="<?php echo base_url('order/view_order/'.$order->order_id); ?>" class="btn dark btn-sm btn-outline">
                                                                        <i class="fa fa-share"></i> View </a>
                                                                    
                                                                </td>
                                                                <td>
                                                                <select class='order-status' data-orderId='<?php echo $order->order_id; ?>'>
                                                                    <option value='delivered' <?php echo  $order->order_status=='delivered' ? 'selected' : ''; ?>>Delivered</option>
                                                                    
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        <?php $i++; endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><h4>Nothing here</h4></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        </tr>
                                                <?php endif; ?>
                                                  
                                               
                                                   
                                                </tbody>
                                            </table>
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="portlet_tab2">
                                                                <div class="scroller" style="height: 200px;">
                                                                    <table class="table table-striped table-bordered table-advance table-hover delivered-order-table">
                                                <thead>
                                                    <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                               
                                                    <th>phone</th>
                                                    <th><i class="fa fa-briefcase"></i> Address</th>
                                                  
                                                    <th>qty</th>
                                                    <th class="hidden-xs">
                                                             Order Note </th>
                                                        <th>
                                                            <i class="fa fa-bookmark"></i> Total </th>
                                                        <th> Payment Mode </th>
                                                        <th>view</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php if (isset($my_orders)) : $i=1; ?>
                                                        <?php foreach ($my_orders as $order):  ?>
                                                            <?php if($order->order_status=='delivered'): ?>
                                                            <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo ucwords($order->fname.' '.$order->lname); ?></td>
                                                          
                                                            <td><?php echo $order->phone; ?></td>
                                                            <td>
                                                            <b>Address: </b><?php echo htmlentities($order->address); ?><br/>
                                                            <b>City: </b><?php echo htmlentities($order->city); ?><br/>
                                                            <b>Country: </b><?php echo htmlentities($order->country); ?><br/>
                                                            <b>Pincode: </b><?php echo htmlentities($order->pincode); ?><br/>
                                                            </td>
                                                            <td><?php echo $order->qty; ?></td>
                                                            <td class="hidden-xs"> Server hardware purchase </td>
                                                                <td> Rs.<?php echo $order->subtotal;  ?>
                                                                    <span class="label label-sm label-success label-mini"> cod </span>
                                                                </td>
                                                                <td>COD</td>
                                                                <td>
                                                                    <a href="<?php echo base_url('order/view_order/'.$order->order_id); ?>" class="btn dark btn-sm btn-outline">
                                                                        <i class="fa fa-share"></i> View </a>
                                                                    
                                                                </td>
                                                                <td>
                                                                <select class='order-status' data-orderId='<?php echo $order->order_id; ?>'>
                                                                    <option value='delivered' <?php echo  $order->order_status=='delivered' ? 'selected' : ''; ?>>Delivered</option>
                                                                    
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        <?php $i++; endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><h4>Nothing here</h4></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        </tr>
                                                <?php endif; ?>
                                                  
                                               
                                                   
                                                </tbody>
                                            </table>
                                                                    
                                                                </div>
                                                            </div>
                                                           
                                                           <div class="tab-pane" id="portlet_tab3">
                                                                <div class="scroller" style="height: 200px;">
                                                                    <table class="table table-striped table-bordered table-advance table-hover delivered-order-table">
                                                <thead>
                                                    <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                               
                                                    <th>phone</th>
                                                    <th><i class="fa fa-briefcase"></i> Address</th>
                                                  
                                                    <th>qty</th>
                                                    <th class="hidden-xs">
                                                             Order Note </th>
                                                        <th>
                                                            <i class="fa fa-bookmark"></i> Total </th>
                                                        <th> Payment Mode </th>
                                                        <th>view</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php if (isset($my_orders)) : $i=1; ?>
                                                        <?php foreach ($my_orders as $order):  ?>
                                                            <?php if($order->order_status=='delivered'): ?>
                                                            <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo ucwords($order->fname.' '.$order->lname); ?></td>
                                                          
                                                            <td><?php echo $order->phone; ?></td>
                                                            <td>
                                                            <b>Address: </b><?php echo htmlentities($order->address); ?><br/>
                                                            <b>City: </b><?php echo htmlentities($order->city); ?><br/>
                                                            <b>Country: </b><?php echo htmlentities($order->country); ?><br/>
                                                            <b>Pincode: </b><?php echo htmlentities($order->pincode); ?><br/>
                                                            </td>
                                                            <td><?php echo $order->qty; ?></td>
                                                            <td class="hidden-xs"> Server hardware purchase </td>
                                                                <td> Rs.<?php echo $order->subtotal;  ?>
                                                                    <span class="label label-sm label-success label-mini"> cod </span>
                                                                </td>
                                                                <td>COD</td>
                                                                <td>
                                                                    <a href="<?php echo base_url('order/view_order/'.$order->order_id); ?>" class="btn dark btn-sm btn-outline">
                                                                        <i class="fa fa-share"></i> View </a>
                                                                    
                                                                </td>
                                                                <td>
                                                                <select class='order-status' data-orderId='<?php echo $order->order_id; ?>'>
                                                                    <option value='delivered' <?php echo  $order->order_status=='delivered' ? 'selected' : ''; ?>>Delivered</option>
                                                                    
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        <?php $i++; endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><h4>Nothing here</h4></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        </tr>
                                                <?php endif; ?>
                                                  
                                               
                                                   
                                                </tbody>
                                            </table>
                                                                    
                                                                </div>
                                                            </div>
                                                           <div class="tab-pane" id="portlet_tab4">
                                                                <div class="scroller" style="height: 200px;">
                                                                    <table class="table table-striped table-bordered table-advance table-hover delivered-order-table">
                                                <thead>
                                                    <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                               
                                                    <th>phone</th>
                                                    <th><i class="fa fa-briefcase"></i> Address</th>
                                                  
                                                    <th>qty</th>
                                                    <th class="hidden-xs">
                                                             Order Note </th>
                                                        <th>
                                                            <i class="fa fa-bookmark"></i> Total </th>
                                                        <th> Payment Mode </th>
                                                        <th>view</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php if (isset($my_orders)) : $i=1; ?>
                                                        <?php foreach ($my_orders as $order):  ?>
                                                            <?php if($order->order_status=='delivered'): ?>
                                                            <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo ucwords($order->fname.' '.$order->lname); ?></td>
                                                          
                                                            <td><?php echo $order->phone; ?></td>
                                                            <td>
                                                            <b>Address: </b><?php echo htmlentities($order->address); ?><br/>
                                                            <b>City: </b><?php echo htmlentities($order->city); ?><br/>
                                                            <b>Country: </b><?php echo htmlentities($order->country); ?><br/>
                                                            <b>Pincode: </b><?php echo htmlentities($order->pincode); ?><br/>
                                                            </td>
                                                            <td><?php echo $order->qty; ?></td>
                                                            <td class="hidden-xs"> Server hardware purchase </td>
                                                                <td> Rs.<?php echo $order->subtotal;  ?>
                                                                    <span class="label label-sm label-success label-mini"> cod </span>
                                                                </td>
                                                                <td>COD</td>
                                                                <td>
                                                                    <a href="<?php echo base_url('order/view_order/'.$order->order_id); ?>" class="btn dark btn-sm btn-outline">
                                                                        <i class="fa fa-share"></i> View </a>
                                                                    
                                                                </td>
                                                                <td>
                                                                <select class='order-status' data-orderId='<?php echo $order->order_id; ?>'>
                                                                    <option value='delivered' <?php echo  $order->order_status=='delivered' ? 'selected' : ''; ?>>Delivered</option>
                                                                    
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        <?php $i++; endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><h4>Nothing here</h4></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        </tr>
                                                <?php endif; ?>
                                                  
                                               
                                                   
                                                </tbody>
                                            </table>
                                                                    
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                </div>
                            </div>  
                           
            
                        </div>
                    </div>
                </div>
               
               
                    

            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
