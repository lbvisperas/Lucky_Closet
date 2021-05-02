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
<body>
<?php  require_once 'header.php';?>
  <!---->

 <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Contact</h3>
                <h4><a href="<?=base_url();?>">Home</a><label>/</label>Contact</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!-- contact -->
<div class="contact">
	<div class="container">
		<div class="spec ">
			<h3>Contact</h3>
		</div>
             <?php if($this->session->flashdata('SUCCESSMSG')) { ?>
                        <div role="alert" class="alert alert-success">
                                <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                <strong>Well done!</strong>
                                <?=$this->session->flashdata('SUCCESSMSG')?>
                        </div>
                <?php } ?>
            
		<div class=" contact-w3">	
			<div class="col-md-5 contact-right">	
				<img src="<?=base_url();?>images/cac.jpg" class="img-responsive" alt="">
				<div style="overflow:hidden;width: 450px;position: relative;"><iframe width="700" height="440" src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=manila+(test)&amp;ie=UTF8&amp;t=&amp;z=12&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"><small style="line-height: 1.8;font-size: 2px;background: #fff;">Powered by <a href="https://embedgooglemaps.com/fr/">Embedgooglemaps FR</a> & <a href="https://and-route.com/nl/">auto huren goedkoop</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><br />
			</div>
			<div class="col-md-7 contact-left">
				<h4>Contact Information</h4>
				<p> Please do not hesitate to reach out to us at the contact information found below! We're pretty nice, so it's okay.</p>
				<ul class="contact-list">
					<li> <i class="fa fa-map-marker" aria-hidden="true"></i> Mnl, PH | Ngy, JP</li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:bouttoh@upou.edu.ph">bouttoh@upou.edu.ph</a></li>
					<li> <i class="fa fa-phone" aria-hidden="true"></i>+63 9276436311</li>
				</ul>
				<div id="container">
					<!--Horizontal Tab-->
					<div id="parentHorizontalTab">
						<ul class="resp-tabs-list hor_1">
							<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
							<li> <i class="fa fa-map-marker" aria-hidden="true"></i> </span></li>
							<li> <i class="fa fa-phone" aria-hidden="true"></i></li>
						</ul>
						<div class="resp-tabs-container hor_1">
							<div>
                                                            <form action="<?=base_url();?>contact" method="post">
                                                                    <input type="text"  name="name" placeholder="Name" required="">
                                                                    <input type="email"  name="email" placeholder="Email" required="">
                                                                    <textarea name="message"  required="" placeholder="Message..."></textarea>
                                                                    <input type="submit" value="Submit" >
								</form>
							</div>
							<div>
								<div class="map-grid">
								<h5>Our Branches</h5>
									<ul>
										<li><i class="fa fa-arrow-right" aria-hidden="true"></i>Manila, Philippines.</li>
										<li><i class="fa fa-arrow-right" aria-hidden="true"></i>Nagoya, Japan</li>
									</ul>
								</div>
							</div>
							<div>
								<div class="map-grid">
									<h5>Contact Us Through</h5>
									<ul>
										<li>Mobile No : +63 9276436311</li>
										<li>Viber : +63 9276436311</li>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!--Plug-in Initialisation-->
				<script type="text/javascript">
				$(document).ready(function() {
					//Horizontal Tab
					$('#parentHorizontalTab').easyResponsiveTabs({
						type: 'default', //Types: default, vertical, accordion
						width: 'auto', //auto or any width like 600px
						fit: true, // 100% fit in a container
						tabidentify: 'hor_1', // The tab groups identifier
						activate: function(event) { // Callback function if tab is switched
							var $tab = $(this);
							var $info = $('#nested-tabInfo');
							var $name = $('span', $info);
							$name.text($tab.text());
							$info.show();
						}
					});

					// Child Tab
					$('#ChildVerticalTab_1').easyResponsiveTabs({
						type: 'vertical',
						width: 'auto',
						fit: true,
						tabidentify: 'ver_1', // The tab groups identifier
						activetab_bg: '#fff', // background color for active tabs in this group
						inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
						active_border_color: '#c1c1c1', // border color for active tabs heads in this group
						active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
					});

					//Vertical Tab
					$('#parentVerticalTab').easyResponsiveTabs({
						type: 'vertical', //Types: default, vertical, accordion
						width: 'auto', //auto or any width like 600px
						fit: true, // 100% fit in a container
						closed: 'accordion', // Start closed if in accordion view
						tabidentify: 'hor_1', // The tab groups identifier
						activate: function(event) { // Callback function if tab is switched
							var $tab = $(this);
							var $info = $('#nested-tabInfo2');
							var $name = $('span', $info);
							$name.text($tab.text());
							$info.show();
						}
					});
				});
			</script>
				
			</div>
			
		<div class="clearfix"></div>
	</div>
	</div>
</div>
<!-- //contact -->

<!--footer-->
<?php require 'footer.php';?>
<!-- //footer-->
<!-- tabs -->

  <script src="<?=base_url();?>js/easyResponsiveTabs.js" type="text/javascript"></script>
</body>
</html>