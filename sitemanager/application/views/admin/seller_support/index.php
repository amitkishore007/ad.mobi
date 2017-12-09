
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
                                   <div class="col-md-8 col-md-offset-2 ">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class="icon-pin font-blue-lemon"></i>
                                <span class="caption-subject bold font-blue-lemon uppercase"> Seller Support</span>
                                <!-- <span class="caption-helper">more samples...</span> -->
                            </div>
                            <ul class="nav nav-tabs order-tabs">
                                <!-- <li class="active">
                                    <a href="#portlet_tab1" data-toggle="tab">Payment Report</a>
                                </li> -->
                             
                                
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                              
                                 
                                <div class="tab-pane active" id="portlet_tab1">
                                    <div class="row">
                                            <div class="col-md-12 ">
                                                <!-- BEGIN Portlet PORTLET-->
                                                <div class="portlet box blue-hoki">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            Fillout the form</div>
                                                     
                                                    </div>
                                                    <div class="portlet-body payment-settled">
                                                       <!-- BEGIN SAMPLE FORM PORTLET-->
                                                <div class="portlet light ">
                                                    
                                                    <div class="portlet-body form">
                                                        <form role="form">
                                                            <div class="form-body">
                                                            <div class="form-group ">
                                                                    <label>Issue Type</label>
                                                                    <select class="form-control input-lg">
                                                                    <?php if(isset($issues)): ?>  
                                                                       <?php foreach ($issues as $issue): ?>
                                                                        <option value='<?php echo $issue->id; ?>'><?php echo $issue->name; ?></option>
                                                                       <?php endforeach; ?>
                                                                    <?php endif; ?>

                                                                    </select>
                                                                </div>
                                                                
                                                              
                                                               
                                                                <div class="form-group">
                                                                    <label>Primary Email *</label>
                                                                    <input type="text" class="form-control input-lg" placeholder="Readonly" readonly value='<?php echo $this->session->userdata('user_email'); ?>'> </div>
                                                                
                                                                 <div class="form-group">
                                                                    <label>Subject *</label>
                                                                    <input class="form-control input-lg" type="text" placeholder="Process something" /> </div>
                                                                
                                                                <div class="form-group">
                                                                    <label>Details *</label>
                                                                    <textarea class="form-control" rows="10"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile1">File Attachment</label>
                                                                    <input type="file" id="attachment">
                                                                    <p class="help-block"> Supported Formats: .doc,.docx,.csv,.xls,xlsx,.pdf,.jpg,.png,.bmp </p>
                                                                </div>
                                                                
                                                                 <div class="form-group">
                                                                    <label>Callback Number *</label>
                                                                    <input class="form-control " type="text" placeholder="Phone number" /> </div>

                                                            </div>
                                                            <div class="form-actions">
                                                                <button type="submit" class="btn blue seller-support-submit">Submit</button>
                                                                
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- END SAMPLE FORM PORTLET-->
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
                
                            </div>
                        </div>
                    </div>

            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
