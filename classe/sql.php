<?php  

class Sql extends PDO{
	private $conn;

	public function  __construct(){

		$this->conn =new PDO("mysql:host=localhost;dbname=php7","root","");
	 	
	 } 

     private function setParams($statement,$parameters = array ()){

     	
     }

     private function setParam($statement,$key,$value){

     	$statement->bindParam($key,$value);
     }


	 public function query($rawQuery,$param = array()){

	     $stmt = $this->conn->prepare($rawQuery);

	      $this->setParams($stmt,$rawQuery);

	      $stmt->execute();

	      return $stmt;

	 }

	 public function select($rawQuery,$parms= array()):array
	 {

	 	$stmt=$this->query($rawQuery,$parms);

	 	return $stmt->fetchAll(PDO ::FETCH_ASSOC);
	 }
	
}

?>