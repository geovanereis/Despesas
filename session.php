<?php

require_once "config/conexao.php";

session_start();


if (isset($_SESSION["userid"]) && $_SESSION["userid"] != "") {
    header("location: ../pages/home.php");
    exit;
}

?>