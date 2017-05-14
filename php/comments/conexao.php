
        <?php
        $conexao = mysqli_connect('localhost','root','');
        if (!$conexao) {
            die('Não foi possivel conectar ...' . mysql_error());
        }


        mysqli_select_db($conexao, "SOA");

        mysqli_query($conexao, "SET NAMES 'utf8'");
        mysqli_query($conexao, 'SET character_set_connection=utf8');
        mysqli_query($conexao, 'SET character_set_client=utf8');
        mysqli_query($conexao, 'SET character_set_results=utf8');
        ?>