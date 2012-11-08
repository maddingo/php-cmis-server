<?php
include_once(__DIR__.'/../api/RepositoryService.php');
include_once(__DIR__.'/../api/RepositoryEntry.php');
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
		$repoInfo->capabilities = new RepositoryCapabilities();
		
		$this->addExpirationHeader();
		
		return array('repositoryInfo' => $repoInfo);
	}
	
	public function getTypeChildren() {
		echo "aaa";
	}
	
	public function getTypeDefinition() {
		echo "aaa";
	}
	
	public function getTypeDescendants() {
		echo "aaa";
	}
}