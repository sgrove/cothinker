<?php
// auto-generated by sfPropelCrud
// date: 2008/04/21 22:32:09
?>
<?php

require_once(SF_ROOT_DIR.'/plugins/sfPhotoGalleryPlugin/lib/sfPhotoGalleryDefault.php');

/**
 * photo actions.
 *
 * @package    micar
 * @subpackage photo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class sfPhotoGalleryActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('photo', 'list');
  }

  public function executeList()
  {
    $this->photos = sfPhotoGalleryPeer::doSelect(new Criteria());
  }

  public function executeShow()
  {
    $this->photo = sfPhotoGalleryPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->photo);
  }

  public function executeCreate()
  {
    $this->photo = new sfPhotoGallery();
  }

  public function executeEdit()
  {
    $this->photo = sfPhotoGalleryPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->photo);
  }

  public function executeUpdate()
  {
    if (!$this->getRequestParameter('id'))
    {
      $photo = new sfPhotoGallery();
    }
    else
    {
      $photo = sfPhotoGalleryPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($photo);
    }

    $photo->setId($this->getRequestParameter('id'));
    $photo->setEntity($this->getRequestParameter('entity'));
    $photo->setEntityId($this->getRequestParameter('entity_id'));
    $photo->setName($this->getRequestParameter('name'));
    $photo->setTitle($this->getRequestParameter('title'));
    $photo->setDescription($this->getRequestParameter('description'));

    $photo->save();

    return $this->redirect('photo/show?id='.$photo->getId());
  }

  public function executeInsert()
  {
    $user = $this->getContext()->getInstance()->getUser();
    $referer = $user->getAttribute('referer', $this->getRequest()->getReferer());


    // Qui ci arrivo solo se ho passato il validate
    // Quindi non devo fare controlli ...
    $file_name=$this->getRequest()->getFileName('file');
    $file_info=$this->getRequest()->getFile('file');
    $type=$file_info['type'];
    
    // Trova il suffisso (jpg,gif,png)
    if (eregi('gif',$type)) $suffix='gif';
    if (eregi('jpg|jpeg',$type)) $suffix='jpg';
    if (eregi('png',$type)) $suffix='png';


    // Operazioni per il DB
    $photo = new sfPhotoGallery();
    $photo->setEntity($this->getRequestParameter('entity'));
    $photo->setEntityId($this->getRequestParameter('entity_id'));
    $photo->setName($file_name);
    $photo->setMimeType($type);
    $photo->setSize($file_info['size']);
    $photo->setSuffix($suffix);
    $photo->setTitle($this->getRequestParameter('title'));
    $photo->setDescription($this->getRequestParameter('description'));
    $photo->save();

    $scale = true;
    $options = array();
    
    if (strtolower($this->getRequestParameter('entity')) == 'project')
    {
      $scale = false;
      $options['method'] = 'shave';
    }
    //Operazioni per salvare il file in upload:
    $this->getRequest()->moveFile('file', sfConfig::get('sf_upload_dir').'/photos/'.$photo->getRealName());

    //Creazione della thumb
    
    $thumbnail = new sfThumbnail(25,25, $scale, true, 100, null, $options);
    $thumbnail->loadFile(sfConfig::get('sf_upload_dir').'/photos/'.$photo->getRealName());
    $thumbnail->save(sfConfig::get('sf_upload_dir').'/thumbnails/tiny/'.$photo->getRealName(), 'image/png');
    
    
    
    $thumbnail = new sfThumbnail(50,50, $scale, true, 100, null, $options);
    $thumbnail->loadFile(sfConfig::get('sf_upload_dir').'/photos/'.$photo->getRealName());
    $thumbnail->save(sfConfig::get('sf_upload_dir').'/thumbnails/small/'.$photo->getRealName(), 'image/png');
    
    
    $thumbnail = new sfThumbnail(100,100, $scale, true, 100, null, $options);
    $thumbnail->loadFile(sfConfig::get('sf_upload_dir').'/photos/'.$photo->getRealName());
    $thumbnail->save(sfConfig::get('sf_upload_dir').'/thumbnails/medium/'.$photo->getRealName(), 'image/png');
    
    
    $thumbnail = new sfThumbnail(125,125, $scale, true, 100, null, $options);
    $thumbnail->loadFile(sfConfig::get('sf_upload_dir').'/photos/'.$photo->getRealName());
    $thumbnail->save(sfConfig::get('sf_upload_dir').'/thumbnails/large/'.$photo->getRealName(), 'image/png');

    
    $thumbnail = new sfThumbnail(640,640);
    $thumbnail->loadFile(sfConfig::get('sf_upload_dir').'/photos/'.$photo->getRealName());
    $thumbnail->save(sfConfig::get('sf_upload_dir').'/photos/standard/'.$photo->getRealName(), 'image/png');
    
    // Fai il redirect dal referrer (TODO: oppure chiuditi come ajax)
    return $this->redirect($referer);
  }

  public function executeDelete()
  {
    $photo = sfPhotoGalleryPeer::retrieveByPk($this->getRequestParameter('id'));

    $this->forward404Unless($photo);

    $photo->delete();

    return $this->redirect('photo/list');
  }
  
  public function handleErrorInsert()
  {
    $user = $this->getContext()->getInstance()->getUser();
    if (!$user->hasAttribute('referer'))
    {
      $user->setAttribute('referer', $this->getRequest()->getReferer());
    }

    if ($this->getModuleName() != ($module = ('sfPhotoGallery')))
    {
      return $this->redirect($module.'/create');
    }
    
    $this->photo = new sfPhotoGallery();

    $this->setTemplate('create');
    
    return sfView::SUCCESS;

    $this->getResponse()->setStatusCode(401);
  }
}
