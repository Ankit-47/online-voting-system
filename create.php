<?php

 $servername="localhost";
 $username="root";
 $password="";
 $dbname="voting";

 $conn=mysqli_connect($servername,$username,$password);

 $sql="CREATE DATABASE IF NOT EXISTS voting";

 $result=mysqli_query($conn,$sql);

?>