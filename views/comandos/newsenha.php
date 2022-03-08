<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !==true) {
    header("location: index.php");
    exit;
}

    include("../../config/config.php");

   $con = pg_connect("host=$server dbname=$database user=$username password=$password") or die("Não foi possível conectar ao servidor\n");



   $login = $_SESSION["usuario"];


   $senha = isset($_POST['senha_atual'])?$_POST['senha_atual']:"";
   $senha_nova = isset($_POST['senha_nova'])?$_POST['senha_nova']:"";
   $confirme_senha = isset($_POST['confirme_senha'])?$_POST['confirme_senha']:"";
   
  
   if($senha_nova!=$confirme_senha)
   {
            $_SESSION['msg'] = "<div class='alert alert-danger'><p>Senha não são identicas!</p></div>";            
            header("Location: ../consultar_usuarios.php");
            return false;
   }

   $sql=pg_query("select 1 from usuarios where usuario='$login' AND password = md5('$senha') ");

   if(pg_num_rows($sql)<=0)
   {
    $_SESSION['msg'] = "<div class='alert alert-danger'><p>Senha Invalida!</p></div>";
    header("Location: ../consultar_usuarios.php");
    
    return false;
   } 
            $result=pg_query("update usuarios set password=md5('$senha_nova') where usuario='$login'");
    
            $_SESSION['msg'] = "<div class='alert alert-success'><p>Senha Alterada com Sucesso!</p></div>";
		    header("Location: ../consultar_usuarios.php");
        
            pg_close($conexao);
        
?>
