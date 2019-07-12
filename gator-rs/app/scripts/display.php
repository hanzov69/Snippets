<?

global $Users;

$Users->qCriteria("time_last_seen", ">=", "(now() - INTERVAL 30 SECOND)", 0);
$users_online = $Users->Get();

$Gator->Set('users_online', $users_online['users']);

if (SERVER == 'prod') {
	$Radio = use_interface('shoutcast');

	$rs_radio = $Radio->stats();
	$this->Set('rs_radio', $rs_radio);
	}

?>