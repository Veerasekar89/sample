<?php 
/******************************************
Database connection and query functions
*******************************************/

class db {
  private $hostname="localhost";
    private $username="root";    // specify the sever details for mysql
    private $password="";
    private $database="propertydetails";
    private $con;
	static private $instance;
	static public function getInstance(){
		 if (null === self::$instance) {
			 self::$instance = new self;
		 }
		 return self::$instance;
	 }
	private function __construct(){
		$this->con = mysql_connect($this->hostname,$this->username,$this->password);
		if(!$this->con){
			die("Db not connected".mysql_error());
		}
		mysql_select_db($this->database);
	}
	function select($table_name, $Attribute, $Option=""){ // This function use to select data from data table.  
		$query = "SELECT $Attribute FROM $table_name $Option";
		$result   = array();
		$result[] = mysql_query($query) or die("__Select() Function Problem => ". mysql_error());
		$result[] = mysql_num_rows($result[0]);
		return $result;
	}
	function update($table_name, $Attribute_value, $Option){ //Update Data to Database Table Cell
		$result = "UPDATE $table_name SET $Attribute_value $Option";			
		$query = mysql_query($result) or die("__Update() Function Problem => ". mysql_error());
		return $query;
	}
	function insert($table_name,$Attribute, $Attribute_value){ //Insert Data to Database Table
		 $result = "INSERT INTO $table_name ($Attribute) VALUES ($Attribute_value)";
		 $query = mysql_query($result) or die("__Insert() Function Problem => ". mysql_error());
		 return $query;
	}
	function __Delete($table_name,$Option) {
		$result = "DELETE FROM $table_name $Option";
		$query = mysql_query($result) or die("__Delete() Function Problem => ". mysql_error());
		return $query; 
	}
	function fetchArray($Resource){
		$data = array();
		while($row=mysql_fetch_array($Resource))
			$data[] = $row;
		return $data;
	}

}

?>
