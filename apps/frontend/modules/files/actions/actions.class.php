<?php

/**
 * files actions.
 *
 * @package    cothink
 * @subpackage files
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class filesActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('files', 'list');
  }

  public function executeList()
  {
    $this->file = sfFileGalleryPeer::doSelect(new Criteria());
  }

  public function executeShow()
  {
    $this->file = sfFileGalleryPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->file);
  }

  public function executeCreate()
  {
    $this->file = new sfFileGallery();
  }

  public function executeEdit()
  {
    $this->file = sfFileGalleryPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->file);
  }

  public function executeUpdate()
  {
    if (!$this->getRequestParameter('id'))
    {
      $file = new sfFileGallery();
    }
    else
    {
      $file = sfFileGalleryPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($file);
    }

    $file->setId($this->getRequestParameter('id'));
    $file->setEntity($this->getRequestParameter('entity'));
    $file->setEntityId($this->getRequestParameter('entity_id'));
    $file->setName($this->getRequestParameter('name'));
    $file->setTitle($this->getRequestParameter('title'));
    $file->setDescription($this->getRequestParameter('description'));

    $file->save();

    return $this->redirect('file/show?id='.$file->getId());
  }

  public function executeInsert()
  {

    // Qui ci arrivo solo se ho passato il validate
    // Quindi non devo fare controlli ...
    $file_name=$this->getRequest()->getFileName('file');
    $file_info=$this->getRequest()->getFile('file');
    $type=$file_info['type'];
    
    // Operazioni per il DB
    $file = new sfFileGallery();
    $file->setEntity($this->getRequestParameter('entity'));
    $file->setEntityId($this->getRequestParameter('entity_id'));
    $file->setName($file_name);
    $file->setMimeType($type);
    $file->setSize($file_info['size']);
    #$file->setSuffix($suffix);
    $file->setTitle($this->getRequestParameter('title'));
    $file->setDescription($this->getRequestParameter('description'));
    $file->setUploadedBy($this->getUser()->getId());
    $file->save();
    
    // UUID isn't correct until we reretrieve it
    $file = sfFileGalleryPeer::retrieveByPk($file->getId());

    //Operazioni per salvare il file in upload:
    $filePath = sfConfig::get('sf_upload_dir').'/files/'.$file->getUuid();
    $this->getRequest()->moveFile('file', $filePath);
    
    // Fai il redirect dal referrer (TODO: oppure chiuditi come ajax)
    return $this->redirect($this->getRequestParameter('referer'));
  }

  public function executeDelete()
  {
    $file = sfFileGalleryPeer::retrieveByPk($this->getRequestParameter('id'));

    $this->forward404Unless($file);

    $file->delete();

    return $this->redirect('file/list');
  }
  
  public function executeFileBrowser()
  {
    $filter = $this->getRequestParameter('filter');
    $category = $this->getRequestParameter('category');
    $type = $this->getRequestParameter('type');
    $object_uuid = $this->getRequestParameter('id');
    
    
    if ($type == 'task') {  $object = TaskPeer::retrieveByUuid($object_uuid); }
    
    $this->files = sfFileGalleryPeer::getFiles($type, $object->getId());
  }  
  
  /**
   * Executes Download action
   *
   */
  public function executeDownload()
  {
    $this->forward404Unless($fileInfo = sfFileGalleryPeer::retrieveByUuid($this->getRequestParameter('id')));

    $filePath = sfConfig::get('sf_upload_dir').'/files/'.$fileInfo->getUuid();

    if(!is_file($filePath))
      $this->forward404('No file found at ['.$filePath.']');

    $this->getResponse()->clearHttpHeaders();
    $this->getResponse()->addCacheControlHttpHeader("Cache-control","private");
    $this->getResponse()->setHttpHeader("Content-Description","File Transfer");
    $this->getResponse()->setContentType('application/octet-stream',TRUE);
    $this->getResponse()->setHttpHeader("Content-Length",(string) filesize($filePath), TRUE);
    $this->getResponse()->setHttpHeader('content-transfer-encoding', 'binary', TRUE);
    $this->getResponse()->setHttpHeader("Content-Disposition","attachment; filename=".urlencode($fileInfo->getName()), TRUE);
    $this->getResponse()->sendHttpHeaders();

    $fp=fopen($filePath,'rb');

    while(!feof($fp)){
      set_time_limit(0);
      $buffer=fread($fp,1024*1024); // can set amount to read lower, this is just an example.
      echo $buffer;
      ob_flush();
      flush();
    }
    fclose($fp);

    return sfView::NONE;
  }
  
}
