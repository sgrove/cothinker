<?php

// include project configuration
include(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

// symfony bootstraping
require_once($sf_symfony_lib_dir.'/util/sfCore.class.php');
sfCore::bootstrap($sf_symfony_lib_dir, $sf_symfony_data_dir);

sfPropelBehavior::add('Project', array('versionable'));
sfPropelBehavior::add('Project', array('sfPropelUuidBehavior'));
sfPropelBehavior::add('Project', array('paranoid' => array('column' => 'deleted_at')));
sfPropelBehavior::add('Project', array('sfPropelActAsCountableBehavior'));
sfPropelBehavior::add('Project', array('sfPropelActAsTaggableBehavior'));
//sfPropelBehavior::add('Project', array('sfPropelApprovableBehavior'));

/*
$columns_map = array('from'   => ProjectPeer::TITLE,
                     'to'     => ProjectPeer::SLUG);
sfPropelBehavior::add('Project', 
                    array('sfPropelActAsSluggableBehavior' => 
                      array('columns'   => $columns_map, 
                            'separator' => '_', 
                            'permanent' => false)));
*/