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
		<h4><a href="index.html">Home</a><label>/</label>Register</h4>
		<div class="clearfix"> </div>
	</div>
</div>

	<div >
            <div class="main-agileits" style="margin-top: 50px; width: 90%">
				<div class="form-w3agile ">
					<h3>1. Shipping Address</h3>
                                            <form method="post"  action="<?php echo base_url();?>checkout">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-3">
                                                            <label>Country</label>
                                                            <div class="key">
                                                                <input  type="text"  value="" required=""  placeholder="Country" name="country" >
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-sm-3">
                                                            <label>City</label>
                                                            <div class="key">
                                                               <input  type="text"  value=""  required="" placeholder="City" name="city" >
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-sm-3">
                                                            <label>Province / Territory</label>
                                                            <div class="key">
                                                              
                                                                <input  type="text"  value="" required=""   placeholder="Province / Territory" name="province" >
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-sm-3">
                                                            <label>Postcode</label>
                                                            <div class="key">
                                                                <input  type="text"  value="" required=""  placeholder="Postcode" name="postcode" >
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-6">
                                                            <label>Street Adress 1</label>
                                                            <div class="key">
                                                                <input  type="text"  value=""  required="" placeholder="Street Adress 1" name="add1" >
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-sm-6">
                                                            <label>Street Adress 2</label>
                                                            <div class="key">
                                                                <input  type="text"  value=""  placeholder="Street Adress 2" name="add2" >
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="border: 1px #e1e1e1 solid"></div>
                                                <br>
                                                 <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-3">
                                                            <label>First Name</label>
                                                            <div class="key">
                                                              
                                                                <input  type="text"  value="" required=""  placeholder="First Name" name="fname" >
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-sm-3">
                                                            <label>Last Name</label>
                                                            <div class="key">
                                                              
                                                                <input  type="text"  value=""  required="" placeholder="Last Name" name="lname" >
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-sm-3">
                                                            <label>Phone </label>
                                                            <div class="key">
                                                                <input  type="text"  value=""  required="" placeholder="Phone" name="phone" >
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-sm-3">
                                                            <label>E-Mail</label>
                                                            <div class="key">
                                                                <input  type="text"  value=""   placeholder="EMail" name="email" >
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="text-align: right;">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-4"></div>
                                                        <div class="col-sm-4"></div>
                                                        <div class="col-sm-4">
                                                            <input style="background: #333333; color: #ffffff;" type="submit" name="cdetail" value="Continue">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                               </div>
			</div>
		</div>
<br>
<br>

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
									"<h3 style='text-transform: capitalize'>"+data.name+"(1 kg)</h3>"+
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