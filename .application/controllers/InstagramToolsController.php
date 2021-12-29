<?php

class InstagramToolsController extends CI_Controller
{
	public function downloader($cmd)
	{
		if (!in_array($cmd, ['profilePictureDownloader', 'videoDownloader', 'photoDownloader', 'reelsDownloader', 'storyDownloader']))
			redir('/');

		$viewData        = array();
		$viewData['cmd'] = $cmd;
		//pe($viewData);

		$this->load->view('InstagramToolsController/downloader', ma($viewData));
	}

	public function parseSearch()
	{
		$input = ma($this->input->post(null, true));
		$q     = $input['q'];
		$cmd   = $input['cmd'];

		if (!recaptchaValidate($input['g-recaptcha-response']))
			redir($_SERVER['HTTP_REFERER']);

		if ($cmd === 'profilePictureDownloader') {
			$target = null;
			if (sw($q, 'https://') && (filter_var($q, FILTER_VALIDATE_URL))) {
				$parseUrl   = parse_url($q);
				$parsedPath = explode('/', $parseUrl['path']);
				if (strlen(@$parsedPath[1]) == 0)
					redir(base_url('instagram/tools/' . $cmd));

				$target = instagramUsername($parsedPath[1]);
			} else {
				$target = instagramUsername($q);
			}

			redir(base_url('instagram/u/' . $target . '/dp'));
		} elseif (in_array($cmd, ['reelsDownloader', 'videoDownloader', 'photoDownloader', 'storyDownloader'])) {

			$target = null;
			if (sw($q, 'https://') && (filter_var($q, FILTER_VALIDATE_URL))) {
				$parseUrl   = parse_url($q);
				$parsedPath = explode('/', $parseUrl['path']);
				if (strlen(@$parsedPath[2]) == 0)
					redir(base_url('instagram/tools/' . $cmd));

				$target = instagramMediaCode($parsedPath[2]);
			} else {
				$target = instagramMediaCode($q);
			}

			redir(base_url('instagram/download/' . $target));
		}

		//pe($input);
		redir(
			strlen(@$_SERVER['HTTP_REFERER']) > 0
				? $_SERVER['HTTP_REFERER']
				: base_url('instagram/tools/profilePictureDownloader')
		);
	}
}
