<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !==true) {
    header("location: index.php");
    exit;
}

include('../config/conexao.php');
include('../include/font.php');
include('../include/menu.php');

$con = pg_connect("host=$server dbname=$database user=$username password=$password") or die("Não foi possível conectar ao servidor\n");

$user_session = $_SESSION["usuario"];
$query_consult = "select * from despesas d order by 1 desc";//"select * from despesas where solicitante = '$user_session'";
$result_consult = pg_query($con, $query_consult);

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script type="text/javascript" type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script> 

</head>
<body>

<!-- inicio Botão modal -->
<div class="container-fluid conteudo">
    
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content md-content">
                <?php include('formularios/form_despesas.php'); ?>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade bd-editar-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <?php include('../pages/editar.php'); ?>
            </div>
        </div>
    </div>

<!-- fim Botão modal -->

    <div class="container conteudo">

                <?php
                if(isset($_SESSION['msg_desp'])){
                    echo $_SESSION['msg_desp'];
                    unset($_SESSION['msg_desp']);
                } ?>
        <h2>Despesas em aprovação</h2>

        <button type="button" class="btn btn-primary bi bi-plus-circle btn-lg btn-despesas" data-toggle="modal" data-target=".bd-example-modal-lg"></button>

                <!--<input oninput="Pesquisar(this.value)" placeholder="Pesquisar">-->
        
        <div class="row justify-content-end">
            <table class="table table-striped table-efect" id="tabela">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>DESCRICAO</td>
                        <td>VALOR</td>
                        <td>SOLICITANTE</td>
                        <td>APROVADOR</td>
                        <td>SETOR</td>
                        <td>CENTRO DE CUSTO</td>
                        <td>DATA DA DESPESA</td>
                        <td>DATA DO LANCAMENTO</td>
                        <td>AÇÕES</td>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=pg_fetch_assoc($result_consult)) { ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['descricao'] ?></td>
                        <td><?php echo 'R$ '.$row['valor']?></td>
                        <td><?php echo $row['solicitante'] ?></td>
                        <td><?php echo $row['aprovador'] ?></td>
                        <td><?php echo $row['setor'] ?></td>
                        <td><?php echo $row['centrocusto'] ?></td>
                        <td><?php echo $row['data_despesa'] ?></td>
                        <td><?php echo $row['created_at'] ?></td>

                        <td class="botao-test">
                            <div>
                                <a href="id=<?php echo $row['id']; ?>" data-toggle="modal" data-target=".bd-editar-modal-lg" location='pages/editar.php?id=<?php echo $row['id']; ?>';return false" class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i><!--delete-->
                                </a>
                            </div>
                        
                            <div>
                                <a href="apagar?id=<?php echo $row['id']; ?>" onclick="if (confirm('Tem a certeza que deseja excluir a despesa ?')) location='comandos/apagar_despesas.php?id=<?php echo $row['id']; ?>';return false" class="btn btn-danger">
                                    <i class="bi bi-trash"></i><!--delete-->
                                </a>
                            </div>

                        </td>
        
                    </tr>
                    <?php pg_close($conexao); } ?>
                </tbody>
            </table><!-- fim table-->
        </div>
        <?php include('../include/footer.php'); ?>
    </div><!-- fim container-->
    
</div>
    <script type="text/javascript" src="../js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
</style>
</body>

