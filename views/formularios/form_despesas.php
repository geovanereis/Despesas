<?php 
session_start();

$setor = "select id_setor, descricao from setor";
$result_setor = pg_query($con, $setor);

$aprovador = "select id, nome from usuarios where aprovador = 't'";
$result_aprovador = pg_query($con, $aprovador);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Lançar Despesas </title>
    <script src="../js/script.js"></script>
</head>
<body>

<div class="container">
  <h2>Lançar Despesas</h2><br>
  
    <form name="Cadastro" action="comandos/registrar_despesas.php" method="POST">
    
      <label>Descrição: </label>
        <input type="text" name="descricao" size="30" class="form-control" required autofocus><br>

      <label>Valor: </label>
        <input type="text" onKeyUp="mascaraMoeda(this, event)"  value="" name="valor" size="45" id="dinheiro" class="form-control" required autofocus ><br>

      <label>Solicitante: </label>
        <input type="text" name="solicitante" size="45" class="form-control" required autofocus><br>

      <label>Aprovador:</label>
        <select class="form-select" name="aprovador" aria-label="Default select " required autofocus><br>
          <option></option>
              <?php while($select_aprovador= pg_fetch_assoc($result_aprovador)) { ?>
              <option value="<?php echo $select_aprovador['id'] ?>"><?php echo $select_aprovador['nome'] ?></option>
              <?php } ?>
        </select>

      <label>Setor: </label>
        <select class="form-select" name="setor" aria-label="Default select " required autofocus><br>
        <option></option>
          <?php while($select_setor = pg_fetch_assoc($result_setor)) { ?>
          <option value="<?php echo $select_setor['id_setor'] ?>"><?php echo $select_setor['descricao'] ?></option>
          <?php } ?>
        </select>
      
      <label>Centro de Custo: </label>
        <input type="text" name="centrodecusto" size="45" class="form-control" required autofocus><br>

      <label>Data da despesa: </label>
        <input type="date" id="datefield" name="data_despesa" size="45" class="form-control" required autofocus  max='2000-13-13'><br>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
              <input type="submit" class="btn btn-primary btn-sm" name="salvar_despesas" value="Salvar">
          </div>    
    </form>
</div>
</body>
</html>