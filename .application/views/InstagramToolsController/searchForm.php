<?
if ($cmd == "profilePictureDownloader")
	$placeholder = 'Username';
elseif ($cmd == 'storyDownloader')
	$placeholder = 'Paste story link';
elseif ($cmd == 'reelsDownloader')
	$placeholder = 'Paste reels link';
elseif ($cmd == 'videoDownloader')
	$placeholder = 'Paste video link';
elseif ($cmd == 'photoDownloader')
	$placeholder = 'Paste media or photo link';
?>

<script>
	function onSearchFormSubmit(token) {
		$('#searchForm')[0].submit()
	}

</script>

<form id="searchForm" method="post" action="instagram/tools/parseSearch">

	<div class="tool-section profile-pictures has-history">
		<div class="search-bar">
			<div class="tool-icon"></div>
			<input class="search-input" type="text" name="q" placeholder="<?= $placeholder ?>">
			<input type="hidden" name="cmd" value="<?= $cmd ?>" />

			<input class="search-btn g-recaptcha" type="submit"
						 data-sitekey="<?= $_SERVER['CI_RECAPTCHA_SITE_KEY'] ?>" data-callback="onSearchFormSubmit"
						 value="">
		</div>
	</div>
</form>

