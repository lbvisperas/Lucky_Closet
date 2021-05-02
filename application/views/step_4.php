<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Lucky Closet Boutique</title>
<link rel='icon' href='<?= base_url();?>favicon.ico' type='image/x-icon'/ >
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?= base_url();?>css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?= base_url();?>css/style.css" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="<?= base_url();?>js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<!-- for bootstrap working -->
		<script src="<?= base_url();?>js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="<?= base_url();?>js/jquery.mycart.js"></script>
<script type="text/javascript" src="<?= base_url();?>js/move-top.js"></script>
<script type="text/javascript" src="<?= base_url();?>js/easing.js"></script>

<!-- start-smoth-scrolling -->
<link href="<?= base_url();?>css/font-awesome.css" rel="stylesheet"> 
<!--<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>-->
<!--<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>-->
<!--- start-rate---->
<script src="<?= base_url();?>js/jstarbox.js"></script>
	<link rel="stylesheet" href="<?= base_url();?>css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
	
<!---//End-rate---->
<style>
    *::-moz-placeholder {
        color: #999999;
}
    </style>
</head>
<body>
<?php  require_once 'header.php';?>

      <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3>Checkout</h3>
                <h4><a href="<?=base_url();?>">Home</a><label>/</label>Register</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!--login-->

	<div >
            <div class="main-agileits" style="margin-top: 50px; width: 90%">
				<div class="form-w3agile ">
					<h3>3. Confirm Order</h3>
                                      
                        <form class="checkout_form clearfix" action="<?php echo base_url()?>checkout/step_4" method="post">
                           <div class="row">
			<div class="col-lg-12 col-md-12 padbot40">
           
            <table class="table " width="100%">
                <tr>
                      <th class="t-head head-it ">Products</th>
                      <th class="t-head head-it ">Name</th>
                      <th class="t-head">Price</th>
                      <th class="t-head">Quantity</th>
                      <th class="t-head">Purchase</th>
                </tr>
                 <?php $i = 1; ?>
                <?php
                if(!empty($this->cart->contents()))
                {
                            $total = 0;
                            foreach ($this->cart->contents() as $items):
                            echo form_hidden('rowid[]', $items['rowid']);
                                    $total = $total + (($items['qty']) * ($items['price']));
                                ?>
                    <tr class="cross">
                            <td class="ring-in t-data">
                                    <a class="at-in" style="cursor: pointer;">
                                        <img height="100px" width="120" src="<?=base_url();?>upload/product/<?=$items['id']?>/<?=$items['image']?>"  alt="">
                                    </a>
                            </td>
                            <td class="t-data"><h5 style="text-transform: capitalize;"><?php echo $items['name']; ?></h5></td>
                            <td class="t-data"> <span class="amount"><?php echo $items['price']; ?></span></td>
                            <td class="t-data"><?php echo $items['qty'] ; ?></td>
                            <td class="t-data t-w3l"><?php echo ($items['qty']) * ($items['price']); ?></td>
                    </tr>
                        <?php
                        $i++;
                    endforeach;
                }
               ?> 
                <tr>
                    <td class="t-data t-w3l"  colspan="4" style="text-align: left;">
                        Sub Total
                    </td>
                    <td class="t-data t-w3l" colspan="" style="text-align: center;">
                        <?php echo $total;?>
                    </td>
                </tr>
                <tr>
                    <td class="t-data t-w3l" colspan="4" style="text-align: left;">
                        Shipping
                    </td>
                    <td class="t-data t-w3l" colspan="" style="text-align: center;">
                        Free
                    </td>
                </tr>
                
                <tr>
                    <td class="t-data t-w3l" colspan="4" style="text-align: left;">
                        Total
                    </td>
                    <td class="t-data t-w3l" colspan="" style="text-align: center;">
                        <?php echo $total;?>
                    </td>
                </tr>
            </table>
                            <div style="text-align: right;">
                            <input style="background: #333333; color: #ffffff;" type="submit" name="confirm" value="Confirm">
                            </div>
            </div></div></form></div></div></div>                
                    <br>        
                    <br>        
                    <br>        
                        
<!--footer-->
<?php require 'footer.php';?>
<!-- //footer-->
<div class="modal fade" id="header-modal" aria-hidden="true"></div>

</body>
</html>
