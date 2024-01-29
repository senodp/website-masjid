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
$route['default_controller'] 	= 'router';
$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= TRUE;

$route['router/fv_(:any)'] 					= "router/fv_$1";
$route['router/fv_(:any)/(:any)'] 			= "router/fv_$1/$2";
$route['router/fv_(:any)/(:any)/(:any)'] 	= "router/fv_$1/$2/$3";

// Language router
$route['lang/change/(:any)'] 				= "lang/change/$1";
$route['lang/change/(:any)/(:any)'] 		= "lang/change/$1/$2";

// CMS Router
$route['control'] 							= "router/backend";
$route['control/(:any)'] 					= "router/backend/$1";
$route['control/(:any)/(:any)'] 			= "router/backend/$1/$2";
$route['control/(:any)/(:any)/(:any)'] 		= "router/backend/$1/$2/$3";
$route['control/(:any)/(:any)/(:any)/(:any)'] 				= "router/backend/$1/$2/$3/$4";
$route['control/(:any)/(:any)/(:any)/(:any)/(:any)'] 		= "router/backend/$1/$2/$3/$4/$5";

// Frontend Login
$route['login'] 							= "auth/login";
$route['login/(:any)'] 						= "auth/login/$1";
$route['logout'] 							= "auth/logout";
$route['logout/(:any)'] 					= "auth/logout/$1";
$route['denied'] 							= "auth/denied";
$route['denied/(:any)'] 					= "auth/denied/$1";

// $route['search/(:any)'] 					= "router/frontend/search/index/$1";

// Frontend Router
$route['en'] 								= "router/frontend_i18n/eng";
$route['en/(:any)'] 						= "router/frontend_i18n/eng/$1";
$route['en/(:any)/(:any)'] 					= "router/frontend_i18n/eng/$1/$2";
$route['en/(:any)/(:any)/(:any)'] 			= "router/frontend_i18n/eng/$1/$2/$3";
$route['en/(:any)/(:any)/(:any)/(:any)'] 	= "router/frontend_i18n/eng/$1/$2/$3/$4";

$route['id'] 								= "router/frontend_i18n/ind";
$route['id/(:any)'] 						= "router/frontend_i18n/ind/$1";
$route['id/(:any)/(:any)'] 					= "router/frontend_i18n/ind/$1/$2";
$route['id/(:any)/(:any)/(:any)'] 			= "router/frontend_i18n/ind/$1/$2/$3";
$route['id/(:any)/(:any)/(:any)/(:any)'] 	= "router/frontend_i18n/ind/$1/$2/$3/$4";

$route['(:any)'] 							= "router/frontend_i18n_default/$1";
$route['(:any)/(:any)'] 					= "router/frontend_i18n_default/$1/$2";
$route['(:any)/(:any)/(:any)'] 				= "router/frontend_i18n_default/$1/$2/$3";
$route['(:any)/(:any)/(:any)/(:any)'] 		= "router/frontend_i18n_default/$1/$2/$3/$4";

/* End of file config/routes.php */