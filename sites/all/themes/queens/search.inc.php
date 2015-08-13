<div id="search-left">
	<div><?php print $sub_menu ?></div>
	<?php if($node->field_event_mini_widgets[0]['nid']): ?>
		<div id="mini-widgets"><?php print $mini_widgets ?></div>
	<?php endif ?>
	<?php if($node->field_event_standard_widgets[0]['nid']): ?>
		<div id="standard-widgets"><?php print $standard_widgets ?></div>
	<?php endif; ?>
</div>
<div id="search-right">
	<div id="internal-breadcrumb">
		<?php print $breadcrumb ?>
	</div>
	<div id="internal-body">
		<?php if($node->type == 'site_map') print '<h1 class="site-map-title">Site Map</h1>'.$site_map ?>
		<?php print $content ?>
	</div>
</div>