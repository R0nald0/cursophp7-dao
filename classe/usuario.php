<?php 

 class Usuario{

     private $deslogin;
     private $dessenha;
     private $idusuario;
     private $dtcadastro;


     public function  getDeslogin (){
       return  $this->$deslogin;
     }
     public function setDeslogin($value){
     	$this->deslogin =$value;
     }

     public function getDessenha(){
     	return $this->$dessenha;
     }

     public function setDessenha($value){
     	$this->deslogin=$value;
     }

     public function getIdusuario(){
     	return $this->$idusuario;
     }
     public function setIdusuario($value){
         $this->idusuario=$value;
     }

     public function getDtcadastro(){
     	return $this->$idusuario;
     } 
     public function setDtcadastro($value){
     	$this->idusuario=$value;
     }
 	
 	public function loadByid($id){
 		$sql = new sql();

 		$results = $sql->select("SELECT *FROM tb_usario WHERE idusuario=:ID",array(
           ":ID"=>$id
 		)); 

 		if (count($results) > 0) {
 		
          $row = $results[0];
          
         $this->setDeslogin($row['deslogin']);
         $this->setDessenha($row['dessenha']);
         $this->setIdusuario($row['idusuario']);
         $this->setDtcadastro( new DateTime($row['dtcadastro']));
 		}
 	}

 	public function __toString(){
     
     return json_encode(array(
       "idusuario"=>$this->getIdusuario(),
       "deslogin" =>$this->getDeslogin(),
       "dessenha" =>$this->getDessenha(),
       "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y h:i:s")
     
     ));

 	}
 
 }

?>