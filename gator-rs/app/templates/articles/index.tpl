<? $Gator->display("components/header", array('title'  => '')); ?>

<div id="art">
	<? foreach ($articles as $article) : ?>
		<div class="art">
			<div class="head">
				<div class="article_title">
					<h1><?= $article['articles.title']; ?></h1>
				</div>
				<span class="user"><?= $article['users.username']; ?></span> <span class="time"><?= $article['article.date']; ?></span>
			</div>
			<div class="body">
				<?= $article['articles.content']; ?>
			</div>
		</div>
	<? endforeach; ?>
</div>

<? $Gator->display("components/footer"); ?>