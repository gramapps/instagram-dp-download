<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller']   = 'MainController';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;


$route['instagram']          = 'InstagramController/index';
$route['instagram/u/(:any)'] = 'InstagramController/userFeeds/$1';
$route['instagram/p/(:any)'] = 'InstagramController/feedDetails/$1';


$route['sitemap.xml'] = 'PagesController/sitemap';

