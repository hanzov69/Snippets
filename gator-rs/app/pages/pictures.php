<?

lock_to_users();

switch ($Gator->c) {
	case "remove" :

	if ($_GET['id']) {
		list($filename, $extention) = split('\.', $_GET['id']);
		list($user, $part) = split("_", $filename);

		if (($user == $_SESSION['id']) && (is_numeric($part))) {
			unlink(APP_PROFILEPICS_TN1 . DIRSEP . $_GET['id']);
			unlink(APP_PROFILEPICS_TN2 . DIRSEP . $_GET['id']);
			unlink(APP_PROFILEPICS     . DIRSEP . $_GET['id']);
			}
		}

	$Gator->Redirect('pictures');

	break;

	case 'upload' :

	$file = $_FILES['uploadedfile']['tmp_name'];
	$file_info = getimagesize($file);

	if (($file_info['mime'] != 'image/jpeg') && ($file_info['mime'] != 'image/jpg') && ($file_info['mime'] != 'image/jpe')) {
		$Gator->Redirect('pictures&a=1');
		}
	else if ($_SESSION['id']) {
		$i = 1;

		while (file_exists (APP_PROFILEPICS . DIRSEP . $_SESSION['id'] . "_" . $i . ".jpg")) {
			$i++;
			}

		// Create a small thumbnail
		$width  = 50;
		$height = 50;

		list($width_orig, $height_orig) = getimagesize($file);

		$ratio_orig = $width_orig/$height_orig;

		if ($width/$height > $ratio_orig) { $width = $height*$ratio_orig; }
		else                              { $height = $width/$ratio_orig; }

		$image_p = imagecreatetruecolor($width, $height);
		$image = imagecreatefromjpeg($file);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
		imagejpeg($image_p, APP_PROFILEPICS_TN1 . DIRSEP . $_SESSION['id'] . "_" . $i . ".jpg", 90);

		// Create a medium thumbnail
		$width  = 300;
		$height = 300;

		list($width_orig, $height_orig) = getimagesize($file);

		$ratio_orig = $width_orig/$height_orig;

		if ($width/$height > $ratio_orig) { $width = $height*$ratio_orig; }
		else                              { $height = $width/$ratio_orig; }

		$image_p = imagecreatetruecolor($width, $height);
		$image = imagecreatefromjpeg($file);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
		imagejpeg($image_p, APP_PROFILEPICS_TN2 . DIRSEP . $_SESSION['id'] . "_" . $i . ".jpg", 90);

		// Store the fullsized picture

		$width  = 500;
		$height = 500;

		list($width_orig, $height_orig) = getimagesize($file);

		$ratio_orig = $width_orig/$height_orig;

		if ($width/$height > $ratio_orig) { $width = $height*$ratio_orig; }
		else                              { $height = $width/$ratio_orig; }

		$image_p = imagecreatetruecolor($width, $height);
		$image = imagecreatefromjpeg($file);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
		imagejpeg($image_p, APP_PROFILEPICS . DIRSEP . $_SESSION['id'] . "_" . $i . ".jpg", 90);

		$Gator->Redirect('pictures');
		}
	break;

	default :

	foreach (glob(APP_PROFILEPICS . DIRSEP . $_SESSION['id'] . "_*.jpg") as $filename) {
		$filename = str_replace(APP_PROFILEPICS . DIRSEP, "", $filename);
		echo $filename;

		$pictures[] = $filename;
		}

	$Gator->Set('pictures', $pictures);
	$Gator->display();

	break;
	}

?>