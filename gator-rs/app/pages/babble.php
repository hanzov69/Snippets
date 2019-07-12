<?

lock_to_users();

$Babble = use_interface('babble');

switch ($Gator->c) {
	case 'babble' :

	if ($_POST['babble'] != '') {
		$data['users_id'] = $_SESSION['id'];
		$data['text'] = $Gator->Sanitize->html($_POST['babble']);

		if ($_POST['oh']) {
			$data['text']     = ereg_replace('(a|e|i|o|u)', 'o', $data['text']);
			$data['text']     = ereg_replace('(A|E|I|O|U)', 'O', $data['text']);
			}

		//$data['text'] = preg_replace("!<pokey>(.*)</pokey>!", strtoupper("<b><u><s>".$1."</b></u></s>"), $data['text']);

		$data['url']      = $_POST['url'];
		$data['title']    = $_POST['title'];
		$data['time']     = date("Y-m-d G:i:s");

		if (ereg('^\@([0-9]*) ', $data['text'])) {
			list($reply, $data['text']) = split(' ', $data['text'], 2);
			$data['reply'] = str_replace("@", "", $reply);
			}

		$msg = $data['text'];

		if (strpos($data['text'], "/topic") === 0) {
			$topic = substr(str_replace("/topic ", "", $data['text']), 0, 70);
			$Gator->Registry->Set('bab_topic', $topic);
			$Gator->Registry->Set('bab_topicu', $_SESSION['username']);
			}
		else {
			$Babble->SaveNew($data);

			if (stristr($data['text'], "man up")) {
				// Sizzle
				$data['users_id'] = 17;
				$data['text']     = "Man up? " . $Babble->Sizzle();
				$data['time']     = date("Y-m-d G:i:s");

				$Babble->SaveNew($data);

				$data = array();
				$data['time_last_seen'] = date("Y-m-d G:i:s");
				$Users->Save(17, $data);
				}
			else if (stristr($data['text'], "skullbot")) {
				// Skullbot
				$msg = str_ireplace("skullbot", "", $msg);
				$data['users_id'] = 7;
				$data['text']     = $Babble->Skullbot($msg);
				$data['time']     = date("Y-m-d G:i:s");

				$Babble->SaveNew($data);

				$data = array();
				$data['time_last_seen'] = date("Y-m-d G:i:s");
				$Users->Save(7, $data);
				}
			else if (stristr($data['text'], "baconator")) {
				// Baconator
				$data['users_id'] = 56;
				$data['text']     = $Babble->Baconator();
				$data['time']     = date("Y-m-d G:i:s");

				$Babble->SaveNew($data);

				$data = array();
				$data['time_last_seen'] = date("Y-m-d G:i:s");
				$Users->Save(56, $data);
				}
			}
		}

	$Gator->Redirect('babble');

	break;

	case 'fuck' :

	if (($_GET['id']) && ($_SESSION['admin'] == 1)) {
		$data['fucked'] = 1;

		$this_id = $Gator->Sanitize->paranoid($_GET['id']);
		$Babble->Save($this_id, $data);
		}

	$Gator->Redirect('babble');

	break;

	default :

	$Babble->qLimit("70");
	$Babble->qJoin('users', array('id', 'username'));
	$Babble->qOrder('id DESC');

	$babble = $Babble->GetArray();

	$Gator->Set('babble', $babble);
	$Gator->Set('topic_text', $Gator->Registry->bab_topic);
	$Gator->Set('topic_user', $Gator->Registry->bab_topicu);
	$Gator->display();

	$keys = array_keys($babble);

	$data['babble'] = $keys[0];
	$Users->Save($_SESSION['id'], $data);

	break;
	}

?>