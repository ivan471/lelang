<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['input_data']                     = 'user/input';
$route['login']                         = 'user/login';
$route['profil/(:any)']                         = 'user/profil/$1';
$route['signin']                         = 'user/signin';
$route['page_register']                 = 'user/reg';
$route['register']                         = 'user/register';
$route['signout']                         = 'user/signout';
$route['simpan']                         = 'user/lelang';
$route['reset_password']                         = 'user/reset';
$route['rest']                         = 'user/rest';
$route['login_user']                     = 'user/signin';
$route['detail/(:any)']                 = 'user/detail/$1';
$route['inbox/(:any)']                 = 'user/inbox/$1';
$route['comment/(:num)/(:any)']                 = 'user/comment/$1/$2';
$route['history/(:any)']                 = 'user/history/$1';
$route['lelang_end']                 = 'user/lelang_end';

$route['default_controller']            = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
