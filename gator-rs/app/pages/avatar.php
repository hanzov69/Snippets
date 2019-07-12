<?

lock_to_users();

switch ($Gator->c) {
	case 'upload' :

	$file = $_FILES['uploadedfile']['tmp_name'];
	$file_info = getimagesize($file);

	if (($file_info[0] != 40) || ($file_info[1] != 55) || ($file_info['mime'] != 'image/gif')) {
		$Gator->Redirect('avatar&a=1');
		}
	else if ($_SESSION['id']) {
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], APP_AVATARS . DIRSEP . $_SESSION['id'] . ".gif")) {
			$Gator->Redirect('avatar');
			}
		else{
			$Gator->Redirect('avatar&a=2');
			}
		}

	break;

	default :

	$Gator->display();

	break;
	}

?>