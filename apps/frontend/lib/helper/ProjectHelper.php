<?php


function select_tag_seasons($name = 'season', $selected = 0)
{
	return select_tag($name, options_for_select(array('0' => 'Winter', '1' => 'Spring', '2' => 'Summer', '3' => 'Fall'), $selected));
}

function select_tag_project_years($name = 'year', $selected = 2008)
{
	return select_tag($name, options_for_select(array('2007' => '2007', '2008' => '2008', '2009' => '2009', '2010' => '2010', '2011' => '2011'), $selected));
}

function select_tag_project_scale($name = 'scale', $selected = 0)
{
	return select_tag($name, options_for_select(array('0' => 'Small', '1' => 'Medium', '2' => 'Large'), $selected));
}

function select_tag_project_commitment($name = 'commitment', $selected = 0)
{
	return select_tag($name, options_for_select(array('0' => 'Firm', '1' => 'Flexible', '2' => 'Highly Flexible'), $selected));
}

function select_tag_project_applications($name = 'applications', $selected = 2)
{
	return select_tag($name, options_for_select(array('0' => 'Positions filled, no longer accepting', '1' => 'Currently Reviewing, not accepting', '2' => 'Accepting'), $selected));
}
