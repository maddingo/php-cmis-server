<?php
include_once(__DIR__.'/ExtensionData.php');

class RepositoryInfo extends ExtensionData {
	/**
	 * 
	 * @var string
	 */
	public $repositoryId;
	
	/**
	 * @var string
	 */
	public $repositoryName;
	
	/**
	 * @var string
	 */
	public $repositoryDescription;
	
	/**
	 * @var string
	 */
	public $vendorName;
	
	/**
	 * @var string
	 */
	public $productName;
	
	/**
	 * @var string
	 */
	public $productVersion;
	
	/**
	 * @var string
	 */
	public $rootFolderId;
	
	/**
	 * @var string
	 */
	public $latestChangeLogToken;
	
	/**
	 * @var object RepositoryCapabilities
	 */
	public $capabilities;
	
	/**
	 * @var object ACLCapability
	 */
	public $aclCapability;
	
	/**
	 * @var string
	 */
	public $cmisVersionSupported;

	/**
	 * @var string
	 */
	public $thinClientURI;
	
	/**
	 * @var boolean
	 */
	public $changesIncomplete;
	
	/**
	 * List of EnumBaseObjectTypeIds
	 * @var object BaseObjectTypeId
	 */
	public $changesOnType;
	
	/**
	 * @var string
	 */
	public $principalAnonymous;
	
	/**
	 * @var string
	 */
	public $principalAnyone;
	
	/**
	 * @var unknown_type
	 */
	public $any;
	
	/**
	 * Any attribute, map of attributes
	 * @var unknown_type
	 */
	public $otherAttributes;
	
}