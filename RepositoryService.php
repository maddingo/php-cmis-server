<?php
interface RepositoryService {

	function getRepositories();
	function getRepositoryInfo();
	function getTypeChildren();
	function getTypeDefinition();	
	function getTypeDescendants();
}
