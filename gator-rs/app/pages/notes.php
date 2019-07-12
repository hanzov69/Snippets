<?

lock_to_users();

$Notes = use_interface('notes');

switch ($Gator->c) {
	case 'save' :

	$Users->qCriteria('username', '=', $_POST['to']);
	$id = $Users->Get();
	$id = array_first($id);
	$id = array_first($id);
	$id = $id['id'];

	if ($_POST['text'] != '') {
		if (is_numeric($id)) {
			if ($id == 7) {
				$Registry = use_interface('registry');
				$Registry->Set('marquee', $Gator->Sanitize->html($_POST['text']));

				$Gator->Redirect('notes&c=close2');
				}
			else {
				$data['users_id']  = $_SESSION['id'];
				$data['rusers_id'] = $id;
				$data['text']      = $Gator->Sanitize->html($_POST['text']);
				$data['time']      = date("Y-m-d G:i:s");
				$Notes->SaveNew($data);

				$Gator->Redirect('notes&c=close');
				}
			}
		else {
			$Gator->Redirect('notes&c=send&username=' . $_POST['to'] . '&msg=' . $_POST['text'] . '&error=No such user');
			}
		}
	else {
		$Gator->Redirect('notes&c=send&username=' . $_POST['to'] . '&msg=' . $_POST['text'] . '&error=You are stupid');
		}



	break;

	case 'saved' :

	$data['saved'] = 1;

	$Notes->Save($_GET['id'], $data);

	$Gator->redirect('REFERER');

	break;

	case 'delete' :

	$data['deleted'] = 1;

	$Notes->Save($_GET['id'], $data);

	$Gator->redirect('REFERER');

	break;

	case 'send' :

	$Gator->display();

	break;

	case 'close' :

	$Gator->display();

	break;

	default :

	if ($_GET['f'] == 'sent') {
		$Notes->qCriteria("users_id", "=", $_SESSION['id']);
		$Notes->qJoin('users', array('id', 'username'), 'rusers_id');
		}
	else {
		$Notes->qCriteria("rusers_id", "=", $_SESSION['id']);
		$Notes->qJoin('users', array('id', 'username'));
		}

	$Notes->qCriteria("saved", "=", "1");
	$Notes->qCriteria("deleted", "<>", "1");

	$Notes->qOrder('id DESC');
	$notes = $Notes->GetArray();

	echo $Notes->query;

	$Gator->Set('notes', $notes);
	$Gator->Display();

	break;
	}

?>