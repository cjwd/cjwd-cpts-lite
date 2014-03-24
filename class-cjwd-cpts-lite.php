<?php
class CJWD_Custom_Post_Types_Lite {
	protected static $instance = null;

	private function __construct() {
		add_action( 'init', array( $this, 'register_cpt_shortcode' ) );
		add_filter( 'piklist_post_types', array( $this, 'cjwd_post_types' ) );
		add_filter('piklist_taxonomies', array( $this, 'cjwd_product_cat_tax'));
		add_filter('piklist_taxonomies', array( $this, 'cjwd_portfolio_cat_tax'));
		
		
	}

	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Register Post Types
	 * uses Piklist
	 * @since    1.0.0
	 */
	public function cjwd_post_types($post_types) {
		$post_types = array_merge($post_types, array(
		    'cjwd_product' => array(
		      'labels' => piklist('post_type_labels', 'Products')
		      ,'title' => __('Enter a new Product', 'cjwd-post-types')
		      ,'supports' => array(
		      	'title'
		      	,'editor'
		        ,'thumbnail'
		        ,'page-attributes'
		      )
		      ,'public' => true
		      ,'has_archive' => false
		      ,'taxonomies'  => array(
		      	 'product_category'
		      )
		      ,'rewrite' => array(
		        'slug' => 'products'
		      )
		      ,'edit_columns' => array(
		        'title' => __('Product Name', 'cjwd-post-types')
		      )
		    )
		    ,'cjwd_portfolio' => array(
		      'labels' => piklist('post_type_labels', 'Portfolio')
		      ,'title' => __('Enter a new Portfolio Item', 'cjwd-post-types')
		      ,'supports' => array(
		      	'title'
		      	,'editor'
		        ,'thumbnail'
		        ,'page-attributes'
		      )
		      ,'public' => true
		      ,'has_archive' => false
		      ,'taxonomies'  => array('portfolio_category')
		      ,'rewrite' => array(
		        'slug' => 'portfolio'
		      )
		      ,'edit_columns' => array(
		      	 'title' => __('Project Name', 'cjwd-post-types')
		      )
		    )
		  ));
 
  		return $post_types;
	}

	/**
	 * Register Taxonomies for Product post type
	 * Custom Post Types
	 */
	function cjwd_product_cat_tax($taxonomies){
		$taxonomies[] = array(
		  'post_type' => 'cjwd_product'
		  ,'name' => 'product_category'
		  ,'show_admin_column' => true
		  ,'hide_meta_box' => false
		  ,'configuration' => array(
		    'hierarchical' => false
		    ,'labels' => piklist('taxonomy_labels', 'Product Type')
		    ,'show_ui' => true
		    ,'query_var' => true
		    ,'rewrite' => array( 
		      'slug' => 'product-type' 
		    )
		  )
		);
		return $taxonomies;
	}

	/**
	 * Register taxonomy for portfolio post type
	 * @param  array $taxonomies register taxonomy array
	 * @return array             
	 */
	function cjwd_portfolio_cat_tax($taxonomies){
		$taxonomies[] = array(
		  'post_type' => 'cjwd_portfolio'
		  ,'name' => 'portfolio_category'
		  ,'show_admin_column' => true
		  ,'hide_meta_box' => false
		  ,'configuration' => array(
		    'hierarchical' => false
		    ,'labels' => piklist('taxonomy_labels', 'Category')
		    ,'show_ui' => true
		    ,'query_var' => true
		    ,'rewrite' => array( 
		      'slug' => 'portfolio_category-type' 
		    )
		  )
		);
		return $taxonomies;
	}
	
	/**
	 * Register short_code for testing public facing functionality
	 *            
	 */
	function register_cpt_shortcode(){
		add_shortcode( 'products', array( $this, 'do_products_shortcode') );
	}

    /**
	 * Shortcode functionality
	 *            
	 */
	function do_products_shortcode(){
		$loop = new WP_Query(
		    array(
		        'post_type' => 'cjwd_product',
		        'orderby' => 'title'
		    )
		);
		
		if ( $loop->have_posts() ) {
		    $output = '<div class="products">';
		    
		    while( $loop->have_posts() ) {
		        $loop->the_post();
		        
		        $meta = get_post_meta( get_the_id(), 'pricing_tier_group', true );
		       //var_dump($meta);
		    }
		    
		   $output .= '
		       <article class="product">
                    <header class="product-header">
                        <div class="grid">
                            <div class="grid__item one-whole desk-one-half">
                                <h2 class="product-name"> ' . get_the_title() . '</h2>
                                <p class="product-description"> ' . get_the_content() . '</p>
                            </div>
                        </div>
                    </header> <ul> ' . 

                       piklist("content-product", array( "data" => $meta, "loop" => "data" ) )
                . '</ul> </article>';
		}
		
		 return $output;
	}




}