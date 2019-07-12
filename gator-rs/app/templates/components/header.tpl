<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Robotskull</title>
	<meta http-equiv="Content-Language" content="English" />
	<meta name="Robots" content="noindex, nofollow" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link media="screen" rel="stylesheet" type="text/css" href="css/screen.css" />
	<script language="javascript" src="js/prototype.js"></script>

	<script type="text/javascript">
		function popup(URL) {
			day = new Date();
			id = day.getTime();
			eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=420,height=160,left = 480,top = 470');");
			}
		function cdisk(URL) {
			day = new Date();
			id = day.getTime();
			eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=600');");
			}

		new Ajax.PeriodicalUpdater("babble", "?p=login&c=ping", {onSuccess: function(){ }, frequency: 10});
	</script>
</head>
<body>
<div id="doc">
	<div id="hd">
		<div id="masthead">
			<div id="mh1">

			</div>
			<div id="mh2">
				<div id="ticker"><marquee behavior="alternate"><?= $Gator->Registry->marquee; ?></marquee></div>
			</div>
			<div id="mh3">
				<div id="avatars">
					<? if (!empty($users_online)) : ?>
						<? foreach ($users_online as $user) : ?>
							<?

							if (file_exists(PATH_WEB . "/images/avatars/" . $user['id'] . ".gif")) {
								$avatar = $user['id'];
								}
							else {
								$avatar = 0;
								}

							?>

							<a href="?p=jerk&id=<?= $user['id']; ?>">
							<div class="avatar_roster_cell" style="background: url('images/avatars/<?= $avatar; ?>.gif')" title="<?= $user['username']; ?>">
								<? if ($user['outfit'] != '') : ?>
									<img src="images/avatars/outfits/<?= $user['outfit']; ?>" height="55" width="40">
								<? endif; ?>
							</div>
							</a>
						<? endforeach; ?>
					<? endif; ?>
				</div>
			</div>
		</div>
		<div id="nav_bar">
			<div class="contents">
				<div class="left">
					<? if ($_SESSION['username'] == "kellybear") : ?>
						I love you.
					<? elseif ($_SESSION['id']) : ?>
						Welcome, <?= $_SESSION['username']; ?>. You are a failure.
					<? endif; ?>
				</div>
				<div class="right">
					<? if ($_SESSION) : ?>
						<a href="?p=login&c=logout">Logout</a>
					<? endif; ?>
				</div>
				<? if (SERVER == "prod") : ?>
				<div class="right">
					<span class="subtle">
					<? if ($rs_radio['status'] == 1) : ?>
						<a title="<?= $rs_radio['listeners']; ?> listeners" href="<?= $rs_radio['url']; ?>"><?= $rs_radio['song']; ?></a> (<a href="?p=jerk&id=<?= $rs_radio['users_id']; ?>"><?= $rs_radio['username']; ?></a>)
					<? else : ?>
						No one is broadcasting
					<? endif; ?>
					</span>
				</div>
				<? endif; ?>
			</div>
		</div>
	</div>
	<div id="bd">
		<div id="sidebar">
			<div id="sidebar_contents">
				<? if ($_SESSION) : ?>
					<div class="sidebar_head">
						<h1>Destroy</h1>
					</div>
					<div class="sidebar_body">
						<ul>
							<li><a href="?p=articles">Articles</a>
							<li><a href="?p=babble">Babble</a>
							<li><a onclick="javascript: cdisk('cdisk/')" href="#/">Cdisk</a>
							<li><a href="?p=radio">Radio</a>
							<li><a href="?p=userlist">User List</a>
						</ul>
					</div>
					<div class="sidebar_head">
						<h1>LOL Extremists</h1>
					</div>
					<div class="sidebar_body">
						<ul>
							<li><a href="?p=magic&id=18">Gustavo</a>
							<li><a href="?p=magic&id=38">jeffrey</a>
							<li><a href="?p=magic&id=2">Samn</a>
							<li><a href="?p=magic&id=96">Supervillain</a>
						</ul>
					</div>
					<div class="sidebar_head">
						<h1>Dadforce Stupid</h1>
					</div>
					<div class="sidebar_body">
						<ul>
							<li><a href="?p=magic&id=4">Coyforce</a>
							<li><a href="?p=magic&id=26">Spider</a>
							<li><a href="?p=magic&id=117">Thing</a>
						</ul>
					</div>
					<div class="sidebar_head">
						<h1>Mind Bandits</h1>
					</div>
					<div class="sidebar_body">
						<ul>
							<li><a href="?p=magic&id=52">emily</a>
							<li><a href="?p=magic&id=30">sarasnortsspeed</a>
							<li><a href="?p=magic&id=34">wicks</a>
						</ul>
					</div>
					<div class="sidebar_head">
						<h1><?= $_SESSION['username']; ?>?</h1>
					</div>
					<div class="sidebar_body">
						<ul>
							<li><a href="?p=notes">Notes</a>
							<li><a href="?p=profile">Profile</a>
						</ul>
					</div>
					<div class="sidebar_head">
						<h1><?= sizeof($users_online); ?> Online</h1>
					</div>
					<div class="sidebar_body">
						<ul>
						<? if (!empty($users_online)) : ?>
							<? foreach ($users_online as $user) : ?>
								<li><img src="images/icon_mail.gif" class="mail_icon clickable" onclick="javascript: popup('?p=notes&c=send&username=<?= $user['username']; ?>')"><a href="?p=jerk&id=<?= $user['id']; ?>"><?= $user['username']; ?></a>
							<? endforeach; ?>
						<? endif; ?>
						</ul>
					</div>
				<? else : ?>
					<div class="sidebar_head">
						<h1>LOL</h1>
					</div>
					<div class="sidebar_body">
						<ul>
							<li><a href="?p=articles">Articles</a>
							<li><a href="?p=register">Register</a>
						</ul>
					</div>
					<div class="sidebar_head">
						<h1>LOL Extremists</h1>
					</div>
					<div class="sidebar_body">
						<ul>
							<li><a href="?p=magic&id=18">Gustavo</a>
							<li><a href="?p=magic&id=38">jeffrey</a>
							<li><a href="?p=magic&id=2">Samn</a>
							<li><a href="?p=magic&id=96">Supervillain</a>
						</ul>
					</div>
					<div class="sidebar_head">
						<h1>Login</h1>
					</div>
					<div class="sidebar_body">
						<form method="POST" action="?p=login&c=login">
							<label>u</label><input type="text" id="login_name" name="username" class="styled"><br>
							<label>p</label><input type="password" name="password" class="styled"><br>
							<label>&nbsp;</label><input type="image" value="Login" src="images/button_login.gif">
							<script type="text/javascript">
								$(login_name).focus();
							</script>
						</form>
					</div>
				<? endif; ?>
			</div>
		</div>
		<div id="main">
			<div id="main_contents">

			<? if ($_GET['a'] == 1) : ?>
				<div class="alert alert_warn">
					You failed
				</div>
			<? endif; ?>

			<?

			if ($_SESSION['id']) {
				$Gator->display("notes/inbox");
				}

			?>