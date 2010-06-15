<?php

/**
 * Subclass for representing a row from the 'ct_featured_project' table.
 *
 * 
 *
 * @package lib.model
 */ 
class FeaturedProject extends BaseFeaturedProject
{
}

sfPropelBehavior::add('FeaturedProject', array('sfPropelActAsCommentableBehavior'));
sfPropelBehavior::add('FeaturedProject', array('sfPropelUuidBehavior'));