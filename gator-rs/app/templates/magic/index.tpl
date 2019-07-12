<? $Gator->display("components/header", array('title'  => '')); ?>

<?= $magic; ?>

<? if ($_SESSION['id'] == $_GET['id']) : ?>

	<form method="POST" action="?p=magic&id=<?= $_SESSION['id']; ?>&c=save">
		<h1>ONLY 4 <?= $_SESSION['username']; ?></h1>

		<textarea style="width: 100%; height: 600px" name="magic"><?= $magic; ?></textarea><br>
		<input type="submit" value="MAGIC!">
	</form>

<? endif; ?>

<? $Gator->display("components/footer"); ?>