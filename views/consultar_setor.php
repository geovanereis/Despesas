<?php
//session_start();


include('../config/conexao.php');
include('../include/font.php');
include('../include/menu.php');

$con = pg_connect("host=$server dbname=$database user=$username password=$password") or die("Não foi possível conectar ao servidor\n");
$query_setor = "select * from setor";
$result_setor = pg_query($con,$query_setor);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JavaScript Bundle with Popper -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <title>Consulta</title>
  </head>
  <body>
  <div class="container">
            
            <button type="button" class="btn btn-primary btn-sm setor" data-toggle="modal" data-target=".bd-setor-modal-lg">Cadastrar Setor</button>
                  
            <div class="modal fade bd-setor-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content md-content">
                    <?php include('formularios/form_setor.php'); ?>
                    </div>
                </div>
            </div>    
        </div>
    
        <div class="container">
            <h2>Setores Cadastrados</h2>
            <table class="table table-striped table-efect">
                <thead>
                <tr>
					<td>ID SETOR</td>
					<td>DESCRICAO</td>
                    <td>SITUACAO</td>
					<td>DATA DA CRIACAO</td>
				</tr>
                </thead>
                <tbody>
                    <?php
                    //if ($result_consult->num_rows > 0) {
                        while($row=pg_fetch_assoc($result_setor))
                        {
                            ?>
                            <tr>
                                <td><?php echo $row['id_setor'] ?></td>
                                <td><?php echo $row['descricao'] ?></td>
                                <td><?php echo $row['situacao'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
                                <td>
                                    <!--<a href="#" href="edit.php" class="btn btn-primary btn-sm"><span class="fa fa-edit"></span>Editar</a>
                                    <a href="deletar_despesas.php?id_pag=<?php //echo $row['id'];?>"  class="btn btn-danger btn-sm" >Deletar</a>
                                    -->
                                </td>
                                <td></td>
                            </tr> 
                            <?php
                             
                        }
                    //}
                    ?>
                </tbody>
            </table>
            
            <a href="../pages/home.php" class="btn btn-secondary btn-sm">Voltar</a>
        </div>
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js" ></script>
        <script src="../js/script.js" ></script>

  </body>
</html>