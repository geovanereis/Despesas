<?php
session_start();
include('../../config/conexao.php');

$con = pg_connect("host=$server dbname=$database user=$username password=$password") or die("Não foi possível conectar ao servidor\n");

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !==true) {
    header("location: index.php");
    exit;
}


$id_user = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id_user)){
    $del_usuario = "select * from usuarios where id=$id_user";
    $result_del = pg_query($con, $del_usuario); 

	if(pg_affected_rows($result_del)){
		$_SESSION['msg'] = "<p>Usuário apagado com sucesso</p>";
		header("Location: ../consultar_usuarios.php");
	}else{

		$_SESSION['msg'] = "<p>Erro o usuário não foi apagado com sucesso</p>";
		header("Location: ../consultar_usuarios.php");
	}
}else{	
	$_SESSION['msg'] = "<p>Necessário selecionar um usuário</p>";
	header("Location: ../consultar_usuarios.php");
}