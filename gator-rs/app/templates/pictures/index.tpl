<? $Gator->display("components/header", array('title'  => '')); ?>

<div id="pic">
	<? if ($_GET['a'] == 1) : ?>
		<div class="alert alert_warn">
			Rejected. Whatever you uploaded was shit.
		</div>
	<? endif; ?>

	<? $Gator->display("components/profile_header", array('title'  => '')); ?>

	<h1>Look at your pictures</h1>

	<? if (!empty($pictures)) : ?>
		<? foreach($pictures as $picture) : ?>
			<div class="pic">
				<img src="<?= WEB_PROFILEPICS_TN1 . DIRSEP . $picture; ?>">
				<a href="?p=pictures&c=remove&id=<?= $picture; ?>">Remove</a>
			</div>
		<? endforeach; ?>
	<? else : ?>
		You can't! You have none!
	<? endif; ?>

	<h1 class="clear">Upload a picture</h1>

	<form id="form" enctype="multipart/form-data" action="?p=pictures&c=upload" method="POST">
		<input name="uploadedfile" type="file" /><input type="submit" value="Upload File" />
	</form>

	<h1>Picture requirements</h1>

	<ul>
		<li>No size requirement (images will be resized to 500px max)
		<li>JPEG mimetype
		<li>Only upload an actual, clear photograph <b>of you</b>
		<ul>
			<li>If you want to upload some other picture, do it in your gallery, which doesn't exist yet
			<li>If you want to include some picture or graphic of something else in your profile, link it in the freeform area
			<li>If you upload anything besides a clear photograph of you, it will be removed and you will either be prevented from uploading more photos, or have your account deleted
			<li>See <a href="?p=rules#data">rules</a>
		</ul>
	</ul>
</div>

<? $Gator->display("components/footer"); ?>