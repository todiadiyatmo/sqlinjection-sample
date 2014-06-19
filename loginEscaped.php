<?php

// Start connection
$mysqli = new mysqli("127.0.0.1", "root", "", "sqlinjection");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// Hacker Code
$name     = $_POST['name']; // "admin' OR 1=1 -- "  
$password = $_POST['password'];

$name = $mysqli->real_escape_string($name);
$password = $mysqli->real_escape_string($password);

$sql = "SELECT name FROM user WHERE name = '$name' and password ='$password'  ";

$result = $mysqli->query($sql);


if($result->num_rows>=1)
{
	$row = $result->fetch_assoc();

   	echo "Welcome ".$row['name'] . '<br />';
	
}else{
	echo "Wrong Password";
}



