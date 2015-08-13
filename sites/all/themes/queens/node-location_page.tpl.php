<?php
// $Id: node.tpl.php,v 1.4 2007/08/07 08:39:36 goba Exp $
?>
<?php if($node->field_internal_image[0]['filepath']): ?>
	<div id="internal-image"><?php print theme('imagecache', 'internal_image', $node->field_internal_image[0]['filepath'], $node->field_internal_image[0]['data']['alt'], $node->field_internal_image[0]['data']['title']) ?></div>
<?php endif; ?>
<div id="event-body">
	<div id="event-title">
		<h1><?php print $node->title ?></h1>
	</div>
	<div id="event-share">
		<!-- AddThis Button BEGIN -->
		<div class="addthis_toolbox addthis_default_style ">
			<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
			<a class="addthis_button_tweet"></a>
			<a class="addthis_counter addthis_pill_style"></a>
		</div>
		<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4ddd07af51706810"></script>
		<!-- AddThis Button END -->
	</div>
	<div id="internal-body-text">
		<?php if($node->location['latitude']!=0): ?>
			<div id="location-map">
				<?php
				  // "Geo" microformat, see http://microformats.org/wiki/geo
				  if($node->location['latitude'] && $node->location['longitude']) {
					 // Assume that 0, 0 is invalid.
					 if($node->location['latitude'] != 0 || $node->location['longitude'] != 0) {
						$marker = 'Whatever you want the marker to be.';
						print gmap_simple_map($node->location['latitude'], $node->location['longitude'], '', '', 15, '286px', '197px', false, '');
					 }
				  }
				?>
			</div>
		<?php endif ?>
		<?php print $node->body ?>
	</div>
	<?php if($node->field_bottom_button[0]['title']): ?>
		<a id="bottom-button-link" href="<?php print $node->field_bottom_button[0]['url'] ?>" target="<?php print $node->field_bottom_button[0]['attributes']['target'] ?>"><span id="bottom-button"><?php print $node->field_bottom_button[0]['title'] ?></span></a>
	<?php endif; ?>
</div>