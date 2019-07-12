<?
$Notes = use_interface('notes');
$Notes->qCriteria("rusers_id", "=", $_SESSION['id']);
$Notes->qCriteria("saved", "<>", "1");
$Notes->qCriteria("deleted", "<>", "1");
$Notes->qJoin('users');
$Notes->qOrder('id DESC');
$notes = $Notes->Get();
?>

<? if (!empty($notes)) : ?>
<div id="not">
	<? foreach ($notes['notes'] as $note) : ?>
		<div class="not" id="note_<?= $note['id']; ?>">
			<div class="avatar">
				<? if (file_exists(APP_AVATARS . DIRSEP . $note['users_id'] . ".gif")) : ?>
					<img src="images/avatars/<?= $note['users_id']; ?>.gif" class="avatar_small">
				<? endif; ?>
			</div>
			<div class="head">
				<span class="notes_user"><a href="?p=jerk&id=<?= $note['users_id']; ?>"><?=$notes['users'][$note['id']]['username']; ?></a></span>
				<span class="notes_time" title="<?= $note['time']; ?>"><?= timeDiff(strtotime($note['time'])); ?></span>
			</div>
			<div class="body">
				<?= $note['text']; ?>
			</div>
			<div class="foot">
				<a href="javascript: popup('?p=notes&c=send&username=<?= $notes['users'][$note['id']]['username']; ?>')"><img src="images/button_reply.gif"></a> <a href="?p=notes&c=saved&id=<?= $note['id']; ?>"><img src="images/button_save.gif"></a> <a href="?p=notes&c=delete&id=<?= $note['id']; ?>"><img src="images/button_delete.gif"></a>
			</div>
		</div>
	<? endforeach; ?>
</div>
<? endif; ?>