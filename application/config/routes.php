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
$route['default_controller'] = 'processes';
$route['signin'] = 'processes/signin';
$route['register'] = 'processes/register';
$route['dashboard/admin'] = 'processes/dashboard_admin';
$route['dashboard'] = 'processes/dashboard_user';
$route['users/new'] = 'processes/new_user';
$route['register/create_user'] = 'processes/create_user';
$route['sign_in_process'] = 'processes/sign_in_process';
$route['logoff'] = 'processes/logoff';
$route['admin/admin_new_user'] = 'processes/admin_new_user';
$route['remove_user/(:any)'] = 'processes/remove_user/$1';
$route['edit_user/(:any)'] = 'processes/edit_user/$1';
$route['change_user_info/(:any)'] = 'processes/change_user_info/$1';
$route['change_user_pword/(:any)'] = 'processes/change_user_pword/$1';
$route['users/edit'] = 'processes/user_profile';
$route['edit_info/(:any)'] = 'processes/edit_info/$1';
$route['edit_pword/(:any)'] = 'processes/edit_pword/$1';
$route['edit_desc/(:any)'] = 'processes/edit_desc/$1';
$route['users/show/(:any)'] = 'processes/user_information/$1';
$route['send_message'] = 'processes/send_message';
$route['send_comment'] = 'processes/send_comment';





$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
