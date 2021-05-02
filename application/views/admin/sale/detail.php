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
                <!-- Page Content -->
                <div class="content content-boxed">
            
                    <?php if($this->session->flashdata('SUCCESSMSG')) { ?>
                            <div role="alert" class="alert alert-success">
                                    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                    <strong>Well done!</strong>
                                    <?=$this->session->flashdata('SUCCESSMSG')?>
                            </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <span class="item item-circle bg-success-light"><i class="fa fa-check text-success"></i></span>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Order</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <span class="item item-circle bg-success-light"><i class="fa fa-check text-success"></i></span>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Cash Payment</div>
                            </a>
                        </div>
                        <?php
                        foreach ($deliver_sale as $deliver)
                        {
                            if($deliver->shipped_status == 0)
                            {
                            ?>
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <span class="item item-circle bg-warning-light"><i class="si si-settings fa-spin text-warning"></i></span>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-warning font-w600">Processing</div>
                            </a>
                        </div>
                        <?php
                            }
                            else
                            {?>
                                <div class="col-sm-6 col-md-3">
                                    <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                        <div class="block-content block-content-full">
                                            <span class="item item-circle bg-success-light"><i class="fa fa-check text-success"></i></span>
                                        </div>
                                        <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Processing</div>
                                    </a>
                                </div>
                        <?php    }
                        }
                        foreach ($deliver_sale as $deliver)
                        {
                            if($deliver->shipped_status == 0)
                            {
                            ?>
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <span class="item item-circle bg-gray-lighter"><i class="fa fa-times text-muted"></i></span>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Delivery</div>
                            </a>
                        </div>
                            <?php }
                            else
                            {?>
                                <div class="col-sm-6 col-md-3">
                                    <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                        <div class="block-content block-content-full">
                                            <span class="item item-circle bg-success-light">
                                                <i class="fa fa-check text-success"></i>
                                            </span>
                                        </div>
                                        <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Delivery</div>
                                    </a>
                                </div>
                                
                           <?php }
                        }
                            ?>
                    </div>
                    <!-- END Header Tiles -->

                    <!-- Products -->
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Sale Detail</h3>
                        </div>
                        <div class="block-content">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Sale No</th>
                                            <th>Product Code</th>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Product Description</th>
                                            <th>Quantity </th>
                                            <th>Product Price</th>
                                            <th>Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $totalamount = 0;
                                        $totalprice = 0;
                                        foreach ($sale_detail as $post)
                                        {
                                        
                                        ?>
                                        <tr>
                                            <td><?=$post->sale_id?></td>
                                            <td><?=$post->product_code?></td>
                                            
                                            <td><img height="100px" width="100px" src="<?=base_url();?>/upload/product/<?=$post->id?>/<?=$post->product_image?>"></td>
                                            
                                            <td><?=$post->product_name?></td>
                                            <td><?=$post->product_description?></td>
                                            <td><?=$post->quantity?></td>
                                            <td><?=$post->product_price?></td>
                                            <td><?php
                                                $totalamount =  $post->quantity * $post->product_price;
                                                echo $totalamount;
                                                $totalprice = $totalprice+$totalamount;
                                            ?></td>
                                            
                                        </tr>
                                        <?php
                                        }?>
                                        <tr>
                                            <td colspan="7" class="text-right"><strong>Total Price:</strong></td>
                                            <td>Php <?=$totalprice?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="text-right text-uppercase"><strong>Total Paid:</strong></td>
                                            <td><strong>Php <?=$totalprice?></strong></td>
                                        </tr>
                                        </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END Products -->

                    <!-- Customer -->
                    <div class="row">
                        <?php
                         foreach ($sale_address_detail as $address)
                           {?>
                        <div class="col-lg-6">
                            <!-- Billing Address -->
                            <div class="block">
                                <div class="block-header bg-gray-lighter">
                                    <h3 class="block-title">Billing Address</h3>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="h4 push-5" style="text-transform: uppercase;"><?= $address->firstname?>&nbsp;<?= $address->lastname?></div>
                                    <address>
                                       <?=$address->address1?><br>
                                        <?=$address->city?><br>
                                       <?=$address->country?>, <?=$address->postcode?><br>
                                       <?=$address->order_date?><br><br>
                                        <i class="fa fa-phone"></i> <?=$address->phone?><br>
                                        <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)"><?=$address->email?></a>
                                    </address>
                                </div>
                            </div>
                            <!-- END Billing Address -->
                        </div>
                        <div class="col-lg-6">
                            <!-- Shipping Address -->
                            <div class="block">
                                <div class="block-header bg-gray-lighter">
                                    <h3 class="block-title">Shipping Address</h3>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="h4 push-5" style="text-transform: uppercase;"><?= $address->firstname?>&nbsp;<?= $address->lastname?></div>
                                     <address>
                                       <?=$address->address1?><br>
                                        <?=$address->city?><br>
                                       <?=$address->country?>, <?=$address->postcode?><br>
                                       <?=$address->order_date?><br><br>
                                        <i class="fa fa-phone"></i> <?=$address->phone?><br>
                                        <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)"><?=$address->email?></a><br>
                                        
                                    </address>
                                </div>
                            </div>
                            <!-- END Shipping Address -->
                        </div>
                           <?php }?>
                    </div>
                    <!-- END Customer -->
                    <div class="row">
                        <?php
                    foreach ($deliver_sale as $deliver)
                    {
                        if($deliver->shipped_status == 0)
                        {
                        ?>
                            <div class="col-lg-12" style="text-align: right;">
                                 <button class="btn btn-minw btn-rounded btn print btn-danger" type="button"><i class="fa fa-check"></i> Print</button>
                                <a href="<?=base_url();?>account/sale-status/<?=$deliver->id?>" class="btn btn-minw btn-rounded btn-primary" type="button"><i class="fa fa-check"></i> Deliver</a>
                                
                            </div>
                        <?php }
                        else
                        {?>
                        <div class="col-lg-12" style="text-align: right;">
                            <button class="btn btn-prom btn-rounded btn-danger btn print" type="button"><i class="fa fa-check"></i> Print</button>
                        </div>
                       <?php }
                    }?>
                    </div>
                    
                    <br>
                    <br>
                    <br>
                    <!-- Log Messages -->
         
                    <!-- END Log Messages -->
                </div>
                <!-- END Page Content -->
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
    </body>
