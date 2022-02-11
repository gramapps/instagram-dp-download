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
		$q     = @$input['q'];
		$cmd   = @$input['cmd'];

		$oldStrings = ['Ğ', 'Ü', 'Ş', 'İ', 'Ö', 'Ç', 'I', 'ğ', 'ü', 'ş', 'i', 'ö', 'ç', 'ı'];
		$newStrings = ['G', 'U', 'S', 'I', 'O', 'C', 'I', 'g', 'u', 's', 'i', 'o', 'c', 'i'];
		$q          = str_replace($oldStrings, $newStrings, $q);

		if (!recaptchaValidate($input['g-recaptcha-response']))
			redir($_SERVER['HTTP_REFERER']);

		if ($cmd === 'profilePictureDownloader') {
			$targetUsername = null;
			if (sw($q, 'https://') && (filter_var($q, FILTER_VALIDATE_URL))) {
				$parseUrl   = parse_url($q);
				$parsedPath = explode('/', $parseUrl['path']);
				if (strlen(@$parsedPath[1]) == 0)
					redir(base_url('instagram/tools/' . $cmd));

				$targetUsername = instagramUsername($parsedPath[1]);
			} else {
				$targetUsername = instagramUsername($q);
			}

			redir(base_url('instagram/u/' . $targetUsername));
		} elseif (in_array($cmd, ['reelsDownloader', 'videoDownloader', 'photoDownloader', 'storyDownloader'])) {

			$targetId = null;

			$parseUrl   = parse_url($q);
			$parsedPath = array_reverse(explode('/', $parseUrl['path']));
			$parsedPath = array_values(array_filter($parsedPath, function ($val, $key) {
				return strlen(trim($val)) > 0;
			}, ARRAY_FILTER_USE_BOTH));

			$targetId  = trim(array_shift($parsedPath));
			$mediaType = 'media';
			if ((@$parsedPath[0] == 'stories') || (@$parsedPath[1] == 'stories'))
				$mediaType = 'story';
			elseif ((@$parsedPath[0] == 'reel') || (@$parsedPath[1] == 'reel'))
				$mediaType = 'reel';
			elseif ((@$parsedPath[0] == 'tv') || (@$parsedPath[1] == 'tv'))
				$mediaType = 'tv';
			elseif ((@$parsedPath[0] == 'highlights') || (@$parsedPath[1] == 'highlights'))
				$mediaType = 'highlight';
			elseif (count($parsedPath) == 0)
				$mediaType = 'user';
			else
				$mediaType = 'user';

			//pe(['mediaType' => $mediaType, 'targetId' => $targetId, 'parsedPath' => $parsedPath]);

			if ($mediaType == 'user')
				redir(base_url('instagram/u/' . $targetId));
			else
				redir(base_url('instagram/download/' . $mediaType . '/' . $targetId));

			if (strlen($targetId) == 0)
				redir(base_url('instagram/tools/' . $cmd));
		}

		//pe($input);
		redir(
			strlen(@$_SERVER['HTTP_REFERER']) > 0
				? $_SERVER['HTTP_REFERER']
				: base_url('instagram/tools/profilePictureDownloader')
		);
	}
}
