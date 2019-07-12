<?

lock_to_users();

switch ($Gator->c) {
	default :
	
	$Users->qOrder('username');
	$Users->qJoin('zipcodes');
	$users = $Users->Get();

	$Gator->set('users',    $users['users']);
	$Gator->set('location', $users['zipcodes']);
	$Gator->display();

	break;
	}

?>