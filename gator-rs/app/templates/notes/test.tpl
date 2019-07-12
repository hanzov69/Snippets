<? $Gator->display("components/header", array('title'  => '')); ?>

<h1>Notes</h1>

<div id="not">
	<? if (!empty($notes)) : ?>
	<? foreach ($notes['notes'] as $note) : ?>
		<div class="not" id="note_<?= $note['id']; ?>">
			<div class="avatar">
				<? if (file_exists(APP_AVATARS . DIRSEP . $note['users_id'] . ".gif")) : ?>
					<img src="images/avatars/<?= $note['users_id']; ?>.gif" class="avatar_small">
				<? endif; ?>
			</div>
			<div class="avatar">
				<? if (file_exists(APP_AVATARS . DIRSEP . $note['rusers_id'] . ".gif")) : ?>
					<img src="images/avatars/<?= $note['rusers_id']; ?>.gif" class="avatar_small">
				<? endif; ?>
			</div>
			<div class="head">
				<span class="notes_user"><b><?= $users['users'][$note['users_id']]['username']; ?></b></span> to
				<span class="notes_user"><u><?= $users['users'][$note['rusers_id']]['username']; ?></u></span>
				<span class="notes_time"><?= $note['time']; ?></span>
			</div>
			<div class="body">
				<?= $note['text']; ?>
			</div>
		</div>
	<? endforeach; ?>
	<? endif; ?>
</div>


<? $Gator->display("components/footer"); ?>