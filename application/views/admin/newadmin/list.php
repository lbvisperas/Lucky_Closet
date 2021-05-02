<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Lucky Closet Boutique</title>
        <link rel='icon' href='<?= base_url();?>favicon.ico' type='image/x-icon'/ >

        <meta name="description" content="OneUI - Admin Dashboard Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
        <link rel="shortcut icon" href="assets/img/favicons/favicon.png">

        <!-- Web fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" href="<?= base_url();?>assets/js/plugins/datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?= base_url();?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" id="css-main" href="<?= base_url();?>assets/css/oneui.css">

    </head>
    <body>
        <div id="page-container" class="side-scroll header-navbar-fixed">
           <?php require_once(APPPATH.'views/admin/header.php'); ?>
                <!-- Page Header -->
                            <div class="content bg-image overflow-hidden" style="background-image: url('<?php echo base_url(); ?>/assets/img/photos/photo3@2x.jpg');">
                    <div class="push-50-t push-15">
                    <h1 class="h2 text-white animated zoomIn">.</h1> 
                        <h1 class="h2 text-white animated zoomIn">.</h1>
                        <h2 class="h5 text-white-op animated zoomIn">.</h2>
                        <h2 class="h5 text-white-op animated zoomIn">.</h2>
                        <h2 class="h5 text-white-op animated zoomIn">.</h2>
                        <h2 class="h5 text-white-op animated zoomIn">.</h2>
                    </div>
                </div>
                <!-- END Page Header -->
            <main id="main-container">
                <div class="content">
                <?php if($this->session->flashdata('SUCCESSMSG')) { ?>
                        <div role="alert" class="alert alert-success">
                                <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                <strong>Well done!</strong>
                                <?=$this->session->flashdata('SUCCESSMSG')?>
                        </div>
                <?php } ?>
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title col-lg-6" style="text-align: left;">
                              Admin Report 
                            </h3>
                            <span class="col-lg-6" style="text-align: right;">
                                  <!--<a class="btn btn-default btn-rounded btn-condensed btn-sm" data-toggle="tooltip" title="Add New Slider" href="<?=base_url();?>account/add-slider"><span title="Add New Product"class="fa fa-plus"></span></a>-->
                            </span>
                        </div>
                    <div class="col-md-12" style="padding-top: 20px;"></div>
                    <div class="block-content">
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>Admin Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Created By Admin ID</th>
                                        <th>Created Date</th>
                                        
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($admin_list as $value)
                                    {
                                    
                                    ?>
                                   <tr>
                                        <td><?=$value->id?></td>
                                        <td style="text-transform: capitalize;"><?=$value->firstname?></td>
                                        <td style="text-transform: capitalize;"><?=$value->lastname?></td>
                                        <td><?=$value->email?></td>
                                        <td><?=$value->mobile?></td>
                                        <td><?=$value->created_by?></td>
                                        
                                        <td><?=$value->created_date?></td>
                                    <td>
                                        <a class="btn btn-danger btn-rounded btn-condensed btn-sm" href="<?=base_url()?>account/admin-delete/<?=$value->id?>" data-href="" data-toggle="tooltip" title="" data-original-title="Delete">
                                            <span class="fa fa-times" title="delete"></span>
                                        </a>
                                    </td>
                                </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                 

                 
                </div>
               
            </main>
           

           <?php require_once(APPPATH.'views/admin/footer.php'); ?>
        </div>
           <div class="modal fade" id="header-modal" aria-hidden="true"></div>
      
        <script src="<?= base_url();?>assets/js/core/jquery.min.js"></script>
        <script src="<?= base_url();?>assets/js/core/bootstrap.min.js"></script>
        <script src="<?= base_url();?>assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url();?>assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="<?= base_url();?>assets/js/core/jquery.appear.min.js"></script>
        <script src="<?= base_url();?>assets/js/core/jquery.countTo.min.js"></script>
        <script src="<?= base_url();?>assets/js/core/jquery.placeholder.min.js"></script>
        <script src="<?= base_url();?>assets/js/core/js.cookie.min.js"></script>
        <script src="<?= base_url();?>assets/js/app.js"></script>

        <!-- Page JS Plugins -->
        <script src="<?= base_url();?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

        <!-- Page JS Code -->
        <script src="<?= base_url();?>assets/js/pages/base_tables_datatables.js"></script>
        
        
        <script src="<?= base_url();?>assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?= base_url();?>assets/js/plugins/bootstrap-datetimepicker/moment.min.js"></script>
        <script src="<?= base_url();?>assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
        
        
    </body>
</html>
<script>
    jQuery(function () {
        App.initHelpers(['datepicker', 'datetimepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']);
    });
</script>