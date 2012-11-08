<?php
include_once 'atom/AtomDispatcher.php';
include_once 'atom/AtomSerializer.php';
// get url

$dispatcher = new AtomDispatcher();

$result = $dispatcher->dispatch();

$serializer = new AtomSerializer();

echo $serializer->serialize($result);