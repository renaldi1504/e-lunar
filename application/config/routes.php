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
$route['default_controller'] = 'home';
$route['category/(:any)'] = 'product/category/$1';

$route['ngadmin/login']='admin/loginController';
$route['ngadmin/dologin']='admin/loginController/postLogin';
$route['ngadmin/logout']='admin/loginController/logout';
$route['ngadmin']='admin/homeController';
//product controller
$route['ngadmin/banner']="admin/banner";
$route['ngadmin/banner/(:any)'] = "admin/banner/$1";
$route['ngadmin/product']='admin/productController';
$route['ngadmin/product/(:num)']='admin/productController/index/$1';
$route['product/editstatus/(:num)/(:num)/(:num)']='admin/productController/changeStatus/$1/$2/$3';
$route['product/delete/(:num)/(:num)']="admin/productController/delete/$1/$2";
$route['product/form/(:any)']="admin/productController/getFormProduct/$1";
$route['product/addProduct']="admin/productController/addProduct";
$route['product/updateProduct/(:any)']="admin/productController/updateProduct/$1";
$route['product/updateStock/(:num)']="admin/productController/updateStock/$1";
$route['product/updateImage/(:num)']="admin/productController/updateImage/$1";
$route['product/image/(:num)'] = "admin/productController/image/$1";
$route['product/uploadImage/(:num)'] = "admin/productController/uploadImage/$1";
$route['product/add_stock/(:num)'] = "admin/productController/addStock/$1";
$route['product/stock/delete/(:num)/(:num)'] = "admin/productController/deleteStock/$1/$2";
$route['product/image/delete/(:num)/(:num)'] = 'admin/productController/deleteImage/$1/$2';
$route['ngadmin/category'] = 'admin/categoryController/index';
$route['category/form/(:any)'] = 'admin/categoryController/getFormCategory/$1';
$route['category/update/(:any)'] = 'admin/categoryController/updateCategory/$1';
$route['category/insert']  = 'admin/categoryController/insertCategory';
$route['category/delete/(:num)'] = 'admin/categoryController/deleteCategory/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
