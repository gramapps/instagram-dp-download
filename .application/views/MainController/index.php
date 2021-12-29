<? $this->load->view('layout/header') ?>


<!-- Content -->
<div class="page">
	<div class="centered">

		<div class="header">
			<h1 class="heading">Download Instagram HD Profile Pictures, HD Videos and HD Images</h1>
			<p class="desc">Search and download Instagram profile pictures, stories, videos, reels and more</p>
		</div>

		<!-- AD -->

		<? $this->load->view('MainController/toolsHeader') ?>

		<!-- AD -->


		<!-- Top Instagram Profiles -->

		<div class="influencers">
			<h2 class="heading">Top Instagrammers</h2>
			<div class="list">
				<? foreach ($topInstagrammers as $instagrammer): ?>
					<div class="user">
						<a class="link" href="instagram/u/<?= @$instagrammer['username'] ?>">
							<img src="instagram/fetchImage?b64url=<?= base64_encode($instagrammer['sd_profile_picture_url']) ?>"
									 style="width: 14px; height: 14px; border-radius: 50%; margin: 0px 5px 0px 5px;" />
							<div style="display: inline-block; font-size: 14px; font-weight: bold;">
								<?= @$instagrammer['username'] ?>
							</div>
						</a>
					</div>
				<? endforeach ?>
			</div>
		</div>


		<div class="content">
			<h2 class="heading">Download Instagram Profile Pictures</h2>
			<p>Have you ever wanted to view someone’s profile picture in full size on Instagram but couldn’t figure out how to do it?
				<?= $_SERVER['CI_APP_SHORT_NAME'] ?> solves this issue! <?= $_SERVER['CI_APP_SHORT_NAME'] ?> is a free service allowing
				anyone to search for an account and view the user’s profile
				picture in high quality.</p>
			<p>With all the features Instagram offers, the site is restricted on this crucial detail—the minuscule profile picture.
				Having the option to set your profile as private and choose any name as your username limits the information others
				receive about your account. Without the option of enlarging the profile picture to get a clear view of the face displayed,
				people who are picky about their followers can become frustrated. Instead of wasting time asking your friends or family to
				help identify an unknown user, try <?= $_SERVER['CI_APP_SHORT_NAME'] ?> to make your life easier.</p>
			<p>Whether you prefer to use our app or website, <?= $_SERVER['CI_APP_SHORT_NAME'] ?>, you will still be getting a great
				user experience. We designed
				our website to be mobile friendly and look great on any device, so you can search usernames on your iPhone or Android and
				receive the same full-size, HD Instagram profile picture.</p>
			<p>With over 1 billion active users on Instagram, our advanced search bar allows you to find any account, even if you are
				unsure of the exact username. Give it a try and see how easy it is to use!</p>

			<h2 class="heading">Why Use <?= $_SERVER['CI_APP_SHORT_NAME'] ?>?</h2>
			<p>There is more than one reason why someone would want to use <?= $_SERVER['CI_APP_SHORT_NAME'] ?> to download a profile
				picture. Out of the numerous
				accounts registered with Instagram, finding your friend’s account could prove more difficult than expected, especially if
				the profile is set to private. A private account will only provide basic information (if the user chooses to disclose it),
				a username that might be similar to other accounts, and the profile picture. If the profile picture contains any hint of
				the user’s identity, even if it’s a tiny profile view of their face, then the picture would be the best way to identify
				the owner of a private account. You can squint at the picture for hours trying to discern any unique details, or in mere
				seconds, you can search their username in <?= $_SERVER['CI_APP_SHORT_NAME'] ?> to download their photo and instantly
				receive the full-size profile
				picture. If it’s a great photo, you can also save it onto your phone.</p>
			<p>If users receive a follow from an unidentifiable private account, they will be hesitant in following the account or may
				even choose to remove the follower if they knew the identity, which is another way <?= $_SERVER['CI_APP_SHORT_NAME'] ?>
				would help simplify your social
				media life.</p>
			<p>Whether you’re trying to find out who recently sent you a follower request or you’re trying to save your crush’s profile
				picture onto your phone, <?= $_SERVER['CI_APP_SHORT_NAME'] ?> allows you to quickly and conveniently view full-size
				profile pictures just by searching
				the username.</p>
			<p>Thank you for visiting our website. If you have any questions, feel free to Contact Us. Search our website privately and
				securely to view and zoom in on any <?= $_SERVER['CI_APP_SHORT_NAME'] ?>. No sign in required. Bookmark our webpage to see
				Instagram profile pictures
				anytime</p>

			<h2 class="heading">Want to Download Instagram Stories?</a></h3>
				<p>If you’re trying to download Instagram stories that one of your friends or favorite celebrities posted, there is no way
					to do it on Instagram. But you can do it easily with our <a href="instagram/tools/storyDownloader">Instagram Story
						Download</a> tool. Similar to <a href="storiesig.html">Storiesig</a> you simply enter your friends username and
					search!</p>

				<h2 class="heading">Storiesig Story Viewer</a></h3>
					<p>Watch and Download Instagram Stories Anonymously with our <a href="instagram/tools/storyDownloader">Instagram
							Story Viewer and Downloader</a>. Use IG Story Downloader for Instagram to keep the best moments on your device
						forever. To download Instagram Stories simply enter Instagram username and go.</p>
		</div>

		<? $this->load->view('BlogController/recommendedBlogs') ?>

	</div>
</div>


<? $this->load->view('layout/footer') ?>
