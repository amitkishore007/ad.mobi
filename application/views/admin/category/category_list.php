
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
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-social-dribbble font-blue-sharp"></i>
                                <span class="caption-subject font-blue-sharp bold uppercase">Category list</span>
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-group-devided">
                                                <a class="btn btn-transparent dark btn-outline btn-circle btn-sm " href='<?php echo base_url('category/create') ?>'>
                                                    Create new category</a>
                                               
                                            </div>
                            </div>
                        
                        </div>
                        <div class="portlet-body category-list">
                            <?php if(isset($categories)): ?>

                                        <?php foreach($categories as $category): ?>
                                                <?php echo $category; ?>
                                        <?php endforeach; ?>

                            <?php endif; ?>
                            
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
