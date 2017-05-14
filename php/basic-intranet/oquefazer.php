<html>
<head>
<title>O que fazer ?</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="Recursos/Imagens/icon.png">
<link rel="stylesheet" type="text/css" href="Layout/estilo.css">
<script src="Recursos/jquery/jquerymenu.js"></script>
<!-- Estilo da página -->
<style>

.login {
	position: relative;
	top: -38%;
	right: 7%;
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text] {
	width: 250px;
	height: 40px;
	border: 1px solid lightgrey;
	border-radius: 2px;
	color: black;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=email] {
	width: 250px;
	height: 40px;
	border: 1px solid lightgrey;
	border-radius: 2px;
	color: black;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=submit] {
	width: 260px;
	height: 35px;
	background: rgb(219,39,15);
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: white;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=submit]:hover {
	opacity: 0.8;
}

.login input[type=submit]:active {
	opacity: 0.6;
}

.login input[type=submit]:focus {
	outline: none;
}

::-webkit-input-placeholder {
	color: lightgrey;
}

::-moz-input-placeholder {
	color: lightgrey;
}

</style>
 <script type="text/javascript">
          // disable backspace button
          function killBackSpace(e) {
              e = e ? e : window.event;
              var t = e.target ? e.target : e.srcElement ? e.srcElement : null;
              if (t && t.tagName && (t.type && /(password)|(text)|(file)/.test(t.type.toLowerCase())) || t.tagName.toLowerCase() == 'textarea')
                  return true;
              var k = e.keyCode ? e.keyCode : e.which ? e.which : null;
              if (k == 8) {
                  if (e.preventDefault)
                      e.preventDefault();
                  return false;
              };
              return true;
          };
          if (typeof document.addEventListener != 'undefined')
              document.addEventListener('keydown', killBackSpace, false);
          else if (typeof document.attachEvent != 'undefined')
              document.attachEvent('onkeydown', killBackSpace);
          else {
              if (document.onkeydown != null) {
                  var oldOnkeydown = document.onkeydown;
                  document.onkeydown = function (e) {
                      oldOnkeydown(e);
                      killBackSpace(e);
                  };
              }
              else
                  document.onkeydown = killBackSpace;
          }
    </script>

       <script type="text/javascript">
<!--

    //Disable right mouse click Script
    //By Maximus (maximus@nsimail.com) w/ mods by DynamicDrive
    //For full source code, visit http://www.dynamicdrive.com

    var message = "Function Disabled!";

    ///////////////////////////////////
    function clickIE4() {
        if (event.button == 2) {
            return false;
        }
    }

    function clickNS4(e) {
        if (document.layers || document.getElementById && !document.all) {
            if (e.which == 2 || e.which == 3) {
                return false;
            }
        }
    }

    if (document.layers) {
        document.captureEvents(Event.MOUSEDOWN);
        document.onmousedown = clickNS4;
    }
    else if (document.all && !document.getElementById) {
        document.onmousedown = clickIE4;
    }

    document.oncontextmenu = new Function("return false;")

    // --> 
    </script>

    <script language="JavaScript">

        var version = navigator.appVersion;

        function showKeyCode(e) {
            var keycode = (window.event) ? event.keyCode : e.keyCode;

            if ((version.indexOf('MSIE') != -1)) {
                if (keycode == 116) {
                    event.keyCode = 0;
                    event.returnValue = false;
                    return false;
                }
            }
            else {
                if (keycode == 116) {
                    return false;
                }
            }
        }

    </script>


</head>
<body style="min-width: 1000px;
	max-width: 2000px;height:300px;">
	<!--Está é a parte do cabeçalho do código -->
	<?php
	include "cabecalho.php";
	?>
	
	<!--Parte responsavel pelo funcionamento dos menus -->

	<br>
	<br>
	<br><br><br><br><br>
	<div style="position:absolute;">
	<img src="Recursos/Imagens/imagemlogin.png" width="100%" height="675px">
	</div>
	<div style="position: relative;
	top: 30%;
	margin: 0 auto;
	min-width: 1000px;
	max-width: 1000px;
	height:240px;">
	<!-- Formulário de Login -->
		<br><br><br>
		<div id="espacologin">
			<div id="arealogin">
				<div class="login">
					
					<br>
					<br>Não Possui Acesso a Área de Adminstração ? <br>Envie uma Solicitação <br>
					<br> <br>
					<form method="post" action="enviasolicitacao.php">
						Numero de Identificação:<br> <input type="text" name="ni"
							placeholder="NI" maxlength="100"> <br> <br> 
							Nome:<br> <input type="text" name="nome"
							placeholder="nome" maxlength="100"> <br> <br> 
							Email:<br> <input type="email"
							name="email" placeholder="Email@email.com" maxlength="100"> <br> <br> 
							<font color="lightgrey"><textarea rows="5" cols="35" name="assunto"
						style="resize: none;" maxlength="100">Digite aqui A Sua Solicitação.</textarea></font>
							<br> <input
							type="submit" value="Enviar" class="entrar"> <br>
					
					</form>

				</div>
			</div>

		</div>

	</div>
	<br><br><br>
	<br>
	<br>
	<br><br><br>
	<!--Parte responsavel pelo rodapé do site -->
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