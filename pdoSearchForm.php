

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <h1>Results</h1>
        
        <form action="form1.php" method="post">
            <input type="text" name="search" value="" placeholder="Search for members">
            <input type="submit" value=">>">
        </form>

  
<?php

/**********************************************************************
 * *******************************************************************
 * *****************************************************************
 * Connect to an SQL DATABASE WITH PDO DATABASE OBJECT
 */
    $dbuser ="root";
    $dbPass="";
    $dbDatabase="testdb1";
    $dbHost="localhost";
    $tablenumber="table1";
        
    //Create form textbox connect variable
    $textbox1 =trim($_POST['search']);
   
    try {
// Step 1: Establish a connection
        $db = new PDO("mysql:host=localhost;dbname=testdb1","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       
// Step 2: Construct a query
        $query="select * from table1 where day like '%".$textbox1."%'";
// Step 3: Send the query
        $sth = $db->query($query);
// Step 4: Iterate over the results
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
        printf("<br>  %-40s %-20s\n",$row["note"],$row["day"]);
        }
    }
 catch (PDOException $e){
        printf("problem",$e->getMessage());
 }    
 exit();
?>

  </body>
</html>
