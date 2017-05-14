<?php include "valida_sessao.inc"; ?>
<html>
<head>
<title>Meu Perfil</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="../Recursos/Imagens/icon.png">
<link rel="stylesheet" type="text/css" href="admin.css">
<link rel="stylesheet" type="text/css" href="styleadmin.css">
<script src="../Recursos/jquery/jquerymenu.js"></script>
<link rel="stylesheet" type="text/css" href="../Recursos/tabelas/css/component.css" />

<script src="../Recursos/grafico/Chart.min.js"></script>
<!-- Estilo -->
<style>
#imagem {
	color: rgba(255, 255, 255, 1);
	text-decoration: none;
	background-color: rgba(219, 87, 5, 1);
	font-family: 'Yanone Kaffeesatz';
	font-weight: 700;
	font-size: 20px;
	display: block;
	padding: 4px;
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	-webkit-box-shadow: 0px 9px 0px rgba(219, 31, 5, 1), 0px 9px 25px
		rgba(0, 0, 0, .7);
	-moz-box-shadow: 0px 9px 0px rgba(219, 31, 5, 1), 0px 9px 25px
		rgba(0, 0, 0, .7);
	box-shadow: 0px 9px 0px rgba(219, 31, 5, 1), 0px 9px 25px
		rgba(0, 0, 0, .7);
	width: 160px;
	text-align: center;
	-webkit-transition: all .1s ease;
	-moz-transition: all .1s ease;
	-ms-transition: all .1s ease;
	-o-transition: all .1s ease;
	transition: all .1s ease;
}

#imagem:active {
	-webkit-box-shadow: 0px 3px 0px rgba(219, 31, 5, 1), 0px 3px 6px
		rgba(0, 0, 0, .9);
	-moz-box-shadow: 0px 3px 0px rgba(219, 31, 5, 1), 0px 3px 6px
		rgba(0, 0, 0, .9);
	box-shadow: 0px 3px 0px rgba(219, 31, 5, 1), 0px 3px 6px
		rgba(0, 0, 0, .9);
	position: relative;
	top: 6px;
}

#input {
	width: 170px;
}

#head {
		padding:60px 0 40px 60px;
	position:relative;
	width:100%;
	background:rgb(174,0,1);
	background-image: -moz-linear-gradient( 135deg, rgb(79,0,0), rgb(174,0,0) );
			background-image: -webkit-linear-gradient( 135deg,rgb(12,0,0), rgb(174,0,0) );
					background-image: -o-linear-gradient( 135deg, rgb(12,0,0), rgb(174,0,0) );
							background-image: -ms-linear-gradient( 135deg,rgb(12,0,0), rgb(174,0,0)  );
								background-image: linear-gradient( 135deg,rgb(12,0,0), rgb(174,0,0)   );
	height:50px;
}

#head1 {
	font-size: 100%;
	color: white;
}
</style>


<body>
	<!--Esta Ã© a parte do cabeÃ§alho do cÃ³digo -->
	<?php
	include "cabecalho1.php";
	?>
	<!--Parte responsavel pelo funcionamento dos menus -->
	<br> <br> <br>
			<div id="head">
				<h1 id="head1">
					<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Meu Perfil
				</h1>
			</div>
	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>
			

<?php
// aqui Ã© startado a sessÃ£o e selecionado o usuÃ¡rio que possui o mesmo ni do que possui a sessÃ£o sartada
include "../Conexao.inc";
@session_start ();
$nome_usuario = $_SESSION ["nome_usuario"];
$r = mysqli_query ( $conexao, "SELECT * FROM Usuario WHERE NI=$nome_usuario" );

@$q = mysqli_query ( $conexao, $r );

