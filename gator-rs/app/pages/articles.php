<?

$Articles = use_interface('articles');

switch ($Gator->c) {
	default :

	$Articles->qLimit("10");
	$Articles->qFields(array('id', 'title', 'content'));
	$Articles->qJoin('users', array('id', 'username'));
	$Articles->qOrder('id DESC');
	
	$articles = $Articles->GetArray();

	$Gator->Set('articles', $articles);

	$Gator->display();

	break;
	}

?>