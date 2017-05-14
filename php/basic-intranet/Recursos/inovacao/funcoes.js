function fn() {
    //$(function(){
    $('.filtro ul li a').click(function () {
        var marginTop = -($(this).position().top);
        var tamanho = $(this).parent().parent().height();
        if ($(this).parent().parent().hasClass('ativo')) {
            $(this).parent().parent().parent().animate({ 'height': 25 });
            $(this).parent().parent().animate({ 'marginTop': marginTop });
            $(this).parent().parent().removeClass('ativo');
            $(this).parent().parent().parent().removeClass('ativo');
        } else {
            $(this).parent().parent().animate({ 'marginTop': 0 });
            $(this).parent().parent().parent().animate({ 'height': tamanho + "px" });
            $(this).parent().parent().parent().addClass('ativo');
            $(this).parent().parent().addClass('ativo');
        }
    });
    $('.nome-do-curso').click(function () {
        if ($(this).next('div').hasClass('ativo')) {
            $(this).next('div').removeClass('ativo');
            $(this).next('div').slideUp();
        }
        else {
            $('.curso .descricao-curso').removeClass('ativo');
            $('.curso .descricao-curso').slideUp();
            $(this).next('div').addClass('ativo');
            $(this).next('div').slideDown();
        }
        return false;
    });
    $('.pergunta').click(function () {
        $('.pergunta').removeClass('minus');
        if ($(this).next('div').hasClass('ativo')) {
        }
        else {
            $('.resposta .pergunta-resposta').removeClass('ativo');
            $('.resposta .pergunta-resposta').slideUp();
        }
        $(this).next('div').addClass('ativo');
        $(this).addClass('minus');
        $(this).next('div').slideDown();
        return false;

    });
    
    /* mapa */
    $('.como-chegar').click(function () {
        $('.mapa').show();
    });
    $('.fechar-mapa').click(function () {
        $('.mapa').hide();
    });


    // login do aluno
    $('a.area-do-aluno').toggle(
		function () { $('.login-aluno').fadeIn(); },
		function () { $('.login-aluno').fadeOut(); }
	);
    // alterar tamanho da tela
    $('.textonormal').click(function () {
        $("#conteudo").removeAttr('class');
    });
    var tamanho = 0;
    $('.textomedio').click(function () {
        $('#conteudo').addClass('fontemedia');
        $('#conteudo').removeClass('fontemaior');
    });
    $('.textomaior').click(function () {
        $('#conteudo').addClass('fontemaior');
        $('#conteudo').removeClass('fontemedia');
    });
    // abas menu
    $('#side-bar .escola').click(function () {
        if (!($(this).hasClass('ativo'))) {
            $('#side-bar .senai').removeClass('ativo');
            $('#side-bar #menu-senai').hide();
            $('#side-bar #menu-escola').show();
            $(this).addClass('ativo');
        };
    });
    $('#side-bar .senai').click(function () {
        if (!($(this).hasClass('ativo'))) {
            $('#side-bar .escola').removeClass('ativo');
            $('#side-bar #menu-escola').hide();
            $('#side-bar #menu-senai').show();
            $('#side-bar #menu-senai').css({ "visibility": "visible" })
            $(this).addClass('ativo');
        };
    });
    // menu sub
    $('#side-bar #menu-escola .sub').mouseover(function () {
        $(this).children('ul').show()
    });
    $('#side-bar #menu-escola .sub').mouseout(function () {
        $(this).children('ul').hide()
    });
    $('#side-bar #menu-senai .sub').mouseover(function () {
        $(this).children('ul').show()
    });
    $('#side-bar #menu-senai .sub').mouseout(function () {
        $(this).children('ul').hide()
    });
    $('.tv-flash').append('<a href="#" class="prev">Prev</a><a href="#" class="next">Next</a>')
    $('.tv-flash li:eq(0)').show();
    vl = $('.tv-flash li').length;
    $('.tv-flash .next').click(function () {
        vi = vi + 1;
        $('.tv-flash li').fadeOut();
        if (vi >= vl) {
            $('.tv-flash li:eq(0)').fadeIn();
            vi = 0;
        } else {
            $('.tv-flash li:eq(' + vi + ')').fadeIn();
        };
        return false;
    });
    $('.tv-flash .prev').click(function () {
        vi = vi - 1;
        $('.tv-flash li').fadeOut();
        if (vi == -1) {
            $('.tv-flash li:eq(' + (vl - 1) + ')').fadeIn();
            vi = (vl - 1);
        } else {
            $('.tv-flash li:eq(' + vi + ')').fadeIn();
        };
        return false;
    });
    tvAutoI = setInterval(tvAuto, 4000);
    $('.tv-flash').live('mouseover', function () {
        clearInterval(tvAutoI);
    });
    $('.tv-flash').live('mouseleave', function () {
        tvAutoI = setInterval(tvAuto, 4000);
    });
    if ($('#step-banner .itens-banner li').length) {
        var time_destaque = '';
        destaque_total = $('#step-banner .itens-banner li').length;
        $.each($('.itens-banner li'), function (i, item) {
            $('.itens-banner li a').eq('' + i + '').addClass('item' + i + '');
            $('.noticia div').eq('' + i + '').addClass('item' + i + '');
        });
        $('#step-banner .img-destaque img:eq(0)').show();
        $('#step-banner .itens-banner li a').click(function () {
            var destaque_item = $(this);
            $('#step-banner .itens-banner li').removeClass('current');
            $('.noticia div').slideUp();
            $('.noticia div.' + $(this).attr('class')).slideDown();
            $(this).parent().addClass('current');
            $('#step-banner .img-destaque img').fadeOut();
            $('#step-banner .img-destaque img:eq(' + $(this).parent().index() + ')').fadeIn();
            destaque_atual = destaque_item.text();
            return false;
        });
        if ($('#step-banner .itens-banner').length) {
            time_destaque = setInterval(function () {
                change_destaque(destaque_atual);
            }, 6000);
        }
        $('#step-banner').live('mouseover', function () {
            clearInterval(time_destaque);
        });
        $('#step-banner').live('mouseout', function () {
            time_destaque = setInterval(function () {
                change_destaque(destaque_atual);
            }, 6000);
        });
    }
    if ($("a[rel=galeria]").length > 0) {
        $("a[rel=galeria]").fancybox({
            'transitionIn': 'none',
            'transitionOut': 'none',
            'titlePosition': 'over',
            'titleFormat': function (title, currentArray, currentIndex, currentOpts) {
                return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
            }
        });
    }
    if ($("a[rel=escola]").length > 0) {
        $("a[rel=escola]").fancybox({
            'transitionIn': 'none',
            'transitionOut': 'none',
            'titlePosition': 'over',
            'titleFormat': function (title, currentArray, currentIndex, currentOpts) {
                return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
            }
        });
    }
    //});
    $(".busca").selectt({ width: 138 });
    $(".busca-regiao").selectt({ width: 177 });
    $(".drop-cidade").selectt({ width: 225 });
    $(".drop-local").selectt({ width: 305 });
    $(".drop-assunto").selectt({ width: 305 });
    $(".drop-estado").selectt({ width: 55 });
    $(".drop-escola").selectt({ width: 165, link: true });
}
var destaque_atual = 1;
var destaque_total = $('#step-banner .itens-banner li').length;
function change_destaque(obj_destaque) {
    var tmp_destaque_atual = destaque_atual;
    tmp_destaque_atual++;
    if (tmp_destaque_atual > destaque_total)
        tmp_destaque_atual = 1;
    $('#destaque-' + tmp_destaque_atual).click();
}
var vi = 0,
	vl = $('.tv-flash li').length;
function tvAuto() {
    vi = vi + 1;
    $('.tv-flash li').fadeOut();
    if (vi >= vl) {
        $('.tv-flash li:eq(0)').fadeIn();
        vi = 0;
    } else {
        $('.tv-flash li:eq(' + vi + ')').fadeIn();
    };
};
function MudarTexto(control, textoPadrao) {
    if (control.value == textoPadrao)
        control.value = '';
}
function SairTexto(control, textoPadrao) {
    if (control.value == '')
        control.value = textoPadrao;
}
function openModal(URL, Width, Height) { return window.showModalDialog(URL, window, 'dialogWidth: ' + Width + 'px; dialogHeight: ' + Height + 'px; help: no; status: no;'); }
$(document).ready(function () { fn(); });