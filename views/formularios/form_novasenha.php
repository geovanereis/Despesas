<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
        <h2>Alteração da Senha</h2>
        <form action="comandos/newsenha.php" method="post" enctype="multipart/form-data">
            <label>Senha Antiga: </label>
                <input type="password" name="senha_atual" size="30" class="form-control" required autofocus><br>
            <label>Senha Nova: </label>
                <input type="password" name="senha_nova" size="30" class="form-control" required autofocus><br>
            <label>Confirmação da senha Nova: </label>
                <input type="password" name="confirme_senha" size="30" class="form-control" required autofocus><br>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
                <input type="submit" class="btn btn-primary btn-sm" name="alterar_bt" value="Alterar"/>
            </div>
        </form>
</body>
</html>