 <?php
/**
 * Description of myClass
 * Put this in a separate php class file
 * @author geekgeek
 */
 
class myClass 
{
  public $prop1 = "I'm a class property!"; 

  public function __construct()// prints out always
  {
      echo 'The class "', __CLASS__, '" was initiated!<br />'; 
  }
  
        public function setProperty($newval) // prints out new value
        {
            $this->prop1 = $newval;
        }

        public function getProperty() // printer ut $prop1 ="I'm a class property"
        {
            return $this->prop1 . "<br />";

        }
}
  ?>


 <?php
        // USE THE PHP CLASS. 
        // Put this where you want to use the class
        
        // Create 1 object of my class
        include 'myClass.php';
        $obj = new myClass();
             
        $obj->setProperty("navigation.php");
        echo $obj->getProperty();
        // Get the value of $prop1 from both objects
   

        // Set new values for both objects
        $obj->setProperty("I'm a new property value!");
        // Output both objects' $prop1 value
        echo $obj->getProperty();
        
        //prints out variables
        echo var_dump($obj);
        
        ?>

