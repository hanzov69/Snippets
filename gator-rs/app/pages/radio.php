<?

switch ($Gator->c) {
	default :

	$Shoutcast = use_interface('shoutcast');

	$Gator->Set('listeners', $Shoutcast->get_listeners());
	$Gator->Set('songs',     $Shoutcast->get_songs());

	$Gator->display();

	break;
	}

?>