while ( $row = mysqli_fetch_array ( $r ) ) {
	$ni = $row ['NI'];
	$anotacoes = $row ["Anotacoes"];
	$foto = $row ["foto"];
}
?>
<!-- Anotações  -->
			<div id="anotacoes">
				<div id="tituloanotacoes">Anotações</div>
				<form action="" method="post">
					<textarea name="anotacoes"
						style="resize: none;width:350px;height:300px;"><?=$anotacoes?></textarea>
					<input type="submit" value="Salvar" name="Salvar"
						style="width: 100px;">
				</form>
				<?php 
				if(isset($_POST["Salvar"])){
					//aqui Ã© atualizado as informaÃ§Ãµes das anotaÃ§Ãµes do usuÃ¡rio onde o ni for igual a id informada
					include "../Conexao.inc";
					$id = $ni;
					$anotacoes = $_POST["anotacoes"];
					$resultado = mysqli_query($conexao,"UPDATE Usuario SET Anotacoes = '$anotacoes' WHERE NI = '$id'");
					@$registro = mysqli_fetch_array($resultado);
					echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=meuperfil.php'>";
				}
				
				?>
			</div>
			<br> <br>
			<table
				style="box-shadow: 0 0 5px; border-radius: 4px; border: 1px solid black; width: 200px;">
				<tr>
					<td><img src="../Recursos/Usuario/<?=$foto?>" width="175" height="220">
						<form action="" method="post"
							enctype="multipart/form-data">

							<input type="file" name="img[]"
								style="width: 200px; cursor: pointer; border: 1px solid #e4e4e4;">
							<input type='image' src='../Recursos/Imagens/salvar.png' width='20'
								height='20' name="salvaimagem" value="<?= $ni?>">
						</form>
						<?php 
						if(isset($_POST["salvaimagem"])){
							
							include "../Conexao.inc";
							$ni = $_POST["salvaimagem"];
							
							$file = $_FILES["img"];
							$numfile = count(array_filter($file["name"]));
							
							//Pasta
							
							//se a foto for menor que 200 ou a imagem nÃ£o for do tipo permitido serÃ¡ informado um erro
							
							$permite = array("image/jpeg","image/png");
							$erro = 0;
							for($i=0 ; $i< $numfile ; $i++){
								$size = $file["size"][$i];
								$type = $file["type"][$i];
								if($size<200){
									echo "Imagem Muito Pequena.<br>";
									$erro++;
								}
							
								if(!in_array($type,$permite)){
									echo "Imagem Não é Do Tipo Suportado.<br>";
									$erro++;
								}
									
							}
							
							
							
							if($erro!=0){
								
							}
							
							echo "<br><br>";
							
							if($erro==0){
							
								//pasta do usuário
							
								$folder = "../Recursos/Usuario";
							
							
							
								$maxtam = 1024 * 1024 * 5; //5MB
							
								//Mensagens
								$msg = array();
								$error = array(
										1 => "Arquivo no upload é maior do que o limite definido",
										2 => "O arquivo ultrapassa o limite de tamanho MAX_FILE_SIZE (64MB)",
										3 => "O upload do arquivo foi feito parcialmente",
										4 => "Não foi feito o upload do arquivo"
								);
							
							
								//Recupera os dados das imagens
								if($numfile<=0)
								{
									echo "Selecione uma imagem";
								}
								else {
									for($i=0 ; $i< $numfile ; $i++){
										$name = $file["name"][$i];
										$type = $file["type"][$i];
										$size = $file["size"][$i];
										$error = $file["error"][$i];
										$tmp = $file["tmp_name"][$i];
											
											
							
										//Recupera a extensÃ£o do arquivo
										$extensao = @end(explode('.',$name)); //recupera o ultimo indice de um array
										$novoNome = rand().".$extensao";// novo nome a ser gravado na pasta (Rand = Gera um numero aleatorio)
										//aqui Ã© utilizado a foto do usuÃ¡rio e colocado a nova foto logo abaixo no banco de dados
										$r1 = mysqli_query($conexao,"UPDATE Usuario SET foto = '$novoNome' WHERE NI = '$ni'");
										@$registro = mysqli_fetch_array($r1);
							
										//Verificando os erros das minhas imagens
											
										if($error!=0)
										{
											$msg[] = "<b>$name  :</b>".$errorMsg[$error];
										}
											
										elseif($size > $maxtam)
										$msg[] = "<b>$name :</b>Erro - Imagem ultrapassa o limite de 5MB";
											
										else {
											if(move_uploaded_file($tmp,$folder."/".$novoNome)){ //Responsavel em copiar os arquivos temporarios para a pasta uploads
											
												
													
											}
											else
												$msg[] = "<b>$name :</b> Desculpe ! NÃ£o foi possivel fazer  Upload...<br><br>";
										}
										foreach($msg as $vlr)
											echo $vlr."<br>";
			}
									}
								}
							
								echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=meuperfil.php'>";
						}
						
						?>
						</td>
					<td>
		<?php
		// aqui Ã© a Ã¡rea que o usuÃ¡rio pode editar o seu perfil
		include "../Conexao.inc";
		@session_start ();
		$nome_usuario = $_SESSION ["nome_usuario"];
		$resultado = mysqli_query ( $conexao, "SELECT * FROM Usuario WHERE NI=$nome_usuario" );
		
		@$query = mysqli_query ( $conexao, $resultado );
		// form com os inputs
		while ( $row = mysqli_fetch_array ( $resultado ) ) {
			$nome = $row ["NI"];
			echo "NI :" . $row ['NI'] . "<br><br>";
			echo "<form action='' method='post'>";
			echo "<input type='hidden' name='ni' value='$row[NI]'>";
			echo "Nome :<input type='text' value='$row[Nome]' name='USR_NOME' maxlength='100'><br><br>";
			echo "Senha :<input type='password' value='$row[Senha]' name='USR_SENHA' maxlength='40'><br><br>";
			echo "Email :<input type='text' value='$row[Email]' name='USR_EMAIL' maxlength='100'><br><br><br><br><br><br>";
			echo "&nbsp;&nbsp;&nbsp;<input type='submit' value='Alterar' name='Alterar' style='width:200px;'>";
			echo "</form>";
		}
		
		/*
		 * <!-- O cÃ³digo a seguir Ã© responsavel pela validaÃ§Ã£o junto a ediÃ§Ã£o de usuÃ¡rios
	Caso ele passe pela validaÃ§Ã£o , informando tudo corretamente , como o numero de identificaÃ§Ã£o 
	, senha , senha secundaria , email correto , dentre outras coisas o usuÃ¡rio poderÃ¡ ser editado -->
		 * 
		 */
		if(isset($_POST["Alterar"])){
			include "../Conexao.inc";
			$USR_NI = $_POST["ni"];
			$USR_NOME = $_POST ["USR_NOME"];
			$USR_EMAIL = $_POST ["USR_EMAIL"];
			$USR_SENHA = $_POST ["USR_SENHA"];
			
			$erro = 0;
			if (empty ( $USR_NI )) {
				echo "Informe uma NI Valida.<br>";
				$erro += 1;
			}
			if (empty ( $USR_NOME )) {
				echo "Informe um Nome Valido.<br>";
				$erro += 1;
			}
			
			if (empty ( $USR_EMAIL )) {
				echo "Informe um Email Valido.<br>";
				$erro += 1;
			}
			
			if (empty ( $USR_SENHA )) {
				echo "Informe uma Senha Valida.<br>";
				$erro += 1;
			}
			if ($erro != 0) {
				echo "<a href='meuperfil.php?id=$USR_NI'>Voltar</a>";
			} else {
			// aqui Ã© atualizado o nome , senha e email do usuÃ¡rio
			// apÃ³s isso Ã© startado uma seÃ§Ã£o e colocado a senha nova na sessÃ£o da pessoa
			$resultado = mysqli_query ( $conexao, "UPDATE Usuario SET Nome = '$USR_NOME' WHERE NI = '$USR_NI'" );
			$resultado2 = mysqli_query ( $conexao, "UPDATE Usuario SET Senha = '$USR_SENHA' WHERE NI = '$USR_NI'" );
			$resultado3 = mysqli_query ( $conexao, "UPDATE Usuario SET Email = '$USR_EMAIL' WHERE NI = '$USR_NI'" );
					@$registro = mysqli_fetch_array ( $resultado );
					@$registro2 = mysqli_fetch_array ( $resultado2 );
					@$registro3 = mysqli_fetch_array ( $resultado3 );
					@session_start ();
					$_SESSION ["senha_usuario"] = "$USR_SENHA";
			
					echo "Dados Informados :<br>";
		echo "NI:" . $USR_NI . "<br>";
					echo "Nome:" . $USR_NOME . "<br>";
					echo "Senha:" . $USR_SENHA . "<br>";
					echo "Email:" . $USR_EMAIL . "<br>";
		}
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=meuperfil.php'>";
		}
		?>
