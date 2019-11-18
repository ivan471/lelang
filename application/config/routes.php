<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['input_data']                     = 'Admin/input';
$route['login']                         = 'user/login';
$route['signin']                         = 'user/signin';
$route['page_register']                 = 'user/reg';
$route['register']                         = 'user/register';
$route['signout']                         = 'user/signout';
$route['simpan']                         = 'Admin/lelang';
$route['login_user']                     = 'user/signin';
$route['detail/(:any)']                 = 'user/detail/$1';
$route['comment/(:num)/(:any)']                 = 'user/comment/$1/$2';
$route['history']                 = 'user/history';
$route['lelang_end']                 = 'user/lelang_end';

$route['default_controller']            = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
