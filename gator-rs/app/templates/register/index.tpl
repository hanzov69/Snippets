<? $Gator->display("components/header", array('title'  => '')); ?>

<h1>Create Account</h1>

<? if ($_GET['a'] == 1) : ?>
	<div class="alert alert_warn">
		That username is in use
	</div>
<? elseif ($_GET['a'] == 2) : ?>
	<div class="alert alert_warn">
		You are a failure
	</div>
<? elseif ($_GET['a'] == 3) : ?>
	<div class="alert alert_warn">
		Password mismatch
	</div>
<? endif; ?>

<form method="POST" action="?p=register&c=register">
	<label>Username</label><input type="text" name="username" class="styled"><br>
	<label>Password</label><input type="password" name="password" class="styled"><br>
	<label>Password again</label><input type="password" name="password2" class="styled"><br>	
	<label>&nbsp;</label><input type="image" value="Create" src="images/button_create.gif">
</form>

<? $Gator->display("components/footer"); ?>