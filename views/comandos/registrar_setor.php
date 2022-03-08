<?php

session_start();

include('../../config/conexao.php');
            

            $idescricaosetor = $_POST['descricao_setor'];
            $isituacaosetor = $_POST['situacao_setor'];
        
            $con = pg_connect("host=$server dbname=$database user=$username password=$password") or die("Não foi possível conectar ao servidor\n");
            $sql_setor = "insert into setor (descricao,situacao) values ('$idescricaosetor','$isituacaosetor')";
            
            $inserir_setor = pg_query($con,$sql_setor);
                   if (!$inserir_setor) {
                    echo ("<script>
                        window.alert('Erro ao inserir dados')
                        window.location.href='../consultar_setor.php';
                        </script>");                    
                        pg_close($conexao); 
                    } else {
                        echo ("<script>
                        window.alert('Salvo com sucesso')
                        window.location.href='../consultar_setor.php';
                    </script>");
                        pg_close($conexao);
                    }
                    
?>
