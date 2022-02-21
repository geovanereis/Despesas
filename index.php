<?php
    require_once "config/conexao.php";
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/scripts.js"></script>

</head>

<body>
    <div class="container login">
        <div class="row">
            <div class="form-login col-sm-6 col-md-4 col-md-offset-2 ">
                <h1 class="text-center login-title">Login</h1>
                <div class="account-wall">
                    <form class="form-signin" method="POST" action="validar_usuario.php">
                        <input type="text" name="usuario" class="form-control" id="form-login" placeholder="usuario" required autofocus>
                        <input type="password" name="senha" class="form-control" id="form-password" placeholder="Password" required autofocus>
                        <input type="submit" name="submit" value="Entrar" class="btn btn-lg btn-primary btn-block" /> 
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

