<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Master</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
	<body>
		<?php
			include_once("includes/MySQL.php");
			include("layout/header.php");	
			include_once("businessobjects/EmployeeBO.php");

			$bo = new Employee();			
			$EmployeeId = (int) $_GET["eid"];	
			if($_SERVER["REQUEST_METHOD"]=="POST")
			{
				if(isset($_POST["btncancel"]))
				{
					header('Location: list.php');
					exit();
				}
			
				$bo->EmployeeId = $EmployeeId;
				$bo->EmployeeName = $_POST["empname"];
				$bo->EmployeeCode = $_POST["empcode"];
				$bo->Designation =  $_POST["designation"];
				$bo->Department =  $_POST["department"];
				$bo->Qualification = $_POST["qualification"];
				$bo->DateOfJoining = $_POST["dateofjoining"];
				$bo->DateOfBirth = $_POST["dateofbirth"];
				$bo->BasicPay = $_POST["basicpay"];
				
				// Do all the validations here.
				$IsValid = true;
				
				if($IsValid)
				{
					$bo->Update();
					
					// Redirect to list page after successful update.
					header('Location: list.php');
					exit();
				}
				
			}
			else{
				// Initialize variables.
				$bo->SetEmployeeId($EmployeeId);
			}
		?>
		
		<div class="jumbotron">
			<h1 class="text-center">Employee Master</h1>
		</div>
		
		<!-- Form input. -->		
		<div class="container">
			<h1 style="margin-bottom: 20px;"><?= $EmployeeId==0 ? "Add New Employee" : "Edit Employee" ?></h1>
			<form class="form" action="edit.php?eid=<?= $EmployeeId ?>" method="post">
				<div class="row">
				  <div class="form-group col-sm-4">
					<label for="empcode">Employee Code:</label>
					<input type="text" name="empcode" class="form-control" id="empcode" required 
							value="<?= $bo->EmployeeCode ?>">
				  </div>
				  <div class="form-group col-sm-4">
					<label for="empname">Employee Name:</label>
					<input type="text" name="empname" class="form-control" id="empname" required 
							value="<?= $bo->EmployeeName ?>">
				  </div>				  
				</div>
				<div class="row">
				  <div class="form-group col-sm-4">
					<label for="designation">Designation:</label>
					<input type="text" name="designation" class="form-control" id="designation" 
							value="<?= $bo->Designation ?>">
				  </div>
				  <div class="form-group col-sm-4">
					<label for="department">Department:</label>
					<input type="text" name="department" class="form-control" id="department" 
							value="<?= $bo->Department ?>">
				  </div>
				</div>
				<div class="row">
				  <div class="form-group col-sm-4">
					<label for="qualification">Qualification:</label>
					<input type="text" name="qualification" class="form-control" id="qualification" 
							value="<?= $bo->Qualification ?>">
				  </div>
				  <div class="form-group col-sm-4">
					<label for="dateofbirth">Date of Birth:</label>
					<input type="date" name="dateofbirth" class="form-control" id="dateofbirth" required 
							value="<?= $bo->DateOfBirth ?>">
				  </div>
				</div>
				<div class="row">
				  <div class="form-group col-sm-4">
					<label for="dateofjoining">Date of Joining:</label>
					<input type="date" name="dateofjoining" class="form-control" id="dateofjoining" required
							value="<?= $bo->DateOfJoining ?>">
				  </div>
				  <div class="form-group col-sm-4">
					<label for="basicpay">Basic Pay:</label>
					<input type="number" name="basicpay" class="form-control" id="basicpay" required
							value="<?= $bo->BasicPay ?>">
				  </div>
				</div>
				<button type="submit" name="btnsubmit" class="btn btn-primary">Save</button>
				<button type="cancel" name="btncancel" class="btn btn-default" formnovalidate>Cancel</button>
			</form>		
		</div>
		
		<!-- Display values here if post back -->
		<div class="container">
			<?php
				
			?>
		</div>
		
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>