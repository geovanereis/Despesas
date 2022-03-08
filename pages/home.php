<?php
//Coloque isso nas paginas que você quer q fike restrita
include('../session.php');
include('../include/font.php');
include('../include/menu.php');

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !==true) {
    header("location: index.php");
    exit;
}

if(isset($_GET['deslogar'])){
    
session_start();

session_unset();

session_destroy();

header('location: ../index.php');

}

include('../config/conexao.php');
$con = pg_connect("host=$server dbname=$database user=$username password=$password") or die("Não foi possível conectar ao servidor\n");

$count_despesas = "select sum(valor) as t from despesas;";
$sql = pg_fetch_assoc(pg_query($con, $count_despesas));
$total = $sql['t'];

$count_despesas = "select count(*) as t from despesas;";
$sql = pg_fetch_assoc(pg_query($con, $count_despesas));
$aguard = $sql['t'];

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../icons/fonts/bootstrap-icons.css"> 
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
<title>Document</title>
</head>
<body>
    
<div class="container">
    <h2>Ola, <?php echo $_SESSION["usuario"]; ?></h2>
    <div class="row">
        
        <div class="col indication btn-group-vertical">
            <p>Valor em Despesas</p>       
            <button type="button" class="btn btn-primary"><?php echo "R$ ".$total ?></button>
        </div>
        
        <div class="col indication btn-group-vertical">
            <p>Aguardado Aprovação</p>       
            <button type="button" class="btn btn-primary"><?php echo $aguard ?></button>
        </div>
        <div class="col indication">col</div>
        <div class="col indication">col</div>
    </div>
</div>
<script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="js/script.js"></script>    
    <script src="../js/bootstrap.min.js" ></script>
</body>
</html>