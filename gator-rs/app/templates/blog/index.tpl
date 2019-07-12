<? $Gator->display("components/header", array('title'  => '')); ?>

<? $users    = $blogs['users']; ?>
<? $articles = $blogs['blogs']; ?>

<div id="art">
	<? foreach ($articles as $article) : ?>
		<div class="art">
			<div class="head">
				<div class="article_title">
					<h1><?= $article['title']; ?></h1>
				</div>
				<span class="user"><?= $users[$article['id']]['username']; ?></span> <span class="time"><?= $article['date']; ?></span>
			</div>
			<div class="body">
				<?= $article['content']; ?>
			</div>
		</div>
	<? endforeach; ?>
</div>

<? $Gator->display("components/footer"); ?>