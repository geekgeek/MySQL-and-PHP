<?php
        //insertURLVarInMysql.php?state=runningfine
        $toBeInserted = $_GET['state'];
        

        $servername = "localhost";
        $username = "username";
        $password = 'password';
        $dbname = "dbname";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO cars (brandname, carname)
        VALUES ('" . $toBeInserted ."', 'plant')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
?> 
