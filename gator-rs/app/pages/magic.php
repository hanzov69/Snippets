<?

switch ($Gator->c) {
	case 'save' :

	if ($_SESSION['id'] == $_GET['id']) {
		$data['magic'] = $_POST['magic'];
		$Users->Save($_SESSION['id'], $data);
		}

	$Gator->Redirect("magic&id=" . $_SESSION['id']);

	break;

	default :

	$magic = $Users->Get($_GET['id']);
	$magic = $magic['users'][$_GET['id']]['magic'];

	$Gator->Set('magic', $magic);

	$Gator->display();

	break;
	}

?>