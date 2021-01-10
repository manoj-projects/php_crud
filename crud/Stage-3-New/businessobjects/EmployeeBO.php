<?php
	include_once("includes/MySQL.php");
	
	class Employee{
		public $EmployeeId, $EmployeeCode, $EmployeeName, $Designation, $Department;
		public $Qualification, $DateOfBirth, $DateOfJoining, $BasicPay;
		
		function Employee()
		{
			$this->EmployeeId = $this->EmployeeCode = $this->EmployeeName = $this->Designation = "";
			$this->Department = $this->Qualification = $this->DateOfBirth = "";
			$this->DateOfJoining = $this->BasicPay = "";			
		}
		
		function SetEmployeeId($EmployeeId)
		{
			// Try to fetch the record for the given Employee Id.
			$dt = $this->GetRecordById($EmployeeId);
			if($dt->num_rows > 0)
			{
				$dr = $dt->fetch_assoc();
				$this->EmployeeId = $dr["EmployeeId"];
				$this->EmployeeCode = $dr["EmployeeCode"];
				$this->EmployeeName = $dr["EmployeeName"];
				$this->Designation = $dr["Designation"];
				$this->Department = $dr["Department"];
				$this->Qualification = $dr["Qualification"];
				$this->DateOfBirth = $dr["DateOfBirth"];
				$this->DateOfJoining = $dr["DateOfJoining"];
				$this->BasicPay = $dr["BasicPay"];
			}
			unset($dt);
		}
		
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
		
		function GetRecordById($EmployeeId)
		{
			$db = new MySQL();
			$sql = "Select * From Employee Where EmployeeId=$EmployeeId";
			$dt = $db->GetDataTable($sql);
			unset($db);
			return $dt;
		}
		
		function Update()
		{			

			$sql = "Insert Into Employee(EmployeeCode, EmployeeName, Designation, " .
						"Department, Qualification, DateOfBirth, DateOfJoining, " .
						"BasicPay) Values ('$this->EmployeeCode', '$this->EmployeeName', " .
						"'$this->Designation', '$this->Department', '$this->Qualification', " .
						"'$this->DateOfBirth', '$this->DateOfJoining', $this->BasicPay)";
			
			$db = new MySQL();
			$db->Execute($sql);
			unset($db);
		}
	}
?>