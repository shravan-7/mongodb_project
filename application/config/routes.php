<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'usercontroller';
$route['users/login_form'] = 'users/login_form';
$route['login'] = 'Login';

//$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