</td>
				</tr>
			</table>

			<br> <br> <br>
<?php
// aqui o php conta quantas coisas o usuÃ¡rio ja fez no site , como cadastro de noticia e outros
include "../Conexao.inc";

$res = mysqli_query ( $conexao, "SELECT * FROM Noticia WHERE autor='$nome'" );

@$query = mysqli_query ( $conexao, $res );
$cont = 0;
while ( $row = mysqli_fetch_array ( $res ) ) {
	if ($row ["Id"]) {
		$cont += 1;
	}
}

$res1 = mysqli_query ( $conexao, "SELECT * FROM Slider WHERE autor='$nome'" );

@$query1 = mysqli_query ( $conexao, $res1 );
$slider = 0;
while ( $row = mysqli_fetch_array ( $res1 ) ) {
	if ($row ["autor"]) {
		$slider += 1;
	}
}

$res2 = mysqli_query ( $conexao, "SELECT * FROM link WHERE autor='$nome_usuario'" );

@$query2 = mysqli_query ( $conexao, $res2 );
$links = 0;
while ( $row = mysqli_fetch_array ( $res2 ) ) {
	if ($row ["id"]) {
		$links += 1;
	}
}

$res3 = mysqli_query ( $conexao, "SELECT * FROM destaque WHERE autor='$nome'" );

