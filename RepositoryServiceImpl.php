<?php
include_once('RepositoryService.php');

class RepositoryServiceImpl implements RepositoryService {
	
	public function __construct() {
		
	}
	
	public function getRepositories() {
		$ret = new stdClass();
		$ret->repositories = array();
		$repo = new stdClass();
		$repo->repositoryId = 1;
		$repo->repositoryName = 'PHP test Repository';
		$ret->repositories[] = $repo;
		return $ret;
	}
	
	public function getRepositoryInfo($repositoryId) {
		$ret = new stdClass();
		$ret->repositoryInfo = new stdClass();
		$ret->repositoryInfo->repositoryId = $repositoryId;
		$ret->repositoryInfo->repositoryName = "PHP Repo $repositoryId";
		
		return $ret;
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