<?php



class ProjectFormMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ProjectFormMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ct_project_form');
		$tMap->setPhpName('ProjectForm');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('PROJECT_ID', 'ProjectId', 'int', CreoleTypes::INTEGER, 'ct_project', 'ID', true, null);

		$tMap->addColumn('UUID', 'Uuid', 'string', CreoleTypes::VARCHAR, true, 36);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('SETTING', 'Setting', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('WIDGET_1', 'Widget1', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('WIGEST_1_SETTING', 'Wigest1Setting', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('WIDGET_2', 'Widget2', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('WIGEST_2_SETTING', 'Wigest2Setting', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('WIDGET_3', 'Widget3', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('WIGEST_3_SETTING', 'Wigest3Setting', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('WIDGET_4', 'Widget4', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('WIGEST_4_SETTING', 'Wigest4Setting', 'string', CreoleTypes::LONGVARCHAR, false, null);

	} 
} 