<?php
class WSDispatcher {
	private $wsdl;
	private $wsdlDoc;
	private $mappings;

	public function __construct($wsdl, $mappings) {
		$this->wsdl = $wsdl;
		$this->mappings = $mappings;
	}

	private function isWSDLRequest() {
		return isset($_REQUEST['WSDL']);
	}

	private function getRequestService() {
		if (isset($_SERVER['HTTP_SOAPACTION'])) {
			if (isset($_SERVER['PATH_INFO'])) {
				return substr($_SERVER['PATH_INFO'], 1);
			}
		}
		return false;
	}

	private function showWSDL($xslt=false) {
		header('Content-type: text/xml');
		header('Accept: text/xml');
		if (!isset($this->wsdlDoc)) {
			$doc = new DOMDocument();
			$doc->load($this->wsdl);
			// TODO transform WSDL to reflect the proper endpoint address
			$this->wsdlDoc = $doc;
		}
		echo $this->wsdlDoc->saveXML();
	}
	
	private function showSummary() {
		//echo '<h1>Summery</h1>';
		//header('Content-Type: text/html');
		$this->showWSDL('ws/wsdl2html.xsl');
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
				//file_put_contents('/tmp/soapcontent.log', print_r($_SERVER, true));
				//file_put_contents('/tmp/soap.log', $message);
				$server->handle($message);
			} catch(Exception $ex) {
				$server->fault('Client', $ex->getMessage());
			}
		}
	}
	
	private function unpackMessage() {
		$input = $GLOBALS['HTTP_RAW_POST_DATA'];
		if (strstr($_SERVER['CONTENT_TYPE'], 'multipart') === false) {
			return $input;
		}
		
		// TODO unpack multipart messages when MTOM is enabled
		$matches = array();
		// grab multipart boundary from content type header
		preg_match('/boundary="(.*?)"/', $_SERVER['CONTENT_TYPE'], $matches);
		$boundary = $matches[1];
		//die ("BOUNDARY: $boundary\n");
		$startPos = strpos($input, "--$boundary");
		$startPos = strpos($input, "\n\n", $startPos);
		die("START: $startPos\n");
		$endPos = strpos($input, "--$boundary--", $startPos);
		//die("END: $endPos\n");
		
		$content = substr($input, $startPos, $endPos - $startPos);
		die ("CONTENT: $content");
		return $content;		
	}
}
