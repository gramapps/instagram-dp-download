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

		$oldStrings = ['Ğ', 'Ü', 'Ş', 'İ', 'Ö', 'Ç', 'I', 'ğ', 'ü', 'ş', 'i', 'ö', 'ç', 'ı'];
		$newStrings = ['G', 'U', 'S', 'I', 'O', 'C', 'I', 'g', 'u', 's', 'i', 'o', 'c', 'i'];
		$q          = str_replace($oldStrings, $newStrings, $q);

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

			redir(base_url('instagram/u/' . $target));
		} elseif (in_array($cmd, ['reelsDownloader', 'videoDownloader', 'photoDownloader', 'storyDownloader'])) {

			$target = null;

			$parseUrl   = parse_url($q);
			$parsedPath = array_reverse(explode('/', $parseUrl['path']));
			$parsedPath = array_values(array_filter($parsedPath, function ($val, $key) {
				return strlen(trim($val)) > 0;
			}, ARRAY_FILTER_USE_BOTH));

			if (strlen(@$parsedPath[0]) == 0)
				redir(base_url('instagram/tools/' . $cmd));

			$target = $parsedPath[0];

			if (is_numeric($target))
				redir(base_url('instagram/download/highlight:' . $target));
			else
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
