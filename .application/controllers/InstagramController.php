<?php

class InstagramController extends CI_Controller
{
	public function index()
	{
		$this->load->view('InstagramController/index');
	}


	public function download()
	{
		$b64url = $this->input->get('b64url', true);

		$fileExtension = '.png';

		$fileName = $this->input->get('fileName', true);
		$fileName = url_title(instagramUsername($fileName, 128), '_');
		$fileName = url_title($_SERVER['CI_APP_SHORT_NAME'], '_')
			. "_"
			. ((strlen($fileName) > 0) ? $fileName . '_' : '')
			. date('Y_m_d_H_i_s');

		$cacheKey = 'download_' . md5($b64url);
		$url      = base64_decode($b64url);

		$rawData = $this->cache->get($cacheKey);

		if (strlen($rawData) < 5) {
			$url     = base64_decode($b64url);
			$rawData = file_get_contents($url);

			$this->cache->save($cacheKey, base64_encode($rawData), 60 * 60 * 10);
		} else {
			$rawData = base64_decode($rawData);
		}

		// detect mime type and set extension
		$file_info = new finfo(FILEINFO_MIME_TYPE);
		$mimeType  = $file_info->buffer($rawData);
		log_message('error', 'Mime type: ' . $mimeType);
		if (sw($mimeType, 'video'))
			$fileExtension = '.mp4';

		$fileName = $fileName . $fileExtension;

		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=" . $fileName);
		header("Content-length: " . mb_strlen($rawData, '8bit'));
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $rawData;
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
		$viewData                       = array();
		$viewData['targetUsername']     = $targetUsername;
		$viewData['userInfo']           = InstagramService::userInfo($targetUsername);
		$viewData['userFeeds']          = InstagramService::userFeeds($targetUsername);
		$viewData['selectedHeaderMenu'] = 'profile';
		//pe($viewData);

		$this->load->view('InstagramController/userFeeds', ma($viewData));
	}


	public function userDp($targetUsername)
	{
		$viewData                       = array();
		$viewData['targetUsername']     = $targetUsername;
		$viewData['userInfo']           = InstagramService::userInfo($targetUsername);
		$viewData['selectedHeaderMenu'] = 'dp';
		//pe($viewData);

		$this->load->view('InstagramController/userDp', ma($viewData));
	}


	public function userHighlights($targetUsername)
	{
		$viewData                       = array();
		$viewData['targetUsername']     = $targetUsername;
		$viewData['userInfo']           = InstagramService::userInfo($targetUsername);
		$viewData['userHighlights']     = InstagramService::userHighlights($targetUsername);
		$viewData['selectedHeaderMenu'] = 'highlights';
		//pe($viewData);

		$this->load->view('InstagramController/userHighlights', ma($viewData));
	}


	public function userReels($targetUsername)
	{
		$viewData                   = array();
		$viewData['targetUsername'] = $targetUsername;
		$viewData['userInfo']       = InstagramService::userInfo($targetUsername);
		$userFeeds                  = ma(InstagramService::userFeeds($targetUsername));

		$reels = [];
		foreach ($userFeeds as $feed) {
			if ((count($feed['carousel_data']) == 1) && (isset($feed['carousel_data'][0]['sd_video_url'])))
				$reels[] = $feed;
		}

		$viewData['userFeeds'] = $reels;

		$viewData['selectedHeaderMenu'] = 'reels';
		//pe($viewData);

		$this->load->view('InstagramController/userFeeds', ma($viewData));
	}

	public function userIgtv($targetUsername)
	{
		$viewData                       = array();
		$viewData['targetUsername']     = $targetUsername;
		$viewData['userInfo']           = InstagramService::userInfo($targetUsername);
		$viewData['userFeeds']          = InstagramService::userIgtv($targetUsername);
		$viewData['selectedHeaderMenu'] = 'igtv';
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


	public function downloadMedia($shortCode)
	{
		$viewData = array();

		if (sw($shortCode, 'highlight:')) {
			$viewData['mediaInfo']          = ma(InstagramService::highlightInfo($shortCode));
			$viewData['userInfo']           = InstagramService::userInfo($viewData['mediaInfo']['user']['username']);
			$viewData['selectedHeaderMenu'] = 'highlights';
		} else {
			$viewData['mediaInfo']          = ma(InstagramService::mediaInfo($shortCode));
			$viewData['userInfo']           = InstagramService::userInfo($viewData['mediaInfo']['user']['username']);
			$viewData['selectedHeaderMenu'] = 'profile';
		}
		//pe($viewData);

		$this->load->view('InstagramController/downloadMedia', ma($viewData));
	}
}
