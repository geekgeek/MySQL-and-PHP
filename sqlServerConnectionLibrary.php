
<?php
/**
 * Database class for connecting to an sql server with php.
 * 
 * Each object of this class can have one table but many rows
 * 
 * Constructor:<br>
 * $servername, $username, $password, $dbname
 * 
 * Recommended to add a table with function setTableName($tableName)
 * 
 * Recommended to add rows with function addBasicRow($rowName)
 * 
 * Some of it functions are:<br>
 * isConnected()<br>
 * setTableName($tableName)<br>
 * addBasicRow($rowName)<br>
 * 
 * 
 * convert sql to json<br>
 * convert sql to xml<br>
 * convert sql to php array<br>
 * save sql to xml -> file transformSaveSqlToXML("xml/output1.xml")
 * 
 * @var string $servername
 * @var string $username
 * @var string $password
 * @var string $dbname
 * @var string $tableName
 * @var array $rows
 */
class Database 
{   
    private $servername = "some server";
    private $username = "some username";
    private $password = "some password";
    private $dbname = "some dbname";
    
    private $tableName = "some table";
    private $rows = array();
    
    private $storedVal = array();
    
    /**
     * Constructor for class Database
     * @param String $servername
     * @param String $username
     * @param String $password
     * @param String $dbname
     */
    public function __construct($servername, $username, $password, $dbname) 
    {
       $this->servername = $servername;
       $this->username = $username;
       $this->password = $password;
       $this->dbname = $dbname;
    }
   
    /**
     * get ServerName
     * @return type String
     */
    public function getServerName() 
    {
        return $this->servername;
    }

    /**
     * set ServerName
     * @param String $servername
     */
    public function setServerName($servername) 
    {
        $this->servername = $servername;
        
    }
    
    
    /**
     * get UserName
     * @return String
     */
    public function getUserName() 
    {
        return $this->username;
    }

    /**
     * set UserName
     * @param String $username
     */
    public function setUserName($username) 
    {
        $this->username = $username;
    }
    
    
    /**
     * get Password
     * @return String
     */
    public function getPassword() 
    {
        return $this->password;
    }

    /**
     * set Password
     * @param String $password
     */
    public function setPassword($password) 
    {
        $this->password = $password;
    }
    
    
    /**
     * get Database Name
     * @return String dbname
     */
    public function getDatabaseName() 
    {
        return $this->dbname;
    }

    /**
     * set Database Name
     * @param String $dbname
     */
    public function setDatabaseName($dbname) 
    {
        $this->dbname = $dbname;
    }
    
    /**
     * Destructor
     */
    private function __destruct() 
    {
      //print "<br>destructor<br>";
    }
    
    
    
    //#######################################
    //#######################################

