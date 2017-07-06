 <?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "dbname";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `cars` ";

    $result = mysqli_query($conn,$sql)or die(mysqli_error());

    while($row = mysqli_fetch_array($result)) {

        $brandname = $row['brandname'];
        $carname = $row['carname'];
        echo "<br>".$brandname." ".$carname."<br>";
    } 
    $conn->close();
?> 
