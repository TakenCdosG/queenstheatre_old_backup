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
	<div id="news-date"><?php print str_replace('(All day)', '', $node->field_news_date[0]['view']); ?></div>
	<div id="internal-body-text"><?php print $node->body ?></div>
</div>