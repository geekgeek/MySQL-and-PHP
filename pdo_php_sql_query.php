<!DOCTYPE html>
<!--
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <h1>Results</h1>
<?php
/**********************************************************************
 * *******************************************************************
 * *****************************************************************
 * Connect to an SQL DATABASE WITH PDO DATABASE OBJECT
 */
 $dbHost="localhost";
    $dbuser ="root";
    $dbPass="";
    $dbDatabase="test";
    
    $tablenumber="table1";
        
   
    try {
// Step 1: Establish a connection
        $db = new PDO("mysql:host=localhost;dbname=test","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       
// Step 2: Construct a query
        $query="select * from table1";
// Step 3: Send the query
        $sth = $db->query($query);
// Step 4: Iterate over the results
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
        printf("<br>  %-40s %-20s\n",$row["id"],$row["name"]);
        }
    }
 catch (PDOException $e){
        printf("problem",$e->getMessage());
 }    
 exit();
?>

  </body>
</html>
