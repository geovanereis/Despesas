<?php 
session_start();

//include('../include/font.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  
  <meta charset="utf-8">
  <title> Cadastro de Funcionarios </title>
  <!--<script src="../js/script.js"></script>-->
</head>
<body>
  
<div class="container">

  <h2>Cadastro de Funcionarios</h2><br>
  
  <form name="Cadastro" action="../../views/comandos/registrar_usuario.php" method="POST">
    <label>Nome: </label>
      <input type="text" name="nome_usuario" size="30" class="form-control" required autofocus><br>
    <label>E-mail: </label>
      <input type="e-mail" name="email_usuario" size="30" class="form-control" required autofocus><br>
    <label>Login: </label>
      <input type="text" name="login_usuario" size="30" class="form-control" required autofocus><br>
    <label>Senha: </label>
      <input type="password" name="password_usuario" size="30" class="form-control" required autofocus><br>
    <label>Nivel: </label>
      <select class="form-select" name="nivel" aria-label="Default select " required autofocus>
        <option value="administrador" selected>Administrador</option>
        <option value="nivel1">nivel 1</option>
      </select>
    <label>Status: </label>
      <select class="form-select" name="status_usuario" aria-label="Default select " required autofocus>
        <option value="t" selected>Ativo</option>
        <option value="f">Inativo</option>
      </select>
    <label>Aprovador: </label>
      <select class="form-select" name="aprovador_usuario" aria-label="Default select " required autofocus>
        <option value="t" selected>Ativo</option>
        <option value="f" >Inativo</option>
    </select>
    <label>Solicitante: </label>
      <select class="form-select" name="solicitante_usuario" aria-label="Default select " required autofocus>
        <option value="t" selected>Ativo</option>
        <option value="f" >Inativo</option>
    </select>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-primary btn-sm" value="Salvar">
    </div>
    
  </form>
</div>
</body>
</html>