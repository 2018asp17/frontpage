<?php
error_reporting(0);


$host="localhost";
$user="root";
$password="";
$db="universityproject";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false){
	die("Connection error");

}
     if($_SERVER['REQUEST_METHOD']=="POST")
{
	$name=$_POST['username'];
	$pass=$_POST['password'];

	$sql="select*from student_record where username='".$name."' AND password='".$pass."' ";

	$result=mysqli_query($data,$sql);
	$row=mysqli_fetch_array($result);


	if($row["usertype"]=="students"){
		header("location:studenthome.php");


	}
	elseif($row["usertype"]=="admin"){
		header("location:adminform.php");


	}
	else{
		session_start();
	$message="username or password do not match";
	$_SESSION['loginMessage']=$message;
	header("location:login.php");
	}



}

?>