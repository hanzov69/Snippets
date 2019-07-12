<?

switch ($Gator->c) {
	case 'ping' :

	print_r($_SESSION);

	break;

	case 'login' :

	if ($Users->login($_POST['username'], $_POST['password'])) {
		$Gator->redirect('home');
		}
	else  {
		$Gator->redirect('home&a=1');
		}

	break;

	case 'logout' :

	$Users->Logout();

	$Gator->redirect('home');

	break;

	default :
	
	$Gator->Redirect('home');

	break;
	}

?>