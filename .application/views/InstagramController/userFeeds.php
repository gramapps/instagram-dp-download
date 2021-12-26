<? $this->load->view('layout/header') ?>

<div class="page">
	<div class="centered">


		<div class="user-header verified">
			<div class="user">
				<div class="avatar">
					<img class="img" src="instagram/fetchImage?b64url=<?= base64_encode($userInfo['sd_profile_picture_url']) ?>">
				</div>
				<div class="info">
					<span class="username"><?= $userInfo['username'] ?></span>
					<span class="text"><?= $userInfo['fullname'] ?></span>
					<span class="followers"><?= number_format($userInfo['follower_count']) ?> Followers
						&nbsp;&nbsp;|&nbsp;&nbsp;
						<?= number_format($userInfo['following_count']) ?> Followings
						&nbsp;&nbsp;|&nbsp;&nbsp;
						<?= number_format($userInfo['media_count']) ?> Posts</span>
				</div>
			</div>

			<div class="skeleton">
				<div class="avatar-skeleton"></div>
				<div class="info-skeleton">
					<div class="username-skeleton"></div>
					<div class="text-skeleton"></div>
					<div class="followers-skeleton"></div>
				</div>
			</div>
		</div>

		<div class="results-tabs-instagram">
			<a class="tab selected profile" href="javascript:;">Profile</a>
			<a class="tab profile-picture" href="instagram-tools/full-size-downloader/larissamanoela">Full Size</a>
			<a class="tab stories" href="instagram-tools/story-downloader/larissamanoela">Stories</a>
			<a class="tab reels" href="instagram-tools/reel-downloader/larissamanoela">Reels</a>
		</div>


		<div class="user-details verified">

			<div class="details">
				<div class="data">
					<div class="info">
						<span class="num"><?= number_format($userInfo['follower_count']) ?></span>
						<span class="text">Followers</span>
					</div>
					<div class="info">
						<span class="num"><?= number_format($userInfo['following_count']) ?></span>
						<span class="text">Following</span>
					</div>
					<div class="info">
						<span class="num"><?= number_format($userInfo['media_count']) ?></span>
						<span class="text">Posts</span>
					</div>
				</div>
			</div>
		</div>


		<div class="insta-posts" style="margin: 10px 0px 0px 0px;">
			<div class="list">
				<? foreach ($userFeeds as $feed): ?>
					<div class="insta-post">
						<a class="link" href="instagram/p/<?= $feed['short_code'] ?>">
							<div class="thumbnail">
								<img class="img"
										 src="instagram/fetchImage?b64url=<?= base64_encode($feed['carousel_data'][0]['sd_image_url']) ?>"
										 alt="<?= cleanStr($feed['caption']) ?>">
							</div>
							<div class="title">
								<center>
									❤ <?= cleanStr($feed['like_count']) ?>
									&nbsp;&nbsp;
									💬 <?= cleanStr($feed['comment_count']) ?>
								</center>

								<?= cleanStr($feed['caption']) ?>
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
			<p>If you're looking for a safe and reliable way to view and download content from Instagram profiles, then Instadp is the
				tool for you.</p>

			<h2 class="heading">How to use InstaDP Profile Viewer</h2>
			<p>We made the process as simple as possible. To search for any Instagram account, enter the username or paste the link from
				a post into the search bar at the top of our webpage. The account loads instantly, and from there, you can anonymously
				browse their profile and view stories, highlights and reels.</p>

			<h2 class="heading">Why Use InstaDP?</h2>
			<p>Instagram is a social media platform that allows users to take pictures and post them online for others to see. The app
				is primarily used for sharing photos, although it has recently added features to include videos and reels. Posting and
				sharing videos and reels on Instagram continues to rise in popularity among its users.</p>
			<p>Instagram users, and even non-users, can view the creative content account owners post on Instagram. You can find high
				quality, professional pictures and creative videos on Instagram, as well as blurry pictures of someone’s daily life; the
				options are endless and left up to the user.</p>
			<p>With the endless amount of creative and entertaining content, some users want to share it outside of Instagram or save
				their favorite content for offline viewing. InstaDP will allow you to save any public content straight to your device.
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


		<!-- Recommended Articles -->
		<div class="articles">
			<h2 class="heading">Recommended Articles</h2>
			<div class="list">
				<div class="article">
					<a class="link" href="article/2/how-to-check-if-you-accidently-liked-any-instagram-posts.html">
						<div class="thumbnail">
							<img class="img"
									 src="https://www.instadp.com/images/articles/How-to-Check-if-You-Accidently-Liked-Any-Instagram-Posts.png"
									 alt="How to Check if You Accidently Liked Any Instagram Posts">
						</div>
						<div class="title">How to Check if You Accidently Liked Any Instagram Posts</div>
					</a>
				</div>
				<div class="article">
					<a class="link" href="article/9/show-your-favorite-instagram-filters-first/-hide-the-ones-you-don’t-use.html">
						<div class="thumbnail">
							<img class="img"
									 src="https://www.instadp.com/images/articles/Show-Your-Favorite-Instagram-Filters-First-Hide-the-Ones-You-Dont-Use.png"
									 alt="Show Your Favorite Instagram Filters First/ Hide the Ones You Don’t Use">
						</div>
						<div class="title">Show Your Favorite Instagram Filters First/ Hide the Ones You Don’t Use</div>
					</a>
				</div>
				<div class="article">
					<a class="link" href="article/12/disable-anyone-from-tagging-you-on-instagram-without-your-permission.html">
						<div class="thumbnail"><img class="img"
																				src="https://www.instadp.com/images/articles/Disable-Anyone-from-Tagging-You-on-Instagram-without-Your-Permission.png"
																				alt="Disable Anyone from Tagging You on Instagram without Your Permission"></div>
						<div class="title">Disable Anyone from Tagging You on Instagram without Your Permission</div>
					</a>
				</div>
				<div class="article">
					<a class="link" href="article/4/what-are-instagram-story-highlights?.html">
						<div class="thumbnail"><img class="img"
																				src="https://www.instadp.com/images/articles/What-are-Instagram-Story-Highlights.png"
																				alt="What are Instagram Story Highlights?"></div>
						<div class="title">What are Instagram Story Highlights?</div>
					</a>
				</div>
				<div class="article">
					<a class="link" href="article/10/how-to-add-line-breaks-into-your-bio-and-captions-on-instagram.html">
						<div class="thumbnail"><img class="img"
																				src="https://www.instadp.com/images/articles/How-to-Add-Line-Breaks-into-Your-Bio-and-Captions-on-Instagram.png"
																				alt="How to Add Line Breaks into Your Bio and Captions on Instagram"></div>
						<div class="title">How to Add Line Breaks into Your Bio and Captions on Instagram</div>
					</a>
				</div>
				<div class="article">
					<a class="link" href="article/8/how-to-clear-your-instagram-search-history.html">
						<div class="thumbnail"><img class="img"
																				src="https://www.instadp.com/images/articles/How-to-Clear-Your-Instagram-Search-History.png"
																				alt="How to Clear Your Instagram Search History"></div>
						<div class="title">How to Clear Your Instagram Search History</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<? $this->load->view('layout/footer') ?>
