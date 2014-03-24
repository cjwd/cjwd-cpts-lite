<?php
/**
 * Title: Images
 * Post Type: cjwd_portfolio
 */

piklist('field', array(
    'type' => 'file'
    ,'field' => 'portfolio_media'
    ,'scope' => 'post_meta'
    ,'label' => __('Add Image(s)','cjwd-post-types')
    ,'description' => __('Upload images for portfolio item.','cjwd-post-types')
    ,'add_more' => true
    ,'options' => array(
      'modal_title' => __('Add Image(s)','cjwd-post-types')
      ,'button' => __('Add Image','cjwd-post-types')
    )
  ));

