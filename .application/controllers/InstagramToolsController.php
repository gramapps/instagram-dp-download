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

			redir(base_url('instagram/u/' . $target));
		} elseif (in_array($cmd, ['reelsDownloader', 'videoDownloader', 'photoDownloader', 'storyDownloader'])) {

			$target = null;

			// parse highlight video
			// example url:
			// https://www.instagram.com/s/aGlnaGxpZ2h0OjE3OTA4OTI0OTc2Mjc1NTM0?story_media_id=2711715311770809094_233146678&utm_medium=copy_link
			if (sw($q, 'https://www.instagram.com/s/')) {
				$parseUrl   = parse_url($q);
				$parsedPath = explode('/', $parseUrl['path']);
				if (strlen(@$parsedPath[2]) == 0)
					redir(base_url('instagram/tools/' . $cmd));

				// you must specify fully correct url. Otherwise instagram is redirecting correct url and this is broking algorithm.
				$highlightUrl     = 'https://www.instagram.com/s/' . $parsedPath[2] . '/';
				$detectedRedirUrl = detectRedirectUrl($highlightUrl);
				$parseUrl         = parse_url($detectedRedirUrl);
				$parsedPath       = explode('/', $parseUrl['path']);

				if (is_numeric(@$parsedPath[3]))
					redir(base_url('instagram/download/highlight:' . $parsedPath[3]));

				redir(base_url('instagram/tools/' . $cmd));
			} elseif (sw($q, 'https://www.instagram.com/stories/')) {
				$parseUrl   = parse_url($q);
				$parsedPath = explode('/', $parseUrl['path']);

				if (is_numeric(@$parsedPath[3]))
					redir(base_url('instagram/download/highlight:' . $parsedPath[3]));

				redir(base_url('instagram/tools/' . $cmd));

			} elseif (sw($q, 'https://') && (filter_var($q, FILTER_VALIDATE_URL))) {
				$parseUrl   = parse_url($q);
				$parsedPath = explode('/', $parseUrl['path']);
				if (strlen(@$parsedPath[2]) == 0)
					redir(base_url('instagram/tools/' . $cmd));

				$parsedTarget = ($parsedPath[2] == 'reel') ? $parsedPath[3] : $parsedPath[2];
				$target       = instagramMediaCode($parsedTarget);

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
