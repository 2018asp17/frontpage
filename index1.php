<!DOCTYPE html>
<html>
<head>
	<title>Department Home</title>
	<?php
	
		require_once 'conf.php';
		require_once 'deptfunc.php';

	?>
</head>
<body>
	<h1>Welcome to Department Management System</h1>
	<hr>
	<?php
		GetAllDepartments($connection);
	?>
	<a href="addDept.php">Add new Department</a>
</body>
</html>