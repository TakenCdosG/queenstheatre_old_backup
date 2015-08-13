<?php

function maxiref_views_data() {

  $data['views']['maxiref_insert'] = array(
    'title' => t('Maxiref Insert'),
    'help' => t('Provides maxiref insert button.'),
    'field' => array(
      'handler' => 'views_handler_field_maxiref_insert',
    ),
  );
 

  return $data;
}


function maxiref_views_handlers() {
  return array(
    'info' => array(
      'path' => drupal_get_path('module', 'maxiref'),
    ),
    'handlers' => array(
      'views_handler_field_maxiref_insert' => array(
        'parent' => 'views_handler_field',
      ),
    ),
  );
}


/**
 * Implementation of hook_views_default_views().
 */
function maxiref_views_default_views() {
  include_once("default_views.inc");
  $views = array(maxiref_view_insert_view(),maxiref_view_preview_view());
  
  foreach($views as $view){
    $views[$view->name] = $view;
  }
  
  return $views;
}