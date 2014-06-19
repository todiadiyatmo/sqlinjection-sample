<?php

// Start connection
$mysqli = new mysqli("127.0.0.1", "root", "", "sqlinjection");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// Hacker Code
$name     = $_POST['name']; // "admin' OR 1=1 --"  
$password = $_POST['password'];


if ($stmt = $mysqli->prepare("SELECT name FROM user WHERE name=? and password=?")) {
 
    // Bind a variable to the parameter as a string. 
    $stmt->bind_param("ss", $name,$password);
 
    // Execute the statement.
    $stmt->execute();
 
    // Get the variables from the query.
    $stmt->bind_result($colName);

    if($stmt->fetch())
    {

        echo "Welcome ".$colName. '<br />';
        
    }else{
        echo "Wrong Password";
    }
 
    // Close the prepared statement.
    $stmt->close();
 
}









