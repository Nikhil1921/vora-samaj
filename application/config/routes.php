<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = 'home/error_404';
$route['translate_uri_dashes'] = TRUE;

$route['login'] = 'home/login';
$route['gallery'] = 'home/gallery';
$route['events'] = 'home/events';
$route['information'] = 'home/information';
$route['information/(:any)'] = 'home/information_details/$1';
$route['about-us'] = 'home/about_us';
$route['contact-us'] = 'home/contact_us';
$route['news'] = 'home/news';
$route['news/(:num)'] = 'home/news_details/$1';
$route['boys-girls'] = 'members/boys_girls';
$route['send-sms']['post'] = 'home/send_sms';
$route['get-state'] = 'home/get_state';
$route['get-city'] = 'home/get_city';
// admin routes
$route[ADMIN."/forgot-password"] = ADMIN."/login/forgot_password";
$route[ADMIN."/check-otp"] = ADMIN."/login/check_otp";
$route[ADMIN."/change-password"] = ADMIN."/login/change_password";
$route[ADMIN."/dashboard"] = ADMIN."/home";