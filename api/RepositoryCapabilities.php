<?php
class RepositoryCapabilities {

	/**
	 * @var object CapabilityContentStreamUpdates
	 */
	public $capabilityContentStreamUpdatability=null;
	
	/**
	 * @var object CapabilityChanges
	 */
	public $capabilityChanges=null;
	
	/**
	 * @var object CapabilityRenditions
	 */
	public $capabilityRenditions=null;

	/**
	 * @var boolean
	 */
	public $capabilityGetDescendants=false;
	
	/**
	 * @var boolean
	 */
	public $capabilityGetFolderTree=false;

	/**
	 * @var boolean 
	 */
	public $capabilityMultifiling=false;
	
	/**
	 * @var boolean
	 */
	public $capabilityUnfiling=false;
	
	/**
	 * @var boolean
	 */
	public $capabilityVersionSpecificFiling=false;

	/**
	 * @var boolean
	 */
	public $capabilityPWCSearchable=false;
	
	/**
	 * @var boolean
	 */
	public $capabilityPWCUpdatable=false;
	
	/**
	 * @var boolean
	 */
	public $capabilityAllVersionsSearchable=false;

	/**
	 * @var object CapabilityQuery 
	 */
	public $capabilityQuery=null;
	
	 /**
	  * @var object CapabilityJoin 
	  */
	public $capabilityJoin=null;

	/**
	 * @var object CapabilityAcl
	 */ 
	public $capabilityACL=null;
	
}