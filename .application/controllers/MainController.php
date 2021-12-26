<?php

class MainController extends CI_Controller
{
	public function index()
	{
		$viewData                     = array();
		$viewData['topInstagrammers'] = InstagramService::randomUsers();

		$this->load->view('MainController/index', ma($viewData));
	}
}