@$query3 = mysqli_query ( $conexao, $res3 );
$inovacao = 0;
while ( $row = mysqli_fetch_array ( $res3 ) ) {
	if ($row ["Id"]) {
		$inovacao += 1;
	}
}

$res4 = mysqli_query ( $conexao, "SELECT * FROM formularios WHERE autor='$nome_usuario'" );

@$query4 = mysqli_query ( $conexao, $res4 );
$formulario = 0;
while ( $row = mysqli_fetch_array ( $res4 ) ) {
	if ($row ["nome"]) {
		$formulario += 1;
	}
}
//aqui Ã© mostrado o que o usuÃ¡rio ja fez no site
echo "<table border='1' style='box-shadow: 0 0 5px ;border-radius:4px;border:1px solid black;border-collapse:collapse;' width='104%'>";
echo "<thead>";
echo "<tr>";
echo "<th>";
echo "Caracteristicas do Usuário";
echo "</th>";
echo "<th>";
echo "Estatisticas";
echo "</th>";
echo "</tr>";
echo "</thead>";
echo "<tr>";
echo "<td><br>";
echo "Noticias Postadas : ";
echo "</td>";
echo "<td><br>";
echo $cont;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><br>";
echo "Slides Postados : ";
echo "</td>";
echo "<td><br>";
echo $slider;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><br>";
echo "Links Postados : ";
echo "</td>";
echo "<td><br>";
echo $links;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><br>";
echo "Noticias de Inovação Postadas : ";
echo "</td>";
echo "<td><br>";
echo $inovacao;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><br>";
echo "Formularios Postados : ";
echo "</td>";
echo "<td><br>";
echo $formulario;
echo "</td>";
echo "</tr>";
echo "</table>";

