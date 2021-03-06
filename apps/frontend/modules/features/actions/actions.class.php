<?php
// auto-generated by sfPropelCrud
// date: 2008/06/07 23:07:24
?>
<?php

/**
 * features actions.
 *
 * @package    cothink
 * @subpackage features
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class featuresActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('features', 'list');
  }

  public function executeList()
  {
    $title = "Most recent bug reports and feature suggestions";
    $tab = str_replace(' ', '', $this->getRequestParameter('tab', 'mostrecent'));
    
    $c = new Criteria();
    
    if ($tab == 'mostrecent')
    {
      $c->addDescendingOrderByColumn(SuggestedFeaturePeer::CREATED_AT);
    }
    elseif ($tab == 'mostpopular')
    {
      $c2 = new Criteria();
      $c2->add(sfRecommendationPeer::RECOMMENDABLE_MODEL, 'SuggestedFeature');
      $c2->addDescendingOrderByColumn(sfRecommendationPeer::SCORE);
      
      $recommendations = sfRecommendationPeer::doSelect( $c2 );
      
      // this loop has got to be SUPER intensive, it has to change soon
      $features = array();
      foreach($recommendations as $recommended)
      {
        $features[] = SuggestedFeaturePeer::retrieveByPK($recommended->getRecommendableId());
      }
      
      $title = "Most popular bug reports and feature suggestions";
    }
    elseif($tab == 'bugs')
    {
      $c->add(SuggestedFeaturePeer::TYPE, sfConfig::get('app_feature_type_bug'));
      $c->addDescendingOrderByColumn(SuggestedFeaturePeer::CREATED_AT);
      
      $title = 'Bug Reports';
    }
    elseif($tab == 'features')
    {
      $c->add(SuggestedFeaturePeer::TYPE, sfConfig::get('app_feature_type_feature'));
      $c->addDescendingOrderByColumn(SuggestedFeaturePeer::CREATED_AT);
      
      $title = 'Feature Suggestions';
    }
    //This only works while it's not a pager, not a long term solution!
    if (!isset($features))
    {
      $this->features = SuggestedFeaturePeer::doSelect( $c );
    }
    else
    {
      $this->features = $features;
    }
    
    myToolkit::prependPageTitle($title);
    
  }

  public function executeShow()
  {
    $this->feature = SuggestedFeaturePeer::retrieveByUuid($this->getRequestParameter('feature'));
    $this->forward404Unless($this->feature);
  }

  public function executeCreate()
  {
    $this->suggested_feature = new SuggestedFeature();

    $this->setTemplate('edit');
  }
  
  public function executeKwiky()
  {
    $this->feature = new SuggestedFeature();
  }

  public function executeEdit()
  {
    $this->suggested_feature = SuggestedFeaturePeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->suggested_feature);
  }

  public function executeUpdate()
  {
    if (!$this->getRequestParameter('id'))
    {
      $suggested_feature = new SuggestedFeature();
    }
    else
    {
      $suggested_feature = SuggestedFeaturePeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($suggested_feature);
    }

    $suggested_feature->setId($this->getRequestParameter('id'));
    $suggested_feature->setUuid($this->getRequestParameter('uuid'));
    $suggested_feature->setUserId($this->getRequestParameter('user_id') ? $this->getRequestParameter('user_id') : null);
    $suggested_feature->setTitle($this->getRequestParameter('title'));
    $suggested_feature->setSlug($this->getRequestParameter('slug'));
    $suggested_feature->setDescription($this->getRequestParameter('description'));
    $suggested_feature->setStatus($this->getRequestParameter('status'));
    $suggested_feature->setType($this->getRequestParameter('type'));
    $suggested_feature->setFeeling($this->getRequestParameter('feeling'));
    if ($this->getRequestParameter('deleted_at'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('deleted_at'), $this->getUser()->getCulture());
      $suggested_feature->setDeletedAt("$y-$m-$d");
    }

    $suggested_feature->save();

    return $this->redirect('features/show?id='.$suggested_feature->getId());
  }
  
  public function executeSaveNew()
  {
    $this->forward404Unless($this->getUser()->isAuthenticated());
    $user = $this->getContext()->getInstance()->getUser();
    $referer = $user->getAttribute('referer', $this->getRequest()->getReferer());

    $suggested_feature = new SuggestedFeature();
    
    $suggested_feature->setUserId($this->getUser()->getId());
    $suggested_feature->setTitle($this->getRequestParameter('title'));
    $suggested_feature->setDescription($this->getRequestParameter('description'));
    $suggested_feature->setStatus(sfConfig::get('app_feature_status_open'));
    $suggested_feature->setType($this->getRequestParameter('type', sfConfig::get('app_feature_type_feature')));
    $suggested_feature->setCategory($this->getRequestParameter('category'));
    
    $suggested_feature->save();
    
    $suggested_feature->recommend($this->getUser()->getId());
    
    $suggested_feature->getsfGuardUser()->getProfile()->addKarma(sfConfig::get('app_karma_submit_feature_points'));
    
    return $this->redirect($referer);
  }

  public function executeDelete()
  {
    $suggested_feature = SuggestedFeaturePeer::retrieveByPk($this->getRequestParameter('id'));

    $this->forward404Unless($suggested_feature);

    $suggested_feature->delete();

    return $this->redirect('features/list');
  }
  
  public function executeVote()
  {
    $feature = SuggestedFeaturePeer::retrieveByUuid($this->getRequestParameter('feature'));
    $this->forward404Unless($feature, 'Feature not found, unable to vote');
    
    if ($this->getUser()->isAuthenticated())
    {
      $feature->recommend($this->getUser()->getId());
      $feature->getsfGuardUser()->getProfile()->addKarma(sfConfig::get('app_karma_vote_feature_points'));
    }
    
    $this->feature = $feature;
  }
  
  public function handleErrorSaveNew()
  {
    $user = $this->getContext()->getInstance()->getUser();
    if (!$user->hasAttribute('referer'))
    {
      $user->setAttribute('referer', $this->getRequest()->getReferer());
    }

    if ($this->getModuleName() != ($module = ('features')))
    {
      return $this->redirect($module.'/kwiky');
    }
    
    $this->feature = new SuggestedFeature();
    
    $this->setTemplate('kwiky');
    
    return sfView::SUCCESS;

  }
}
