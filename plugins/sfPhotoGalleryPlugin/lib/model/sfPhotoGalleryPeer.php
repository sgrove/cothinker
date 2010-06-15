<?php

/**
 * Subclass for performing query and update operations on the 'photo' table.
 *
 * 
 *
 * @package lib.model
 */ 
class sfPhotoGalleryPeer extends BasesfPhotoGalleryPeer
{
  public static function retrieveByUuid($value)
  {
    $c = new Criteria();
    $c->add(sfPhotoGalleryPeer::UUID, $value);
    
    return sfPhotoGalleryPeer::doSelectOne($c);
  }
  
  public static function hasGallery($entity,$entity_id) {
    $c=new Criteria();
    $c->add(sfPhotoGalleryPeer::ENTITY,$entity);
    $c->add(sfPhotoGalleryPeer::ENTITY_ID,$entity_id);
    $c->setIgnoreCase( true );
    if (sfPhotoGalleryPeer::doCount($c)>0) 
    {
      sfContext::getInstance()->getLogger()->info('Gallery items found for entity');
      return true;
    }

    sfContext::getInstance()->getLogger()->info('No gallery items found for entity');
    return false;
  }
  
  public static function isAttachedToEntity($entity, $entity_id, $uuid)
  {
    $c=new Criteria();
    $c->add(sfPhotoGalleryPeer::ENTITY,$entity);
    $c->add(sfPhotoGalleryPeer::ENTITY_ID,$entity_id);
    $c->add(sfPhotoGalleryPeer::UUID,$uuid);
    $c->setIgnoreCase( true );
    
    if (sfPhotoGalleryPeer::doCount($c)>0) 
    {
      sfContext::getInstance()->getLogger()->info('Photo belongs to entity');
      return true;
    }

    sfContext::getInstance()->getLogger()->info('Photo does not belong to entity');
    return false;
  }
  
  public static function getFirst($entity,$entity_id) {
    $c=new Criteria();
    $c->add(sfPhotoGalleryPeer::ENTITY,$entity);
    $c->add(sfPhotoGalleryPeer::ENTITY_ID,$entity_id);
    $c->setIgnoreCase( true );
    $c->addDescendingOrderByColumn(sfPhotoGalleryPeer::CREATED_AT);
    $photo=sfPhotoGalleryPeer::doSelectOne($c);
    return $photo->getRealName();
  }
  
  public static function getPhotos($entity,$entity_id) {
    $c=new Criteria();
    $c->add(sfPhotoGalleryPeer::ENTITY,$entity);
    $c->add(sfPhotoGalleryPeer::ENTITY_ID,$entity_id);
    $c->setIgnoreCase( true );
    $photos=sfPhotoGalleryPeer::doSelect($c);
    return $photos;
  }
  
  public static function getLightboxArray($entity,$entity_id) {
    $images=array();
    $c=new Criteria();
    $c->add(sfPhotoGalleryPeer::ENTITY,$entity);
    $c->add(sfPhotoGalleryPeer::ENTITY_ID,$entity_id);
    $c->setIgnoreCase( true );
    $photos=sfPhotoGalleryPeer::doSelect($c);
    if (count($photos)>0) {
      foreach ($photos as $photo) {
	$images[]=array(
			'real_name'=>$photo->getRealName(),
			'options'=>array('title'=>$photo->getDescription())
			);
      }
    }
    return $images;
  }
}
