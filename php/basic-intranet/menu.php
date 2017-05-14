<!DOCTYPE html >
<html>
    <head>
        <title></title>
     	<meta charset="UTF-8">
       <link rel="icon" href="Recursos/Imagens/icon.png">
        <link rel="stylesheet" href="Layout/style.css" type="text/css" media="screen"/>
        <style>
			body{
			
				font-family:Arial;
			}
			
			
		</style>
    </head>

    <body>
    <!-- Menu do site  -->
    <div id="posicao" align="left">
		<div class="content">
			
			<ul id="sdt_menu" class="sdt_menu">
				<li>
					<a href="index.php">
						<img src="Recursos/Imagens/home.png" alt="" />
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Home</span>
						
						</span>
					</a>
				</li>
				<li>
					<a href="integracao.php">
						<img src="Recursos/Imagens/integracao.jpg" alt="" />
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Integração</span>
							
						</span>
					</a>
					
				</li>
				<li>
					<a href="formulariossenai.php" >
						<img src="Recursos/Imagens/redes.jpg" alt="" />
						<span class="sdt_active" ></span>
						<span class="sdt_wrap" >
							<span class="sdt_link" >Formulários</span>
							
							
						</span>
						
					</a>
				</li>
				<li>
					<a href="inovacao.php">
						<img src="Recursos/Imagens/inovacao.jpg" alt="" />
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Inovação</span>
							
						</span>
					</a>
				</li>
				<li>
					<a href="galeria.php">
						<img src="Recursos/Imagens/galeria.jpg" alt="" />
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Galeria</span>
							
						</span>
					</a>
				</li>
				<li>
					<a href="contato.php">
						<img src="Recursos/Imagens/contato.jpg" alt="" />
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Contato</span>
							
						</span>
					</a>
					
				</li>
			</ul>
		</div>
       

        <!-- O javascript que faz a movimentação do menu -->
       
				<script type="text/javascript" src="Layout/jquery.easing.1.3.js"></script>
        <script type="text/javascript">
            $(function() {
			
                $('#sdt_menu > li').bind('mouseenter',function(){
					var $elem = $(this);
					$elem.find('img')
						 .stop(true)
						 .animate({
							'width':'100px',
							'height':'80px',
							'left':'0px'
						 },400,'easeOutBack')
						 .andSelf()
						 .find('.sdt_wrap')
					     .stop(true)
						 .animate({'top':'67px'},500,'easeOutBack')
						 .andSelf()
						 .find('.sdt_active')
					     .stop(true)
						 .animate({'height':'50px'},300,function(){
						var $sub_menu = $elem.find('.sdt_box');
						if($sub_menu.length){
							var left = '20px';
							if($elem.parent().children().length == $elem.index()+1)
								left = '-10px';
							$sub_menu.show().animate({'left':left},200);
						}	
					});
				}).bind('mouseleave',function(){
					var $elem = $(this);
					var $sub_menu = $elem.find('.sdt_box');
					if($sub_menu.length)
						$sub_menu.hide().css('left','0px');
					
					$elem.find('.sdt_active')
						 .stop(true)
						 .animate({'height':'0px'},300)
						 .andSelf().find('img')
						 .stop(true)
						 .animate({
							'width':'0px',
							'height':'0px',
							'left':'85px'},400)
						 .andSelf()
						 .find('.sdt_wrap')
						 .stop(true)
						 .animate({'top':'15px'},500);
				});
            });
        </script>
        </div>
    </body>
</html>