    /**
     * Check if server is connected
     * @return boolean 1 = true 0 = false
     * @see getServerName()
     * @see getUserName()
     * @see getPassword()
     */
    public function isConnected()
    {
        
        $conn = new mysqli($this->getServerName(), $this->getUserName(), $this->getPassword());

        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
            return false;
        }
        return true;
    } 
    
    
    //#######################################
    //#######################################
    //TABLES AND ROWS:
    
    /**
     * get Table Name
     * @return String tableName
     */
    public function getTableName() 
    {
        return $this->tableName;
    }

    /**
     * set Table Name
     * @param String $tableName
     */
    public function setTableName($tableName) 
    {
        $this->tableName = $tableName;
    }
    
    /**
     * Add row to rowArray
     * @param type $rowName
     */
    public function addBasicRow($rowName)
    {
        array_push($this->rows,$rowName);
    }
    
    /**
     * get row value of the id
     * @param int $rowID
     */
    public function getBasicRowValue($rowID)
    {
        return $this->rows[$rowID];
    }
    
    /**
     * loop row array
     */
    public function getAndPrintAllRows()
    {
        $arr = $this->rows;
        $arrlength = count($arr);

        for($x = 0; $x < $arrlength; $x++) 
        {
            echo $arr[$x];
            echo "<br>";
        }
    }
    
    /**
     * SQL query ready rows
     * @return String sqlready rows
     */
    private function returnSQLReadyRows()
    {
        $storageVar;
        
        $arr = $this->rows;
        $arrlength = count($arr);

        $arrlengthMinus1 = $arrlength - 1;
        for($x = 0; $x < $arrlength; $x++) 
        {
            if($x < $arrlengthMinus1)
            {
                $storageVar .= $arr[$x] . ', ';
            }
            else
            {
                $storageVar .= $arr[$x];
            }
        }
        return $storageVar;
    }
    
    /**
     * SQL query ready rows
     * @return String sqlready rows
     */
    private function returnSQLReadyRowsMinusID()
    {
        $storageVar;
        
        $arr = $this->rows;
        $arrlength = count($arr);

        $arrlengthMinus1 = $arrlength - 1;
        for($x = 1; $x < $arrlength; $x++) 
        {
            if($x < $arrlengthMinus1)
            {
                $storageVar .= $arr[$x] . ', ';
            }
            else
            {
                $storageVar .= $arr[$x];
            }
        }
        return $storageVar;
    }
    
    /**
     * SQL Query select all the rows that you have
     * created with addBasicRow($rowName)
     * @return String sql select row string
     * @see getTableName()
     * @see returnSQLReadyRows()
     */
    private function sqlSelectAll()
    {
        $theTable = $this->getTableName();
        $theRows = $this->returnSQLReadyRows();
        
        return "SELECT " . $theRows . " FROM " . $theTable;
    }
    
    /**
     * Executes sql query
     * Echo all  rows that are added
     * @see sqlSelectAll()
     * @see getServerName()
     * @see getUserName()
     * @see getPassword()
     * @see getDatabaseName()
     */
    public function showAllTables()
    {
        $arr = $this->rows;
        $arrlength = count($arr);
        
        $servername = $this->getServerName();
        $username = $this->getUserName();
        $password = $this->getPassword();
        $dbname = $this->getDatabaseName();
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = $this->sqlSelectAll();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {

            // output data of each row
            while($row = $result->fetch_assoc()) 
            {
                //Count row elements
                for($x = 0; $x < $arrlength; $x++) 
                {
                    $rowName = $arr[$x];
                    echo $rowName . "-->" . $row[$rowName];
                    echo "<br>";
                }
                echo "<hr>";
            }
        }
        else 
        {
            echo "0 results";
         }
        $conn->close();
        
    }
    
    

    /**
     * Executes sql query
     * Store all  rows that are added in an array
     * Store sql rows inside php array
     * @see printStoredValArrayValues()
     * @see getServerName()
     * @see getUserName()
     * @see getPassword()
     * @see getDatabaseName()
     * 
     * @var array storedVal
     */
    public function transformSqlToPHPArray()
    {
        $arr = $this->rows;
        $arrlength = count($arr);
        
        $servername = $this->getServerName();
        $username = $this->getUserName();
        $password = $this->getPassword();
        $dbname = $this->getDatabaseName();
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = $this->sqlSelectAll();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {

            // output data of each row
            while($row = $result->fetch_assoc()) 
            {
                //Count row elements
                for($x = 0; $x < $arrlength; $x++) 
                {
                    $rowName = $arr[$x];
                    
                    array_push($this->storedVal,$row[$rowName]);
                }
            }
        }
        else 
        {
            echo "0 results";
         }
        $conn->close();
    }
    
    /**
     * loop StoredVal array
     * @see transformSqlToPHPArray()
     * @var array storedVal
     */
    public function printStoredValArrayValues()
    {
        $arr = $this->storedVal;
        $arrlength = count($arr);
        
        for($x = 0; $x < $arrlength; $x++) 
        {            
            echo $arr[$x];
            echo "<br>";
        }
    }
    
    /**
     * 
     * @return array storedVal
     */
    public function getStoredValues()
    {
        return $this->storedVal;
    }
    
    /**
     * Return id number in array where value are stored
     * @return String val | undefined
     */
    public function searchStoredValues($searchVal)
    {
        $arr = $this->storedVal;
        $arrlength = count($arr);

        for($x = 0; $x < $arrlength; $x++) 
        {            
            if($searchVal == $arr[$x])
            { 
                return $arr[$x] . "row:" . $x;
            }
        }
        
        return "undefined";
    }
    
    /**
     * Convert all the database rows to json
     * Place inside script tags
     * @see getServerName()
     * @see getUserName()
     * @see getPassword()
     * @see getDatabaseName()
     * @see getTableName()
     * 
     */
    public function transformAllSqlToJson()
    {
        $servername = $this->getServerName();
        $username = $this->getUserName();
        $password = $this->getPassword();
        $dbname = $this->getDatabaseName();
        
        $dbTable = $this->getTableName();
        
         //open connection to mysql db
        $connection = mysqli_connect($servername,$username,$password,$dbname) 
            or die("Error " . mysqli_error($connection));

        //fetch table rows from mysql db
        $sql = "select * from " . $dbTable;
        $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

        echo "<script>var $dbTable = ";
        //create an array
        $emparray = array();
        while($row =mysqli_fetch_assoc($result))
        {
            $emparray[] = $row;
        }
        
        echo json_encode($emparray);
        echo "</script>";

        //close the db connection
        mysqli_close($connection);
    }
    

    /**
     * Convert selected rows of database to json
     * Place inside script tags
     * @see sqlSelectAll()
     * @see getServerName()
     * @see getUserName()
     * @see getPassword()
     * @see getDatabaseName()
     * @see getTableName()
     */
    public function transformSqlToJson()
    {
        $servername = $this->getServerName();
        $username = $this->getUserName();
        $password = $this->getPassword();
        $dbname = $this->getDatabaseName();
        
        $dbTable = $this->getTableName();
        
         //open connection to mysql db
        $connection = mysqli_connect($servername,$username,$password,$dbname) 
            or die("Error " . mysqli_error($connection));

        //fetch table rows from mysql db
        $sql = $this->sqlSelectAll();
        $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

        echo "<script>var $dbTable = ";
        //create an array
        $emparray = array();
        while($row =mysqli_fetch_assoc($result))
        {
            $emparray[] = $row;
        }
        
        echo json_encode($emparray);
        echo "</script>";
        //close the db connection
        mysqli_close($connection);
    }
    

    /**
     * Convert selected rows of database to an XML file
     * transformSaveSqlToXML("xml/output1.xml");
     * the xml row starts with many + tablename --> tablename --> rows
     * Place inside html
     * @see sqlSelectAll()
     * @see getServerName()
     * @see getUserName()
     * @see getPassword()
     * @see getDatabaseName()
     * @see getTableName()
     */
    public function transformSaveSqlToXML($fileLocationOfXML)
    {
        $servername = $this->getServerName();
        $username = $this->getUserName();
        $password = $this->getPassword();
        $dbname = $this->getDatabaseName();
        
        $dbTable = $this->getTableName();
        
         //open connection to mysql db
        $connection = mysqli_connect($servername,$username,$password,$dbname) 
            or die("Error " . mysqli_error($connection));

        //fetch table rows from mysql db
        $sql = $this->sqlSelectAll();
        $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

        
        $myfile = fopen($fileLocationOfXML, "w") or die("Unable to open file!");
        $txt = "<?xml version=\"1.0\" encoding=\"UTF-8\"?> \n";
        fwrite($myfile, $txt);
        
        fwrite($myfile, "<many{$dbTable}>\n");

        while($row =mysqli_fetch_assoc($result))
        {
            fwrite($myfile, "<$dbTable>\n");
//              foreach($row as $key => $value) 
//              {
//                fwrite($myfile, "<$key>$value</$key>\n");
//              }
            
            $this->writeRowValue($myfile, $row);
            
            fwrite($myfile, "</$dbTable>\n");
        }
        fwrite($myfile, "</many{$dbTable}>\n");
        
        //close file
        fclose($myfile);
        //close the db connection
        mysqli_close($connection);
    }
    
    /**
     * Split loop sql
     * @param type $myfile
     * @param type $row
     */
    private function writeRowValue($myfile, $row) 
    {
        foreach($row as $key => $value) 
        {
          fwrite($myfile, "<$key>$value</$key>\n");
        }
    }
    
    
    /**
     * Convert selected rows of database to XML
     * the xml row starts with many + tablename --> tablename --> rows
     * Place inside html
     * @see sqlSelectAll()
     * @see getServerName()
     * @see getUserName()
     * @see getPassword()
     * @see getDatabaseName()
     * @see getTableName()
     */
    public function transformSqlToXML()
    {
        $servername = $this->getServerName();
        $username = $this->getUserName();
        $password = $this->getPassword();
        $dbname = $this->getDatabaseName();
        
        $dbTable = $this->getTableName();
        
         //open connection to mysql db
        $connection = mysqli_connect($servername,$username,$password,$dbname) 
            or die("Error " . mysqli_error($connection));

        //fetch table rows from mysql db
        $sql = $this->sqlSelectAll();
        $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

        echo "<many{$dbTable}>\n";
        while($row =mysqli_fetch_assoc($result))
        {
            echo "<$dbTable>\n";
              foreach($row as $key => $value) 
              {
                echo "<$key>$value</$key>\n";
              }
            echo "</$dbTable>\n";
        }
        echo "</many{$dbTable}>\n";
        

        //close the db connection
        mysqli_close($connection);
    }
    
    /**
     * Write and create a new file
     * @param String $fileDirectory
     * @param String $toBeWritten
     */
    private function writeStuffToFile($fileDirectory,$toBeWritten)
    {
        $myfile = fopen($fileDirectory, "w") or die("Unable to open file!");
        
        $xmlCode = $toBeWritten;
        fwrite($myfile, $xmlCode);
        
        fclose($myfile);
    }
    
    
    /**
     * Delete row with selected id
     * $foo->deleteRowId(15);
     * @param int $idNumber
     * @see getServerName()
     * @see getUserName()
     * @see getPassword()
     * @see getDatabaseName()
     * @see getTableName()
     */
    public function deleteRowId($idNumber)
    {
            $servername = $this->getServerName();
            $username = $this->getUserName();
            $password = $this->getPassword();
            $dbname = $this->getDatabaseName();
        
            $dbTable = $this->getTableName();

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // sql to delete a record
            $sql = "DELETE FROM $dbTable WHERE id=$idNumber";

            if ($conn->query($sql) === TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . $conn->error;
            }

            $conn->close();
    }
    
    /**
     * Executes an SQL Query
     * @param String $SQLQuery
     * @see getServerName()
     * @see getUserName()
     * @see getPassword()
     * @see getDatabaseName()
     */
    public function executeSQLQuery($SQLQuery)
    {
            $servername = $this->getServerName();
            $username = $this->getUserName();
            $password = $this->getPassword();
            $dbname = $this->getDatabaseName();

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = $SQLQuery;

            if ($conn->query($sql) === TRUE) 
            {
                echo "Query executed successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
    }
    
    /**
     * Insert ready rows: 'John', 'Doe2'
     * @param array $array
     * 
     */
    private function insertReadyVals(array $array)
    {
        $arrlength = count($array);

        $arrMinus1 = $arrlength - 1;
        
        $storageVar;
        
        for($x = 0; $x < $arrlength; $x++) 
        {
            if($x < $arrMinus1)
            {
                $storageVar .="'" . $array[$x] . "'" . ', ';
            }
            else
            {
                $storageVar .="'" . $array[$x] . "'";
            }
        }
        return $storageVar;
    }

    /**
     * Insert into sql database 
     * Starts to insert at row number 2
     * insertIntoDB(array('dddd', 'fff'))
     * @param array $array
     * @see returnSQLReadyRowsMinusID()
     * @see getServerName()
     * @see getUserName()
     * @see getPassword()
     * @see getDatabaseName()
     * @see getTableName()
     */
    public function insertIntoDB(array $array)
    {
        $servername = $this->getServerName();
        $username = $this->getUserName();
        $password = $this->getPassword();
        $dbname = $this->getDatabaseName();

        $dbTable = $this->getTableName();

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //ARRAY
        $arrlength = count($array);

         $arrMinus1 = $arrlength - 1;

         $storageVar;

         for($x = 0; $x < $arrlength; $x++) 
         {
             if($x < $arrMinus1)
             {
                 $storageVar .="'" . $array[$x] . "'" . ', ';
             }
             else
             {
                 $storageVar .="'" . $array[$x] . "'";
             }
         }
        //ARRAY


        $sql = "INSERT INTO $dbTable ({$this->returnSQLReadyRowsMinusID()})
        VALUES ({$storageVar})";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    
    
    /**
     * Prints out all tables that are in database
     * @see getServerName()
     * @see getUserName()
     * @see getPassword()
     * @see getDatabaseName()
     */
    public function printAllTablesInDatabase()
    {
        $servername = $this->getServerName();
        $username = $this->getUserName();
        $password = $this->getPassword();
        
        $dbname = $this->getDatabaseName();
        

        if (!mysql_connect($servername, $username, $password)) 
        {
            echo 'Could not connect to mysql';
            exit;
        }

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
            echo "<br>Table: {$row[0]}";
        }

        mysql_free_result($result);
    }
   
        
        
    /**
     * 
     * Prints out all rows of your selected table input
     * @param String $theTable
     * 
     * @see getServerName()
     * @see getUserName()
     * @see getPassword()
     * @see getDatabaseName()
     * 
     */
    public function printAllRows($theTable)
    {
        $servername = $this->getServerName();
        $username = $this->getUserName();
        $password = $this->getPassword();

        $dbname = $this->getDatabaseName();


        if (!mysql_connect($servername, $username, $password)) 
        {
            echo 'Could not connect to mysql';
            exit;
        }

        mysql_select_db($dbname);

        $sql = "SELECT * FROM $theTable";
        $result = mysql_query($sql);

        if (!$result) 
        {
            echo "DB Error, could not list tables\n";
            echo 'MySQL Error: ' . mysql_error();
            exit;
        }
        echo "<h2>$theTable</h2>";
        while ($row = mysql_fetch_row($result)) 
        {

              foreach($row as $key => $value) 
              {
                echo "$key <br> $value<br><hr>";
              }
        }

        mysql_free_result($result);
    }
 
    /**
     * 
     * Prints out all rows of the table
     * 
     * @see getServerName()
     * @see getUserName()
     * @see getPassword()
     * @see getDatabaseName()
     * @see getTableName()
     * 
     */
    public function printAllRowsInTable()
    {
        $servername = $this->getServerName();
        $username = $this->getUserName();
        $password = $this->getPassword();

        $dbname = $this->getDatabaseName();

        $dbTable = $this->getTableName();

        if (!mysql_connect($servername, $username, $password)) 
        {
            echo 'Could not connect to mysql';
            exit;
        }

        mysql_select_db($dbname);

        $sql = "SELECT * FROM $dbTable";
        $result = mysql_query($sql);

        if (!$result) 
        {
            echo "DB Error, could not list tables\n";
            echo 'MySQL Error: ' . mysql_error();
            exit;
        }
        echo "<h2>$dbTable</h2>";
        while ($row = mysql_fetch_row($result)) 
        {

              foreach($row as $key => $value) 
              {
                echo "$key <br> $value<br><hr>";
              }
        }

        mysql_free_result($result);
    }
    
    /**
     * Delete param selected table
     * @param String $tableToDelete
     * @see executeSQLQuery($SQLQuery)
     * @uses executeSQLQuery($SQLQuery)
     */
    public function deleteTable($tableToDelete)
    {
        $this->executeSQLQuery("DROP TABLE $tableToDelete");
    }
    
    
}

