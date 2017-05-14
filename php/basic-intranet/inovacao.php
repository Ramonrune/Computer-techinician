<html>
<head>
<title>
Inovação
</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Recursos/inovacao/inovacao.css" type="text/css" media="screen" />
    <link rel="icon" href="Recursos/Imagens/icon.png">
<meta charset="UTF-8">
<link rel ="stylesheet" type="text/css" href="Layout/estilo.css">
<script src="Recursos/jquery/jquerymenu.js"></script>

    <script type="text/javascript" src="Recursos/inovacao/select.js"></script>
    <script type="text/javascript" src="Recursos/inovacao/funcoes.js"></script>
    <link rel="stylesheet" href="Recursos/inovacao/inova.css" type="text/css">
   
    <script type="text/javascript">
    stepcarousel.setup({
        galleryid: 'mygallery', //id of carousel DIV
        beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
        panelclass: 'panel', //class of panel DIVs each holding content
        autostep: { enable: true, moveby: 1, pause: 3000 },
        panelbehavior: { speed: 500, wraparound: true, wrapbehavior: 'slide', persist: true },
        defaultbuttons: { enable: true, moveby: 3, leftnav: ['images/prev.png', 0, 70], rightnav: ['images/next.png', -22, 70] },
        statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
        contenttype: ['inline'] //content setting ['inline'] or ['ajax', 'path_to_external_file']
    })
    </script>
    
</head>
<body>   
<!--Esta é a parte do cabeçalho do código -->
	<?php 
	include "cabecalho.php";
	?>
	
	
	<!--Parte responsavel pelo funcionamento dos menus -->
	<div id="titulogaleria">
		<br>INOVA SENAI
	</div>
	<div id="corpo">	
<div id="step-banner">
    <ul class="itens-banner">
    <?php 
        $r = mysqli_query($conexao, "SELECT * FROM destaque ORDER BY id DESC LIMIT 6 ");
		if($r === FALSE){
			die(mysql_error());
		
		}
		$cont=0;
		while($row = mysqli_fetch_array($r)){
					$cont+=1;
				
			echo  "<li><a src='' onclick='return false;'  id='destaque-$cont' style='position:relative;top:10px;'>$cont</a></li>";
			
		
		}
		
		
		?>
               
            
    </ul>
    <div class="img-destaque">
        
                  <?php 
        $r = mysqli_query($conexao, "SELECT * FROM destaque ORDER BY id DESC LIMIT 6");
		if($r === FALSE){
			die(mysql_error());
		
		}
		
		while($row = mysqli_fetch_array($r)){
			
			echo  "<a href='inovacaonoticia.php?id=$row[Id]'><img src='Recursos/Destaque/$row[imagem]' width='600' height='300'></a>";
			
		
		}
		
		
		?>
            
    </div>
    <div class="noticia">
        
        
                  <?php 
        $r = mysqli_query($conexao, "SELECT * FROM destaque ORDER BY id DESC LIMIT 6 ");
		if($r === FALSE){
			die(mysql_error());
		
		}
		
		while($row = mysqli_fetch_array($r)){
			
			echo "<div style='width:320px;word-wrap: break-word;' class='legenda'>";
            echo "<span class='chapeu'>Destaques</span><br><br>";
            echo "<h3><a href='inovacaonoticia.php?id=$row[Id]'><font color='black'>$row[titulo]</font></a></h3><br>";
            echo "</div>";
			
		
		}
		?>
                
            
            
    </div>
    <div style="font-size: 14px;
margin-top: 3px;
width: 97%;
float: left;
"><br><br><br><br><br><br><br><br><br>
    <img src="Recursos/Imagens/inicioinovacao.jpg" style="width: 103%;
height: 33,1%;">
	<br>
    
	
	<br><br><br>
	O Programa Inova SENAI foi criado para mostrar que boas ideias também nascem dentro de casa.
<br><br>
Alunos, docentes, técnicos e consultores dos Departamentos Regionais do SENAI em todo o país podem inscrever processos e projetos inovadores em gestão e tecnologia alinhados aos interesses e necessidades da indústria brasileira. 
<br><br>
A edição nacional  tem o seu lançamento em 27 de novembro e as inscrições seguem até 14 de fevereiro de 2014. 
<br><br>
Os projetos selecionados nessa primeira etapa participarão da Mostra INOVA SENAI, que acontecerá paralelamente à Olimpíada do Conhecimento, a ser realizada em Belo Horizonte/MG.
<br><br>
<div class="download-arquivo">
        <div class="topo-download-arquivo">
            <span>Download de arquivos</span>
        </div>
        <div class="conteudo-download-arquivo">
            <ul>
    <li><a href="http://arquivos.portaldaindustria.com.br/app/conteudo_18/2014/03/30/338/20131127090211733168a.pdf" target="_blank">Regulamento Inova Senai 2014</a><div class="clear"></div><div class="separador-download-arquivo no-bg"></div></li></ul></div></div>
<br>
    <video width="1000" height="600" controls>
  <source src="Recursos/audio/inova.mp4" type="video/mp4">
  <source src="Recursos/audio/inova.ogg" type="video/ogg">
</video>
</div>   

  
    
   
</div>

    
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div id="rodape" align="center" style="position:relative;top:40%;">
	<address>
	Rua Vereador Sergio Leopoldino Alves, 500 - Cidade Industrial<br>
	CEP: 13456-166 - Santa Bárbara d'Oeste - SP<br>
	Telefone: (19) 3499-1450 - senaisantabarbara@sp.senai.br
	<br>
	
	©2015 - 2015 CFP 5.14 - Todos os direitos reservados
	<br>
	<a href="creditos.php" style="color:white;">Créditos</a>
	</address>
	
	</div>
</body>
</html>
