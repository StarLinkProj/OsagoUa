<?php
/**
 * @package     Joomla.Tutorials
 * @subpackage  Module
 * @copyright   (C) 2012 http://jomla-code.ru
 * @license     License GNU General Public License version 2 or later; see LICENSE.txt
 */ 

// No direct access.
defined('_JEXEC') or die('(@)|(@)');

// Подключаем файл помошника
require_once dirname(__FILE__).'/helper.php';
require_once (JPATH_ROOT.'/components/com_smfaq/helpers/route.php');
// Выполняем getList метод из помошника
$list = modHelloworldHelper::getList($params);

//JHTML::stylesheet('smfaq.css', 'modules/mod_smfaq/css');

require JModuleHelper::getLayoutPath('mod_smfaq', $params->get('layout', 'default'));
