<?php
/**
 * Title: Portfolio Details
 * Post Type: cjwd_portfolio
 */

piklist('field', array(
    'type' => 'editor'
    ,'scope' => 'post'
    ,'field' => 'project_excerpt'
    ,'label' => __('Excerpt')
    ,'description' => __('Short summary of project')
    ,'value' => 'Write a short summary of the project here'
    ,'template' => 'field'
    ,'options' => array (
      'wpautop' => true
      ,'media_buttons' => false
      ,'tabindex' => ''
      ,'editor_css' => ''
      ,'editor_class' => ''
      ,'teeny' => false
      ,'dfw' => false
      ,'tinymce' => true
      ,'quicktags' => true
    )
  ));

piklist('field', array(
    'type' => 'text'
    ,'field' => 'project_client_name'
    ,'label' => __('Client', 'cjwd-post-types')
    ,'columns' => '12'
  ));

piklist('field', array(
    'type' => 'text'
    ,'field' => 'project_url'
    ,'label' => __('Project URL', 'cjwd-post-types')
    ,'description' => __('URL to launch the project')
    ,'value' => 'http://'
    ,'columns' => '12'
  ));
