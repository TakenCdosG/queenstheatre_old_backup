<?php
// $Id: views-view-fields.tpl.php,v 1.6 2008/09/24 22:48:21 merlinofchaos Exp $
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<div class="news-items">
	<div class="news-date"><?php print str_replace('(All day)', '', $fields['field_news_date_value']->content) ?></div>
	<div class="news-title-container">
		<?php
			if($fields['field_news_pdf_fid']->content) print '<a href="'.$fields['field_news_pdf_fid']->content.'" target="_blank"><div class="news-title">'.$fields['title']->content.'</div></a>';
				elseif($fields['field_news_external_value']->content) print '<a href="'.$fields['field_news_external_value']->content.'" target="_blank"><div class="news-title">'.$fields['title']->content.'</div></a>';
					else print '<a href="'.$fields['path']->content.'" target="_top"><div class="news-title">'.$fields['title']->content.'</div></a>';
		?>
	</div>
</div>