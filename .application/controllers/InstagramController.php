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

		$rawData = $this->cache->get($cacheKey);

		if (strlen($rawData) < 5) {
			$url     = base64_decode($b64url);
			$rawData = file_get_contents($url);

			$this->cache->save($cacheKey, base64_encode($rawData), 60 * 60 * 10);
		} else {
			$rawData = base64_decode($rawData);
		}

		header('content-type: image/png');
		echo $rawData;
	}


	public function fetchVideo()
	{
		if ((int)$this->input->get('html') == 1) {
			echo '<style>html, body { margin: 0px; padding: 0px; }</style><video style="width: 100%; height: 100%;" controls>
  <source src="instagram/fetchVideo?b64url=' . $this->input->get('b64url', true) . '" type="video/mp4">
</video>';
			return;
		}

		$b64url = $this->input->get('b64url', true);

		$cacheKey = 'fetchVideo_' . md5($b64url);
		$url      = base64_decode($b64url);

		$rawData = $this->cache->get($cacheKey);

		if (strlen($rawData) < 5) {
			$url     = base64_decode($b64url);
			$rawData = file_get_contents($url);

			$this->cache->save($cacheKey, base64_encode($rawData), 60 * 60 * 10);
		} else {
			$rawData = base64_decode($rawData);
		}

		header('content-type: video/mp4');
		echo $rawData;
	}


	public function userFeeds($targetUsername)
	{
		$viewData                   = array();
		$viewData['targetUsername'] = $targetUsername;
		$viewData['userInfo']       = InstagramService::userInfo($targetUsername);
		$viewData['userFeeds']      = InstagramService::userFeeds($targetUsername);
		//pe($viewData);

		$this->load->view('InstagramController/userFeeds', ma($viewData));
	}


	public function feedDetails($shortCode)
	{
		$viewData                  = array();
		$viewData['mediaInfo']     = ma(InstagramService::mediaInfo($shortCode));
		$viewData['mediaComments'] = ma(InstagramService::mediaComments($shortCode))['comments'];
		$viewData['userInfo']      = InstagramService::userInfo($viewData['mediaInfo']['user']['username']);
		//pe($viewData);

		$this->load->view('InstagramController/feedDetails', ma($viewData));
	}
}
