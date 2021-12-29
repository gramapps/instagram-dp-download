<? $this->load->view('layout/header') ?>


<link href="assets/plugins/fotorama/fotorama.css" rel="stylesheet">
<script src="assets/plugins/fotorama/fotorama.js"></script>


<div class="page">
	<div class="centered">

		<? $this->load->view('InstagramController/userInfoHeader', ['userInfo' => $userInfo, 'selected' => $selectedHeaderMenu]) ?>


		<!-- START HERE -->
		<div class="user-stories verified">

			<div class="active-stories">

				<? foreach ($mediaInfo['carousel_data'] as $datum): ?>
					<div class="story">
						<div class="story-post">

							<div class="fotorama"
									 data-width="100%"
									 data-ratio="600/900"
									 data-minwidth="400"
									 data-maxwidth="5000"
									 data-minheight="300"
									 data-maxheight="100%"
									 data-loop="true"
									 data-fit="cover"
									 data-nav="thumbs">

									<? if (isset($datum['hd_video_url'])): ?>
										<a href="instagram/fetchVideo?b64url=<?= base64_encode($datum['hd_video_url']) ?>&html=true"
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

							</div>
						</div>


						<? if (isset($datum['hd_video_url'])): ?>
							<div class="timestamp" style="font-weight: bold;">Content: Video</div>

							<a target="_blank" class="download-btn"
								 href="instagram/download?fileName=<?= $userInfo['username'] . '_vidoe_' . md5($datum['hd_video_url']) ?>&b64url=<?= base64_encode($datum['hd_video_url']) ?>">Download</a>

						<? elseif (isset($datum['sd_video_url'])): ?>
							<div class="timestamp" style="font-weight: bold;">Content: Video</div>

							<a target="_blank" class="download-btn"
								 href="instagram/download?fileName=<?= $userInfo['username'] . '_vidoe_' . md5($datum['sd_video_url']) ?>&b64url=<?= base64_encode($datum['sd_video_url']) ?>">Download</a>

						<? else: ?>
							<div class="timestamp" style="font-weight: bold;">Content: Image</div>

							<a target="_blank" class="download-btn"
								 href="instagram/download?fileName=<?= $userInfo['username'] . '_image_' . md5($datum['hd_image_url']) ?>&b64url=<?= base64_encode($datum['hd_image_url']) ?>">Download</a>

						<? endif ?>
					</div>

				<? endforeach ?>

			</div>

		</div>
		<!-- END HERE -->


		<br />
		<br />

		<? $this->load->view('BlogController/recommendedBlogs') ?>

	</div>
</div>

<? $this->load->view('layout/footer') ?>
