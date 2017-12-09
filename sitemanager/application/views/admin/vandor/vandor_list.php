<!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <!-- <h1 class="page-title">Vandors list </h1> -->
                        <!-- END PAGE TITLE-->

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
                                            <span class="caption-subject bold uppercase">Vandors</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided">
                                                <a class="btn btn-transparent dark btn-outline btn-circle btn-sm " href='<?php echo base_url('admin/create') ?>'>
                                                    Create new vandor</a>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover " >
                                            <thead>
                                                <tr class="">
                                                    <th>S. No.</th>
                                                    <th>username</th>
                                                    <th>First name</th>
                                                    <th>Last name</th>
                                                    <th>Gender</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if (isset($vandors)):  $i=1; ?>

                                            <?php foreach ($vandors as $vandor):  ?>

                                                <tr id='row_<?php echo $vandor->id; ?>'>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $vandor->username; ?></td>
                                                    <td><?php echo $vandor->fname; ?></td>
                                                    <td><?php echo $vandor->lname; ?></td>
                                                    <td><?php echo isset($vandor->gender) ? $vandor->gender :'Not specified'; ?></td>
                                                    <td><?php echo $vandor->phone; ?></td>
                                                    <td><?php echo $vandor->email; ?></td>
                                                    <td>
                                                    <a href="<?php echo base_url('admin/edit/'.$vandor->id); ?>" class='btn btn-sm btn-info'>Edit</a>
                                                     <!-- <a class="btn red-mint btn-large delete-vandor " data-vandorId = "<?php //echo $vandor->id; ?>" data-toggle="confirmation" data-original-title="Are you sure ?"
                                            title="">Delete</a> -->

                                            <a class="btn red-mint btn-large "  href='<?php echo base_url('admin/seller/'.$vandor->id); ?>' title="">View</a>

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