?>
<!-- Aqui é feito o gráfico com as estatisticas do usuário -->
		<h3>Gráfico com as Estatisticas</h3>
			<div class="box-chart">
				<?php 
			if($cont==0 and $slider==0 and $links==0 and $inovacao==0 and $formulario==0){
				echo "O usuário Não possui Nenhum dado no Sistema.";
			}
			?>
				<canvas id="GraficoPizza" style="width: 100%;"></canvas>

				<script type="text/javascript">
				var noticias = <?= $cont?>;
				var slide = <?= $slider?>;
				var links = <?= $links?>;
				var inovacao = <?= $inovacao?>;
				var	formulario = <?= $formulario?>;
                var options = {
                    responsive:true
                };

                var data = [
                    {
                        value: noticias,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "Noticias"
                    },
                    {
                        value: slide,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Slide"
                    },
                    {
                        value: links,
                        color: "#e9e9e9",
                        highlight: "#e9e9e9",
                        label: "Links"
                    },
                    {
                        value: inovacao,
                        color: "orange",
                        highlight: "orange",
                        label: "Inovação"
                    },
                    {
                        value: formulario,
                        color: "#000000",
                        highlight: "#111111",
                        label: "Formulários"
                    }
                ]
                
                window.onload = function(){

                    var ctx = document.getElementById("GraficoPizza").getContext("2d");
                    var PizzaChart = new Chart(ctx).Pie(data, options);
                }  
            </script>
			


			</div>
			<br> <br>
			<!--Área de enviar recados-->
			<div
				style='background: #efefef; width: 880px; box-shadow: 0 0 5px; border-radius: 4px; border: 1px solid black;'>
				<form method="POST" action="">
					<h3>Enviar Recado :</h3>
					<br>
					<table>
						<tr>
							<td>Informe o Destinatário:</td>
							<td><select name="destino">
									<option value="Todos">Todos</option>
			<?php
			include "../Conexao.inc";
			$resultado = mysqli_query ( $conexao, "SELECT * FROM Usuario WHERE NI not like '$nome_usuario'" );
			if ($resultado === FALSE) {
				die ( mysql_error () );
			}
			
			while ( $row = mysqli_fetch_array ( $resultado ) ) {
				
				echo "<option value='$row[NI]'>" . $row ["Nome"] . "</option>";
			}
			
			?>
		
		</select></td>
						</tr>
						<tr>
							<td valign="top"><br> Digite o Recado:</td>
							<td><br> <textarea name="recado"
									maxlength="100" style="resize: none;width:600px;height:100px;"></textarea></td>
						</tr>
						<tr>
							<td><br></td>
							<td><br> <input type="submit" value="Enviar" id="input"
								name="upload1"></td>
						</tr>
					</table>
				</form>
				<?php 
				if(isset($_POST["upload1"])){
					//aqui Ã© pego o destino , o recado e a data do site
					include "../Conexao.inc";
					$destino = $_POST ["destino"];
					$recado = $_POST ["recado"];
					$data = date ( 'Y-m-d' );
					
					@session_start ();
					$nome_usuario = $_SESSION ["nome_usuario"];
					$resultado = mysqli_query ( $conexao, "SELECT * FROM Usuario WHERE NI=$nome_usuario" );
					
					@$query = mysqli_query ( $conexao, $resultado );
					
					while ( $row = mysqli_fetch_array ( $resultado ) ) {
						$ni = $row ["NI"];
					}
					
					if (empty ( $recado )) {
						echo "Por Favor Insira um Recado Válido .<br><br>";
					} else {
						//Aqui Ã© inserido o recado no banco de dados
						$resultado = mysqli_query ( $conexao, "INSERT INTO recado values(null,'$destino','$ni','$data','$recado')" );
						echo "Mensagem Enviada com Sucesso !<br><br>";
					
						@$query = mysqli_query ( $conexao, $resultado );
					
						mysqli_close ( $conexao );
					}
				}
				
				?>
				
			</div>

		</div>
		
	</div>

	
	<?php
	include "menuadm.php";
	?>
     
	<!--Parte responsavel pelo rodape do site -->
	<br> <br> <br> <br> <br><br> <br> <br> <br> <br>

		<div id="rodape1" align="center">
			<address>©2015 - 2015 CFP 5.14 - Todos os direitos reservados</address>

		</div>
	

</body>
</html>