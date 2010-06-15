<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfErrorLogger.class.php 5036 2007-09-10 21:12:42Z fabien $
 */
class sfErrorLogger
{
  public function log500($caller, $exception)
  {
    $context = sfContext::getInstance();

    // is database configured?
    try
    {
      Propel::getConnection();

      // log exception in db
      $log = new sfErrorLog();
      $log->setType(500);
      $log->setClassName(get_class($exception));
      $log->setMessage(null !== $exception->getMessage() ? $exception->getMessage() : 'n/a');
      $log->setModuleName($context->getModuleName());
      $log->setActionName($context->getActionName());
      $log->setExceptionObject($exception);
      $log->setRequest($context->getRequest());
      $log->setUri($context->getRequest()->getUri());
      $log->save();
    }
    catch (PropelException $e)
    {
    }

    return false;
  }

  public function log404($controller, $moduleName, $actionName)
  {
    // is database configured?
    try
    {
      Propel::getConnection();

      // log 404 in db
      $log = new sfErrorLog();
      $log->setType(404);
      $log->setClassName(null);
      $log->setMessage('n/a');
      $log->setModuleName($moduleName);
      $log->setActionName($actionName);
      $log->setExceptionObject(null);
      $log->setRequest($controller->getContext()->getRequest());
      $log->setUri($controller->getContext()->getRequest()->getUri());
      $log->save();
    }
    catch (PropelException $e)
    {
    }
  }
}
