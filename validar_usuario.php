<?php
require_once "config/conexao.php";
require_once "session.php";

$con = pg_connect("host=$server dbname=$database user=$username password=$password") or die("Não foi possível conectar ao servidor\n");

session_start();

if(empty($_POST['usuario']) || empty($_POST['senha'])){
    header('location: index.php');
    exit();
}

if(isset($_POST['submit'])){
    
    $username = trim($_POST["usuario"]);
    $hashpassword= md5($_POST['senha']);
    //$hashpassword = trim(password_hash($_POST['senha'], PASSWORD_DEFAULT));
    $query_user = "SELECT * FROM usuarios WHERE usuario = '".($_POST['usuario'])."' and password ='".$hashpassword."'";
    $valid_user = pg_query($con, $query_user) or die("Cannot execute query: $query_user\n");
    $login_check = pg_num_rows($valid_user);

    if($login_check > 0){ 
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $id;
        $_SESSION["usuario"] = $username; 
        header("location: pages/home.php");
    }else{
        
        header("location: index.php");
    }

    
}

?>