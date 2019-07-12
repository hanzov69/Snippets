<?

// _________________________________________________________________________
//
// quote_smart
// _________________________________________________________________________

function quote_smart ($value) {
	if (get_magic_quotes_gpc()) {
		$value = stripslashes($value);
		}
	if (!is_numeric($value)  || $value[0] == '0') {
		$value = "'" . mysql_real_escape_string($value) . "'";
		}

	return $value;
	}

// _________________________________________________________________________
//
// lock_to_users
// _________________________________________________________________________

function lock_to_users() {
	global $Gator;
	if (!$_SESSION['id']) {
		$Gator->redirect('home');
		exit;
		}
	}
?>