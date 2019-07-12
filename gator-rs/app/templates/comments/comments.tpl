<div id="com">
	<h1>Comments</h1>
	<? if (!empty($COMMENTS['comments'])) : ?>
		<? foreach ($COMMENTS['comments'] as $line) : ?>
			<div class="com">
				<div class="comment_avatar">
					<? if (file_exists(APP_AVATARS . DIRSEP . $line['users.id'] . ".gif")) : ?>
						<img src="images/avatars/<?= $line['users.id']; ?>.gif" class="avatar_small" title="<?= $line['users.name']; ?>">
					<? endif; ?>
				</div>
				<div class="head">
					<span class="user"><a href="?p=jerk&id=<?= $line['users.id']; ?>"><?= $line['users.username']; ?></a></span>
					<span class="time" title="<?= $line['comments.time']; ?>"><?= timeDiff(strtotime($line['comments.time'])); ?></span>
				</div>
				<div class="body">
					<?= $line['comments.text']; ?>

					<? if ($line['comments.url']) : ?>
						<? if ($line['comments.title'] == '') { $line['comments.title'] = $line['comments.url']; }  ?>
						<div class="attachment">Attached: <a href="<?= $line['comments.url']; ?>"><?= $line['comments.title']; ?></a></div>
					<? endif; ?>
				</div>
			</div>
		<? endforeach; ?>
	<? endif; ?>

	<form method="POST" action="index.php?p=comments&c=comment" id="com_form">
		<textarea id="comment" name="comment" class="styled"></textarea><br>
		<input type="image" src="images/button_comment.gif" class="nudges">
		<input type="hidden" name="type" value="<?= $COMMENTS['data']['type']; ?>">
		<input type="hidden" name="resource" value="<?= $COMMENTS['data']['resource']; ?>">
		<input type="hidden" name="return" value="<?= $_SERVER['QUERY_STRING']; ?>">
	</form>
</div>