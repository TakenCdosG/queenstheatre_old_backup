<?php
// $Id: node.tpl.php,v 1.4 2007/08/07 08:39:36 goba Exp $
$image_output = ''; //image gallery slides
$video_output = ''; //video gallery slides
$image_nav = ''; //image gallery navigation
$video_nav = '<div class="video-label">WATCH:</div>'; //video gallery navigation
$cont = 0;

/*
 * Image gallery and navigation
*/
while($node->field_event_image_gallery[$cont]['filepath']){	
	if($cont==0 && count($node->field_event_image_gallery)==1){
		$image_output .= '<div class="event-slide event-show" name="image-slide'.$cont.'">'.theme('imagecache', 'event_slideshow', $node->field_event_image_gallery[$cont]['filepath'], $node->field_event_image_gallery[$cont]['data']['alt'], $node->field_event_image_gallery[$cont]['data']['title']).'</div>';
		$image_nav .= '';
	}
	elseif($cont==0){
		$image_output .= '<div class="event-slide event-show" name="image-slide'.$cont.'">'.theme('imagecache', 'event_slideshow', $node->field_event_image_gallery[$cont]['filepath'], $node->field_event_image_gallery[$cont]['data']['alt'], $node->field_event_image_gallery[$cont]['data']['title']).'</div>';
		$image_nav .= '<div name="image-slide'.$cont.'" class="event-nav event-nav-active">'.($cont+1).'</div>';
	}else{
		$image_output .= '<div class="event-slide event-hidden" name="image-slide'.$cont.'">'.theme('imagecache', 'event_slideshow', $node->field_event_image_gallery[$cont]['filepath'], $node->field_event_image_gallery[$cont]['data']['alt'], $node->field_event_image_gallery[$cont]['data']['title']).'</div>';
		$image_nav .= '<div name="image-slide'.$cont.'" class="event-nav">'.($cont+1).'</div>';
	}
		$cont++;
}

$cont = 0;

/*
 * Video gallery and navigation
*/
while($node->field_event_video_gallery[$cont]['value']){
	//If video url is not "clean" pass through the conditional
	if(stripos($node->field_event_video_gallery[$cont]['value'], '&')){
		$end = stripos($node->field_event_video_gallery[$cont]['value'], '&');
		$video_url = substr($node->field_event_video_gallery[$cont]['value'], 0, $end);
	//Else the video url is the same
	}else $video_url = $node->field_event_video_gallery[$cont]['value'];

	$new_video_url = str_replace('http://www.youtube.com/watch?v=', 'http://www.youtube.com/v/', $video_url);

	if(empty($image_output) && $cont==0) $video_output .= '<div class="event-slide event-show" name="video-slide'.$cont.'"><object width="703" height="399"><param name="movie" value="'.$new_video_url.'?version=3&amp;hl=es_ES&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><param name="wmode" value="transparent"></param><embed src="'.$new_video_url.'?version=3&amp;hl=es_ES&amp;rel=0" type="application/x-shockwave-flash" width="703" height="399" allowscriptaccess="always" allowfullscreen="true" wmode="transparent"></embed></object></div>';
		else $video_output .= '<div class="event-slide event-hidden" name="video-slide'.$cont.'"><object width="703" height="399"><param name="movie" value="'.$new_video_url.'?version=3&amp;hl=es_ES&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><param name="wmode" value="transparent"></param><embed src="'.$new_video_url.'?version=3&amp;hl=es_ES&amp;rel=0" type="application/x-shockwave-flash" width="703" height="399" allowscriptaccess="always" allowfullscreen="true" wmode="transparent"></embed></object></div>';
	//Is there's more that one video, show numbers in the navigacion menu
	if($node->field_event_video_gallery[1]['value']) $video_nav .= '<div name="video-slide'.$cont.'" class="event-nav">'.($cont+1).'</div>';
		//Is there only one video, show "play video"
		else $video_nav = '<div name="video-slide'.$cont.'" class="event-nav video-unique">WATCH</div>';
	
	$cont++;
}

//If there's only set the default image, don't show the navigation menu
if(empty($image_output) && empty($video_output)) $hidden = 'event-hidden';

?>
<div id="event-slideshow" class="<?php print $hidden ?>">
	<?php print $image_output ?>
	<?php print $video_output ?>
	<div id="event-slideshow-nav" class="<?php print $hidden ?>">
		<div id="event-slideshow-nav-media">
			<?php 
				if(!empty($image_output)) print $image_nav;
				if(!empty($video_output))print $video_nav;
			?>
		</div>
		<?php if($node->field_event_audio[0]['filepath']): ?>
			<div id="event-audio">
				<table>
					<tr>
						<td>LISTEN&nbsp;</td>
						<td>
							<?php
								foreach($node->field_event_audio as $key => $value){
									if(count($node->field_event_audio)==1) $file = $value['filepath'];
									else{
										if($key==count($node->field_event_audio)-1) $file.= $value['filepath'];
										else $file.= $value['filepath'].',';
									}
								}
							?>
							<script src="<?php print path_to_theme().'/js/audio-player.js' ?>" language="JavaScript"></script>
							<object width="250" height="20" id="audioplayer1" data="<?php print path_to_theme().'/js/player.swf' ?>" type="application/x-shockwave-flash">
									<param value="<?php print path_to_theme().'/js/player.swf' ?>" name="movie">
									<param value="playerID=1&amp;soundFile=<?php print $file; ?>" name="FlashVars">
									<param value="high" name="quality">
									<param value="false" name="menu">
									<param value="transparent" name="wmode">
							</object>
						</td>
					</tr>
				</table>
			</div>
		<?php endif; ?>
	</div>
</div>
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
	<div id="event-body-text"><?php print $node->body ?></div>
	<?php if($node->field_bottom_button[0]['title']): ?>
		<a id="bottom-button-link" href="<?php print $node->field_bottom_button[0]['display_url'] ?>" target="<?php print $node->field_bottom_button[0]['attributes']['target'] ?>"><span id="bottom-button"><?php print $node->field_bottom_button[0]['title'] ?></span></a>
	<?php endif; ?>
</div>
