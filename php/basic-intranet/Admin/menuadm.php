<?php include "valida_sessao.inc"; ?>
<!DOCTYPE html >
<html>
<head>
<title>Menu Administrativo</title>
<link rel="stylesheet" type="text/css" href="styleadmin.css">
<link rel="stylesheet" type="text/css" media="screen" href="menuadm.css" />

<!-- Menu de administração -->
<style>
body {
	font-family: Arial;
}
</style>
<meta charset="UTF-8">
</head>

<body>
	<div id="lateral">
		<div id="nav">

			<div id="menu">
				<ul class="box">					

			
			
							<?php
							include "../Conexao.inc";
							@session_start ();
							$nome_usuario = $_SESSION ["nome_usuario"];
							$resultado = mysqli_query ( $conexao, "SELECT * FROM Permissoes WHERE NI=$nome_usuario" );
							
							@$query = mysqli_query ( $conexao, $resultado );
							//aqui é pego todas as permissões do usuário para verificar se ele tem acesso
							//a cada uma das páginas
							while ( $row = mysqli_fetch_array ( $resultado ) ) {
								$id = $row ["NI"];
								
								$usuario = $row ["usuario"];
								$noticia = $row ["noticia"];
								$slide = $row ["slide"];
								$ramal = $row ["ramal"];
								$galeria = $row ["Galeria"];
								$arquivos = $row ["Arquivos"];
								$mensagens = $row ["Mensagens"];
								$inovacao = $row ["Inovacao"];
								$integracao = $row ["Integracao"];
							}
							
							$resultad = mysqli_query ( $conexao, "SELECT * FROM Usuario WHERE NI=$nome_usuario" );
							while ( $row = mysqli_fetch_array ( $resultad ) ) {
							$nome = $row ["Nome"];
							$foto = $row ["foto"];
							}							
							mysqli_close ( $conexao );
							?>
	<li><br> <br>
					<br>
					<br> <br>
					<!-- Nome do usuário -->
					<div id="usuario" align="center">
							<br> <br> <br> <br><br> <br>
						</div></li>
				</ul>
				<div id="main">
				<!-- Aqui é mostrado a foto do usuário -->
					<ul id="navigationMenu">
						<li><a class="home" href="meuperfil.php?id=<?=$id?>"> <img
								src="../Recursos/Usuario/<?=$foto?>" width="32" height="32"> <span
								style="height: 40px;">Meu Perfil<br>
								<font size="1"
									style="position: relative; top: -24.5px; font-size: 10px;">Perfil
										do Usuário</font></span>
						</a></li>

						<li><a class="home" href="administrador.php"> <img
								src="../Recursos/menuadm/home.png" width="30" height="30"> <span
								style="height: 40px;">Home<br>
								<font size="1"
									style="position: relative; top: -24.5px; font-size: 10px;">Home
										do Administrador</font></span>
						</a></li>
    
    
    <!-- Permissões do usuário , se ela for igual a 1 , ele possui acesso , caso seja igual a 0 , ele não possuirá acesso -->
    <?php if($usuario==1){?>
    <li><a class="home" href="gestaodeusuarios.php"> <img
								src="../Recursos/menuadm/usuario.png" width="30" height="30"> <span
								style="height: 40px;">Usuários<br>
								<font size="1"
									style="position: relative; top: -24.5px; font-size: 10px;">Administração
										de Usuários</font></span>
						</a></li>
    <?php
				}
				?>
    <?php
				if ($noticia == 1) {
					
					?>
    <li><a class="home" href="gestaodenoticias.php"> <img
								src="../Recursos/menuadm/pasta.png" width="30" height="30"> <span
								style="height: 40px;">Notícias<br>
								<font size="1"
									style="position: relative; top: -24.5px; font-size: 10px;">Notícias
										da Página Inicial</font></span>
						</a></li>
        <?php
				}
				?>
			 <?php
				if ($integracao == 1) {
					
					?>
     <li><a class="home" href="gestaodeintegracao.php"> <img
								src="../Recursos/menuadm/integracao.jpg" width="30" height="30"> <span
								style="height: 40px;">Integração<br>
								<font size="1"
									style="position: relative; top: -24.5px; font-size: 10px;">Formulários
										da Integração</font></span>
						</a></li>
      <?php
				}
				?>
   
		
				<?php
				
				if ($slide == 1) {
					
					?>
				
    <li><a class="home" href="gestaodeslide.php"> <img
								src="../Recursos/menuadm/slide.png" width="30" height="30"> <span
								style="height: 40px;">Slide<br>
								<font size="1"
									style="position: relative; top: -24.5px; font-size: 10px;">Apresentação
										na Página Inicial</font></span>

						</a></li>
   <?php
				}
				?>
				
				<?php if($ramal==1){?>
				
    <li><a class="home" href="gestaodefuncionarios.php"> <img
								src="../Recursos/menuadm/funcionario.png" width="30" height="30"> <span
								style="height: 40px;">Funcionários<br>
								<font size="1"
									style="position: relative; top: -24.5px; font-size: 10px;">Administração
										de Funcionários</font></span>
						</a></li>
     <?php
				}
				?>
	<?php if($ramal==1){?>
    <li><a class="home" href="gestaodelinks.php"> <img
								src="../Recursos/menuadm/links.png" width="30" height="30"> <span
								style="height: 40px;">Links<br>
								<font size="1"
									style="position: relative; top: -24.5px; font-size: 10px;">Links
										de acesso na Integração</font></span>
						</a></li>
      <?php
	}
	?>
	<?php if($arquivos==1){?>
    <li><a class="home" href="gestaodeformulario.php"> <img
								src="../Recursos/menuadm/formulario.png" width="30" height="30"> <span
								style="height: 40px;">Formulários<br>
								<font size="1"
									style="position: relative; top: -24.5px; font-size: 10px;">Administração
										de Formulários</font></span>
						</a></li>
      <?php
	}
	?>
		 <?php if($inovacao==1){?>
    <li><a class="home" href="gestaodeinovacao.php"> <img
								src="../Recursos/menuadm/inovacao.png" width="30" height="30"> <span
								style="height: 40px;">Inovação<br>
								<font size="1"
									style="position: relative; top: -24.5px; font-size: 10px;">Administração
										das Notícias de Inovação</font></span>
						</a></li>
      <?php
			}
			?>
	<?php if($galeria==1){?>
    <li><a class="home" href="gestaodegaleria.php"> <img
								src="../Recursos/menuadm/galeriaicone.png" width="30" height="30"> <span
								style="height: 40px;">Galeria<br>
								<font size="1"
									style="position: relative; top: -24.5px; font-size: 10px;">Administração
										da Galeria</font></span>
						</a></li>
      <?php
	}
	?>
	<?php if($mensagens==1){?>
    <li><a class="home" href="gestaodemensagens.php">
    <?php 
								include "../Conexao.inc";
								$resultado = mysqli_query ( $conexao, "SELECT * FROM contato WHERE novo = '1'" );
								$resultado1 = mysqli_query ( $conexao, "SELECT * FROM Solicitacao WHERE novo = '1'" );
								$cont=0;
								while ( $row = mysqli_fetch_array ( $resultado ) ) {
								if($row["id"]){
									$cont+=1;
									
								}
								
								}
								
								while ( $row = mysqli_fetch_array ( $resultado1 ) ) {
									if($row["id"]){
										$cont+=1;
											
									}
								
								}
								if($cont!=0){
								echo "<div style='position:absolute;left:55%;top:50%;height:15px;width:15px;text-align:center;background:red;border-radius:10px;'><font size='2'><font color='white'><b>$cont</b></font></font></div>";
								}
								?>
								 <img
								src="../Recursos/menuadm/mensagem.png" width="30" height="30"> <span
								style="height: 40px;">Mensagens<br>
								
								<font size="1"
									style="position: relative; top: -24.5px; font-size: 10px;">Caixa
										de Mensagens</font></span>
						</a></li>
      <?php
	}
	?>

</ul>
				</div>

				<!-- Fim .print-out -->
			</div>

		</div>

		<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-6511050-1', 'maujor.com');
  ga('send', 'pageview');
  // end Google Analitics
document.getElementById("lateral").setAttribute("onclick","void(0)"); //:hover no iOS => http://kwz.me/q1 Listing 6-2 
</script>
	</div>
</body>
</html>
