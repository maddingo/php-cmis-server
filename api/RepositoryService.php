<?php
include_once('RepositoryInfo.php');
include_once('RepositoryCapabilities.php');
include_once('ACLCapability.php');
include_once('BaseObjectTypeId.php');

interface RepositoryService {
	/*
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
	
	function getTypeChildren();
	function getTypeDefinition();	
	function getTypeDescendants();
}
