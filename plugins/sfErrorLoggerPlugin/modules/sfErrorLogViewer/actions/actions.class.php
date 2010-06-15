<?php

/**
 * sfErrorLogViewer actions.
 *
 * @package    sfdemo
 * @subpackage sfErrorLogViewer
 * @author     Fabien Potencier
 * @version    SVN: $Id: actions.class.php 5036 2007-09-10 21:12:42Z fabien $
 */
class sfErrorLogViewerActions extends autosfErrorLogViewerActions
{
  public function executeDeleteAllSimilar()
  {
    $error = sfErrorLogPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($error);

    sfErrorLogPeer::deleteAllSimilar($error);

    $this->redirect('sfErrorLogViewer/list');
  }

  public function executeDeleteAll()
  {
    sfErrorLogPeer::doDeleteAll();

    $this->redirect('sfErrorLogViewer/list');
  }
}
