
<!DOCTYPE html>
<html>
<head>
<title>Lucky Closet Boutique</title>
<link rel='icon' href='<?= base_url();?>favicon.ico' type='image/x-icon'/ >
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content=""> 
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
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
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
		<h3 >Register</h3>
		<h4><a href="index.html">Home</a><label>/</label>Register</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!--login-->

	<div >
            <div class="main-agileits" style="margin-top: 50px;">
				<div class="form-w3agile ">
					<h3>Register</h3>
                                        
                                        
                                        
                                        <form method="post"  action="<?php echo base_url();?>register">
                                            
                                           
                                                <div style="margin-top: 0px; color: red;"><?= form_error('firstname'); ?></div>
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
                                                        <input  type="text"  value="<?php echo set_value('firstname'); ?>"   placeholder="First Name" name="firstname" >
							<div class="clearfix"></div>
                                                        
                                                </div>
                                          
                                                <div style="margin-top: 0px; color: red;"><?= form_error('lastname'); ?></div>
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="<?php echo set_value('lastname'); ?>" name="lastname"  placeholder="Last Name">
							<div class="clearfix"></div>

                                                </div>
                                                
                                                <div style="margin-top: 0px; color: red;"><?= form_error('email'); ?></div>
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
                                                        <input  type="text" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email" >
							<div class="clearfix"></div>
						</div>
                                                
                                                <div style="margin-top: 0px; color: red;"><?= form_error('password'); ?></div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
                                                        <input  type="password" placeholder="Password"  value="<?php echo set_value('password'); ?>" name="password" placeholder="Email">
							<div class="clearfix"></div>
						</div>
                                                
                                                <div style="margin-top: 0px; color: red;"><?= form_error('cpassword'); ?></div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
                                                        <input  type="password" name="cpassword" value="<?php echo set_value('cpassword'); ?>"  placeholder="Confirm Password">
							<div class="clearfix"></div>
						</div>
                                                
                                                <div style="margin-top: 0px; color: red;"><?= form_error('phone'); ?></div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="text"  name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Phone">
							<div class="clearfix"></div>
						</div>
						<input type="submit" value="Submit">
					</form>
				</div>
                                <div class="forg">
					<!--<a href="#" class="forg-left">Forgot Password</a>-->
					<a href="<?=base_url();?>login" class="forg-right">Login</a>
				<div class="clearfix"></div>
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