<?php

class InstagramService
{
	public static function makeApiCall($method, $cmd, $data = array())
	{
		$ch = curl_init();

		$data           = ma($data);
		$data['apikey'] = @$_SERVER['IGDATA_APIKEY'];

		$baseUrl = ENVIRONMENT == 'development' ? 'https://igdata-backend.host' : 'https://api.igdata.net/v1';

		$lastUrl = $baseUrl . $cmd;

		if ($method == 'get') {
			$lastUrl .= '?' . http_build_query($data);
		}

		curl_setopt($ch, CURLOPT_URL, $lastUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POST, intval($method == "post"));

		if ($method == "post")
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		$result = curl_exec($ch);

		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header      = substr($result, 0, $header_size);
		$body        = substr($result, $header_size);

		curl_close($ch);

		return array(
			"header" => $header,
			"body"   => $body
		);
	}


	public static function randomUsers()
	{
		$result = s2o(self::makeApiCall('get', '/instagram/general/randomUsers')['body']);

		return $result->data;
	}


	public static function userFeeds($targetUsername)
	{
		$result = s2o(self::makeApiCall('get', '/instagram/user/feed', array('targetUsername' => $targetUsername))['body']);

		return $result->data;
	}

	public static function userIgtv($targetUsername)
	{
		$result = s2o(self::makeApiCall('get', '/instagram/user/igtv', array('targetUsername' => $targetUsername))['body']);

		return $result->data;
	}


	public static function userInfo($targetUsername)
	{
		$result = s2o(self::makeApiCall('get', '/instagram/user/info', array('targetUsername' => $targetUsername))['body']);

		return $result->data;
	}


	public static function mediaInfo($mediaCode)
	{
		$result = s2o(self::makeApiCall('get', '/instagram/media/info', array('mediaCode' => $mediaCode))['body']);

		return $result->data;
	}


	public static function userHighlights($targetUsername)
	{
		$result = s2o(self::makeApiCall('get', '/instagram/user/highlights', array('targetUsername' => $targetUsername))['body']);

		return $result->data;
	}


	public static function highlightInfo($highlightId)
	{
		$result = s2o(self::makeApiCall('get', '/instagram/highlight/videos', array('highlightId' => $highlightId))['body']);

		return $result->data;
	}


	public static function mediaComments($mediaCode)
	{
		$result = s2o(self::makeApiCall('get', '/instagram/media/comments', array('mediaCode' => $mediaCode))['body']);

		return $result->data;
	}
}

