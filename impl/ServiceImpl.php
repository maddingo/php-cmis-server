<?php
class ServiceImpl {
	protected function addExpirationHeader() {
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
		
				$GLOBALS['server']->addSoapHeader($soapHeader);
		
	}
}