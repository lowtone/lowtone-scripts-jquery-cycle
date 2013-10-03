<?php
/*
 * Plugin Name: Script Library: jQuery Cycle
 * Plugin URI: http://wordpress.lowtone.nl/scripts-jquery-cycle
 * Plugin Type: lib
 * Description: Include jQuery Cycle.
 * Version: 1.0
 * Author: Lowtone <info@lowtone.nl>
 * Author URI: http://lowtone.nl
 * License: http://wordpress.lowtone.nl/license
 */

namespace lowtone\scripts\jquery\cycle {

	use lowtone\content\packages\Package;

	// Includes
	
	if (!include_once WP_PLUGIN_DIR . "/lowtone-content/lowtone-content.php") 
		return trigger_error("Lowtone Content plugin is required", E_USER_ERROR) && false;

	$GLOBALS["lowtone_scripts_jquery_cycle"] = Package::init(array(
			Package::INIT_PACKAGES => array("lowtone\\scripts"),
			Package::INIT_SUCCESS => function() {
				$dependencies = array(
						"jquery-cycle" => array("jquery", "jquery-ui-core", "jquery-effects-core"),
						"jquery-cycle-tiles" => array("jquery-cycle")
					);

				$versions = array(
						"jquery-cycle" => "3.0.2",
						"jquery-cycle-tiles" => "1.0.0" // Actual version unknown
					);

				return array(
						"registered" => \lowtone\scripts\register(__DIR__ . "/assets/scripts", $dependencies, $versions)
					);
			}
		));

	function registered() {
		global $lowtone_scripts_jquery_cycle;
		
		return isset($lowtone_scripts_jquery_cycle["registered"]) ? $lowtone_scripts_jquery_cycle["registered"] : false;
	}
	
}