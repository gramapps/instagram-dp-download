<ul class="tool-tabs">
	<li class="tool profile-pictures <?= $cmd == 'profilePictureDownloader' ? 'selected' : '' ?>">
		<a class="link" title="Download Instagram Profile Pictures" href="instagram/tools/profilePictureDownloader">
			<i class="icon"></i>
			<div class="name">
				Profile
			</div>
		</a>
	</li>
	<li class="tool instagram-videos <?= $cmd == 'videoDownloader' ? 'selected' : '' ?>">
		<a class="link" title="Download Instagram Videos" href="instagram/tools/videoDownloader">
			<i class="icon"></i>
			<div class="name">
				Videos
			</div>
		</a>
	</li>
	<li class="tool instagram-photos <?= $cmd == 'photoDownloader' ? 'selected' : '' ?>">
		<a class="link" title="Download Instagram Photos" href="instagram/tools/photoDownloader">
			<i class="icon"></i>
			<div class="name">
				Medias
			</div>
		</a>
	</li>
	<li class="tool instagram-reels <?= $cmd == 'reelsDownloader' ? 'selected' : '' ?>">
		<a class="link" title="Download Instagram Reels" href="instagram/tools/reelsDownloader">
			<i class="icon"></i>
			<div class="name">
				Reels
			</div>
		</a>
	</li>
	<li class="tool instagram-stories <?= $cmd == 'storyDownloader' ? 'selected' : '' ?>">
		<a class="link" title="Download Instagram Stories" href="instagram/tools/storyDownloader">
			<i class="icon"></i>
			<div class="name">
				Stories
			</div>
		</a>
	</li>
</ul>


<? $this->load->view('InstagramToolsController/searchForm', ['cmd' => $cmd]) ?>
