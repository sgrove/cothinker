<?php



class ProjectApplicationMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ProjectApplicationMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ct_project_application');
		$tMap->setPhpName('ProjectApplication');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UUID', 'Uuid', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addForeignKey('OWNER_ID', 'OwnerId', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addForeignKey('DEPARTMENT_ID', 'DepartmentId', 'int', CreoleTypes::INTEGER, 'ct_department', 'ID', true, null);

		$tMap->addForeignKey('CAMPUS_ID', 'CampusId', 'int', CreoleTypes::INTEGER, 'ct_campus', 'ID', false, null);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PICTURE', 'Picture', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('SLUG', 'Slug', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('NOTES', 'Notes', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('COMMUNITY_BENEFITS', 'CommunityBenefits', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('STUDENT_REASONS', 'StudentReasons', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('KEYWORDS', 'Keywords', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('BEGIN', 'Begin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FINISH', 'Finish', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('BUDGET', 'Budget', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('STATUS', 'Status', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('APPLICATIONS', 'Applications', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('SEASON', 'Season', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('LENGTH', 'Length', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PREFERRED_TERM_LENGTH', 'PreferredTermLength', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('YEAR', 'Year', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('SCALE', 'Scale', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('COMMITMENT', 'Commitment', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('GOALS', 'Goals', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('GOALS_COMPLETE', 'GoalsComplete', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('HOURS_WEEKLY', 'HoursWeekly', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('HOURS_TOTAL', 'HoursTotal', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PUBLISHED', 'Published', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('FLAGGED_AUP', 'FlaggedAup', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('FLAGGED_HELP', 'FlaggedHelp', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PAGE1_COMPLETE', 'Page1Complete', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PAGE2_COMPLETE', 'Page2Complete', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PAGE3_COMPLETE', 'Page3Complete', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PAGE4_COMPLETE', 'Page4Complete', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('LIABILITY', 'Liability', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('LIABILITY_DETAILS', 'LiabilityDetails', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('PROFIT', 'Profit', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PROFIT_DETAILS', 'ProfitDetails', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('IS_APPROVED', 'IsApproved', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('POINTS', 'Points', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('APPROVED_BY', 'ApprovedBy', 'string', CreoleTypes::VARCHAR, false, 36);

		$tMap->addColumn('HITS', 'Hits', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('VERSION', 'Version', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 