/**
 * Extends TableCreate
 * with default row of id auto increment primary key
 * @uses class TableCreate
 * @uses class DataTypes
 * 
 */
class TableCreatorSimple extends TableCreate
{
    private $dataT;

    /**
     * Set table name
     * @param String $tableName2
     */
    function __construct($tableName2) 
    {
        parent::__construct($tableName2);
        
        $this->dataT = new DataTypes();

        $this->addRowAdvanced("id",$this->dataT->getTypePRIMARYKEYNOTNULLAUTOINCREMENT());
    }
    

}


/**
 * Creates an create table String line to use to create a table
 * @see Class DataTypes
 * 
 */
class TableCreate
{
    private $tableName = "some table";
    private $storageVar;
    private $rows = array();
    /**
     * Add the table name
     * @param String $tableName
     */
    function __construct($tableName) 
    {
        $this->tableName = $tableName;
    }

    /**
     * Return the table name
     * @return String tableName
     */
    public function getTableName() 
    {
        return $this->tableName;
    }

    /**
     * Set value of tablenName
     * @param String $tableName
     */
    public function setTableName($tableName) 
    {
        $this->tableName = $tableName;
    }
    
    /**
     * 
     * @return String storageVar
     */
    private function getStorageVar() 
    {
        return $this->storageVar;
    }

