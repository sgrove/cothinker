<?php

/**
 * home actions.
 *
 * @package    cothink
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class homeActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    if ($this->getUser()->isAuthenticated())
    {
      $this->redirect('@show_user_personal');
      return sfView::SUCCESS;
    }
    
    $this->departments = DepartmentPeer::doSelect(new Criteria());
    //$this->forward('default', 'module');
  }
  
  public function executeSandbox()
  {
        $this->forward404Unless($this->project = ProjectPeer::retrieveByPk('5'));
        //echo $this->project->getTitle();
        
        $this->user = sfGuardUserPeer::retrieveByUsername('sgrove@cothink.org');

        $form = $this->project->getForm('main');

        if ($form == null) {
          $this->project->setForm('main', 'default');
        }
        

        $campuses[] = array("id" => "085d234b-9cce-6414-2df5-c902c4d1b2da", "rank" => "1",  "name" => "UC Berkeley");
        $campuses[] = array("id" => "544655f7-64fd-6a34-b535-8a9ebb3c2816", "rank" => "2",  "name" => "Other");
        $campuses[] = array("id" => "62bbecdf-f338-c6e4-d986-dbea5bdf856f", "rank" => "3",  "name" => "UC Los Angeles");
        $campuses[] = array("id" => "d3cb5d6b-cadb-9ff4-a1ef-53fe6760dc14", "rank" => "4",  "name" => "Orange Coast College");
        $campuses[] = array("id" => "c39f272a-a4bb-b414-7514-a7ed6572056b", "rank" => "5",  "name" => "Cothink Campus");
        $campuses[] = array("id" => "923fc92a-45b1-93f4-2d4b-fcce698f8a49", "rank" => "6",  "name" => "Any Campus");
        $campuses[] = array("id" => "c43340c1-5bb6-6134-ede4-a9a134e986cb", "rank" => "7",  "name" => "UC Santa Barbara");
        $campuses[] = array("id" => "ea0b9d54-8206-d334-9d47-c15b69b6c5ba", "rank" => "8",  "name" => "UC Santa Cruz");
        $campuses[] = array("id" => "0d3cd035-8640-7584-85fe-45df2e4756ce", "rank" => "9",  "name" => "Saddleback College");
        $campuses[] = array("id" => "13d97531-a57d-9a24-3971-13fd35db51fb", "rank" => "10", "name" => "UC San Francisco");
        $campuses[] = array("id" => "1a5cc505-0f46-9c74-bd05-e966c891e43d", "rank" => "11", "name" => "UC San Diego");
        $campuses[] = array("id" => "844fbc24-0600-a484-1996-ee8df871ac3d", "rank" => "12", "name" => "UC Riverside");
        $campuses[] = array("id" => "ef059e4f-4463-d924-15c5-ed99fb6ea085", "rank" => "13", "name" => "UC Merced");
        $campuses[] = array("id" => "7be5b4e4-5a6f-7d84-49ef-f000ecf0ade4", "rank" => "14", "name" => "UC Los Angeles");
        $campuses[] = array("id" => "ad73ea61-2374-d1a4-955a-59891021d533", "rank" => "15", "name" => "UC Davis");
        $campuses[] = array("id" => "9c85ebc8-a936-58c4-ad85-af60991fbd18", "rank" => "16", "name" => "UC Irvine");
        $campuses[] = array("id" => "cbad54e6-d87a-cef4-c9ad-d5a9776639ac", "rank" => "17", "name" => "Google Campus");
                
        $this->getUser()->setAttribute('campus_list', $campuses);
        
        $this->campuses = CampusPeer::doSelect(new Criteria());
        
        
        //$this->project = new Project();
  }
  
  /**
   * Executes Sandbox2 action
   *
   */
  public function executeSandbox2()
  {
    
    $this->forward404Unless($this->project = ProjectPeer::retrieveBySlug($this->getRequestParameter('project')), 'Project not found');
    $this->forward404Unless($this->getUser()->isAuthenticated() && $this->project->isAdmin($this->getUser()->getId()));
    
    
    $form = $this->project->getForm($this->getRequestParameter('form'));
    if ($form == null) {
      $this->project->setDefaultForm($this->getRequestParameter('form'));
    }
    
    
    $area = $this->getRequestParameter('area');
    
    $widget = $this->getRequestParameter('id');
    $widget = explode('_', $widget);
    $widget = $widget[0];
    $setting = $this->getRequestParameter('setting');

    switch ($area) {
      case '1':
        $form->setWidget1($widget);
        if (isset($setting)) {
          $form->setWidget1Setting($this->getRequestParameter('setting'));
        }
        $form->save();
        break;

      case '2':
        $form->setWidget2($widget);
        if (isset($setting)) {
          $form->setWidget2Setting($this->getRequestParameter('setting'));
        }
        $form->save();
        break;
    
      case '3':
        $form->setWidget3($widget);
        if (isset($setting)) {
          $form->setWidget3Setting($this->getRequestParameter('setting'));
        }
        $form->save();
        break;

      case '4':
        $form->setWidget4($widget);
        if (isset($setting)) {
          $form->setWidget4Setting($this->getRequestParameter('setting'));
        }
        $form->save();
        break;
    }
    
    $this->area = $area;
    $this->widget = $widget;
    $this->form = $form;
  }
  
  /**
   * Executes zebSandbox action
   *
   */
  public function executeZebSandbox()
  {
    $this->forward404Unless($this->project_app = ProjectApplicationPeer::retrieveByPk('26'));
    
    $this->user = sfGuardUserPeer::retrieveByUsername('zspade@cothink.org');  
  }
  
  public function executeFrontpage()
  {
    
  }
  
  public function executeLanguageUpdate()
  {
    $culture = $this->getRequestParameter('culture', 'en_US');
    $this->getUser()->setCulture($culture);
    
    $referer = $this->getUser()->getAttribute('referer', $this->getRequest()->getReferer());
    $this->redirect($referer);
  }

  public function getProducts()
  {
	  return array('1', '2', '3', '4');
  }

  public function executeAddItem()
  {
	  $this->id = $this->getRequestParameter('id', 'no-id');
	  $tmp = split('_', $this->getRequestParameter('id', ''));
	  $product_id = $tmp[1];
 
	  $cart = $this->getUser()->getAttribute('cart');
	  if (!isset($cart[$product_id--]))
	  {
	    $cart[$product_id--] = 1;
	  }
	  else
	  {
	    ++$cart[$product_id--];
	  }
	  $this->getUser()->setAttribute('cart', $cart);
	  $this->products = $this->getProducts();

	  $this->id .= '['.$product_id.']';
  }

  public function executeTos()
  {
  }
}
