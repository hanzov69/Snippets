<? $Gator->display("components/header", array('title'  => '')); ?>

<script type="text/javascript">

function swapImage(url) {
	$('mainpic').src = '<?= WEB_PROFILEPICS_TN2 . DIRSEP; ?>' + url;
	}

</script>

<h1><?= $user['users.username']; ?></h1>

<div id="jrk">
	<div id="jrk_top">
		<div id="jrk_left">
			<p><label>note</label> <a class="clickable" onclick="javascript: popup('?p=notes&c=send&username=<?= $user['users.username']; ?>')"><img src="images/icon_mail.gif" class="mail_icon">Send a note</a></p>
			<p><label>last seen</label><?= timeDiff(strtotime($user['users.time_last_seen'])); ?></p>
			<? if ($user['users.birthday'] != '0000-00-00') : ?> <p><label>age</label><?= get_age($user['users.birthday']); ?></p> <? endif; ?>
			<? if ($user['users.name']) : ?>                     <p><label>name</label><?= $user['users.name']; ?></p> <? endif; ?>
			<? if ($user['zipcodes.zipcodes_id']) : ?>           <p><label>location</label><a href="http://maps.google.com/maps?f=q&hl=en&geocode=&q=<?= $user['zipcodes.latitude']; ?>,+<?= $user['zipcode.longitude']; ?>&ie=UTF8&z=12&iwloc=addr&om=1"><?= $user['zipcodes.city']; ?>, <?= $user['zipcodes.state']; ?></a></p> <? endif; ?>
			<? if ($user['users.email']) : ?>                    <p><label>email</label><a href="mailto:<?= $user['users.email']; ?>"><?= $user['users.email']; ?></a></p> <? endif; ?>
			<? if ($user['users.phone']) : ?>                    <p><label>phone</label><?= $user['users.phone']; ?></p> <? endif; ?>
			<? if ($user['users.aim']) : ?>                      <p><label>aim</label><?= $user['users.aim']; ?></p> <? endif; ?>
			<? if ($user['users.gtalk']) : ?>                    <p><label>gtalk</label><?= $user['users.gtalk']; ?></p> <? endif; ?>

			<h1>Avatar</h1>

			<? if (file_exists(APP_AVATARS . DIRSEP . $user['id'] . ".gif")) : ?>
				<img src="images/avatars/<?= $user['id']; ?>.gif" class="avatar_big right" style="padding-right: 40px;">
			<? endif; ?>

			<p><label>strength</label>     <?= $user['users.a_str']; ?></p>
			<p><label>dexterity</label>    <?= $user['users.a_dex']; ?></p>
			<p><label>constitution</label> <?= $user['users.a_con']; ?></p>
			<p><label>intelligence</label> <?= $user['users.a_int']; ?></p>
			<p><label>wisdom</label>       <?= $user['users.a_wis']; ?></p>
			<p><label>charisma</label>     <?= $user['users.a_cha']; ?></p>
		</div>
		<div id="jrk_right">
			<? if (!empty($pictures)) : ?>
				<div id="jrk_pic">
					<img id="mainpic" src="<?= WEB_PROFILEPICS_TN2 . DIRSEP . $pictures[rand(0, (sizeof($pictures)) -1)]; ?>">
				</div>
				<h1>Pictures</h1>
				<div id="jrk_pics">

				<?

				foreach($pictures as $picture) {
					echo '<div class="jrk_tn">';
					echo '<img class="clickable" onclick="swapImage(\'' . $picture . '\')" src="' . WEB_PROFILEPICS_TN1 . DIRSEP . $picture .'">';
					echo '</div>';
					}

				?>

				</div>
			<? endif; ?>
		</div>
	</div>
	<div id="jrk_freeform">
		<h1>lol butts</h1>

		<?= $user['users.profile']; ?>
	</div>
	<div id="jrk_comments">
		<? $Gator->display("comments/comments", array('COMMENTS' => $comments)); ?>
	</div>
</div>

<? $Gator->display("components/footer"); ?>