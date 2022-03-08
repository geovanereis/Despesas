<?php 

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !==true) {
    header("location: ../index.php");
    exit;
}

if(isset($_GET['deslogar'])){
  session_destroy();
  header('location: ../index.php');
}

?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset=UTF-8>
    <title>Sistemas de Despesas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../icons/fonts/bootstrap-icons.css"> 
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
      
    
  </head>
  <body>
  
        <!-- inicio menu lateral 14/02/2022 -->

            <div class="main-menu sidebar d-flex flex-column  p-2 bg-dark menu" > <span class="icone-menu">Nome da Empresa</span><a href="../pages/home.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <span class="title">Sistema de Despesa</span> </a>
            <!--<div class="main-menu sidebar d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark menu " style="width:250px"> <a href="../pages/home.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <svg class="bi me-2" width="40" height="32"> </svg> <span class="fs-4" style="text-align: left;">Sistema de Despesa</span> </a>-->
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item"> <a href="../pages/home.php" class="nav-link text-white" aria-current="page"> <i class="bi bi-house-fill"></i><span class="ms-2">Home</span> </a> </li>
                    <li> <a href="../views/consultar.php" class="nav-link text-white"> <i class="bi bi-table"></i><span class="ms-2">Despesa em aberto</span> </a> </li>
                    <li> <a href="../views/aprovadores.php" class="nav-link text-white"> <i class="bi bi-table"></i><span class="ms-2">Despesas em aprovação</span> </a> </li>
                    
                    <div class="feat-btn dropdown submenu">
                        <a href="#" class=" nav-link text-white " id="dropcadastro" data-bs-toggle="dropdown" aria-expanded="false"> 
                            <i class="bi bi-clipboard2-plus-fill"></i>
                            <span class="title-cadastro">Cadastro</span>
                            <span class="seta bi bi-caret-down-fill"></span></a> 
                            <ul class="feat-show">
                                <li><a class="submenu-item" href="../views/consultar_setor.php">Setor</a></li>
                                <li><a class="submenu-item" href="../views/consultar_usuarios.php">Usuario</a></li>
                                <li><a class="submenu-item" href="../views/consultar_centrodecusto.php">Centro de Custo</a></li>
                            </ul>
                    </div>
                    <!--<li> <a href="#" class="nav-link text-white"> <i class="fa fa-cog"></i><span class="ms-2">Settings</span> </a> </li>-->
                </ul>
                <hr>
                <div class="dropdown"> 
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2"> <strong> John W </strong> </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="?deslogar=1">Sign out</a></li>
                    </ul>
                </div>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="../js/jquery.js"></script>
        <!-- fim menu lateral 14/02/2022 -->

    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="js/script.js"></script>    
    <script src="../js/bootstrap.min.js" ></script>

    <script>
        $('.feat-btn').click(function(){
        $('div ul .feat-show').toggleClass("show");
        });
    </script>

   

  </body>
</html>
