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

<link href="<?=base_url();?>css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="<?=base_url();?>css/style.css" rel='stylesheet' type='text/css' />
<script src="<?=base_url();?>js/jquery-1.11.1.min.js"></script>

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<link href="<?=base_url();?>css/font-awesome.css" rel="stylesheet"> 
<!--<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>-->

<script src="<?=base_url();?>js/jstarbox.js"></script>
<link rel="stylesheet" href="<?=base_url();?>css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
<style>
@media (min-width: 0px) and (max-width: 300px) {
    .pro-1{
        width: 100%;
    }
}
</style>


</head>
<body>
<?php  require_once 'header.php';?>
	<br>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
          
    <div class="item active">
          <a><img  class="first-slide" style="width:100%" src="<?= base_url();?>images/ba1.jpg" alt="First slide"></a>
    </div>
          
      <?php
      foreach ($slider as $slide)
      {?>
        <div class="item">
            <a><img height="250px" width="100%" src="<?= base_url();?>upload/slider/<?=$slide->id?>/<?=$slide->name?>" alt="Second slide"></a>
        </div>
      <?php }
      ?>
          <!--
        <div class="item">
          <a href="kitchen.html"><img class="second-slide " src="<?= base_url();?>images/ba.jpg" alt="Second slide"></a>
         
        </div>
        <div class="item">
          <a href="hold.html"><img class="third-slide " src="<?= base_url();?>images/ba2.jpg" alt="Third slide"></a>
          
        </div>-->
      </div>
    
</div>


<!--content-->
	<div class="product">
		<div class="container">		
			<form class="navbar-form" style="text-align:center" role="search" action="product/search_products" method="post">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search for anything!" id="input" name="input" size="50">
				</div>
				<button type="search_submit" class="btn btn-info">Submit</button>
			</form>

			<br><br>
			<div class="spec ">
				<h3>Popular Products</h3>
			</div>
				<div class=" con-w3l">
                                    <?php 
                                if(!empty($popular_product))
                                {
                                    foreach ($popular_product as $popular)
                                    { 
                                        
                                        $id = $popular->id;
                                        $name = $popular->product_name;
                                        $description = $popular->product_description;
                                        $price = $popular->product_price;
                                        $image = $popular->product_image;
                                    ?>
							<div class="col-md-3 pro-1">
								<div class="col-m">
                                                                   <a class="offer-img quicklook" id="<?=$popular->id?>" style="text-align: center; cursor: pointer;">
                                                                               <img height="125px" width="300%" src="<?=base_url();?>/upload/product/<?=$popular->id;?>/<?=$popular->product_image;?>"  alt="">
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a style="text-transform: capitalize;" href="<?= base_url();?>ProductDetail/<?=$popular->id?>"><?=$popular->product_name?></a></h6>							
										</div>
										<div class="mid-2">
											<p style="color: #666666;"><em class="item_price">Php <?=$popular->product_price?></em></p>
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
                                    <?php }
                                }
                                else
                                {
                                     echo "Out of Stock.";
                                } ?>
					<div class="clearfix"></div>
                                    </div>
		</div>
		<div class="container">
			<div class="spec ">
                            <form action="" method="get">
                                <input type="hidden" class="ui-autocomplete-input" autocomplete="off" id="txtinput" name="txtinput" class="form-control" aria-label="...">
                            </form>
                            
                <br><br>            
				<h3>Latest Products</h3>
			</div>
				<div class=" con-w3l">
                                    <?php 
                                    if(!empty($latest_product))
                                    {
                                    foreach ($latest_product as $latest)
                                    { 
                                                                $id = $latest->id;
                                                                $name = $latest->product_name;
                                                                $description = $latest->product_description;
                                                                $price = $latest->product_price;
                                                                $image = $latest->product_image;
                                    ?>
							<div class="col-md-3 pro-1">
								<div class="col-m">
                                                                    <a class="offer-img quicklook" id="<?=$latest->id?>" style="text-align: center; cursor: pointer;">
                                                                    <img height="125px" width="100%" src="<?=base_url();?>/upload/product/<?=$latest->id;?>/<?=$latest->product_image;?>"  alt="">
									</a>
									<div class="mid-1">
										<div class="women">
                                                                                    <h6><a style="text-transform: capitalize;" href="<?= base_url();?>ProductDetail/<?=$latest->id?>"><?=$latest->product_name?></a></h6>							
										</div>
										<div class="mid-2">
                                                                                    <p style="color: #666666;"><em class="item_price">Php <?=$latest->product_price?></em></p>
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
                                    <?php }
                                    }
                                    else
                                    {
                                        echo "Out of Stock.";
                                    }
                                    ?>
                                            <div class="clearfix"></div>
                                    </div>
		</div>
		<div class="container">
			<div class="spec ">
			<br><br>
				<h3>Featured Products</h3>
			</div>
				<div class=" con-w3l">
                                <?php 
                                 if(!empty($feature_product))
                                    {
                                    foreach ($feature_product as $feature)
                                    { 
                                            $id = $feature->id;
                                            $name = $feature->product_name;
                                            $description = $feature->product_description;
                                            $price = $feature->product_price;
                                            $image = $feature->product_image;
                                        ?>
							<div class="col-md-3 pro-1">
								<div class="col-m">
                                                                        <a class="offer-img quicklook" id="<?=$feature->id?>" style="text-align: center; cursor: pointer;">
                                                                            <img height="125px" width="100%" src="<?=base_url();?>/upload/product/<?=$feature->id;?>/<?=$feature->product_image;?>"  alt="">
                                                                        </a>
									<div class="mid-1">
										<div class="women">
											<h6><a style="text-transform: capitalize;" href="<?= base_url();?>ProductDetail/<?=$feature->id?>"><?=$feature->product_name?></a></h6>							
										</div>
										<div class="mid-2">
											<p style="color: #666666;"><em class="item_price">Php <?=$feature->product_price?></em></p>
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
                                         echo "Out of Stock.";
                                    }
                                    ?>
                                            <div class="clearfix"></div>
                                        </div>
		</div>
	</div>
<div class="modal fade" id="header-modal" aria-hidden="true"></div>

<?php require 'footer.php';?>

<script src="<?=base_url();?>js/bootstrap.js"></script>

<script type='text/javascript' src="<?=base_url();?>js/jquery.mycart.js"></script>

<link href="<?=base_url();?>assets/jquery-ui.css" rel="Stylesheet"></link>
<script src="<?=base_url();?>assets/jquery-ui.js" ></script>


</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
		function split( val ) {
                return val.split( /,\s*/ );
        }
		function extractLast( term ) {
                 return split( term ).pop();
        }

        $( "#txtinput" ).bind( "keydown", function( event ) {
                if ( event.keyCode === $.ui.keyCode.TAB && $( this ).data( "autocomplete" ).menu.active ) {
                    event.preventDefault();
                }
		}).autocomplete({
                source: function( request, response ) {
                    $.getJSON( "<?php echo base_url('product/getUserEmail');?>",{
                        term: extractLast( request.term )
                    },response );
                },
                search: function() {
                    // custom minLength
                    var term = extractLast( this.value );
                    if ( term.length < 1 ) {
                        return false;
                    }
                },
                focus: function() {
                    // prevent value inserted on focus
                    return false;
                },
                select: function( event, ui ) {
                    var terms = split( this.value );
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push( ui.item.value );
                    // add placeholder to get the comma-and-space at the end
                    terms.push( "" );
                    this.value = terms.join( "," );
                    return false;
                },
				position: {  collision: "flip"  }
		}); 
 });
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