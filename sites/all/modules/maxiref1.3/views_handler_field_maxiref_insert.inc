<?php 
class views_handler_field_maxiref_insert extends views_handler_field {
  function query() {
    // do nothing -- to override the parent query.
  }

  function option_definition() {
    $options = parent::option_definition();
     $this->x = $_GET["maxiref-element"];
    // Override the alter text option to always alter the text.
    $options['alter']['contains']['alter_text'] = array('default' => TRUE);
    return $options;
  }

  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);

    // Remove the checkbox
    unset($form['alter']['alter_text']);
    unset($form['alter']['text']['#dependency']);
    unset($form['alter']['text']['#process']);
  }

  function render($values) {
    // Nothing to render.
    $text = ($this->options['alter']['text'])?$this->options['alter']['text']:"Insert";
    
    return '<a href="javascript:" 
    onclick="
    window.parent.maxiref_update(document.maxirefElement,\'insert\','.$values->nid.');  
    window.parent.window[\'maxiref_\' +   document.maxirefEditMode + \'_browse_end\'](document.maxirefElement);
    " >'.$text.'</a>';
  }
}
