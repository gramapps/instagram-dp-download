<? $this->load->view('layout/header') ?>


<link href="assets/plugins/fotorama/fotorama.css" rel="stylesheet">
<script src="assets/plugins/fotorama/fotorama.js"></script>


<div class="page">
	<div class="centered">

		<? $this->load->view('InstagramController/userInfoHeader', ['userInfo' => $userInfo, 'selected' => 'profile']) ?>

		<div class="insta-carousel-container" style="margin: 10px 0px 0px 0px;">
			<div class="fotorama"
					 data-width="100%"
					 data-ratio="600/1000"
					 data-minwidth="300"
					 data-maxwidth="5000"
					 data-minheight="300"
					 data-maxheight="100%"
					 data-loop="true"
					 data-fit="cover"
					 data-nav="thumbs">
				<? foreach ($mediaInfo['carousel_data'] as $datum): ?>

					<? if (isset($datum['hd_video_url'])): ?>
						<a href="instagram/fetchVideo?b64url=<?= base64_encode($datum['sd_video_url']) ?>&html=true"
							 data-href="<?= $datum['hd_video_url'] ?>"
							 data-video="true">
							<img src="instagram/fetchImage?b64url=<?= base64_encode($datum['sd_image_url']) ?>" style="width: 100%;" />
						</a>
					<? elseif (isset($datum['sd_video_url'])): ?>
						<a href="instagram/fetchVideo?b64url=<?= base64_encode($datum['sd_video_url']) ?>"
							 data-href="<?= $datum['sd_video_url'] ?>"
							 data-video="true">
							<img src="instagram/fetchImage?b64url=<?= base64_encode($datum['sd_image_url']) ?>" style="width: 100%;" />
						</a>

					<? else: ?>
						<img src="instagram/fetchImage?b64url=<?= base64_encode($datum['sd_image_url']) ?>"
								 data-href="<?= $datum['hd_image_url'] ?>"
								 style="width: 100%;" />

					<? endif ?>

				<? endforeach ?>
			</div>
		</div>

		<div class="user-stories verified">
			<div class="active-stories">
				<div class="story">
					<a class="download-btn" href="instagram/download/<?= $mediaInfo['short_code'] ?>">Go To Downloader</a>
				</div>
			</div>
		</div>


		<br />


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

<? $this->load->view('layout/footer') ?>
