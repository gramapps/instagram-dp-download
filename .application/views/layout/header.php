<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">

	<base href="https://<?= $_SERVER['HTTP_HOST'] ?>" />

	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title>View profile picture at full size - Instagram profile picture downloader - Instagram video downloader - Instagram image
		downloader</title>
	<meta name="description"
				content="View anyone's instagram profile picture free in full size. Instagram profile picture viewer lets you zoom in on any profile picture in original size.">
	<base>

	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta property="og:image" content="assets/images/facebook-share.png">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="assets/images/favicon.ico">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="theme-color" content="#FFFFFF">
	<meta name="msapplication-navbutton-color" content="#FFFFFF">
	<meta name="apple-mobile-web-app-status-bar-style" content="#FFFFFF">
	<link rel="stylesheet" href="assets/css/styles.css?<?= rq() ?>">
	<script src="assets/js/jquery.js?<?= rq() ?>"></script>
	<script src="assets/js/functions.js?<?= rq() ?>"></script>
	<script src="assets/js/cookie.js?<?= rq() ?>"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>

</head>


<body class="darkmode">


<!-- Header -->

<!-- AD -->


<div class="nav-skeleton"></div>

<header class="nav">
	<div class="centered">
		<a class="logo-btn" href="./"><?= $_SERVER['CI_APP_SHORT_NAME'] ?></a>
		<div class="menu-btn"></div>
	</div>
</header>

<script type="text/javascript">
	$(document).ready(function () {
		function sticktothetop() {
			var window_top = $(window).scrollTop()
			var top = $('.nav-skeleton').offset().top
			if (window_top > top) {
				$('body').addClass('scrolled')
				$('.nav-skeleton').height(44)
			} else {
				$('body').removeClass('scrolled')
				$('.nav-skeleton').height(1)
			}
		}

		$(function () {
			$(window).scroll(sticktothetop)
			sticktothetop()
		})
	})
</script>
