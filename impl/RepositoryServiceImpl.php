<?php
include_once(__DIR__.'/../api/RepositoryService.php');

class RepositoryServiceImpl implements RepositoryService {
	
	public function __construct() {
		
	}
	
	public function getRepositories($extension=null) {
		$ret = new stdClass();
		$ret->repositories = array();
		$repo = new stdClass();
		$repo->repositoryId = 1;
		$repo->repositoryName = 'PHP test Repository';
		$ret->repositories[] = $repo;
		
		$now = new DateTime();
		$tomorrow = new DateTime();
		$tomorrow->add(new DateInterval('P1D'));
		$createdDate = $now->format('Y-m-d\TH:i:s\Z');
		$expiredDate = $tomorrow->format('Y-m-d\TH:i:s\Z');
		$headerData = new SoapVar("<Security xmlns=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd\"><Timestamp xmlns=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd\">
				<Created>$createdDate</Created>
				<Expires>$expiredDate</Expires>
				</Timestamp></Security>", XSD_ANYXML);
		$soapHeader = new SoapHeader('http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd', 'Security', $headerData);
		//$soapHeader = new SoapHeader("http://docs.oasis-open.org/ns/cmis/ws/200908/", "Security", "AAAA");
		//$server->addSoapHeader($soapHeader);
		
		$GLOBALS['server']->addSoapHeader($soapHeader);
		
		return $ret;
	}
	
	public function getRepositoryInfo($repositoryId, $any=null) {
		$ret = new stdClass();
		$ret->repositoryInfo = new RepositoryInfo();
		$ret->repositoryInfo->repositoryId = $repositoryId;
		$ret->repositoryInfo->repositoryName = "PHP Repo $repositoryId";
		$ret->repositoryInfo->repositoryDescription = "Description";
		$ret->repositoryInfo->vendorName ="Test";
		$ret->repositoryInfo->productName = "Prod Name";
		$ret->repositoryInfo->productVersion ="Prod Version";
		$ret->repositoryInfo->rootFolderId ="1";
		$ret->repositoryInfo->capabilities = new RepositoryCapabilities();
		
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