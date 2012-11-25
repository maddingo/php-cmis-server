<?php
class WSDispatcher {
	private $wsdl;
	private $wsdlDoc;
	private $mappings;
	private $baseUri;

	public function __construct($wsdl, $mappings, $baseUri) {
		$this->wsdl = $wsdl;
		$this->mappings = $mappings;
		$this->baseUri = $baseUri;
	}

	private function isWSDLRequest() {
		return isset($_REQUEST['WSDL']);
	}

	private function getRequestService() {
		if (isset($_SERVER['HTTP_SOAPACTION'])) {
			if (isset($_SERVER['PATH_INFO'])) {
				return substr($_SERVER['PATH_INFO'], 8);
			}
		}
		return false;
	}

	private function showWSDL($contentType=false) {
		if ($contentType) {
			header("Content-type: $contentType");			
		} else {
			header('Content-type: text/xml');
		}
		if (!isset($this->wsdlDoc)) {
			$doc = new DOMDocument();
			$doc->load($this->wsdl);
			$this->wsdlDoc = $this->updateEndpointAddress($doc);
		}
		echo $this->wsdlDoc->saveXML();
	}
	
	private function updateEndpointAddress($docSrc) {
		$addressNodes = $docSrc->documentElement->getElementsByTagNameNS('http://schemas.xmlsoap.org/wsdl/soap/', 'address');
		for ($i=0; $i < $addressNodes->length; $i++) {
			$node = $addressNodes->item($i);
			$location = $node->attributes->getNamedItem('location');	
			$val = $location->nodeValue;
			$newVal = preg_replace('/http:\/\/localhost(.*)/', "{$this->baseUri}\$1", $val);
			$location->nodeValue = $newVal;		
		}
		return $docSrc;	
	}
	
	private function showSummary() {
		//echo '<h1>Summery</h1>';
		//header('Content-Type: text/html');
		$this->showWSDL();
		//$xslt = new XSLTProcessor();
		//$xslt->importStylesheet($stylesheet);
	}
	
	public function dispatch() {
		$service = $this->getRequestService();
		if (!$service) {
			if ($this->isWSDLRequest()) {
				$this->showWSDL();
			} else {
				$this->showSummary();
			}
		} else {
			try {
				global $server;
				$soapImpl = $this->mappings[$service]['class'];
				include_once($this->mappings[$service]['file']);
				
				$serverOpts = array(
						'uri' => "http://docs.oasis-open.org/ns/cmis/ws/200908/",
						'style' => SOAP_DOCUMENT,
						'use' => SOAP_LITERAL,
						'feaures' =>  SOAP_USE_XSI_ARRAY_TYPE,
						'trace' => 1,
						'debug' => 1,
				);
					
				$server = new SoapServer($this->wsdl, $serverOpts);
				$server->setClass($soapImpl);
				$message = $this->unpackMessage();
				$server->handle($message);
			} catch(Exception $ex) {
				$server->fault('Client', $ex->getMessage());
			}
		}
	}
	
	private function unpackMessage() {
		$input = $GLOBALS['HTTP_RAW_POST_DATA'];
		$ctTokens = explode(';', $_SERVER['CONTENT_TYPE']);
		if ($ctTokens[0] != 'multipart/related') {
			return $input;
		}
		$ctTokens = array_splice($ctTokens, 1);
		$ct = array();
		foreach ($ctTokens as $ctToken) {
			list($ctKey, $ctVal) = explode('=', $ctToken);
			$ct[$ctKey] = $ctVal; 
		}
// 		foreach ($ct as $ctKey => $ctVal) {
// 			error_log("$ctKey: $ctVal\n", 3, '/tmp/phpserver.log');
// 		}
		$startBoundary = "--{$ct['boundary']}";
		$endBoundary = "--{$ct['boundary']}--";
		$startPos = strpos($input, $startBoundary) + strlen($startBoundary);
		$endPos = strpos($input, $endBoundary, $startPos);		
		$content = substr($input, $startPos, $endPos - $startPos);
		error_log("content:\n$content\n", 3, '/tmp/phpserver.log');
		
		list($chunkHeader, $chunkBody) = explode("\r\n\r\n", $content, 2);
		error_log("Header:\n$chunkHeader\n", 3, '/tmp/phpserver.log');
		error_log("Body:\n$chunkBody\n", 3, '/tmp/phpserver.log');

		return $chunkBody;		
	}
}
