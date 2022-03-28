<?php defined('BASEPATH') OR exit('No direct script access allowed');
$admin = 'adminPanel';

$route['default_controller'] = 'home';
$route['404_override'] = 'home/error_404';
$route['translate_uri_dashes'] = TRUE;
$route['members'] = 'home/members';
$route['login'] = 'home/login';
$route['committee-members'] = 'home/committee_members';
$route['events'] = 'home/events';
$route['about-us'] = 'home/about_us';
$route['my-family'] = 'home/my_family';
$route['contact-us'] = 'home/contact_us';
$route['news'] = 'home/news';
$route['news/(:num)'] = 'home/news_details/$1';
$route['boys-girls'] = 'home/boys_girls';
// admin routes
$route["$admin/forgot-password"] = "$admin/login/forgot_password";
$route["$admin/check-otp"] = "$admin/login/check_otp";
$route["$admin/change-password"] = "$admin/login/change_password";
$route["$admin/dashboard"] = "$admin/home";