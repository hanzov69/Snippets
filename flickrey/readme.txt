Flickrey style for Logahead CMS
+-----------------------------+
About:
This is a hack to the "greenery" style.
Greenery was originally a template created by Pat Heard, ported to logahead by Klaus Schlichter.

The flickr PHP lib was created by Chris Eberly, see flickr_lib.php for more info.

Warranties/Support:
There is absolutely no warranty or claim of functionality in this code.
It's completely dangerous to even think about using it, and the author recommends that you just skip it. Seriously, if you have a problem, don't contact me, I told you not to use it.

Requirements:
php with lib_gd (2.0+)
a flickr account
a flickr API key

If you are missing any of these components, get them.

Usage:
Edit flickr_lib.php to include your Flickr API key.
Edit flickr_lib.php to choose your random 'pool' size.
Edit flickrey.php to include your Flickr User ID.
Copy "greenery" to a new directory called "flickrey"
Copy all these files to your "flickrey" directory.
Change your style to "flickrey".
Die happy.

Version History:
v0.2 Added support for the per_page argument found in Flickr API to flickr_lib.php
Change value in flickr_lib.php to select pool size, default is 500 (largest)
	http://www.flickr.com/services/api/flickr.people.getPublicPhotos.html

v0.1 Initial release
