<? $Gator->display("components/header", array('title'  => '')); ?>

<h1>Notes</h1>


<div id="not">
	<div id="left">
	<? if (!empty($notes)) : ?>
	<? foreach ($notes as $note) : ?>
		<div class="not" id="note_<?= $note['id']; ?>">
			<div class="avatar">
				<? if (file_exists(APP_AVATARS . DIRSEP . $note['users.id'] . ".gif")) : ?>
					<img src="images/avatars/<?= $note['users.id']; ?>.gif" class="avatar_small">
				<? endif; ?>
			</div>
			<div class="head">
				<span class="notes_user"><a href="?p=jerk&id=<?= $note['users.id']; ?>"><?=$note['users.username']; ?></a></span>
				<span class="notes_time" title="<?= $note['notes.time']; ?>"><?= timeDiff(strtotime($note['notes.time'])); ?></span>
			</div>
			<div class="body">
				<?= $note['notes.text']; ?>
			</div>
			<div class="foot">
				<a href="javascript: popup('?p=notes&c=send&username=<?= $note['users.username']; ?>')"><img src="images/button_reply.gif"></a> <a href="?p=notes&c=delete&id=<?= $note['notes.id']; ?>"><img src="images/button_delete.gif"></a>
			</div>
		</div>
	<? endforeach; ?>
	<? endif; ?>
	</div>
	<div id="right"
		<div id="menu">
			<h2>Filters</h2>

			<ul>
				<li><a href="?p=notes">Received</a></li>
				<li><a href="?p=notes&f=sent">Sent</a></li>
			</ul>
		</div>
	</div>
</div>


<? $Gator->display("components/footer"); ?>