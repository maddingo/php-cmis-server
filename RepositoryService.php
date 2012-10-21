<?php
class RepositoryEntryType {
	public $repositoryId; // string
	public $repositoryName; // string
	public $any; // <anyXML>
}

interface RepositoryService {

	function getRepositories();
	
	/**
	 * @param string $repositoryId
	 */
	function getRepositoryInfo($repositoryId);
	
	function getTypeChildren();
	function getTypeDefinition();	
	function getTypeDescendants();
}
