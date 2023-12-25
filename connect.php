<?php
/*
host - localhost:81
username - root
password - ''
database - studentdb
*/

define('HOST', 'localhost');
define('USERNAME', 'root');
define('PWD', '');
define('DB', 'department');

$connection = mysqli_connect(HOST,USERNAME,PWD,DB);

if ($connection) {
	echo "Database connected";
} else {
die ("Connection error !".mysqli_connect_error());
}




?>