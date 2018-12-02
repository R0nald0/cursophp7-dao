<?php  

require_once ("config.php");

$root = new Usuario();

$root->loadByid(2);
echo $root;
  
//$lista = Usuario::getList();

//echo json_encode($lista);


//$search = Usuario ::search("bo");
//echo json_encode($search); 

//$sql->query("DELETE FROM tb_usario WHERE idusuario=3");
//$sql->query("INSERT INTO tb_usario (deslogin,dessenha) VALUES ('Tuth','3213')");

//$usuarios =$sql->select("SELECT *FROM tb_usario");
//echo json_encode($usuarios);

//$validar = new Usuario();
//$validar->valida("miau","123");

//echo $validar;
//$aluno = new Usuario("alu","091");
//$aluno->insert();
//echo $aluno;


?> 