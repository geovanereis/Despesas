<?php
session_start();

include('../config/conexao.php');
include('../include/font.php');
include('../include/menu.php');


$con = pg_connect("host=$server dbname=$database user=$username password=$password") or die("Não foi possível conectar ao servidor\n");
$query_consult = "select * from vwp_usuarios";
$result_consult = pg_query($con,$query_consult);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/style.css">

    <title>Consulta</title>
</head>

<div class="container-fluid conteudo">
            <div class="modal fade bd-usuario-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content md-content">
                        <?php include('formularios/form_usuario.php'); ?>
                    </div>
                </div>
            </div>

            <div class="modal fade bd-novasenha-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content md-content">
                            <div>
                                <?php include('formularios/form_novasenha.php'); ?>
                            </div> 
                    </div>
                </div>
            </div>
            
    <div class="container">                
                <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                if(isset($_SESSION['msg_user'])){
                    echo $_SESSION['msg_user'];
                    unset($_SESSION['msg_user']);
                }
                ?>

        <h2>Lista de Usuarios</h2>
        <!--<input type="button" value="Teste" onclick="alerta()"-->
        <button type="button" class="btn btn-primary bi bi-plus-circle btn-lg btn-usuario" data-toggle="modal" data-target=".bd-usuario-modal-lg"></button>
        
        

        <table class="table table-striped table-efect">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome completo</td>
                    <td>E-mail</td>
                    <td>Usuario</td>
                    <td>Nivel</td>
                    <td>Status</td>
                    <td>Aprovador</td>
                    <td>Solicitante</td>
                    <td>Data Criação</td>
                    <td>Data ultimo Acesso</td>    
                </tr>
            </thead>
            <tbody>
                <?php
                        //if ($result_consult->num_rows > 0) {
                            while($row=pg_fetch_assoc($result_consult))
                            {
                                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['nome'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['usuario'] ?></td>
                    <td><?php echo $row['nivel'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['aprovador'] ?></td>
                    <td><?php echo $row['solicitante'] ?></td>
                    <td><?php echo $row['created_at'] ?></td>
                    <td></td>
                    
                    <td class="botao-test">
                        <form method="post">
                            <button type="submit" class="btn btn-primary bi bi-pencil-square">
                                <input type="hidden" name="editar" value="<?= $row["id"] ?>">
                            </button>
                        </form>
                                
                        <div>
                            <button type="button" class="btn btn-warning bi bi-lock-fill" data-toggle="modal" data-target=".bd-novasenha-modal-lg">
                                <input type="hidden" name="novasenha" value="<?= $row["id"] ?>">
                            </button>
                        </div>
                        
                        <div>
                            <a href="#" onclick="if (confirm('Tem a certeza que excluir este usuario?')) window.location='comandos/apagar_usuario.php?id=<?php echo $row['id']; ?>';return false" class="btn btn-danger">
                                <i class="bi bi-trash"></i><!--delete-->
                            </a>
                        </div> 
                        
                        
                    </td>                
                </tr>

                <?php pg_close($conexao); } ?>
            </tbody>
        </table>
    </div>
</div>
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js" ></script>
        <script src="../js/script.js" ></script>

<?php 

?>