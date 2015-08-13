<?php
// $Id: node.tpl.php,v 1.4 2007/08/07 08:39:36 goba Exp $
?>
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
</div>
<div id="gallery-wrapper">
	<div id="gallery-wrapper-info">
		<div id="gallery-wrapper-text"><?php print $node->body ?></div>
		<div id="gallery-images">
			<?php
				$table = '<table border="0" cellpadding="0" cellspacing="0">';
				
					if(count($node->field_gallery_images>1)){
						foreach($node->field_gallery_images as $key => $value){
							if($key==0 || $key%2==0)
								$table.= '<tr><td class="first-td">
											<a href="sites/default/files/imagecache/web_use_gallery/gallery/'.$value['filename'].'" target="_blank">'.
												theme('imagecache', 'gallery', $value['filepath'], $value['data']['alt'], $value['data']['title']).
											'</a>
											<div class="hidden">'.
												theme('imagecache', 'web_use_gallery', $value['filepath'], $value['data']['alt'], $value['data']['title']).
											'</div>
											<div class="gallery-images-text">'.
												$value['data']['image_text']['body'].
											'</div>
											<div class="galerry-images-links">
												<a href="'.$value['filepath'].'" target="_blank">print use</a> | <a href="sites/default/files/imagecache/web_use_gallery/gallery/'.$value['filename'].'" target="_blank">web use</a>
											</div></td>';
							elseif($key!=0 || $key%2!=0)
								$table.= '<td><a href="sites/default/files/imagecache/web_use_gallery/gallery/'.$value['filename'].'" target="_blank">'.theme('imagecache', 'gallery', $value['filepath'], $value['data']['alt'], $value['data']['title']).'</a><div class="hidden">'.theme('imagecache', 'web_use_gallery', $value['filepath'], $value['data']['alt'], $value['data']['title']).'</div><div class="gallery-images-text">'.$value['data']['image_text']['body'].'</div><div class="galerry-images-links"><a href="'.$value['filepath'].'" target="_blank">print use</a> | <a href="sites/default/files/imagecache/web_use_gallery/gallery/'.$value['filename'].'" target="_blank">web use</a></div></td></tr>';
						}
					}else $table.= '<tr><td><a href="sites/default/files/imagecache/web_use_gallery/gallery/'.$value['filename'].'" target="_blank">'.theme('imagecache', 'gallery', $value['filepath'], $value['data']['alt'], $value['data']['title']).'</a><div class="hidden">'.theme('imagecache', 'web_use_gallery', $value['filepath'], $value['data']['alt'], $value['data']['title']).'</div><div class="gallery-images-text">'.$value['data']['image_text']['body'].'</div><div class="galerry-images-links"><a href="'.$value['filepath'].'" target="_blank">print use</a> | <a href="sites/default/files/imagecache/web_use_gallery/gallery/'.$value['filename'].'" target="_blank">web use</a></div></td></tr>';
				print $table.'</table>';
			?>
		</div>
	</div>
	<div id="gallery-terms">
		<?php
			$node_term = node_load(100);
			
			print '<h2>'.$node_term->title.'</h2>';
			print $node_term->body;
		?> 
	</div>
</div>