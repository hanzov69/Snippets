Glossary:

"Gator"       the gator engine
"Application" your application, built on top of the Gator engine
"Class"       a PHP class, standard definition
"Interface"   also a PHP class, but Gator expects certain things of it
"Page"        a gator "webpage" accessible via ?p=PAGENAME
"Template"    HTML/PHP file

/gator/ is the Gator engine. You only need one install per box
/app/   is an application directory, and can be renamed to anything
/www/   is the webroot

Application flow:

/www/index.php

	- Specify the path to Gator
	- Specify the path to your application 

	- Your application's configuration is loaded
	- Gator's configuration is loaded

	- Run /gator/startup.php

/gator/startup.php

	- Load all Gator functions
	- Load all application functions
	
	- Connect to database
	
	- Load all Gator classes
	- Load all Gator interfaces
	
	- Create the $Gator object. $Gator is a reserved keyword, and is important
	
	- session_start()
	
	- Create the $Users object
	
	- Run /app/startup.php
	
	- Run whatever page has been requested
	
	- Run /app/teardown.php
	
	- Close database link