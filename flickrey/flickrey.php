<?php
//v0.2
//flickr stuff
require "flickr_lib.php";
$user_id = "YOUR FLICKR USER ID";
$flickr_urls = array();

flickr_get_user_photo_urls($user_id, $flickr_urls);
$random_image = array_rand($flickr_urls);

$bfile = $flickr_urls[$random_image]['static'];

//image overlay
$ofile = ('border.png');

$bimage = imagecreatefromjpeg($bfile);
$oimage = imagecreatefrompng($ofile);

// Content type
header('Content-type: image/jpeg');

// Get dimensions
list($bwidth, $bheight) = getimagesize($bfile);
list($owidth, $oheight) = getimagesize($ofile);

$cropleft = ($bwidth/2) - ($owidth*2.5);

// Generate the scaledimage
$smash = imagecreatetruecolor($owidth, $oheight);
imagecopyresampled($smash, $bimage, $cropleft, 260, 0, 0, $bwidth, $bheight, $bwidth, $bheight);

imagecopy($smash, $oimage, 0, 0, 0, 0, $owidth, $oheight);

// Output
imagejpeg($smash, null, 100);

?>
