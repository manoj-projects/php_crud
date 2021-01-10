<?php
			
	include_once("businessobjects/EmployeeBO.php");

	$bo = new Employee();			
	$EmployeeId = (int) $_GET["eid"];	
	
	$bo->Delete($EmployeeId);
	
	unset($bo);
	
	header('Location: list.php');
	exit();
?>