</html>
<script>
    $(document).ready(function() {
        $('.print').click(function() {
         var prtContent = document.getElementById("pint_specific_data");
 		var WinPrint = window.open('', '', 'left=0,top=0,width=1000,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write('<html><body><br>'+
			<?php
					foreach ($sale_address_detail as $c) 
					{
				?>
			'<table width="80%" border="0" cellpadding="0" cellspacing="0" >'+
				'<tr>'+
					'<td valign="top" style="text-transform: capitalize;"><b><?php echo $c->firstname." ".$c->lastname?></b><br><?php echo $c->address1?>,&nbsp;<?php echo $c->city?></td>'+
					'<td><b>Mobile:</b>&nbsp;<?php echo $c->phone ?><br><b>Email:</b>&nbsp;<?php echo $c->email ?><br><b>Date:</b>&nbsp;<?php echo $c->order_date ?></td>'+
				'</tr>'+
				
			'</table><br>'+
			<?php }?>
			'<table width="100%" border="1" cellpadding="10" cellspacing="0" >'+
			'<thead>'+
					'<tr>'+
						'<th>Sale No</th>'+
						'<th>Product Code</th>'+
						'<th>Product Name</th>'+
                                                '<th>Quantity </th>'+
                                                '<th>Product Price </th>'+
                                                '<th>Total Amount </th>'+
					'</tr>'+

				'</thead>'+
				'<tbody>'+
					<?php
					$grand_amount = 0;
					foreach ($sale_detail as $value) {?>
						'<tr>'+
							'<td><?php echo $value->id ?></td>'+
							'<td><?php echo $value->product_code ?></td>'+
							'<td><?php echo $value->product_name ?></td>'+
			     '<td><?php echo $value->quantity?></td>'+
                              '<td><?php echo $value->product_price?></td>'+
							'<td><?php $net =  $value->quantity * $value->product_price;
                                                        echo $net;
                                                        $grand_amount = $grand_amount+ $net;   
                                                        ?></td>'+
						'</tr>'+
					<?php
					}
					?>
					'<tr>'+
                    	'<td colspan="4"></td>'+
                        '<td><b>Total</b></td>'+
						'<td ><b><?php echo $grand_amount;?></b></td>'+
					'</tr>'+
				'</tbody>'+
			'</table></body></html>');
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
    
//            WinPrint.document.close();
//            WinPrint.focus();
//            WinPrint.print();
//            WinPrint.close();

        });
    });
    </script>