    /**
     * 
     * @return array rows
     */
    private function getRows() 
    {
        return $this->rows;
    }

    /**
     * 
     * @param String $storageVar
     */
    private function setStorageVar($storageVar) 
    {
        $this->storageVar = $storageVar;
    }

    /**
     * 
     * @param array $rows
     */
    private function setRows($rows) 
    {
        $this->rows = $rows;
    }

    
    /**
     * Add row to array
     * @param String $datatype
     */
    public function addRowSimple($datatype)
    {   
        array_push($this->rows, $datatype);
    }
    
    /**
     * This returns String needed to create a table
     * @return String all rows
     */
    public function getAllRows()
    {
        $tableName = $this->tableName;

        //ARRAY
        $arrlength = count($this->rows);

         $arrMinus1 = $arrlength - 1;

         $this->storageVar = "CREATE TABLE $tableName ( ";

         for($x = 0; $x < $arrlength; $x++) 
         {
             if($x < $arrMinus1)
             {
                  $this->storageVar .=  $this->rows[$x] . ', ';
             }
             else
             {
                  $this->storageVar .= $this->rows[$x] . ' )';
             }
         }
        //ARRAY
        return  $this->storageVar;
    }
    
    /**
     * Echo out all rows
     */
    public function printAllRows()
    {
        echo $this->getAllRows();
    }
    
    
    
