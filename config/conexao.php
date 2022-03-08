<?php

require_once 'config.php';

session_start();

try {
      
      $conn = new PDO("pgsql:host=$server;dbname=$database;", $username, $password) or die('Não foi possivel conectar');
  

}catch(PDOException $e)
{
	echo "erro ao conectar";
   
}

?>

