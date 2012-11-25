<?php
include_once __DIR__ .'/ws/WSDispatcher.php';

$mappings = array(
		'RepositoryService' => array('class' => 'RepositoryServiceImpl', 'file' => __DIR__.'/impl/RepositoryServiceImpl.php'),
);
if (!empty($_SERVER['HTTPS'])) {
	$protocol = 'https';
} else {
	$protocol = 'http';
}
$host = $_SERVER['HTTP_HOST'];
$port = $_SERVER['SERVER_PORT'];
$script = $_SERVER['SCRIPT_NAME'];
$baseUrl = "$protocol://$host:$port$script";
$dispatcher = new WSDispatcher('wsdl/CMISWS-Service.wsdl', $mappings, $baseUrl);

$dispatcher->dispatch();

