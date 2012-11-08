<?php
include_once __DIR__ .'/ws/WSDispatcher.php';

$mappings = array(
		'RepositoryService' => array('class' => 'RepositoryServiceImpl', 'file' => __DIR__.'/impl/RepositoryServiceImpl.php'),
);

$dispatcher = new WSDispatcher('wsdl/CMISWS-Service.wsdl', $mappings, "http://{$_SERVER['HTTP_HOST']}:{$_SERVER['SERVER_PORT']}{$_SERVER['SCRIPT_NAME']}");

$dispatcher->dispatch();

