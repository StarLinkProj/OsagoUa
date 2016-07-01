<?php
/**
 * @package     Joomla.Tutorials
 * @subpackage  Module
 * @copyright   (C) 2012 http://jomla-code.ru
 * @license     License GNU General Public License version 2 or later; see LICENSE.txt
 */ 
 
// No direct access.
defined('_JEXEC') or die('(@)|(@)');

class modHelloworldHelper
{
	public static function getList(&$params){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__smfaq');
		if( $params->get('category_id') ){
			$query->where('catid IN ( ' . $params->get('category_id') . ' )');
		}
		$query->where('published = 1');
		$query->order('created DESC');
		$db->setQuery($query, 0, (int)$params->get('quantity') ? (int)$params->get('quantity') : 5);

		$list = $db->loadObjectList();

		return $list;
	}
	
}