    /**
     * ONLY For test purposes
     * @param DataTypes $bar
     */
    private function foo(DataTypes $bar)
    {
        $bar->getTypePRIMARYKEY();
    }
    
    

    /**
     * Type in name of row than datatype
     * @param String $theName
     * @param String $dataT
     */
    public function addRowAdvanced($theName, $dataT)
    {   
        
        $totalName = $theName . " " .  $dataT;
        
        array_push($this->rows, $totalName);
    }

}

/**
 * Datatypes of SQL
 */
class DataTypes 
{
    private $typeInteger = "INT";
    private $typeVarchar = "VARCHAR(100)";
    private $typeFloat = "FLOAT";
    private $typeNOTNULL =  "NOT NULL";
    private $typePRIMARYKEY = "PRIMARY KEY";
    private $typeAUTOINCREMENT = "AUTO_INCREMENT";
    private $typePRIMARYKEYNOTNULLAUTOINCREMENT = "INT NOT NULL PRIMARY KEY AUTO_INCREMENT";
    

    public function __construct() 
    {
        
    }
    
    /**
     * 
     * @return String INT
     */
    public function getTypeInteger()
    {
        return $this->typeInteger;
    }

    /**
     * 
     * @return String VARCHAR(100)
     */
    public function getTypeVarchar() 
    {
        return $this->typeVarchar;
    }

