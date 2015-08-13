<?php
// $Id: node.tpl.php,v 1.4 2007/08/07 08:39:36 goba Exp $
?>
<?php if($node->field_internal_image[0]['filepath'] || $node->field_internal_video[0]['value']): ?>
	<div id="internal-image">
		<?php 
			if($node->field_internal_video[0]['value']){
				//If video url is not "clean" pass through the conditional
				if(stripos($node->field_internal_video[0]['value'], '&')){
					$end = stripos($node->field_internal_video[0]['value'], '&');
					$video_url = substr($node->field_internal_video[0]['value'], 0, $end);
				//Else the video url is the same
				}else $video_url = $node->field_internal_video[0]['value'];
				
				$new_video_url = str_replace('http://www.youtube.com/watch?v=', 'http://www.youtube.com/v/', $video_url);
				
				print '<object width="703" height="331"><param name="movie" value="'.$new_video_url.'?version=3&amp;hl=es_ES&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><param name="wmode" value="transparent"></param><embed src="'.$new_video_url.'?version=3&amp;hl=es_ES&amp;rel=0" type="application/x-shockwave-flash" width="703" height="331" allowscriptaccess="always" allowfullscreen="true" wmode="transparent"></embed></object></div>';
				
			}else print theme('imagecache', 'internal_image', $node->field_internal_image[0]['filepath'], $node->field_internal_image[0]['data']['alt'], $node->field_internal_image[0]['data']['title']); 
		?>
	</div>
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
	<div id="internal-body-text"><?php print $node->body ?></div>
	<?php if($node->field_bottom_button[0]['title']): ?>
		<a id="bottom-button-link" href="<?php print $node->field_bottom_button[0]['display_url'] ?>" target="<?php print $node->field_bottom_button[0]['attributes']['target'] ?>"><span id="bottom-button"><?php print $node->field_bottom_button[0]['title'] ?></span></a>
	<?php endif; ?>
</div>