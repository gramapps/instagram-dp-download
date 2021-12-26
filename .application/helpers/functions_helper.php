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

