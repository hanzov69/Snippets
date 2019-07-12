<?

lock_to_users();

$Comments = use_interface('comments');

switch ($Gator->c) {
	default :

	$Comments->qType('1');
	$Comments->qResource($_GET['id']);
	$Comments->qOrder("id DESC");
	$Comments->qLimit("20");
	$Comments->qJoin('users', array('id', 'username'));

	$comments = $Comments->GetArray();

	$Users->qJoin('zipcodes');
	$Users->qCriteria("id", "=", $_GET['id']);

	$user = $Users->GetArray();
	$user = $user[$_GET['id']];

	$i = 0;

	foreach (glob(APP_PROFILEPICS . DIRSEP . $user['users.id'] . "_*.jpg") as $filename) {
		$pictures[$i++] = str_replace(APP_PROFILEPICS . DIRSEP, "", $filename);
		}

	$Gator->Set('pictures', $pictures);
	$Gator->Set('comments', $comments);
	$Gator->Set('user',     $user);
	$Gator->Set('location', $location);

	$Gator->display();

	break;
	}

?>
