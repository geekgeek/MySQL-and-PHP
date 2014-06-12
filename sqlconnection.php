<!--//SQL CONNECTION TO DATABASE -->

<html>
    <head>
        
        
    </head>

    <body>
<h1> DB CONNECTION </h1>

<?php

//VARIABLES
    $hostname="localhost"; // name of the host
    $username="databaseUserUsername"; // Database user username
    $password="databasePassword";  // Database password
    $dbname="databaseName"; // Database Name
    $usertable="DatabaseTable";// Database table
      
//Database Connection for PHP and MySQL.
    $conDB = mysql_connect($hostname,$username, $password);
    mysql_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
    
    echo"Connection to database ok </br></br>";

//SELECT THE DATABASE FOR USE:
    mysql_select_db($dbname,$conDB);
#######################################################################################
#######################################################################################
#######################################################################################

//code Show Tables from database:#############################
    echo "Tables in DB:</br>";
    
    $sql = "SHOW TABLES FROM $dbname";
    $result = mysql_query($sql);
    
    if (!$result)
    {
        echo "DB Error, could not list tables\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }
    
    while ($row = mysql_fetch_row($result))
    {
        echo "Table: {$row[0]}\n";
    }
    
    mysql_free_result($result);

#######################################################################################
#######################################################################################
#######################################################################################

    //GET OUT ROWS FROM DATABASE
    echo "</br></br>ROWS:</br>";
    
    $sql = "SELECT * FROM $usertable";
    $result = mysql_query($sql);
    
    if (!$result)
    {
        echo "DB Error, could not list rows\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }
    
    while ($row = mysql_fetch_row($result))
    {
        echo "Table: {$row[0]}\n";
       
    }
    mysql_free_result($result);

#######################################################################################
#######################################################################################
#######################################################################################

//READ RESULT FROM DATABASE
/* Here includes ROWS
 *
 *
 **/
    echo "</br>";
    
    $result = mysql_query("SELECT * FROM tabel1");
    
    while ($row2 = mysql_fetch_array($result)) {
        echo "</br>";
        printf("ID: %s  Header: %s Body: %s", $row2[0], $row2[1], $row2[2]);  
    }
    
    mysql_free_result($result);
    
    ?> 
    </body>
</html>