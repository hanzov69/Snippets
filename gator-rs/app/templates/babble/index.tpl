<? $Gator->display("components/header", array('title'  => '')); ?>

<script type="text/javascript">
function at (id) {
	$('babble').value = '@' + id + ' ';
	$('babble').focus();
	}

var lastvar = 0;

function hl(id, toggle) {

	if (toggle == 1) {
		if (lastvar != id) {
			document.getElementById(id).removeClassName("highlight2");
			}
		}
	else if (toggle == 2) {
		lastvar = id;
		document.getElementById(id).addClassName("highlight2");
		}
	else {
		document.getElementById(id).addClassName("highlight2");
		}
	}

function babble_clock() {
	var start_time = 9 * 60;
	var end_time   = 17 * 60;
	var difference = end_time - start_time;
	var spacing    = 694 / difference;
	var hours;
	var mins;

	Time = new Date();
	hours = Time.getHours();
	mins  = Time.getMinutes();

	current = hours * 60 + mins;
	minutessofar = current - start_time;

	if ((current < start_time) || (current > end_time)) {
		$('bab_clock').style.display = 'none';
		}

	$('bab_clock_progress').style.width = Math.round(minutessofar * spacing);
	$('bab_clock').title = (difference - minutessofar) + " minutes left in the day";
	}

</script>

<h1 onclick="$(babble).value = '/topic '; $('babble').focus();" class="clickable" id="babble_topic" title="Topic of discussion provided by <?= $topic_user; ?>"><?= $topic_text; ?></h1>

<form method="POST" action="index.php?p=babble&c=babble" id="bab_form">
	<img src="images/icon_attachment.gif" id="bab_attach" class="clickable" onclick="$('bab_att').style.display = 'block'"> <input type="text" id="babble" name="babble" class="styled"> <input type="image" src="images/button_babble.gif" class="nudges"> <input type="checkbox" name="oh" value="1" id="oh">
	<div id="bab_att">
		url: <input type="text" id="url" name="url" class="styled">
		title: <input type="text" id="title" name="title" class="styled">
	</div>
	<script type="text/javascript">
	$('babble').focus()
	</script>
</form>

<div id="bab_clock"><div id="bab_clock_progress"><script type="text/javascript">babble_clock();</script></div></div>

<? $old_time = strtotime(date("Y-m-d G:i:s")); ?>

<div id="bab">
	<? if (!empty($babble)) : ?>
	<? foreach ($babble as $line) : ?>
		<div id="<?= $line['babble.id']; ?>" class="bab<? if ($line['babble.id'] > $_SESSION['babble']) { echo " highlight"; } ?>">
			<div class="babble_avatar">
				<? if (file_exists(APP_AVATARS . DIRSEP . $line['babble.users_id'] . ".gif")) : ?>
					<img src="images/avatars/<?= $line['babble.users_id']; ?>.gif" class="avatar_small" title="<?=$line['users.name']; ?>">
				<? endif; ?>
			</div>
			<div class="head">
				<? if ($_SESSION['admin'] == 1) : ?>
					<span class="babble_fuckbutton"><a href="?p=babble&c=fuck&id=<?=$line['babble.id']; ?>"><img src="images/button_x.gif"></a></span>
				<? endif; ?>

				<span class="user"><a href="?p=jerk&id=<?=$line['users.id']; ?>"><?=$line['users.username']; ?></a></span>
				<span class="time clickable" title="<?= $line['babble.time']; ?>" onclick="at(<?= $line['babble.id']; ?>)">
					<?= timeDiff(strtotime($line['babble.time'])); ?>
					<? if ($old_time > strtotime("+10 minutes", strtotime($line['babble.time']))) { echo "(Babble killer)"; } ?>
				</span>

				<? if ($line['babble.reply']) : ?>
					<span class="reply clickable" title="in response to <?= $line['babble.reply']; ?>" onmouseover="hl(<?= $line['babble.reply']; ?>)" onmouseout="hl(<?= $line['babble.reply']; ?>, 1)" onclick="hl(<?= $line['babble.reply']; ?>, 2)"><a href="#<?= $line['babble.reply']; ?>">@<?= $babble[$line['babble.reply']]['users.username']; ?></a></span>
				<? endif; ?>
			</div>
			<div class="body">
				<? if ($line['fucked'] == 1) : ?>
					<div class="fucked">
						<span onclick="javascript: $('ta[<?= $line['babble.id']; ?>]').style.display = 'block';">THIS IS NO GOOD</span>
					</div>
					<textarea id="ta[<?= $line['babble.id']; ?>]"><?= $line['babble.text']; ?></textarea>
				<? else :?>
					<?= $line['babble.text']; ?>

					<? if ($line['babble.url']) : ?>
						<? if ($line['babble.title'] == '') { $line['babble.title'] = $line['babble.url']; }  ?>
						<div class="attachment">Attached: <a href="<?= $line['babble.url']; ?>"><?= $line['babble.title']; ?></a></div>
					<? endif; ?>
				<? endif; ?>

				<a name="<?= $line['babble.id']; ?>"></a>
			</div>
		</div>

		<? $old_time = strtotime($line['babble.time']); ?>
	<? endforeach; ?>
	<? endif; ?>
</div>

<? $Gator->display("components/footer"); ?>