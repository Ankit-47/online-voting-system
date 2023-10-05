<<?php

 $servername="localhost";
 $username="root";
 $password="password";
 $dbname="voting";

 // Create connection
 $conn = new mysqli($servername, $username, $password,$dbname);

 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 } else {
     echo "Connected Successfully <br>";
 }

//  // Create Database
//  $sql = "CREATE DATABASE IF NOT EXISTS voting";

//  if ($conn->query($sql) === TRUE) {
//     echo "Database connected successfully <br>";
//  } else {
//     echo "Error creating database: " . $conn->error;
//  }
//  $conn->close();
//  // Refresh connection
//  $conn = new mysqli($servername, $username, $password, $dbname);

//  $result=mysqli_query($conn,$sql);
 


// ?>