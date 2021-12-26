<?php

class InstagramController extends CI_Controller
{
	public function index()
	{
		$this->load->view('InstagramController/index');
	}


	public function userFeeds($targetUsername)
	{
		$viewData                   = array();
		$viewData['targetUsername'] = $targetUsername;
		$viewData['userFeeds']      = InstagramService::userFeeds($targetUsername);
		pe($viewData);

		$this->load->view('InstagramController/userFeeds', $viewData);
	}


	public function feedDetails($shortCode)
	{
		$viewData              = array();
		$viewData['shortCode'] = $shortCode;

		$this->load->view('InstagramController/feedDetails', $viewData);
	}
}
