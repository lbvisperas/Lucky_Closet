<div class="footer">
	<div class="container">
		<div class="col-md-4 footer-grid">
			<h3>About Us</h3>
			<p>Developed by Lianne Visperas and Benjamin Uttoh as a partial requirement for IS 226 (Web Information Systems). This template made is free to use, however, we cannot provide support after June 2019.</p>
		</div>
		<div class="col-md-4 footer-grid ">
			<h3>Customer Services</h3>
			<ul>
                                <li><a href="<?=base_url()?>shipping">Shipping</a></li>
				<li><a href="<?=base_url()?>term">Terms & Conditions</a></li>
				<li><a href="<?=base_url()?>faqs">Faqs</a></li>
				<li><a href="<?=base_url()?>contact">Contact</a></li>
				 
			</ul>
		</div>
		<div class="col-md-4 footer-grid">
			<h3>My Account</h3>
			<ul>
                                    <?php
									$var = trim($this->session->userdata('userid'));
                                    if(!empty($var))
                                    {?>
                                    <li><a style="cursor: pointer; text-transform: capitalize;" href = "<?=base_url()?>edit"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $this->session->userdata('firstname');?></a></li>
                                        <li><a href="<?=base_url();?>login/logout" ><i class="fa fa-arrow-right" aria-hidden="true"></i> Logout</a></li>
                                    <?php }
                                    else {?>
                                        <li><a href="<?=base_url();?>login" ><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>
                                        <li><a href="<?=base_url();?>register" ><i class="fa fa-arrow-right" aria-hidden="true"></i> Register</a></li>
                                   <?php }
                                    
                                    ?>
			</ul>
		</div>
		<div class="clearfix"></div>
			<div class="footer-bottom">
                            <h2 ><a href="<?=base_url();?>">Lucky Closet<span>Find what suits you</span></a></h2>
				<div class=" address">
					<div class="col-md-4 fo-grid1">
							<p><i class="fa fa-home" aria-hidden="true"></i>PH | JP</p>
					</div>
					<div class="col-md-4 fo-grid1">
							<p><i class="fa fa-phone" aria-hidden="true"></i>+63 9276436311</p>	
					</div>
					<div class="col-md-4 fo-grid1">
						<p><a href="mailto:bouttoh@upou.edu.ph"><i class="fa fa-envelope-o" aria-hidden="true"></i>bouttoh@upou.edu.ph</a></p>
					</div>
					<div class="clearfix"></div>
					
					</div>
			</div>
		<div class="copy-right">
			<p>Developed in 2019 by Lianne Visperas and Benjamin Uttoh</p>
		</div>
	</div>
</div>