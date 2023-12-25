<!DOCTYPE html>
<html>
<head>
	<title>Add New Department</title>
	<?php

		require_once 'connect.php';
		require_once 'deptFunc.php';

	?>
	
</head>
<body>
	<h2>Update the Department</h2>
	<hr>
<table border="0">
	<form method="POST" action="">
	<tr>
		<td align="right">Deapartment ID</td>
		<td><input type="text" name="did"></td>
	</tr>
	<tr>
		<td align="right">Deapartment Name</td>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>
		<td align="right">Faculty</td>
		<td>
			<select name="fac">
				<option value="empty">Select a faculty</option>
				<?php 
				
					FacultySelectBox($connection);
					
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="right"><input type="submit" value="ADD" name="save"></td>
	</tr>
	</form>
</table>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id = trim($_POST['did']);
	$name = trim($_POST['name']);
	$faculty = trim($_POST['fac']);
	$error_msg = '';
	if (empty($id)) {
		$error_msg = "<p style='color:red'>Please provide the id !<p>";
	}
	if (empty($name)) {
		$error_msg .= "<p style='color:red'>Please provide the name !<p>";
	}
	if ($faculty == 'empty') {
		$error_msg .= "<p style='color:red'>Please select the faculty !<p>";
	}
	if(empty($error_msg))
	{
		$query = "insert into department values($id,'$name',$faculty)";
		echo ExecuteQuery($query,$connection);
		header('location:index.php');
	}
	
	else{
		echo $error_msg;
	}
	
}

?>
</body>
</html>