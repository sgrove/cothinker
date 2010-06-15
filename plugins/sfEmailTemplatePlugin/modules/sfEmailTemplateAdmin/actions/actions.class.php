<?php

/**
 * sfEmailTemplateAdmin actions.
 *
 * @package    project
 * @subpackage sfEmailTemplateAdmin
 * @author     voznyaknazar@gmail.com
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class sfEmailTemplateAdminActions extends autosfEmailTemplateAdminActions
{

  protected function getsfEmailTemplateOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $sf_email_template = new sfEmailTemplate();
    }
    else
    {
      $sf_email_template = sfEmailTemplatePeer::retrieveByPk($this->getRequestParameter($id));
      $this->forward404Unless($sf_email_template);
    }

		// delete existing email templates cached file so the changes are applied immediately
    $cache_file = sfConfig::get('sf_root_dir').'/cache/frontend/prod/config/config_db_emailtemplates.yml.php';
    sfToolkit::clearGlob($cache_file);
    $cache_file = sfConfig::get('sf_root_dir').'/cache/backend/prod/config/config_db_emailtemplates.yml.php';
    sfToolkit::clearGlob($cache_file);

    return $sf_email_template;
  }

}
