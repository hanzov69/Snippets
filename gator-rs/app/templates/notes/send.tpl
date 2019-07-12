<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>RIM.EXE</title>
	<meta http-equiv="Content-Language" content="English" />
	<meta name="Robots" content="noindex, nofollow" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link media="screen" rel="stylesheet" type="text/css" href="css/reset.css" />
	<link media="screen" rel="stylesheet" type="text/css" href="css/screen.css" />
	<script language="javascript" src="js/prototype.js"></script>
</head>
<body>
	<div id="not">
		<form method="POST" action="?p=notes&c=save">
			To: <input type="text" name="to" id="form_to" class="styled" value="<?= $_GET['username']; ?>"> <span class="error"><?= $_GET['error']; ?></span>
			<textarea id="form_text" name="text" class="styled"><?= $_GET['msg']; ?></textarea>
			<input id="form_send_button" type="image" src="images/button_send.gif">
		</form>
	</div>
</body>
</html>
