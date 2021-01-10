<?php
	include_once("includes/common.php");
	$scriptname = strtolower($_SERVER['SCRIPT_NAME']);
	
	$empactive = endsWith($scriptname, 'list.php') ? "class='active'" : "";
?>

<nav class="navbar navbar-inverse navbar-static-top" style="margin-bottom: 0px;">
  <div class="container-fluid">
	<div class="navbar-header">
	  <a class="navbar-brand" href="#">PHP - MySQL</a>
	</div>
	<ul class="nav navbar-nav">
	  <li <?= $empactive ?>><a href="list.php">Employee</a></li>
	</ul>
  </div>
</nav>
