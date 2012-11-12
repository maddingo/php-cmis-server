<?php
include_once('RepositoryInfo.php');
include_once('RepositoryCapabilities.php');
include_once('ACLCapability.php');
include_once('BaseObjectTypeId.php');

interface RepositoryService {
	/**
	 * Returns a list of RepositoryEntries
	 * @param unknown_type $extension
	 * @return object RepositoryEntry
	 */
	function getRepositories($extension=null);
	
	/**
	 * @param string $repositoryId
	 * @return object RepositoryInfo
	 */
	function getRepositoryInfo($repositoryId, $any=null);
	
	/**
	 * 
	 * @param string $repositoryId
	 * @param string $typeId
	 * @param unknown_type $any
	 * @return object TypeDefinition
	 */
	function getTypeDefinition($repositoryId, $typeId, $any);
		
	function getTypeChildren();
	
	function getTypeDescendants();
}
