<? $Gator->display("components/header"); ?>

<h1>RS Radio</h1>

RS Radio is powered by a SHOUTcast server installed on the same box as the website. To <a href="http://robotskull.com:8000/listen.pls">tune in</a>, you will need Winamp or iTunes or some other media player that supports streaming audio.

<div id="radio_listeners">
	<h1>Listeners</h1>
	<? if (!empty($listeners)) : ?>
		<? foreach ($listeners as $user) : ?>
			<li><a href="?p=jerk&id=<?= $user['id'] ;?>"><?= $user['username'] ;?></a>
		<? endforeach; ?>
	<? endif; ?>
</div>
<div id="radio_songs">
	<h1>Songs</h1>
	<? if (!empty($songs)) : ?>
		<? foreach ($songs as $song) : ?>
			<li><?= $song; ?>
		<? endforeach; ?>
	<? endif; ?>
</div>

<h1>Broadcasting</h1>

To broadcast, you must somehow send an audio stream to the SHOUTcast server. The easiest way to do this is with any media player plugin specifically built for SHOUTcast, but if you want to figure something fancier out, go ahead and try.

<h2>Broadcasting requirements</h2>

Configure your application to broadcast to robotskull.com:8000, using the password baconh8tor. Please broadcast at 24kbsp and no higher. This may change as we experiment more. To make the website recognize you as the DJ, set the AIM field to your RS username. Configure your reconnection timeout to a value greater than 10 seconds.

<p>

Only one DJ can broadcast at a time. If the current DJ is away from his computer and running an automated playlist, <a href="http://admin:baconh8tor@robotskull.com:8000/admin.cgi?mode=kicksrc">click here</a> to disconnect him. You will need to connect to the stream before his auto-reconnect kicks in (the aforementioned 10 seconds).

<h2>PC Broadcasting</h2>

With Winamp, use <a href="http://www.shoutcast.com/download/broadcast.phtml#plugdownload">Winamp SHOUTcast DSP Plugin</a>.

<h2>Mac Broadcasting</h2>

If anyone knows, lemme know.

<h1>Playlists</h1>

You can set up a playlist and run it while away from your computer. In fact, it is preferable that <i>someone</i> does this every day. A <b>randomized</b> (not alphabetical) playlist of your entire library is acceptable. <b>Please</b> make sure your auto-reconnect setting is at least 10 seconds, so someone can kick you if they want to broadcast live or start their playlist. When running an automated playlist, either set your AIM field to Skullbot or mark in your profile that you are afk.

<? $Gator->display("components/footer"); ?>