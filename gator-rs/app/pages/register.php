<?

switch ($Gator->c) {
	case 'register' :
	
	if ($_POST['password'] != $_POST['password2']) {
		$Gator->Redirect('register&a=3');
		}
	elseif (($_POST['username'] == '') || ($_POST['password'] == '')) {
		$Gator->Redirect('register&a=2');
		}
	else {
		$Users = use_interface('Users');

		$data['username'] = $_POST['username'];
		$data['password'] = $_POST['password'];

		$data['time_first_seen'] = date("Y-m-d G:i:s");
		$data['time_last_seen']  = date("Y-m-d G:i:s");

		$data['a_str'] = mt_rand(3,18);
		$data['a_dex'] = mt_rand(3,18);
		$data['a_con'] = mt_rand(3,18);
		$data['a_int'] = mt_rand(3,18);
		$data['a_wis'] = mt_rand(3,18);
		$data['a_cha'] = mt_rand(3,18);

		$Users->qCriteria("username", "=", $_POST['username']);
		$test = $Users->Get();

		if (!empty($test)) {
			$Gator->Redirect('register&a=1');
			}
		else {
			$Users->SaveNew($data);
			$Users->login($data['username'], $data['password']);
			$Gator->Redirect('rules');
			}
		}

	break;

	default :

	$Gator->display();

	break;
	}

?>