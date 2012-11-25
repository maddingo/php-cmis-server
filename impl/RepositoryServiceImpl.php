<?php
include_once(__DIR__.'/../api/RepositoryService.php');
include_once(__DIR__.'/../api/RepositoryEntry.php');
include_once(__DIR__.'/../api/TypeDefinition.php');
include_once(__DIR__.'/ServiceImpl.php');

class RepositoryServiceImpl extends ServiceImpl implements RepositoryService {

	public function __construct() {
	}
	
	public function getRepositories($extension=null) {
		$repo = new RepositoryEntry();
		$repo->repositoryId = 1;
		$repo->repositoryName = 'PHP test Repository';
		
		$this->addExpirationHeader();
		
		return array($repo);
	}
	
	public function getRepositoryInfo($repositoryId, $any=null) {
		$repoInfo = new RepositoryInfo();
		$repoInfo->repositoryId = $repositoryId;
		$repoInfo->repositoryName = "PHP Repo $repositoryId";
		$repoInfo->repositoryDescription = "Description";
		$repoInfo->vendorName ="Test";
		$repoInfo->productName = "Prod Name";
		$repoInfo->productVersion ="Prod Version";
		$repoInfo->rootFolderId ="1";
	
		$caps = new RepositoryCapabilities();
		$repoInfo->capabilities = $caps;
		$this->addExpirationHeader();
		
		$ret = new stdClass();
		$ret->repositoryInfo = $repoInfo;
		return $ret;
	}
	
	public function getTypeChildren() {
		echo "aaa";
	}
	
	public function getTypeDefinition($repositoryId, $typeId, $any=null) {
		$type = new TypeDefinition();
		switch($typeId) {
			case 'cmis:document':
			case 'cmis:folder':
			case 'cmis:policy':
			case 'cmis:relationship':
				$baseId = $typeId;
				break;
			default:
				throw new Exception("unknown typeId: $typeId for repository $repositoryId");
				break;
		}
		$type->baseId = $baseId;
		
		$ret = new stdClass();
		$ret->type = $type;
		echo $ret;
	}
	
	public function getTypeDescendants() {
		echo "aaa";
	}
}