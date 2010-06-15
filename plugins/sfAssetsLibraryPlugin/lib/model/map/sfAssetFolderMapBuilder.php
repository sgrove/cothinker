<?php



class sfAssetFolderMapBuilder {

	
	const CLASS_NAME = 'plugins.sfAssetsLibraryPlugin.lib.model.map.sfAssetFolderMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_asset_folder');
		$tMap->setPhpName('sfAssetFolder');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TREE_LEFT', 'TreeLeft', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TREE_RIGHT', 'TreeRight', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TREE_PARENT', 'TreeParent', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('STATIC_SCOPE', 'StaticScope', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('RELATIVE_PATH', 'RelativePath', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 