<?php
	include_once("includes/MySQL.php");
	
	class Employee{
		function GetList($MaxRecords=0)
		{
			$db = new MySQL();
			$sql = "Select * From Employee ";
			if($MaxRecords > 0)
				$sql .= "Limit $MaxRecords";
			$dt = $db->GetDataTable($sql);
			unset($db);
			return $dt;
		}
	}
?>