<?php
require_once('lib/php-wsdl-generator/ServiceListPrinter.php');

$soapClasses 	= array(
	'ACLService',
	'DiscoveryService',
	'MultiFilingService',
	'NavigationService',
	'ObjectService',
	'PolicyService',
	'RelationshipService',
	'RepositoryService',
	'VersioningService'
);

$slp = new ServiceListPrinter($soapClasses, "http://docs.oasis-open.org/ns/cmis/ws/200908/");

if ($slp->isNonSoapRequest()) {
	//echo "<pre>";var_dump($slp); echo "</pre>";
	$slp->show();
} else {
	try {
		$soapClass = $slp->getRequestClass();
		$soapImpl = $soapClass.'Impl';
		include_once($soapImpl.'.php');
		$server = new SoapServer(null, array('uri' => "http://docs.oasis-open.org/ns/cmis/ws/200908/", 'style' => SOAP_DOCUMENT, 'use' => SOAP_LITERAL));
		$server->setClass($soapClass);
		$server->handle();
	} catch(Exception $ex) {
		 $slp-fault($ex);
	}
}

