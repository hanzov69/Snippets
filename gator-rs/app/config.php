<?

// =========================================================================
// Application Configuration
// =========================================================================

// _________________________________________________________________________
//
// Database configuration
// _________________________________________________________________________

if (is_dir("C:/xampp")) define("SERVER", "dev");
else define("SERVER", "prod");

if (SERVER == "dev") {
	// Development environment details

	define("DB_SERVER",     "localhost");
	define("DB_USER",       "root");
	define("DB_PASS",       "");
	define("DB_DATABASE",   "robotskull");
	}
else if (SERVER == "prod") {
	// Production environment details

	define("DB_SERVER",     "localhost");
	define("DB_USER",       "");
	define("DB_PASS",       "");
	define("DB_DATABASE",   "robotskull");
	}

define("TBL_PREFIX", "");

// _________________________________________________________________________
//
// File system configuration
// _________________________________________________________________________

define("DIRSEP",	 "/");

define("APP_CLASSES",    PATH_APP . DIRSEP . "classes");
define("APP_CONFIG",     PATH_APP . DIRSEP . "config");
define("APP_DATA",       PATH_APP . DIRSEP . "data");
define("APP_FUNCTIONS",  PATH_APP . DIRSEP . "functions");
define("APP_INTERFACES", PATH_APP . DIRSEP . "interfaces");
define("APP_PAGES",      PATH_APP . DIRSEP . "pages");
define("APP_SCRIPTS",    PATH_APP . DIRSEP . "scripts");
define("APP_TEMPLATES",  PATH_APP . DIRSEP . "templates");

// _________________________________________________________________________
//
// Extended file system configuration
// _________________________________________________________________________

define("APP_AVATARS",         PATH_WEB . DIRSEP . "images" . DIRSEP . "avatars");
define("APP_PROFILEPICS",     PATH_WEB . DIRSEP . "images" . DIRSEP . "profile");
define("APP_PROFILEPICS_TN1", PATH_WEB . DIRSEP . "images" . DIRSEP . "profile"  . DIRSEP . "small");
define("APP_PROFILEPICS_TN2", PATH_WEB . DIRSEP . "images" . DIRSEP . "profile"  . DIRSEP . "medium");

define("WEB_AVATARS",         "images/avatars");
define("WEB_PROFILEPICS",     "images/profile");
define("WEB_PROFILEPICS_TN1", "images/profile/small");
define("WEB_PROFILEPICS_TN2", "images/profile/medium");

define("RADIO_USERNAME",  "admin");
define("RADIO_PASSWORD",  "baconh8tor");

// _________________________________________________________________________
//
// Miscellaneous constants
// _________________________________________________________________________

define("DEFAULT_404",  "404");
define("DEFAULT_HOME", "home");

?>