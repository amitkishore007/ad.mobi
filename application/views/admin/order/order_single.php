        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
               
                <div class="col-md-12 ">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                           
                            <ul class="nav nav-tabs order-tabs">
                                <li class="active">
                                    <a href="#portlet_tab1" data-toggle="tab">Order</a>
                                </li>
                               
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="portlet_tab1">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="portlet blue-hoki box">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-cogs"></i>Order Details </div>
                                                  <!--   <div class="actions">
                                                        <a href="javascript:;" class="btn btn-default btn-sm">
                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                    </div> -->
                                                </div>
                                               
                                                <div class="portlet-body">
                                                <?php //print_r($order_single); ?>
                                                <?php if(isset($order_single)):  ?>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Order #: </div>
                                                        <div class="col-md-7 value"> <?php echo $order_single->order_id; ?>
                                                            <span class="label label-info label-sm"> Email confirmation was sent </span>
                                                        </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Product: </div>
                                                        <div class="col-md-7 value"> 
                                                       <?php if (isset($order_single->thumbnail)): ?>
                                                            <?php if ($order_single->thumbnail=='excel'): ?>
                                                                   
                                                                    <img src="<?php echo  $order_single->thumbnail; ?>" width='100'>

                                                                   <?php else: ?>
                                                                    <img src="<?php echo  base_url('uploads/'.$order_single->thumbnail); ?>" width='100'>

                                                               <?php endif; ?>   
                                                            <?php else: ?>
                                                       
                                                                    <img src="<?php echo  base_url('assets/img/placeholder.jpg'); ?>" width='100'>
                                                       <?php endif; ?>
                                                       <br/>
                                                        <a href="<?php echo base_url('admin/product/'.$order_single->product_id); ?>"><?php echo $order_single->title; ?></a> </div>
                                                    </div>
                                                     <div class="row static-info">
                                                        <div class="col-md-5 name"> Product id: </div>
                                                        <div class="col-md-7 value"> <?php echo $order_single->product_id; ?> </div>
                                                    </div>
                                                     <div class="row static-info">
                                                        <div class="col-md-5 name"> Order Date & Time: </div>
                                                        <div class="col-md-7 value"> <?php echo date('g:ia \o\n l jS F Y',strtotime($order_single->created_at)); ?> </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Order Status: </div>
                                                        <div class="col-md-7 value">
                                                            <span class="label label-success"> <?php echo $order_single->order_status; ?> </span>
                                                        </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Quantity: </div>
                                                        <div class="col-md-7 value"> <?php echo $order_single->qty; ?> </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Order note: </div>
                                                        <div class="col-md-7 value"> <?php echo $order_single->order_note; ?> </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Grand Total: </div>
                                                        <div class="col-md-7 value"> Rs.<?php  echo $order_single->subtotal; ?> </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Payment Information: </div>
                                                        <div class="col-md-7 value"> <?php echo $order_single->payment_method; ?> </div>
                                                    </div>
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="portlet blue-hoki box">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-cogs"></i>Customer Information </div>
                                                   <!--  <div class="actions">
                                                        <a href="javascript:;" class="btn btn-default btn-sm">
                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                    </div> -->
                                                </div>
                                                <div class="portlet-body">
                                                    <?php if (isset($order_single)): ?>

                                                    <div class="row static-info">
                                                        <div class="col-md-5 name">  Name: </div>
                                                        <div class="col-md-7 value"> <?php echo ucwords($order_single->fname.' '.$order_single->lname); ?></div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Email: </div>
                                                        <div class="col-md-7 value"> <?php echo $order_single->email; ?> </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Country: </div>
                                                        <div class="col-md-7 value"> <?php echo $order_single->country; ?> </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> State: </div>
                                                        <div class="col-md-7 value"> <?php echo $order_single->state; ?> </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> city: </div>
                                                        <div class="col-md-7 value"> <?php echo $order_single->city; ?> </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Address: </div>
                                                        <div class="col-md-7 value"> <?php echo $order_single->address. ' <br/>'.$order_single->address2; ?> </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Pincode: </div>
                                                        <div class="col-md-7 value"> <?php echo $order_single->pincode; ?> </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Phone Number: </div>
                                                        <div class="col-md-7 value"> <?php echo $order_single->phone; ?> </div>
                                                    </div>
                                                <?php endif; ?>
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
