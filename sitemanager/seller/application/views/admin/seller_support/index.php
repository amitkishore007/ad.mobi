
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
                                                        <div role="form">
                                                            <div class="form-body">
                                                            <div class="form-group ">
                                                                    <label>Issue Type</label>
                                                                    <select class="form-control input-lg issue-type">
                                                                    <?php if(isset($issues)): ?>  
                                                                       <?php foreach ($issues as $issue): ?>
                                                                        <option value='<?php echo $issue->id; ?>'><?php echo $issue->name; ?></option>
                                                                       <?php endforeach; ?>
                                                                    <?php endif; ?>

                                                                    </select>

                                                                    <span class="error text-danger issue-error"></span>
                                                                </div>
                                                                
                                                              
                                                               
                                                                <div class="form-group">
                                                                    <label>Primary Email *</label>
                                                                    <input type="text" class="form-control input-lg" placeholder="Readonly" readonly value='<?php echo $this->session->userdata('user_email'); ?>'> </div>
                                                                
                                                                 <div class="form-group">
                                                                    <label>Subject *</label>
                                                                    <input class="form-control input-lg subject" type="text" placeholder="Subject" />

                                                                    <span class="error text-danger subject-error"></span>
                                                                     </div>
                                                                
                                                                <div class="form-group">
                                                                    <label>Details *</label>
                                                                    <textarea class="form-control details" rows="10"></textarea>
                                                                    <span class="error text-danger details-error"></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile1">File Attachment</label>
                                                                    <form id='upload-attachment' action="<?php echo base_url('admin/upload_attachment'); ?>" method='POST' enctype='multipart/form-data'>
                                                                        
                                                                        <input type="file" name='file' id="attachment">
                                                                        <div class="progressBar">
                                                                            <div class="bar"></div>
                                                                            <div class="percent">0%</div>
                                                                        </div>
                                                                   
                                                                    </form>
                                                                    
                                                                    <p class="help-block"> Supported Formats: .doc,.docx,.csv,.xls,xlsx,.pdf,.jpg,.png,.bmp </p>
                                                                    <span class="error text-danger attachment-error"></span>
                                                                </div>
                                                                
                                                                 <div class="form-group">
                                                                    <label>Callback Number *</label>
                                                                    <input class="form-control callback " type="text" placeholder="Phone number" /> 
                                                                    <span class="error text-danger callback-error"></span>
                                                                </div>

                                                            </div>
                                                            <div class="form-actions">
                                                            <input type="hidden" class='attachment-data' value="">
                                                                <button type="submit" class="btn blue seller-support-submit">Submit</button>
                                                                
                                                            </div>
                                                        </div>
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
