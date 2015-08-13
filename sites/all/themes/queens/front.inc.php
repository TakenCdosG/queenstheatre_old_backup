<div id="body-slideshow">
	<div id="body-slideshow-image" data-auto="1">
		<?php print $slideshow ?>
	</div>
</div>
<div id="body-content">
	<div id="body-content-top">
		<div id="bucket-wrapper">
			<?php print $buckets ?>
		</div>
		<?php /*
		<div id="mini-calendar">
			<?php print $left ?>
		</div>
		 */ ?> 
	</div>
	<div id="body-content-bottom-left">
		<div id="body-content-bottom-left-actions">
			<?php if($node->field_front_call_1_1[0]['value'] or $node->field_front_call_1_2[0]['value']): ?>
				<div class="call-to-action action-1">
					<a href="<?php print $node->field_front_call_1_url[0]['value'] ?>">
						<?php if($node->field_front_call_1_1[0]['value']) print '<span class="call-to-action-part-1">'.$node->field_front_call_1_1[0]['value'].'</span>' ?>
						<?php if($node->field_front_call_1_2[0]['value']) print '<span class="call-to-action-part-2">'.$node->field_front_call_1_2[0]['value'].'</span>' ?>
					</a>
				</div>
			<?php endif; ?>
			<?php if($node->field_front_call_2_1[0]['value'] or $node->field_front_call_2_2[0]['value']): ?>
				<div class="call-to-action action-2">
					<a href="<?php print $node->field_front_call_2_url[0]['value'] ?>">
						<?php if($node->field_front_call_2_1[0]['value']) print '<span class="call-to-action-part-1">'.$node->field_front_call_2_1[0]['value'].'</span>' ?>
						<?php if($node->field_front_call_2_2[0]['value']) print '<span class="call-to-action-part-2">'.$node->field_front_call_2_2[0]['value'].'</span>' ?>
					</a>
				</div>
			<?php endif; ?>
			<?php if($node->field_front_call_3_1[0]['value'] or $node->field_front_call_3_2[0]['value']): ?>
				<div class="call-to-action action-3">
					<a href="<?php print $node->field_front_call_3_url[0]['value'] ?>">
						<?php if($node->field_front_call_3_1[0]['value']) print '<span class="call-to-action-part-1">'.$node->field_front_call_3_1[0]['value'].'</span>' ?>
						<?php if($node->field_front_call_3_2[0]['value']) print '<span class="call-to-action-part-2">'.$node->field_front_call_3_2[0]['value'].'</span>' ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
		<div id="body-content-bottom-left-social">
			<span id="social-fb"><a href="https://www.facebook.com/queenstheatrenyc" target="_blank"><?php print theme('image', path_to_theme()."/images/fb.png") ?></a></span>
			<span id="social-tw"><a href="http://twitter.com/#!/qt_queens" target="_blank"><?php print theme('image', path_to_theme()."/images/tw.png") ?></a></span>
			<span id="social-li"><a href="http://www.linkedin.com/company/1484972?trk=tyah" target="_blank"><?php print theme('image', path_to_theme()."/images/li.png") ?></a></span>
			<span id="social-yt"><a href="http://www.youtube.com/user/QTPNYC" target="_blank"><?php print theme('image', path_to_theme()."/images/yt.png") ?></a></span>
			<!--<span id="social-nl"><a href="javascript:newWin=window.open('http://www.patronmail.com/pmailweb/PatronSetup?oid=347','patron_signup','height=500,width=640,scrollBars=1,resizable=0');newWin.focus();"><?php //print theme('image', path_to_theme()."/images/newsletter-button.png") ?></a></span>-->
		</div>
	</div>
	<div id="body-content-bottom-right">
		<h1><?php print $node->title ?></h1>
		<?php print $node->body ?>
	</div>
</div>
<?php print $content ?>