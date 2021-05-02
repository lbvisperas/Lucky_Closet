<!DOCTYPE html>
<html>
<head>
<title>Lucky Closet Boutique</title>
<link rel='icon' href='<?= base_url();?>favicon.ico' type='image/x-icon'/ >
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
<script src="<?= base_url();?>js/bootstrap.js"></script>

<script type='text/javascript' src="<?= base_url();?>js/jquery.mycart.js"></script>

<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?= base_url();?>js/move-top.js"></script>
<script type="text/javascript" src="<?= base_url();?>js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<style>
@media (min-width: 0px) and (max-width: 480px) {
    .pro-1{
        width: 100%;
    }
}
</style>

<!-- start-smoth-scrolling -->
<link href="<?= base_url();?>css/font-awesome.css" rel="stylesheet"> 
<!--<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>-->
<!--- start-rate---->
<script src="<?= base_url();?>js/jstarbox.js"></script>
<link rel="stylesheet" href="<?= base_url();?>css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		

</head>
<body>
<?php  require_once 'header.php';?>

<div class="banner-top">
	<div class="container">
            <h3 style="text-transform: capitalize;"><?=$category_title?></h3>
                <h4><a href="<?=base_url();?>">Home</a><label>/</label><span style="text-transform: capitalize;"><?=$category_title?></span></h4>
		<div class="clearfix"> </div>
	</div>
</div>
 
    	<div class="check-out">	 
		<div class="container">
			<div class="spec ">
                            <h3 style="text-transform: capitalize;"><?=$category_title?></h3>
			</div>
				<div class=" con-w3l agileinf">
                                    <?php 
                                    foreach ($subcategory_list as $post)
                                    {
                                    ?>
							<div class="col-md-3 pro-1">
								<div class="col-m">
                                                                    <a href="<?=base_url();?>ProductList/<?=$category_id?>/<?=$post->subcat_id?>" class="offer-img" style="text-align: center;">
                                                                        <img height="125px" width="100%" src="<?=base_url();?>upload/subcategory/<?=$post->subcat_id?>/<?=$post->image?>" alt="">
									</a>
									<div class="mid-1">
                                                                            <div class="women" style="text-align: center;">
                                                                                    <h6><a href="<?=base_url();?>ProductList/<?=$category_id?>/<?=$post->subcat_id?>" style="text-transform: capitalize; text-align: center;"><?=$post->subcategory_name?></a></h6>							
										</div>
									</div>
								</div>
							</div>
                                    <? }?>
							<div class="clearfix"></div>
						 </div>
		</div>
	</div>

<div class="modal fade" id="header-modal" aria-hidden="true"></div>
<!--footer-->
<?php require 'footer.php';?>
<!-- //footer-->
  			
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