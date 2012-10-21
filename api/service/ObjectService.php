<?php
interface ObjectService {
	function createDocument();
	function createDocumentFromSource();
	function createFolder();
	function createPolicy();
	function createRelationship();
	function deleteContentStream();
	function deleteObject();
	function deleteTree();
	function getAllowableActions();
	function getContentStream();
	function getObject();
	function getObjectByPath();
	function getProperties();
	function getRenditions();
	function moveObject();
	function setContentStream();
	function updateProperties();
}
?>