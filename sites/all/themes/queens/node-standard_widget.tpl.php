<?php
// $Id: node.tpl.php,v 1.4 2007/08/07 08:39:36 goba Exp $
?>
<?php if($node->field_standard_image[0]['filepath']): ?>
<div class="standard-widget-images">
	<?php print theme('imagecache', 'standard_widget', $node->field_standard_image[0]['filepath'], $node->field_standard_image[0]['data']['alt'], $node->field_standard_image[0]['data']['title']) ?>
</div>
<?php endif; ?>
<div class="standard-widget-text">
	<?php print $node->body ?>
</div>