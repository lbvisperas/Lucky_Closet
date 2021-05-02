<nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url();?>account/dashboard">Lucky Closet Boutique</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?= base_url();?>account/dashboard">Administrator</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Products and Categories<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header">Products</li>
                  <li><a href="<?= base_url();?>account/produc-list">All Products</a></li>
                  <li><a href="<?= base_url();?>account/product-add">Add Product</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Categories</li>
                  <li><a href="<?= base_url();?>account/category">All Categories</a></li>
                  <li><a href="<?= base_url();?>account/category-add">Add Category</a></li>
                </ul>
              </li>
			  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Customers and Sales<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header">Customers</li>
                  <li><a href="<?= base_url();?>account/customer-list">All Customers</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Sales</li>
                  <li><a href="<?= base_url();?>account/sale-list">Checked Out</a></li>
                  <li><a href="<?= base_url();?>account/sale-list-shipped">Shipped Sales</a></li>
                </ul>
              </li>
			  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Maintenance<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header">Carousel</li>
                  <li><a href="<?= base_url();?>account/list-slider">List Photos</a></li>
				  <li><a href="<?= base_url();?>account/add-slider">Add Photos</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Administrator</li>
                  <li><a href="<?= base_url();?>account/admin-list">Admin List</a></li>
                  <li><a href="<?= base_url();?>account/new-admin">Add new admin</a></li>
				  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Database</li>
                  <li><a href="<?=base_url("admin/Database/backup")?>">Backup Database</a></li>
                  <li><a href="<?= base_url();?>account/db_upload">Restore Database</a></li>
                </ul>
              </li>
			  <li class="dropdown pull-right">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->email; ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('admin'); ?>">Log out</a></li>
				</ul>
			  </li>
			  
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>