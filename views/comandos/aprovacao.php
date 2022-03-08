<?php

session_start();

include('../../config/conexao.php');
          
            $con = pg_connect("host=$server dbname=$database user=$username password=$password") or die("Não foi possível conectar ao servidor\n");

            $id_aprov = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

            if(!empty($id_aprov)){
                $send_desp_aprov = "select * from despesas where id=$id_aprov";
                $result_send_aprov = pg_query($con, $send_desp_aprov); 

                if(pg_affected_rows($result_send_aprov)){
                    $_SESSION['msg_desp'] = "<div class='alert alert-primary'><p>Enviado para aprovação!</p></div>";
                    header("Location: ../consultar.php");
                }else{

                    $_SESSION['msg_desp'] = "<div class='alert alert-danger'><p>Erro ao excluir a despesa</p></div>";
                    header("Location: ../consultar.php");
                }
            }else{	
                $_SESSION['msg_desp'] = "<div class='alert alert-warning'><p>Necessário selecionar uma despesa</p></div>";
                header("Location: ../consultar.php");
            }
?>