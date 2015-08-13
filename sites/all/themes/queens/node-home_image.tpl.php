<?php
// $Id: node.tpl.php,v 1.4 2007/08/07 08:39:36 goba Exp $
?>
<div class="bucket">

<div class="bucket-normal">
	<?php if($node->field_bucket_links[0]['display_url']): ?>
	<div><a href="<?php print $node->field_bucket_links[0]['display_url'] ?>" >
		<?php print theme('imagecache', 'home_bucket', $node->field_bucket_image[0]['filepath'], $node->field_bucket_image[0]['data']['alt'], $node->field_bucket_image[0]['data']['title']) ?>
	</a></div>
	<?php else: ?>	
		<?php print theme('imagecache', 'home_bucket', $node->field_bucket_image[0]['filepath'], $node->field_bucket_image[0]['data']['alt'], $node->field_bucket_image[0]['data']['title']) ?>
	<?php endif; ?>
</div>
	
	
	<?php if($node->field_bucket_links[0]['display_url']): ?>
	<div onclick="window.location.href='<?php print $node->field_bucket_links[0]['display_url'] ?>'" class="div-link bucket-hover">
	<?php else: ?>
	<div class="bucket-hover">
	<?php endif; ?>
		
		<div class="bucket-hover-text"><?php print $node->field_bucket_text[0]['value'] ?></div>
		<div class="bucket-hover-links">
			<?php if($node->field_bucket_links[0]['title']): ?>
				<span><a href="<?php print $node->field_bucket_links[0]['display_url'] ?>"><?php print $node->field_bucket_links[0]['title'] ?></a></span>
			<?php endif; ?>
			<?php if($node->field_bucket_links[1]['title']): ?>
				<span class="slides-link-divider">|</span>
				<span><a href="<?php print $node->field_bucket_links[1]['display_url'] ?>"><?php print $node->field_bucket_links[1]['title'] ?></a></span>
			<?php endif; ?>
		</div>	
		
	</div>
	
</div>