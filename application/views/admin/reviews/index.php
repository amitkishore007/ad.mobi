
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <!-- BEGIN PAGE TITLE-->
               
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
                                <span class="caption-subject bold font-yellow-lemon uppercase"> Manage reviews </span>
                                <!-- <span class="caption-helper">more samples...</span> -->
                            </div>
                            <ul class="nav nav-tabs order-tabs">
                                <li class="active">
                                    <a href="#portlet_tab1" data-toggle="tab">Reviews</a>
                                </li>
                               
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                              
                                 
                                <div class="tab-pane active" id="portlet_tab1">
                                       <?php if(isset($reviews)): ?> 
                                        <?php foreach ($reviews as $review): ?>
                                            <div class="rating-div">
                                            
                                                <div class="product-div">   
                                                    <p>
                                                    <?php if (isset($review->thumbnail)): ?>
                                                           <?php if ($review->thumbnail=='excel'): ?>
                                                               
                                                     <img src='<?php echo $review->thumbnail; ?>' class="product-div" height='100'/>
                                                               <?php else: ?>
                                                     <img src='<?php echo base_url('uploads/'.$review->thumbnail); ?>' class="product-div" height='100'/>
                                                           <?php endif; ?>
                                                           
                                                    <?php  else: ?> 
                                                     <img src='<?php echo base_url('assets/img/placeholder.jpg'); ?>' class="product-div" height='100'/>
                                                    
                                                    <?php endif; ?>
                                                    
                                                     <span style="display: block;"><?php $review->title; ?></span>
                                                    </p>

                                                    <div class="user-div">
                                                    <div class="dp"><img src='<?php echo base_url('assets/img/user.png'); ?>' class="product-div" height='40'></div>
                                                        <div class="user-name"><?php echo $review->username; ?>
                                                         <div class="row lead">
                                                            <div class="starrr" data-rating='<?php echo $review->rating; ?>' ></div>
                                                           <!--  You gave a rating of <span id="count">0</span> star(s) -->
                                                        </div>
                                                        </div>
                                                        <div class="comment"><?php echo htmlentities($review->comment); ?></div>
                                                    </div>


                                                </div>
                                            
                                              <hr/>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </div>
                                

                               <!--  <div class="tab-pane active" id="portlet_tab2">
                                      Nothing here

                                </div>
                               <div class="tab-pane active" id="portlet_tab3">
                                      Nothing here

                                </div>
                               -->
                              
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
