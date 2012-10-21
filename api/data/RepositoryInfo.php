<?php
class RepositoryInfo {
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
	protected $repositoryDescription;
	
	/**
	 * @var string
	 */
	protected $vendorName;
	
	/**
	 * @var string
	 */
	protected $productName;
	
	/**
	 * @var string
	 */
	protected $productVersion;
	
	/**
	 * @var string
	 */
	protected $rootFolderId;
	
	/**
	 * @var string
	 */
	protected $latestChangeLogToken;
	
	/**
	 * @var object RepositoryCapabilities
	 */
	protected $capabilities;
	
	/**
	 * @var object ACLCapability
	 */
	protected $aclCapability;
	
	/**
	 * @var string
	 */
	protected $cmisVersionSupported;

	/**
	 * @var string
	 */
	protected $thinClientURI;
	
	/**
	 * @var boolean
	 */
	protected $changesIncomplete;
	
	/**
	 * List of EnumBaseObjectTypeIds
	 * @var object BaseObjectTypeId
	 */
	protected $changesOnType;
	
	/**
	 * @var string
	 */
	protected $principalAnonymous;
	
	/**
	 * @var string
	 */
	protected $principalAnyone;
	
	/**
	 * @var unknown_type
	 */
	protected $any;
	
	/**
	 * Any attribute, map of attributes
	 * @var unkown_type
	 */
	public $otherAttributes;
	
}