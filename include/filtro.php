<?php
        include('font.php');
        include('../config/conexao.php');
        
    
        $filtro1 = $_POST['filtro_id'];
        $filtro2 = $_POST['filtro_desc'];
        $filtro3 = $_POST['filtro_dest'];
        $result_despesas = "SELECT * FROM despesas WHERE id = '$filtro1' and descricao like '%$filtro2%' and destino  like '%$filtro3%'";
        $resultado_despesas = pg_query($conexao, $result_despesas);
        
        while($rows_despesas = pg_fetch_array($resultado_despesas)){
            echo "<tr><td>".$rows_despesas['id']."</td><br>";
            echo "<td>".$rows_despesas['descricao']."</td><br>";
            echo "<td>".$rows_despesas['destino']."</td></tr><br>";

        }
        

?>