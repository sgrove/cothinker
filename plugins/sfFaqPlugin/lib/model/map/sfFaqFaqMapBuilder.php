<?php



class sfFaqFaqMapBuilder {

	
	const CLASS_NAME = 'plugins.sfFaqPlugin.lib.model.map.sfFaqFaqMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_faq_faq');
		$tMap->setPhpName('sfFaqFaq');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('QUESTION', 'Question', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ANSWER', 'Answer', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addForeignKey('CATEGORY_ID', 'CategoryId', 'int', CreoleTypes::INTEGER, 'sf_faq_category', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 