<?php

/**
 * Subclass for performing query and update operations on the 'ct_file_gallery' table.
 *
 * 
 *
 * @package lib.model
 */ 
class sfFileGalleryPeer extends BasesfFileGalleryPeer
{
  public static function hasGallery($entity,$entity_id) {
    $c=new Criteria();
    $c->add(sfFileGalleryPeer::ENTITY,$entity);
    $c->add(sfFileGalleryPeer::ENTITY_ID,$entity_id);
    if (sfFileGalleryPeer::doCount($c)>0) 
    {
      sfContext::getInstance()->getLogger()->info('Gallery items found for entity');
      return true;
    }

    sfContext::getInstance()->getLogger()->info('No gallery items found for entity');
    return false;
  }

  public static function getFiles($entity,$entity_id) {
    $c=new Criteria();
    $c->add(sfFileGalleryPeer::ENTITY,$entity);
    $c->add(sfFileGalleryPeer::ENTITY_ID,$entity_id);
    $files=sfFileGalleryPeer::doSelect($c);
    return $files;
  }
  
  public static function getNbFiles($entity, $entity_id) {
    $c=new Criteria();
    $c->add(sfFileGalleryPeer::ENTITY,$entity);
    $c->add(sfFileGalleryPeer::ENTITY_ID,$entity_id);
    $c->setIgnoreCase( true );
    
    return sfFileGalleryPeer::doCount($c); 
  }
  
  public static function retrieveByUuid($uuid)
  {
    $c = new Criteria();
    $c->add(sfFileGalleryPeer::UUID, $uuid);
    
    return sfFileGalleryPeer::doSelectOne( $c );
  }
}

