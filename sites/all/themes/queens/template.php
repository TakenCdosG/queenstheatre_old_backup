<?php
// $Id: template.php,v 1.16.2.3 2010/05/11 09:41:22 goba Exp $

/*
 *
 */
function phptemplate_preprocess_page(&$vars){

	/* Load js and css files */
	drupal_add_js(path_to_theme().'/js/helper.js');
	drupal_add_js(path_to_theme().'/js/swfobject.js');
	//drupal_add_js(path_to_theme().'/js/jwplayer.js');
	drupal_add_js(path_to_theme().'/js/prettyPhoto.js');
	drupal_add_css(path_to_theme().'/js/prettyPhoto/prettyPhoto.css');
	drupal_add_css(path_to_theme().'/editor.css');
	
	/* Reload the javascript and css files */
	$vars['scripts'] = drupal_get_js();
	$vars['styles'] = drupal_get_css();

	$node = queens_current_node();
	
	switch($node->type){
		case 'front':
			$vars['template'] = 'front.inc.php';
			$vars['slideshow'] = queens_home_slideshow();
			$vars['buckets'] = queens_home_buckets();
		break;
		case 'event':
		case 'page':
		case 'event_category':
		case 'location_page':
		case 'error_page':
		case 'gallery':
		case 'gallery_page':
		case 'news':
		case 'news_page':
		case 'faq_page':
			$vars['template'] = 'internal.inc.php';
		break;
		case 'calendar':
			$vars['template'] = 'internal.inc.php';
			$vars['main_wrapper_class'] = 'calendar-main-wrapper';
		break;
		case 'site_map':
			$vars['template'] = 'search.inc.php';
		break;
		default:
			$vars['template'] = 'admin.inc.php';
		break;
	}
	
	if(arg(0)=='search') $vars['template'] = 'search.inc.php';
	
	if(arg(2)=='edit') $vars['template'] = 'admin.inc.php';
	
	/* BROWSER TITLE */
	$vars['head_title'] = $node->field_browser_title[0]['value'];

	/* MINI WIDGETS */
	$vars['mini_widgets'] = queens_mini_widgets();
	
	/* STANDARD WIDGETS */
	$vars['standard_widgets'] = queens_standard_widgets();
	//dsm(node_load(8));
	
	/* FOOTER */
	$nodofooter = node_load(8);
	$vars['footer_body'] = $nodofooter->body;
	$vars['footer_text2'] = $nodofooter->field_footertext[0]["value"];
	$vars['footer_images'] = queens_footer_images();
	
}

/*
 * Get the current node
*/
function queens_current_node(){
  if(arg(0)=='node' && is_numeric(arg(1)))
    return node_load(arg(1));
}

/*
 * Get home slideshow
*/
function queens_home_slideshow(){
	$slides = '';
	$node = queens_current_node();
	$cont = 0;
	$nav = '';
	
	if(isset($node->field_front_slides)){
		foreach($node->field_front_slides as $value ){
			if($value['nid']!=NUll){
				$slides .= node_view(node_load($value['nid']));
				if($cont==0) $nav.= '<div class="nav nav-active" name="'.$cont.'"></div>';
					else $nav.= '<div class="nav" name="'.$cont.'"></div>';
				$cont++;
			}
		}
	} 

	return '<div id="slideshow-nav">'.$nav.'</div>'.$slides;
}

/*
 * Get home image buckets
*/
/*function queens_home_buckets(){
	$buckets = '';
	$node = queens_current_node();

	if(isset($node->field_front_buckets)){
		for($i=0; $i<3; $i++){
			if($node->field_front_buckets[$i]['nid']!=NUll){
				$buckets .= node_view(node_load($node->field_front_buckets[$i]['nid']));
			}	
		}
	} 

	return $buckets;
}*/
function queens_home_buckets(){
	$buckets = '';
	$node = queens_current_node();

	if(isset($node->field_front_buckets)){
		for($i=0; $i<4; $i++){
			if($node->field_front_buckets[$i]['nid']!=NUll){
				$bucket_node = node_load($node->field_front_buckets[$i]['nid']);
				
				if($bucket_node->type == 'home_image'){
					$buckets .= node_view($bucket_node);
					
				}else{ //youtube video bucket
					
					$split = explode("v=", $bucket_node->field_youtube_url[0]['value']);
					$code = $split[1];
					
					$buckets .= '<div class="bucket"><div class="bucket-normal">
							<iframe width="228" height="205" src="http://www.youtube.com/embed/'.$code.'" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>';
				}
				
			}	
		}
	} 
	 

	return $buckets;
}

/*
 * Get footer images
*/
function queens_footer_images(){
	$node = node_load(8);
	$cont = 0;
	
	if(isset($node->field_footer_images)){
		foreach($node->field_footer_images as $value ){
			if($value['filepath']!=NUll){
				if($cont==0) $images .= "<span class='footer-images-1'><a href='".$value['data']['url']."' target='".$value['data']['target']."'>".theme('imagecache', 'footer_image', $value['filepath'], $value['data']['alt'], $value['data']['title'])."</a></span>";
				else $images .= "<span><a href='".$value['data']['url']."' target='".$value['data']['target']."'>".theme('imagecache', 'footer_image', $value['filepath'], $value['data']['alt'], $value['data']['title'])."</a></span>";
				$cont++;
			}
		}
	}

	return $images;
}

/*
 * Get mini widgets
*/
function queens_mini_widgets(){
	$mini_widgets = '';
	$node = queens_current_node();

	if(isset($node->field_event_mini_widgets)){
		foreach($node->field_event_mini_widgets as $value ){
			if($value['nid']!=NUll) $mini_widgets .= node_view(node_load($value['nid']));
		}
	}
	return $mini_widgets;
}

/*
 * Get standard widgets
*/
function queens_standard_widgets(){
	$widgets = '';
	$node = queens_current_node();

	if(isset($node->field_event_standard_widgets)){
		foreach($node->field_event_standard_widgets as $value ){
			if($value['nid']!=NUll) $widgets .= node_view(node_load($value['nid']));
		}
	}
	return $widgets;
}