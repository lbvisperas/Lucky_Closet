<!DOCTYPE html>
<html class="no-focus">
    <head>
        <meta charset="utf-8">
        <title>Edit Sub Category</title>
        <meta name="description" content="OneUI - Admin Dashboard Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
        <link rel="shortcut icon" href="assets/img/favicons/favicon.png">
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/slick/slick.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/slick/slick-theme.min.css">
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url(); ?>assets/css/oneui.css">

    </head>
    <body>
            <div id="page-container" class="side-scroll header-navbar-fixed">
         
       
       <?php      require_once(APPPATH.'views/admin/header.php'); ?>
            <!-- Main Container -->
            <main id="main-container">
                 <div class="content">
                    <div class="row">
                       <div class="col-lg-12">
                           <?php if($this->session->flashdata('SUCCESSMSG')) { ?>
                                   <div role="alert" class="alert alert-success">
                                           <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                           <strong>Well done!</strong>
                                           <?=$this->session->flashdata('SUCCESSMSG')?>
                                   </div>
                           <?php } ?>
                       </div>
                    </div>
                 </div>
                <!-- Page Content -->
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Main Dashboard Chart -->
                            <div class="block">
                                <div class="block-header">
                                    <ul class="block-options">
                                        <li>
                                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                        </li>
                                    </ul>
                                    <h3 class="block-title">Edit Sub-Category</h3>
                                </div>
                                <div class="block-content block-content-full bg-gray-lighter ">
                                    <?php
                                    foreach ($editSubCategory as $post)
                                    {
                                    ?>
                                    <form class="form-horizontal"  method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Sub-Category Name<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="sub_category_name" value="<?= $post->subcategory_name;?>" name="sub_category_name" placeholder="Category Name" >
                                                    <div style="margin-top: 0px; color: red;"><?= form_error('sub_category_name'); ?></div>
                                            </div>
                                        </div>
                                          
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Image<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <img id="previewimage" onclick="$('#uploadFile').click();" src="<?php echo base_url(); ?>upload/subcategory/<?=$post->subcat_id?>/<?=$post->image?>" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                                                <input type="file" id="uploadFile" name="subimage" style="position: absolute; margin: 0px auto; visibility: hidden;" accept="image/*"  />
                                                <input type="hidden"  value="<?= $post->image;?>" name="sub_category_image">
                                                <input type="hidden"  value="<?= $post->subcat_id;?>" name="insertid">
                                            </div>
                                        </div>
                                        
                                       <div class="form-group">
                                            <div class="col-md-8 col-md-offset-2">
                                                <button class="btn btn-sm btn-primary" name="submit" type="submit"><i class="fa fa-check"></i> Edit Sub-Category Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <? }?>
                                </div>
                            </div>
                            <!-- END Main Dashboard Chart -->
                        </div>
                     
                    </div>
                  
                </div>
                <!-- END Page Content -->
            </main>
        <?php      require_once(APPPATH.'views/admin/footer.php'); ?>
        </div>
    
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.appear.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.countTo.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.placeholder.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/js.cookie.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
        
    </body>
</html>
<script>
    
$('document').ready(function()
{ 
	function readURL(input) {
		if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                            $('#previewimage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
		}
	}
		$("#uploadFile").change(function(){
			readURL(this);
		});
	
});
</script>