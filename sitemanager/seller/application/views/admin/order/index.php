
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper order-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <!-- BEGIN PAGE TITLE-->
                <pre>
               <?php //print_r($my_orders); ?>
                 </pre>
                 <div class="container">
                        <div class="page-content-inner">
                            <div class="mt-content-body">
                                
                               <div class="row">
                                   <div class="col-md-12 ">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class="icon-pin font-yellow-lemon"></i>
                                <span class="caption-subject bold font-yellow-lemon uppercase"> Manage orders </span>
                                <!-- <span class="caption-helper">more samples...</span> -->
                            </div>
                            <ul class="nav nav-tabs order-tabs">
                                <li class="active">
                                    <a href="#portlet_tab1" data-toggle="tab">Pending</a>
                                </li>
                                <li>
                                    <a href="#portlet_tab2" data-toggle="tab"> New orders  </a>
                                </li>
                                <li >
                                    <a href="#portlet_tab3" data-toggle="tab"> Packed orders </a>
                                </li>
                                 <li >
                                    <a href="#portlet_tab4" data-toggle="tab"> ready to dispatch </a>
                                </li>
                                 <li >
                                    <a href="#portlet_tab5" data-toggle="tab"> In transit </a>
                                </li>
                                 <li >
                                    <a href="#portlet_tab6" data-toggle="tab"> Delivered </a>
                                </li>
                              
                                 <li >
                                    <a href="#portlet_tab7" data-toggle="tab"> Seller cancel </a>
                                </li>
                              
                                 <li >
                                    <a href="#portlet_tab8" data-toggle="tab"> Discharge breaches </a>
                                </li>
                              
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="portlet_tab1">
                                    <div class="" >
                                       
                                        <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-shopping-cart"></i>Orders </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-advance table-hover pending-order-table">
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
                                                            <?php if($order->order_status=='pending'): ?>
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
                                                                    <a href="<?php echo base_url('order/view_order/'.$order->product_id); ?>" class="btn dark btn-sm btn-outline">
                                                                        <i class="fa fa-share"></i> View </a>
                                                                    
                                                                </td>
                                                                <td>
                                                                <select class='order-status' data-orderId='<?php echo $order->cart_id; ?>'>
                                                                    <option value='pending' <?php echo  $order->order_status=='pending' ? 'selected' : ''; ?>>Pending</option>
                                                                    <option value='new_order' <?php echo  $order->order_status=='new_order' ? 'selected' : ''; ?>>New Order</option>
                                                                    
                                                                </select>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                        <?php $i++; endforeach; ?>
                                                    
                                                <?php endif; ?>
                                                  
                                               
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SAMPLE TABLE PORTLET-->
                            </div>
                                    </div>
                                </div>
                                 
                                <div class="tab-pane" id="portlet_tab2">
                                    <div class="scroller" style="height: 1000px;">

                                      <div class="" >
                                       
                                        <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-shopping-cart"></i>Orders </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-advance table-hover new-order-table">
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
                                                            <?php if($order->order_status=='new_order'): ?>
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
                                                                    <a href="<?php echo base_url('order/view_order/'.$order->product_id); ?>" class="btn dark btn-sm btn-outline">
                                                                        <i class="fa fa-share"></i> View </a>
                                                                    
                                                                </td>
                                                                <td>
                                                                <select class='order-status' data-orderId='<?php echo $order->cart_id; ?>'>
                                                                    <option value='new_order' <?php echo  $order->order_status=='new_order' ? 'selected' : ''; ?>>New Order</option>
                                                                    <option value='packed' <?php echo  $order->order_status=='packed' ? 'selected' : ''; ?>>Packed</option>
                                                                    
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        <?php $i++; endforeach; ?>
                                                    
                                                <?php endif; ?>
                                                  
                                               
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SAMPLE TABLE PORTLET-->
                            </div>
                                    </div>  
                                    </div>
                                </div>
                                 <div class="tab-pane" id="portlet_tab3">
                                    <div class="scroller" style="height: 1000px;">
                                       <div class="" >
                                       
                                        <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-shopping-cart"></i>Orders </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-advance table-hover packed-order-table">
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
                                                            <?php if($order->order_status=='packed'): ?>
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
                                                                    <a href="<?php echo base_url('order/view_order/'.$order->product_id); ?>" class="btn dark btn-sm btn-outline">
                                                                        <i class="fa fa-share"></i> View </a>
                                                                    
                                                                </td>
                                                                <td>
                                                                <select class='order-status' data-orderId='<?php echo $order->cart_id; ?>'>
                                                                    <option value='packed' <?php echo  $order->order_status=='packed' ? 'selected' : ''; ?>>Packed</option>
                                                                    <option value='dispatch' <?php echo  $order->order_status=='dispatch' ? 'selected' : ''; ?>>Dispatch</option>
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        <?php $i++; endforeach; ?>
                                                    
                                                <?php endif; ?>
                                                  
                                               
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SAMPLE TABLE PORTLET-->
                            </div>
                                    </div> 
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="portlet_tab4">
                                    <div class="scroller" style="height: 1000px;">
                                       <div >
                                       
                                        <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-shopping-cart"></i>Orders </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-advance table-hover dispatch-order-table">
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
                                                            <?php if($order->order_status=='dispatch'): ?>
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
                                                                    <a href="<?php echo base_url('order/view_order/'.$order->product_id); ?>" class="btn dark btn-sm btn-outline">
                                                                        <i class="fa fa-share"></i> View </a>
                                                                    
                                                                </td>
                                                                <td>
                                                                <select class='order-status' data-orderId='<?php echo $order->cart_id; ?>'>
                                                                    <option value='dispatch' <?php echo  $order->order_status=='dispatch' ? 'selected' : ''; ?>>Dispatched</option>
                                                                    <option value='transit' <?php echo  $order->order_status=='transit' ? 'selected' : ''; ?>>in transit</option>
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        <?php $i++; endforeach; ?>
                                                    
                                                <?php endif; ?>
                                                  
                                               
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SAMPLE TABLE PORTLET-->
                            </div>
                                    </div> 
                                        
                                    </div>
                                </div>
                                 <div class="tab-pane" id="portlet_tab5">
                                    <div class="scroller" style="height: 1000px;">
                                      <div class="" >
                                       
                                        <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-shopping-cart"></i>Orders </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-advance table-hover intransit-order-table">
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
                                                            <?php if($order->order_status=='transit'): ?>
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
                                                                    <a href="<?php echo base_url('order/view_order/'.$order->product_id); ?>" class="btn dark btn-sm btn-outline">
                                                                        <i class="fa fa-share"></i> View </a>
                                                                    
                                                                </td>
                                                                <td>
                                                                <select class='order-status' data-orderId='<?php echo $order->cart_id; ?>'>
                                                                    <option value='transit' <?php echo  $order->order_status=='transit' ? 'selected' : ''; ?>>in transit</option>
                                                                    <option value='delivered' <?php echo  $order->order_status=='delivered' ? 'selected' : ''; ?>>Delivered</option>
                                                                    
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        <?php $i++; endforeach; ?>
                                                    
                                                <?php endif; ?>
                                                  
                                               
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SAMPLE TABLE PORTLET-->
                            </div>
                                    </div> 
                                        
                                    </div>
                                </div>
                                 <div class="tab-pane" id="portlet_tab6">
                                    <div class="scroller" style="height: 1000px;">
                                        <div>
                                       
                                        <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-shopping-cart"></i>Orders </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
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
                                                                    <a href="<?php echo base_url('order/view_order/'.$order->cart_id); ?>" class="btn dark btn-sm btn-outline">
                                                                        <i class="fa fa-share"></i> View </a>
                                                                    
                                                                </td>
                                                                <td>
                                                                <select class='order-status' data-orderId='<?php echo $order->cart_id; ?>'>
                                                                    <option value='delivered' <?php echo  $order->order_status=='delivered' ? 'selected' : ''; ?>>Delivered</option>
                                                                    
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        <?php $i++; endforeach; ?>
                                                    
                                                <?php endif; ?>
                                                  
                                               
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SAMPLE TABLE PORTLET-->
                            </div>
                                    </div> 
                                        
                                    </div>
                                </div>
                              
                             <div class="tab-pane" id="portlet_tab7">
                                    <div class="scroller" style="height: 1000px;">
                                        <div>
                                       
                                        <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-shopping-cart"></i>Orders </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
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
                                                            <?php if($order->order_status=='seller_cancel'): ?>
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
                                                                    <a href="<?php echo base_url('order/view_order/'.$order->cart_id); ?>" class="btn dark btn-sm btn-outline">
                                                                        <i class="fa fa-share"></i> View </a>
                                                                    
                                                                </td>
                                                                <td>
                                                                <select class='order-status' data-orderId='<?php echo $order->cart_id; ?>'>
                                                                    <option value='delivered' <?php echo  $order->order_status=='delivered' ? 'selected' : ''; ?>>Delivered</option>
                                                                    
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        <?php $i++; endforeach; ?>
                                                    
                                                <?php endif; ?>
                                                  
                                               
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SAMPLE TABLE PORTLET-->
                            </div>
                                    </div> 
                                        
                                    </div>
                                </div>

                                 <div class="tab-pane" id="portlet_tab8">
                                    <div class="scroller" style="height: 1000px;">
                                        <div>
                                       
                                        <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-shopping-cart"></i>Orders </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
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
                                                            <?php if($order->order_status=='discharge_breahes'): ?>
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
                                                                    <a href="<?php echo base_url('order/view_order/'.$order->cart_id); ?>" class="btn dark btn-sm btn-outline">
                                                                        <i class="fa fa-share"></i> View </a>
                                                                    
                                                                </td>
                                                                <td>
                                                                <select class='order-status' data-orderId='<?php echo $order->cart_id; ?>'>
                                                                    <option value='delivered' <?php echo  $order->order_status=='delivered' ? 'selected' : ''; ?>>Delivered</option>
                                                                    
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        <?php $i++; endforeach; ?>
                                                    
                                                <?php endif; ?>
                                                  
                                               
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SAMPLE TABLE PORTLET-->
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
                    </div>

            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
