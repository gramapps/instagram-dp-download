<?php

if (!function_exists('mysqlNow')) {
	/**
	 * @return string
	 */
	function mysqlNow()
	{
		return date("Y-m-d H:i:s");
	}
}


if (!function_exists('println')) {
	/**
	 * @param $data
	 * Print data with EOL.
	 */
	function println($data)
	{
		echo $data . PHP_EOL;
	}
}


if (!function_exists('rq')) {

	/********************
	 * rq: random query
	 *
	 * @return float|object
	 */
	function rq()
	{
		if (ENVIRONMENT == 'development')
			return microtime(true);
		return date('i');
	}
}


if (!function_exists('cleanStr')) {

	function cleanStr($str)
	{
		return trim(str_replace(["\n", "\r", "'", '"'], " ", trim($str)));
	}
}


if (!function_exists('pe')) {
	/**
	 * @param $data
	 * print and exit
	 */
	function pe($data)
	{
		echo "<pre>";
		print_r($data);
		exit;
	}
}


if (!function_exists('mo')) {
	/**
	 * @param $data
	 * @return mixed
	 *
	 * Make object.
	 */
	function mo($data)
	{
		return json_decode(json_encode($data));
	}
}


if (!function_exists('ma')) {
	/**
	 * @param mixed $data
	 * @param int $depth
	 * @return mixed
	 *
	 * Make array.
	 */
	function ma($data, $depth = 512)
	{
		return json_decode(json_encode($data), true, $depth);
	}
}


if (!function_exists('s2o')) {

	/**
	 * @param string $str
	 * @param boolean $assoc
	 * @return mixed
	 *
	 * String to object (json)
	 */
	function s2o($str, $assoc = false)
	{
		return json_decode($str, $assoc);
	}
}


if (!function_exists('o2s')) {

	/**
	 * @param mixed $obj
	 * @return string
	 *
	 * Object to string
	 */
	function o2s($obj, $pretty = false)
	{
		if ($pretty)
			return json_encode($obj, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

		return json_encode($obj);
	}
}


if (!function_exists('instagramUsername')) {

	function instagramUsername($str)
	{
		return substr(preg_replace("/[^a-zA-Z0-9._]+/", "", $str), 0, 30);
	}
}


if (!function_exists('instagramMediaCode')) {

	function instagramMediaCode($str)
	{
		return substr(preg_replace("/[^a-zA-Z0-9._-]+/", "", $str), 0, 11);
	}
}


if (!function_exists('redir')) {

	function redir($url)
	{
		header('Location: ' . $url);
		exit;
	}
}

if (!function_exists('recaptchaValidate')) {

	function recaptchaValidate($recaptchaResponse)
	{
		$response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret="
			. $_SERVER['CI_RECAPTCHA_PRIV_KEY']
			. "&response=" . $recaptchaResponse
			. "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);

		if ($response['success'] == false)
			return false;

		return true;
	}
}


if (!function_exists('sw')) {

	/********************
	 * sw: starts with
	 *
	 * @param $string string
	 * @param $startString string
	 * @return bool
	 */
	function sw($string, $startString)
	{
		$len = strlen($startString);
		return (substr($string, 0, $len) === $startString);
	}
}

if (!function_exists('ew')) {

	/********************
	 * ew: ends with
	 *
	 * @param $string string
	 * @param $endString string
	 * @return bool
	 */
	function ew($string, $endString)
	{
		$len = strlen($endString);
		if ($len == 0) {
			return true;
		}
		return (substr($string, -$len) === $endString);
	}
}
