$(document).ready(function()
{
    $('body').append(TOP = $('<img src="/i/image/top.png" style="position:fixed;bottom:4px;right:4px;display:none;cursor:pointer;z-index:100;" alt="Наверх">').click(function(){$('body,html').animate({scrollTop:0},800)}));
    $(window).scroll(function(){if ($(this).scrollTop())TOP.fadeIn();else TOP.fadeOut()});
    $('a.target').click(function(){ return !window.open($(this).attr('href')); });

    $('.check').submit(function() {
        var forma = $(this);
        var errors = get_errors(forma);
        if (errors) { forma.find('.error').html(errors); return false; }
        forma.find('.wait').show();
        return true;
    });

    $('.AJAX').submit(function() {
        var forma = $(this);
        var error = forma.find('.error');
        var wait  = forma.find('.wait');
        var errors = get_errors(forma);
        error.html(errors);
        if (errors) { return false; }
        wait.show();
        $.post(forma.attr('action'),forma.serialize(),function(res) {
            data = res.split('@');
            wait.hide();
            if (data[0]==0) { error.html(data[1]); }
            else if (data[0]==3) { $('#frm_message').val('').focus(); $('#history').html(res.substr(2)); }
            else forma.html('<div class="success">'+data[1]+'</div>');
        });
        return false;
    });

    $('#search').submit(function() {
        var str = $('#search_str').val();
        if (str) location.href = $(this).attr('action')+'/'+str; else $('#search_str').focus();
        return false;
    });

    SC = $('#scroll');
    if (SC[0])
    {
        var SCI = SC.find('a');
        SCWD = 0;
        SCI.each(function(index)
        {
            SCWD += $(this).width()+18;
        });
        PS = 0;
        $('#filters').width(SCWD);
        $('.sc_prev').click(function() { scroll(-1); return false; });
        $('.sc_next').click(function() { scroll(+1); return false; });
    }

    LS = $('#gallery');
    if (LS[0])
    {
        var LI = LS.find('li');
        SC_CURR = 0;
        SC_WD = LI.width();
        SC_KOL = LI.length;
        LS.find('ul').width(SC_WD*SC_KOL);

        if (SC_KOL>1)
        {
            LS.append($('<span class="prev"></span>').click(function() { sc_gallery(-1); clearInterval(SCR); }));
            LS.append($('<span class="next"></span>').click(function() { sc_gallery(+1); clearInterval(SCR); }));
            SCR = setInterval('sc_gallery(+1)',4000);
        }
    }

    //LIST = $('#slider>div');
    //if (LIST[0])
    //{
    //	var LI = LIST.find('li');
    //	CURR = 0;
    //	WD = LI.width();
    //	KOL = LI.length;
    //	LIST.find('ul').width(WD*KOL);
    //
    //	if (KOL>1)
    //	{
    //		$('#slider').append($('<span class="prev"></span>').click(function() { gallery(-1); clearInterval(SCROLL); }));
    //		$('#slider').append($('<span class="next"></span>').click(function() { gallery(+1); clearInterval(SCROLL); }));
    //		SCROLL = setInterval('gallery(+1)',4000);
    //	}
    //}

});

function scroll(dir)
{
    var MAX = SCWD-740;
    PS += dir*100;
    if (PS<0) PS = 0;
    if (PS>MAX) PS = MAX;
    $('#filters').css('left',-PS);
}

function sc_gallery(dir)
{
    SC_CURR += dir;
    if (SC_CURR<0) CURR=SC_KOL-1;
    if (SC_CURR>=SC_KOL) CURR=0;
    LS.animate({scrollLeft:SC_CURR*SC_WD},300);
}

function gallery(dir)
{
    CURR += dir;
    if (CURR<0) CURR=KOL-1;
    if (CURR>=KOL) CURR=0;
    LIST.animate({scrollLeft:CURR*WD},300);
}

function get_errors(forma)
{
    var errors = '';
    forma.find('*').each(function(index)
    {
        var value = $(this).val();
        var id = $(this).attr('id');
        if (id && typeof(CKEDITOR) !== 'undefined' && typeof(CKEDITOR.instances[id]) !== 'undefined')
        {
            value = CKEDITOR.instances[id].getData();
            $('#'+id).val(value);
        }

        var empty = $(this).data('empty');
        if (!value && empty) {
            if (!errors) $(this).focus(); errors += empty+'<br>';
        }
    });
    return errors;
}