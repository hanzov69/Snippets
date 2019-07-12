<? $Gator->display("components/header", array('title'  => '')); ?>

<? $Gator->display("components/profile_header", array('title'  => '')); ?>

<h1>Profile</h1>

<div id="profile">
	<form method="POST" action="?p=profile&c=save">
		<p><label>name</label>     <input type="text" class="styled" name="name"        value="<?= $user['users.name']; ?>"></p>
		<p><label>birthday</label> <input type="text" class="styled" name="birthday"    value="<?= $user['users.birthday']; ?>"> (yyyy-mm-dd)</p>
		<p><label>email</label>    <input type="text" class="styled" name="email"       value="<?= $user['users.email']; ?>"></p>
		<p><label>phone</label>    <input type="text" class="styled" name="phone"       value="<?= $user['users.phone']; ?>"></p>
		<p><label>aim</label>      <input type="text" class="styled" name="aim"         value="<?= $user['users.aim']; ?>"></p>
		<p><label>gtalk</label>    <input type="text" class="styled" name="gtalk"       value="<?= $user['users.gtalk']; ?>"></p>
		<p><label>zipcode</label>  <input type="text" class="styled" name="zipcodes_id" value="<?= $user['users.zipcodes_id']; ?>"></p>

		<h1>Freeform</h1>

		<textarea name="profile" class="styled" style="width: 100%; height: 300px"><?= $this->Sanitize->brtonl($user['users.profile']); ?></textarea>
		<p><input type="image" src="images/button_save.gif"></p>
	</form>
</div>

<? $Gator->display("components/footer"); ?>