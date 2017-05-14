<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="Recursos/Imagens/icon.png">
<title>Contato</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="../favicon.ico">
<script src="Recursos/jquery/jquerymenu.js"></script>
<link rel="stylesheet" type="text/css" href="Recursos/contato/css/normalize.css" />
<style>
body, .container {
	height: 100%;
	position:relative;
	top:-5%;
}

body {
	background: #3b3f45;
	color: #fff;
	font-weight: 400;
	font-size: 1em;
	font-family: 'Raleway', Arial, sans-serif;

}

a {
	color: rgba(0,0,0,0.3);
	text-decoration: none;
	outline: none;
}

a:hover, a:focus {
	color: #fff;
}

/* Top Navigation Style */
.codrops-top {
	margin-top: 1em;
}

.codrops-top a {
	font-size: 0.69em;
	padding: 0 0.25em;
	display: inline-block;
	text-decoration: none;
	font-size: 1.2em;
}

.codrops-icon:before {
	margin: 0 4px;
	text-transform: none;
	font-weight: normal;
	font-style: normal;
	font-variant: normal;
	font-family: 'codropsicons';
	line-height: 1;
	speak: none;
	-webkit-font-smoothing: antialiased;
}

.codrops-icon-drop:before {
	content: "\e001";
}

.codrops-icon-prev:before {
	content: "\e004";
}

.codrops-icon-info:before {
	content: "\e003";
}

.codrops-icon span {
	display: none;
	position: absolute;
	font-size: 0.85em;
	padding: 0.5em 0 0 0.25em;
	font-weight: 700;
}

.codrops-icon:hover span {
	display: block;
	color: #6a7b7e;
}

/* Related demos */
.related {
	font-weight: 700;
	text-align: center;
	padding: 5em 0;
	display: none;
	background: #fff;
	color: rgba(0,0,0,0.3);
}

.overview .related {
	display: block;
}

.related > a {
	border: 3px solid black;
	border-color: initial;
	display: inline-block;
	text-align: center;
	margin: 20px 10px;
	padding: 25px;
}

.related > a:hover,
.related > a:focus {
	color: rgba(0,0,0,0.5);
}

.related a img {
	max-width: 100%;
	opacity: 0.8;
}

.related a:hover img,
.related a:active img {
	opacity: 1;
}

.related a h3 {
	margin: 0;
	padding: 0.5em 0 0.3em;
	max-width: 300px;
	text-align: left;
}
</style>
<link rel="stylesheet" type="text/css" href="Recursos/contato/css/component.css" />
<link rel="stylesheet" type="text/css" href="Recursos/contato/css/cs-select.css" />
<link rel="stylesheet" type="text/css"
	href="Recursos/contato/css/cs-skin-boxes.css" />
<script src="Recursos/contato/js/modernizr.custom.js"></script>
</head>
<body>

	<?php
	include "cabecalho.php";
	?>
	<!-- Aqui é colocado o formulario de contato -->
	<div class="container" style="position: relative; left: -15%;">
	<br><br><br><br><br>
		<div class="fs-form-wrap" id="fs-form-wrap">
			<div class="fs-title"></div>
			<form id="myform" class="fs-form fs-form-full" autocomplete="off"
				method="post" action="enviacontato.php">
				<ol class="fs-fields">
					<li><label class="fs-field-label fs-anim-upper" for="nome">Informe
							seu Nome</label> <input class="fs-anim-lower" id="nome"
						name="nome" type="text" placeholder="Nome" maxlength="50" required />
					</li>
					<li><label class="fs-field-label fs-anim-upper" for="email"
						data-info="Nós Não Enviaremos Spams , ou enviaremos...Mhuauhahua">Informe
							o seu E-mail</label> <input class="fs-anim-lower" id="email"
						name="email" type="email" placeholder="Email@email.com"
						maxlength="90" required /></li>
					<li><label class="fs-field-label fs-anim-upper" for="ddd">Informe o
							seu Telefone</label> <input class="fs-anim-lower" id="ddd"
						name="ddd" type="text" placeholder="DDD" maxlength="3" required size="3"/>
						<input class="fs-anim-lower" id="telefone" name="telefone"
						type="text" placeholder="Telefone" maxlength="10" required /></li>

					<li><label class="fs-field-label fs-anim-upper" for="assunto">Assunto</label>
						<textarea class="fs-anim-lower" id="assunto" name="assunto"
							placeholder="Descreva-o" maxlength="30" required></textarea></li>
					<li><label class="fs-field-label fs-anim-upper" for="mensagem">Mensagem</label>
						<textarea class="fs-anim-lower" id="mensagem" name="mensagem"
							placeholder="Mensagem" required></textarea></li>
				</ol>
				<button class="fs-submit" type="submit">Enviar</button>
			</form>
			<!-- /fs-form -->
		</div>
		<!-- /fs-form-wrap -->


	</div>
	<!-- /container -->
	<script src="Recursos/contato/js/classie.js"></script>
	<script src="Recursos/contato/js/selectFx.js"></script>
	<script src="Recursos/contato/js/fullscreenForm.js"></script>
	<script>
			(function() {
				var formWrap = document.getElementById( 'fs-form-wrap' );

				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx( el, {
						stickyPlaceholder: false,
						onChange: function(val){
							document.querySelector('span.cs-placeholder').style.backgroundColor = val;
						}
					});
				} );

				new FForm( formWrap, {
					onReview : function() {
						classie.add( document.body, 'overview' ); // for demo purposes only
					}
				} );
			})();
		</script>
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