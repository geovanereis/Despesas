<?php

session_start();

include('../../config/conexao.php');
            
        
            $con = pg_connect("host=$server dbname=$database user=$username password=$password") or die("Não foi possível conectar ao servidor\n");

            $idescricao = $_POST['descricao'];
            $ivalor = $_POST['valor'];
            $isolicitante = $_POST['solicitante'];
            $iaprovador = $_POST['aprovador'];
            $isetor = $_POST['setor'];
            $icentrodecusto = $_POST['centrodecusto'];
            $idata_despesa = $_POST['data_despesa'];

            $sql_despesa = "insert into despesas (descricao, valor,solicitante,aprovador,setor,centrodecusto,data_despesa) values ('$idescricao','$ivalor','$isolicitante','$iaprovador','$isetor','$icentrodecusto','$idata_despesa')";
        
            
            $inserir_despesa = pg_query($con,$sql_despesa);
                   if (!$inserir_despesa) {
                        $_SESSION['msg_desp'] = "<div class='alert alert-danger'><p>Erro ao Salvar despesa</p></div>";
                        header("Location: ../consultar.php");                                       
                    
                    pg_close($conexao); 
                    } else {                       
                        $_SESSION['msg_desp'] = "<div class='alert alert-success'><p>Despesas Salva com sucesso</p></div>";
		                header("Location: ../consultar.php");
                    
                        pg_close($conexao);
                    }
            
            

?>