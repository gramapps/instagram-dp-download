<?php

class InstagramController extends CI_Controller
{
	public function index()
	{
		$this->load->view('InstagramController/index');
	}


	public function fetchImage()
	{
		$b64url = $this->input->get('b64url', true);

		$cacheKey = 'fetchImage_' . md5($b64url);
		$url      = base64_decode($b64url);

		$rawImage = $this->cache->get($cacheKey);

		if (strlen($rawImage) < 5) {
			$url      = base64_decode($b64url);
			$rawImage = file_get_contents($url);

			$this->cache->save($cacheKey, base64_encode($rawImage), 60);
		} else {
			$rawImage = base64_decode($rawImage);
		}

		header('content-type: image/png');
		echo $rawImage;
	}


	public function userFeeds($targetUsername)
	{
		$viewData                   = array();
		$viewData['targetUsername'] = $targetUsername;
		$viewData['userInfo']       = InstagramService::userInfo($targetUsername);
		$viewData['userFeeds']      = InstagramService::userFeeds($targetUsername);

		$this->load->view('InstagramController/userFeeds', ma($viewData));
	}


	public function feedDetails($shortCode)
	{
		$viewData              = array();
		$viewData['shortCode'] = $shortCode;

		$this->load->view('InstagramController/feedDetails', ma($viewData));
	}
}
