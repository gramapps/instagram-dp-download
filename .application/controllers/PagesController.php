<?php

class PagesController extends CI_Controller
{
	public function sitemap()
	{
		echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
';

		echo '<url>
  <loc>https://' . $_SERVER['HTTP_HOST'] . '/</loc>
  <lastmod>2021-07-28T15:14:11+00:00</lastmod>
  <priority>1.00</priority>
</url>
';

		echo '</urlset>';
	}


	public function userFeeds($targetUsername)
	{
		$viewData                   = array();
		$viewData['targetUsername'] = $targetUsername;

		$this->load->view('InstagramController/userFeeds', $viewData);
	}


	public function feedDetails($shortCode)
	{
		$viewData              = array();
		$viewData['shortCode'] = $shortCode;

		$this->load->view('InstagramController/feedDetails', $viewData);
	}
}
