<?php
    include "connect.php";
    $sql="
     CREATE TABLE IF NOT EXISTS voting(
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL UNIQUE,
        mobile VARCHAR(10) NOT NULL UNIQUE,
        password VARCHAR(12) NOT NULL,
        address VARCHAR(15) NOT NULL,
        image VARCHAR(255),
        role VARCHAR(100),
        status VARCHAR(10),
        votes INT NOT NULL
    )";

    $result = mysqli_query($conn, $sql);

?>