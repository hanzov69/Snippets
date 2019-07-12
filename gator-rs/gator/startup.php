<?

// =========================================================================
// require_dir() - Helper function. Safe to use elsewhere.
// =========================================================================

function require_dir ($dir) {
	if ($handle = opendir($dir)) {
		while (false !== ($file = readdir($handle))) {
			if (strstr($file, "php")) {
				require_once($dir . "/" . "$file");
				}
			}
		closedir($handle);
		}
	}

// =========================================================================
// Starting Gator
// =========================================================================

// _________________________________________________________________________
//
// Load global functions
// _________________________________________________________________________

require_dir(GATOR_FUNCTIONS);
require_dir(APP_FUNCTIONS);

// _________________________________________________________________________
//
// Initialize MySQL connection
// _________________________________________________________________________

mysql_connect(DB_SERVER, DB_USER, DB_PASS);
mysql_select_db(DB_DATABASE);

// _________________________________________________________________________
//
// Load Gator Classes and Interfaces
// _________________________________________________________________________

require_dir(GATOR_CLASSES);
require_dir(GATOR_INTERFACES);

// _________________________________________________________________________
//
// Create Gator object
// _________________________________________________________________________

$Gator = new Gator;

// _________________________________________________________________________
//
// Session start
// _________________________________________________________________________

session_start();

// _________________________________________________________________________
//
// Create Users object (if needed)
// _________________________________________________________________________

if (!$Users) {
	$Users = use_interface('GatorUsers');
	}

// _________________________________________________________________________
//
// Execute the application`s startup script
// _________________________________________________________________________

if (file_exists(PATH_APP . DIRSEP . "startup.php")) {
	require_once(PATH_APP . DIRSEP . "startup.php");
	}

// _________________________________________________________________________
//
// Execute the requested page
// _________________________________________________________________________

if (file_exists(APP_PAGES . DIRSEP . $Gator->p . ".php")) {
	require_once (APP_PAGES . DIRSEP . $Gator->p . ".php");
	}
else if (file_exists(GATOR_PAGES . DIRSEP . $Gator->p . ".php")) {
	require_once (GATOR_PAGES . DIRSEP . $Gator->p . ".php");
	}
else if (file_exists(APP_TEMPLATES . DIRSEP . $Gator->p . DIRSEP . $Gator->c . ".tpl")) {
	$Gator->Display($Gator->p. DIRSEP . $Gator->c);
	}
else if (file_exists(GATOR_TEMPLATES . DIRSEP . $Gator->p . DIRSEP . $Gator->c . ".tpl")) {
	$Gator->Display($Gator->p. DIRSEP . $Gator->c);
	}
else if (file_exists(APP_PAGES . DIRSEP . DEFAULT_HOME . ".php")) {
	require_once (APP_PAGES . DIRSEP . DEFAULT_HOME . ".php");
	}

// _________________________________________________________________________
//
// Execute the application's teardown script
// _________________________________________________________________________

if (file_exists(APP_SCRIPTS . DIRSEP . "teardown.php")) {
	require_once(APP_SCRIPTS . DIRSEP . "teardown.php");
	}

// _________________________________________________________________________
//
// Close MySQL connection
// _________________________________________________________________________

mysql_close();

?>