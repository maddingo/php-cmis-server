<?php
interface VersioningService {
	function cancelCheckOut();
	function checkIn();
	function checkOut();
	function getAllVersions();
	function getObjectOfLatestVersion();
	function getPropertiesOfLatestVersion();
}
?>