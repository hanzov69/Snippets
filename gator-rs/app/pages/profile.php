<?

lock_to_users();

switch ($Gator->c) {
	case "save" :

	$data['name']     = $Gator->Sanitize->paranoid($_POST['name']);
	if ($_POST['birthday'] != '0000-00-00') {
		$data['birthday'] = $Gator->Sanitize->paranoid($_POST['birthday'], array("-"));
		}

	if (($Gator->Sanitize->is_email_address($_POST['email']) == 1) || ($_POST['email'] == '')) {
		$data['email']    = $_POST['email'];
		}

	$data['phone'] = $Gator->Sanitize->paranoid($_POST['phone'], array("-", " ", "(", ")"));
	$data['aim']   = $Gator->Sanitize->paranoid($_POST['aim'], array(" "));

	if (($Gator->Sanitize->is_email_address($_POST['gtalk']) == 1) || ($_POST['gtalk'] == '')) {
		$data['gtalk']    = $_POST['gtalk'];
		}

	if (is_numeric($_POST['zipcodes_id'])) {
		$data['zipcodes_id']    = $_POST['zipcodes_id'];
		}

	$data['profile'] = $Gator->Sanitize->nltobr($_POST['profile']);

	$Users->Save($_SESSION['id'], $data);

	$Gator->redirect('profile');

	break;

	default :

	$Users->qCriteria('id', '=', $_SESSION['id']);
	$user = array_first($Users->GetArray());

	$Gator->Set('user', $user);

	$Gator->display();

	break;
	}

?>