<?php

/**
 * features actions.
 *
 * @package    cothink
 * @subpackage features
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class featuresActions extends autofeaturesActions
{
    public function executeSetImplemented()
    {
        $feature = SuggestedFeaturePeer::retrieveByPK($this->getRequestParameter('id'));
        $feature->setStatus(sfConfig::get('app_feature_status_implemented'));
        $feature->save();
        
        $this->redirect($this->getRequest()->getReferer());
    }
    
    public function executeSetClosed()
    {
        $feature = SuggestedFeaturePeer::retrieveByPK($this->getRequestParameter('id'));
        $feature->setStatus(sfConfig::get('app_feature_status_closed'));
        $feature->save();
        
        $this->redirect($this->getRequest()->getReferer());
    }
    
    public function executeSetFixed()
    {
        $feature = SuggestedFeaturePeer::retrieveByPK($this->getRequestParameter('id'));
        $feature->setStatus(sfConfig::get('app_feature_status_fixed'));
        $feature->save();
        
        $this->redirect($this->getRequest()->getReferer());
    }
}
