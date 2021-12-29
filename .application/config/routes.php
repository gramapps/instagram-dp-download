<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller']   = 'MainController';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;


$route['instagram']            = 'InstagramController/index';
$route['instagram/fetchImage'] = 'InstagramController/fetchImage';
$route['instagram/fetchVideo'] = 'InstagramController/fetchVideo';
$route['instagram/download']   = 'InstagramController/download';


$route['instagram/u/(:any)']         = 'InstagramController/userFeeds/$1';
$route['instagram/u/(:any)/dp']      = 'InstagramController/userDp/$1';
$route['instagram/u/(:any)/stories'] = 'InstagramController/userStories/$1';
$route['instagram/u/(:any)/reels']   = 'InstagramController/userReels/$1';
$route['instagram/u/(:any)/igtv']    = 'InstagramController/userIgtv/$1';

$route['instagram/p/(:any)'] = 'InstagramController/feedDetails/$1';

$route['instagram/download/(:any)'] = 'InstagramController/downloadMedia/$1';


$route['instagram/tools/parseSearch'] = 'InstagramToolsController/parseSearch';
$route['instagram/tools/(:any)']      = 'InstagramToolsController/downloader/$1';


$route['sitemap.xml'] = 'PagesController/sitemap';

