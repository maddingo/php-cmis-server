<?php
interface NavigationService {
	function getCheckoutDocs();
	function getChildren();
	function getDescendants();
	function getFolderParent();
	function getFolderTree();
	function getObjectParents();
}
?>