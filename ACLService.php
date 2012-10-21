<?php

interface ACLService {
	
	 /**
	  * @param int $repositoryId
	  * @param int $objectId
	  * @param unknown_type $addACEs
	  * @param unknown_type $removeACEs
	  * @param unknown_type $ACLPropagation
	  * @param unknown_type $extension
	  */
	function applyACL($repositoryId, $objectId, $addACEs, $removeACEs, $ACLPropagation, $extension);
	
	
	/**
	  * @param int $repositoryId
	  * @param int $objectId
	  * @param unknown_type $onlyBasicPersmission
	  * @param unknown_type $extension
	 */
	function getACL($repositoryId, $objectId, $onlyBasicPermissions, $extension);
}
