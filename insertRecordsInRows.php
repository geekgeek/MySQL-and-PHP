<?php
//Insert records in rows with time stamp
        $now = new DateTime();
$timeValue = $now->format('Y-m-d H:i:s');


        $servername = "servername";
        $username = "username";
        $password = "password";
        $dbname = "dbname";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO cars (brandname, carname)
        VALUES ('" . $timeValue ."', 'z3')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    ?> 
