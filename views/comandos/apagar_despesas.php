<?php
session_start();
include('../../config/conexao.php');

$con = pg_connect("host=$server dbname=$database user=$username password=$password") or die("Não foi possível conectar ao servidor\n");

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !==true) {
    header("location: index.php");
    exit;
}


$id_desp = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id_desp)){
    $del_desp = "delete from despesas where id=$id_desp";
    $result_del_desp = pg_query($con, $del_desp); 

	if(pg_affected_rows($result_del_desp)){
		$_SESSION['msg_desp'] = "<div class='alert alert-success'><p>Despesas apagada com sucesso</p></div>";
		header("Location: ../consultar.php");
	}else{

		$_SESSION['msg_desp'] = "<div class='alert alert-danger'><p>Erro ao excluir a despesa</p></div>";
		header("Location: ../consultar.php");
	}
}else{	
	$_SESSION['msg_desp'] = "<div class='alert alert-warning'><p>Necessário selecionar uma despesa</p></div>";
	header("Location: ../consultar.php");
}