<link media="screen" rel="stylesheet" type="text/css" href="css/screen.css" />

<? $boxcount = 3; ?>

<script type="text/javascript" src="js/metapad.js"></script>

<script type="text/javascript">
	function make_editable () {
		var container = $('containment');

		<? for ($i = 1; $i <= $boxcount; $i++) : ?>
			newbox = new Drag.Move('box<?= $i; ?>', {'container': container, 'handle': $('han<?= $i; ?>')});
			//newbox.addEvent('onComplete', function() { alert(newbox) });
		<? endfor; ?>

		var all_boxes   = $$('.box');
		var all_handles = $$('.han');

		all_boxes.each(function(element) {
			element.makeResizable( { limit: {x: [50, 600], y: [50, 600] }, grid: 50});
			element.addEvent('click',     function() { raisez(element); });
			element.addEvent('mouseover', function() { element.addClass('edit'); });
			element.addEvent('mouseout',  function() { element.removeClass('edit'); });
			});

		all_handles.each(function(element) {
			element.removeClass('hide');
			});

		}
</script>

<style>

<? for ($i = 1; $i <= $boxcount; $i++) : ?>
	#box<?= $i; ?> { height: 100px; width: 100px; position: absolute; top: <?= rand(1,600); ?>; left: <?= rand(1,600); ?>; }
<? endfor; ?>

.edit	{ border: 1px solid #7A8A94; padding: 0; }
.box	{ color: #fff;  }
</style>

<div id="mtp">
	<div id="header">
		<a href="javascript: make_editable()">Edit</a> <a href="">Lock</a>
	</div>

	<div id="containment">
		<? for ($i = 1; $i <= $boxcount; $i++) : ?>
			<div id="box<?= $i; ?>" class="box">
				<div id="han<?= $i; ?>" class="han hide"><img src="images/icon_handle.gif"></div>
				<? if (rand(1,2) == 1) : ?>
					<img src="images/avatars/<?= rand(1,50); ?>.gif">

				<? else : ?>
					This is box <?= $i; ?>
				<? endif; ?>
			</div>
		<? endfor; ?>
	</div>
</div>
