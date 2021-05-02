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
                              Shipped Sales Report 
                            </h3>
                            <span class="col-lg-6" style="text-align: right;">
                                  <!--<a class="btn btn-default btn-rounded btn-condensed btn-sm" data-toggle="tooltip" title="Add New Product" href="<?=base_url();?>account/product-add"><span title="Add New Product"class="fa fa-plus"></span></a>-->
                            </span>
                        </div>
                        <form method="post">                 
                            <div class="col-md-12">
                                <div class="col-md-3">
                                     <select class="form-control" name="buyer_name" >
                                        <option value="">Select Buyer</option>
                                        <?php
                                        foreach ($Buyer_Name as $buyer)
                                        {?>
                                        <option value="<?=$buyer->buyer_name?>"<?php if(@$buyer->buyer_name==@$buyername) echo "selected";?>><?=$buyer->buyer_name?></option>
                                       <?php }?>
                                        
                                    </select>
                                </div>
                                <div class="col-md-2"><input id="example-datepicker1" class="js-datepicker form-control" name="start_date" data-date-format="yyyy/mm/dd" placeholder="Select Start Date" type="text"></div>
                                <div class="col-md-2"><input id="example-datepicker1" class="js-datepicker form-control" name="end_date" data-date-format="yyyy/mm/dd" placeholder="Select End Date" type="text"></div>
                                <div class="col-md-3">
                                    <select class="form-control" name="created_name" >
                                        <option value="">Select Created By</option>
                                        <option value="0" <?php  if(@$created_names== '0') echo "selected"?>>Website</option>
                                        <option value="1" <?php if(@$created_names== '1') echo "selected"?>>Admin</option>
                                       
                                    </select>
                                </div>
                                <div class="col-md-2"><input class="btn btn-warning" value="Search" type="submit"></div>
                            </div>
                        </form>             
                    <div class="col-md-12" style="padding-top: 20px;"></div>
                    <div class="block-content">
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Order Date</th>
                                        <th>Due Date</th>
                                        <th>Created By</th>
                                        <th>Buyer Name</th>
                                        <th>Cash Discount</th>
                                        <th>Grand Amount</th>
                                        <th>No of item</th>
                                        <th>Net</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($sale_list as $value)
                                    {
                                    
                                    ?>
                                   <tr>
                                        <td><?=$value->id?></td>
                                        <td><?=$value->issue_date;?></td>
                                        <td><?=$value->due_date?></td>
                                        <td><?php 
                                            if(($value->created_by) == 0)
                                            { 
                                                echo 'Website';
                                            } 
                                            else
                                            { 
                                                echo  "Admin";
                                            }?>
                                        </td>
                                        <td><?=$value->buyer_name?></td>
                                        <td><?=$value->cash_discount?></td>
                                        <td><?=$value->grand_amount?></td>
                                        <td><?=$value->total_quantity?></td>
                                        <td><?=$value->grand_amount?></td>
                                        <td>
                                            <?php
                                            if($value->shipped_status==0)
                                            {?>
                                                <span class="label label-danger">Order Placed</span>
                                           <?php }
                                           else
                                           {?>
                                               <span class="label label-primary">Shipped</span></td>
                                          <?php }
                                            ?>
                                            
                                            
                                    <td>
                                        <a class="btn btn-success btn-rounded btn-condensed btn-sm product_detail" href="<?=base_url();?>account/sale-detail/<?=$value->id?>" data-toggle="tooltip" data-placement="top" title="" data-product_id="71" data-href="" data-type="sale_detail" data-original-title="View Sale detail">
                                        <span class="">View</span>
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