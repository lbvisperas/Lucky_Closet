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

</head>
<body>
<?php  require_once 'header.php';?>

       <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Faqs</h3>
                <h4><a href="<?=base_url();?>">Home</a><label>/</label>Faqs</h4>
		<div class="clearfix"></div>
	</div>
</div>

<!-- faqs -->
	<div class="faq-w3 main-grid-border">
		<div class="container">
			
			<div class="spec ">
			<h3>Faqs</h3>
			</div>
				<div class="panel-group" id="accordion">
				<!-- First Panel -->
					<div class="panel panel-default">
						<div class="panel-heading">
							 <h4 class="panel-title" data-toggle="collapse" data-target="#collapseOne">
								 <span>1.</span>What is our mission?
							 </h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse">
							<div class="panel-body">
								<p>Our mission is to deliver goods and services of the highest quality and with the utmost care in each of our products. The love and care we put into each one, plus the service that we provide makes us a leader in online fashion marketing and sales.</p>
							</div>
						</div>
					</div>
					
					<!-- Second Panel -->
					<div class="panel panel-default">
						<div class="panel-heading">
							 <h4 class="panel-title" data-toggle="collapse"  data-target="#collapseTwo">
								<span>2.</span>Where are you based?
							 </h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse">
							<div class="panel-body">								
								<p>We are based in Manila, however, we also have a base in Nagoya, Japan.</p>
							</div>
						</div>
					</div>
				</div>
		</div>	
	</div>
	<!-- // Terms of use -->


<?php require 'footer.php';?>
<!-- //footer-->
<div class="modal fade" id="header-modal" aria-hidden="true"></div>

</body>
</html>
