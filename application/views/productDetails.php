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
<!--<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>-->
<!--- start-rate---->
<script src="<?= base_url();?>js/jstarbox.js"></script>
	<link rel="stylesheet" href="<?= base_url();?>css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
	
<!---//End-rate---->
<style>
@media (min-width: 0px) and (max-width: 480px) {
    .pro-1{
        width: 100%;
    }
}

</style>
</head>
<body>
<?php  require_once 'header.php';?>

<div class="banner-top">
	<div class="container">
		<h3>Product</h3>
                <h4><a href="<?=base_url();?>">Home</a><label>/</label>Detail</h4>
		<div class="clearfix"> </div>
	</div>
    
</div>
    <?php
    foreach ($product_detail as $detail)
    {
                $id = $detail->id;
                $name = $detail->product_name;
                $description = $detail->product_description;
                $price = $detail->product_price;
                $image  =  $detail->product_image;       
    ?>
		<div class="single">
			<div class="container">
						<div class="single-top-main">
	   		<div class="col-md-5 single-top">
	   		<div class="single-w3agile">
							
<div id="picture-frame">
    <img height="400px" width="100%" src="<?=base_url();?>/upload/product/<?=$detail->id;?>/<?=$detail->product_image;?>" data-src="<?=base_url();?>/upload/product/<?=$detail->id;?>/<?=$detail->product_image;?>" alt="" />
		</div>
                <script src="<?= base_url();?>js/jquery.zoomtoo.js"></script>
                <script>
			$(function() {
				$("#picture-frame").zoomToo({
					magnify: 1
				});
			});
		</script>
		
		
		
			</div>
			</div>
			<div class="col-md-7 single-top-left ">
				<div class="single-right">
                                    <h3 style="text-transform: capitalize;"><?=$detail->product_name?></h3>
				
					
				 <div class="pr-single">
				  <p class="reduced" style="color: #666666; font-size: 16px; font-weight: 600;">Php <?=$detail->product_price?></p>
				</div>
				<div class="block block-w3">
					<div class="starbox small ghosting"> </div>
				</div>
				<p class="in-pa"><?=$detail->product_description?></p>
			   	
                                <div class="add add-3">
                                            
                                <table>
                                    <tr>
                                        <td>
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
                                </table>
            
                                            
                                            
                                                             
                  
                                            
                                            
                                         
                                 </div>
				
				 
			   
			<div class="clearfix"> </div>
			</div>
		 

			</div>
		   <div class="clearfix"> </div>
	   </div>	
				 
				
	</div>
</div>
    <?php }?>
<div class="content-top offer-w3agile">
	<div class="container ">
			<div class="spec ">
				<h3>Related Product</h3>
			</div>
						<div class=" con-w3l wthree-of">
					          <?php
                                                    foreach ($related_product_detail as $post)
                                                    { 
                                                       
                                                        foreach ($post as $data)
                                                        { 
                                                           
                                                        if(!empty($data))
                                                        {
                                                            
                                                            foreach ($data as $value)
                                                            { 
                                                                 
                                                                $id = $value->id;
                                                                $name = $value->product_name;
                                                                $description = $value->product_description;
                                                                $price = $value->product_price;
                                                                $image  =  $value->product_image;                                            
                                                        ?>
                                                    <div class="col-md-3 pro-1">
								<div class="col-m">
                                                                    <a class="offer-img quicklook" id="<?=$value->id?>" style="text-align: center; cursor: pointer;">
                                                                                <img height="125px" width="100%" src="<?=base_url();?>/upload/product/<?=$value->id;?>/<?=$value->product_image;?>"  alt="">
                                                                    </a>
									<div class="mid-1">
										<div class="women">
                                                                                    <h6><a style="text-transform: capitalize;" href="<?= base_url();?>ProductDetail/<?=$value->id?>"><?=$value->product_name?></a></h6>							
										</div>
										<div class="mid-2">
                                                                                    <p style="color: #666666;"><em class="item_price">Php <?=$value->product_price?></em></p>
											  <div class="block">
												<div class="starbox small ghosting"> </div>
											</div>
											<div class="clearfix"></div>
										</div>
											<div class="add add-2">
                                                                                            
                                                                                          <table>
                                    <tr>
                                        <td>
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
                                </table>
										</div>
									</div>
								</div>
							</div>
                                                        <?php } }
                                                        else
                                                        {
                                                            echo "No item found. Sorry.";
                                                        }
                                                        
                                                            }
                                                    }?>
							<div class="clearfix"></div>
						 </div>
					</div>
				</div>
<!--footer-->
<?php require 'footer.php';?>
<!-- //footer-->
<div class="modal fade" id="header-modal" aria-hidden="true"></div>

</body>
</html>
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