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
			include("layout/header.php");	
			include_once("businessobjects/EmployeeBO.php");

			$bo = new Employee();			
			$EmployeeId = (int) $_GET["eid"];	
			$bo->SetEmployeeId($EmployeeId);
		?>
		
		<div class="jumbotron">
			<h1 class="text-center">Employee Master</h1>
		</div>
		
		<!-- Form input. -->		
		<div class="container">
			<h1 style="margin-bottom: 20px;">View Employee Details</h1>
			<div class="row">
			  <div class="col-sm-2">
				Employee Code:
			  </div>
			  <div class="col-sm-2">
				<label><?= $bo->EmployeeCode ?></label>
			  </div>
			  <div class="col-sm-2">
				Employee Name:
			  </div>
			  <div class="col-sm-2">
				<label><?= $bo->EmployeeName ?></label>
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-2">
				Designation:
			  </div>
			  <div class="col-sm-2">
				<label><?= $bo->Designation ?></label>
			  </div>
			  <div class="col-sm-2">
				Department:
			  </div>
			  <div class="col-sm-2">				
				<label><?= $bo->Department ?></label>
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-2">
				Qualification:
			  </div>
			  <div class="col-sm-2">			
				<label><?= $bo->Qualification ?></label>
			  </div>
			  <div class="col-sm-2">
				Date of Birth:
			  </div>
			  <div class="col-sm-2">				
				<label><?= date('d-m-Y', strtotime($bo->DateOfBirth)) ?></label>
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-2">
				Date of Joining:
			  </div>
			  <div class="col-sm-2">			  
				<label><?= date('d-m-Y', strtotime($bo->DateOfJoining)) ?></label>
			  </div>
			  <div class="col-sm-2">
				Basic Pay:
			  </div>
			  <div class="col-sm-2">				
				<label><?= $bo->BasicPay ?></label>
			  </div>
			</div>			
		</div>
		<div class="container" style="margin-top: 25px;">
			<h3><a href="list.php">Back</a></h3>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>