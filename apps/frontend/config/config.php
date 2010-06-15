<?php

// include project configuration
include(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

// symfony bootstraping
require_once($sf_symfony_lib_dir.'/util/sfCore.class.php');
sfCore::bootstrap($sf_symfony_lib_dir, $sf_symfony_data_dir);


sfPropelBehavior::add('Project', array('versionable'));
//sfPropelBehavior::add('Project', array('sfPropelUuidBehavior'));
sfPropelBehavior::add('Project', array('paranoid' => array('column' => 'deleted_at')));
sfPropelBehavior::add('Project', array('sfPropelActAsCountableBehavior'));
sfPropelBehavior::add('Project', array('sfPropelActAsTaggableBehavior'));
/*
sfPropelBehavior::add('Project', 
  array(
    'sfPropelApprovableBehavior' => array(
      'column' => 'is_approved',
      'disabled_applications' => array('backend'),
    )
  ));
sfPropelBehavior::add('sfGuardUser', 
  array(
    'sfPropelApprovableBehavior' => array(
      'column' => 'is_approved',
      'disabled_applications' => array('backend'),
    )
  )
);
*/
sfPropelBehavior::add('sfGuardUserProfile', array('versionable'));
sfPropelBehavior::add('sfGuardUserProfile', array('sfPropelUuidBehavior'));
sfPropelBehavior::add('sfGuardUserProfile', array('paranoid' => array('column' => 'deleted_at')));
