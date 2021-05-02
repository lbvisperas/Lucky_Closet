<!DOCTYPE html>
<html class="no-focus">
    <head>
        <meta charset="utf-8">

        <title>Lucky Closet Boutique Admin</title>
        <link rel='icon' href='<?= base_url();?>favicon.ico' type='image/x-icon'/ >

        <meta name="description" content="OneUI - Admin Dashboard Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
        <link rel="shortcut icon" href="assets/img/favicons/favicon.png">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url(); ?>assets/css/oneui.css">
         <style>
            .error
            {
                color: #cc0000;
            }
        </style>
    </head>
    <body style="background: #ffcc66;">
       
        <div id="page-container" >

            <!-- Main Container -->
            <main id="main-container" style="background: #ffcc66;">
              
                <!-- Page Content -->
                <div class="content content-narrow">
                    <div class="row">
                        <div class="col-lg-12" style="margin-top: 100px;">
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                            
                            <!-- Bootstrap Login -->
                            <div class="block block-themed" style="background: white none repeat scroll 0 0; border-radius: 10px;">
<!--                                <div class="block-header" style="background: rgba(255, 255, 255, 0.1) none repeat scroll 0 0; border-radius: 15px;">
                                   
                                    <h3 class="block-title" >Welcome, Please login</h3>
                                </div>-->
                                <div  style="padding: 15px 0px 0px 25px;">
                                    <span style="color: #3C3C3B; font-size: 30px; position: center; "><strong>Admin</strong>|</span><span style="color: #3C3C3B; font-size: 30px; font-weight: 100;">Lucky Closet Boutique</span>
                                </div>

 
                                <div class="block-content">
                    <?php if($this->session->flashdata('SUCCESSMSG')) { ?>
                        <div role="alert" class="alert alert-danger">
                                <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                <?=$this->session->flashdata('SUCCESSMSG')?>
                        </div>
                <?php } ?>
                                    <form class="form-horizontal push-5-t" id="register-form" name="register-form" method="post">
                                        <div class="form-group">
                                            <!--<label class="col-xs-12">Email</label>-->
                                            <div class="col-xs-12">
                                                <input class="form-control" style="background: black none repeat scroll 0 0; border: none; color: white;" type="text" value="<?php echo set_value('email'); ?>" id="email" name="email" placeholder="Email">
                                                <div style="margin-top: 0px; color: red;"><?= form_error('email'); ?></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!--<label class="col-xs-12" >Password</label>-->
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" style="background: black none repeat scroll 0 0; border: none; color: white;"  id="password" value="<?php echo set_value('password'); ?>" name="password" placeholder="Password">
                                                    <div style="margin-top: 0px; color: red;"><?= form_error('password'); ?></div>

                                            </div>
                                        </div>
                                        <div id="account"></div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <button class="btn" style="width: 150px; border-radius: 5px;" name="btn-submit" id="btn-submit" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Log in</button>
                                                <!--<a href="<?php echo site_url('register');?>" class="btn btn-sm btn-primary" ><i class="fa fa-arrow-right push-5-r"></i> Register Now</a>-->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-4"></div>
                        </div>
                        
                      
                    </div>
                </div>
            </main>
          
               
            </footer>
          
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
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.3-jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/validation.min.js"></script>
    </body>
</html>