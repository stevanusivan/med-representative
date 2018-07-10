<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'pages/view';
$route['prescription/edit'] = 'prescription/edit';
$route['prescription/get_prescription_doctor'] = 'prescription/get_prescription_doctor';
$route['prescription/get_product_by_prescription'] = 'prescription/get_product_by_prescription';
$route['prescription/view_prescription_pict'] = 'prescription/view_prescription_pict';
$route['prescription/create'] = 'prescription/create';
$route['productlalala'] = 'pages/search';
$route['pages/search'] = 'pages/search';
$route['(:any)'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
