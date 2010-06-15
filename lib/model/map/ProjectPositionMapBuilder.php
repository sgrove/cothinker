<?php



class ProjectPositionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ProjectPositionMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('ct_project_position');
		$tMap->setPhpName('ProjectPosition');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UUID', 'Uuid', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addForeignKey('PROJECT_ID', 'ProjectId', 'int', CreoleTypes::INTEGER, 'ct_project', 'ID', true, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('QUALIFICATIONS', 'Qualifications', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('DEADLINE', 'Deadline', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('WEEKLY_HOURS', 'WeeklyHours', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('STATUS', 'Status', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FILLED', 'Filled', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('MILESTONE_COUNT', 'MilestoneCount', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('CAMPUS_PREFERENCE', 'CampusPreference', 'int', CreoleTypes::INTEGER, 'ct_campus', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 