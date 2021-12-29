<? $this->load->view('layout/header') ?>

<div class="page">
	<div class="centered">

		<? $this->load->view('InstagramController/userInfoHeader', ['userInfo' => $userInfo, 'selected' => $selectedHeaderMenu]) ?>

		<div class="insta-posts <?= in_array($selectedHeaderMenu, ['igtv', 'reels']) ? 'igtv-posts' : '' ?>"
				 style="margin: 10px 0px 0px 0px;">
			<div class="list">
				<? foreach ($userHighlights as $item): ?>
					<div class="insta-post">
						<a class="link" href="instagram/download/<?= $item['id'] ?>">
							<div class="thumbnail">
								<img class="img"
										 src="instagram/fetchImage?b64url=<?= base64_encode($item['sd_image_url']) ?>">
							</div>
							<div class="title">
								<center>
									<?= htmlspecialchars(cleanStr($item['title'])) ?>
									<br />
									🎦 <?= $item['media_count'] ?>
								</center>
							</div>
						</a>
					</div>
				<? endforeach ?>

			</div>
		</div>


		<div class="content">

			<h2 class="heading">Instagram Profile Viewer</h2>
			<p>Social media has changed the way people go about their daily lives and increased the dependency users have on these
				platforms, with Instagram as one of the most popular social media apps. With all its cool features and tools, Instagram
				has some restrictions that can frustrate its users. Our website aims to help users in some of their complaints. Our tools
				may even help fix issues users didn’t even realize they had—like identifying a follower solely based on their tiny profile
				picture. Our website solves this issue by providing tools to view and download profile pictures and other content. Users
				can view any content on public profiles, view their stories, download reels, and download full-sized profile pictures.</p>
			<p>If you're looking for a safe and reliable way to view and download content from Instagram profiles, then <?= $_SERVER['CI_APP_SHORT_NAME'] ?> is the
				tool for you.</p>

			<h2 class="heading">How to use <?= $_SERVER['CI_APP_SHORT_NAME'] ?> Profile Viewer</h2>
			<p>We made the process as simple as possible. To search for any Instagram account, enter the username or paste the link from
				a post into the search bar at the top of our webpage. The account loads instantly, and from there, you can anonymously
				browse their profile and view stories, highlights and reels.</p>

			<h2 class="heading">Why Use <?= $_SERVER['CI_APP_SHORT_NAME'] ?>?</h2>
			<p>Instagram is a social media platform that allows users to take pictures and post them online for others to see. The app
				is primarily used for sharing photos, although it has recently added features to include videos and reels. Posting and
				sharing videos and reels on Instagram continues to rise in popularity among its users.</p>
			<p>Instagram users, and even non-users, can view the creative content account owners post on Instagram. You can find high
				quality, professional pictures and creative videos on Instagram, as well as blurry pictures of someone’s daily life; the
				options are endless and left up to the user.</p>
			<p>With the endless amount of creative and entertaining content, some users want to share it outside of Instagram or save
				their favorite content for offline viewing. <?= $_SERVER['CI_APP_SHORT_NAME'] ?> will allow you to save any public content straight to your device.
				Whether you’re saving videos to your desktop, iOS or Android device, we have the right tools for you.</p>

			<h2 class="heading">Can I see private accounts?</h2>
			<p>We respect the privacy of users who wish to keep their content private. Aside from their profile picture, which is
				available for view to the public, all other content on a private account cannot be downloaded or viewed using our website.
				Fortunately, there are plenty of public accounts you can browse and download.</p>

			<h2 class="heading">Will users be notified if I search their profile?</h2>
			<p>When using our website to browse accounts and other Instagram content, you can search in peace knowing that our site
				doesn’t save any of your personal data. We are one of the most reliable websites that allow you to save content from your
				favorite creators for free and to browse any content anonymously, including stories. Instagram users will not be notified
				or informed in any way if you choose to search or download a story, reel, picture or video. We designed this site for you
				to browse and download as efficiently as possible.</p>

		</div>

		<? $this->load->view('BlogController/recommendedBlogs') ?>

	</div>
</div>

<? $this->load->view('layout/footer') ?>
