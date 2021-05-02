<!--<a href="offer.html"><img src="<?=base_url();?>images/download.png" class="img-head" alt=""></a>-->
<div class="header">
            <div class="container">
			     <div class="logo">
                    <a href="<?=base_url();?>">
                                    <img src = "<?=base_url();?>images/logo.JPG" style="width:8%"/>
                    </a>
                </div>
				<div class="nav-top">
				  <nav class="navbar navbar-default">
					<div class="container">
					  <div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						  <span class="sr-only">Toggle navigation</span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						</button>
					  </div>
					  <div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
						  <li><a class = href="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard' ? 'active' : '';?>"><a class="hyper" href="<?=base_url();?>dashboard"><span>Home</span></a></li>
                            <?php
								foreach ($category_list as $category){?>
									<li  class="dropdown">
                                        <a href="#" style="text-transform: capitalize;" class="dropdown-toggle hyper" data-toggle="dropdown" ><span><?=$category->category_name?><b class="caret"></b></span></a>
                                        <ul class="dropdown-menu multi">
										<div class="row">
                                            <?php 
                                            foreach ($subcate as $sub){
                                                if($category->id==$sub->parent_category_id){
                                            ?>
                                            <div class="col-sm-3">
												<ul class="multi-column-dropdown">
                                                <li><a href="<?php echo base_url()?>ProductList/<?php echo $category->id.'/'.$sub->subcat_id;?>" style="text-transform: capitalize;"><i class="fa fa-angle-right" aria-hidden="true"></i><?= $sub->subcategory_name;?></a></li>
                                                </ul>
                                            </div>
                                            <?php } }?>                               
									</div>	
								</ul>         
							</li>
                            <?php }?>
							<li><a class="hyper" href="<?=base_url();?>contact"><span>Contact Us</span></a></li>
                            <li><a class="hyper" href="<?=base_url();?>cart"><span>Cart</span></a></li>
                            <?php
								$var = trim($this->session->userdata('userid'));
                                if(!empty($var))
							{?>
									<li><a class="hyper" href="<?=base_url();?>login/logout"><span>Log out</span></a></li>
                            <?php }
                                else {?>
									<li><a class="hyper" href="<?=base_url();?>login"><span>Log in</span></a></li>
                            <?php }?>
							    <!--  <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->

						</ul>
					  </div><!--/.nav-collapse -->
					</div>
				  </nav>

				</div>
					
		</div>			
</div>
<br><br>
