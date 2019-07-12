<?

$Metapad = use_interface('metapad');

switch ($Gator->c) {
	case "edit" :
	
	$Gator->display();
	
	break;

	case "main" :
	
	$Gator->display();
	
	break;

	case "base" :
	
	$Gator->display();
	
	break;
	
	default :

	$Gator->display();

	break;
	}

?>