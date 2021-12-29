<!-- Sidebar -->
<div class="sidebar">

	<a href="#" class="logo"><?= $_SERVER['CI_APP_SHORT_NAME'] ?></a>

	<span class="title">Menu</span>
	<ul class="menu-list">
		<li class="item"><a class="link" href="./"><i class="icon home"></i>Home</a>
		<li class="item"><a class="link" href="blogs"><i class="icon tips"></i>Blog</a>
		<li class="item"><a class="link" href="page/contact"><i class="icon contact"></i>Contact</a>
	</ul>

	<span class="title">Tools</span>
	<ul class="tools-list">
		<li class="item"><a class="link" href="instagram"><i class="icon instagram"></i>Instagram Tools</a>
	</ul>

	<div class="darkmode-options">
		<div class="text">Dark Mode</div>
		<div class="button">
			<label class="switch">
				<input class="checkbox" type="checkbox" <?= darkmode() == 'darkmode' ? 'checked' : '' ?>>
				<span class="slider round"></span>
			</label>
		</div>
	</div>

</div>

<div class="prevent-click"></div>

<script type="text/javascript">
	$(document).ready(function () {
		$('.menu-btn').click(function () {
			$('body').addClass('sb-toggled')
			$('.prevent-click').fadeIn()
		})
		$('body .prevent-click').click(function () {
			$('body').removeClass('sb-toggled')
			$('.prevent-click').fadeOut()
		})
		$('.search-history .toggle-bar').click(function () {
			$('.search-history').toggleClass('toggled')
		})
		$('.darkmode-options .button .switch input').change(function () {
			if (this.checked) {
				_addCookie('1', 'dark_mode')
				$('body').addClass('darkmode')
			} else {
				_addCookie('0', 'dark_mode')
				$('body').removeClass('darkmode')
			}
		})
	})
</script>


<!-- Footer -->
<footer class="footer">
	<div class="centered">
		<div class="section-1">
			<a class="logo" href="./"><?= $_SERVER['CI_APP_SHORT_NAME'] ?></a>
			<div class="links"><a href="pages/contact">Contact</a> | <a href="pages/privacy-policy">Privacy Policy</a> | <a
					href="sitemap.xml">Sitemap</a></div>
		</div>
		<div class="section-2">
			<div class="links">
				<a href="./">Instagram Downloader</a> |
				<a href="instagram/tools/profilePictureDownloader">Instagram Profile Picture</a> |
				<a href="instagram/tools/profilePictureDownloader"><?= $_SERVER['CI_APP_SHORT_NAME'] ?></a> |
				<a href="instagram/tools/profilePictureDownloader">Profile picture viewer</a> |
				<a href="instagram/tools/storyDownloader">Download Instagram stories</a> |
				<a href="instagram/tools/storyDownloader">Instagram story downloader</a> |
				<a href="instagram/tools/storyDownloader">Instagram story viewer</a> |
				<a href="instagram/tools/reelsDownloader">Instagram reel viewer</a> |
				<a href="instagram/tools/reelsDownloader">Download Instagram reels</a>
			</div>
			<div class="disclaimer">
				<?= $_SERVER['CI_APP_NAME'] ?> is not affiliated with Instagram&trade;<br>We do not host any Instagram content.
			</div>
		</div>
	</div>
</footer>

<!-- Scripts -->

</body>

</html>
