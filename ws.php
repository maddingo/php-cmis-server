<?php
include_once __DIR__ .'/ws/WSDispatcher.php';

$mappings = array(
		'RepositoryService' => array('class' => 'RepositoryServiceImpl', 'file' => __DIR__.'/impl/RepositoryServiceImpl.php'),
);

$dispatcher = new WSDispatcher('wsdl/CMISWS-Service.wsdl', $mappings);

$dispatcher->dispatch();

