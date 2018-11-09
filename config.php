<?php 
spl_autoload_register(function($clasName){

$file_name= "classe".DIRECTORY_SEPARATOR."$clasName.php";

  if (file_exists($file_name)){
  	require_once($file_name);
  }


});
 
?>