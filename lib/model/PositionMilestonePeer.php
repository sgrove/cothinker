<?php

/**
 * Subclass for performing query and update operations on the 'ct_position_milestone' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PositionMilestonePeer extends BasePositionMilestonePeer
{
  public static function retrieveSortedByPositionId($position_id, $sort_by, $direction)
  {
    $column = self::DEADLINE;
    
    if ($sort_by == 'created') {
      $column = self::CREATED_AT;
    }
    elseif ($sort_by == 'title') {
      $column = self::TITLE;
    }
    elseif ($sort_by == 'rank') {
      $column = self::RANK;
    }
    
    $c = new Criteria();
    
    if (strtolower($direction) == 'asc') {
      $c->addAscendingOrderByColumn($column);
    }
    else {
      $c->addDescendingOrderByColumn($column);
    }
    
    $c->add(self::POSITION_ID, $position_id);

    return self::doSelect( $c );
  }
}
