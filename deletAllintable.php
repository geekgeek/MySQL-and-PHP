 <?php
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

    $sql = "DELETE FROM theTable";

    if ($conn->query($sql) === TRUE) {
        echo "all rows deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?> 
