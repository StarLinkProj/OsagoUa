<?php
/**
 * @package 	OT Client Logos Scroller Module for Joomla! 3.3
 * @version 	$Id: mod_otclientlogosscroller.php - Aug 2014 00:00:00Z OmegaTheme
 * @author 		OmegaTheme Extensions (services@omegatheme.com) - http://omegatheme.com
 * @copyright	Copyright(C) 2014 - OmegaTheme Extensions
 * @license 	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
**/
// no direct access
// no direct access
defined('_JEXEC') or die( 'Restricted access' );

require_once( dirname(__FILE__).'/helper.php' );

// Add style and css to header
$doc = JFactory::getDocument();
$doc->addStyleSheet(JURI::root().'modules/mod_otclientlogosscroller/assets/css/mod_otclientlogosscroller.css');

// Get Params
$ot_width = $params->get('ot_width',700);
$ot_item = $params->get('ot_item',5);
$ot_duration = $params->get('ot_duration',1250);
$ot_toduration = $params->get('ot_toduration',2500);
$ot_pager = $params->get('ot_pager',1);
$ot_pn = $params->get('ot_pn',1);
$ot_display = $params->get('ot_display','slider');
$ot_number = $params->get('ot_number',5);
$ot_tooltip = $params->get('ot_tooltip',1);
$ot_opacity = $params->get('ot_opacity',1);
$ot_opacity2 = $params->get('ot_opacity2',1);
$ot_width_img = $params->get('ot_width_img',100);
$ot_height_img = $params->get('ot_height_img',100);

$lists = mod_otclientlogosscrollerHelper::getList( $params );
// Get module sfx class
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
require( JModuleHelper::getLayoutPath( 'mod_otclientlogosscroller', $params->get('layout', 'default') ) );
?>


