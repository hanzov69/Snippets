<?

// ______________________________________________
//
// ROBOTSKULL
// © SAMN 2007, All rights reserved
//
// Samn Gidusko
// hi.samn@gmail.com
// ______________________________________________

// _________________________________________________________________________
//
// Locate the application, Gator, and the webroot
// _________________________________________________________________________

define("PATH_APP",   "../app");
define("PATH_GATOR", "../gator");
define("PATH_WEB",   "../www");

// _________________________________________________________________________
//
// Load configuration and run the Gator startup script
// _________________________________________________________________________

require_once (PATH_APP   . "/config.php");
require_once (PATH_GATOR . "/config.php");

require_once (PATH_GATOR . DIRSEP . "startup.php");

?>
