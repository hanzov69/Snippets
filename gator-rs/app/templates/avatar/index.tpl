<? $Gator->display("components/header", array('title'  => '')); ?>

<? $Gator->display("components/profile_header", array('title'  => '')); ?>

<div id="avt">
	<? if ($_GET['a'] == 1) : ?>
		<div class="alert alert_warn">
			Rejected. Whatever you uploaded was shit.
		</div>
	<? endif; ?>


	<? if (file_exists(APP_AVATARS . DIRSEP . $_SESSION['id'] . ".gif")) : ?>
		<h1>Look at your avatar</h1>
		<img src="images/avatars/<?= $_SESSION['id']; ?>.gif" class="avatar_big">
		<img src="images/avatars/<?= $_SESSION['id']; ?>.gif">
		<img src="images/avatars/<?= $_SESSION['id']; ?>.gif" class="avatar_small">
		<img src="images/avatars/<?= $_SESSION['id']; ?>.gif" class="avatar_tiny">
	<? endif; ?>

	<h1>Upload an avatar</h1>

	<form id="form" enctype="multipart/form-data" action="?p=avatar&c=upload" method="POST">
		<input name="uploadedfile" type="file" /><input type="submit" value="Upload File" />
	</form>

	<h1>Avatar requirements</h1>

	<ul>
		<li>40 x 55 pixels
		<li>GIF mimetype
		<li>No animated gifs
		<li>Your avatar should be a complete picture of something
		<ul>
			<li>Not a cropped rectangle of a picture
			<li>Not a close-up segment of something
		</ul>
		<li>If your avatar has no palette transparency, you have probably come up with a stupid avatar
		<li>If your avatar gets deleted, it's because it was stupid
		<ul>
			<li>If you upload the same avatar again, I'm going to ruin you
		</ul>
		<li>See <a href="?p=rules#data">the rules</a>
	</ul>
</div>

<? $Gator->display("components/footer"); ?>