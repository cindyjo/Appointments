<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users";

//routes for login/registration
$route['register'] = '/users/create';
$route['login'] = '/users/login';
$route['logout'] = '/users/destroy';

//routes for appointment
$route['new/appointment'] = '/appointments/add';
$route['appointments'] = '/appointments/display';
$route['delete/(:any)'] ='/appointments/remove/$1';
$route['edit/(:any)'] = '/appointments/edit/$1';
$route['edit/appointment'] = '/appointments/update';
$route['404_override'] = '';

//end of routes.php