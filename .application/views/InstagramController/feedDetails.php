<? $this->load->view('layout/header') ?>


<link href="assets/plugins/fotorama/fotorama.css" rel="stylesheet">
<script src="assets/plugins/fotorama/fotorama.js"></script>


<div class="page">
	<div class="centered">

		<div class="user-header verified">
			<div class="user">
				<div class="avatar">
					<img class="img" src="instagram/fetchImage?b64url=<?= base64_encode($userInfo['sd_profile_picture_url']) ?>">
				</div>
				<div class="info">
					<span class="username">
								<a class="tab selected profile" href="instagram/u/<?= $userInfo['username'] ?>">
									<?= $userInfo['username'] ?>
								</a>
					</span>
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
			<a class="tab selected profile" href="instagram/u/<?= $userInfo['username'] ?>">Profile</a>
			<a class="tab profile-picture" href="instagram/u/<?= $userInfo['username'] ?>/dp">Full Size</a>
			<a class="tab stories" href="instagram/u/<?= $userInfo['username'] ?>/stories">Stories</a>
			<a class="tab reels" href="instagram/u/<?= $userInfo['username'] ?>/reels">Reels</a>
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

		<div class="insta-carousel-container" style="margin: 10px 0px 0px 0px;">
			<div class="fotorama"
					 data-width="100%"
					 data-ratio="600/600"
					 data-minwidth="400"
					 data-maxwidth="5000"
					 data-minheight="300"
					 data-maxheight="100%"
					 data-loop="true"
					 data-fit="cover"
					 data-nav="thumbs"
					 data-shuffle="true">
				<? foreach ($mediaInfo['carousel_data'] as $datum): ?>

					<? if (isset($datum['hd_video_url'])): ?>
						<a href="instagram/fetchVideo?b64url=<?= base64_encode($datum['hd_video_url']) ?>&html=true" data-video="true">
							<img src="instagram/fetchImage?b64url=<?= base64_encode($datum['sd_image_url']) ?>" style="width: 100%;" />
						</a>
						<!--<video controls>
								<source src="instagram/fetchVideo?b64url=<?= base64_encode($datum['hd_video_url']) ?>" type="video/mp4">
							</video>-->
					<? elseif (isset($datum['sd_video_url'])): ?>
						<a href="instagram/fetchVideo?b64url=<?= base64_encode($datum['sd_video_url']) ?>" data-video="true">
							<img src="instagram/fetchImage?b64url=<?= base64_encode($datum['sd_image_url']) ?>" style="width: 100%;" />
						</a>

					<? else: ?>
						<img src="instagram/fetchImage?b64url=<?= base64_encode($datum['sd_image_url']) ?>" style="width: 100%;" />

					<? endif ?>

				<? endforeach ?>
			</div>
		</div>

		<div class="insta-carousel-container" style="margin: 15px 0px 20px 0px;">
			<?= htmlspecialchars($mediaInfo['caption']) ?>
		</div>

		<div class="insta-carousel-container" style="margin: 10px 0px 0px 0px;">
			<strong>Comments:</strong>
			<br />
			<? foreach ($mediaComments as $comment): ?>
				<div class="comment" style="margin:10px 0px 15px 0px;">
					<a href="instagram/u/<?= $comment['user']['username'] ?>">
						<img src="instagram/fetchImage?b64url=<?= base64_encode($comment['user']['xs_profile_picture_url']) ?>"
								 style="width: 16px; height: 16px;" />
						<div style="display: inline-block; font-size: 16px; font-weight: bold;">
							<?= $comment['user']['username'] ?>
						</div>
					</a>
					&nbsp;&nbsp;
					<?= htmlspecialchars($comment['comment']) ?>

				</div>
			<? endforeach ?>
		</div>

		<br />
		<br />

		<? $this->load->view('BlogController/recommendedBlogs') ?>

	</div>
</div>

<style>
	.owl-item-container {
		display: block;
		width: 100%;
		height: auto;
	}

	.owl-item-container > img {
		display: block;
		width: 100%;
		height: auto;
	}

	.owl-item-container > video {
		display: block;
		width: 100%;
		height: auto;
	}
</style>

<script>
	$(document).ready(function () {
		$('.owl-carousel-single').owlCarousel({

			navigation: false, // Show next and prev buttons
			slideSpeed: 300,
			paginationSpeed: 400,
			singleItem: true,

			// "singleItem:true" is a shortcut for:
			// items : 1,
			// itemsDesktop : false,
			// itemsDesktopSmall : false,
			// itemsTablet: false,
			// itemsMobile : false
		})
	})
</script>

<? $this->load->view('layout/footer') ?>
