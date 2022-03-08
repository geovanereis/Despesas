<?php 
session_start();

//include('../include/font.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Cadastrar Setor </title>
  <!--<script src="../js/script.js"></script>-->
</head>
<body>
  
<div class="container">

  <h2>Cadastrar Setor</h2><br>
  
  <form name="Cadastro" action="comandos/registrar_setor.php" method="POST">
    <label>Descricao: </label>
      <input type="text" name="descricao_setor" size="30" class="form-control" required autofocus><br>
    <label>Situação: </label>
    <select class="form-select" name="situacao_setor" aria-label="Default select " required autofocus>
      <option value="ativo" selected>Ativo</option>
      <option value="inativo">Inativo</option>
    </select>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-primary btn-sm" value="Salvar">
</div>
    
  </form>
</div>
</body>
</html>