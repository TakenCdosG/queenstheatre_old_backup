<?php
// $Id: page.tpl.php,v 1.25.2.2 2009/04/30 00:13:31 goba Exp $
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<?php print $head ?>
	<title><?php print $head_title ?></title>
	<?php print $styles ?>
	<?php print $scripts ?>
	<link rel="shortcut icon" href="/<?php print path_to_theme()."/images/favicon.ico" ?>" type="image/x-icon" />
</head>
<body class="page <?php if($is_front) print 'front '; print $node->type; ?>">
	<div id="main-wrapper" class="<?php print $main_wrapper_class; ?>">
		<div id="header">
			<div id="logo">
				<?php print l(theme('image', path_to_theme()."/images/logo.png"), $logo_path, array('attributes' => array('title' => 'Queens Theater', 'alt' => 'Queens Theater'), 'html' => 'true')); ?>
			</div>
			<?php if($header): ?>
				<div id="quick-task">
					<?php print $header ?>
				</div>
			<?php endif ?>
			<div id="top-menu">
				<div id="google-translation">
					<div id="google_translate_element"></div>
					<script>
						function googleTranslateElementInit(){
							new google.translate.TranslateElement({
								pageLanguage: 'en',
								layout: google.translate.TranslateElement.InlineLayout.SIMPLE
							}, 'google_translate_element');
						}
					</script>
					<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
				</div>
				<?php 
					print theme('links', menu_navigation_links("menu-top-menu"), array('class' => 'links', 'id' => 'topnavlist')) 
				?>
			</div>
		</div>
		<div id="body">
			<?php print $messages ?>
			<?php print $tabs ?>
			<div id="body-menu">
				<?php 
					print $main_menu; 
				?>
				<?php print $right ?>
			</div>
			<div class="clear"></div>
			<?php include($template) ?>
		</div>
		<div id="footer">
			<div id="footer-info">
				<?php print $footer_body ?>
			</div>
			<div id="footer-images">
				<?php print $footer_images ?>
				<div id="footer-info2">
					<?php print $footer_text2; ?>
				</div>
				
			</div>
		</div>
	</div>
<?php print $closure ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25722464-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>