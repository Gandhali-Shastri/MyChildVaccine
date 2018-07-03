<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ASHUTOSH
$route['compare'] = 'compares/index';
$route['compares/get_vaccines'] = 'compares/get_vaccines';
$route['showcompare'] = 'showcompare/index';
$route['history'] = 'History';
$route['showhistory'] = 'showHistory/index';

// SAYALI
$route['displays/decide']='displays/decide';
$route['displays']='displays/index';
$route['displays/x']='displays/x';
$route['manageVaccinesController']='manageVaccinesController/index';
$route['addVaccinesController']='addVaccinesController/index';

$route['admin_home']='adminhome_controller/displayInfo';
$route['children'] = 'managechildren_controller/displayinfo';
$route['intro'] = 'intro_controller/userdata';
$route['home'] = 'home_controller/view';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['updateAccount'] = 'user_controller/settings';