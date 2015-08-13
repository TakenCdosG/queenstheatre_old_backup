<div id="internal-left">
	<div id="internal-left-menu"><?php print $sub_menu ?></div>
	<?php if($node->field_event_mini_widgets[0]['nid']): ?>
		<div id="mini-widgets"><?php print $mini_widgets ?></div>
	<?php endif ?>
	<?php if($node->field_event_standard_widgets[0]['nid']): ?>
		<div id="standard-widgets"><?php print $standard_widgets ?></div>
	<?php endif; ?>
	<div id="internal-left-social">
		<div>
			<span id="internal-social-fb"><a href="https://www.facebook.com/queenstheatrenyc" target="_blank"><?php print theme('image', path_to_theme()."/images/fb.png") ?></a></span>
			<span id="internal-social-tw"><a href="http://twitter.com/#!/qt_queens" target="_blank"><?php print theme('image', path_to_theme()."/images/tw.png") ?></a></span>
			<span id="internal-social-li"><a href="http://www.linkedin.com/company/1484972?trk=tyah" target="_blank"><?php print theme('image', path_to_theme()."/images/li.png") ?></a></span>
			<span id="internal-social-yt"><a href="http://www.youtube.com/user/QTPNYC" target="_blank"><?php print theme('image', path_to_theme()."/images/yt.png") ?></a></span>
		</div>
		<div>
			<span id="internal-social-nl"><a href="javascript:newWin=window.open('http://www.patronmail.com/pmailweb/PatronSetup?oid=347','patron_signup','height=500,width=640,scrollBars=1,resizable=0');newWin.focus();"><?php print theme('image', path_to_theme()."/images/internal-newsletter-button.png") ?></a></span>
		</div>
	</div>
</div>
<div id="internal-right">
	<div id="internal-breadcrumb">
		<?php print $breadcrumb ?>
	</div>
	<div id="internal-body">
		<?php print $content ?>
	</div>
</div>