<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Developer</title>
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

</head>
<body>
<?php  require_once 'header.php';?>

       <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Wishlist</h3>
                <h4><a href="<?=base_url();?>">Home</a><label>/</label>Wishlist</h4>
		<div class="clearfix"> </div>
	</div>
</div>

	<!-- contact -->
		<div class="check-out">	 
		<div class="container">	 
	 <div class="spec ">
				<h3>Wishlist</h3>
			</div>
				
            <table class="table ">
                <tr>
                    <th class="t-head head-it ">Products</th>
                    <th class="t-head">Price</th>
                    <th class="t-head">Purchase</th>
                </tr>
                
                <?php 
                if(!empty($wishlist_list))
                {
                
                foreach ($wishlist_list as $post)
                {
                        $id = $post->id;
                        $name = $post->product_name;
                        $description = $post->product_description;
                        $price = $post->product_price;
                        $image  =  $post->product_image;       
                    
                    ?>
                <tr class="cross">
			<td class="ring-in t-data">
                            <a class="at-in quicklook" id="<?=$post->id?>" style="text-align: center; cursor: pointer;">
                                <img width="125px" height="125px"  src="<?=base_url();?>/upload/product/<?=$post->id;?>/<?=$post->product_image;?>"  alt="">
                            </a>
         
			<div class="sed">
                            <h5 style="text-transform: capitalize;"><?=$post->product_name;?></h5>
			</div>
				<div class="clearfix"> </div>
                                <a href="<?=base_url();?>delete-wishlist/<?=$post->wish_id?>">
				<div class="close1"> <i class="fa fa-times" aria-hidden="true"></i></div>
                                </a>
			 </td>
			<td class="t-data">Php <?=$post->product_price;?></td>
                        <td class="t-data t-w3l">
                             <?php
                                echo form_open('cart/add');
                                echo form_hidden('id', $id);
                                echo form_hidden('name', $name);
                                echo form_hidden('price', $price);
                                echo form_hidden('image', $image);
                                ?> 
                                                <button type="submit" class="btn btn-warning" name="action">Add to Cart</button>

                               <?php
                                echo form_close();
                            ?>
                        </td>
			
		  </tr>
                <?php }
                }
                else
                {?>
                    <tr>
                        <td class="ring-in t-data" colspan="100%">Not available, sorry. :(</td>
                    </tr>
               <?php }
                ?>
	</table>
		 </div>
		 </div>
		 			
 <!--footer-->
<?php require 'footer.php';?>
<!-- //footer-->
<div class="modal fade" id="header-modal" aria-hidden="true"></div>

</body>
</html>

<script type="text/javascript">
        function clear_cart() {
            var result = confirm('Are you sure want to clear all bookings?');
            if (result) {
                window.location = "<?php echo base_url(); ?>clear-cart";
            } else {
                return false; // cancel button
            }
        }
</script>
<script type="text/javascript">
		$(document).ready(function() {
                    $('.quicklook').click(function() {
                        var product_id = $(this).attr('id');
                       
                        $.ajax({
                                type: "POST",
                                url: "<?=base_url();?>product/SingleProuctDetail",
                                data: {product_id: product_id},
                                dataType: "json",
                                success: function(data) {
                                     $("#header-modal").html("<div class='modal-dialog' role='document'>"+
					"<div class='modal-content modal-info'>"+
						"<div class='modal-header'>"+
                                                    "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+						
						"</div>"+
						"<div class='modal-body modal-spa'>"+
								"<div class='col-md-5 span-2'>"+
											"<div class='item'>"+
												data.product_image+
											"</div>"+
								"</div>"+
								"<div class='col-md-7 span-1'>"+
									"<h3 style='text-transform: capitalize'>"+data.name+"</h3>"+
									"<div class='price_single'>"+
									 " <span class='reducedfrom '>Php "+data.product_price+"</span>"+
									 "<div class='clearfix'></div>"+
									"</div>"+
									"<h4 class='quick'>Quick Description</h4>"+
									"<p class='quick_desc'>"+data.product_description+"</p>"+
									 "<div class='add-to'>"+
										   data.view_detail+
										"</div>"+
								"</div>"+
								"<div class='clearfix'> </div>"+
							"</div>"+
						"</div>"+
					"</div>");
                                      $('#header-modal').modal('show');  
                                }
                               
                            });
                        
                   
                });
								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
