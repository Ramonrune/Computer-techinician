(function($) {

	$.fn.scrollPagination = function(options) {
		
		var settings = { 
			nop     : 10, 
			offset  : 0, 
			error   : 'Não há mais Notícias!', 
			                           
			delay   : 500, 
			               
			scroll  : true 
			              
		}
		
		
		if(options) {
			$.extend(settings, options);
		}
		
		
		return this.each(function() {		
			
			
			$this = $(this);
			$settings = settings;
			var offset = $settings.offset;
			var busy = false; 
			                 
			
			// mensagens
			if($settings.scroll == true) $initmessage = '<br><br>Desça Para mais Noticias !';
			else $initmessage = '<br><br>Desça Para mais Noticias !';
			
			// barra de carregamento
			$this.append('<div class="content"></div><div class="loading-bar">'+$initmessage+'</div>');
			
			function getData() {
				
				
				$.post('ajax.php', {
						
					action        : 'scrollpagination',
				    number        : $settings.nop,
				    offset        : offset,
					    
				}, function(data) {
						
					//muda o conteudo da barra de carregamento
					$this.find('.loading-bar').html($initmessage);
						
					
					if(data == "") { 
						$this.find('.loading-bar').html($settings.error);	
					}
					else {
						
					
					    offset = offset+$settings.nop; 
						    
						
					   	$this.find('.content').append(data);
						
						
						busy = false;
					}	
						
				});
					
			}	
			
			getData(); 
			
		
			if($settings.scroll == true) {
				
				$(window).scroll(function() {
					
					
					if($(window).scrollTop() + $(window).height() > $this.height() && !busy) {
						
						
						busy = true;
						
						
						$this.find('.loading-bar').html('<br><br>Carregando...');
						
						
						setTimeout(function() {
							
							getData();
							
						}, $settings.delay);
							
					}	
				});
			}
			
			
			$this.find('.loading-bar').click(function() {
			
				if(busy == false) {
					busy = true;
					getData();
				}
			
			});
			
		});
	}

})(jQuery);
