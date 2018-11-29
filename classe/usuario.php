<?php 

 class Usuario{

     private $deslogin;
     private $dessenha;
     private $idusuario;
     private $dtcadastro;


     public function  getDeslogin (){
       return  $this->deslogin;
     }
     public function setDeslogin($value){
     	$this->deslogin =$value;
     }

     public function getDessenha(){
     	return $this->dessenha;
     }

     public function setDessenha($value){
     	$this->dessenha=$value;
     }

     public function getIdusuario(){
     	return $this->idusuario;
       
     }
     public function setIdusuario($value){
         $this->idusuario=$value;
     }

     public function getDtcadastro(){
     	return $this->dtcadastro;
     } 
     public function setDtcadastro($value){
     	$this->dtcadastro=$value;
     }

     public static function getList(){

        $sql = new Sql();

        return $sql->select("SELECT *FROM tb_usuario ORDER BY idusuario");

     }


     public static function search($login){
        
         $sql = new Sql();

          return $sql->select("SELECT *FROM tb_usuario WHERE deslogin  LIKE :search",array(
             ":search"=>"%".$login."%"
            ));
   
    
     }

     public function valida($login,$senha){
         $sql =new Sql(); 
         
         $results =$sql->select("SELECT *FROM tb_usuario WHERE dessenha =:SENHA AND deslogin =:LOGIN",array(
             ":SENHA"=>$senha,
             ":LOGIN"=>$login
            ));

          if (count($results)>0) {
              
              $row =$results[0];

               $this->setIdusuario($row['idusuario']);
               $this->setDessenha($row['dessenha']);
               $this->setDeslogin($row['deslogin']);
               $this->setDtcadastro(new datetime($row['dtcadastro']));
          }else{

            throw new Exception("Erro no login ou senha");
            
          }
     }
 	
 	public function loadByid($id){
 		$sql = new sql();

 		$results = $sql->select("SELECT *FROM tb_usuario WHERE idusuario=:ID",array(
           ":ID"=>$id
 		)); 

 		if (count($results) > 0) {
 		
          $row = $results[0];

        $this->setDessenha($row['dessenha']);
        $this->setDeslogin($row['deslogin']);
        $this->setIdusuario($row['idusuario']);
        $this->setDtcadastro( new DateTime($row['dtcadastro']));
 		}
 	}

 	public function __toString(){
     
     return json_encode(array(
       "idusuario"=>$this->getIdusuario(),
       "dessenha" =>$this->getDessenha(),
       "deslogin" =>$this->getDeslogin(),
       
       "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y h:i:s")
     
     ));

 	}
 
 }

?>