<?php
    //conex�o com o banco de dados
        $conexao = mysqli_connect('localhost','root','');
        mysqli_select_db($conexao,"intranet0" );
 
    //verifica a p�gina atual caso seja informada na URL, sen�o atribui como 1� p�gina
        $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
 
   
        $produtos = mysqli_query($conexao,"select * from formularios");
   
    //conta o total de itens
        $total = mysqli_num_rows($produtos);
   
    //seta a quantidade de itens por p�gina, neste caso, 2 itens
        $registros = 10;
   
    //calcula o n�mero de p�ginas arredondando o resultado para cima
        $numPaginas = ceil($total/$registros);
   
    //variavel para calcular o in�cio da visualiza��o com base na p�gina atual
        $inicio = ($registros*$pagina)-$registros;
 
    //seleciona os itens por p�gina
        $cmd = "select * from formularios limit $inicio,$registros";
        $produtos = mysqli_query($conexao,$cmd);
        $total = mysqli_num_rows($produtos);
 
    //exibe os produtos selecionados
        while ($produto = mysqli_fetch_array($produtos)) {
            echo $produto['id']." - ";
            echo $produto['nome']." - ";
            echo $produto['referencia']." - ";
            echo "<br />";
        }
 
    //exibe a pagina��o
        for($i = 1; $i < $numPaginas + 1; $i++) {
             echo "<a href='index.php?pagina=$i'>".$i."</a> ";
        }
?>