<?php

class MainController extends CI_Controller
{
	public function index()
	{
		$viewData = array();

		$topInstagrammers = InstagramService::randomUsers();
		if (is_null($topInstagrammers))
			$topInstagrammers = InstagramService::randomUsers();

		$viewData['topInstagrammers'] = &$topInstagrammers;

		if (is_null($topInstagrammers))
			log_message('error', o2s($viewData, true));

		$this->load->view('MainController/index', ma($viewData));
	}
}
