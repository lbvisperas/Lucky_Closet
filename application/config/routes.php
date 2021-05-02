<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

/*----------- For Products Page --------------------------------------------- */

$route['account/produc-list'] = 'admin/product';
$route['account/product-add'] = 'admin/product/product_add';
$route['account/signle-product-edit'] = 'admin/product/product_edit';
$route['account/product_edit_submit'] = 'admin/product/product_edit_submit';
$route['account/product-edit/(:num)'] = 'admin/product/get_product_edit/$1';
$route['account/product/product-code'] = 'admin/product/product_code';
$route['account/product-status/(:num)/(:num)'] = 'admin/product/ProductStatus/$1/$2';

$route['account/subcategory_view'] = 'admin/product/subcategory_view';
$route['account/product-delete/(:num)'] = 'admin/product/deleteProduct/$1';
$route['account/product-detail'] = 'admin/product/ProductDetail';

/*----------- For Sale Page --------------------------------------------- */
$route['account/sale-list'] = 'admin/sale';
$route['account/sale-detail/(:num)'] = 'admin/sale/SaleDetail/$1';
$route['account/sale-status/(:num)'] = 'admin/sale/SaleStatus/$1';
$route['account/sale-list-shipped'] = 'admin/sale/shipped';

/*----------- For Category Page --------------------------------------------- */
$route['account/category-add'] = 'admin/category/category_add';
$route['account/category'] = 'admin/category';
$route['account/edit-category/(:num)'] = 'admin/category/editCategory/$1';
$route['account/category-delete/(:num)'] = 'admin/category/deleteCategory/$1';
$route['account/category-status/(:num)/(:num)'] = 'admin/category/CategoryStatus/$1/$2';

/*----------- For Sub Category Page --------------------------------------------- */
$route['account/add-subcategory/(:num)'] = 'admin/category/addSubCategory/$1';
$route['account/view-subcategory/(:num)']	= 'admin/category/viewSubCategory/$1';
$route['account/edit-subcategory/(:num)']	= 'admin/category/editSubCategory/$1';
$route['account/sub-category-delete/(:num)']	= 'admin/category/SubCategoryDelete/$1';

/*----------- For Slidder --------------------------------------------- */
$route['account/add-slider'] = 'admin/slider/addSlider';
$route['account/list-slider'] = 'admin/slider';
$route['account/slider-delete/(:num)'] = 'admin/slider/DeleteSlider/$1';

/*----------- For Customer Page --------------------------------------------- */
$route['account/customer-list'] = 'admin/customer';
$route['account/cutomer-delete/(:num)'] = 'admin/customer/DeleteCustomer/$1';
/*----------- For user Page --------------------------------------------- */


$route['mobile-shop'] = 'dashboard/mobile-shop';
$route['cart'] = 'dashboard/cart';
$route['product-detail/(:num)'] = 'dashboard/product-detail/$1';
$route['add'] = 'dashboard/add';
$route['update-cart'] = 'dashboard/update_cart';
$route['clear-cart'] = 'cart/remove/all';
$route['signle-cart'] = 'dashboard/single_product_add_to_cart';

/*----------- Admin --------------------------------------------- */
$route['admin'] = 'admin/login_controllers';
$route['account/dashboard'] = 'admin/dashboard';
$route['account/new-admin'] = 'admin/newadmin/admin_add';
$route['account/admin-list'] = 'admin/newadmin';
$route['account/admin-delete/(:num)'] = 'admin/newadmin/DeleteAdmin/$1';

/*----------- user product --------------------------------------------- */
$route['ProductList/(:num)/(:num)']	= 'product/allProductList/$1/$2';
$route['ProductList/(:num)/(:num)/(:num)']	= 'product/allProductList/$1/$2';
$route['ProductDetail/(:num)']	= 'product/oneProductdetail/$1';
/*----------- Wishlist --------------------------------------------- */
$route['delete-wishlist/(:num)']	= 'wishlist/DeleteWishlist/$1';
$route['category/(:num)']	= 'categorymenu/index/$1';

/*----------- Shipping --------------------------------------------- */
$route['shipping']	= 'dashboard/shipping';
$route['term']	= 'dashboard/term';
$route['faqs']	= 'dashboard/faqs';

/*----------- Database --------------------------------------------- */
$route['account/db_upload'] = 'admin/database/db_restore';

$route['edit'] = 'user/index';
$route['edit_submit'] = 'user/update_profile';

$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = true;

