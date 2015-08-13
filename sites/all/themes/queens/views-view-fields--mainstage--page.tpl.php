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

//dsm($fields);

?>
<div class="category-event">
	<a href="<?php print $fields['path']->content ?>"><div class="category-event-image"><?php print $fields['field_event_cat_image_fid']->content ?></div><a/>
	<div class="category-event-body">
		<h2><?php print $fields['title']->content ?></h2>
		<div class="category-event-text"><?php print $fields['field_event_cat_body_value']->content ?></div>
		<div class="category-event-links"><?php print $fields['view_node']->content ?>
		<?php if($fields['field_bottom_button_url']->content !=""): ?>
		|
		<?php print $fields['field_bottom_button_url']->content ?>
		<!--<a href="<?php print $fields['field_bottom_button_url']->content ?>" target="_blank">Buy Tickets</a>-->
		<?php endif; ?>
		</div>
	</div>
</div>