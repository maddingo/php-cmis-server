<?php
class RepositoryCapabilities {

	/**
	 * @var object CapabilityContentStreamUpdates
	 */
	public $capabilityContentStreamUpdatability;
	
	/**
	 * @var object CapabilityChanges
	 */
	public $capabilityChanges;
	
	/**
	 * @var object CapabilityRenditions
	 */
	public $capabilityRenditions;

	/**
	 * @var boolean
	 */
	public $capabilityGetDescendants;
	
	/**
	 * @var boolean
	 */
	public $capabilityGetFolderTree;

	/**
	 * @var boolean 
	 */
	public $capabilityMultifiling;
	
	/**
	 * @var boolean
	 */
	public $capabilityUnfiling;
	
	/**
	 * @var boolean
	 */
	public $capabilityVersionSpecificFiling;

	/**
	 * @var boolean
	 */
	public $capabilityPWCSearchable;
	
	/**
	 * @var boolean
	 */
	public $capabilityPWCUpdatable;
	
	/**
	 * @var boolean
	 */
	public $capabilityAllVersionsSearchable;

	/**
	 * @var object CapabilityQuery 
	 */
	public $capabilityQuery;
	
	 /**
	  * @var object CapabilityJoin 
	  */
	public $capabilityJoin;

	/**
	 * @var object CapabilityAcl
	 */ 
	public $capabilityACL;
	
}