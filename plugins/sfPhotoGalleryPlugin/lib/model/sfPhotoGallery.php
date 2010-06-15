<?php

/**
 *
 * @package lib.model
 */ 
class sfPhotoGallery extends BasesfPhotoGallery
{
  public function getRealName() {
    return $this->getUuid().'.'.$this->getSuffix();
  }
  
  public function delete($con = null)
  {
    @unlink(sfConfig::get('sf_upload_dir').'/thumbnails/tiny/'.$this->getRealName());
    @unlink(sfConfig::get('sf_upload_dir').'/thumbnails/small/'.$this->getRealName());
    @unlink(sfConfig::get('sf_upload_dir').'/thumbnails/medium/'.$this->getRealName());
    @unlink(sfConfig::get('sf_upload_dir').'/thumbnails/large/'.$this->getRealName());
    
    @unlink(sfConfig::get('sf_upload_dir').'/photos/'.$this->getRealName());
    
    parent::delete();
  }
}

sfPropelBehavior::add('sfPhotoGallery', array('sfPropelUuidBehavior'));
