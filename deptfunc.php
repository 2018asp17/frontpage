<?php
function getTable($query,$connection)
{
	$result = mysqli_query($connection,$query);
	$arr = array();
	if ($result) {
		while ($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
			array_push($arr, $row);
		}
		
	}
	 else 
	{
		die("Error ".mysqli_error($connection));
	}

	return $arr;
	
}

function ExecuteQuery($query,$connection)
{
	$result = mysqli_query($connection,$query);
	if ($result) {	
		return "Done !";
	} 
	else 
	{
		return ("Error ".mysqli_error($connection));
	}	
}



function FacultySelectBox($connection)
{
	$query = "select * from faculty";
	$array = getTable($query,$connection);
	foreach ($array as $key => $value) {
		echo "<option value='$value[0]'>$value[1]</option>";
	}
}

function PrintTable($arr)
{
	echo "<table border='1'>";
	echo "<tr>";
	echo "<td>Department ID</td>";
	echo "<td>Department Name</td>";
	echo "<td>Faculty</td>";
	echo "<td>Edit</td>";
	echo "<td>Delete</td>";
	echo "</tr>";
	foreach ($arr as $key => $row) {
		echo "<tr>";
		foreach ($row as $key => $value) {
			echo "<td>$value</td>";
		}
		$id = $row[0];
		echo "<td><a href='updateDept.php?id=$id'>Edit</a></td>";
		echo "<td><a href='deleteDept.php?id=$id'>Delete</a></td>";
		echo "</tr>";
	}
	echo "</table>";
}

function GetAllDepartments($connection)
{
	$query = "select d.Did,d.DName,f.FName from department as d inner join faculty as f on d.Fid = f.Fid";
	PrintTable(getTable($query,$connection));
}

?>