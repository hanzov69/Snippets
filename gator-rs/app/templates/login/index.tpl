<? $this->display("components/header", array('title'  => 'Login')); ?>

<h1>Login</h1>

<? if ($_SESSION) : ?>
	<div class="alert alert_warn">
		You do know that you're already logged in, right?
	</div>
<? endif; ?>

<form method="POST" action="?p=login&c=login">
	<label>Username</label><input type="text" name="username" class="styled"><br>
	<label>Password</label><input type="password" name="password" class="styled"><br>
	<label>&nbsp;</label><input type="image" value="Login" src="images/button_login.gif" class="nudges"> or <a href="?p=register">Register</a>
</form>

<? $this->display("components/footer"); ?>