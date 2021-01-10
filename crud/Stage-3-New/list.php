<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Development</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
	<body>
		<?php
			include("layout/header.php");			
			include_once("businessobjects/EmployeeBO.php");

			$bo = new Employee();			
			$dt = $bo->GetList();				
		?>
		
		<div class="jumbotron">
			<h1 class="text-center">Employee Master</h1>
		</div>
		
		<!-- Display values here if post back -->
		<div class="container" id="listview">
			<form class="form-inline" action="edit.php" method="get">
				<input type="hidden" name="eid" value="0" />
				<button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Add New</button>
			</form>	
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>Employee Code</th>
						<th>Employee Name</th>
						<th>Department</th>
						<th>Designation</th>
						<th>Qualification</th>
						<th class='text-center'>DOB</th>
						<th class='text-center'>DOJ</th>
						<th class='text-right'>Basic Pay</th>
					</tr>
				</thead>		
			<?php
				// $rows = $dt->fetch_assoc();
				foreach($dt as $dr)
				{
					// var_dump($dr);
			?>
					<tr>
						<td><div id='EmployeeId' style="display:none;"><?= $dr["EmployeeId"] ?></div>
							<?= $dr["EmployeeCode"] ?></td>
						<td><?= $dr["EmployeeName"] ?></td>
						<td><?= $dr["Department"] ?></td>
						<td><?= $dr["Designation"] ?></td>
						<td><?= $dr["Qualification"] ?></td>
						<td class='text-center'><?= date('d-m-Y', strtotime($dr["DateOfBirth"])) ?></td>
						<td class='text-center'><?= date('d-m-Y', strtotime($dr["DateOfJoining"])) ?></td>
						<td class='text-right'><?= $dr["BasicPay"] ?></td>
					</tr>
			
			<?php 				
				}
				unset($dt);
				unset($db);		// Destroy object after the usage.
			?>
				</table>
		</div>
		
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(){
				$("div#listview table").delegate('tr', 'click', function() {
					var eid = $("#EmployeeId", this).html();
					window.location.href = "view.php?eid=" + eid;					
				});
			});
		</script>		
	</body>
</html>