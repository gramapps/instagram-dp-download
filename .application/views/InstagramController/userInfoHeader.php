<div class="user-header verified">
	<div class="user">
		<div class="avatar">
			<img class="img" src="instagram/fetchImage?b64url=<?= base64_encode($userInfo['sd_profile_picture_url']) ?>">
		</div>
		<div class="info">
			<div class="username">
				<a class="tab selected profile" href="instagram/u/<?= $userInfo['username'] ?>">
					<?= $userInfo['username'] ?>
				</a>
			</div>
			<div class="text"><?= $userInfo['fullname'] ?></div>
			<div class="followers">
				<?= number_format($userInfo['follower_count']) ?> Followers
				&nbsp;&nbsp;|&nbsp;&nbsp;
				<?= number_format($userInfo['following_count']) ?> Followings
				&nbsp;&nbsp;|&nbsp;&nbsp;
				<?= number_format($userInfo['media_count']) ?> Posts
			</div>
		</div>
	</div>
</div>

<div class="results-tabs-instagram">
	<a class="tab <?= $selected == 'profile' ? 'selected' : '' ?> profile"
		 href="instagram/u/<?= $userInfo['username'] ?>">
		Profile
	</a>
	<a class="tab <?= $selected == 'dp' ? 'selected' : '' ?> profile-picture"
		 href="instagram/u/<?= $userInfo['username'] ?>/dp">
		Photo
	</a>
	<a class="tab <?= $selected == 'stories' ? 'selected' : '' ?> stories"
		 href="instagram/u/<?= $userInfo['username'] ?>/stories">
		Stories
	</a>
	<a class="tab <?= $selected == 'reels' ? 'selected' : '' ?> reels"
		 href="instagram/u/<?= $userInfo['username'] ?>/reels">
		Reels
	</a>
	<a class="tab <?= $selected == 'igtv' ? 'selected' : '' ?> igtv"
		 href="instagram/u/<?= $userInfo['username'] ?>/igtv">
		Igtv
	</a>
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

		<? if ($selected == 'profile'): ?>
			<a class="link" href="https://www.instagram.com/<?= $userInfo['username'] ?>/" target="_blank">Open on Instagram</a>
		<? endif ?>
	</div>
</div>
