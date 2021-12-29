<? $this->load->view('layout/header') ?>


<link href="assets/plugins/fotorama/fotorama.css" rel="stylesheet">
<script src="assets/plugins/fotorama/fotorama.js"></script>


<div class="page">
	<div class="centered">

		<? $this->load->view('InstagramController/userInfoHeader', ['userInfo' => $userInfo, 'selected' => 'profile']) ?>


		<!-- START HERE -->
		<div class="user-stories verified">

			<div class="active-stories">

				<? foreach ($mediaInfo['carousel_data'] as $datum): ?>
					<div class="story">
						<div class="story-post">
							<img class="story-image"
									 src="instagram/fetchImage?b64url=<?= base64_encode($datum['sd_image_url']) ?>">
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
