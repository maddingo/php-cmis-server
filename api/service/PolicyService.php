<?php
interface PolicyService {
	function applyPolicy();
	function getAppliedPolicies();
	function removePolicy();
}
?>