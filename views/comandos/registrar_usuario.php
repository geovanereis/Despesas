<?php

            include('../../config/conexao.php');

            $con = pg_connect("host=$server dbname=$database user=$username password=$password") or die("Não foi possível conectar ao servidor\n");

            $inome = $_POST['nome_usuario'];
            $iemail = $_POST['email_usuario'];
            $iusuario = $_POST['login_usuario'];
            $ipassword = $_POST['password_usuario'];
            $inivel = $_POST['nivel'];
            $istatus = $_POST['status_usuario'];
            $iaprovador = $_POST['aprovador_usuario'];
            $isolicitante = $_POST['solicitante_usuario'];

            $sql_insert_user = "insert into usuarios (nome,email,usuario,password,nivel,status,aprovador,solicitante) values ('$inome','$iemail','$iusuario',md5('$ipassword'),'$inivel','$istatus','$iaprovador','$isolicitante')";
            
            $inserir_user= pg_query($con,$sql_insert_user);
                   if (!$inserir_user) {
                    
                        $_SESSION['msg_user'] = "<div class='alert alert-danger'><p>Erro ao Salvar despesa</p></div>";
                        header("Location: ../consultar.php");
                                    
                        pg_close($conexao); 
                    } else {
                        $_SESSION['msg_user'] = "<div class='alert alert-success'><p>Despesas Salva com sucesso</p></div>";
		                header("Location: ../consultar_usuarios.php");
                    }
                    
?>