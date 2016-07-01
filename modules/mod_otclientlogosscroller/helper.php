<?php
/**
 * @package 	OT Client Logos Scroller Module for Joomla! 3.3
 * @version 	$Id: helper.php - Aug 2014 00:00:00Z OmegaTheme
 * @author 		OmegaTheme Extensions (services@omegatheme.com) - http://omegatheme.com
 * @copyright	Copyright(C) 2014 - OmegaTheme Extensions
 * @license 	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
**/
// no direct access
defined('_JEXEC') or die( 'Restricted access' );

 class mod_otclientlogosscrollerHelper
{
    /**
    *    @return       array of tab element object(title, content) which prepared for rendering
    *    @called by    root
    */
    public static function getList($params)
    {
        $tabsarray = array();
        $tabs = $params->get('otclientlogosscroller');
        
        if (!is_array($tabs) || empty($tabs)) return array();
        
        foreach ($tabs as $idx => $tab)
        {
            $item = new StdClass();            
            $item->avatar= $tab->avatar;
            $item->website= $tab->website; 
            $item->title= $tab->title; 
            $tabsarray[] = $item;
        }
        return $tabsarray;
    }
}