    /**
     * 
     * @return String FLOAT
     */
    public function getTypeFloat() 
    {
        return $this->typeFloat;
    }

    /**
     * 
     * @return String NOT NULL
     */
    public function getTypeNOTNULL() 
    {
        return $this->typeNOTNULL;
    }

    /**
     * 
     * @return String PRIMARY KEY
     */
    public function getTypePRIMARYKEY()
    {
        return $this->typePRIMARYKEY;
    }

    /**
     * 
     * @return String AUTO_INCREMENT
     */
    public function getTypeAUTOINCREMENT() 
    {
        return $this->typeAUTOINCREMENT;
    }

    /**
     * 
     * @return String INT NOT NULL PRIMARY KEY AUTO_INCREMENT
     */
    public function getTypePRIMARYKEYNOTNULLAUTOINCREMENT() 
    {
        return $this->typePRIMARYKEYNOTNULLAUTOINCREMENT;
    }

    private function setTypeInteger($typeInteger) 
    {
        $this->typeInteger = $typeInteger;
    }

    /**
     * Set datatype varchar with custom length
     * @param int $length
     */
    public function setTypeVarchar($length) 
    {
        $this->typeVarchar = "VARCHAR($length)";
        return $this->typeVarchar;
    }

    private function setTypeFloat($typeFloat) 
    {
        $this->typeFloat = $typeFloat;
    }

    private function setTypeNOTNULL($typeNOTNULL) 
    {
        $this->typeNOTNULL = $typeNOTNULL;
    }

    private function setTypePRIMARYKEY($typePRIMARYKEY) 
    {
        $this->typePRIMARYKEY = $typePRIMARYKEY;
    }

    private function setTypeAUTOINCREMENT($typeAUTOINCREMENT) 
    {
        $this->typeAUTOINCREMENT = $typeAUTOINCREMENT;
    }

    private function setTypePRIMARYKEYNOTNULLAUTOINCREMENT($typePRIMARYKEYNOTNULLAUTOINCREMENT) 
    {
        $this->typePRIMARYKEYNOTNULLAUTOINCREMENT = $typePRIMARYKEYNOTNULLAUTOINCREMENT;
    }


}
 ?>
