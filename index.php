<?php  

require_once ("config.php");

$sql = new Sql();

//$sql->query("DELETE FROM tb_usario WHERE idusuario=3");
//$sql->query("INSERT INTO tb_usario (deslogin,dessenha) VALUES ('Tuth','3213')");

$usuarios =$sql->select("SELECT *FROM tb_usario");
echo json_encode($usuarios);


?>