<?php
/*
 * This file is part of the sfPropelActAsStarredBehavior package.
 *
 * (c) 2007 Gerald Estadieu <gestadieu@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

sfPropelBehavior::registerHooks('sfPropelActAsStarredBehavior', array (
  ':delete:pre' => array ('sfPropelActAsStarredBehavior', 'preDelete')
));

sfPropelBehavior::registerMethods('sfPropelActAsStarredBehavior', array (
  array('sfPropelActAsStarredBehavior', 'setStar'),
  array('sfPropelActAsStarredBehavior', 'countStars'),
  array('sfPropelActAsStarredBehavior', 'isStarred'),
  array('sfPropelActAsStarredBehavior', 'clearStar')
));