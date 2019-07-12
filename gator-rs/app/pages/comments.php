<?

lock_to_users();

$Comments = use_interface('comments');

switch ($Gator->c) {
	case 'comment' :

	if ($_POST['comment'] != '') {
		$data['type']     = $_POST['type'];
		$data['resource'] = $_POST['resource'];
		$data['users_id'] = $_SESSION['id'];
		$data['text']     = $Gator->Sanitize->html($_POST['comment']);

		$data['time']     = date("Y-m-d G:i:s");

		if (ereg('^\@([0-9]*) ', $data['text'])) {
			list($reply, $data['text']) = split(' ', $data['text'], 2);
			$reply = str_replace("@", "", $reply);
			$data['reply'] = $reply;
			}

		$msg = $data['text'];

		$Comments->SaveNew($data);
		}

	$Gator->Redirect(str_replace('p=', '', $_POST['return']));
	}
?>