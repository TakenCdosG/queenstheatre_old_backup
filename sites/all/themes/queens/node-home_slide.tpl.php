<?php
// $Id: node.tpl.php,v 1.4 2007/08/07 08:39:36 goba Exp $
?>
<div class="slides">
	<?php if($node->field_slide_link[0]['display_url']): ?>
	<div><a href="<?php print $node->field_slide_link[0]['display_url'] ?>" ><?php print theme('imagecache', 'home_slide', $node->field_slide_image[0]['filepath'], $node->field_slide_image[0]['data']['alt'], $node->field_slide_image[0]['data']['title']) ?></a></div>
	<?php else: ?>
	<?php print theme('imagecache', 'home_slide', $node->field_slide_image[0]['filepath'], $node->field_slide_image[0]['data']['alt'], $node->field_slide_image[0]['data']['title']) ?>
	<?php endif; ?>
	<div class="slides-text <?php print $node->field_slide_color[0]['value'] ?>"><?php print $node->field_slide_text[0]['value'] ?></div>
	<div class="slides-link">
		<?php if($node->field_slide_link[0]['title']): ?>
			<span class="<?php print $node->field_slide_color[0]['value'] ?>"><a href="<?php print $node->field_slide_link[0]['display_url'] ?>"><?php print $node->field_slide_link[0]['title'] ?></a></span>
		<?php endif; ?>
		
	</div>
</div> 