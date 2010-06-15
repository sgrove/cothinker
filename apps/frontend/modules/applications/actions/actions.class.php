<?php

/**
 * applications actions.
 *
 * @package    cothink
 * @subpackage applications
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class applicationsActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('default', 'module');
  }
  
  public function executeApplicationBrowser()
  {
    $this->forward404Unless($this->getRequest()->isXMLHttpRequest(), 'Not an XMLHttp request, not authorized');
    $this->forward404Unless($this->position = ProjectPositionPeer::retrieveByUuid($this->getRequestParameter('position')), 'Position not found');
    
    $this->project = $this->position->getProject();
    
    $this->forward404Unless($this->getUser()->isAuthenticated() && $this->project->isAuthorized('handle-applications', $this->getUser()->getId()), 'User not logged in or does not have permission to handle applications');
  }
  
  public function executeApplicationViewer()
  {
    $this->forward404Unless($this->application = PositionApplicationPeer::retrieveByUuid($this->getRequestParameter('application')));
  }

  public function executeAjaxAccept()
  {
	// TODO: Secure
	$application = PositionApplicationPeer::retrieveByUuid($this->getRequestParameter('application'));
	$this->forward404Unless($application, 'ProjectApplication not found, unable to accept applicant');
	$position = $application->getProjectPosition();
    $project = $position->getProject();
    $this->forward404Unless($project, 'Project not found, unable to accept applicant');

	$this->logMessage('App_UUID: ['.$this->getRequestParameter('application').'], App_ID: ['.$application->getId().'], app_dump: '.print_r($application, true));

    if ($project->acceptApplicant($application->getId()) == false)
    {
      $this->forward404('Unable to add position, error.');
    }
    
    $this->setTemplate('applicationViewer');
    $this->application = $application;    
  }
  
  public function executeAjaxCloneAndAcceptApplicant()
  {
    $project = ProjectPeer::retrieveByUuid($this->getRequestParameter('project'));
    $this->forward404Unless($project, 'Project not found, unable to accept applicant');

    if ($project->clonePositionAcceptApplicant($this->getRequestParameter('position'), $this->getRequestParameter('user')) == false)
    {
      $this->forward404('Unable to add position, error.');
    }
    
    $this->setTemplate('ajaxAddPosition');
    $this->newPosition = new ProjectPosition();
    $this->project = $project;
  }

}
