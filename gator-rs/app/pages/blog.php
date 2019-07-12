<?

$Blogs = use_interface('blogs');

switch ($Gator->c) {
	default :

	$Blogs->qLimit("10");
	$Blogs->qJoin('users');
	$Blogs->qOrder('id DESC');

	$blogs = $Blogs->GetArray();

	$Gator->Set('blogs', $blogs);

	$Gator->display();

	break;
	}

?>