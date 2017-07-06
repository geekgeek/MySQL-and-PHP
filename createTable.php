 <?php
    $servername = "localhost";
    $username = "user";
    $password = "password";
    $dbname = "dbname";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE TABLE cars (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        brandname VARCHAR(30) NOT NULL,
        carname VARCHAR(30) NOT NULL
        ) ";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?> 
