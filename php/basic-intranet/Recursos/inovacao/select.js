(function($) {
    //Resize image on ready or resize
    $.fn.selectt = function(options) {
        var settings = {
            width: 100,
            theme2: false,
            link: false
        };
        if (options)
            jQuery.extend(settings, options);        
        var contHtml = "";
        var qtd = $(this).children().length;
        if (settings.theme2) {
            contHtml += "<div class='selecione " + $(this).attr("class") + "'>";
            contHtml += "<span class='optionVal'></span>"
            contHtml += "<ul style='width: " + settings.width + "px; '>";
            for (i = 0; i <= qtd - 1; i++) {
                if (settings.link && $(this).children().eq(i).val() != "0")
                    contHtml += "<li><a class='ativo' href='" + $(this).children().eq(i).val() + "'>" + $(this).children().eq(i).text() + "</a></li>";
                else
                    contHtml += "<li>" + $(this).children().eq(i).text() + "</li>";
            }
            contHtml += "</ul>";
            contHtml += "</div>";            
            if ($(".selecione." + $(this).attr("class")).length < 1)
                $(contHtml).insertAfter($(this));
            var elementClass = $(this).attr("class");
            $("select." + elementClass).hide();
            $("select." + elementClass + " option").eq(0).attr('selected', true);
            var DivSelecione = $("." + elementClass);
            DivSelecione.css({
                'width': settings.width + "px",
                'overflow': 'visible'
            });
            DivSelecione.children('span').css({ 'width': settings.width - 50, 'overflow': 'hidden' })
            DivSelecione.children('ul').css({ 'top': $(this).prev().height() + 'px' });
            DivSelecione.children('ul').addClass('theme2');
            DivSelecione.children('ul').slideUp();
            DivSelecione.children('span').text(DivSelecione.children('ul').children().eq(0).text());
            DivSelecione.click(function() {
                if (!($(this).children('ul').hasClass('ativo'))) {
                    $(this).children('ul').slideDown();
                    $(this).children('span').text('');
                    $(this).children('ul').addClass('ativo');
                    DivSelecione.children('ul').children('li').mouseover(function() {
                        $(this).addClass('over');
                    });
                    DivSelecione.children('ul').children('li').mouseout(function() {
                        $(this).removeClass('over');
                    });
                    DivSelecione.children('ul').children('li').click(function() {
                        $("select." + elementClass + " option").eq($(this).index()).attr('selected', true);
                        DivSelecione.children('span').text($(this).text());
                    });
                } else {
                    DivSelecione.children('ul').slideUp();
                    $(this).children('ul').removeClass('ativo')
                }
            });
        } else {
            contHtml += "<div class='selecione " + $(this).attr("class") + "'>";
            contHtml += "<ul style='width: " + settings.width + "px; '>";
            for (i = 0; i <= qtd - 1; i++) {
                if (settings.link && $(this).children().eq(i).val() != "0")
                    contHtml += "<li><a class='ativo' href='" + $(this).children().eq(i).val() + "'>" + $(this).children().eq(i).text() + "</a></li>";
                else
                    contHtml += "<li>" + $(this).children().eq(i).text() + "</li>";
            }
            contHtml += "</ul>";
            contHtml += "</div>";
            if ($(".selecione." + $(this).attr("class")).length < 1) {
                $(contHtml).insertAfter($(this));
            }
            var elementClass = $(this).attr("class");
            $("select." + elementClass).hide();
            $("select." + elementClass + " option").eq(0).attr('selected', true);
            var DivSelecione = $("." + elementClass);
            DivSelecione.css({ "width": settings.width + "px" });
            var aberto = false;
            var objeto = $(".selecione." + elementClass + " ul li");
            var altura = objeto.innerHeight();
            objeto.live('click', function() {
                var marginTop = -($(this).position().top);
                if (!(objeto.parent('ul').parent('div').hasClass('ativo'))) {
                    var qtdFilhos = objeto.parent('ul').children('li').length;                    
                    objeto.parent('ul').removeClass('ativo');
                    objeto.parent('ul').parent('div').animate({ 'height': (qtdFilhos * altura) + 'px' }, 'normal');
                    objeto.parent('ul').css('top', '0');
                    objeto.parent('ul').parent('div').addClass('ativo');
                    objeto.addClass('ativo');
                    $("select." + elementClass + " option").attr('selected', false);

                } else {
                    $("select." + elementClass + " option").eq($(this).index()).attr('selected', true);
                    objeto.parent('ul').parent('div').animate({ 'height': altura + 'px'}, 'normal');
                    objeto.parent('ul').parent('div').removeClass("ativo");
                    objeto.parent('ul').animate({ 'top': marginTop }, 'normal');                    
                    objeto.parent('ul').parent('div').removeClass("ativo");
                    eval($("select.filtro-posts").attr("onchange"));
                };
            });
        }
        return false;
    }
})(jQuery);