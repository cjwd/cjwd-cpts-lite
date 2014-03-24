<?php
/**
 * Title: Product Options
 * Post Type: cjwd_product
 */

echo "<h3>ADD PRICING TIERS</h3>";


piklist('field', array(
    'type' => 'group',
    'field' => 'pricing_tier_group',
    'label' => __('Pricing Tier'),
    'template' => 'field',
    'add_more' => true,
    'fields' => array(
        array(
            'type' => 'text',
            'field' => 'tier_name',
            'label' => 'Tier Name',
            'columns' => 8,
        ),
        array(
            'type' => 'text',
            'field' => 'tier_price',
            'label' => __('Price'),
            'value' => '$',
            'columns' => 4,
        ),
        array(
            'type' => 'text',
            'field' => 'example_url',
            'label' => __('Example URL'),
            'columns' => 12,
        ),
        array(
            'type' => 'group',
            'field' => 'tier_features',
            'add_more' => true,
            'fields' => array(
                array(
                    'type' => 'text',
                    'field' => 'feature_name',
                    'label' => __('Feature name'),
                    'columns' => 12
                ),
            ),
        ),
        
    )
    
));