<!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <div class="container">
                                <div class="page-content-inner">
                                    <div class="mt-content-body">
                                        
                                        <!-- start  row -->
                       
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Privacy and policy </span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided" >
                                                
                                                    <a  class="btn btn-transparent dark btn-outline btn-circle btn-sm " href='<?php echo base_url('privacy/create'); ?>'>Create new content</a>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered  ">
                                            <thead>
                                                <tr class="">
                                                    <th>S. No.</th>
                                                    <th>Title</th>
                                                    <th>Content</th>

                                                    <th>Active page</th>
                                                   
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php if (isset($privacy)):  $i=1; ?>

                                            <?php foreach ($privacy as $page):  ?>

                                                <tr id='row_<?php echo $page->id; ?>'>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $page->heading; ?></td>
                                                    <td><?php echo $page->content; ?></td>
                                                    <td>

                                                    <div class="md-radio text-center">
                                                        <input type="radio" id='radio<?php echo $page->id; ?>' data-privacyId='<?php echo $page->id; ?>' name="privacy_status" class="md-radiobtn privacy_status" value="<?php echo $page->status; ?>" <?php echo $page->status ? 'checked': ''; ?>>
                                                        <label for="radio<?php echo $page->id; ?>">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span></label>
                                                    </div>

                                                 
                                                    </td>
                                                    
                                                    <td>
                                                    <a href="<?php echo base_url('privacy/edit/'.$page->id); ?>" class='btn btn-sm btn-info'>Edit</a>
                                                     <a class="btn red-mint btn-large delete-privacy " data-privacyId = "<?php echo $page->id; ?>" data-toggle="confirmation" data-original-title="Are you sure ?"
                                            title="">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                            

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                
                            </div>
                        </div>


                        <!-- end  row -->
                        
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->