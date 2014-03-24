<?php
/**
 * 
 * @package   CJWD Custom Post Types
 * @author    Chinara James <cjwd@chinarajames.com>
 * @license   GPL-2.0+
 * @link      http://chinarajames.com
 * @copyright 2014 CJ WEB DESIGN
 *
 * @wordpress-plugin
 * Plugin Name:       CJWD Custom Post Types Lite
 * Plugin URI:        http://chinarajames.com
 * Description:       Custom Post Types for CJWEBDESIGN
 * Version:           0.0.5
 * Author:            Chinara James
 * Author URI:        http://chinarajames.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Plugin Type:		  Piklist
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
include_once( 'class-cjwd-cpts-lite.php' );
CJWD_Custom_Post_Types_Lite::get_instance();